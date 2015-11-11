$(function() {
    //Set click for forgot password anchor
    $("#forgotPassword").click(function () {
        showSendEmailForm(function(result){
            var emailAddress = $('#email').val();
            //if(emailAddress.length() == 0){
            //    showModalMessage("","Please enter a valid email address!", 2);
            //} else {
            //Create json array
            emailAddToGetMail = { "emailAdd":emailAddress };
                var pageURL = window.location.origin
                    + "/knowyourdoctor/index.php/ForgotAdminDetailController/sendEmail";
            $.ajax({
                url: pageURL,
                dataType:'JSON',
                data: {"emailAddJSON" : emailAddToGetMail},
                type: "POST",
                success: function(res) {
                    console.log("Error");
                    alert("ABC");
                    if(res) {
                        showModalMessage("Successful", "Your message was sent successfully!", 1);
                    } else {
                        showModalMessage("Problem with your E-Mail address", "Your E-mail address doesn't exists!", 3);
                    }
                }
            });
            //}
        });

    });
});
