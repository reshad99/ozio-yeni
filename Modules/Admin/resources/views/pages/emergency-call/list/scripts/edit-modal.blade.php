<script>
    $(document).on('click', "a[data-bs-target='#kt_modal_new2_target']", async function() {
        // <input class="form-check-input" type="checkbox" value="${data}" /> get value of checkbox
        KTApp.showPageLoading();

        await window.LoadSelectAddressModalAjax();

        let emergencycall_id = $(this).data('id');

        let form = $("#kt_modal_new2_target_form");
        let url =
            `{{ route('admin.ajax.emergencycall.read', ['id' => '-1']) }}`;
        url = url.replace("-1", emergencycall_id);
        //ajax read role data
        $.ajax({
            type: "GET",
            data: {
                with: ['caller', 'category', 'subCategory'
                ]
            },
            url: url, // Update with your API endpoint
            success: function(response) {
                // Handle the success response here
                console.log(response);
                form.find("input[name='edit_id']")
                    .val(response.id);
                form.find("input[name='address']")
                    .val(response.oriyentr_address);

                form.find("input[name='crm_code']").val(response.crm_code);
                // if (response.category) {
                //     form.find("select[name='category_id']").val(
                //         response.category.id);
                //     form.find(
                //             "select[name='category_id']")
                //         .trigger('change');
                // }
                // setTimeout(() => {
                //     form.find(
                //             "select[name='sub_category_id']"
                //         )
                //         .val(response.sub_category.id);
                //     //trigger change event to update select2
                //     form.find(
                //             "select[name='sub_category_id']"
                //         )
                //         .trigger('change');
                // }, 500);
                window.changeCategory(response.sub_category);


                // accident_description
                form.find(
                        "textarea[name='accident_description']")
                    .val(response.accident_description);

                let is_subscriber = response.caller?.is_subscriber;
                // subscriber_caller_first_name
                let editModalSection;
                if (is_subscriber) {
                    editModalSection = form.find("#kt_tab_pane_3");
                    let a = form.find(
                        "a[href='#kt_tab_pane_3']");
                    a.show();
                    // add class active
                    a.addClass("active");
                    editModalSection.show();
                    //add active show
                    editModalSection.addClass("active show");

                    //delete/{id} not subscriber section
                    let otherPanel = form.find("#kt_tab_pane_4");
                    let otherA = form.find(
                        "a[href='#kt_tab_pane_4']");
                    //check if otherpanel is active
                    if (otherPanel.hasClass("active")) {
                        //remove active class
                        otherPanel.removeClass("active show");
                        //remove active class
                        otherA.removeClass("active");
                    }

                    //add display none
                    otherPanel.hide();
                    otherA.hide();

                    // otherpanel get all inputs
                    let inputs = otherPanel.find("input");
                    //set them disabled
                    inputs.attr("disabled", true);
                } else {
                    editModalSection = form.find("#kt_tab_pane_4");
                    let a = form.find("a[href='#kt_tab_pane_4']");

                    //get all editmodal inputs
                    let inputs = editModalSection.find("input");
                    //set them disabled
                    inputs.attr("disabled", false);

                    //check a and edit section if they are hidden then show them
                    a.show();
                    editModalSection.show();

                    // add class active
                    a.addClass("active");
                    editModalSection.show();
                    a.show();

                    //add active show
                    editModalSection.addClass("active show");
                    //delete/{id} subscriber section
                    let otherPanel = form.find("#kt_tab_pane_3");
                    let otherA = form.find(
                        "a[href='#kt_tab_pane_3']");
                    if (otherPanel.hasClass("active")) {
                        //remove active class
                        otherPanel.removeClass("active show");
                        //remove active class
                        otherA.removeClass("active");
                    }
                    //add display none
                    otherPanel.hide();
                    otherA.hide();
                }

                editModalSection.find(
                    "input[name='subscriber_caller_first_name']"
                ).val(response.caller.first_name);
                editModalSection.find(
                        "input[name='subscriber_caller_last_name']")
                    .val(response.caller.last_name);
                editModalSection.find(
                    "input[name='subscriber_caller_father_name']"
                ).val(response.caller.father_name);
                editModalSection.find(
                        "input[name='subscriber_caller_fin']")
                    .val(response.caller.fin);
                editModalSection.find(
                    "input[name='subscriber_subscriber_number']"
                ).val(response.caller.subscriber_number);
                editModalSection.find(
                        "input[name='subscriber_meter_number']")
                    .val(response.caller.gas_meter_id);
                editModalSection.find(
                    "input[name='subscriber_city']").val(
                    response.caller.city);
                editModalSection.find(
                    "input[name='subscriber_region']").val(
                    response.caller.region);
                editModalSection.find(
                    "input[name='subscriber_street']").val(
                    response.caller.street);
                editModalSection.find(
                        "input[name='subscriber_house_number']")
                    .val(response.caller.house_number);
                editModalSection.find(
                        "input[name='subscriber_flat_number']")
                    .val(response.caller.flat_number);
                // subscriber_accident_address
                editModalSection.find(
                        "input[name='subscriber_accident_address']")
                    .val(response.caller.full_address);
                // subscriber_caller_phone_number accident_address
                editModalSection.find(
                        "input[name='caller_phone_number']"
                    )
                    .val(response.caller.phone);
                editModalSection.find(
                        "input[name='accident_address']")
                    .val(response.oriyentr_address);
                editModalSection.find(
                        "input[name='subscriber_passport_number']")
                    .val(response.caller?.passport_number);
                if (is_subscriber) {
                    editModalSection.find(
                        "input[name='caller_fullname']"
                    ).val(response.caller.caller_fullname)

                }
                editModalSection.find(
                    "input[name='caller_phone']"
                ).val(response.caller.caller_phone)

                //address modal kt_modal_new_address

                //get div kt_modal_new_address
                let addressModal = $('#kt_modal_new_address');
                //select named city
                let city = addressModal.find('select[name="city"]');
                let regions = addressModal.find(
                    'select[name="region"]');
                let streets = addressModal.find(
                    'select[name="street"]');
                let cityVal = addressModal.find(
                    "select[name='city'] option:contains('" +
                    response.caller.city + "')").val();
                city.val(cityVal);
                city.trigger('change');

                let regionVal = addressModal.find(
                    "select[name='region'] option:contains('" +
                    response.caller.region + "')").val();
                regions.val(regionVal);
                regions.trigger('change');

                let streetVal = addressModal.find(
                    "select[name='street'] option:contains('" +
                    response.caller.street + "')").val();
                streets.val(streetVal);
                streets.trigger('change');

                addressModal.find('#house_number').val(response
                    .caller?.house_number);
                addressModal.find('#flat_number').val(response
                    .caller?.flat_number);



                KTApp.hidePageLoading();
            },
            error: function(xhr, status, error) {
                // Handle errors here
                KTApp.hidePageLoading();
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
                                let formData = $("#kt_modal_new2_target_form")
                                    .serializeArray();
                                console.log(formData);

                                submitButton.setAttribute('data-kt-indicator', 'on');
                                // Disable button to avoid multiple click
                                submitButton.disabled = true;

                                let url =
                                    `{{ route('admin.ajax.emergencycall.update', ['id' => '-1']) }}`;

                                let emergencycall_id = $("#kt_modal_new2_target_form")
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
