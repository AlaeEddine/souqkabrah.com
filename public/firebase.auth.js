const firebaseConfig = {
    apiKey: "AIzaSyBLUI4CcS7slx-iegz71EviRaQp6fk2W1o",
    authDomain: "souqkabra-f440a.firebaseapp.com",
    projectId: "souqkabra-f440a",
    storageBucket: "souqkabra-f440a.appspot.com",
    messagingSenderId: "82862831857",
    appId: "1:82862831857:web:a545c1994165d65f675150",
    measurementId: "G-FX1XYFJYDF"
};

firebase.initializeApp(firebaseConfig);
firebase.auth().languageCode = 'ar';

window.onload = function () {
    render();
    render2();
};


function render() {
    //window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
    //recaptchaVerifier.render();
    window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container', {
        'size': 'invisible',
        'callback': function (response) {
            // reCAPTCHA solved, allow signInWithPhoneNumber
            //sendOTP();
        }
    });

}

function render2() {
    //window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
    //recaptchaVerifier.render();
    window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container2', {
        'size': 'invisible',
        'callback': function (response) {

        }
    });
}
function sendOTP(button) {
    if(button.disabled == true){

    }else{
        button.disabled = true;
        button.innerText = "المرجو الإنتظار..."; 

        var number = $('.phonenumber').html(); 
        firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function (confirmationResult) {
            window.confirmationResult = confirmationResult;
            coderesult = confirmationResult;
            console.log(coderesult);
            $("#successAuth").text("تم إرسال الرسالة بنجاح");
            $("#successAuth").show();
            $(button).addClass('d-none');
            $("#successAuth").addClass('d-none');
            $('#verifysms').removeClass('d-none').addClass('d-block').show();
            $('#verification').removeClass('d-none').addClass('d-block').show();
            $('#verification-btn').removeClass('d-none').addClass('d-block').show();
        }).catch(function (error) {

            try {
                // Parsing du JSON
                var errorData = JSON.parse(error.message);
                
                // Vérifier si l'erreur est "BILLING_NOT_ENABLED"
                if (errorData.error && errorData.error.message === "BILLING_NOT_ENABLED") {
                    $("#error").text("خدمة الفوترة غير مفعلة لإرسال الرسائل القصيرة. يرجى تفعيل الفوترة في وحدة التحكم الخاصة بـ Firebase.");
                } else {
                    $("#error").text(error.message); // Affiche d'autres erreurs
                }
            } catch (e) {
                // Si l'erreur n'est pas un JSON valide, afficher l'erreur brute
                $("#error").text(error.message);
            }   
            button.innerText = "إعادة المحاولة"; 


            $("#error").show();
        });
    }
}

function verify(button) {

    if(button.disabled == true){

    }else{
        button.disabled = true;
        button.innerText = "المرجو الإنتظار..."; 

        var code = $("#verification").val();
        if(code == null || code == ""){
            $("#error").text("المرجو إدخال الكود الدي توصلتم به");
            $("#error").show();

            button.disabled = false;
            button.innerText = "إعادة المحاولة"; 

        }else{
            coderesult.confirm(code).then(function (result) {
                window.location.href="/otp/sms/validation/"+code;
            }).catch(function (error) {

                if(error.message =="The SMS verification code used to create the phone auth credential is invalid. Please resend the verification code sms and be sure use the verification code provided by the user."){
                    $("#error").text("الكود خاطئ");

                }else{
                    $("#error").text(error.message); // Affiche d'autres erreurs
                }                
                $("#error").show();

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
            $("#successAuth").text("تم إرسال الرسالة بنجاح");
            $("#successAuth").show();
            $("#send-sms").addClass('d-none').removeClass('d-block').hide();
            $("#successAuth").addClass('d-none').removeClass('d-block').hide();
            $('#verifysms').removeClass('d-none').addClass('d-block').show();
            $('#verification').removeClass('d-none').addClass('d-block').show();
            $('#verification-btn').removeClass('d-none').addClass('d-block').show();
            button.disabled = false;
            button.innerText = "تم بنجاح"; 

        }).catch(function (error) {

            try {
                // Parsing du JSON
                var errorData = JSON.parse(error.message);
                
                // Vérifier si l'erreur est "BILLING_NOT_ENABLED"
                if (errorData.error && errorData.error.message === "BILLING_NOT_ENABLED") {
                    $("#error").text("خدمة الفوترة غير مفعلة لإرسال الرسائل القصيرة. يرجى تفعيل الفوترة في وحدة التحكم الخاصة بـ Firebase.");
                } else {
                    $("#error").text(error.message); // Affiche d'autres erreurs
                }

            } catch (e) {
                // Si l'erreur n'est pas un JSON valide, afficher l'erreur brute
                $("#error").text(error.message);
            }

            button.disabled = false;
            button.innerText = "لم أتوصل بالكود"; 

            $("#error").show();
        });
    }
}