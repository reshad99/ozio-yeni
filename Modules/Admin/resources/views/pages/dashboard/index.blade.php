@extends('admin::layouts.master')
@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-fluid">
                <!--begin::Row-->
                <div class="row g-5 g-xl-10 mb-5 mt-5">
                    <div class="col-xl-7">
                        <div class="card card-flush shadow-sm">
                            <div class="card-header">
                                <h3 class="card-title">{{ __('admin::general.pages.dashboard.EmergencyCalls') }}</h3>
                            </div>
                            <div class="card-body pt-1 pb-5">
                                <div class="row">
                                    <!--begin::Col-->
                                    <div class="col-xl-6">
                                        <!--begin::Card widget 3-->
                                        <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end"
                                            style="background-color:  #bde8ef;">
                                            <!--begin::Header-->
                                            <div class="card-header pt-5 mb-2">
                                                <!--begin::HeaderText-->
                                                <div class="card-title m-0 text-dark">
                                                    <span>{{ __('admin::general.pages.dashboard.AllEmergencyCalls') }}</span>
                                                </div>
                                                <!--end::HeaderText-->
                                            </div>
                                            <!--end::Header-->
                                            <!--begin::Card body-->
                                            <div class="card-body d-flex align-items-end mb-2 pt-1 pb-1">
                                                <!--begin::Info-->
                                                <div class="d-flex align-items-center">
{{--                                                    <span--}}
{{--                                                        class="fs-2hx text-dark fw-bold me-6">{{ $data['totalCallCount'] }}</span>--}}
                                                    <div class="fw-bold fs-6 text-dark">
                                                    </div>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Card body-->
                                        </div>
                                        <!--end::Card widget 3-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-6 ps-2">
                                        <!--begin::Card widget 3-->
                                        <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end"
                                            style="background-color:  #fbeaa4;">
                                            <!--begin::Header-->
                                            <div class="card-header pt-5 mb-2">
                                                <!--begin::HeaderText-->
                                                <div class="card-title m-0 text-dark">
                                                    <span>{{ __('admin::general.pages.dashboard.CompletedEmergencyCalls') }}</span>
                                                </div>
                                                <!--end::HeaderText-->
                                            </div>
                                            <!--end::Header-->
                                            <!--begin::Card body-->
                                            <div class="card-body d-flex align-items-end mb-2 pt-1 pb-1">
                                                <!--begin::Info-->
                                                <div class="d-flex align-items-center">
{{--                                                    <span--}}
{{--                                                        class="fs-2hx text-dark fw-bold me-6">{{ $data['completedCallCount'] }}</span>--}}
                                                    <div class="fw-bold fs-6 text-dark">
                                                    </div>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Card body-->
                                        </div>
                                        <!--end::Card widget 3-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-6 mt-3">
                                        <!--begin::Card widget 3-->
                                        <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end"
                                            style="background-color:  #caece3;">
                                            <!--begin::Header-->
                                            <div class="card-header pt-5 mb-2">
                                                <!--begin::HeaderText-->
                                                <div class="card-title m-0 text-dark">
                                                    <span>{{ __('admin::general.pages.dashboard.ClosedEmergencyCalls') }}</span>
                                                </div>
                                                <!--end::HeaderText-->
                                            </div>
                                            <!--end::Header-->
                                            <!--begin::Card body-->
                                            <div class="card-body d-flex align-items-end mb-2 pt-1 pb-1">
                                                <!--begin::Info-->
                                                <div class="d-flex align-items-center">
{{--                                                    <span--}}
{{--                                                        class="fs-2hx text-dark fw-bold me-6">{{ $data['cancelledCallCount'] }}</span>--}}
                                                    <div class="fw-bold fs-6 text-dark">
                                                    </div>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Card body-->
                                        </div>
                                        <!--end::Card widget 3-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-6 ps-2 mt-3">
                                        <!--begin::Card widget 3-->
                                        <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end"
                                            style="background-color:  #fec6c7;">
                                            <!--begin::Header-->
                                            <div class="card-header pt-5 mb-2">
                                                <!--begin::HeaderText-->
                                                <div class="card-title m-0 text-dark">
                                                    <span>{{ __('admin::general.pages.dashboard.CancelledEmergencyCalls') }}</span>
                                                </div>
                                                <!--end::HeaderText-->
                                            </div>
                                            <!--end::Header-->
                                            <!--begin::Card body-->
                                            <div class="card-body d-flex align-items-end mb-2 pt-1 pb-1">
                                                <!--begin::Info-->
                                                <div class="d-flex align-items-center">
{{--                                                    <span--}}
{{--                                                        class="fs-2hx text-dark fw-bold me-6">{{ $data['declinedCallCount'] }}</span>--}}
                                                    <div class="fw-bold fs-6 text-dark">
                                                    </div>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Card body-->
                                        </div>
                                        <!--end::Card widget 3-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-5">
                        <div class="card card-flush shadow-sm">
                            <div class="card-header">
                                <h3 class="card-title">{{ __('admin::general.pages.dashboard.category_count_chart') }}
                                </h3>
                            </div>
                            <div class="card-body pt-1 pb-5"
                                style="
                            min-height: 309px;
                        ">
                                <div id="pieChart"></div>
                            </div>
                        </div>
                    </div>
                    <!--begin::Col-->
                    <div class="col-xl-12">
                        <div class="col-3">
                            <label class="fs-6 fw-bold form-label mb-2">{{ __('admin::general.pages.dashboard.date_range') }}</label>
                            <input class="form-control form-control-solid" placeholder="Pick date rage"
                                id="kt_daterangepicker_1" />
                        </div>
                    </div>
                    <div class="col-xl-12">

                        <div class="card card-flush shadow-sm">
                            <div class="card-header">
                                <h3 class="card-title">
                                    {{ __('admin::general.pages.dashboard.monthly_emergency_call_chart') }}</h3>

                            </div>
                            <div class="card-body pt-1 pb-5 me-15">

                                <div id="columnChart"></div>
                            </div>
                        </div>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
@endsection

@section('scripts')
    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="{{ asset('admin/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/custom/vis-timeline/vis-timeline.bundle.js') }}"></script>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{ asset('admin/assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom/utilities/modals/share-earn.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom/utilities/modals/offer-a-deal/type.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom/utilities/modals/offer-a-deal/details.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom/utilities/modals/offer-a-deal/finance.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom/utilities/modals/offer-a-deal/complete.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom/utilities/modals/offer-a-deal/main.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom/utilities/modals/users-search.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/global/plugins.bundle.js') }}"></script>

    <!--end::Custom Javascript-->
{{--    <script>--}}
{{--        //backend send me array named data with 3 values (totalCallCount, completedCallCount, cancelledCallCount) and i use it here--}}
{{--        let data = @json($data['categoryCount']);--}}
{{--        let chartJsData = @json($data['lastMonthCallCount']['data']);--}}
{{--        let betweenData = @json($data['lastMonthCallCount']['between']);--}}
{{--        $("#kt_daterangepicker_1").daterangepicker({--}}
{{--            timePicker: false,--}}
{{--            startDate: moment(betweenData.start.split(' ')[0]),--}}
{{--            endDate: moment(betweenData.end.split(' ')[0]),--}}
{{--            timePicker24Hour: true,--}}
{{--            locale: {--}}
{{--                format: 'DD.MM.YYYY HH:mm',--}}
{{--                applyLabel: "Saxla",--}}
{{--                cancelLabel: "Imtina et",--}}
{{--                monthNames: [--}}
{{--                    "Yanvar",--}}
{{--                    "Fevral",--}}
{{--                    "Mart",--}}
{{--                    "Aprel",--}}
{{--                    "May",--}}
{{--                    "İyun",--}}
{{--                    "İyul",--}}
{{--                    "Avqust",--}}
{{--                    "Sentyabr",--}}
{{--                    "Oktyabr",--}}
{{--                    "Noyabr",--}}
{{--                    "Dekabr"--}}
{{--                ],--}}
{{--                daysOfWeek: [--}}
{{--                    'B.',--}}
{{--                    'B.E.',--}}
{{--                    'Ç.A.',--}}
{{--                    'Ç.',--}}
{{--                    'C.A.',--}}
{{--                    'C.',--}}
{{--                    'Ş.',--}}
{{--                ],--}}
{{--            },--}}
{{--        });--}}
{{--        //get value of date range picker--}}
{{--        $('#kt_daterangepicker_1').on('apply.daterangepicker', function(ev, picker) {--}}

{{--            KTApp.showPageLoading();--}}
{{--            // stop var chart2--}}
{{--            window.chart2.destroy();--}}
{{--            //send ajax request--}}
{{--            $.ajax({--}}
{{--                url: "{{ route('admin.ajax.dashboard.getChartDataByDate') }}",--}}
{{--                type: 'GET',--}}
{{--                data: {--}}
{{--                    date: {--}}
{{--                        start: picker.startDate.format('YYYY-MM-DD'),--}}
{{--                        end: picker.endDate.format('YYYY-MM-DD'),--}}
{{--                    }--}}
{{--                },--}}
{{--                success: function(response) {--}}
{{--                    let betweenStartAndEndDates = [];--}}
{{--                    let forStartDate = picker.startDate.format('YYYY-MM-DD'); // 2024-01-01--}}
{{--                    let forEndDate = picker.endDate.format('YYYY-MM-DD'); // 2024-01-31--}}
{{--                    let chartAjaxJsData = response.data.data;--}}
{{--                    //get between dates add push to array--}}
{{--                    for (let date = moment(forStartDate); date <= moment(forEndDate); date = date.add(1,--}}
{{--                            'days')) {--}}
{{--                        let count = 0;--}}
{{--                        let date2 = date.format('YYYY-MM-DD');--}}
{{--                        for (let key in chartAjaxJsData) {--}}
{{--                            if (key.split(' ')[0] == date2) {--}}
{{--                                count = chartAjaxJsData[key];--}}
{{--                            }--}}
{{--                        }--}}
{{--                        betweenStartAndEndDates.push({--}}
{{--                            created_at: date2,--}}
{{--                            count: count,--}}
{{--                        });--}}
{{--                    }--}}

{{--                    let options2 = {--}}
{{--                        series: [{--}}
{{--                            name: 'çağırış sayı',--}}
{{--                            data: betweenStartAndEndDates.map((item) => item.count)--}}
{{--                        }],--}}
{{--                        chart: {--}}
{{--                            height: 480,--}}
{{--                            type: 'bar',--}}
{{--                        },--}}
{{--                        plotOptions: {--}}
{{--                            bar: {--}}
{{--                                borderRadius: 10,--}}
{{--                                dataLabels: {--}}
{{--                                    position: 'top', // top, center, bottom--}}
{{--                                },--}}
{{--                            }--}}
{{--                        },--}}
{{--                        dataLabels: {--}}
{{--                            enabled: true,--}}
{{--                            formatter: function(val) {--}}
{{--                                return val;--}}
{{--                            },--}}
{{--                            offsetY: -30,--}}
{{--                            style: {--}}
{{--                                fontSize: '12px',--}}
{{--                                colors: ["#304758"]--}}
{{--                            }--}}
{{--                        },--}}

{{--                        xaxis: {--}}
{{--                            categories: betweenStartAndEndDates.map((item) => {--}}
{{--                                let date = item.created_at;--}}
{{--                                //get only day from date--}}
{{--                                return date.split('-')[2];--}}
{{--                            }),--}}
{{--                            position: 'top',--}}
{{--                            axisBorder: {--}}
{{--                                show: false--}}
{{--                            },--}}
{{--                            axisTicks: {--}}
{{--                                show: false--}}
{{--                            },--}}
{{--                            crosshairs: {--}}
{{--                                fill: {--}}
{{--                                    type: 'gradient',--}}
{{--                                    gradient: {--}}
{{--                                        colorFrom: '#D8E3F0',--}}
{{--                                        colorTo: '#BED1E6',--}}
{{--                                        stops: [0, 100],--}}
{{--                                        opacityFrom: 0.4,--}}
{{--                                        opacityTo: 0.5,--}}
{{--                                    }--}}
{{--                                }--}}
{{--                            },--}}
{{--                            tooltip: {--}}
{{--                                enabled: true,--}}
{{--                            }--}}
{{--                        },--}}
{{--                        yaxis: {--}}
{{--                            axisBorder: {--}}
{{--                                show: false--}}
{{--                            },--}}
{{--                            axisTicks: {--}}
{{--                                show: false,--}}
{{--                            },--}}
{{--                            labels: {--}}
{{--                                show: false,--}}
{{--                                formatter: function(val) {--}}
{{--                                    return val;--}}
{{--                                }--}}
{{--                            }--}}

{{--                        },--}}
{{--                    };--}}

{{--                    window.chart2 = new ApexCharts(document.querySelector("#columnChart"), options2);--}}
{{--                    chart2.render();--}}
{{--                    KTApp.hidePageLoading();--}}
{{--                },--}}
{{--                error: function(xhr, status, error) {--}}
{{--                    KTApp.hidePageLoading();--}}
{{--                    // Handle errors here--}}
{{--                    customSwal.dataError(xhr)--}}
{{--                }--}}
{{--            });--}}


{{--        });--}}


{{--        let options = {--}}
{{--            series: Object.values(data),--}}
{{--            chart: {--}}
{{--                type: 'pie',--}}
{{--                width: 480--}}
{{--            },--}}
{{--            labels: Object.keys(data),--}}
{{--            responsive: [{--}}
{{--                breakpoint: 480,--}}
{{--                options: {--}}
{{--                    chart: {--}}
{{--                        width: 300--}}
{{--                    },--}}
{{--                    legend: {--}}
{{--                        position: 'bottom'--}}
{{--                    }--}}
{{--                }--}}
{{--            }]--}}
{{--        };--}}

{{--        let chart = new ApexCharts(document.querySelector("#pieChart"), options);--}}
{{--        chart.render();--}}

{{--        let betweenStartAndEndDates = [];--}}
{{--        let forStartDate = betweenData.start.split(' ')[0]; // 2024-01-01--}}
{{--        let forEndDate = betweenData.end.split(' ')[0]; // 2024-01-31--}}
{{--        //get between dates add push to array--}}
{{--        for (let date = moment(forStartDate); date <= moment(forEndDate); date = date.add(1, 'days')) {--}}
{{--            let count = 0;--}}
{{--            let date2 = date.format('YYYY-MM-DD');--}}
{{--            for (let key in chartJsData) {--}}
{{--                if (key.split(' ')[0] == date2) {--}}
{{--                    count = chartJsData[key];--}}
{{--                }--}}
{{--            }--}}
{{--            betweenStartAndEndDates.push({--}}
{{--                created_at: date2,--}}
{{--                count: count,--}}
{{--            });--}}
{{--        }--}}

{{--        let options2 = {--}}
{{--            series: [{--}}
{{--                name: 'çağırış sayı',--}}
{{--                data: betweenStartAndEndDates.map((item) => item.count)--}}
{{--            }],--}}
{{--            chart: {--}}
{{--                height: 480,--}}
{{--                type: 'bar',--}}
{{--            },--}}
{{--            plotOptions: {--}}
{{--                bar: {--}}
{{--                    borderRadius: 10,--}}
{{--                    dataLabels: {--}}
{{--                        position: 'top', // top, center, bottom--}}
{{--                    },--}}
{{--                }--}}
{{--            },--}}
{{--            dataLabels: {--}}
{{--                enabled: true,--}}
{{--                formatter: function(val) {--}}
{{--                    return val;--}}
{{--                },--}}
{{--                offsetY: -30,--}}
{{--                style: {--}}
{{--                    fontSize: '12px',--}}
{{--                    colors: ["#304758"]--}}
{{--                }--}}
{{--            },--}}

{{--            xaxis: {--}}
{{--                categories: betweenStartAndEndDates.map((item) => {--}}
{{--                    let date = item.created_at;--}}
{{--                    //get only day from date--}}
{{--                    return date.split('-')[2];--}}
{{--                }),--}}
{{--                position: 'top',--}}
{{--                axisBorder: {--}}
{{--                    show: false--}}
{{--                },--}}
{{--                axisTicks: {--}}
{{--                    show: false--}}
{{--                },--}}
{{--                crosshairs: {--}}
{{--                    fill: {--}}
{{--                        type: 'gradient',--}}
{{--                        gradient: {--}}
{{--                            colorFrom: '#D8E3F0',--}}
{{--                            colorTo: '#BED1E6',--}}
{{--                            stops: [0, 100],--}}
{{--                            opacityFrom: 0.4,--}}
{{--                            opacityTo: 0.5,--}}
{{--                        }--}}
{{--                    }--}}
{{--                },--}}
{{--                tooltip: {--}}
{{--                    enabled: true,--}}
{{--                }--}}
{{--            },--}}
{{--            yaxis: {--}}
{{--                axisBorder: {--}}
{{--                    show: false--}}
{{--                },--}}
{{--                axisTicks: {--}}
{{--                    show: false,--}}
{{--                },--}}
{{--                labels: {--}}
{{--                    show: false,--}}
{{--                    formatter: function(val) {--}}
{{--                        return val;--}}
{{--                    }--}}
{{--                }--}}

{{--            },--}}
{{--        };--}}

{{--        window.chart2 = new ApexCharts(document.querySelector("#columnChart"), options2);--}}
{{--        chart2.render();--}}
{{--    </script>--}}
@endsection

@section('styles')
    <link href="{{ asset('admin/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin/assets/plugins/custom/vis-timeline/vis-timeline.bundle.css') }}" rel="stylesheet"
        type="text/css" />
@endsection
