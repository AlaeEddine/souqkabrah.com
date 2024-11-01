<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel 8 Firebase - Phone Number OTP Authentication</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <div class="container mt-5">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">Add Phone Number</div>
                        <div class="card-body">
                            <div class="alert alert-danger" id="error" style="display: none;"></div>
                            <div class="alert alert-success" id="successAuth" style="display: none;"></div>
                            <form>
                                <input type="text" id="number" class="form-control" placeholder="+62 ********">
                                <div id="recaptcha-container" class="mt-2"></div>
                                <button type="button" class="btn btn-primary mt-3" onclick="sendOTP();">Send OTP</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">Add verification code</div>
                        <div class="card-body">
                            <div class="alert alert-success" id="successOtpAuth" style="display: none;"></div>
                            <form>
                                <input type="text" id="verification" class="form-control" placeholder="Verification code">
                                <button type="button" class="btn btn-success mt-3" onclick="verify()">Verify code</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
        <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
        
        <script src="/firebase.auth.js"></script>
    </body>
</html>