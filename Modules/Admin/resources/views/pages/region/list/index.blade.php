@extends('admin::layouts.master')
@section('content')
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">

        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="card card-flush">
                <div class="card-body pt-10">

                    <div class="d-flex flex-stack mb-5">
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-1 position-absolute ms-6"><span class="path1"></span><span
                                    class="path2"></span></i>
                            <input type="text" data-kt-docs-table-filter="search" class="form-control  w-250px ps-15"
                                placeholder="{{ __('admin::general.pages.region.list.search_region') }}" />

                        </div>
                        <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#kt_modal_new_target">
                                <i class="ki-duotone ki-plus fs-2"></i>
                                {{ __('admin::general.pages.region.list.add_new_region') }}
                            </button>
                        </div>
                        <div class="d-flex justify-content-end align-items-center d-none"
                            data-kt-docs-table-toolbar="selected">
                            <div class="fw-bold me-5">
                                <span class="me-2" data-kt-docs-table-select="selected_count"></span> Selected
                            </div>

                            <button type="button" class="btn btn-danger" data-bs-toggle="tooltip" title="Coming Soon">
                                Selection Action
                            </button>
                        </div>
                    </div>
                    <table style="border-radius: 10px; overflow: hidden" id="kt_datatable_example_1"
                        class="table table-striped table-row-bordered align-middle fs-6 gy-5">
                        <thead>
                            <tr class="text-start text-white bg-primary fw-bold fs-7 text-uppercase gs-0">
                                <th class="px-3 w-40px">{{ __('admin::general.pages.emergencyCall.list.id') }}
                                </th>
                                <th>{{ __('admin::general.pages.region.list.name') }}</th>
                                <th>{{ __('admin::general.pages.region.list.organisation') }}</th>
                                <th>{{ __('admin::general.pages.region.list.date') }}</th>
                                <th class="px-3 text-end">{{ __('admin::general.shared.actions') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-semibold">
                        </tbody>
                    </table>
                    <!--end::Datatable-->
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Category-->
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->

    @include('admin::pages.region.list.sections.add-modal')
    @include('admin::pages.region.list.sections.edit-modal')
@endsection

@section('scripts')
    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="{{ asset('admin/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used for this page only)-->
    {{-- <script src="{{asset('admin/assets/js/custom/apps/ecommerce/catalog/categories.js')}}"></script> --}}
    <script src="{{ asset('admin/assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom/utilities/modals/users-search.js') }}"></script>

    <script src="{{ asset('admin/assets/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
    <!--end::Custom Javascript-->

    @include('admin::pages.region.list.scripts.datatable')
    @include('admin::pages.region.list.scripts.add-modal')
    @include('admin::pages.region.list.scripts.edit-modal')
    <script>
        // $(document).on('shown.bs.modal', '#kt_modal_new_target', function () {
        //     // Your code here, triggered when the modal is opened
        //     $('#department-select').select2();
        // });

        // $(document).on('select2:open', '#department-select', function (event) {
        //     // Your code here, triggered when the Select2 dropdown is opened
        //     $('#department-select').select2().next().find('.select2-search__field').focus();

        // });

        $("#department-select").select2({
            dropdownParent: $("#kt_modal_new_target"),
        });

        $("#department-select2").select2({
            dropdownParent: $("#kt_modal_new2_target"),
        });

        //get all readonly inputs add cursor:alias;
        var inputs = document.querySelectorAll('input[readonly]');
        for (var i = 0; i < inputs.length; i++) {
            inputs[i].style.cursor = 'unset';
        }
        var elements = Array.prototype.slice.call(document.querySelectorAll("[data-bs-stacked-modal]"));

        if (elements && elements.length > 0) {
            elements.forEach((element) => {
                if (element.getAttribute("data-kt-initialized") === "1") {
                    return;
                }

                element.setAttribute("data-kt-initialized", "1");

                element.addEventListener("click", function(e) {
                    e.preventDefault();

                    const modalEl = document.querySelector(this.getAttribute("data-bs-stacked-modal"));

                    if (modalEl) {
                        const modal = new bootstrap.Modal(modalEl);
                        modal.show();
                    }
                });
            });
        }

        const loadingEl = document.createElement("div");
        document.body.prepend(loadingEl);
        loadingEl.classList.add("page-loader");
        loadingEl.classList.add("flex-column");
        loadingEl.classList.add("bg-dark");
        loadingEl.classList.add("bg-opacity-25");
        loadingEl.innerHTML = `
                    <span class="spinner-border text-primary" role="status"></span>
                    <span class="text-gray-800 fs-6 fw-semibold mt-5">Yüklənir...</span>
            `;
        //KTApp.showPageLoading();
        //KTApp.hidePageLoading();
        var firstTimeClick = true;
        window.loadAjax = async function() {
            if (firstTimeClick) {
                let promise = new Promise(function(resolve, reject) {
                    firstTimeClick = false;
                    //get department list and roles list
                    KTApp.showPageLoading();
                    //ajax read role data
                    $.ajax({
                        type: "GET",
                        url: "{{ route('admin.ajax.organisation.list') }}", // Update with your API endpoint
                        success: function(response) {
                            //fill response data to all department_id named select2
                            var select2s = document.querySelectorAll(
                                '[name="organisation_id"]');
                            for (var i = 0; i < select2s.length; i++) {
                                var select2 = select2s[i];
                                select2.innerHTML = '';
                                for (var j = 0; j < response.length; j++) {
                                    var option = document.createElement('option');
                                    option.value = response[j].id;
                                    option.innerHTML = response[j].org_name;
                                    select2.appendChild(option);
                                }
                            }
                            KTApp.hidePageLoading();
                            resolve();
                        },
                        error: function(xhr, status, error) {
                            KTApp.hidePageLoading();
                            // Handle errors here
                            customSwal.dataError(xhr);
                            resolve();
                        },
                    });
                });
                await promise;
            }
        }
    </script>
@endsection

@section('styles')
    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="{{ asset('admin/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <!--end::Vendor Stylesheets-->
    <style>
        .select2-dropdown.select2-dropdown--below {
            z-index: 999999999 !important;
        }

        .sticky-header {
            position: sticky;
            top: 0;
            background: white;
            z-index: 10;
        }
    </style>
@endsection
