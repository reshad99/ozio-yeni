<script>
    //document ready
    $(document).ready(function() {
        const loadingEl = document.createElement("div");
        document.body.prepend(loadingEl);
        loadingEl.classList.add("page-loader");
        loadingEl.classList.add("flex-column");
        loadingEl.classList.add("bg-dark");
        loadingEl.classList.add("bg-opacity-25");
        loadingEl.innerHTML = `
                    <span class="spinner-border text-primary" role="status"></span>
                    <span class="text-gray-800 fs-6 fw-semibold mt-5">Yüklənir...</span>
            `;

        // <form id="select-user-modal" action="#">
        let form = $('#select-user-modal');
        let searchButton = $('#search-user-select');

        //search button click
        searchButton.click(function() {
            //get form input name fin
            let fin = form.find('input[name="fin"]').val();
            let subscribeNumber = form.find('input[name="subscribeNumber"]').val();
            let meterNum = form.find('input[name="meterNum"]').val();
            let fathername = form.find('input[name="middleName"]').val();
            let name = form.find('input[name="name"]').val();
            let surname = form.find('input[name="surname"]').val();

            //send filters
            let filters = {};
            if (fin != '') {
                filters.Fin = fin;
            }
            if (subscribeNumber != '') {
                filters.SubId = subscribeNumber;
            }
            if (meterNum != '') {
                filters.MeterNum = meterNum;
            }
            if (name != '') {
                filters.Name = name;
            }
            if (surname != '') {
                filters.Surname = surname;
            }
            //check filters have any value
            if (Object.keys(filters).length === 0) {
                //show error message
                toastr.error('Axtarış üçün məlumat daxil edin');
                return;
            }
            $('#select-user-modal-user-list').html('');

            // Show page loading
            KTApp.showPageLoading();
            //disable searchButton
            searchButton.attr('disabled', true);

            $.ajax({
                url: "{{ route('shared.agis-service.subscribers') }}",
                type: 'POST',
                data: {
                    "pagenumber": 1,
                    "pagesize": 100,
                    "filter": filters
                },
                success: function(response) {
                    //clear user list
                    //check user list
                    console.log(response);
                    if (response.Subscribers.length > 0) {
                        //loop user list
                        $.each(response.Subscribers, function(index, user) {
                            let userHtml = `<tr id='user${user.SubId}'>`;
                            userHtml += `<td data-fullname="${user.Name} ${user.Surname}">${user.Name} ${user.Surname} </td>`;
                            userHtml +=
                                '<input type="hidden" name="phone-number" value="' +
                                user.PhoneNum + '">';
                                userHtml +=
                                '<input type="hidden" name="address-value" value="' +
                                user.City + '=' + user.Matrix + '=' + $.trim(user.Street) + '">';
                            if (user.Middlename == null) {
                                userHtml += `<td>-</td>`;
                            } else {
                                userHtml += `<td data-father-name="${user.Middlename}">${user.Middlename}</td>`;
                            }
                            if (user.PhoneNum == null) {
                                userHtml += `<td>-</td>`;
                            } else {
                                userHtml += `<td data-phone="${user.PhoneNum}">${user.PhoneNum}</td>`;
                            }
                            if (user.Fin == null) {
                                userHtml += `<td>-</td>`;
                            } else {
                                userHtml += `<td data-fin="${user.Fin}">${user.Fin}</td>`;
                            }
                            if (user.PassportNum == null) {
                                userHtml += `<td>-</td>`;
                            } else {
                                userHtml += `<td data-passport-num="${user.PassportNum}">${user.PassportNum}</td>`;
                            }
                            if (user.MeterNum == null) {
                                userHtml += `<td>-</td>`;
                            } else {
                                userHtml += `<td data-meter-num="${user.MeterNum}">${user.MeterNum}</td>`;
                            }
                            if (user.SubId == null) {
                                userHtml += `<td>-</td>`;
                            } else {
                                userHtml += `<td data-sub-id="${user.SubId}">${user.SubId}</td>`;
                            }
                            if (user.HouseNum == null) {
                                userHtml += `<td>-</td>`;
                            } else {
                                userHtml += `<td data-house-number="${user.HouseNum}">${user.HouseNum}</td>`;
                            }
                            if (user.FlatNum == null) {
                                userHtml += `<td>-</td>`;
                            } else {
                                userHtml += `<td data-flat-number="${user.FlatNum}">${user.FlatNum}</td>`;
                            }
                            userHtml +=
                                `<td><button type="button" data-sub-id="${user.SubId}" class="select-button-for-user btn btn-sm btn-primary">Seç</button></td>`;
                            //append user html
                            $('#select-user-modal-user-list').append(userHtml);
                        });
                        //reset select buttons
                        resetSelectButtons();
                    } else {
                        //create user html Nəticə tapılmadı
                        let userHtml = `<tr>`;
                        userHtml +=
                            `<td colspan="10" class="text-center">Nəticə tapılmadı</td>`;
                        userHtml += `</tr>`;


                        //append user html
                        $('#select-user-modal-user-list').append(userHtml);
                    }
                    //hide page loading
                    KTApp.hidePageLoading();
                    searchButton.attr('disabled', false);
                },
                error: function(error) {
                    //hide page loading
                    KTApp.hidePageLoading();
                    searchButton.attr('disabled', false);
                    //show error message
                    toastr.error('Xəta baş verdi');
                }
            });
        });


        function resetSelectButtons() {
            //get buttons class select-button-for-user
            let buttons = $('button.select-button-for-user');

            function selectUser(subId) {
                // reset form
                form.trigger('reset');


                let userTr = $('#user' + subId);
                //find a tag which has data-fullname attribute
                let fullname = userTr.find('td[data-fullname]')?.attr('data-fullname');
                let firstname = fullname?.split(' ')[0];
                let lastname = fullname?.split(' ')[1];
                let fatherName = userTr.find('td[data-father-name]')?.attr('data-father-name');
                let fin = userTr.find('td[data-fin]')?.attr('data-fin');
                let passportNum = userTr.find('td[data-passport-num]')?.attr('data-passport-num');
                let meterNum = userTr.find('td[data-meter-num]')?.attr('data-meter-num');
                let subscribeNumber = userTr.find('td[data-sub-id]')?.attr('data-sub-id');
                let houseNumber = userTr.find('td[data-house-number]')?.attr('data-house-number');
                let flatNumber = userTr.find('td[data-flat-number]')?.attr('data-flat-number');
                let phoneNumber = userTr.find('input[name="phone-number"]')?.val();
                let address = userTr.find('input[name="address-value"]')?.val();
                let city = address?.split('=')[0];
                let matrix = address?.split('=')[1];
                let street = address?.split('=')[2];
                address = address?.replace('=', ' ');
                // let fullname = userDiv.find('a[data-fullname]')?.attr('data-fullname');
                // let firstname = fullname?.split(' ')[0];
                // let lastname = fullname?.split(' ')[1];
                // let address = userDiv.find('p[data-address]')?.attr('data-address');
                // let city = address?.split('=')[0];
                // let matrix = address?.split('=')[1];
                // let street = address?.split('=')[2];
                // address = address?.replace('=', ' ');
                // let fin = userDiv.find('span[data-fin]')?.attr('data-fin');
                // let passportNum = userDiv.find('span[data-passport-num]')?.attr('data-passport-num');
                // let meterNum = userDiv.find('span[data-meter-num-id]')?.attr('data-meter-num-id');
                // let subscribeNumber = userDiv.find('span[data-sub-id]')?.attr('data-sub-id');
                // let fatherName = userDiv.find('span[data-father-name]')?.attr('data-father-name');
                // let houseNumber = userDiv.find('input[name="house-number"]')?.val();
                // let flatNumber = userDiv.find('input[name="flat-number"]')?.val();
                // let phoneNumber = userDiv.find('input[name="phone-number"]')?.val();

                // // skt_modal_new_target
                // let AddModal = $('#kt_modal_new_target');
                // //kt_tab_pane_1
                // let addModalSubsSection = AddModal.find('#kt_tab_pane_1');
                // let editModal = $('#kt_modal_new2_target');


                let AddModal = $(
                    '#kt_modal_new_target');
                let addModalSubsSection = AddModal.find(
                    '#kt_tab_pane_1');
                let addModalNotSubsSection = AddModal
                    .find('#kt_tab_pane_2');
                let sectionName = '';
                let fieldModal = null;

                //check which modal is have class show
                if (AddModal.hasClass('show') &&
                    addModalSubsSection.hasClass(
                        'active')) {
                    sectionName = 'addModalSubsSection'
                    fieldModal = addModalSubsSection;
                } else if (AddModal.hasClass('show') &&
                    addModalNotSubsSection.hasClass(
                        'active')) {
                    fieldModal = addModalNotSubsSection;
                    sectionName = 'addModalNotSubsSection'
                }

                let editModal = $(
                    '#kt_modal_new2_target');
                let editModalSubsSection = editModal
                    .find(
                        '#kt_tab_pane_3');
                let editModalNotSubsSection = editModal
                    .find('#kt_tab_pane_4');
                if (editModal.hasClass('show') &&
                    editModalSubsSection.hasClass(
                        'active')) {
                    sectionName = 'editModalSubsSection'
                    fieldModal = editModalSubsSection;
                } else if (editModal.hasClass('show') &&

                    editModalNotSubsSection.hasClass(
                        'active')) {
                    sectionName = 'editModalNotSubsSection'
                    fieldModal =
                        editModalNotSubsSection;
                }

                //set input values
                fieldModal.find('input[name="subscriber_caller_first_name"]').val(firstname);
                fieldModal.find('input[name="subscriber_caller_last_name"]').val(lastname);
                fieldModal.find('input[name="subscriber_caller_father_name"]').val(fatherName);
                fieldModal.find('input[name="subscriber_caller_fin"]').val(fin);
                fieldModal.find('input[name="subscriber_subscriber_number"]').val(subscribeNumber);
                fieldModal.find('input[name="subscriber_meter_number"]').val(meterNum);
                fieldModal.find('input[name="subscriber_accident_address"]').
                val(city + ', ' + matrix + ', ' + street + ', Bina ' + houseNumber + ', Mənzil ' + flatNumber);
                fieldModal.find('input[name="subscriber_city"]').val(city);
                fieldModal.find('input[name="subscriber_region"]').val(matrix);
                fieldModal.find('input[name="subscriber_street"]').val(street);
                fieldModal.find('input[name="subscriber_house_number"]').val(houseNumber);
                fieldModal.find('input[name="subscriber_flat_number"]').val(flatNumber);
                fieldModal.find('input[name="caller_phone_number"]').val(phoneNumber);
                // subscriber_is_subscriber
                // subscriber_passport_number
                fieldModal.find('input[name="subscriber_passport_number"]').val(passportNum);
                if (sectionName.startsWith('add')) {
                    fieldModal.find('input[name="subscriber_is_subscriber"]').val('1');
                }
                // let addressForm = $('#kt_modal_new_address_form');
                // addressForm.find('#flat_number').val(flatNumber);
                // addressForm.find('#house_number').val(houseNumber);
            }
            //loop buttons
            $.each(buttons, function(index, button) {
                //click button
                $(button).click(function() {
                    let subId = $(button).attr('data-sub-id');
                    selectUser(subId);
                    let thisModal = $('#kt_modal_select_users');
                    console.log(thisModal);
                    thisModal.modal('hide');
                });
            });
        }





    });
</script>
