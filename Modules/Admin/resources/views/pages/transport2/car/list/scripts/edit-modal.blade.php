<script>
    $(document).on('click', "a[data-bs-target='#kt_modal_new2_target']", async function() {
        // <input class="form-check-input" type="checkbox" value="${data}" /> get value of checkbox
        await window.loadAjax();

        let user_id = $(this).data('id');

        let form = $("#kt_modal_new2_target_form");
        let url =
            `{{ route('admin.ajax.transport.car.read', ['id' => '-1']) }}`;
        url = url.replace("-1", user_id);
        KTApp.showPageLoading();

        //ajax read role data
        $.ajax({
            type: "GET",
            url: url, // Update with your API endpoint
            data: {
                with: ['department']
            },
            success: function(response) {
                KTApp.hidePageLoading();
                console.log(response);
                form.find("input[name='edit_id']").val(response.id);
                form.find("input[name='brand']").val(response.brand);
                form.find("input[name='serial_number']").val(response.serial_number);
                form.find("input[name='assignment']").val(response.assignment);
                form.find("select[name='department_id']").val(response.department?.id).trigger(
                    'change');


            },
            error: function(xhr, status, error) {
                KTApp.hidePageLoading();
                // Handle errors here
                customSwal.dataError(xhr);
            },
        });

    });
    $(document).ready(function() {

        "use strict";

        // Class definition
        var KTModalNewTarget = function() {
            var submitButton;
            var cancelButton;
            var validator;
            var form;
            var modal;
            var modalEl;

            // Init form inputs
            var initForm = function() {
                // Tags. For more info, please visit the official plugin site: https://yaireo.github.io/tagify/
                var tags = new Tagify(form.querySelector('[name="tags"]'), {
                    whitelist: ["Important", "Urgent", "High", "Medium", "Low"],
                    maxTags: 5,
                    dropdown: {
                        maxItems: 10, // <- mixumum allowed rendered suggestions
                        enabled: 0, // <- show suggestions on focus
                        closeOnSelect: false // <- do not hide the suggestions dropdown once an item has been selected
                    }
                });
                tags.on("change", function() {
                    // Revalidate the field when an option is chosen
                    validator.revalidateField('tags');
                });

                // Due date. For more info, please visit the official plugin site: https://flatpickr.js.org/
                var dueDate = $(form.querySelector('[name="due_date"]'));
                dueDate.flatpickr({
                    enableTime: true,
                    dateFormat: "d, M Y, H:i",
                });

                // Team assign. For more info, plase visit the official plugin site: https://select2.org/
                $(form.querySelector('[name="team_assign"]')).on('change', function() {
                    // Revalidate the field when an option is chosen
                    validator.revalidateField('team_assign');
                });
            }

            // Handle form validation and submittion
            var handleForm = function() {
                // Stepper custom navigation

                // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
                validator = FormValidation.formValidation(
                    form, {
                        fields: {
                            brand: {
                                validators: {
                                    notEmpty: {
                                        message: "{{ __('admin::general.pages.transport.car.list.brand_is_required') }}"
                                    }
                                }
                            },
                            serial_number: {
                                validators: {
                                    notEmpty: {
                                        message: "{{ __('admin::general.pages.transport.car.list.serial_number_is_required') }}"
                                    }
                                }
                            },
                            assignment: {
                                validators: {
                                    notEmpty: {
                                        message: "{{ __('admin::general.pages.transport.car.list.assignment_is_required') }}"
                                    }
                                }
                            },
                            department_id: {
                                validators: {
                                    notEmpty: {
                                        message: "{{ __('admin::general.pages.transport.car.list.department_is_required') }}"
                                    }
                                }
                            },
                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            bootstrap: new FormValidation.plugins.Bootstrap5({
                                rowSelector: '.fv-row',
                                eleInvalidClass: '',
                                eleValidClass: ''
                            })
                        }
                    }
                );

                // Action buttons
                submitButton.addEventListener('click', function(e) {
                    e.preventDefault();

                    // Validate form before submit
                    if (validator) {
                        validator.validate().then(function(status) {
                            console.log('validated!');

                            if (status == 'Valid') {
                                let formData = $("#kt_modal_new2_target_form")
                                    .serializeArray();
                                //array have null or empty value remove it
                                formData = formData.filter(function(item) {
                                    return item.value != null && item.value !=
                                        "";
                                });
                                let roles = [];
                                $("#kt_modal_new2_target_form").find(
                                    "input[name='roles[]']:checked").each(
                                    function() {
                                        //get attr data-role-name
                                        roles.push($(this).data(
                                            "role-name"));
                                    });
                                formData.push({
                                    name: "roles[]",
                                    value: roles
                                });

                                console.log(formData);

                                submitButton.setAttribute('data-kt-indicator', 'on');
                                // Disable button to avoid multiple click
                                submitButton.disabled = true;

                                let url =
                                    `{{ route('admin.ajax.transport.car.update', ['id' => '-1']) }}`;
                                console.log(url);

                                let user_id = $("#kt_modal_new2_target_form")
                                    .find(
                                        "input[name='edit_id']").val();

                                url = url.replace("-1", user_id);

                                $.ajax({
                                    type: "PUT",
                                    url: url, // Update with your API endpoint
                                    data: formData,
                                    success: function(response) {
                                        // Handle the success response here
                                        submitButton.removeAttribute(
                                            'data-kt-indicator');
                                        submitButton.disabled = false;
                                        customSwal.formSuccess().then(
                                            function(
                                                result
                                            ) {
                                                if (result
                                                    .isConfirmed
                                                ) {
                                                    modal.hide();
                                                    var datatable = $(
                                                            '#kt_datatable_example_1'
                                                        )
                                                        .DataTable();
                                                    datatable.ajax
                                                        .reload();
                                                }
                                            });
                                    },
                                    error: function(xhr, status, error) {
                                        submitButton.removeAttribute(
                                            'data-kt-indicator');
                                        submitButton.disabled = false;
                                        // Handle errors here
                                        customSwal.dataError(xhr);

                                    }
                                });
                            } else {
                                submitButton.removeAttribute('data-kt-indicator');
                                submitButton.disabled = false;
                                customSwal.normalError();
                            }
                        });
                    }
                });

                cancelButton.addEventListener('click', function(e) {
                    e.preventDefault();

                    customSwal.cancelIt().then(function(result) {
                        if (result.value) {
                            form.reset(); // Reset form
                            modal.hide(); // Hide modal
                        } else if (result.dismiss === 'cancel') {
                            customSwal.formCancel();
                        }
                    });
                });
            }

            return {
                // Public functions
                init: function() {
                    // Elements
                    modalEl = document.querySelector('#kt_modal_new2_target');

                    if (!modalEl) {
                        return;
                    }

                    modal = new bootstrap.Modal(modalEl);

                    form = document.querySelector('#kt_modal_new2_target_form');
                    submitButton = document.getElementById('kt_modal_new2_target_submit');
                    cancelButton = document.getElementById('kt_modal_new2_target_cancel');

                    initForm();
                    handleForm();
                }
            };
        }();

        // On document ready
        KTUtil.onDOMContentLoaded(function() {
            KTModalNewTarget.init();
        });
    });
</script>
