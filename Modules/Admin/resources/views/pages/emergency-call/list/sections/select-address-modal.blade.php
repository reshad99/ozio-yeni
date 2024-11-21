<!--begin::Modal - New Address-->
<div class="modal fade" id="kt_modal_new_address" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Form-->
            <form class="form" action="#" id="kt_modal_new_address_form">
                <!--begin::Modal header-->
                <div class="modal-header bg-primary" id="kt_modal_new_address_header">
                    <h2 class="w-100 text-start modal-title text-white">
                        {{ __('admin::general.pages.emergencyCall.list.select_address_modal.select_address') }}</h2>
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-solid ki-cross text-white fs-2hx"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body py-10 px-lg-17">
                    <div class="scroll-y me-n7 pe-7" id="kt_modal_new_address_scroll" data-kt-scroll="true"
                        data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                        data-kt-scroll-dependencies="#kt_modal_new_address_header"
                        data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                <span class=""> {{ __('admin::general.pages.emergencyCall.list.select_address_modal.city') }}</span>
                                <span class="ms-1" data-bs-toggle="tooltip"
                                    title="Your payment statements may very based on selected country">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <select name="city" data-control="select2" data-dropdown-parent="#kt_modal_new_address"
                                class="form-select form-select-solid">
                            </select>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                <span class=""> {{ __('admin::general.pages.emergencyCall.list.select_address_modal.region') }}</span>
                                <span class="ms-1" data-bs-toggle="tooltip"
                                    title="Your payment statements may very based on selected country">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <select name="region" data-control="select2" data-dropdown-parent="#kt_modal_new_address"
                                class="form-select form-select-solid">

                            </select>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                <span class=""> {{ __('admin::general.pages.emergencyCall.list.select_address_modal.street') }}</span>
                                <span class="ms-1" data-bs-toggle="tooltip"
                                    title="Your payment statements may very based on selected country">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">

                                    </i>
                                </span>
                            </label>
                            <select name="street" data-control="select2" data-dropdown-parent="#kt_modal_new_address"
                                class="form-select form-select-solid">
                            </select>
                        </div>
                        <div class="d-flex flex-column mb-5 fv-row">
                            <label class="required fs-5 fw-semibold mb-2"> {{ __('admin::general.pages.emergencyCall.list.select_address_modal.building') }}</label>
                            <input id="house_number" class="form-control "
                                name="building_home">
                        </div>
                        <div class="d-flex flex-column mb-5 fv-row">
                            <label class="required fs-5 fw-semibold mb-2"> {{ __('admin::general.pages.emergencyCall.list.select_address_modal.apartment') }}</label>
                            <input id="flat_number" class="form-control "
                                name="flat">
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Scroll-->
                </div>
                <!--end::Modal body-->
                <!--begin::Modal footer-->
                <div class="modal-footer flex-center">
                    <!--begin::Button-->
                    <button type="reset" id="kt_modal_new_address_cancel" class="btn btn-light me-3"> {{ __('admin::general.pages.emergencyCall.list.select_address_modal.cancel') }}</button>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <button type="submit" id="kt_modal_new_address_submit" class="btn btn-primary">
                        <span class="indicator-label"> {{ __('admin::general.pages.emergencyCall.list.select_address_modal.add') }}</span>
                        <span class="indicator-progress"> {{ __('admin::general.pages.emergencyCall.list.select_address_modal.wait') }}...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                    <!--end::Button-->
                </div>
                <!--end::Modal footer-->
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>
<!--end::Modal - New Address-->
