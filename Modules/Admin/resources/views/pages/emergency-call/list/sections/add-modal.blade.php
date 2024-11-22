<!--begin::Modal - New Target-->
<div class="modal fade" id="kt_modal_new_target" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered min-w-1000px">
        <!--begin::Modal content-->
        <div class="modal-content rounded">
            <!--begin::Modal header-->
            <div class="modal-header pb-md-5 border-0 justify-content-end bg-primary">
                <!--begin::Title-->
                <h2 class="w-100 text-start modal-title text-white">
                    {{ __('admin::general.pages.emergencyCall.list.new_emergencycall') }}</h2>
                <!-- Title added here -->
                <!--end::Title-->

                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="ki-solid ki-cross text-white fs-2hx"></i>
                </div>
                <!--end::Close-->
            </div>
            <!--begin::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y px-10 px-lg-15 pt-5 pb-15">
                <!--begin:Form-->
                <form id="kt_modal_new_target_form" class="form" action="">
                    <div class="row">
                        <div class="col-12 col-lg-12">
                            <!--begin::Input group-->
                            <div class="row g-9 mb-8">

                                <div class="col-md-4 fv-row">
                                    <label class="required fs-5 fw-semibold mb-2">{{ __('admin::general.pages.emergencyCall.list.add_modal.job_number') }}</label>
                                    <input id="custom_id_section" disabled class="form-control "
                                        name="emergency_call_number">
                                </div>

                                <!--begin::Col-->
                                <div class="col-md-4 fv-row">
                                    <label
                                        class="required fs-6 fw-semibold mb-2">{{ __('admin::general.pages.emergencyCall.list.category') }}</label>
                                    <select class="form-select form-select-solid" data-control="select2"
                                        data-hide-search="true" name="category_id">
                                        @foreach ($mainAccidentCategories as $mainAccidentCategory)
                                            <option value="{{ $mainAccidentCategory->id }}">
                                                {{ $mainAccidentCategory->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-md-4 fv-row">
                                    <label
                                        class="required fs-6 fw-semibold mb-2">{{ __('admin::general.pages.emergencyCall.list.sub_category') }}</label>
                                    <select class="form-select form-select-solid" data-control="select2"
                                        data-hide-search="true" name="sub_category_id">

                                    </select>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-8 fv-row">

                                <label
                                    class=" fs-6 fw-semibold mb-2">{{ __('admin::general.pages.emergencyCall.list.accident_description') }}</label>
                                <textarea class="form-control  accident_description" rows="3" name="accident_description"></textarea>
                            </div>
                            <div class="col-md-12 fv-row">
                                <label class=" fs-5 fw-semibold mb-2">{{ __('admin::general.pages.emergencyCall.list.add_modal.crm_code') }}</label>
                                <input class="form-control " name="crm_code">
                            </div>

                            <!--end::Input group-->


                            <div class="separator border-3 my-10"></div>

                            <div class="row border border-2 py-5" style="border-radius: 6px">
                                <div class="mb-5 hover-scroll-x">
                                    <div class="d-grid">
                                        <ul class="nav nav-tabs flex-nowrap text-nowrap">
                                            <li class="nav-item active">
                                                <a class="nav-link btn btn-active-light btn-color-gray-600 btn-active-color-primary rounded-bottom-0 active"
                                                    data-bs-toggle="tab" aria-selected="true"
                                                    href="#kt_tab_pane_1">{{ __('admin::general.pages.emergencyCall.list.add_modal.subscriber') }}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link btn btn-active-light btn-color-gray-600 btn-active-color-primary rounded-bottom-0"
                                                    data-bs-toggle="tab" aria-selected="false"
                                                    href="#kt_tab_pane_2">{{ __('admin::general.pages.emergencyCall.list.add_modal.non_subscriber') }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel">

                                        <div class="row g-9 mb-8">
                                            <div class="col-12">
                                                <a class="w-100 btn btn-primary"
                                                    data-bs-stacked-modal="#kt_modal_select_users">{{ __('admin::general.pages.emergencyCall.list.add_modal.select_subscriber') }}</a>
                                            </div>
                                            <div class="col-md-4 fv-row">
                                                <label
                                                    class=" fs-5 fw-semibold mb-2">{{ __('admin::general.pages.emergencyCall.list.caller_first_name') }}</label>
                                                <input readonly class="form-control "
                                                    name="subscriber_caller_first_name">
                                            </div>
                                            <div class="col-md-4 fv-row">
                                                <label
                                                    class=" fs-5 fw-semibold mb-2">{{ __('admin::general.pages.emergencyCall.list.caller_last_name') }}</label>
                                                <input readonly class="form-control "
                                                    name="subscriber_caller_last_name">
                                            </div>
                                            <div class="col-md-4 fv-row">
                                                <label
                                                    class=" fs-5 fw-semibold mb-2">{{ __('admin::general.pages.emergencyCall.list.caller_father_name') }}</label>
                                                <input readonly class="form-control "
                                                    name="subscriber_caller_father_name">
                                            </div>
                                        </div>

                                        <div class="row g-9 mb-8">
                                            <div class="col-md-4 fv-row">
                                                <label class=" fs-5 fw-semibold mb-2">{{ __('admin::general.pages.emergencyCall.list.add_modal.fin') }}</label>
                                                <input readonly class="form-control " name="subscriber_caller_fin">
                                            </div>
                                            <div class="col-md-4 fv-row">
                                                <label class="fs-5 fw-semibold mb-2"
                                                    for="input_subscriber_number">{{ __('admin::general.pages.emergencyCall.list.subscriber_number') }}</label>
                                                <input readonly class="form-control " id="input_subscriber_number"
                                                    name="subscriber_subscriber_number">
                                            </div>
                                            <div class="col-md-4 fv-row">
                                                <label class="fs-5 fw-semibold mb-2" for="input_meter_number">{{ __('admin::general.pages.emergencyCall.list.add_modal.meter_number') }}</label>
                                                <input readonly class="form-control " id="input_meter_number"
                                                    name="subscriber_meter_number">
                                            </div>
                                            <div class="col-md-12 fv-row">
                                                <label class="fs-5 fw-semibold mb-2"
                                                    for="input_passport_number">{{ __('admin::general.pages.emergencyCall.list.add_modal.passport_number') }}</label>
                                                <input readonly class="form-control " id="input_passport_number"
                                                    name="subscriber_passport_number">
                                            </div>
                                            <input type="hidden" name="subscriber_city" value="">
                                            <input type="hidden" name="subscriber_region" value="">
                                            <input type="hidden" name="subscriber_street" value="">
                                            <input type="hidden" name="subscriber_house_number" value="">
                                            <input type="hidden" name="subscriber_flat_number" value="">
                                            <input type="hidden" name="subscriber_is_subscriber" value="">
                                        </div>

                                        <div class="row g-9 mb-8">
                                            <div class="col-md-12">
                                                <label class=" fs-5 fw-semibold mb-2">{{ __('admin::general.pages.emergencyCall.list.add_modal.address') }}</label>
                                                <input class="form-control " readonly
                                                    name="subscriber_accident_address">
                                            </div>
                                        </div>
                                        <div class="row g-9 mb-8">
                                            <div class="col-md-8 fv-row">
                                                <label class=" fs-5 fw-semibold mb-2">{{ __('admin::general.pages.emergencyCall.list.add_modal.orientation') }}</label>
                                                <input class="form-control " name="address">
                                            </div>
                                            <div class="col-md-4 fv-row">
                                                <label class=" fs-5 fw-semibold mb-2">{{ __('admin::general.pages.emergencyCall.list.add_modal.subscriber') }}
                                                    {{ __('admin::general.pages.emergencyCall.list.caller_phone_number') }}</label>
                                                <input type="tel" class="form-control "
                                                    name="caller_phone_number">
                                            </div>
                                        </div>
                                        <div class="row g-9 mb-8">
                                            <div class="col-md-8 fv-row">
                                                <label class=" fs-5 fw-semibold mb-2">{{ __('admin::general.pages.emergencyCall.list.add_modal.caller_full_name') }}</label>
                                                <input class="form-control " name="caller_fullname">
                                            </div>
                                            <div class="col-md-4 fv-row">
                                                <label class=" fs-5 fw-semibold mb-2">{{ __('admin::general.pages.emergencyCall.list.add_modal.caller_phone_number') }}</label>
                                                <input type="tel" class="form-control " name="caller_phone">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel">
                                        <div class="row g-9 mb-8">
                                            <div class="col-md-4 fv-row">
                                                <label
                                                    class=" fs-5 fw-semibold mb-2">{{ __('admin::general.pages.emergencyCall.list.caller_first_name') }}</label>
                                                <input class="form-control " name="subscriber_caller_first_name">
                                            </div>
                                            <div class="col-md-4 fv-row">
                                                <label
                                                    class=" fs-5 fw-semibold mb-2">{{ __('admin::general.pages.emergencyCall.list.caller_last_name') }}</label>
                                                <input class="form-control " name="subscriber_caller_last_name">
                                            </div>
                                            <div class="col-md-4 fv-row">
                                                <label
                                                    class=" fs-5 fw-semibold mb-2">{{ __('admin::general.pages.emergencyCall.list.caller_father_name') }}</label>
                                                <input class="form-control " name="subscriber_caller_father_name">
                                            </div>
                                        </div>

                                        <div class="row g-9 mb-8">
                                            <div class="col-md-4 fv-row">
                                                <label class=" fs-5 fw-semibold mb-2">{{ __('admin::general.pages.emergencyCall.list.add_modal.fin') }}</label>
                                                <input class="form-control " name="subscriber_caller_fin">
                                            </div>
                                            <div class="col-md-4 fv-row">
                                                <label class="fs-5 fw-semibold mb-2"
                                                    for="input_subscriber_number">{{ __('admin::general.pages.emergencyCall.list.subscriber_number') }}</label>
                                                <input class="form-control " id="input_subscriber_number"
                                                    name="subscriber_subscriber_number">
                                            </div>
                                            <div class="col-md-4 fv-row">
                                                <label class="fs-5 fw-semibold mb-2" for="input_meter_number">{{ __('admin::general.pages.emergencyCall.list.add_modal.meter_number') }}</label>
                                                <input class="form-control " id="input_meter_number"
                                                    name="subscriber_meter_number">
                                            </div>
                                            <div class="col-md-12 fv-row">
                                                <label class="fs-5 fw-semibold mb-2"
                                                    for="input_passport_number">{{ __('admin::general.pages.emergencyCall.list.add_modal.passport_number') }}</label>
                                                <input class="form-control " id="input_passport_number"
                                                    name="subscriber_passport_number">
                                            </div>
                                            <input type="hidden" name="subscriber_city" value="">
                                            <input type="hidden" name="subscriber_region" value="">
                                            <input type="hidden" name="subscriber_street" value="">
                                            <input type="hidden" name="subscriber_house_number" value="">
                                            <input type="hidden" name="subscriber_flat_number" value="">
                                            <input type="hidden" name="subscriber_is_subscriber" value="">
                                        </div>

                                        <div class="row g-9 mb-8">
                                            <div class="col-md-10">
                                                <input class="form-control " readonly
                                                    name="subscriber_accident_address">
                                            </div>
                                            <div class="col-md-2">
                                                <a class="w-100 btn btn-primary"
                                                    data-bs-stacked-modal="#kt_modal_new_address">{{ __('admin::general.pages.emergencyCall.list.add_modal.select_address') }}</a>
                                            </div>
                                        </div>

                                        <div class="row g-9 mb-8">
                                            <div class="col-md-8 fv-row">
                                                <label class=" fs-5 fw-semibold mb-2">{{ __('admin::general.pages.emergencyCall.list.add_modal.orientation') }}</label>
                                                <input class="form-control " name="address">
                                            </div>
                                            <div class="col-md-4 fv-row">
                                                <label
                                                    class=" fs-5 fw-semibold mb-2">{{ __('admin::general.pages.emergencyCall.list.caller_phone_number') }}</label>
                                                <input type="tel" class="form-control "
                                                    name="caller_phone_number">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-12 col-lg-4">

                        </div>
                    </div>
                    <!--begin::Actions-->
                    <div class="text-center mt-5">
                        <button type="button" id="kt_modal_new_target_submit" class="btn btn-primary">
                            <span
                                class="indicator-label">{{ __('admin::general.pages.emergencyCall.list.save') }}</span>
                            <span
                                class="indicator-progress">{{ __('admin::general.pages.emergencyCall.list.wait') }}...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <button type="reset" id="kt_modal_new_target_cancel"
                            class="btn btn-light me-3">{{ __('admin::general.pages.emergencyCall.list.cancel') }}</button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end:Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - New Target-->
