<script>
    //document ready jquery
    $(document).on('click', "a[data-bs-target='#kt_modal_new3_target']", function() {
        // <input class="form-check-input" type="checkbox" value="${data}" /> get value of checkbox

        let emergencycall_id = $(this).data('id');
        console.log(emergencycall_id);

        let form = $("#kt_modal_new3_target_form");
        let url =
            `{{ route('admin.ajax.emergencycall.read', ['id' => '-1']) }}`;
        url = url.replace("-1", emergencycall_id);
        console.log(url);
        //ajax read role data
        $.ajax({
            type: "GET",
            url: url, // Update with your API endpoint,
            data: {
                with: ['caller', 'category', 'subCategory']
            },
            success: function(response) {
                if (response.status != 'OPEN' && response.status != 'DECLINED') {
                    let assignModal = $('#kt_modal_new3_target');
                    Swal.fire({
                        text: " {{ __('admin::general.pages.emergencyCall.list.only_open_status_can_be_assigned') }}",
                        icon: "error",
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
                                assignModal.find(
                                        "div[data-bs-dismiss='modal']"
                                    )
                                    .trigger('click');
                            }
                        })
                    return;
                }

                // Handle the success response here
                console.log(response);
                form.find("input[name='edit_id']")
                    .val(response.id);
                form.find("input[name='address']")
                    .val(response.oriyentr_address);
                // if (response.category) {
                //     form.find("select[name='category_id']").val(
                //         response.category.id);
                // }
                // form.find(
                //         "select[name='category_id']")
                //     .trigger('change');
                // form.find(
                //         "select[name='sub_category_id']")
                //     .val(response.sub_category.id);
                window.changeCategory(response.sub_category);
                //trigger change event to update select2
                // form.find(
                //         "select[name='sub_category_id']")
                //     .trigger('change');
                // accident_description
                form.find(
                        "textarea[name='accident_description']")
                    .val(response.accident_description);

                let is_subscriber = response.caller?.is_subscriber;
                // subscriber_caller_first_name
                let fieldModal = $('#fieldModal');

                fieldModal.find(
                    "input[name='subscriber_caller_first_name']"
                ).val(response.caller.first_name);
                fieldModal.find(
                        "input[name='subscriber_caller_last_name']")
                    .val(response.caller.last_name);
                fieldModal.find(
                    "input[name='subscriber_caller_father_name']"
                ).val(response.caller.father_name);
                fieldModal.find(
                    "input[name='subscriber_city']").val(
                    response.caller.city);
                fieldModal.find(
                    "input[name='subscriber_region']").val(
                    response.caller.region);
                fieldModal.find(
                    "input[name='subscriber_street']").val(
                    response.caller.street);
                fieldModal.find(
                        "input[name='subscriber_house_number']")
                    .val(response.caller.house_number);
                fieldModal.find(
                        "input[name='subscriber_flat_number']")
                    .val(response.caller.flat_number);
                // subscriber_accident_address
                fieldModal.find(
                        "input[name='subscriber_accident_address']")
                    .val(response.caller.full_address);
                // subscriber_caller_phone_number accident_address
                fieldModal.find(
                        "input[name='caller_phone_number']"
                    )
                    .val(response.caller.phone);
                fieldModal.find(
                        "input[name='accident_address']")
                    .val(response.oriyentr_address);
                fieldModal.find(
                        "input[name='subscriber_passport_number']")
                    .val(response.caller?.passport_number);
            },
            error: function(xhr, status, error) {
                // Handle errors here
                customSwal.dataError(xhr);
            },
        });


    });
    // $(document).ready(function() {
    //     //begin custom script for edit modal
    //     window.clickAssignButton = function clickAssignButton() {
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
                            // edit_category_id: {
                            //     validators: {
                            //         notEmpty: {
                            //             message: "{{ __('admin::general.pages.emergencyCall.list.category_is_required') }}"
                            //         }
                            //     }
                            // },
                            // edit_sub_category_id: {
                            //     validators: {
                            //         notEmpty: {
                            //             message: "{{ __('admin::general.pages.emergencyCall.list.sub_category_is_required') }}"
                            //         }
                            //     }
                            // },
                            // edit_accident_address: {
                            //     validators: {
                            //         notEmpty: {
                            //             message: "{{ __('admin::general.pages.emergencyCall.list.accident_location_is_required') }}"
                            //         }
                            //     }
                            // },
                            // edit_caller_fullname: {
                            //     validators: {
                            //         notEmpty: {
                            //             message: "{{ __('admin::general.pages.emergencyCall.list.caller_full_name_is_required') }}"
                            //         }
                            //     }
                            // },
                            // edit_caller_phone_number: {
                            //     validators: {
                            //         notEmpty: {
                            //             message: "{{ __('admin::general.pages.emergencyCall.list.caller_phone_number_is_required') }}"
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
                    e.preventDefault();

                    // Validate form before submit
                    if (validator) {
                        validator.validate().then(function(status) {
                            console.log('validated!');

                            if (status == 'Valid') {
                                let formData = $("#kt_modal_new3_target_form")
                                    .serializeArray();

                                console.log(formData);
                                submitButton.setAttribute('data-kt-indicator', 'on');
                                // Disable button to avoid multiple click
                                submitButton.disabled = true;

                                let url =
                                    `{{ route('admin.ajax.emergencycall.update', ['id' => '-1']) }}`;

                                let emergencycall_id = $("#kt_modal_new3_target_form")
                                    .find(
                                        "input[name='edit_id']").val();

                                url = url.replace("-1", emergencycall_id);

                                $.ajax({
                                    type: "PUT",
                                    url: url, // Update with your API endpoint
                                    data: formData,
                                    success: function(response) {
                                        // Handle the success response here
                                        submitButton.removeAttribute(
                                            'data-kt-indicator');
                                        submitButton.disabled = false;
                                        customSwal.formSuccessWithMessage(
                                            "{{ __('admin::general.pages.emergencyCall.list.worker_assigned_to_emergency') }}"
                                        ).then(
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
                    modalEl = document.querySelector('#kt_modal_new3_target');

                    if (!modalEl) {
                        return;
                    }

                    modal = new bootstrap.Modal(modalEl);

                    form = document.querySelector('#kt_modal_new3_target_form');
                    submitButton = document.getElementById('kt_modal_new3_target_submit');
                    cancelButton = document.getElementById('kt_modal_new3_target_cancel');

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
