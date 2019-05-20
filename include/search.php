<?php include_once("header.php");
    include_once("connection.php");
    $email = $_SESSION['email'];
  $usersql = "SELECT * FROM users WHERE email='$email'";
  
  $userresult = mysqli_query($conn, $usersql);

  while ($userr = mysqli_fetch_assoc($userresult)) {
      $district = $userr['district'];
      $subdistrict = $userr['subd'];

  }
  
  
?>

<div class="row">
<?php if(isset($_GET['donate'])):?>
   <?php $donatesql = "SELECT * FROM `users` WHERE `status`='need'";
    $doresult = mysqli_query($conn, $donatesql);

  ?>
 <?php if(mysqli_num_rows($doresult) > 0): ?> 
 <?php while($drows = mysqli_fetch_assoc($doresult)): ?>
    <div class="col s12 m6">
      <div class="card">
        <div class="card-content">
          <p>I am a very simple card. I am good at containing small bits of information.
          I am convenient because I require little markup to use effectively.</p>
        </div>
        <div class="card-action">
          <a href="#">This is a link</a>
        </div>
      </div>
    </div>
<?php endwhile; ?>
<?php else: ?>
<h2 class="center-align">No Records founds</h2>
<?php endif; ?>
<?php endif; ?>


<?php if(isset($_GET['require'])): ?>
   <?php 
    $needsql = "SELECT * FROM `users` WHERE `status`='available'";
    $needresult = mysqli_query($conn, $needsql);
    ?>
<?php if(mysqli_num_rows($needresult) > 0): ?> 
 <?php while($nrows = mysqli_fetch_assoc($needresult)): ?>
    <div class="col s12 m6">
      <div class="card">
        <div class="card-content">
          <div class="row">
            <div class="col s6">
              <div>
                <h3>Name: </h3>
              </div>
            </div>
            <div class="col s6">
              <div>
                <h3><?php echo $nrows['fname'] ." ". $nrows['lname']; ?></h3>
              </div>
            </div>
          </div>
          <h4>Name: <span><?php echo $nrows['fname'] ." ". $nrows['lname']; ?></span></h4>
          <h4>District: <span><?php echo $nrows['district']; ?></span></h4>
          <h4>Mobile: <span><?php echo $nrows['mobile']; ?></span></h4>
        </div>
      </div>
    </div>
<?php endwhile; ?>
<?php else: ?>
<h2 class="center-align">No Records founds</h2>
<?php endif; ?>
<?php endif; ?>
 </div>
<hr />

<?php 
$banksql = "SELECT * FROM `banks` WHERE district='$district' OR subd='$subdistrict'";
$bankre = mysqli_query($conn, $banksql);

?>
<div class="row">
<?php if(mysqli_num_rows($bankre) > 0): ?>
<?php while($bankrow = mysqli_fetch_assoc($bankre)): ?>
    <div class="col s12 m6">
      <div class="card bank_detail">
        <div class="card-content">
         <h3>Bank Name: <span><?php echo $bankrow['bank_name']; ?></span></h3>
          <h3>Bank State: <span><?php echo $bankrow['states']; ?></span></h3>
          <h3>Bank District: <span><?php echo $bankrow['district']; ?></span></h3>
          <h3>E-mail: <span><?php echo $bankrow['bank_email']; ?></span></h3>
        </div>
      </div>
    </div>
<?php endwhile; ?>
<?php else: ?>
<h2 class="center-align">No Banks  founds in your area</h2>
<?php endif; ?>
  </div>
 







<?php include_once("footer.php"); ?>