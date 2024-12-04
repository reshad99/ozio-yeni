<script>
    $(document).on('click', "a[data-bs-target='#kt_modal_new2_target']", async function() {
        // <input class="form-check-input" type="checkbox" value="${data}" /> get value of checkbox
        KTApp.showPageLoading();

        await window.LoadSelectAddressModalAjax();

        let id = $(this).data('id');

        let form = $("#kt_modal_new2_target_form");
        //TODO ROUTE
        let url = `{{ route('', ['id' => '-1']) }}`;
        //ajax read role data
        $.ajax({
            type: "GET",
            data: {},
            url: url.replace("-1", id), // Update with your API endpoint
            success: function(response) {
                // Handle the success response here
                console.log(response);
                form.find("input[name='edit_id']")
                    .val(response.id);
                KTApp.hidePageLoading();
            },
            error: function(xhr, status, error) {
                // Handle errors here
                KTApp.hidePageLoading();
                customSwal.dataError(xhr);
            },
        });

    });
    $(document).ready(function() {

        "use strict";

        // Class definition
        var KTModalNewTarget = function() {
            var submitButton;
            var closeButton;
            var cancelButton;
            var validator;
            var form;
            var modal;
            var modalEl;

            // Init form inputs
            var initForm = function() {
                // Tags. For more info, please visit the official plugin site: https://yaireo.github.io/tagify/

            }

            // Handle form validation and submittion
            var handleForm = function() {
                // Stepper custom navigation

                // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
                validator = FormValidation.formValidation(
                    form, {
                        fields: {
                            //TODO XANLAR
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

                                //ROUTE UPDATE
                                let url =
                                    `{{ route('', ['id' => '-1']) }}`;

                                let id = $("#kt_modal_new2_target_form")
                                    .find(
                                        "input[name='edit_id']").val();
                                //
                                // url = url.replace("-1", emergencycall_id);

                                $.ajax({
                                    type: "PUT",
                                    url: url.replace("-1", id),
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

                closeButton.addEventListener('click', function(e) {
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
                    closeButton = document.getElementById('kt_modal_new2_target_close');
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
