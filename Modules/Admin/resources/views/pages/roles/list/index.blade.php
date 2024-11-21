@extends('admin::layouts.master')
@section('content')
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-fluid">
            <!--begin::Row-->
            <div id="kt_roles_list" class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9">
                <!--begin::Col-->
                @foreach ($roles as $role)
                    @include('admin::component.roles.role-card', ['role' => $role])
                @endforeach
                <!--begin::Add new card-->
                <div class="col-md-4">
                    <!--begin::Card-->
                    <div class="card h-md-100">
                        <!--begin::Card body-->
                        <div class="card-body d-flex flex-center">
                            <!--begin::Button-->
                            <button type="button" class="btn btn-clear d-flex flex-column flex-center"
                                data-bs-toggle="modal" data-bs-target="#kt_modal_add_role">
                                <!--begin::Illustration-->
                                <img src="{{ asset('admin/assets/media/illustrations/sketchy-1/4.png') }}" alt=""
                                    class="mw-100 mh-150px mb-7" />
                                <!--end::Illustration-->
                                <!--begin::Label-->
                                <div class="fw-bold fs-3 text-gray-600 text-hover-primary">
                                    {{ __('admin::general.pages.roles.list.add_new_role') }}</div>
                                <!--end::Label-->
                            </button>
                            <!--begin::Button-->
                        </div>
                        <!--begin::Card body-->
                    </div>
                    <!--begin::Card-->
                </div>
                <!--begin::Add new card-->
            </div>
            <!--end::Row-->
            <!--begin::Modals-->
            <!--begin::Modal - Add role-->
            <div class="modal fade" id="kt_modal_add_role" tabindex="-1" aria-hidden="true">
                <!--begin::Modal dialog-->
                <div class="modal-dialog modal-dialog-centered mw-1000px">
                    <!--begin::Modal content-->
                    <div class="modal-content">
                        <!--begin::Modal header-->
                        <div class="modal-header">
                            <!--begin::Modal title-->
                            <h2 class="fw-bold">{{ __('admin::general.pages.roles.list.add_a_role') }}</h2>
                            <!--end::Modal title-->
                            <!--begin::Close-->
                            <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-roles-modal-action="close">
                                <i class="ki-duotone ki-cross fs-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </div>
                            <!--end::Close-->
                        </div>
                        <!--end::Modal header-->
                        <!--begin::Modal body-->
                        <div class="modal-body scroll-y mx-lg-5 my-7">
                            <!--begin::Form-->
                            <form id="kt_modal_add_role_form" class="form" action="#">
                                <!--begin::Scroll-->
                                <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_role_scroll"
                                    data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                                    data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_role_header"
                                    data-kt-scroll-wrappers="#kt_modal_add_role_scroll" data-kt-scroll-offset="300px">
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-10">
                                        <!--begin::Label-->
                                        <label class="fs-5 fw-bold form-label mb-2">
                                            <span
                                                class="required">{{ __('admin::general.pages.roles.list.role_name') }}</span>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control " placeholder="Enter a role name" name="name" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Permissions-->
                                    <div class="fv-row">
                                        <!--begin::Label-->
                                        <label
                                            class="fs-5 fw-bold form-label mb-2">{{ __('admin::general.pages.roles.list.role_permissions') }}</label>
                                        <!--end::Label-->
                                        <!--begin::Table wrapper-->
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table class="table align-middle table-row-dashed fs-6 gy-5">
                                                <!--begin::Table body-->
                                                <tbody class="text-gray-600 fw-semibold">
                                                    <!--begpermissionin::Table row-->
                                                    <tr>
                                                        <td class="text-gray-800">
                                                            {{ __('admin::general.pages.roles.list.administrator_access') }}
                                                            <span class="ms-2" data-bs-toggle="popover"
                                                                data-bs-trigger="hover" data-bs-html="true"
                                                                data-bs-content="Allows a full access to the system">
                                                                <i class="ki-duotone ki-information fs-7">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                    <span class="path3"></span>
                                                                </i>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <!--begin::Checkbox-->
                                                            <label
                                                                class="form-check form-check-custom form-check-solid me-9">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="" id="kt_roles_select_all" />
                                                                <span class="form-check-label"
                                                                    for="kt_roles_select_all">{{ __('admin::general.pages.roles.list.select_all') }}</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                        </td>
                                                    </tr>
                                                    <!--end::Table row-->
                                                    <!--begin::Table row-->
                                                    @foreach ($permissions as $guardName => $guard)
                                                        <tr>
                                                            <td>
                                                                <h4 class="text-black">{{ $guardName }}</h4>
                                                            </td>
                                                        </tr>
                                                        @foreach ($guard as $modules)
                                                            <tr>
                                                                <!--end::Label-->
                                                                @foreach ($modules as $permission)
                                                                    <!--begin::Options-->
                                                                    <td>
                                                                        <!--begin::Wrapper-->
                                                                        <div class="d-flex">
                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-sm form-check-custom form-check-solid me-4 me-lg-5">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" name="permissions[]"
                                                                                    value="{{ $permission->name }}" />
                                                                                <span
                                                                                    class="form-check-label">{{ $permission->name }}</span>
                                                                            </label>
                                                                            <!--end::Checkbox-->
                                                                        </div>
                                                                        <!--end::Wrapper-->
                                                                    </td>
                                                                @endforeach
                                                            </tr>
                                                        @endforeach
                                                    @endforeach
                                                    <!--end::Options-->
                                                    <!--end::Table row-->
                                                </tbody>
                                                <!--end::Table body-->
                                            </table>
                                            <!--end::Table-->
                                        </div>
                                        <!--end::Table wrapper-->
                                    </div>
                                    <!--end::Permissions-->
                                </div>
                                <!--end::Scroll-->
                                <!--begin::Actions-->
                                <div class="text-center pt-15">
                                    <button type="reset" class="btn btn-light me-3"
                                        data-kt-roles-modal-action="cancel">{{ __('admin::general.shared.discard') }}</button>
                                    <button type="submit" class="btn btn-primary" data-kt-roles-modal-action="submit">
                                        <span class="indicator-label">{{ __('admin::general.shared.submit') }}</span>
                                        <span
                                            class="indicator-progress">{{ __('admin::general.shared.please_wait') }}...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
            <!--end::Modal - Add role-->
            <!--begin::Modal - Update role-->
            <div class="modal fade" id="kt_modal_update_role" tabindex="-1" aria-hidden="true">
                <!--begin::Modal dialog-->
                <div class="modal-dialog modal-dialog-centered mw-1000px">
                    <!--begin::Modal content-->
                    <div class="modal-content">
                        <!--begin::Modal header-->
                        <div class="modal-header">
                            <!--begin::Modal title-->
                            <h2 class="fw-bold">{{ __('admin::general.pages.roles.list.update_role') }}</h2>
                            <!--end::Modal title-->
                            <!--begin::Close-->
                            <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-roles-modal-action="close">
                                <i class="ki-duotone ki-cross fs-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </div>
                            <!--end::Close-->
                        </div>
                        <!--end::Modal header-->
                        <!--begin::Modal body-->
                        <div class="modal-body scroll-y mx-5 my-7">
                            <!--begin::Form-->
                            <form id="kt_modal_update_role_form" class="form" action="#">
                                <!--begin::Scroll-->
                                <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_role_scroll"
                                    data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                                    data-kt-scroll-max-height="auto"
                                    data-kt-scroll-dependencies="#kt_modal_update_role_header"
                                    data-kt-scroll-wrappers="#kt_modal_update_role_scroll" data-kt-scroll-offset="300px">
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-10">
                                        <!--begin::Label-->
                                        <label class="fs-5 fw-bold form-label mb-2">
                                            <span
                                                class="required">{{ __('admin::general.pages.roles.list.role_name') }}</span>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control " disabled
                                            placeholder="{{ __('admin::general.pages.roles.list.enter_a_role_name') }}"
                                            name="name" />
                                        <!--end::Input-->
                                        <!--begin::Input-->
                                        <input type="hidden" name="id">
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Permissions-->
                                    <div class="fv-row">
                                        <!--begin::Label-->
                                        <label
                                            class="fs-5 fw-bold form-label mb-2">{{ __('admin::general.pages.roles.list.role_permissions') }}</label>
                                        <!--end::Label-->
                                        <!--begin::Table wrapper-->
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table class="table align-middle table-row-dashed fs-6 gy-5">
                                                <!--begin::Table body-->
                                                <tbody class="text-gray-600 fw-semibold">
                                                    <!--begin::Table row-->
                                                    <tr>
                                                        <td class="text-gray-800">
                                                            {{ __('admin::general.pages.roles.list.administrator_access') }}
                                                            <span class="ms-1" data-bs-toggle="tooltip"
                                                                title="Allows a full access to the system">
                                                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                    <span class="path3"></span>
                                                                </i>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <!--begin::Checkbox-->
                                                            <label
                                                                class="form-check form-check-sm form-check-custom form-check-solid me-9">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="" id="kt_roles_select_all" />
                                                                <span class="form-check-label"
                                                                    for="kt_roles_select_all">{{ __('admin::general.pages.roles.list.select_all') }}</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                        </td>
                                                    </tr>
                                                    <!--end::Table row-->
                                                    <!--begin::Table row-->
                                                    @foreach ($permissions as $guardName => $guard)
                                                        <tr>
                                                            <td>
                                                                <h4 class="text-black">{{ $guardName }}</h4>
                                                            </td>
                                                        </tr>
                                                        @foreach ($guard as $modules)
                                                            <tr>
                                                                <!--end::Label-->
                                                                @foreach ($modules as $permission)
                                                                    <!--begin::Options-->
                                                                    <td>
                                                                        <!--begin::Wrapper-->
                                                                        <div class="d-flex">
                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-sm form-check-custom form-check-solid me-4 me-lg-5">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" name="permissions[]"
                                                                                    value="{{ $permission->name }}" />
                                                                                <span
                                                                                    class="form-check-label">{{ $permission->name }}</span>
                                                                            </label>
                                                                            <!--end::Checkbox-->
                                                                        </div>
                                                                        <!--end::Wrapper-->
                                                                    </td>
                                                                @endforeach
                                                            </tr>
                                                        @endforeach
                                                    @endforeach
                                                </tbody>
                                                <!--end::Table body-->
                                            </table>
                                            <!--end::Table-->
                                        </div>
                                        <!--end::Table wrapper-->
                                    </div>
                                    <!--end::Permissions-->
                                </div>
                                <!--end::Scroll-->
                                <!--begin::Actions-->
                                <div class="text-center pt-15">
                                    <button type="reset" class="btn btn-light me-3"
                                        data-kt-roles-modal-action="cancel">{{ __('admin::general.shared.discard') }}</button>
                                    <button type="submit" class="btn btn-primary" data-kt-roles-modal-action="submit">
                                        <span class="indicator-label">{{ __('admin::general.shared.submit') }}</span>
                                        <span
                                            class="indicator-progress">{{ __('admin::general.shared.please_wait') }}...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
            <!--end::Modal - Update role-->
            <!--end::Modals-->
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
@endsection

@section('scripts')
    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="{{ asset('admin/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used for this page only)-->
    {{-- <script src="{{asset('admin/assets/js/custom/apps/user-management/roles/list/update-role.js')}}"></script> --}}
    <script src="{{ asset('admin/assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom/utilities/modals/users-search.js') }}"></script>
    <!--end::Custom Javascript-->

    @include('admin::pages.roles.list.scripts.create-modal-script')
    @include('admin::pages.roles.list.scripts.edit-modal-script')
@endsection

@section('styles')
    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="{{ asset('admin/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <!--end::Vendor Stylesheets-->
@endsection
