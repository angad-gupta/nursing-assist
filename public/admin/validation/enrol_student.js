$(document).ready(function () {
    $("#enrol_student_submit").validate({
        rules: {
            eligible_rd: "required",
            eligible_document: "required",
            rd: "required",
            identity_document: "required",
            title: "required",
            first_name: "required",
            last_name: "required",
            street1: "required",
            suburb: "required",
            city: "required",
            state: "required",
            postalcode: "required",
            country: "required",
            phone: "required",
            agents: "required",
            email: "required",
            course_info_id: "required",
            intake_date: "required"
        },
        messages: {
            eligible_rd: "Please Select Eligibility",
            eligible_document: "Upload Eligibility Document",
            rd: "Please  Select Identity",
            identity_document: "Upload Identity Document",
            title: "Please  Enter Title",
            first_name: "Please  Enter First Name",
            last_name: "Please  Enter Last Name",
            street1: "Please  Enter Street",
            suburb: "Please  Enter Suburb",
            city: "Please  Enter City",
            state: "Please  Enter Year",
            postalcode: "Please  Enter State",
            country: "Please  Select Country",
            phone: "Please  Enter Contact No.",
            agents: "Please  Select Agents",
            email: "Please  Enter Email",
            course_info_id: "Please  Select Course Info",
            intake_date: "Please  Select Intake Date"
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

