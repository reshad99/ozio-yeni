<script>
    $(document).on('click', "a[data-bs-target='#kt_modal_new2_target']", async function() {
        // <input class="form-check-input" type="checkbox" value="${data}" /> get value of checkbox
        await window.loadAjax();

        let user_id = $(this).data('id');

        let form = $("#kt_modal_new2_target_form");
        let url =
            `{{ route('admin.ajax.user.read', ['id' => '-1']) }}`;
        url = url.replace("-1", user_id);
        KTApp.showPageLoading();

        //ajax read role data
        $.ajax({
            type: "GET",
            url: url, // Update with your API endpoint
            data: {
                user_id: user_id,
                with: ['permissions','roles','organisation', 'region', 'department']
            },
            success: function(response) {
                KTApp.hidePageLoading();
                console.log(response);
                //clear form all inputs
                form.find("input").val("");
                form.find("select").val(null).trigger("change");

                //set form data
                form.find("input[name='edit_id']").val(response.id);
                form.find("input[name='first_name']").val(response.first_name);
                form.find("input[name='last_name']").val(response.last_name);
                form.find("input[name='father_name']").val(response.father_name);
                form.find("input[name='phone']").val(response.phone);
                //find select department_id
                if (response.organisation != null) {
                    form.find("select[name='organisation_id']").val(response.organisation.id)
                        .trigger("change");
                } else {
                    form.find("select[name='organisation_id']").val('0')
                        .trigger("change");
                }
                if (response.region != null) {
                    form.find("select[name='region_id']").val(response.region.id)
                        .trigger("change");
                } else {
                    form.find("select[name='region_id']").val('0')
                        .trigger("change");
                }
                if (response.department != null) {
                    form.find("select[name='department_id']").val(response.department.id)
                        .trigger("change");
                } else {
                    console.log("department_id");
                    form.find("select[name='department_id']").val('0')
                        .trigger("change");
                }
                form.find("input[name='email']").val(response.email);

                form.find("input[name='roles[]']").each(function() {
                    $(this).prop("checked", false);
                });
                response.roles.forEach(function(role) {
                    form.find("input[name='roles[]'][data-role-name='" + role.name +
                        "']").prop("checked", true);
                });
                form.find("input[name='modules[]']").each(function() {
                    $(this).prop("checked", false);
                });
                let modules = [];
                response.permissions.forEach(function(permission) {
                    // get permission modules
                    modules.push(permission.module);
                    // form.find("input[name='modules[]'][data-module-name='" + module.name +
                    // "']").prop("checked", true);
                });
                //remove duplicate modules
                modules = modules.filter((v, i, a) => a.indexOf(v) === i);
                //strlower modules but only first letter upper
                modules.forEach(function(module) {
                    //find checkboxes where data-module-name is equal to module name
                    form.find("input[name='modules[]'][data-module-name='" + module +
                        "']").prop("checked", true);
                });


            },
            error: function(xhr, status, error) {
                KTApp.hidePageLoading();
                // Handle errors here
                customSwal.dataError(xhr);
            },
        });

    });
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
                                        "" && item.value != '0';
                                });
                                let roles = [];
                                $("#kt_modal_new2_target_form").find(
                                    "input[name='roles[]']:checked").each(
                                    function() {
                                        //get attr data-role-name
                                        roles.push($(this).data(
                                            "role-name"));
                                    });
                                if (roles != '')
                                    formData.push({
                                        name: "roles[]",
                                        value: roles
                                    });

                                $("#kt_modal_new2_target_form").find(
                                    "input[name='modules[]']:checked").each(
                                    function() {
                                        //get attr data-module-name
                                        formData.push({
                                            name: "modules[]",
                                            value: $(this).data(
                                                "module-name")
                                        });
                                    });

                                //check form data have modules[]
                                let modules = formData.filter(function(item) {
                                    return item.name == 'modules[]';
                                });
                                if (modules.length == 0) {
                                    formData.push({
                                        name: "modules[]",
                                        value: '-1'
                                    });
                                }

                                console.log(formData);

                                submitButton.setAttribute('data-kt-indicator', 'on');
                                // Disable button to avoid multiple click
                                submitButton.disabled = true;

                                let url =
                                    `{{ route('admin.ajax.user.update', ['id' => '-1']) }}`;
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
