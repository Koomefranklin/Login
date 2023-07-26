<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require 'include/signup.inc';
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- font awesome  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script type="text/javascript" src="include/functions.js"></script>

    <title>Signup</title>

    <style>
        .login_oueter {
            width: 360px;
            max-width: 100%;
            display: flex;
            flex-direction: column;
        }
        .logo_outer{
            text-align: center;
        }
        .logo_outer img{
            width:120px;
            margin-bottom: 40px;
        }
        input[type="checkbox"] {
            display: none;
        }
        .input{
            width: 65% !important;
        }
        .matching-password, .password-pattern {
            font-size: smaller;
        }
        #upper:checked + label, #lower:checked + label, #special-character:checked + label,
        #number:checked + label, #length:checked + label{
            display: none;


        
    </style>
      <script type="text/javascript">
        function password_show_hide() {
            const password = document.getElementById("password");
            const show_eye = document.getElementById("show_eye");
            const hide_eye = document.getElementById("hide_eye");
            hide_eye.classList.remove("d-none");
            if (password.type === "password") {
            password.type = "text";
            show_eye.style.display = "none";
            hide_eye.style.display = "block";
            } else {
            password.type = "password";
            show_eye.style.display = "block";
            hide_eye.style.display = "none";

            }
        }
        function password2_show_hide() {
            const password = document.getElementById("password2");
            const show_eye = document.getElementById("show_eye2");
            const hide_eye = document.getElementById("hide_eye2");
            hide_eye.classList.remove("d-none");
            if (password.type === "password") {
            password.type = "text";
            show_eye.style.display = "none";
            hide_eye.style.display = "block";
            } else {
            password.type = "password";
            show_eye.style.display = "block";
            hide_eye.style.display = "none";

            }
        }
      </script>
  </head>
  <body>
<div class="container-fluid">
  <div class="row d-flex justify-content-center align-items-center m-0" style="height: 100vh;">
    <div class="login_oueter">
      <form action="#" method="post" id="login" autocomplete="off" class="bg-light border p-3">
        <div class="form-row">
          <h4 class="title my-3">Signup</h4>
          <!--Error-->
          <p class="text-danger">
          <?php
          if (isset($message)){
            echo $message;
          }
          ?>
          </p>
          <!--Name-->
          <div class="col-12">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
              </div>
              <input name="name" type="text" class="input form-control" id="name" placeholder="Name" aria-label="Username" aria-describedby="basic-addon1" />
            </div>
          </div>
           <!--Username-->
          <div class="col-12">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone" aria-hidden="true"></i></span>
              </div>
              <input name="username" type="text" class="input form-control" id="username" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
            </div>
          </div>
           <!--Password-->
          <div class="col-12">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
              </div>
              <input name="password" type="password" class="input form-control" id="password" placeholder="Password" required="required" aria-label="password" aria-describedby="basic-addon1" />
              <div class="input-group-append">
                <span class="input-group-text" onclick="password_show_hide()">
                  <i class="fas fa-eye" id="show_eye"></i>
                  <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                    </span>
            </div>
                <span id="password-pattern" class="password-pattern" hidden="hidden">
                        <input type="checkbox" id="upper" disabled readonly>
                        <label for="upper">Contains at least 1 upper-case character</label>
                        <input type="checkbox" id="lower" disabled readonly>
                        <label for="lower">Contains at least 1 lower-case character</label>
                        <input type="checkbox" id="special-character" disabled readonly>
                        <label for="special-character" >Contains a special character</label>
                        <input type="checkbox" id="number" disabled readonly>
                        <label for="number">Contains a numeric digit (0 thru 9)</label>
                        <input type="checkbox" id="length" disabled readonly>
                        <label for="length">At-least 8 characters long</label>
                    </span>
            </div>
            
          </div>
           <!--Confirm Password-->
          <div class="col-12">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
              </div>
              <input name="password2" type="password" class="input form-control" id="password2" placeholder="Confirm password" required="required" disabled="disabled" aria-label="password" aria-describedby="basic-addon1" />
              <div class="input-group-append">
                <span class="input-group-text" onclick="password2_show_hide()">
                  <i class="fas fa-eye" id="show_eye2"></i>
                  <i class="fas fa-eye-slash d-none" id="hide_eye2"></i>
                </span>
            </div>
                <span id="matching-password" class="matching-password" hidden="hidden">
                        Passwords don't match
                    </span>
            </div>
            
          </div>
          <div class="col-sm-12 pt-3 text-right">
            <p>Already registered <a href="login.php">Login</a></p>
          </div>
          <div class="col-12">
            <button class="btn btn-primary" type="submit" name="register" id="register">Signup</button>
              <script type="text/javascript">check_passwords()</script>
      </form>
    </div>
  </div>
</div>


<script>


</script>
  </body>
</html>