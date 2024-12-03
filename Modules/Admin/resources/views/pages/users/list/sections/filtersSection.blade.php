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
            <h3 class="fs-5 fw-semibold mb-0 ms-4">{{ __('admin::general.filters.title') }}</h3>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div id="kt_accordion_2_item_1" class="fs-6 collapse my-2" data-bs-parent="#kt_accordion_2">
            <div class="row">
                <div class="col-10">
                    <div class="row">
                        <input type="hidden" class="form-control" id="filter_date_start"
                               placeholder="{{ __('admin::general.filters.start_date') }}">
                        <input type="hidden" class="form-control" id="filter_date_end"
                               placeholder="{{ __('admin::general.filters.end_date') }}">

                        <div class="col-6 mt-5">
                            <label for="kt_daterangepicker_1">{{__('admin::general.filters.created_at_range')}}</label>
                            <input class="form-control form-control-solid"
                                   placeholder="Pick date rage" id="kt_daterangepicker_1"/>
                        </div>
                        <div class="col-3 mt-5">
                            <label for="filter_username">{{ __('admin::general.filters.username') }}</label>
                            <input type="text" class="form-control w-170px "
                                   id="filter_username"
                                   placeholder="{{ __('admin::general.filters.username') }}">
                        </div>
                        <div class="col-3 mt-5">
                            <label for="filter_email">{{ __('admin::general.filters.email') }}</label>
                            <input type="text" class="form-control w-170px "
                                   id="filter_email"
                                   placeholder="{{ __('admin::general.filters.email') }}">
                        </div>
                        <div class="col-3 mt-5">
                            <label for="filter_phone_number">{{ __('admin::general.filters.phone_number') }}</label>
                            <input type="text" class="form-control w-170px "
                                   id="filter_phone_number"
                                   placeholder="{{ __('admin::general.filters.phone_number') }}">
                        </div>
                        <div class="col-3 mt-5">
                            <label for="filter_bonus_card_no">{{ __('admin::general.filters.bonus_card_no') }}</label>
                            <input type="text" class="form-control w-170px "
                                   id="filter_bonus_card_no"
                                   placeholder="{{ __('admin::general.filters.bonus_card_no') }}">
                        </div>
                    </div>

                </div>

                <div class="col-2 ">
                    <div class="row">
                        <div class="col-12 mt-5">
                            <button id="filterSearchBtn" type="button"
                                    class="btn btn-primary w-100">{{ __('admin::general.filters.search') }}
                            </button>
                        </div>
                        <div class="col-12 mt-5">
                            <button id="filterResetBtn" type="button"
                                    class="btn btn-secondary w-100">{{ __('admin::general.filters.reset') }}
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
