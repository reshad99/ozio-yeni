<!--begin::Modal - Add task-->
<div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_user_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">{{__('admin::general.pages.users.list.add_new_user')}}</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary"
                     data-kt-users-modal-action="close">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body px-5 my-7">
                <!--begin::Form-->
                <form id="kt_modal_add_user_form" class="form" action="#">
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10"
                         id="kt_modal_add_user_scroll" data-kt-scroll="true"
                         data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                         data-kt-scroll-dependencies="#kt_modal_add_user_header"
                         data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
                         data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label for="name" class="required fw-semibold fs-6 mb-2">{{__('admin::general.pages.users.list.table.name')}}</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="name" id="name"
                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                   placeholder="Full name"/>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label for="email" class="required fw-semibold fs-6 mb-2">{{__('admin::general.pages.users.list.table.email')}}</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="email" name="email" id="email"
                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                   placeholder="example@domain.com"/>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label for="password" class="required fw-semibold fs-6 mb-2">{{__('admin::general.pages.users.list.table.password')}}</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="password" name="password" id="password"
                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                   placeholder="example@domain.com"/>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-10">
                        <button type="submit" class="btn btn-primary"
                                data-kt-users-modal-action="submit">
                            <span class="indicator-label">{{__('admin::general.shared.save')}}</span>
                            <span class="indicator-progress">{{__('admin::general.shared.please_wait')}}
																			<span
                                                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <button type="reset" class="btn btn-light me-3"
                                data-kt-users-modal-action="cancel">{{__('admin::general.shared.discard')}}</button>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Add task-->
