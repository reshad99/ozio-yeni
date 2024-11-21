<script>
    //  on click it
    $(document).on('click', "a[data-bs-stacked-modal='#kt_modal_new_address']", async function() {
        await window.LoadSelectAddressModalAjax();
    });

    $(document).ready(async function() {
        "use strict";
        // Class definition
        var KTModalNewAddress = function() {
            var submitButton;
            var cancelButton;
            var validator;
            var form;
            var modal;
            var modalEl;

            // Init form inputs
            var initForm = function() {
                // Team assign. For more info, plase visit the official plugin site: https://select2.org/
                $(form.querySelector('[name="country"]')).select2().on('change', function() {
                    // Revalidate the field when an option is chosen
                    validator.revalidateField('country');
                });
            }

            // Handle form validation and submittion
            var handleForm = function() {
                // Stepper custom navigation

                // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
                validator = FormValidation.formValidation(
                    form, {
                        fields: {
                            city: {
                                validators: {
                                    notEmpty: {
                                        message: 'Şəhər seçin'
                                    }
                                }
                            },
                            region: {
                                validators: {
                                    notEmpty: {
                                        message: 'Rayon seçin'
                                    }
                                }
                            },
                            street: {
                                validators: {
                                    notEmpty: {
                                        message: 'Küçə seçin'
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
                                submitButton.setAttribute('data-kt-indicator',
                                    'on');

                                // Disable button to avoid multiple click 
                                submitButton.disabled = true;



                                submitButton.removeAttribute(
                                    'data-kt-indicator');

                                // Enable button
                                submitButton.disabled = false;

                                // Show success message.  For more info check the plugin's official documentation: https://sweetalert2.github.io/
                                customSwal.formSuccess().then(function(result) {
                                    if (result.isConfirmed) {
                                        // skt_modal_new_target
                                        // data-bs-dismiss="modal" get button with this attribute
                                        let thisModal = $(
                                            '#kt_modal_new_address');
                                        //find div with data-bs-dismiss="modal"
                                        let thisModalDiv = thisModal.find(
                                            'div[data-bs-dismiss="modal"]'
                                        );
                                        //click this div
                                        thisModalDiv.click();


                                        let AddModal = $(
                                            '#kt_modal_new_target');
                                        let addModalSubsSection = AddModal
                                            .find(
                                                '#kt_tab_pane_1');
                                        let addModalNotSubsSection =
                                            AddModal
                                            .find('#kt_tab_pane_2');
                                        let fieldModal = null;

                                        //check which modal is have class show
                                        if (AddModal.hasClass('show') &&
                                            addModalSubsSection.hasClass(
                                                'active')) {
                                            fieldModal =
                                                addModalSubsSection;
                                        } else if (AddModal.hasClass(
                                                'show') &&
                                            addModalNotSubsSection.hasClass(
                                                'active')) {
                                            fieldModal =
                                                addModalNotSubsSection;
                                        }

                                        let editModal = $(
                                            '#kt_modal_new2_target');
                                        let editModalSubsSection = editModal
                                            .find(
                                                '#kt_tab_pane_3');
                                        let editModalNotSubsSection =
                                            editModal
                                            .find('#kt_tab_pane_4');
                                        if (editModal.hasClass('show') &&
                                            editModalSubsSection.hasClass(
                                                'active')) {
                                            fieldModal =
                                                editModalSubsSection;
                                        } else if (editModal.hasClass(
                                                'show') &&

                                            editModalNotSubsSection
                                            .hasClass(
                                                'active')) {
                                            fieldModal =
                                                editModalNotSubsSection;
                                        }


                                        //set input values
                                        let cityOptionName = window
                                            .cityDatas.find(
                                                function(cityData) {
                                                    return cityData
                                                        .Subjectid ==
                                                        city.val();
                                                }).Name;

                                        fieldModal.find(
                                            'input[name="subscriber_city"]'
                                        ).val(
                                            cityOptionName);

                                        let regionOptionName = window
                                            .matrixDatas
                                            .find(
                                                function(matrixData) {
                                                    return matrixData
                                                        .Matrixid ==
                                                        regions.val() &&
                                                        matrixData
                                                        .Subjectid ==
                                                        city.val();
                                                }).Name;

                                        fieldModal.find(
                                                'input[name="subscriber_region"]'
                                            )
                                            .val(regionOptionName);

                                        let streetOptionName = streetDatas
                                            .find(
                                                function(streetData) {
                                                    return streetData
                                                        .Streetid ==
                                                        streets.val() &&
                                                        streetData
                                                        .Matrixid ==
                                                        regions.val() &&
                                                        streetData
                                                        .Subjectid ==
                                                        city.val();
                                                }).Name;
                                        console.log(streets.val());
                                        console.log(streetOptionName);

                                        fieldModal.find(
                                                'input[name="subscriber_street"]'
                                            )
                                            .val(streetOptionName);
                                        fieldModal.find(
                                                'input[name="subscriber_accident_address"]'
                                            )
                                            .val(cityOptionName + ', ' +
                                                regionOptionName + ', ' +
                                                streetOptionName +
                                                ', Bina ' +
                                                $('#house_number').val() +
                                                ', Mənzil ' + $(
                                                    '#flat_number').val());

                                        fieldModal.find(
                                            'input[name="subscriber_flat_number"]'
                                        ).val(
                                            $('#flat_number').val()
                                        );
                                        fieldModal.find(
                                            'input[name="subscriber_house_number"]'
                                        ).val(
                                            $('#house_number').val()
                                        );
                                    }
                                });

                                //close modal
                                // AddModal.modal('hide');
                                // //set input values
                                // editModal.find('input[name="city"]').val(city.val());
                                // editModal.find('input[name="matrix"]').val(regions.val());
                                // editModal.find('input[name="street"]').val(streets.val());
                                // //close modal
                                // editModal.modal('hide');
                                // Simulate ajax process
                                // setTimeout(function() {
                                //     submitButton.removeAttribute(
                                //         'data-kt-indicator');

                                //     // Enable button
                                //     submitButton.disabled = false;

                                //     // Show success message.  For more info check the plugin's official documentation: https://sweetalert2.github.io/
                                //     Swal.fire({
                                //         text: "Form has been successfully submitted!",
                                //         icon: "success",
                                //         buttonsStyling: false,
                                //         confirmButtonText: "Ok, got it!",
                                //         customClass: {
                                //             confirmButton: "btn btn-primary"
                                //         }
                                //     }).then(function(result) {
                                //         if (result.isConfirmed) {
                                //             modal.hide();
                                //         }
                                //     });

                                //     //form.submit(); // Submit form
                                // }, 2000);
                            } else {
                                // Show error message.
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
                    modalEl = document.querySelector('#kt_modal_new_address');

                    if (!modalEl) {
                        return;
                    }

                    modal = new bootstrap.Modal(modalEl);

                    form = document.querySelector('#kt_modal_new_address_form');
                    submitButton = document.getElementById('kt_modal_new_address_submit');
                    cancelButton = document.getElementById('kt_modal_new_address_cancel');

                    initForm();
                    handleForm();
                }
            };
        }();

        // On document ready
        KTUtil.onDOMContentLoaded(function() {
            KTModalNewAddress.init();
        });
    });
</script>
