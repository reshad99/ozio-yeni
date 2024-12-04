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
                                placeholder="{{ __('admin::general.pages.users.list.search_user') }}" />
                        </div>
                        <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#kt_modal_new_target">
                                <i class="ki-duotone ki-plus fs-2"></i>
                                {{ __('admin::general.pages.users.list.add_new_user') }}
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
                                <th class="min-w-125px">{{ __('admin::general.pages.users.list.user') }}</th>
                                <th>{{ __('admin::general.pages.users.list.user_org') }}</th>
                                <th>{{ __('admin::general.pages.users.list.user_reg') }}</th>
                                <th>{{ __('admin::general.pages.users.list.user_dep') }}</th>
                                <th>{{ __('admin::general.pages.users.list.role') }}</th>
                                <th>{{ __('admin::general.pages.users.list.joined_date') }}</th>
                                <th class="text-end pe-15 ">{{ __('admin::general.shared.actions') }}</th>
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

    @include('admin::pages.users2.list.sections.add-modal')
    @include('admin::pages.users2.list.sections.edit-modal')
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


    @include('admin::pages.users2.list.scripts.datatable')
    @include('admin::pages.users2.list.scripts.add-modal')
    @include('admin::pages.users2.list.scripts.edit-modal')
    <script>
        $("#department-select").select2({
            dropdownParent: $("#kt_modal_new_target_form"),
        });
        $("#reg-select").select2({
            dropdownParent: $("#kt_modal_new_target_form"),
        });
        $("#org-select").select2({
            dropdownParent: $("#kt_modal_new_target_form"),
        });

        $("#department-select2").select2({
            dropdownParent: $("#kt_modal_new2_target_form"),
        });
        $("#reg-select2").select2({
            dropdownParent: $("#kt_modal_new2_target_form"),
        });
        $("#org-select2").select2({
            dropdownParent: $("#kt_modal_new2_target_form"),
        });

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

        function AddModules() {
            var divs = document.querySelectorAll('.module-section');
            //add label for role-section
            for (var i = 0; i < divs.length; i++) {
                divs[i].innerHTML =
                    `<label class="fw-semibold fs-6 mb-5">{{ __('admin::general.pages.users.list.access_modules') }}</label>`
            }
            //get ModulesEnum
            let addedModulesList = [];
            let ModulesList = @json(Modules\Shared\app\Enums\ModulesEnum::values());
            let UserRole = @json(Auth::user()->roles->first()->name);
            let ModulesInverted = {};

            for (var key in ModulesList) {
                ModulesInverted[ModulesList[key]] = key;
            }

            if (UserRole ==
                "{{ Modules\Shared\app\Enums\RolesEnum::SUPER_ADMIN->value }}"
            ) {
                addedModulesList.push(ModulesInverted['EMERGENCY']);
                addedModulesList.push(ModulesInverted['QISMANAGEMENT']);
            } else if (UserRole ==
                "{{ Modules\Shared\app\Enums\RolesEnum::ORGANISATION_MANAGER->value }}"
            ) {
                // addedModulesList.push(ModulesInverted['ORGANISATION']);
                // addedModulesList.push(ModulesInverted['REGION']);
                // addedModulesList.push(ModulesInverted['DEPARTMENT']);
                // addedModulesList.push(ModulesInverted['USER']);
                addedModulesList.push(ModulesInverted['EMERGENCY']);
                addedModulesList.push(ModulesInverted['QISMANAGEMENT']);
            } else if (UserRole ==
                "{{ Modules\Shared\app\Enums\RolesEnum::REGION_MANAGER->value }}"
            ) {
                addedModulesList.push(ModulesInverted['EMERGENCY']);
                addedModulesList.push(ModulesInverted['QISMANAGEMENT']);
            }
            addedModulesList.push('TECHNICAL DIAGNOSIS');
            //upper case all addedModulesList
            addedModulesList = addedModulesList.map(function(x) {
                return x.toUpperCase();
            });


            // role-section named class not the radio button change to checkbox
            for (var i = 0; i < divs.length; i++) {
                var div = divs[i];
                for (var j = 0; j < addedModulesList
                    .length; j++) {
                    div.innerHTML += `
                    <div class="d-flex fv-row mt-3">
                        <!--begin::Radio-->
                        <div class="form-check
                        form-check-custom form-check-solid">
                            <!--begin::Input-->
                            <input class="form-check input me-3" name="modules[]" type="checkbox" data-module-name="${addedModulesList[j]}" value="${addedModulesList[j]}" />
                            <!--end::Input-->
                            <!--begin::Label-->
                            <label class="form-check
                            label">
                                <div class="fw-bold text-gray-800">${addedModulesList[j]}</div>
                            </label>
                            <!--end::Label-->
                        </div>
                        <!--end::Radio-->
                    </div>
                    `;
                }

            }
        }

        function AddRoles() {
            var divs = document.querySelectorAll('.role-section');
            //add label for role-section
            for (var i = 0; i < divs.length; i++) {
                divs[i].innerHTML =
                    `<label class="fw-semibold fs-6 mb-5">{{ __('admin::general.pages.users.list.roles') }}</label>`
            }
            //get RolesEnum
            let addedRolesList = [];
            let RolesList = @json(Modules\Shared\app\Enums\RolesEnum::values());
            let UserRole = @json(Auth::user()->roles->first()->name);
            //invert RolesList like super Admin: SUPER_ADMIN to SUPER_ADMIN: super Admin
            let RolesInverted = {};
            for (var key in RolesList) {
                RolesInverted[RolesList[key]] = key;
            }

            //TODO ADD PERMISSION SECTION
            if (UserRole ==
                "{{ Modules\Shared\app\Enums\RolesEnum::SUPER_ADMIN->value }}"
            ) {
                let keys = Object.keys(RolesList);
                addedRolesList = keys;
            } else if (UserRole ==
                "{{ Modules\Shared\app\Enums\RolesEnum::ORGANISATION_MANAGER->value }}"
            ) {

                addedRolesList.push(RolesInverted['ORGANISATION_MANAGER']);
                addedRolesList.push(RolesInverted['REGION_MANAGER']);
                addedRolesList.push(RolesInverted['MANAGER']);
                addedRolesList.push(RolesInverted['WORKER']);
            } else if (UserRole ==
                "{{ Modules\Shared\app\Enums\RolesEnum::REGION_MANAGER->value }}"
            ) {
                addedRolesList.push(RolesInverted['MANAGER']);
                addedRolesList.push(RolesInverted['DISPATCHER']);
                addedRolesList.push(RolesInverted['WORKER']);
            }


            // role-section named class
            for (var i = 0; i < divs.length; i++) {
                var div = divs[i];
                for (var j = 0; j < addedRolesList
                    .length; j++) {
                    div.innerHTML += `
                    <div class="d-flex fv-row mt-3">
                        <!--begin::Radio-->
                        <div class="form-check form-check-custom form-check-solid">
                            <!--begin::Input-->
                            <input class="form-check-input me-3" name="roles[]" type="radio" data-role-name="${addedRolesList[j]}" value="${addedRolesList[j]}" />
                            <!--end::Input-->
                            <!--begin::Label-->
                            <label class="form-check-label">
                                <div class="fw-bold text-gray-800">${RolesTranslates[addedRolesList[j]]}</div>
                            </label>
                            <!--end::Label-->
                        </div>
                        <!--end::Radio-->
                    </div>
                    `;
                }
            }
        }
        let Regions = [];
        let Organisations = [];
        let Departments = [];

        var firstTimeClick = true;
        window.loadAjax = async function() {
            if (firstTimeClick) {
                console.log('load ajax');
                KTApp.showPageLoading();
                let organisationPromise = new Promise(function(resolve, reject) {
                    firstTimeClick = false;
                    //get department list and roles list
                    //ajax read role data
                    $.ajax({
                        type: "GET",
                        url: "{{ route('admin.ajax.organisation.list') }}", // Update with your API endpoint
                        data: {
                            with: ['regions', 'regions.departments']
                        },
                        success: function(response) {
                            //deep copy the response
                            Organisations = JSON.parse(JSON.stringify(response));
                            console.log(Organisations);
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
                            for (var i = 0; i < response.length; i++) {
                                for (var j = 0; j < response[i].regions?.length; j++) {
                                    let obj = response[i].regions[j];
                                    obj.organisation = response[i];
                                    Regions.push(obj);
                                }
                            }
                            var select2s = document.querySelectorAll(
                                '[name="region_id"]');
                            for (var i = 0; i < select2s.length; i++) {
                                var select2 = select2s[i];
                                select2.innerHTML = '';
                                //add option none
                                var option = document.createElement('option');
                                option.value = 'unset';
                                option.innerHTML =
                                    '{{ __('admin::general.pages.users.list.none') }}';
                                select2.appendChild(option);

                                for (var j = 0; j < Regions.length; j++) {
                                    var option = document.createElement('option');
                                    option.value = Regions[j].id;
                                    option.innerHTML = Regions[j].name;
                                    select2.appendChild(option);
                                }
                            }
                            //foreach regions areas add them to departments
                            for (var i = 0; i < Regions.length; i++) {
                                for (var j = 0; j < Regions[i].departments?.length; j++) {
                                    let obj = Regions[i].departments[j];
                                    obj.region = Regions[i];
                                    Departments.push(obj);
                                }
                            }
                            var select2s = document.querySelectorAll(
                                '[name="department_id"]');
                            for (var i = 0; i < select2s.length; i++) {
                                var select2 = select2s[i];
                                select2.innerHTML = '';
                                //add option none
                                var option = document.createElement('option');
                                option.value = 'unset';
                                option.innerHTML =
                                    '{{ __('admin::general.pages.users.list.none') }}';
                                select2.appendChild(option);

                                for (var j = 0; j < Departments.length; j++) {
                                    var option = document.createElement('option');
                                    option.value = Departments[j].id;
                                    option.innerHTML = Departments[j].name;
                                    select2.appendChild(option);
                                }
                            }
                            resolve();
                        },
                        error: function(xhr, status, error) {
                            // Handle errors here
                            customSwal.dataError(xhr);
                            resolve();
                        },
                    });

                });
                await organisationPromise;
                AddRoles();
                AddModules();
                KTApp.hidePageLoading();
            }
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

                    const modalEl = document.querySelector(this.getAttribute(
                        "data-bs-stacked-modal"));

                    if (modalEl) {
                        const modal = new bootstrap.Modal(modalEl);
                        modal.show();
                    }
                });
            });
        }
    </script>
    @include('admin::pages.users2.list.scripts.select2-script')
@endsection

@section('styles')
    <style>
        .select2-dropdown.select2-dropdown--below {
            z-index: 999999999 !important;
        }
    </style>

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
