@extends('admin::layouts.master')
@section('styles')
    <link href="{{ asset('admin/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('admin/assets/plugins/custom/vis-timeline/vis-timeline.bundle.css') }}" rel="stylesheet"
          type="text/css"/>
@endsection
@section('content')
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <!--begin::Card-->
            <div class="card card-flush">
                <div class="card-body pt-10">
                    <div style="position: absolute; float: right; right: 30px;" class="mb-5">
                        <!--begin::Toolbar-->
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-stack mb-5">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">
                                <!--begin::Filter-->
                                <!--begin::Add user-->
                                <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#kt_modal_new_target">
                                        <i class="ki-duotone ki-plus fs-2"></i>
                                        {{ __('admin::general.pages.stores.list.add_new_store') }}
                                    </button>
                                </div>
                                <!--end::Add user-->
                            </div>
                            <!--end::Toolbar-->

                            <!--begin::Group actions-->
                            <div class="d-flex justify-content-end align-items-center d-none"
                                 data-kt-docs-table-toolbar="selected">
                                <div class="fw-bold me-5">
                                    <span class="me-2" data-kt-docs-table-select="selected_count"></span> Selected
                                </div>

                                <div class="d-flex justify-content-end align-items-center d-none"
                                     data-kt-docs-table-toolbar="selected">
                                    <div class="fw-bold me-5">
                                        <span class="me-2" data-kt-docs-table-select="selected_count"></span> Selected
                                    </div>
                                </div>

                                <button type="button" class="btn btn-danger me-5"
                                        data-kt-user-table-select="delete_selected">
                                    {{ __('admin::general.shared.delete_selected') }}
                                </button>
                                <a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center"
                                   data-kt-menu-trigger="click"
                                   data-kt-menu-placement="bottom-end">{{ __('admin::general.pages.list.change_status') }}
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div
                                    class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                    data-kt-menu="true">
                                    @foreach(\App\Enums\StatusEnum::cases() as $status)
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a class="menu-link px-3 change-status-multiple change_status_selected"
                                               data-status="{{$status->value}}">{{ __('admin::general.pages.list.' . $status->value) }}</a>
                                        </div>
                                        <!--end::Menu item-->
                                    @endforeach
                                </div>
                            </div>
                            <!--end::Group actions-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Modal - Adjust Balance-->
                        <div class="modal fade" id="kt_modal_export_users" tabindex="-1" aria-hidden="true">
                            <!--begin::Modal dialog-->
                            <div class="modal-dialog modal-dialog-centered mw-650px">
                                <!--begin::Modal content-->
                                <div class="modal-content">
                                    <!--begin::Modal header-->
                                    <div class="modal-header">
                                        <!--begin::Modal title-->
                                        <h2 class="fw-bold">Export Users</h2>
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
                                    <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                        <!--begin::Form-->
                                        <form id="kt_modal_export_users_form" class="form" action="#">
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-10">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold form-label mb-2">Select Roles:</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <select name="role" data-control="select2"
                                                        data-placeholder="Select a role" data-hide-search="true"
                                                        class="form-select form-select-solid fw-bold">
                                                    <option></option>
                                                    <option value="Administrator">Administrator</option>
                                                    <option value="Analyst">Analyst</option>
                                                    <option value="Developer">Developer</option>
                                                    <option value="Support">Support</option>
                                                    <option value="Trial">Trial</option>
                                                </select>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-10">
                                                <!--begin::Label-->
                                                <label class="required fs-6 fw-semibold form-label mb-2">Select Export
                                                    Format:</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <select name="format" data-control="select2"
                                                        data-placeholder="Select a format" data-hide-search="true"
                                                        class="form-select form-select-solid fw-bold">
                                                    <option></option>
                                                    <option value="excel">Excel</option>
                                                    <option value="pdf">PDF</option>
                                                    <option value="cvs">CVS</option>
                                                    <option value="zip">ZIP</option>
                                                </select>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Actions-->
                                            <div class="text-center">
                                                <button type="reset" class="btn btn-light me-3"
                                                        data-kt-users-modal-action="cancel">Discard
                                                </button>
                                                <button type="submit" class="btn btn-primary"
                                                        data-kt-users-modal-action="submit">
                                                    <span class="indicator-label">Submit</span>
                                                    <span class="indicator-progress">Please wait...
                                                        <span
                                                            class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
                        <!--end::Modal - New Card-->
                    </div>
                    @include('admin::pages.stores.list.sections.filtersSection')

                    <!--begin::Datatable-->
                    <table id="kt_datatable_example_1" class="table align-middle table-row-dashed fs-6 gy-5">
                        @include('admin::pages.stores.list.sections.thSection')
                        <tbody class="text-gray-600 fw-semibold">
                        </tbody>
                    </table>
                    <!--end::Datatable-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->

    @include('admin::pages.stores.list.sections.add-modal')
    @include('admin::pages.stores.list.sections.edit-modal')
@endsection

@section('scripts')
    @include('admin::pages.stores.list.scripts.loadAjax')
    @include('admin::pages.stores.list.scripts.table')
    @include('admin::pages.stores.list.scripts.add-modal')
    @include('admin::pages.stores.list.scripts.edit-modal')
    @include('admin::pages.stores.list.scripts.filterScript')

    <script>
        var hostUrl = "{{ asset('admin/assets/') }}";


        $("#filter_status").select2({});
    </script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    {{--        <script src="{{asset('admin/assets/plugins/global/plugins.bundle.js')}}"></script> --}}
    {{-- <script src="{{asset('admin/assets/js/scripts.bundle.js')}}"></script> --}}
    <!--end::Global Javascript Bundle-->
    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="{{ asset('admin/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used for this page only)-->
    <!--end::Custom Javascript-->
@endsection
