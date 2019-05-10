<?php 
    include_once("header.php");
    include_once("connection.php");
    include_once("functions.php");
   if(!isset($_SESSION['email'])){
       header("Location: login.php");
   }
   $email = $_SESSION['email'];
   $state = "";
   $district = "";

   $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
   $result = mysqli_query($conn, $sql);
   if (mysqli_num_rows($result) > 0){
     while($rows = mysqli_fetch_assoc($result)){
       $id = $rows['id'];
       $fname = $rows['fname'];
       $lname = $rows['lname'];
       $name = $fname."  ". $lname;
       $mail = $rows['email'];
       $mobi = $rows['mobile'];
       $bloodgroup = $rows['bloodg'];
       $status = $rows['status'];
       $state = $rows['states'];
       $district = $rows['district'];
     }
   }

   if(isset($_POST['update'])){
     $nfname = $_POST['nfname'];
     $nlname = $_POST['nlname'];
     $nmobi = $_POST['nmobi'];
     $sql = "UPDATE users SET fname='$nfname', lname='$nlname', mobile='$nmobi' WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        
        header("Location: profile.php");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
   }


?>


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
   <div class="col s10"  style="border-left:1px solid black;">
      <div class="row">
        <div class="col s12">
          <div class="row">
            <div class="col s12 m9">
               <div class="row">
                 <div class="col s12 m4">
                    <div class="pImage">
                      <img src="../image/frame.jpg" alt="profile Image" class="circle responsive-img">
                    </div>
                 </div>
                 <div class="col s12 m8 rsbio">
                    <h4> <i class='material-icons'>person</i> <?php echo $name; ?></h4>
                    <?php if($status == "available"): ?>
                    <h4>Status: <span class="green=text">Available to donate</span></h4>
                    <?php elseif($status == "need"): ?>
                    <h4>Status: <span class="red-text">Need Blood <?php echo $bloodgroup; ?></span></h4>
                    <?php else: ?>
                    <h4>Status: <span class="green-text">I'm Fine. </span></h4>
                    <?php endif; ?>
                 </div>
               </div>
            </div>
            <div class="col s12 m3">
              <div class="rsbutton">
                <div class="row">
                  <div class="col s6 m6">
                      <form action="functions.php" method="post">
                      <a
                        class="btn-floating btn-large cyan pulse tooltipped" 
                        data-position="bottom" data-tooltip="Click Here to Donate">
                        <i class="material-icons">favorite</i>
                      </a>
                      <input type="submit" name="donate" value="Donate" class="btn btn-small green">
                    </form>
                  </div>
                  <div class="col s6 m6">
                      <form action="functions.php" method="post">
                      <a 
                        class="btn-floating btn-large cyan pulse tooltipped"
                        data-position="bottom" data-tooltip="Click Here to Request">
                        <i class="material-icons">favorite</i>
                      </a>
                      <input type="submit" name="request" value="Request" class="btn btn-small green">
                    </form>
                  </div>
                </div>
                   
              </div>
            </div>  
          </div>
           
            
        </div>
        <div class="col s12 m6">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Contact Info</span>
              <p><strong>E-Mail: </strong> <?php echo $email; ?></p>
              <p><strong>Mobile: </strong> <?php echo $mobi; ?></p>
            </div>
            <div class="card-action">
        
             <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Update</a>
            </div>
          </div>
        </div>


        <div class="col s12 m6">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Address Info</span>
              <?php if($state == "" && $district == ""): ?>
                <p>No address found Update the data</p>
                 <a href="prof_update.php" class="btn btn-small">Insert Data</a>
              <?php else: ?>
              <p><strong>State: </strong><?php echo $state; ?></p>
              <p><strong>District: </strong><?php echo $district; ?></p>
              <?php endif; ?>
            </div>
            <div class="card-action">
              <a href="prof_update.php">Update Address</a>
            </div>
          </div>
        </div>
      </div>
   </div>
</div>



<!-- Modal Update -->
        <div id="modal1" class="modal bottom-sheet">
          <div class="modal-content">
           <div class="row">
            <form class="col s12" action="profile.php" method="POST">
              <div class="row">
                <div class="input-field col s6">
                  <i class="material-icons prefix">account_circle</i>
                  <input id="icon_prefix" type="text" class="validate" name="nfname" value="<?php echo $fname; ?>">
                  <label for="icon_prefix">First Name</label>
                </div>
                <div class="input-field col s6">
                  <i class="material-icons prefix">account_circle</i>
                  <input id="icon_telephone" type="text" class="validate" name="nlname" value="<?php echo $lname; ?>">
                  <label for="icon_telephone">Last Name</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                 <i class="material-icons prefix">phone</i>
                  <input id="mobile" type="text" class="validate" value="<?php echo $mobi; ?>" name="nmobi">
                  <label for="mobile">Mobile</label>
                </div>
              </div>
              <button id="submit" class="btn waves-effect waves-light" type="submit" name="update" style=" width: 100%;">Update
              </button>
            </form>
          </div>
          </div>
          <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
          </div>
        </div>
<?php include "footer.php" ?>
