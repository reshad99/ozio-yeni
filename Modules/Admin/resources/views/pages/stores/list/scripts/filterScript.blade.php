<script>
    $(document).ready(function() {
        $('.status-select2').select2({
                dropdownParent: $("#kt_modal_new_target_form"),
            }
        );


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


        $('#filter_status').val('').trigger('change');

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
            window.searchBtnClicked = true;
            window.datatable.draw();
        });
    });
</script>
