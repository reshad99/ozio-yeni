<script>
    $(document).on('click', '.view-modal-btn', function() {
        //alert($(this).data('id'))
        // <input class="form-check-input" type="checkbox" value="${data}" /> get value of checkbox
        let emergencycall_id = $(this).data('id');

        let form = $("#kt_modal_view_info");
        let url =
            `{{ route('admin.ajax.emergencycall.read', ['id' => '-1']) }}`;
        url = url.replace("-1", emergencycall_id);
        //ajax read role data
        $.ajax({
            type: "GET",
            url: url, // Update with your API endpoint,
            data:{
                with:['caller','category','subCategory','emergencyStatuses','emergencyStatuses.uploads','emergencyAct']
            },
            success: function(response) {
                // Handle the success response here
                console.log(response);
                // category,sub_category custom_id status fullname fin phone passport caller_address address
                form.find('#category').text(response.category.name);
                form.find('#sub_category').text(response.sub_category.name);
                form.find('#custom_id').text(response.custom_id);
                form.find('#status').text(StatusTranslates[response.status]);
                form.find('#fullname').text(response.caller.first_name + " " + response.caller
                    .last_name);
                form.find('#fin').text(response.caller.fin);
                form.find('#phone').text(response.caller.phone);
                form.find('#passport').text(response.caller.passport_number);
                form.find('#caller_address').text(response.caller?.full_address);
                form.find('#address').text(response.oriyentr_address);
                form.find('#accident_description').text(response.accident_description);
                // meter_number , subscriber_number
                form.find('#meter_number').text(response.caller?.gas_meter_id);
                form.find('#subscriber_number').text(response.caller?.subscriber_number);

                let acts_section = form.find('#acts_section');
                if (response.emergency_act) {
                    // act_timediff created_at
                    acts_section.empty();
                    let href = response.emergency_act.file_path;
                    let created_at = response.emergency_act.created_at;

                    moment.locale('az');
                    let time_diff = moment.utc(created_at).local().fromNow();

                    let html = `<!--begin::Name-->
                    <a href="${href}"
                        class="text-gray-800 text-hover-primary d-flex flex-column">
                        <!--begin::Image-->
                        <div class="symbol symbol-60px mb-5">
                            <img src="admin/assets/media/svg/files/doc.svg"
                                class="theme-light-show" alt="">
                            <img src="admin/assets/media/svg/files/doc-dark.svg"
                                class="theme-dark-show" alt="">
                        </div>
                        <!--end::Image-->
                        <!--begin::Title-->
                        <div class="fs-5 fw-bold mb-2">Texniki akt</div>
                        <!--end::Title-->
                    </a>
                    <!--end::Name-->
                    <!--begin::Description-->
                    <div class="fs-7 fw-semibold text-gray-500">${time_diff}</div>
                    <!--end::Description-->`;

                    acts_section.append(html);

                } else {
                    // kt_tab_pane_33 remove id
                    acts_section.empty();
                }

                form.find('#status_section').empty();
                response.statuses.forEach(element => {

                    let html = '<tr>';
                    html += '<td class="w-20 p-0 pt-2">';
                    if (element.worker != null) {
                        html += '<p class="text-black">' + element.worker?.first_name +
                            ' ' + element.worker?.last_name + '</p>';
                    } else if (element.status == "OPEN") {
                        html += '<p class="text-black">Dispetçer</p>';
                    } else {
                        html += '<p class="text-black">-----</p>';
                    }
                    html += '</td>';
                    html += '<td class="w-20 p-0 pt-2">';
                    html += '<p class="text-black">' + StatusTranslates[element.status] +
                        '</p>';
                    html += '</td>';
                    html += '<td class="w-20 p-0 pt-2">';
                    html += '<p class="text-black">' + element.created_at + '</p>';
                    html += '</td>';
                    html += '<td class="w-20 p-0 pt-2">';
                    html += '<p class="text-black">' + element.time_diff + '</p>';
                    html += '</td>';
                    html += '<td class="w-60 p-0 pt-2">';
                    html += '<p class="text-black">' + element.note + '</p>';
                    html += '</td>';
                    html += '</tr>';
                    form.find('#status_section').append(html);
                });


                console.log('end statuses');
                //get status from statuses where status== arrived
                let arrived_photos = form.find('#arrived-photos');
                let completed_photos = form.find('#completed-photos');
                arrived_photos.empty();
                completed_photos.empty();
                let arrived = response.statuses.find(element => element.status == "ARRIVED");
                if (arrived) {
                    if (arrived.attachments) {
                        arrived.attachments.forEach(element => {
                            let html = makeStatusAttachment(element.object_key);
                            arrived_photos.append(html);
                        });
                    }
                }
                let completed = response.statuses.find(element => element.status == "COMPLETED");
                if (completed) {
                    if (completed.attachments) {
                        completed.attachments.forEach(element => {
                            let html = makeStatusAttachment(element.object_key);
                            completed_photos.append(html);
                        });
                    }
                }
                refreshFsLightbox();

                //foreach all statuses check if have lat and lng then add marker
                removeMarkers();
                //reverse statuses
                response.statuses.reverse();
                let firstTime = true;
                console.log('start');
                response.statuses.forEach((element, index) => {
                    console.log(element);
                    if (element.lat && element.long) {
                        let intLat = parseFloat(element.lat);
                        let intLng = parseFloat(element.long);
                        let obj = {
                            lat: intLat,
                            lng: intLng
                        }
                        if (firstTime) {
                            window.map.setCenter(obj);
                            firstTime = false;
                            addMarker(parseFloat(element.lat), parseFloat(element.long),
                                StatusTranslates[
                                    element.status], "Ünvan: " + response.caller
                                ?.full_address, 'red');
                        } else {
                            //current time
                            let date = new Date(element.created_at);
                            let formatter = new Intl.DateTimeFormat('en', { hour: '2-digit', minute: '2-digit', hour12: false });
							let currentDate = formatter.format(date);
                            addMarker(parseFloat(element.lat), parseFloat(element.long),
                                StatusTranslates[
                                    element.status], "<br/><p>" + currentDate + " " +
                                StatusTranslates[
                                    element.status] + "</p>");
                        }
                    }
                });

            },
            error: function(xhr, status, error) {
                // Handle errors here
                customSwal.dataError(xhr);
            },
        });

    })

    function makeStatusAttachment(src) {

        return ` <div class="col-md-6 min-h-150px">
                        <a class="d-block card-rounded overlay h-100 w-100"
                            data-fslightbox="lightbox-projects"
                            href="${src}">
                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-100"
                                style="background-image:url('${src}')">
                            </div>
                            <div
                                class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                <i class="ki-duotone ki-eye fs-3x text-white">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </div>
                        </a>
                    </div>`;
    }
</script>
