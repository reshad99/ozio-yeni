@extends('admin::layouts.master')
@section('content')
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <form id="kt_ecommerce_add_category_form" class="form d-flex flex-column flex-lg-row"
                data-kt-redirect="{{ route('admin.accident.category.list') }}">
                <!--begin::Aside column-->

                <!--end::Aside column-->
                <!--begin::Main column-->
                <div class="d-flex flex-column flex-row-fluid gap-12 gap-lg-12">
                    <!--begin::General options-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>{{__('admin::general.pages.accident.category.add.general')}}</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Input group-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label">{{__('admin::general.pages.accident.category.add.parent_category_name')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <!--begin::Select2-->

                                <select class="form-select mb-2" data-control="select2" data-hide-search="true"
                                    data-placeholder="Select an option" name="parent_id" id="parentIdSelect">
                                    <option value="0">{{__('admin::general.pages.accident.category.add.none')}}</option>
                                    @foreach ($accidentCategories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <!--end::Select2-->
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label">{{__('admin::general.pages.accident.category.add.category_name')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="name" class="form-control mb-2" placeholder="Product name"
                                    value="" />
                                <!--end::Input-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">{{__('admin::general.pages.accident.category.add.a_category_name_is_required_and_recommended_to_be_unique')}}</div>
                                <!--end::Description-->
                            </div>
                            <div class="mb-10 fv-row col-6">
                                <div class="d-flex justify-content-between">
                                    <label class="required form-label col-11">{{__('admin::general.pages.accident.category.add.status')}} </label>
                                    <div style="float: right" class="col-1 rounded-circle bg-success w-15px h-15px"
                                        id="kt_ecommerce_add_category_status">
                                    </div>
                                </div>
                                <!--begin::Select2-->
                                <select class="form-select mb-2" name="status" data-control="select2"
                                    data-hide-search="true" data-placeholder="Select an option"
                                    id="kt_ecommerce_add_category_status_select">
                                    @foreach (Modules\Shared\app\Enums\AccidentCategoryStatusEnum::values() as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                <!--end::Select2-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">{{__('admin::general.pages.accident.category.add.set_the_category_status')}}.</div>
                                <!--end::Description-->
                            </div>

                            <!--end::Input group-->
                        </div>
                        <!--end::Card header-->
                        <!--end::Datepicker-->
                    </div>
                    <!--end::General options-->
                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <a href="{{ route('admin.accident.category.list') }}" id="kt_ecommerce_add_product_cancel"
                            class="btn btn-light me-5">{{__('admin::general.shared.cancel')}}</a>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_ecommerce_add_category_submit" class="btn btn-primary">
                            <span class="indicator-label">{{__('admin::general.shared.save_changes')}}</span>
                            <span class="indicator-progress">{{__('admin::general.shared.please_wait')}}...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Button-->
                    </div>
                </div>
                <!--end::Main column-->
            </form>
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
@endsection
@section('scripts')
    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="{{ asset('admin/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used for this page only)-->
    {{-- <script src="assets/js/custom/apps/ecommerce/catalog/save-category.js"></script> --}}
    <script src="{{ asset('admin/assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom/utilities/modals/users-search.js') }}"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
    @include('admin::pages.accident.category.add.scripts.save-category')
@endsection

@section('styles')
    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="{{ asset('admin/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <!--end::Vendor Stylesheets-->
@endsection
