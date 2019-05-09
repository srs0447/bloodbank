<?php include "header.php" ?> 
<?php
  include_once("connection.php");
  $email_error = "";
  $mob_error = "";
  $pass_error = "";
  $fname = "";
  $lname = "";
  $email = "";
  $dob = "";
  $mobile = "";
  $bgroup = "";
  $pass = "";
  $cpass = "";

  if(isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $mobile = $_POST['mobile'];
    $bgroup = $_POST['bloodg'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];

    // email check 
    $sql = "SELECT email FROM users";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
           if($row['email'] == $email){
              $email_error = "The email is Already Exists..";
           }
           
        }
    }

    if(!empty($mobile)) // phone number is not empty
    {
        if(preg_match('/^\d{10}$/',$mobile)) // phone number is valid
        {
          $mobile =  $mobile;

          $sql = "SELECT mobile FROM users";
          $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) > 0) {
          // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                if($row['mobile'] == $mobile){
                    $mob_error = "The mobile number is Already Exists..";
                }
                
              }
          }
          if($pass == $cpass){
                $query = "INSERT INTO users (fname, lname, email, dob, pass, mobile, bloodg)
                VALUES ('$fname', '$lname', '$email', '$dob', '$pass', '$mobile', '$bgroup')";

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
<h2> Registration page.........</h2>
<div class="row">
    <form class="col s12" method="post" action="register.php">
      <div class="row">
        <div class="input-field col s6">
          <input  id="first_name" type="text" class="validate" name="fname" value="<?php echo $fname; ?>" required>
          <label for="first_name">First Name</label>
        </div>
        <div class="input-field col s6">
          <input id="last_name" type="text" class="validate" name="lname" value="<?php echo $lname; ?>" required>
          <label for="last_name">Last Name</label>
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
          <input id="dob" type="date" class="validate" name="dob" value="<?php echo $dob; ?>" required>
          <label for="dob">Date Of Birth</label>
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
           <select name="bloodg" required>
                <option value="" disabled selected>Blood Group</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="AB-">AB-</option>
                <option value="AB+">AB+</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
              </select>
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
      
      <input type="submit" name="submit" value="Rgister" class="btn btn-success">
    </form>
  </div>
</div>



<?php include "footer.php" ?> 