<script>
    $(document).ready(function () {
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
        let dataRangePickedValueStart = moment().add(-1, 'month').format('YYYY-MM-DD HH:mm');
        let dataRangePickedValueEnd = moment().format('YYYY-MM-DD HH:mm');
        $('#kt_daterangepicker_1').on('apply.daterangepicker', function (ev, picker) {
            // console.log(picker.startDate.format('YYYY-MM-DD HH:mm'));
            // console.log(picker.endDate.format('YYYY-MM-DD HH:mm'));
            dataRangePicked = true;

            $('#filter_date_start').val(picker.startDate.format('YYYY-MM-DD HH:mm'));
            $('#filter_date_end').val(picker.endDate.format('YYYY-MM-DD HH:mm'));
        });

        $('#filterResetBtn').on('click', function () {
            $('#filter_name').val('');
            $('#filter_email').val('');
            $('#filter_phone_number').val('');
            $('#filter_date_start').val('');
            $('#filter_date_end').val('');
            $('#kt_daterangepicker_1').val('');
            $('#filterSearchBtn').trigger('click');
            dataRangePicked = false;
        });

        $('#filterSearchBtn').on('click', function () {
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
