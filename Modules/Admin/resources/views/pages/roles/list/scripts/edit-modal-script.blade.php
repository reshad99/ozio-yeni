<script>
    //begin custom script for edit modal
    let buttons = $("button[data-bs-target='#kt_modal_update_role']");
    buttons.each(function() {
        $(this).on("click", function() {
            let role_id = $(this).closest(".card").parent().attr("id").split("_")[2];
            let form = $("#kt_modal_update_role_form");
            let url = `{{ route('admin.ajax.role.read', ['id' => '-1']) }}`;
            url = url.replace("-1", role_id);
            //ajax read role data
            $.ajax({
                type: "GET",
                url: url, // Update with your API endpoint
                data: {
                    role_id: role_id,
                    with:['permissions']
                },
                success: function(response) {
                    // Handle the success response here
                    form.find("input[name='name']").val(response.name);
                    form.find("input[name='id']").val(response.id);
                    form.find("input[name='permissions[]']").each(function() {
                        $(this).prop("checked", false);
                    });
                    response.permissions.forEach(function(permission) {
                        form.find("input[name='permissions[]'][value='" + permission
                            .name + "']").prop("checked", true);
                    });
                    //check which permissions are checked if all are checked then check select all checkbox
                    let allChecked = true;
                    form.find("input[name='permissions[]']").each(function() {
                        if (!$(this).prop("checked")) {
                            allChecked = false;
                        }
                    });

                    if (allChecked) form.find("#kt_roles_select_all").prop("checked", true);
                },
                error: function(xhr, status, error) {
                    // Handle errors here
                    customSwal.dataError(xhr);
                    submitButton.removeAttr("data-kt-indicator");
                }
            });


        });
    });
    //end custom script for edit modal
    $(document).ready(function() {
        "use strict";

        // Class definition
        var KTUsersUpdatePermissions = function() {
            // Shared variables
            const element = document.getElementById('kt_modal_update_role');
            const form = element.querySelector('#kt_modal_update_role_form');
            const modal = new bootstrap.Modal(element);

            // Init add schedule modal
            var initUpdatePermissions = () => {

                // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
                var validator = FormValidation.formValidation(
                    form, {
                        fields: {
                            'role_name': {
                                validators: {
                                    notEmpty: {
                                        message: '{{ __('admin::general.pages.roles.list.role_name_is_required') }}'
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

                // Close button handler
                const closeButton = element.querySelector('[data-kt-roles-modal-action="close"]');
                closeButton.addEventListener('click', e => {
                    e.preventDefault();

                    customSwal.cancelIt().then(function(result) {
                        if (result.value) {
                            modal.hide(); // Hide modal
                        }
                    });
                });

                // Cancel button handler
                const cancelButton = element.querySelector('[data-kt-roles-modal-action="cancel"]');
                cancelButton.addEventListener('click', e => {
                    e.preventDefault();

                    customSwal.cancelIt().then(function(result) {
                        if (result.value) {
                            form.reset(); // Reset form
                            modal.hide(); // Hide modal
                        } else if (result.dismiss === 'cancel') {
                            customSwal.formCancel()
                        }
                    });
                });

                // Submit button handler
                const submitButton = element.querySelector('[data-kt-roles-modal-action="submit"]');
                submitButton.addEventListener('click', function(e) {
                    // Prevent default button action
                    e.preventDefault();

                    // Validate form before submit
                    if (validator) {
                        validator.validate().then(function(status) {
                            console.log('validated!');
                            if ("Valid" === status) {

                                // Show loading indication
                                submitButton.setAttribute('data-kt-indicator', 'on');

                                // Disable button to avoid multiple click
                                submitButton.disabled = true;

                                let form = $("#kt_modal_update_role_form");
                                let formData = form.serialize();
                                let url =
                                    `{{ route('admin.ajax.role.update', ['id' => '-1']) }}`;
                                //change -1 with input name role_id value
                                url = url.replace("-1", form.find(
                                    "input[name='id']").val());

                                $.ajax({
                                    type: "PUT",
                                    url: url, // Update with your API endpoint
                                    data: formData,
                                    success: function(
                                        response) {
                                        // Handle the success response here
                                        // Show loading indication
                                        submitButton.removeAttribute(
                                            'data-kt-indicator');

                                        // Disable button to avoid multiple click
                                        submitButton.disabled = false;
                                        customSwal.formSuccess().then((
                                            function(
                                                t) {
                                                if (t
                                                    .isConfirmed
                                                ) {
                                                    modal
                                                        .hide()
                                                }
                                            }))
                                    },
                                    error: function(xhr, status,
                                        error) {
                                        // Handle errors here
                                        customSwal.formSuccess()
                                        // Show loading indication
                                        submitButton.removeAttribute(
                                            'data-kt-indicator');

                                        // Disable button to avoid multiple click
                                        submitButton.disabled = false;

                                    }
                                });
                            } else {
                                // Show loading indication
                                submitButton.removeAttribute(
                                    'data-kt-indicator');

                                // Disable button to avoid multiple click
                                submitButton.disabled = false;
                                customSwal.normalError();
                            }
                        });
                    }
                });
            }

            // Select all handler
            const handleSelectAll = () => {
                // Define variables
                const selectAll = form.querySelector('#kt_roles_select_all');
                const allCheckboxes = form.querySelectorAll('[type="checkbox"]');

                // Handle check state
                selectAll.addEventListener('change', e => {

                    // Apply check state to all checkboxes
                    allCheckboxes.forEach(c => {
                        c.checked = e.target.checked;
                    });
                });
            }

            return {
                // Public functions
                init: function() {
                    initUpdatePermissions();
                    handleSelectAll();
                }
            };
        }();

        // On document ready
        KTUtil.onDOMContentLoaded(function() {
            KTUsersUpdatePermissions.init();
        });
    });
</script>
