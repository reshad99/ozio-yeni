<script>
    let model;
    $(document).on('click', "a[data-bs-target='#kt_modal_new2_target']", async function() {
        // <input class="form-check-input" type="checkbox" value="${data}" /> get value of checkbox
        await window.loadAjax();

        let id = $(this).data('id');

        let form = $("#kt_modal_new2_target_form");
        //ROUTE USER
        let url =
            `{{ route('admin.ajax.users.read', ['id' => '-1']) }}`;
        url = url.replace("-1", id);
        KTApp.showPageLoading();

        //ajax read role data
        $.ajax({
            type: "GET",
            url: url, // Update with your API endpoint
            data: {},
            success: function (response) {
                console.log(response);
                model = response;
                //clear form all inputs
                form.find("input").val("");


                //set form data
                form.find("input[name='edit_id']").val(response.id);
                form.find("input[name='name']").val(response.name);
                form.find("input[name='email']").val(response.email);
                form.find("input[name='bonus_card_no']").val(response.bonus_card_no);




                if (response.phone && response.country_code) {
                const phoneNumber = `+${response.phone}${response.country_code}`;
                phoneIntl.setNumber(phoneNumber);
                form.find("input[name='phone']").val(response.phone);
                }

                //seperate phone take first 4 char and remove + and find this country from phoneIntl and set selected
                // if (response.phone) {
                //     let phoneItl = window.intlTelInput(document.querySelector("#phone"));

                //     phoneItl.setNumber('994'+response.phone);
                //     //remove first 4 char and + from phone
                //     let phone = response.phone.substring(0);
                //     form.find("input[name='phone']").val('+994'+phone);

                // }
                KTApp.hidePageLoading();

            },
            error: function (xhr, status, error) {
                KTApp.hidePageLoading();
                // Handle errors here
                customSwal.dataError(xhr);
            },
        });

    });
    $(document).ready(function () {

        "use strict";

        // Class definition
        var KTModalNewTarget = function () {
            var submitButton;
            var cancelButton;
            var validator;
            var form;
            var modal;
            var modalEl;
            var phoneIntl;

            // Init form inputs
            var initForm = function () {
                // // Tags. For more info, please visit the official plugin site: https://yaireo.github.io/tagify/
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

                const input = form.querySelector("#phone");
                phoneIntl = window.intlTelInput(input, {
                    initialCountry: "az", // Varsayılan ülke: Auto
                    preferredCountries: ["az", "tr", "us"], // Tercih edilen ülkeler
                    separateDialCode: true, // Ülke kodunu ayrı göstermek için
                    utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@24.8.2/build/js/utils.js", // Maskeleme desteği için gerekli

                });
            }

            // Handle form validation and submittion
            var handleForm = function () {
                // Stepper custom navigation

                // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
                validator = FormValidation.formValidation(
                    form, {
                        fields: {
                            name: {
                                validators: {
                                    notEmpty: {
                                        message: "{{ __('admin::general.validation.required', ['attribute' => 'Ad']) }}"
                                    }
                                }
                            },
                            email: {
                                validators: {
                                    notEmpty: {
                                        message: "{{ __('admin::general.validation.required', ['attribute' => 'E-poçt']) }}"
                                    },
                                    emailAddress: {
                                        message: "{{ __('admin::general.validation.email') }}"
                                    }
                                }
                            },
                            phone: {
                                validators: {
                                    notEmpty: {
                                        message: "{{ __('admin::general.validation.required', ['attribute' => 'Telefon nömrəsi']) }}"
                                    }
                                }
                            },
                            bonus_card_no: {
                                validators: {
                                    notEmpty: {
                                        message: "{{ __('admin::general.validation.required', ['attribute' => 'Bonus kart nömrəsi']) }}"
                                    }
                                }
                            },
                            // password: {
                            //     validators: {
                            //         notEmpty: {
                            //             message: "{{ __('admin::general.validation.required', ['attribute' => 'Şifrə']) }}"
                            //         }
                            //     }
                            // },
                            // password_confirmation: {
                            //     validators: {
                            //         notEmpty: {
                            //             message: "{{ __('admin::general.validation.required', ['attribute' => 'Şifrə təkrarı']) }}"
                            //         },
                            //         identical: {
                            //             compare: function () {
                            //                 return form.querySelector('[name="password"]').value;
                            //             },
                            //             message: "{{ __('admin::general.validation.same', ['attribute' => 'Şifrə']) }}"
                            //         }
                            //     }
                            // }
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
                submitButton.addEventListener('click', function (e) {
                    e.preventDefault();

                    // Validate form before submit
                    if (validator) {
                        validator.validate().then(function (status) {
                            console.log('validated!');

                            if (status == 'Valid') {
                                let formValues = $("#kt_modal_new2_target_form")
                                    .serializeArray();
                                let formData = new FormData();
                                //append form data


                                formData.append('edit_id', model.id);
                                formValues.forEach(function(item) {
                                    if (model.hasOwnProperty(item.name) &&
                                        model[item.name] != item.value) {

                                        console.log(model[item.name] +
                                            ' ------- ' +
                                            item.name + " : " + item.value);

                                        formData.append(item.name, item.value);
                                    }
                                });

                                submitButton.setAttribute('data-kt-indicator', 'on');
                                // Disable button to avoid multiple click
                                submitButton.disabled = true;

                                //ROUTE UPDATE
                                let url =
                                    `{{ route('admin.ajax.users.update', ['id' => '-1']) }}`;
                                console.log(url);

                                let id = $("#kt_modal_new2_target_form")
                                    .find(
                                        "input[name='edit_id']").val();

                                url = url.replace("-1", id);

                                $.ajax({
                                    //put method
                                    method: "POST",
                                    url: url, // Update with your API endpoint
                                    data: formData,
                                    processData: false,
                                    contentType: false,
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
