<!--begin::Card header-->
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
            <h3 class="fs-4 fw-semibold mb-0 ms-4"> Filtirlər</h3>
        </div>
        <!--end::Header-->

        <!--begin::Body-->
        <div id="kt_accordion_2_item_1" class="fs-6 collapse my-2" data-bs-parent="#kt_accordion_2">

            <div class="row">

                <div class="col-10">
                    <div class="row">

                        <input type="hidden" class="form-control" id="filter_date_start"
                            placeholder="{{ __('admin::general.pages.emergencyCall.list.filters.start_date') }}">
                        <input type="hidden" class="form-control" id="filter_date_end"
                            placeholder="{{ __('admin::general.pages.emergencyCall.list.filters.end_date') }}">

                        <div class="col-6 mt-5">
                            <input class="form-control form-control-solid"
                                placeholder="Pick date rage" id="kt_daterangepicker_1" />
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
                            <input type="text" class="form-control w-170px "
                                id="filter_meter_number"
                                placeholder="{{ __('admin::general.pages.emergencyCall.list.filters.meter_number') }}">
                        </div>
                        <div class="col-3 mt-5">
                            {{-- 4. Phone number --}}
                            <input type="text" class="form-control w-170px "
                                id="filter_phone_number"
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
                            <input type="text" class="form-control w-170px"
                                id="filter_caller_search" id="filter_caller_search"
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

                <div class="col-2">
                    <div class="row">

                        <div class="col-12 mt-5">
                            <button id="filterSearchBtn" type="button"
                                class="btn btn-primary w-100">Axtar
                            </button>
                        </div>
                        <div class="col-12 mt-5">
                            <button id="filterResetBtn" type="button"
                                class="btn btn-secondary w-100">Sıfırla
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Body-->
    </div>
    <!--end::Item-->
</div>