<script>
    // //document ready
    // $(document).ready(function() {
    //     //begin custom script for edit modal
    //     window.clickEditButton = function clickEditButton() {
    //         let a = $("");
    //         a.each(function() {
    //             $(this).on("click", function() {


    //             });
    //         });
    //     }

    // });
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


            $(document).on('click', "a[data-bs-target='#kt_modal_new2_target']", async function() {
                // <input class="form-check-input" type="checkbox" value="${data}" /> get value of checkbox
                await window.loadAjax();

                let department_id = $(this).data('id');

                let form = $("#kt_modal_new2_target_form");
                let url =
                    `{{ route('admin.ajax.region.read', ['id' => '-1']) }}`;
                url = url.replace("-1", department_id);
                //ajax read role data
                $.ajax({
                    type: "GET",
                    url: url, // Update with your API endpoint
                    data: {
                        with: ['organisation']
                    },
                    success: function(response) {
                        console.log(response);
                        form.find("input[name='name']").val(response.name);
                        form.find("select[name='organisation_id']").val(response
                                .organisation.id)
                            .trigger('change');
                        form.find("input[name='edit_id']").val(response.id);
                    },
                    error: function(xhr, status, error) {
                        modal.hide();
                        customSwal.dataError(xhr);

                    },
                });

            });

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
                            name: {
                                validators: {
                                    notEmpty: {
                                        message: "{{ __('admin::general.pages.region.list.name_required') }}"
                                    }
                                }
                            },
                            organisation_id: {
                                validators: {
                                    notEmpty: {
                                        message: "{{ __('admin::general.pages.region.list.organisation_required') }}"
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
                                console.log(formData);

                                submitButton.setAttribute('data-kt-indicator', 'on');
                                // Disable button to avoid multiple click
                                submitButton.disabled = true;

                                let url =
                                    `{{ route('admin.ajax.region.update', ['id' => '-1']) }}`;


                                let department_id = $("#kt_modal_new2_target_form")
                                    .find(
                                        "input[name='edit_id']").val();

                                url = url.replace("-1", department_id);
                                console.log(url);

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
