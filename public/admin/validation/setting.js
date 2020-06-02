$(document).ready( function () {
    $("#setting_submit").validate({
        rules: {
            company_name: "required",
            address_1: "required",
            phone_1: "required",
            mobile_1: "required",
            email_1: "required",
            basic_salary_percentage: "required",
            bank_name: "required",
            normal_holiday_ot_rate: "required",
            special_holiday_ot_rate: "required",
            currency: "required"
        },
        messages: {
            account_title: "Enter Account Title",
            initial_balance: "Enter Initial Balance",
            account_number: "Enter Account Number",
            contact_person: "Enter Contact Person",
            phone: "Enter Phone Number",
            basic_salary_percentage: "Enter Basic Salary Percentage",
            bank_name: "Enter Bank Name",
            bank_account: "Enter Account No.",
            normal_holiday_ot_rate: "Enter Normal Holiday Over Time Rate",
            special_holiday_ot_rate: "Enter Special Holiday Over Time Rate",
            currency: "Please enter currency"
        },
        errorElement: "em",
        errorPlacement: function (error, element) {  console.log(element)
            // Add the `help-block` class to the error element
            error.addClass("help-block");

            // Add `has-feedback` class to the parent div.form-group
            // in order to add icons to inputs
            element.parents(".col-lg-9").addClass("form-group-feedback");

            if (element.prop("type") === "checkbox") {
                error.insertAfter(element.parent("label"));
            } else {
                error.insertAfter(element.parent());
            }

            // Add the span element, if doesn't exists, and apply the icon classes to it.
            if (!element.parent().parent().next("div")[0]) {
                $("<div class='form-control-feedback'><i class='icon-cross2 text-danger'></i></div>").insertAfter(element);
            }
        },
        success: function (label, element) { console.log(element);
            // Add the span element, if doesn't exists, and apply the icon classes to it.
                if (!$(element).next("div")[0]) {
                $("<div class='form-control-feedback'><i class='icon-checkmark4 text-success'></i></div>").insertAfter($(element));
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).parent().find('span .input-group-text').addClass("alpha-danger text-danger border-danger ").removeClass("alpha-success text-success border-success");
            $(element).addClass("border-danger").removeClass("border-success");
            $(element).parent().parent().addClass("text-danger").removeClass("text-success");
            $(element).next('div .form-control-feedback').find('i').addClass("icon-cross2 text-danger").removeClass("icon-checkmark4 text-success");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).parent().find('span .input-group-text').addClass("alpha-success text-success border-success").removeClass("alpha-danger text-danger border-danger ");
            $(element).addClass("border-success").removeClass("border-danger");
            $(element).parent().parent().addClass("text-success").removeClass("border-danger");
            $(element).next('div .form-control-feedback').find('i').addClass("icon-checkmark4 text-success").removeClass("icon-cross2 text-danger");
        }
    });
});

