<!--begin::Modal - New Target-->
<div class="modal fade" id="kt_modal_new2_target" style="overflow:hidden" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered min-w-1000px">
        <!--begin::Modal content-->
        <div class="modal-content rounded">
            <!--begin::Modal header-->
            <div class="modal-header pb-md-5 border-0 justify-content-end bg-primary">
                <!--begin::Title-->
                <h2 class="w-100 text-start modal-title text-white">
                    {{ __('admin::general.pages.department.list.add_new_department') }}</h2>
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
                    {{-- //edit id  --}}
                    <input type="hidden" name="edit_id" id="edit_id">
                    <div class="row">
                        <div class="col-12 col-lg-12">
                            <!--begin::Input group-->
                            <div class="row g-9 mb-8">

                                <div class="col-md-6 fv-row">
                                    <label
                                        class="required fs-5 fw-semibold mb-2">{{ __('admin::general.pages.department.list.department_name') }}</label>
                                    <input class="form-control " name="name">
                                </div>
                                <div class="col-md-6 fv-row">
                                    <label
                                        for="department-select2" class="required fs-5 fw-semibold mb-2">{{ __('admin::general.pages.department.list.department_region_id') }}</label>
                                    <select id="department-select2" class="form-select form-select-solid"
                                        name="region_id">

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
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
