<!--begin::Modal - New Target-->
<div class="modal fade" id="kt_modal_new2_target" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered min-w-1000px">
        <!--begin::Modal content-->
        <div class="modal-content rounded">
            <!--begin::Modal header-->
            <div class="modal-header pb-md-5 border-0 justify-content-end bg-primary">
                <!--begin::Title-->
                <h2 class="w-100 text-start modal-title text-white">
                    {{ __('admin::general.pages.users.list.add_new_user') }}</h2>
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
                <form id="kt_modal_new2_target_form" class="form" action="">
                    <input type="hidden" name="edit_id" value="">
                    <div class="row">
                        <div class="col-12 col-lg-12">
                            <!--begin::Input group-->
                            <div class="row g-9 mb-8">
                                <div class="fv-row mb-7 col-6">
                                    <!--begin::Label-->
                                    <label
                                        class="required fw-semibold fs-6 mb-2">{{ __('admin::general.pages.users.list.first_name') }}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="first_name" class="form-control  mb-3 mb-lg-0"
                                        placeholder="{{ __('admin::general.pages.users.list.first_name') }}" />
                                    <!--end::Input-->
                                </div>
                                <!--begin::Input group-->
                                <div class="fv-row mb-7 col-6">
                                    <!--begin::Label-->
                                    <label
                                        class="required fw-semibold fs-6 mb-2">{{ __('admin::general.pages.users.list.last_name') }}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="last_name" class="form-control  mb-3 mb-lg-0"
                                        placeholder="{{ __('admin::general.pages.users.list.last_name') }}" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input-->
                                <div class="fv-row mb-7 col-6">
                                    <!--begin::Label-->
                                    <label
                                        class="required fw-semibold fs-6 mb-2">{{ __('admin::general.pages.users.list.father_name') }}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="father_name" class="form-control  mb-3 mb-lg-0"
                                        placeholder="{{ __('admin::general.pages.users.list.search_user') }}" />
                                    <!--end::Input-->
                                </div>
                                <div class="fv-row mb-7 col-6">
                                    <!--begin::Label-->
                                    <label
                                        class="fw-semibold fs-6 mb-2 required">{{ __('admin::general.pages.users.list.phone_number') }}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="phone" class="form-control  mb-3 mb-lg-0"
                                        placeholder="{{ __('admin::general.pages.users.list.phone_number') }}" />
                                    <!--end::Input-->
                                </div>
                                <div class="fv-row mb-7 col-4">
                                    <label
                                        class="fw-semibold fs-6 mb-2 required">{{ __('admin::general.pages.users.list.working_organisation') }}</label>
                                    <select id="org-select2" class="form-select form-select-solid"
                                        name="organisation_id">
                                        <option value="0">
                                            {{ __('admin::general.pages.users.list.none') }}</option>
                                    </select>
                                </div>
                                <div class="fv-row mb-7 col-4">
                                    <label
                                        class="fw-semibold fs-6 mb-2">{{ __('admin::general.pages.users.list.working_region') }}</label>
                                    <select id="reg-select2" class="form-select form-select-solid" name="region_id">
                                        <option value="unset">
                                            {{ __('admin::general.pages.users.list.none') }}</option>
                                    </select>
                                </div>
                                <div class="fv-row mb-7 col-4">
                                    <label
                                        class="fw-semibold fs-6 mb-2">{{ __('admin::general.pages.users.list.working_department') }}</label>
                                    <select id="department-select2" class="form-select form-select-solid"
                                        name="department_id">
                                        <option value="unset">
                                            {{ __('admin::general.pages.users.list.none') }}</option>
                                    </select>
                                </div>
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label
                                        class="required fw-semibold fs-6 mb-2">{{ __('admin::general.pages.users.list.email') }}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="email" name="email" class="form-control  mb-3 mb-lg-0"
                                        placeholder="{{ __('admin::general.pages.users.list.email') }}" />
                                    <!--end::Input-->
                                </div>
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label
                                        class="fw-semibold fs-6 mb-2">{{ __('admin::general.pages.users.list.password') }}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="password" name="password" class="form-control  mb-3 mb-lg-0"
                                        placeholder="Password" />
                                    <!--end::Input-->
                                </div>
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label
                                        class="fw-semibold fs-6 mb-2">{{ __('admin::general.pages.users.list.confirm_password') }}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="password" name="password_confirmation"
                                        class="form-control  mb-3 mb-lg-0"
                                        placeholder="{{ __('admin::general.pages.users.list.confirm_password') }}" />
                                    <!--end::Input-->
                                </div>

                                <!--end::Input group-->
                                <div class="mb-5 role-section col-6">
                                    <!--begin::Label-->

                                </div>
                                <div class="fv-row mb-5 col-6 module-section">

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
