<!--begin::Modal - New Target-->
@can('create-department')
<div class="modal fade" id="kt_modal_new_target" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered min-w-1000px">
        <div class="modal-content rounded">
            <div class="modal-header pb-md-5 border-0 justify-content-end bg-primary">
                <h2 class="w-100 text-start modal-title text-white">
                    {{ __('admin::general.pages.department.list.add_new_department') }}</h2>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="ki-solid ki-cross text-white fs-2hx"></i>
                </div>
            </div>
            <div class="modal-body scroll-y px-10 px-lg-15 pt-5 pb-15">
                <form id="kt_modal_new_target_form" class="form" action="">
                    <div class="row">
                        <div class="col-12 col-lg-12">
                            <div class="row g-9 mb-8">

                                <div class="col-md-6 fv-row">
                                    <label for="name-input" class="required fs-5 fw-semibold mb-2">{{ __('admin::general.pages.department.list.department_name') }}</label>
                                    <input id="name-input" class="form-control" name="name">
                                </div>
                                <div class="col-md-6 fv-row">
                                    <label for="department-select" class="required fs-5 fw-semibold mb-2">{{ __('admin::general.pages.department.list.department_region_id') }}</label>
                                    <select id="department-select" class="form-select form-select-solid"
                                        name="region_id">

                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="col-12 col-lg-4">

                        </div>
                    </div>
                    <div class="text-center mt-5">
                        <button type="button" id="kt_modal_new_target_submit" class="btn btn-primary">
                            <span class="indicator-label">{{ __('admin::general.shared.save') }}</span>
                            <span class="indicator-progress">{{ __('admin::general.shared.please_wait') }}...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <button type="reset" id="kt_modal_new_target_cancel"
                            class="btn btn-light me-3">{{ __('admin::general.shared.cancel') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endcan
