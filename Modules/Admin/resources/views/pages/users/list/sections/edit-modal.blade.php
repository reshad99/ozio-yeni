<!--begin::Modal - New Target-->
<div class="modal fade" id="kt_modal_new2_target" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered min-w-1000px">
        <!--begin::Modal content-->
        <div class="modal-content rounded">
            <!--begin::Modal header-->
            <div class="modal-header pb-md-5 border-0 justify-content-end">
                <!--begin::Title-->
                <h2 class="w-100 text-start modal-title fw-bold">
                    {{ __('admin::general.pages.users.list.add_new_user') }}</h2>
                <!-- Title added here -->
                <!--end::Title-->

                <!--begin::Close-->
                {{-- <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="ki-solid ki-cross text-white fs-2hx"></i>
                </div> --}}
                <!--end::Close-->
            </div>
            <!--begin::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y px-10 px-lg-15 pt-5 pb-15">
                <!--begin:Form-->
                <form id="kt_modal_new2_target_form" class="form" action="">
                    <input type="hidden" name="edit_id" value="">
                    <div class="row">
                        <div class="col-12 col-lg-12">
                            <!--begin::Input group-->
                            <div class="row g-9 mb-8">
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label for="name"
                                        class="required fw-semibold fs-6 mb-2">{{ __('admin::general.pages.users.list.table.name') }}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="name" id="name"
                                        class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Full name" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label for="email"
                                        class="required fw-semibold fs-6 mb-2">{{ __('admin::general.pages.users.list.table.email') }}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="email" name="email" id="email"
                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                        placeholder="example@domain.com" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label for="phone"
                                        class="required fw-semibold fs-6 mb-2">{{ __('admin::general.pages.users.list.table.phone') }}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input name="phone" id="phone"
                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                        placeholder="example@domain.com" />
                                    <!--end::Input-->
                                </div>
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label for="bonus_card_no"
                                        class="required fw-semibold fs-6 mb-2">{{ __('admin::general.pages.users.list.table.bonus_card_no') }}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input name="bonus_card_no" id="bonus_card_no"
                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                        placeholder="example@domain.com" />
                                    <!--end::Input-->
                                </div>
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label for="want_notification" class="required fw-semibold fs-6 mb-2">{{ __('admin::general.pages.users.list.table.want_notification') }}</label>
                                    <!--end::Label-->
                                    <!--begin::Input (Checkbox)-->
                                    <input type="checkbox" name="want_notification" id="want_notification" class="form-check-input mb-3 mb-lg-0" />
                                    <!--end::Input-->
                                </div>

                            </div>
                        </div>
                        <!--begin::Actions-->
                        <div class="text-center mt-5">
                            <button type="button" id="kt_modal_new2_target_submit" class="btn btn-primary">
                                <span class="indicator-label">{{ __('admin::general.shared.save') }}</span>
                                <span class="indicator-progress">{{ __('admin::general.shared.please_wait') }}...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                            <button type="reset" id="kt_modal_new2_target_cancel"
                                class="btn btn-light me-3">{{ __('admin::general.shared.cancel') }}</button>
                        </div>
                        <!--end::Actions-->
                    </div>
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
