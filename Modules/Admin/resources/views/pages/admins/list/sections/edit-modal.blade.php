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
                    {{ __('admin::general.pages.admins.list.add_new_admin') }}</h2>
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
                                        class="required fw-semibold fs-6 mb-2">{{ __('admin::general.pages.admins.list.table.name') }}</label>
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
                                        class="required fw-semibold fs-6 mb-2">{{ __('admin::general.pages.admins.list.table.email') }}</label>
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
                                        class="required fw-semibold fs-6 mb-2">{{ __('admin::general.pages.admins.list.table.phone') }}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input name="phone" id=""
                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                        placeholder="example@domain.com" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label for="password"
                                        class="required fw-semibold fs-6 mb-2">{{ __('admin::general.pages.admins.list.table.password') }}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="password" name="password" id="password"
                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                        placeholder="example@domain.com" />
                                    <!--end::Input-->
                                </div>
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label for="password_confirmation"
                                        class="required fw-semibold fs-6 mb-2">{{ __('admin::general.pages.admins.list.table.password_confirmation') }}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                        placeholder="Confirm password" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
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
