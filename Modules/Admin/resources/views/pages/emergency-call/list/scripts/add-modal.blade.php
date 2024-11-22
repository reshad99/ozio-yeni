@can('create-emergency')
<script>
    //get category_id when change category send ajax request to get subcategories
    $(document).on('click', "button[data-bs-target='#kt_modal_new_target']", async function() {
        let year = new Date().getFullYear();
        $('#custom_id_section').val('AQ-' + year +
            '-' + lastInsertedId);
    });

    $(document).ready(function() {
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
                            // category_id: {
                            //     validators: {
                            //         notEmpty: {
                            //             message: "{{ __('admin::general.pages.emergencyCall.list.category_is_required') }}"
                            //         }
                            //     }
                            // },
                            // sub_category_id: {
                            //     validators: {
                            //         notEmpty: {
                            //             message: "{{ __('admin::general.pages.emergencyCall.list.sub_category_is_required') }}"
                            //         }
                            //     }
                            // },
                            // accident_description: {
                            //     validators: {
                            //         notEmpty: {
                            //             message: "{{ __('admin::general.pages.emergencyCall.list.accident_description_is_required') }}"
                            //         }
                            //     }
                            // },
                            // subscriber_caller_first_name: {
                            //     validators: {
                            //         notEmpty: {
                            //             message: "{{ __('admin::general.pages.emergencyCall.list.subscriber_caller_first_name_is_required') }}"
                            //         }
                            //     }
                            // },
                            // subscriber_caller_last_name: {
                            //     validators: {
                            //         notEmpty: {
                            //             message: "{{ __('admin::general.pages.emergencyCall.list.subscriber_caller_last_name_is_required') }}"
                            //         }
                            //     }
                            // },
                            // subscriber_caller_father_name: {
                            //     validators: {
                            //         notEmpty: {
                            //             message: "{{ __('admin::general.pages.emergencyCall.list.subscriber_caller_father_name_is_required') }}"
                            //         }
                            //     }
                            // },
                            // subscriber_caller_fin: {
                            //     validators: {
                            //         notEmpty: {
                            //             message: "{{ __('admin::general.pages.emergencyCall.list.subscriber_caller_fin_is_required') }}"
                            //         }
                            //     }
                            // },
                            // subscriber_city: {
                            //     validators: {
                            //         notEmpty: {
                            //             message: "{{ __('admin::general.pages.emergencyCall.list.subscriber_city_is_required') }}"
                            //         }
                            //     }
                            // },
                            // subscriber_region: {
                            //     validators: {
                            //         notEmpty: {
                            //             message: "{{ __('admin::general.pages.emergencyCall.list.subscriber_region_is_required') }}"
                            //         }
                            //     }
                            // },
                            // subscriber_street: {
                            //     validators: {
                            //         notEmpty: {
                            //             message: "{{ __('admin::general.pages.emergencyCall.list.subscriber_street_is_required') }}"
                            //         }
                            //     }
                            // },
                            // accident_address: {
                            //     validators: {
                            //         notEmpty: {
                            //             message: "{{ __('admin::general.pages.emergencyCall.list.accident_address_is_required') }}"
                            //         }
                            //     }
                            // },
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
                                    return item.value != '';
                                });


                                submitButton.setAttribute(
                                    'data-kt-indicator',
                                    'on');
                                // Disable button to avoid multiple click
                                submitButton.disabled = true;

                                console.log(formData);
                                $.ajax({
                                    type: "POST",
                                    url: "{{ route('admin.ajax.emergencycall.create') }}", // Update with your API endpoint
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
                                            text: " {{ __('admin::general.pages.emergencyCall.list.added_new_emergencycall') }}",
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
                                                    $('#filter_date_start')
                                                        .val('');
                                                    $('#filter_date_end')
                                                        .val('');
                                                    $('#filter_status')
                                                        .val('')
                                                        .trigger(
                                                            'change');
                                                    $('#filter_subscriber_number')
                                                        .val('');
                                                    $('#filter_meter_number')
                                                        .val('');
                                                    $('#filter_phone_number')
                                                        .val('');
                                                    $('#filter_worker_id')
                                                        .val('')
                                                        .trigger(
                                                            'change');
                                                    $('#filter_custom_id')
                                                        .val('');
                                                    $('#filter_category_id')
                                                        .val('')
                                                        .trigger(
                                                            'change');
                                                    $('#filter_sub_category_id')
                                                        .val('')
                                                        .trigger(
                                                            'change');
                                                    $('#filter_caller_search')
                                                        .val('');
                                                    window.datatable
                                                        .draw();
                                                    let addressForm =
                                                        $(
                                                            '#kt_modal_new_address_form'
                                                        );
                                                    addressForm
                                                        .find(
                                                            '#flat_number'
                                                        )
                                                        .val(
                                                            ''
                                                        );
                                                    addressForm
                                                        .find(
                                                            '#house_number'
                                                        )
                                                        .val(
                                                            ''
                                                        );
                                                    form
                                                        .reset();
                                                    lastInsertedId
                                                        =
                                                        lastInsertedId +
                                                        1;

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
@endcan
