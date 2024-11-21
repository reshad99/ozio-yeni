<script>
    $(document).ready(function() {
        "use strict";
        var KTUsersAddRole = (function() {
            var modalElement = $("#kt_modal_add_role"),
                formElement = modalElement.find("#kt_modal_add_role_form"),
                modal = new bootstrap.Modal(modalElement[0]);

            return {
                init: function() {
                    var formValidation = FormValidation.formValidation(formElement[0], {
                        fields: {
                            name: {
                                validators: {
                                    notEmpty: {
                                        message: "{{ __('admin::general.pages.roles.list.role_name_is_required') }}"
                                    }
                                }
                            }
                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            bootstrap: new FormValidation.plugins.Bootstrap5({
                                rowSelector: ".fv-row",
                                eleInvalidClass: "",
                                eleValidClass: ""
                            })
                        },
                    });

                    modalElement.find('[data-kt-roles-modal-action="close"]').on("click", function(
                        e) {
                        e.preventDefault();
                        customSwal.cancelIt().then(function(result) {
                            if (result.value) {
                                modal.hide();
                            }
                        });
                    });

                    modalElement.find('[data-kt-roles-modal-action="cancel"]').on("click", function(
                        e) {
                        e.preventDefault();
                        customSwal.cancelIt().then(function(result) {
                            if (result.value) {
                                formElement[0].reset();
                                modal.hide();
                            } else if (result.dismiss === Swal.DismissReason
                                .cancel) {
                                customSwal.formCancel()
                            }
                        });
                    });

                    var submitButton = modalElement.find('[data-kt-roles-modal-action="submit"]');
                    submitButton.on("click", function(e) {
                        e.preventDefault();
                        formValidation.validate().then(function(status) {
                            if (status === 'Valid') {
                                submitButton.attr("data-kt-indicator", "on");
                                submitButton.prop("disabled", true);

                                var formData = formElement.serialize();

                                $.ajax({
                                    type: "POST",
                                    url: "{{ route('admin.ajax.role.createComponent') }}", // Update with your API endpoint
                                    data: formData,
                                    success: function(response) {
                                        // Handle the success response here
                                        submitButton
                                            .removeAttr(
                                                "data-kt-indicator"
                                            );
                                        submitButton.prop(
                                            "disabled",
                                            false);
                                        customSwal.formSuccess().then(
                                            function(
                                                result
                                            ) {
                                                if (result
                                                    .isConfirmed
                                                ) {
                                                    modal
                                                        .hide();
                                                    $('#kt_roles_list')
                                                        .children()
                                                        .last()
                                                        .before(
                                                            response
                                                            .component
                                                        );
                                                }
                                            });
                                    },
                                    error: function(xhr, status, error) {
                                        // Handle errors here
                                        customSwal.dataError(xhr);
                                        submitButton.removeAttr(
                                            "data-kt-indicator");
                                        submitButton.prop("disabled",
                                            false);
                                    }
                                });
                            } else {
                                submitButton.removeAttr("data-kt-indicator");
                                submitButton.prop("disabled", false);

                               customSwal.normalError();
                            }
                        });
                    });

                    var selectAllCheckbox = formElement.find("#kt_roles_select_all"),
                        checkboxes = formElement.find('[type="checkbox"]');

                    selectAllCheckbox.on("change", function() {
                        checkboxes.prop("checked", $(this).is(":checked"));
                    });
                }
            };
        })();

        KTUsersAddRole.init();
    });
</script>
