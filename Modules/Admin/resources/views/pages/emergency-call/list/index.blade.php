@extends('admin::layouts.master')
@section('content')
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">

        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="card card-flush">
                <div class="card-body pt-10">

                    <div style="position: absolute; float: right; right: 30px;" class="mb-5">
						{{--
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-1 position-absolute ms-6"><span class="path1"></span><span
                                    class="path2"></span></i>
                            <input type="text" data-kt-docs-table-filter="search" class="form-control  w-250px ps-15"
                                placeholder="{{ __('admin::general.pages.emergencyCall.list.search_emergencycall') }}" />
                        </div>
						--}}
                        <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#kt_modal_new_target">
                                <i class="ki-duotone ki-plus fs-2"></i>
                                {{ __('admin::general.pages.emergencyCall.list.add_new_emergencycall') }}
                            </button>
                        </div>
                        <div class="d-flex justify-content-end align-items-center d-none"
                            data-kt-docs-table-toolbar="selected">
                            <div class="fw-bold me-5">
                                <span class="me-2" data-kt-docs-table-select="selected_count"></span> Selected
                            </div>

                            <button type="button" class="btn btn-danger" data-bs-toggle="tooltip" title="Coming Soon">
                                Selection Action
                            </button>
                        </div>
                    </div>
                    <!--begin::Accordion-->
                    <div class="accordion accordion-icon-toggle" id="kt_accordion_2">
                        <!--begin::Item-->
                        <div class="mb-5">
                            <!--begin::Header-->
                            <div class="accordion-header py-3 d-flex collapsed" data-bs-toggle="collapse"
                                data-bs-target="#kt_accordion_2_item_1">
                                <span class="accordion-icon">
                                    <i class="ki-duotone ki-arrow-right fs-4"><span class="path1"></span><span
                                            class="path2"></span></i>
                                </span>
                                <h3 class="fs-4 fw-semibold mb-0 ms-4"> {{ __('admin::general.pages.emergencyCall.list.filters.filters') }}</h3>
                            </div>
                            <!--end::Header-->

                            <!--begin::Body-->
                            <div id="kt_accordion_2_item_1" class="fs-6 collapse my-2" data-bs-parent="#kt_accordion_2">
                                {{--
                                Available options for filter bar
                                1. Date range
                                2. Status
                                2. Subscriber number
                                3. Meter number
                                4. Phone number
                                5. Worker
                                6. Code (Custom ID show as Kod the custom ID in ui)
                                7. Category
                                8. Sub category
                                9. Search with like by the caller name and surname
                                --}}
                                <div class="row">
                                    {{-- //inputs --}}
                                    <div class="col-10">
                                        <div class="row">

                                            <input type="hidden" class="form-control" id="filter_date_start"
                                                placeholder="{{ __('admin::general.pages.emergencyCall.list.filters.start_date') }}">
                                            <input type="hidden" class="form-control" id="filter_date_end"
                                                placeholder="{{ __('admin::general.pages.emergencyCall.list.filters.end_date') }}">

                                            <div class="col-6 mt-5">
                                                <input class="form-control form-control-solid" placeholder="Pick date rage"
                                                    id="kt_daterangepicker_1" />
                                            </div>
                                            <div class="col-6 mt-5">
                                                {{-- 5. Worker --}}
                                                <select class="form-select form-select-solid" data-control="select2"
                                                    id="filter_worker_id" name="filter_worker_id"
                                                    data-placeholder="{{ __('admin::general.pages.emergencyCall.list.filters.select_an_worker') }}"
                                                    data-allow-clear="true">

                                                </select>
                                            </div>
                                            <div class="col-3 mt-5">
                                                {{-- 2. Subscriber number --}}
                                                <input type="text" class="form-control w-170px "
                                                    id="filter_subscriber_number"
                                                    placeholder="{{ __('admin::general.pages.emergencyCall.list.filters.subscriber_number') }}">
                                            </div>
                                            <div class="col-3 mt-5">
                                                {{-- 3. Meter number --}}
                                                <input type="text" class="form-control w-170px " id="filter_meter_number"
                                                    placeholder="{{ __('admin::general.pages.emergencyCall.list.filters.meter_number') }}">
                                            </div>
                                            <div class="col-3 mt-5">
                                                {{-- 4. Phone number --}}
                                                <input type="text" class="form-control w-170px " id="filter_phone_number"
                                                    placeholder="{{ __('admin::general.pages.emergencyCall.list.filters.phone_number') }}">
                                            </div>
                                            <div class="col-3 mt-5">
                                                <select id="filter_status" class="form-select form-select-solid"
                                                    data-control="select2"
                                                    data-placeholder="{{ __('admin::general.pages.emergencyCall.list.filters.select_an_status') }}"
                                                    data-allow-clear="true">
                                                </select>
                                            </div>
                                            <div class="col-3 mt-5">
                                                {{-- 6. Code (Custom ID show as Kod the custom ID in ui) --}}
                                                <input type="text" class="form-control w-170px" id="filter_custom_id"
                                                    placeholder="{{ __('admin::general.pages.emergencyCall.list.filters.custom_id') }}">
                                            </div>
                                            <div class="col-3 mt-5">
                                                <input type="text" class="form-control w-170px" id="filter_caller_search"
                                                    id="filter_caller_search"
                                                    placeholder="{{ __('admin::general.pages.emergencyCall.list.filters.caller_search') }}">
                                            </div>
                                            <div class="col-3 mt-5">
                                                <select class="form-select form-select-solid" data-control="select2"
                                                    id="filter_category_id" name="filter_category_id"
                                                    data-placeholder="{{ __('admin::general.pages.emergencyCall.list.filters.select_an_category') }}"
                                                    data-allow-clear="true">
                                                </select>
                                            </div>
                                            <div class="col-3 mt-5">
                                                {{-- 8. Sub category select --}}
                                                <select class="form-select form-select-solid" data-control="select2"
                                                    id="filter_sub_category_id" name="filter_sub_category_id"
                                                    data-placeholder="{{ __('admin::general.pages.emergencyCall.list.filters.select_an_sub_category') }}"
                                                    data-allow-clear="true">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- buttons --}}
                                    <div class="col-2">
                                        <div class="row">
                                            {{-- //reset button search button in div flex --}}
                                            <div class="col-12 mt-5">
                                                <button id="filterSearchBtn" type="button"
                                                    class="btn btn-primary w-100">{{ __('admin::general.pages.emergencyCall.list.filters.search') }}</button>
                                            </div>
                                            <div class="col-12 mt-5">
                                                <button id="filterResetBtn" type="button"
                                                    class="btn btn-secondary w-100">{{ __('admin::general.pages.emergencyCall.list.filters.reset') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Item-->
                    </div>
                    <!--end::Accordion-->
                    <table style="border-radius: 10px; overflow: hidden" id="kt_datatable_example_1"
                        class="table table-striped table-row-bordered align-middle fs-6 gy-5">
                        <thead>
                            <tr class="text-start text-white bg-primary fw-bold fs-7 text-uppercase gs-0">
                                {{-- <th class="w-10px pe-2">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="checkbox" data-kt-check="true"
                                            data-kt-check-target="#kt_datatable_example_1 .form-check-input"
                                            value="1" />
                                    </div>
                                </th> --}}
                                <th class="px-3 w-40px">{{ __('admin::general.pages.emergencyCall.list.HEADING.id') }}
                                </th>
                                <th class="w-125px">{{ __('admin::general.pages.emergencyCall.list.HEADING.custom_id') }}
                                </th>
                                <th>{{ __('admin::general.pages.emergencyCall.list.HEADING.caller') }}</th>
                                <th>{{ __('admin::general.pages.emergencyCall.list.HEADING.accident_address') }}
                                </th>
                                <th>{{ __('admin::general.pages.emergencyCall.list.HEADING.category_name') }}
                                </th>
                                <th>{{ __('admin::general.pages.emergencyCall.list.HEADING.sub_category_name') }}
                                </th>
                                <th>{{ __('admin::general.pages.emergencyCall.list.HEADING.note') }}</th>
                                <th>{{ __('admin::general.pages.emergencyCall.list.HEADING.status') }}</th>
                                <th>{{ __('admin::general.pages.emergencyCall.list.HEADING.worker') }}
                                </th>
                                <th>{{ __('admin::general.pages.emergencyCall.list.HEADING.created_at') }}</th>

                                <th class="px-3 text-end min-w-150px">{{ __('admin::general.pages.emergencyCall.list.HEADING.actions') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-semibold">
                        </tbody>
                    </table>
                    <!--end::Datatable-->
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Category-->
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->

{{--    @include('admin::pages.emergency-call.list.sections.add-modal')--}}
{{--    @include('admin::pages.emergency-call.list.sections.edit-modal')--}}
{{--    @include('admin::pages.emergency-call.list.sections.view-modal')--}}
{{--    @include('admin::pages.emergency-call.list.sections.assign-modal')--}}
{{--    @include('admin::pages.emergency-call.list.sections.select-address-modal')--}}
{{--    @include('admin::pages.emergency-call.list.sections.select-user-modal')--}}
@endsection

@section('scripts')
    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="{{ asset('admin/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used for this page only)-->
    {{-- <script src="{{asset('admin/assets/js/custom/apps/ecommerce/catalog/categories.js')}}"></script> --}}
    <script src="{{ asset('admin/assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom/utilities/modals/users-search.js') }}"></script>

    <script src="{{ asset('admin/assets/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
    <!--end::Custom Javascript-->


    <script>
        // Örnek marker eklemek için
        function removeNullValues(obj) {
            for (var key in obj) {
                if (obj[key] === null || obj[key] === undefined) {
                    delete obj[key];
                } else if (typeof obj[key] === 'object') {
                    removeNullValues(obj[key]);
                    // Eğer iç obje şu anda boşsa, ana objeden de silinmesi gerekebilir.
                    if (Object.keys(obj[key]).length === 0) {
                        delete obj[key];
                    }
                }
            }
        }

    </script>

{{--    @include('admin::pages.emergency-call.list.scripts.socketScript')--}}
{{--    @include('admin::pages.emergency-call.list.scripts.filterScript')--}}
{{--    @include('admin::pages.emergency-call.list.scripts.mapScript')--}}
{{--    @include('admin::pages.emergency-call.list.scripts.datatable')--}}
{{--    @include('admin::pages.emergency-call.list.scripts.add-modal')--}}
{{--    @include('admin::pages.emergency-call.list.scripts.view-modal')--}}
{{--    @include('admin::pages.emergency-call.list.scripts.assign-modal')--}}
{{--    @include('admin::pages.emergency-call.list.scripts.edit-modal')--}}
{{--    @include('admin::pages.emergency-call.list.scripts.select-address-modal')--}}
{{--    @include('admin::pages.emergency-call.list.scripts.select-user-modal')--}}
    <script>
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
        var lastInsertedId = 1;

        //get all readonly inputs add cursor:alias;
        var inputs = document.querySelectorAll('input[readonly]');
        for (var i = 0; i < inputs.length; i++) {
            inputs[i].style.cursor = 'unset';
        }

        var elements = Array.prototype.slice.call(document.querySelectorAll("[data-bs-stacked-modal]"));

        if (elements && elements.length > 0) {
            elements.forEach((element) => {
                if (element.getAttribute("data-kt-initialized") === "1") {
                    return;
                }

                element.setAttribute("data-kt-initialized", "1");

                element.addEventListener("click", function(e) {
                    e.preventDefault();

                    const modalEl = document.querySelector(this.getAttribute("data-bs-stacked-modal"));

                    if (modalEl) {
                        const modal = new bootstrap.Modal(modalEl);
                        modal.show();
                    }
                });
            });
        }
    </script>
{{--    <script>--}}
{{--        var AjaxLoaded = false;--}}
{{--        window.LoadSelectAddressModalAjax = async function LoadSelectAddressModalAjax() {--}}
{{--            console.log('LoadSelectAddressModalAjax');--}}
{{--            KTApp.showPageLoading();--}}


{{--            if (AjaxLoaded) {--}}
{{--                console.log('AjaxLoaded');--}}
{{--                KTApp.hidePageLoading();--}}
{{--                return;--}}
{{--            }--}}

{{--            AjaxLoaded = true;--}}

{{--            var cityDatas = null;--}}
{{--            var matrixDatas = null;--}}
{{--            var streetDatas = null;--}}
{{--            //get div kt_modal_new_address--}}
{{--            let modal = $('#kt_modal_new_address');--}}
{{--            //select named city--}}
{{--            let city = modal.find('select[name="city"]');--}}
{{--            let regions = modal.find('select[name="region"]');--}}
{{--            let streets = modal.find('select[name="street"]');--}}

{{--            let promise1 = new Promise((resolve, reject) => {--}}
{{--                //send ajax request to get city list--}}
{{--                $.ajax({--}}
{{--                    type: 'GET',--}}
{{--                    url: "{{ route('shared.agis-service.cities') }}",--}}
{{--                    success: function(response) {--}}
{{--                        //check response--}}
{{--                        if (response.Cities.length > 0) {--}}
{{--                            //set city datas--}}
{{--                            window.cityDatas = response.Cities;--}}
{{--                            //loop city datas--}}
{{--                            $.each(window.cityDatas, function(index, cityData) {--}}
{{--                                //append city to select--}}
{{--                                city.append('<option value="' + cityData--}}
{{--                                    .Subjectid + '">' + cityData.Name + '</option>');--}}

{{--                                //city is select element append is not working--}}
{{--                                // city.append(new Option(city.Name, city.Subjectid));--}}
{{--                            });--}}
{{--                            resolve(null);--}}
{{--                        }--}}
{{--                    }--}}
{{--                });--}}
{{--            });--}}

{{--            let promise2 = new Promise((resolve, reject) => {--}}
{{--                //send ajax request to get regions list--}}
{{--                $.ajax({--}}
{{--                    type: 'GET',--}}
{{--                    url: "{{ route('shared.agis-service.regions') }}",--}}
{{--                    success: function(response) {--}}
{{--                        //check response--}}
{{--                        if (response.Regions.length > 0) {--}}
{{--                            //set city datas--}}
{{--                            window.matrixDatas = response.Regions;--}}
{{--                            //loop city datas--}}
{{--                            $.each(window.matrixDatas, function(index, region) {--}}
{{--                                //append city to select--}}
{{--                                regions.append('<option value="' + region--}}
{{--                                    .Matrixid + '">' + region.Name + '</option>');--}}
{{--                            });--}}
{{--                            resolve(null);--}}
{{--                        }--}}
{{--                    }--}}
{{--                });--}}
{{--            });--}}

{{--            let promise3 = new Promise((resolve, reject) => {--}}
{{--                //send ajax request to get streets list--}}
{{--                $.ajax({--}}
{{--                    type: 'GET',--}}
{{--                    url: "{{ route('shared.agis-service.streets') }}",--}}
{{--                    success: function(response) {--}}
{{--                        //check response--}}
{{--                        if (response.Streets.length > 0) {--}}
{{--                            //set city datas--}}
{{--                            window.streetDatas = response.Streets;--}}
{{--                            //loop city datas--}}
{{--                            $.each(window.streetDatas, function(index, street) {--}}
{{--                                //append city to select--}}
{{--                                streets.append('<option value="' + street--}}
{{--                                    .Streetid + '">' + street.Name + '</option>');--}}
{{--                            });--}}
{{--                            resolve(null);--}}
{{--                        }--}}
{{--                    }--}}
{{--                });--}}
{{--            });--}}
{{--            await promise1;--}}
{{--            console.log('LoadSelectAddressModalAjax end');--}}
{{--            await promise2;--}}
{{--            console.log('LoadSelectAddressModalAjax end2');--}}
{{--            await promise3;--}}
{{--            console.log('LoadSelectAddressModalAjax end3');--}}
{{--            //add on change to city--}}
{{--            city.change(function() {--}}
{{--                console.log('city change');--}}
{{--                //get selected city id--}}
{{--                let cityId = $(this).val();--}}
{{--                regions.html('');--}}
{{--                streets.html('');--}}

{{--                //filter matrix datas--}}
{{--                let filteredMatrixDatas = window.matrixDatas.filter(function(matrix) {--}}
{{--                    return matrix.Subjectid == cityId && matrix.Name != null;--}}
{{--                });--}}

{{--                //loop filtered matrix datas--}}
{{--                $.each(filteredMatrixDatas, function(index, matrix) {--}}
{{--                    //append matrix to select--}}
{{--                    regions.append('<option value="' + matrix--}}
{{--                        .Matrixid + '">' + matrix.Name + '</option>');--}}
{{--                });--}}

{{--                //filter street datas--}}
{{--                let filteredStreetDatas = window.streetDatas.filter(function(street) {--}}
{{--                    return street.Subjectid == cityId && street.Matrixid == regions.val();--}}
{{--                });--}}

{{--                //remove null value--}}
{{--                filteredStreetDatas = filteredStreetDatas.filter(function(street) {--}}
{{--                    return street.Name != null && street.Name != '';--}}
{{--                });--}}

{{--                //loop filtered street datas--}}
{{--                $.each(filteredStreetDatas, function(index, street) {--}}
{{--                    //append matrix to select--}}
{{--                    streets.append('<option value="' + street--}}
{{--                        .Name + '">' + street.Name + '</option>');--}}
{{--                });--}}
{{--                //trigger change--}}
{{--                regions.trigger('change');--}}
{{--            });--}}

{{--            //add on change to region--}}
{{--            regions.change(function() {--}}
{{--                //get selected city id--}}
{{--                let regionId = $(this).val();--}}
{{--                streets.html('');--}}

{{--                //filter matrix datas--}}
{{--                let filteredStreetDatas = window.streetDatas.filter(function(street) {--}}
{{--                    return street.Matrixid == regionId && street.Subjectid == city.val() &&--}}
{{--                        street--}}
{{--                        .Name != null;--}}
{{--                });--}}

{{--                //loop filtered matrix datas--}}
{{--                $.each(filteredStreetDatas, function(index, street) {--}}
{{--                    //append matrix to select--}}
{{--                    streets.append('<option value="' + street--}}
{{--                        .Streetid + '">' + street.Name + '</option>');--}}
{{--                });--}}
{{--                //trigger change--}}
{{--                streets.trigger('change');--}}
{{--            });--}}
{{--            city.trigger('change');--}}
{{--            KTApp.hidePageLoading();--}}
{{--        }--}}
{{--    </script>--}}
@endsection

@section('styles')
    <style>
        .select2-dropdown.select2-dropdown--below {
            z-index: 999999999 !important;
        }
    </style>

    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="{{ asset('admin/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <!--end::Vendor Stylesheets-->
    <style>
        .select2-dropdown.select2-dropdown--below {
            z-index: 999999999 !important;
        }

        .sticky-header {
            position: sticky;
            top: 0;
            background: white;
            z-index: 10;
        }
    </style>
@endsection
