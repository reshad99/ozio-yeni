<script>
    $(document).ready(function() {
        $("#kt_daterangepicker_1").daterangepicker({
            timePicker: true,
            startDate: moment().add(-1, 'month'),
            endDate: moment(),
            timePicker24Hour: true,
            locale: {
                format: 'DD.MM.YYYY HH:mm',
                applyLabel: "Saxla",
                cancelLabel: "Imtina et",
                monthNames: [
                    "Yanvar",
                    "Fevral",
                    "Mart",
                    "Aprel",
                    "May",
                    "İyun",
                    "İyul",
                    "Avqust",
                    "Sentyabr",
                    "Oktyabr",
                    "Noyabr",
                    "Dekabr"
                ],
                daysOfWeek: [
                    'B.',
                    'B.E.',
                    'Ç.A.',
                    'Ç.',
                    'C.A.',
                    'C.',
                    'Ş.',
                ],
            },
        });

        //get value of date range picker
        let dataRangePicked = false;
        let dataRangePickedValueStart = moment().add(-1, 'month');
        let dataRangePickedValueEnd = moment();
        $('#kt_daterangepicker_1').on('apply.daterangepicker', function(ev, picker) {
            console.log(picker.startDate.format('YYYY-MM-DD HH:mm'));
            console.log(picker.endDate.format('YYYY-MM-DD HH:mm'));
            dataRangePicked = true;

            $('#filter_date_start').val(picker.startDate.format('YYYY-MM-DD HH:mm'));
            $('#filter_date_end').val(picker.endDate.format('YYYY-MM-DD HH:mm'));
        });

        {{--let StatusEnum = @json(Modules\Shared\app\Enums\EmergencyCallStatusEnum::values());--}}
        // console.log(StatusEnum);
        //status is object $('#filter_status').append('<option value="' + item + '">' + StatusTranslates[item] +'</option>');
        //foreach is not working
        // for (let item in StatusEnum) {
        //     $('#filter_status').append('<option value="' + StatusEnum[item] + '">' + StatusTranslates[
        //         StatusEnum[item]] + '</option>');
        // }

        $('#filter_status').val('').trigger('change');




        {{--$.ajax({--}}
        {{--    url: "{{ route('admin.ajax.user.list') }}",--}}
        {{--    type: "GET",--}}
        {{--    data: {--}}
        {{--        type: 'worker'--}}
        {{--    },--}}
        {{--    success: function(data) {--}}
        {{--        console.log(data);--}}
        {{--        $.each(data, function(index, key) {--}}
        {{--            $('[name=filter_worker_id]').append('<option value="' + key['id'] +--}}
        {{--                '">' +--}}
        {{--                key['first_name'] + ' ' + key['last_name'] + '</option>');--}}
        {{--            $('[name=filter_worker_id]').val('').trigger('change');--}}
        {{--        });--}}

        {{--    }--}}
        {{--});--}}

        {{--var mainCategories = [];--}}
        {{--var subCategories = [];--}}
        {{--$.ajax({--}}
        {{--    url: "{{ route('admin.ajax.accident.category.list') }}",--}}
        {{--    type: "GET",--}}
        {{--    data: {--}}
        {{--        status: '{{ Modules\Shared\app\Enums\AccidentCategoryStatusEnum::PUBLISHED->value }}'--}}
        {{--    },--}}
        {{--    success: function(data) {--}}
        {{--        $.each(data, function(index, key) {--}}
        {{--            if (key.parent_id == null || key.parent_id == 0)--}}
        {{--                mainCategories.push(key);--}}
        {{--            else--}}
        {{--                subCategories.push(key);--}}
        {{--        });--}}

        {{--        // filter_category_id--}}
        {{--        mainCategories.forEach(function(item) {--}}
        {{--            $('[name=filter_category_id]').append('<option value="' + item['id'] +--}}
        {{--                '">' + item['name'] +--}}
        {{--                '</option>');--}}
        {{--        });--}}
        {{--        $('[name=filter_category_id]').val('').trigger('change');--}}
        {{--        $(document).on('change', '[name=category_id]', function() {--}}
        {{--            var category_id = $(this).val();--}}
        {{--            if (category_id) {--}}
        {{--                let currentSubCategories = subCategories.filter(function(item) {--}}
        {{--                    return item.parent_id == category_id;--}}
        {{--                });--}}
        {{--                $('[name=sub_category_id]').empty();--}}
        {{--                currentSubCategories.forEach(function(item) {--}}
        {{--                    $('[name=sub_category_id]').append('<option value="' +--}}
        {{--                        item['id'] + '">' +--}}
        {{--                        item['name'] +--}}
        {{--                        '</option>');--}}
        {{--                });--}}
        {{--                $('[name=sub_category_id]').trigger('change');--}}
        {{--            } else {--}}
        {{--                $('[name=sub_category_id]').empty();--}}
        {{--            }--}}

        {{--            console.log('trigger change category end');--}}
        {{--        });--}}
        {{--        $(document).on('change', '[name=filter_category_id]', function() {--}}
        {{--            var category_id = $(this).val();--}}
        {{--            if (category_id) {--}}
        {{--                //get subcategories by category_id parent_id--}}
        {{--                let currentSubCategories = subCategories.filter(function(item) {--}}
        {{--                    return item.parent_id == category_id;--}}
        {{--                });--}}
        {{--                console.log(currentSubCategories);--}}
        {{--                $('[name=filter_sub_category_id]').empty();--}}
        {{--                currentSubCategories.forEach(function(item) {--}}
        {{--                    $('[name=filter_sub_category_id]').append(--}}
        {{--                        '<option value="' +--}}
        {{--                        item['id'] + '">' + item['name'] +--}}
        {{--                        '</option>');--}}
        {{--                });--}}
        {{--                $('[name=filter_sub_category_id]').val('').trigger('change');--}}
        {{--            } else {--}}
        {{--                $('[name=filter_sub_category_id]').empty();--}}
        {{--            }--}}
        {{--            $('[name=filter_sub_category_id]').trigger('change');--}}
        {{--        });--}}
        {{--        //document ready--}}
        {{--        window.changeCategory = function changeCategory(sub_category) {--}}
        {{--            let form = $('#kt_modal_new2_target');--}}
        {{--            //trigger change event to get when event done console.log(sub_category);--}}
        {{--            form.find('[name=category_id]').val(sub_category.parent_id).trigger(--}}
        {{--                'change'--}}
        {{--            );--}}
        {{--            form.find('[name=sub_category_id]').val(sub_category.id)--}}
        {{--                .trigger('change')--}}
        {{--        }--}}
        {{--        //trigger change event to get when event done console.log(sub_category);--}}
        {{--        $('[name=category_id]').trigger('change');--}}

        {{--    }--}}
        {{--});--}}


        $('#filterResetBtn').on('click', function() {
            $('#filter_date_start').val('');
            $('#filter_date_end').val('');
            $('#filter_status').val('').trigger('change');
            $('#filter_subscriber_number').val('');
            $('#filter_meter_number').val('');
            $('#filter_phone_number').val('');
            $('#filter_worker_id').val('').trigger('change');
            $('#filter_custom_id').val('');
            $('#filter_category_id').val('').trigger('change');
            $('#filter_sub_category_id').val('').trigger('change');
            $('#filter_caller_search').val('');
            $('#filterSearchBtn').trigger('click');
            dataRangePicked = false;
        });

        $('#filterSearchBtn').on('click', function() {
            if (!dataRangePicked) {
                //set default value for date range picker
                $('#filter_date_start').val(dataRangePickedValueStart)
                $('#filter_date_end').val(dataRangePickedValueEnd)
            }
            window.searchBtnClicked=true;
            window.datatable.draw();
        });
    });
</script>
