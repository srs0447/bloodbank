<?php 
    include_once("header.php");
    include_once("connection.php");
   if(!isset($_SESSION['email'])){
       header("Location: login.php");
   }
   $email = $_SESSION['email'];
   $state = "";
   $district = "";
   $country = "";
   $subDustrict = "";
   $block = "";
   $post = "";
   $pin = "";
   $success = "";
   $fail = "";

   $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
   $result = mysqli_query($conn, $sql);
   if (mysqli_num_rows($result) > 0){
     while($rows = mysqli_fetch_assoc($result)){
       $id = $rows['id'];
       $country = $rows['country'];
       $state = $rows['states'];
       $district = $rows['district'];
       $subDistrict = $rows['subd'];
       $block = $rows['blok'];
       $post = $rows['post'];
       $pin = $rows['pin'];
     }
   }

   if(isset($_POST['update'])){
    $country = $_POST['country'];
    $state = $_POST['state'];
    $district = $_POST['district'];
    $subDistrict = $_POST['subd'];
    $block = $_POST['block'];
    $post = $_POST['post'];
    $pin = $_POST['pin'];

     $sql = "UPDATE users 
            SET 
                pin='$pin', 
                post='$post', 
                blok='$block', 
                subd='$subDistrict', 
                district='$district',
                states='$state',
                country='$country' 
            WHERE email='$email'";

    if (mysqli_query($conn, $sql)) {
        $success = "Data updation is Successfull :)";
       
    } else {
         $fail = "Something went Wrong :(";
    }
   }


?>

<style>

.input-field input[type=text]{
    text-transform: capitalize;
}
</style>
<div class="row">
   <div class="col s2">
      <ul class="side-nav fixed transparent z-depth-0">
        <li class="active"><a href="#"><i class="material-icons">dashboard</i></a></li>
        <li><a href="#"><i class="material-icons">mail</i></a></li>
        <li><a href="#"><i class="material-icons">person</i></a></li>
        <li>
          <div class="divider"></div>
        </li>
      </ul>
   </div>
   <br />
   <div class="col s10">
    <h4 class="center-align">Update Address Details</h4>
    <?php if(!empty($success)): ?>
        <h5 class="center-align green">Updated Address Successfull :)</h5>
        <a href="profile.php" class="btn btn-small center-align">Go to Dashboard</a>
    <?php endif; ?>
    <?php if(!empty($fail)): ?>
        <h5 class="center-align red">Something goes wrong :(</h5>
    <?php endif; ?>
        <div class="row">
            <form class="col s12" action="prof_update.php" method="post">
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input id="country" type="text" class="validate" name="country" value="<?php echo $country; ?>">
                        <label for="country">Country</label>
                    </div>
                    <div class="input-field col s12 m6">
                       <input id="state" type="text" class="validate" name="state" value="<?php echo $state; ?>">
                        <label for="state">State</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input id="district" type="text" class="validate" name="district" value="<?php echo $district; ?>">
                        <label for="district">District</label>
                    </div>
                    <div class="input-field col s12 m6">
                       <input id="subd" type="text" class="validate" name="subd" value="<?php echo $subDistrict; ?>">
                        <label for="subd">Sub District</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input id="block" type="text" class="validate" name="block" value="<?php echo $block; ?>">
                        <label for="block">Block</label>
                    </div>
                    <div class="input-field col s12 m6">
                       <input id="post" type="text" class="validate" name="post" value="<?php echo $post; ?>">
                        <label for="post">Post</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input id="pin" type="text" class="validate" name="pin" value="<?php echo $pin; ?>">
                        <label for="pin">Pin</label>
                    </div>
                </div>
                 <button id="submit" class="btn waves-effect waves-light" type="submit" name="update" style=" width: 100%;">Update
                        </button>
            </form>
        </div>
   </div>
</div>
<?php include "footer.php" ?>
