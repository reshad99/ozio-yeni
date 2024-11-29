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
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#kt_modal_add_user">
                                    <i class="ki-duotone ki-plus fs-2"></i>{{__('admin::general.pages.users.list.add_new_user')}}
                                </button>
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
                                    {{ __('admin::general.pages.users.list.delete_selected') }}
                                </button>
                                <a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center"
                                   data-kt-menu-trigger="click"
                                   data-kt-menu-placement="bottom-end">{{ __('admin::general.pages.list.change_status') }}
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div
                                    class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                    data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="apps/user-management/users/view.html"
                                           class="menu-link px-3">{{ __('admin::general.pages.list.active') }}</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3"
                                           data-kt-users-table-filter="delete_row">{{ __('admin::general.pages.list.inactive') }}</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                            </div>
                            <!--end::Group actions-->
                        </div>
                        <!--end::Wrapper-->
                        <!--end::Toolbar-->
                        <!--begin::Group actions-->
                        <div class="d-flex justify-content-end align-items-center d-none"
                             data-kt-user-table-toolbar="selected">
                            <div class="fw-bold me-5">
                                <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected
                            </div>
                            <button type="button" class="btn btn-danger me-5"
                                    data-kt-user-table-select="delete_selected">
                                {{ __('admin::general.pages.users.list.delete_selected') }}
                            </button>
                            <a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center"
                               data-kt-menu-trigger="click"
                               data-kt-menu-placement="bottom-end">{{ __('admin::general.pages.list.change_status') }}
                                <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div
                                class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="apps/user-management/users/view.html"
                                       class="menu-link px-3">{{ __('admin::general.pages.list.active') }}</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3"
                                       data-kt-users-table-filter="delete_row">{{ __('admin::general.pages.list.inactive') }}</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </div>
                        <!--end::Group actions-->
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
                    <!--begin::Card header-->
                    <div class="accordion accordion-icon-toggle" id="kt_accordion_2">
                        <!--begin::Item-->
                        <div class="mb-5">
                            <!--begin::Header-->
                            <div class="accordion-header py-3 d-flex collapsed" data-bs-toggle="collapse"
                                 data-bs-target="#kt_accordion_2_item_1">
                                <span class="accordion-icon">
                                    <i class="ki-duotone ki-arrow-right fs-4"><span class="path1"></span><span
                                            class="path2"></span></i>
                                </span>
                                <h3 class="fs-4 fw-semibold mb-0 ms-4"> Filtirlər</h3>
                            </div>
                            <!--end::Header-->

                            <!--begin::Body-->
                            <div id="kt_accordion_2_item_1" class="fs-6 collapse my-2" data-bs-parent="#kt_accordion_2">

                                <div class="row">

                                    <div class="col-10">
                                        <div class="row">

                                            <input type="hidden" class="form-control" id="filter_date_start"
                                                   placeholder="Başlanğıc tarixi">
                                            <input type="hidden" class="form-control" id="filter_date_end"
                                                   placeholder="Bitmə tarixi">

                                            <div class="col-6 mt-5">
                                                <input class="form-control form-control-solid"
                                                       placeholder="Pick date rage" id="kt_daterangepicker_1">
                                            </div>
                                            <div class="col-6 mt-5">

                                                <select class="form-select form-select-solid select2-hidden-accessible"
                                                        data-control="select2" id="filter_worker_id"
                                                        name="filter_worker_id" data-placeholder="İşçi seçin"
                                                        data-allow-clear="true"
                                                        data-select2-id="select2-data-filter_worker_id" tabindex="-1"
                                                        aria-hidden="true" data-kt-initialized="1">

                                                </select><span
                                                    class="select2 select2-container select2-container--bootstrap5"
                                                    dir="ltr" data-select2-id="select2-data-1-2akg"
                                                    style="width: 100%;"><span class="selection"><span
                                                            class="select2-selection select2-selection--single form-select form-select-solid"
                                                            role="combobox" aria-haspopup="true"
                                                            aria-expanded="false"
                                                            tabindex="0" aria-disabled="false"
                                                            aria-labelledby="select2-filter_worker_id-container"
                                                            aria-controls="select2-filter_worker_id-container"><span
                                                                class="select2-selection__rendered"
                                                                id="select2-filter_worker_id-container"
                                                                role="textbox"
                                                                aria-readonly="true" title="İşçi seçin"><span
                                                                    class="select2-selection__placeholder">İşçi seçin</span></span><span
                                                                class="select2-selection__arrow"
                                                                role="presentation"><b
                                                                    role="presentation"></b></span></span></span><span
                                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                            <div class="col-3 mt-5">

                                                <input type="text" class="form-control w-170px "
                                                       id="filter_subscriber_number" placeholder="Abunəçi kodu">
                                            </div>
                                            <div class="col-3 mt-5">

                                                <input type="text" class="form-control w-170px "
                                                       id="filter_meter_number" placeholder="Sayğac nömrəsi">
                                            </div>
                                            <div class="col-3 mt-5">

                                                <input type="text" class="form-control w-170px "
                                                       id="filter_phone_number" placeholder="Telefon nömrəsi">
                                            </div>
                                            <div class="col-3 mt-5">
                                                <select id="filter_status"
                                                        class="form-select form-select-solid select2-hidden-accessible"
                                                        data-control="select2" data-placeholder="Status seçin"
                                                        data-allow-clear="true"
                                                        data-select2-id="select2-data-filter_status" tabindex="-1"
                                                        aria-hidden="true" data-kt-initialized="1">
                                                </select><span
                                                    class="select2 select2-container select2-container--bootstrap5"
                                                    dir="ltr" data-select2-id="select2-data-2-0e1s"
                                                    style="width: 100%;"><span class="selection"><span
                                                            class="select2-selection select2-selection--single form-select form-select-solid"
                                                            role="combobox" aria-haspopup="true"
                                                            aria-expanded="false"
                                                            tabindex="0" aria-disabled="false"
                                                            aria-labelledby="select2-filter_status-container"
                                                            aria-controls="select2-filter_status-container"><span
                                                                class="select2-selection__rendered"
                                                                id="select2-filter_status-container" role="textbox"
                                                                aria-readonly="true" title="Status seçin"><span
                                                                    class="select2-selection__placeholder">Status seçin</span></span><span
                                                                class="select2-selection__arrow"
                                                                role="presentation"><b
                                                                    role="presentation"></b></span></span></span><span
                                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                            <div class="col-3 mt-5">

                                                <input type="text" class="form-control w-170px" id="filter_custom_id"
                                                       placeholder="Kod">
                                            </div>
                                            <div class="col-3 mt-5">
                                                <input type="text" class="form-control w-170px"
                                                       id="filter_caller_search" placeholder="Zəng edən axtar">
                                            </div>
                                            <div class="col-3 mt-5">
                                                <select class="form-select form-select-solid select2-hidden-accessible"
                                                        data-control="select2" id="filter_category_id"
                                                        name="filter_category_id" data-placeholder="Kateqoriya seçin"
                                                        data-allow-clear="true"
                                                        data-select2-id="select2-data-filter_category_id" tabindex="-1"
                                                        aria-hidden="true" data-kt-initialized="1">
                                                </select><span
                                                    class="select2 select2-container select2-container--bootstrap5"
                                                    dir="ltr" data-select2-id="select2-data-3-sm00"
                                                    style="width: 100%;"><span class="selection"><span
                                                            class="select2-selection select2-selection--single form-select form-select-solid"
                                                            role="combobox" aria-haspopup="true"
                                                            aria-expanded="false"
                                                            tabindex="0" aria-disabled="false"
                                                            aria-labelledby="select2-filter_category_id-container"
                                                            aria-controls="select2-filter_category_id-container"><span
                                                                class="select2-selection__rendered"
                                                                id="select2-filter_category_id-container"
                                                                role="textbox"
                                                                aria-readonly="true" title="Kateqoriya seçin"><span
                                                                    class="select2-selection__placeholder">Kateqoriya seçin</span></span><span
                                                                class="select2-selection__arrow"
                                                                role="presentation"><b
                                                                    role="presentation"></b></span></span></span><span
                                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                            <div class="col-3 mt-5">

                                                <select class="form-select form-select-solid select2-hidden-accessible"
                                                        data-control="select2" id="filter_sub_category_id"
                                                        name="filter_sub_category_id"
                                                        data-placeholder="Alt kateqoriya seçin" data-allow-clear="true"
                                                        data-select2-id="select2-data-filter_sub_category_id"
                                                        tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                                </select><span
                                                    class="select2 select2-container select2-container--bootstrap5"
                                                    dir="ltr" data-select2-id="select2-data-4-r7sr"
                                                    style="width: 100%;"><span class="selection"><span
                                                            class="select2-selection select2-selection--single form-select form-select-solid"
                                                            role="combobox" aria-haspopup="true"
                                                            aria-expanded="false"
                                                            tabindex="0" aria-disabled="false"
                                                            aria-labelledby="select2-filter_sub_category_id-container"
                                                            aria-controls="select2-filter_sub_category_id-container"><span
                                                                class="select2-selection__rendered"
                                                                id="select2-filter_sub_category_id-container"
                                                                role="textbox" aria-readonly="true"
                                                                title="Alt kateqoriya seçin"><span
                                                                    class="select2-selection__placeholder">Alt kateqoriya seçin</span></span><span
                                                                class="select2-selection__arrow"
                                                                role="presentation"><b
                                                                    role="presentation"></b></span></span></span><span
                                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-2">
                                        <div class="row">

                                            <div class="col-12 mt-5">
                                                <button id="filterSearchBtn" type="button"
                                                        class="btn btn-primary w-100">Axtar
                                                </button>
                                            </div>
                                            <div class="col-12 mt-5">
                                                <button id="filterResetBtn" type="button"
                                                        class="btn btn-secondary w-100">Sıfırla
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Item-->
                    </div>

                    <!--begin::Datatable-->
                    <table id="kt_datatable_example_1" class="table align-middle table-row-dashed fs-6 gy-5">
                        <thead>
                        <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                            <th class="w-10px pe-2">
                                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                    <input class="form-check-input" type="checkbox" data-kt-check="true"
                                           data-kt-check-target="#kt_datatable_example_1 .form-check-input" value="1"/>
                                </div>
                            </th>
                            <th>Customer Name</th>
                            <th>Email</th>
                            <th>Company</th>
                            <th>Payment Method</th>
                            <th>Created Date</th>
                            <th class="text-end min-w-100px">Actions</th>
                        </tr>
                        </thead>
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

    @include('admin::pages.users.list.sections.add-modal')
@endsection

@section('scripts')
    @include('admin::pages.users.list.scripts.table')
    @include('admin::pages.users.list.scripts.add')
    @include('admin::pages.users.list.scripts.filterScript')

    <script>var hostUrl = "{{asset('admin/assets/')}}";</script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    {{--        <script src="{{asset('admin/assets/plugins/global/plugins.bundle.js')}}"></script>--}}
    <script src="{{asset('admin/assets/js/scripts.bundle.js')}}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="{{asset('admin/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used for this page only)-->
    {{--        <script src="{{asset('admin/assets/js/custom/apps/user-management/users/list/table.js')}}"></script>--}}
    {{--    <script src="{{asset('admin/assets/js/custom/apps/user-management/users/list/add.js')}}"></script>--}}

@endsection
