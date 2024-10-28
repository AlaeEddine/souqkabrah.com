window.onload = function () {
    render2();
};



function sendotplink2(button) {
    if(button.disabled == true){

    }else{
        button.disabled = true;
        button.innerText = "المرجو الإنتظار..."; 

        var number = $('.phonenumber').html(); 
        firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function (confirmationResult) {
            window.confirmationResult = confirmationResult;
            coderesult = confirmationResult;
            console.log(coderesult);
            $("#successAuth2").text("تم إرسال الرسالة بنجاح");
            $("#successAuth2").show();
            $(button).addClass('d-none');
            $("#successAuth2").addClass('d-none');
            $('#verifysms2').removeClass('d-none').addClass('d-block').show();
            $('#verification2').removeClass('d-none').addClass('d-block').show();
            $('#verification-btn2').removeClass('d-none').addClass('d-block').show();
        }).catch(function (error) {

            try {
                // Parsing du JSON
                var errorData = JSON.parse(error.message);
                
                // Vérifier si l'erreur est "BILLING_NOT_ENABLED"
                if (errorData.error && errorData.error.message === "BILLING_NOT_ENABLED") {
                    $("#error2").text("خدمة الفوترة غير مفعلة لإرسال الرسائل القصيرة. يرجى تفعيل الفوترة في وحدة التحكم الخاصة بـ Firebase.");
                } else {
                    $("#error2").text(error.message); // Affiche d'autres erreurs
                }
            } catch (e) {
                // Si l'erreur n'est pas un JSON valide, afficher l'erreur brute
                $("#error2").text(error.message);
            }

            $("#error2").show();
        });
    }
}

function verify2(button) {

    if(button.disabled == true){

    }else{
        button.disabled = true;
        button.innerText = "المرجو الإنتظار..."; 

        var code = $("#verification2").val();
        if(code == null || code == ""){
            $("#error2").text("المرجو إدخال الكود الدي توصلتم به");
            $("#error2").show();

            button.disabled = false;
            button.innerText = "إعادة المحاولة"; 

        }else{
            coderesult.confirm(code).then(function (result) {
                window.location.href="/otp/sms/validation/"+code;
            }).catch(function (error) {

                if(error.message =="The SMS verification code used to create the phone auth credential is invalid. Please resend the verification code sms and be sure use the verification code provided by the user."){
                    $("#error2").text("الكود خاطئ");

                }else{
                    $("#error2").text(error.message); // Affiche d'autres erreurs
                }                
                $("#error2").show();

                button.disabled = false;
                button.innerText = "إعادة المحاولة"; 

            });
        }
    }
}

function resendOTP(button2) {
    if(button2.disabled == true){

    }else{
        button2.disabled = true;
        button2.innerText = "المرجو الإنتظار..."; 

        var number = $('.phonenumber').html(); 
        firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function (confirmationResult) {
            window.confirmationResult = confirmationResult;
            coderesult = confirmationResult;
            console.log(coderesult);
            $("#successAuth2").text("تم إرسال الرسالة بنجاح");
            $("#successAuth2").show();
            $("#send-sms2").addClass('d-none').removeClass('d-block').hide();
            $("#successAuth2").addClass('d-none').removeClass('d-block').hide();
            $('#verifysms2').removeClass('d-none').addClass('d-block').show();
            $('#verification2').removeClass('d-none').addClass('d-block').show();
            $('#verification-btn2').removeClass('d-none').addClass('d-block').show();
            button.disabled = false;
            button.innerText = "تم بنجاح"; 

        }).catch(function (error) {

            try {
                // Parsing du JSON
                var errorData = JSON.parse(error.message);
                
                // Vérifier si l'erreur est "BILLING_NOT_ENABLED"
                if (errorData.error && errorData.error.message === "BILLING_NOT_ENABLED") {
                    $("#error2").text("خدمة الفوترة غير مفعلة لإرسال الرسائل القصيرة. يرجى تفعيل الفوترة في وحدة التحكم الخاصة بـ Firebase.");
                } else {
                    $("#error2").text(error.message); // Affiche d'autres erreurs
                }

            } catch (e) {
                // Si l'erreur n'est pas un JSON valide, afficher l'erreur brute
                $("#error2").text(error.message);
            }

            button.disabled = false;
            button.innerText = "لم أتوصل بالكود"; 

            $("#error2").show();
        });
    }
}