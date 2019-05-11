<?php include "header.php" ?> 
<?php
  include_once("connection.php");
  $email_error = "";
  $mob_error = "";
  $pass_error = "";
  $bb_name = "";
  $email = "";
  $mobile = "";
  $pass = "";
  $cpass = "";

  if(isset($_POST['bank_register'])){
    $bb_name = $_POST['bb_name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];

    // email check 
    $sql = "SELECT bank_email FROM banks";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
           if($row['bank_email'] == $email){
              $email_error = "The email is Already Exists..";
           }
           
        }
    }

    if(!empty($mobile)) // phone number is not empty
    {
        if(preg_match('/^\d{10}$/',$mobile)) // phone number is valid
        {
          $mobile =  $mobile;

          $sql = "SELECT bank_mobile FROM banks";
          $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) > 0) {
          // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                if($row['bank_mobile'] == $mobile){
                    $mob_error = "The mobile number is Already Exists..";
                }
                
              }
          }
          if($pass == $cpass){
                $query = "INSERT INTO banks(bank_name, bank_email, bank_mobile, bank_pass)
                VALUES('$bb_name', '$email','$mobile', '$pass')";

                if (mysqli_query($conn, $query)) {
                    header("Location: success.php");
                } else {
                    echo "Error: " . $query . "<br>" . mysqli_error($conn);
                }

                mysqli_close($conn);
            }else{
              $pass_error = "Password did not matched....";
            }
         
        }
        else // phone number is not valid
        {
          $mob_error =  'mobile number invalid !';
        }
    }
    else // phone number is empty
    {
      $mob_error = 'You must provid a mobile number !';
    }
}



?>
<div class="container">
<h2> Blood Bank Registration page</h2>
<div class="row">
    <form class="col s12" method="post" action="register_bank.php">
      <div class="row">
        <div class="input-field col s12">
          <input  id="bb_name" type="text" class="validate" name="bb_name" value="<?php echo $bb_name; ?>" required>
          <label for="bb_name">Blood Bank Name</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input  id="E-mail" type="text" class="validate" name="email" value="<?php echo $email; ?>" required>
          <label for="E-mail">E-mail</label>
          <span class="red" ><?php echo $email_error; ?></span>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="mobile" type="text" class="validate" name="mobile" value="<?php echo $mobile; ?>" required>
          <label for="mobile">Mobile Number</label>
          <span class="red"><?php echo $mob_error; ?></span>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate" name="pass" required>
          <label for="password">Password</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="cpassword" type="password" class="validate" name="cpass" required>
          <label for="cpassword">Confirm Password</label>
          <span class="red" ><?php echo $pass_error; ?></span>
        </div>
      </div>
      
      <input type="submit" name="bank_register" value="Rgister" class="btn btn-success">
    </form>
  </div>
</div>



<?php include "footer.php" ?> 