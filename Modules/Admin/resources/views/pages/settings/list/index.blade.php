@extends('admin::layouts.master')
@section('content')
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">

        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="card card-flush">
                <div class="card-body pt-10">
                    <div class="row border border-2 py-5" style="border-radius: 6px">
                        <div class="mb-5 hover-scroll-x">
                            <div class="d-grid">
                                <ul class="nav nav-tabs flex-nowrap text-nowrap">
                                    <li class="nav-item active">
                                        <a class="nav-link btn btn-active-light btn-color-gray-600 btn-active-color-primary rounded-bottom-0 active"
                                            data-bs-toggle="tab" aria-selected="true"
                                            href="#notification_setting">{{ __('admin::general.pages.settings.list.notification_settings') }}</a>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a class="nav-link btn btn-active-light btn-color-gray-600 btn-active-color-primary rounded-bottom-0"
                                            data-bs-toggle="tab" aria-selected="false" href="#other">Other</a>
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="notification_setting" role="tabpanel">
                                <div class="row">
                                    <div class="col-12" id="notification_setting_col">

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="kt_tab_pane_2" role="other">

                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Category-->
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
    {{-- <script src="{{asset('admin/assets/js/custom/apps/ecommerce/catalog/categories.js')}}"></script> --}}
    <script src="{{ asset('admin/assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom/utilities/modals/users-search.js') }}"></script>

    <script src="{{ asset('admin/assets/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
    <!--end::Custom Javascript-->

    <script>
        let settings = @json($settings);
        //docuemtn on ready
        $(document).ready(function() {
            // notification_setting
            let element = document.getElementById('notification_setting');
            //get setting from settings key = notification_setting
            let notificationSettingArray = [];
            let notification_resent_interval = settings.find(x => x.key === 'notification_resent_interval');
            let notification_resent_interval2 = settings.find(x => x.key === 'notification_resent_interval2');
            notificationSettingArray.push(notification_resent_interval);
            notificationSettingArray.push(notification_resent_interval2);


            notificationSettingArray.forEach(setting => {
                if (setting == null) {
                    return;
                }
                element.innerHTML += addSettingRow(setting);
            });
            let buttons = document.querySelectorAll('.setting_submit');
            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    let thisButton = this;
                    // set on data-kt-indicator
                    thisButton.setAttribute('data-kt-indicator', 'on');
                    //set button disabled
                    thisButton.setAttribute('disabled', true);
                    //get attribute data-form-id
                    let formId = thisButton.getAttribute('data-form-id');

                    //get form data
                    let formData = $(`#${formId}`).serializeArray();

                    //get edit id
                    let edit_id = $(`#${formId} input[name=edit_id]`).val();
                    let url = "{{ route('admin.ajax.setting.update', '-1') }}";
                    url = url.replace('-1', edit_id);

                    //send ajax request
                    $.ajax({
                        url: url,
                        type: 'PUT',
                        data: formData,
                        success: function(response) {
                            //show success message
                            //remove on data-kt-indicator
                            thisButton.removeAttribute('data-kt-indicator');
                            //set button disabled
                            thisButton.removeAttribute('disabled');

                            customSwal.formSuccess();
                        },
                        error: function(xhr, status, error) {
                            //remove on data-kt-indicator
                            thisButton.removeAttribute('data-kt-indicator');
                            //set button disabled
                            thisButton.removeAttribute('disabled');
                            // Handle errors here
                            customSwal.dataError(xhr)
                        }
                    });
                });
            });
        });

        function addSettingRow(setting) {
            let html = `
                <div class="mt-5">
                    <form class="row" id='form_${setting.key}'>
                        <div class="col-4 fv-row">
                            <label class=" fs-5 fw-semibold mb-2">{{ __('admin::general.pages.settings.list.keyword') }}</label>
                            <input type="hidden" name="edit_id" value="${setting.id}">
                            <input disabled class="form-control w-100" value="${setting.key}">
                        </div>
                        <div class="col-4 fv-row">
                            <label class=" fs-5 fw-semibold mb-2">{{ __('admin::general.pages.settings.list.value') }}</label>
                            <input class="form-control w-100" name="value" value="${setting.value}">
                        </div>
                        <div class="col-4 fv-row">
                            <label class="fs-5 fw-semibold mb-2">{{ __('admin::general.pages.settings.list.button') }}</label>
                            {{-- button --}}
                            <button data-form-id="form_${setting.key}" data-kt-indicator="off" type="button"
                                class="btn btn-primary w-100 setting_submit ">
                                <span
                                    class="indicator-label">{{ __('admin::general.pages.emergencyCall.list.save') }}</span>
                                <span
                                    class="indicator-progress">{{ __('admin::general.pages.emergencyCall.list.wait') }}...
                                    <span
                                        class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                    </form>
                </div>`;

            return html;

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
