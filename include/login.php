
<?php include "header.php"; ?>

<?php if(isset($_SESSION['email'])){
    header("Location: profile.php");
} ?>

<?php
  include_once('connection.php');
  $no_user = "";

 if (isset($_POST['btn_login'])) {
   $email = $_POST['email'];
   $passw = $_POST['password'];
   $sql = "SELECT email, pass FROM users";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            if($row['email'] == $email && $row['pass'] == $passw){
              $_SESSION['email'] = $email;
              header("Location: profile.php");
            }
        }
    } else {
        $no_user = "Incorrect email or Password..";
    }

    mysqli_close($conn);

 }


?>
  <style>

    .input-field input[type=date]:focus + label,
    .input-field input[type=text]:focus + label,
    .input-field input[type=email]:focus + label,
    .input-field input[type=password]:focus + label {
      color: #e91e63;
    }

    .input-field input[type=date]:focus,
    .input-field input[type=text]:focus,
    .input-field input[type=email]:focus,
    .input-field input[type=password]:focus {
      border-bottom: 2px solid #e91e63;
      box-shadow: none;
    }
    
    .register-login{
      margin:10px;
      padding:10px;
    }
    .rsbg{
      background-color:#ffffff66;
    }
    .login-text {
      display: table-cell;
     vertical-align: middle;
     text-align:center;
     top:50%;
    }
    .login-text h3{
      font-size:35px;
      font-weight: 500;
      color:#444;
      padding:10px;
      
    }
  </style>
  <main>
        <div class="row">
          <div class="col s12 m6">
              <div class="login-text">
                <h3>Login Here to Donate or Request for Blood</h3>
                
              </div>
          </div>
          <div class="col s12 m6">
            <div class="container">
            <div class="row">
              <form class="col s12  m12 z-depth-1 rsbg" method="post" style="margin-top:10px;" action="login.php">
                <h5 class="indigo-text center-align">Have a account Login</h5>
                <span class="red"><?php echo $no_user; ?></span>
                <div class="register-login ">
                  <div class='row'>
                    <div class='col s12'>
                    </div>
                  </div>
                  <div class='row'>
                    <div class='input-field col s12'>
                      <input class='validate' type='email' name='email' id='email' required />
                      <label for='email'>Enter your email</label>
                    </div>
                  </div>
                  <div class='row'>
                    <div class='input-field col s12'>
                      <input class='validate' type='password' name='password' id='password' required />
                      <label for='password'>Enter your password</label>
                    </div>
                    <label style='float: right;'>
                      <a class='pink-text' href='forget.php'><b>Forgot Password?</b></a>
                    </label>
                  </div>
                <br />
                  <div class='row'>
                    <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect indigo'>Login</button>
                  </div>
                      <a href="register.php">Create account</a>
                <div>
              </form>
            </div>
            </div>
          </div>
        </div>
       
        
    </main>
<?php include "footer.php" ?> 