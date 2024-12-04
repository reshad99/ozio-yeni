<script>
    $(document).ready(function() {
        document.querySelector('[data-bs-target="#kt_modal_new_target"]').addEventListener('click',
            async function() {
                await window.loadAjax();
            });
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
                // var tags = new Tagify(form.querySelector('[name="tags"]'), {
                //     whitelist: ["Important", "Urgent", "High", "Medium", "Low"],
                //     maxTags: 5,
                //     dropdown: {
                //         maxItems: 10, // <- mixumum allowed rendered suggestions
                //         enabled: 0, // <- show suggestions on focus
                //         closeOnSelect: false // <- do not hide the suggestions dropdown once an item has been selected
                //     }
                // });
                // tags.on("change", function() {
                //     // Revalidate the field when an option is chosen
                //     validator.revalidateField('tags');
                // });

                // // Due date. For more info, please visit the official plugin site: https://flatpickr.js.org/
                // var dueDate = $(form.querySelector('[name="due_date"]'));
                // dueDate.flatpickr({
                //     enableTime: true,
                //     dateFormat: "d, M Y, H:i",
                // });

                // // Team assign. For more info, plase visit the official plugin site: https://select2.org/
                // $(form.querySelector('[name="team_assign"]')).on('change', function() {
                //     // Revalidate the field when an option is chosen
                //     validator.revalidateField('team_assign');
                // });

                const input = document.querySelector("#phone");
                window.intlTelInput(input, {
                    loadUtilsOnInit: "https://cdn.jsdelivr.net/npm/intl-tel-input@24.8.2/build/js/utils.js",
                });
            }

            // Handle form validation and submittion
            var handleForm = function() {
                // Stepper custom navigation


                // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
                validator = FormValidation.formValidation(
                    form, {
                        fields: {
                            first_name: {
                                validators: {
                                    notEmpty: {
                                        message: "{{ __('admin::general.pages.users.list.first_name_is_required') }}"
                                    }
                                }
                            },
                            last_name: {
                                validators: {
                                    notEmpty: {
                                        message: "{{ __('admin::general.pages.users.list.last_name_is_required') }}"
                                    }
                                }
                            },
                            email: {
                                validators: {
                                    notEmpty: {
                                        message: "{{ __('admin::general.pages.users.list.email_is_required') }}"
                                    }
                                }
                            },
                            password: {
                                validators: {
                                    notEmpty: {
                                        message: "{{ __('admin::general.pages.users.list.password_is_required') }}"
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
                    console.log('click');
                    e.preventDefault();

                    // Validate form before submit
                    if (validator) {
                        validator.validate().then(function(status) {
                            console.log('validated!');

                            if (status == 'Valid') {
                                let formData = $(
                                        "#kt_modal_new_target_form")
                                    .serializeArray();
                                console.log(formData);

                                //remove empty fields
                                formData = formData.filter(function(item) {
                                    return item.value != '' && item.value !=
                                        '0';
                                });

                                submitButton.setAttribute(
                                    'data-kt-indicator',
                                    'on');
                                // Disable button to avoid multiple click
                                submitButton.disabled = true;

                                console.log(formData);
                                $.ajax({
                                    type: "POST",
                                    //TODO ROUTE AJAX
                                    url: "", // Update with your API endpoint
                                    data: formData,
                                    success: function(response) {

                                        // Handle the success response here
                                        submitButton
                                            .removeAttribute(
                                                'data-kt-indicator'
                                            );
                                        submitButton.disabled =
                                            false;
                                        Swal.fire({
                                            text: " {{ __('admin::general.pages.users.list.added_new_user') }}",
                                            icon: "success",
                                            buttonsStyling: false,
                                            confirmButtonText: " {{ __('admin::general.shared.got_it') }}",
                                            customClass: {
                                                confirmButton: "btn btn-primary"
                                            }
                                        }).then(
                                            function(
                                                result
                                            ) {
                                                if (result
                                                    .isConfirmed
                                                ) {
                                                    modal
                                                        .hide();
                                                    var datatable =
                                                        $(
                                                            '#kt_datatable_example_1'
                                                        )
                                                        .DataTable();
                                                    datatable
                                                        .ajax
                                                        .reload();
                                                    form
                                                        .reset();
                                                }
                                            });
                                    },
                                    error: function(xhr, status,
                                        error) {
                                        submitButton
                                            .removeAttribute(
                                                'data-kt-indicator'
                                            );
                                        submitButton.disabled =
                                            false;
                                        // Handle errors here
                                        customSwal.dataError(xhr)
                                    }
                                });
                            } else {
                                submitButton.removeAttribute(
                                    'data-kt-indicator');
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
                    modalEl = document.querySelector('#kt_modal_new_target');

                    if (!modalEl) {
                        return;
                    }

                    modal = new bootstrap.Modal(modalEl);

                    form = document.querySelector('#kt_modal_new_target_form');
                    submitButton = document.getElementById('kt_modal_new_target_submit');
                    cancelButton = document.getElementById('kt_modal_new_target_cancel');

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
