<?php 
    include_once("header.php");
    include_once("connection.php");
    include_once("functions.php");
   if(!isset($_SESSION['username'])){
       header("Location: login.php");
   }
   $username = $_SESSION['username'];
   $sql = "SELECT * FROM `banks` WHERE `bank_email` = '$username'";
   $result = mysqli_query($conn, $sql);
   if (mysqli_num_rows($result) > 0){
     while($rows = mysqli_fetch_assoc($result)){
       $id = $rows['id'];
       $bbname= $rows['bank_name'];
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
            <div class="col s12 m12">
                <h1><?php echo $bbname; ?></h1>
            </div>
            <div class="col s12 m12">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                        <table class="responsive-table">
                            <thead>
                            <tr>
                                <th>Blood Name</th>
                                <th>Unit</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sqli = "SELECT * FROM `bloods` WHERE `bbid` = '$id'";
                            $results = mysqli_query($conn, $sqli); ?>
                            <?php if (mysqli_num_rows($results) > 0): ?>
                            <?php  while($list = mysqli_fetch_assoc($results)): ?>
                            <tr>
                                <td style="text-transform:capitalize;"><?php echo $list['name']; ?></td>
                                <td><?php echo $list['unit']; ?></td>
                                <td><a class="waves-effect waves-light btn btn-small modal-trigger" href="#modal_update"><i class="material-icons">edit</i></a></td>
                            </tr>    
                            <?php endwhile; ?>
                            <?php else: ?>
                              <tr>
                                  <td>No blood records found</td>
                              </tr>
                            <?php endif; ?>                       
                            </tbody>
                        </table>
                    </div>
                    <div class="card-action">
                        <a class="waves-effect waves-light btn modal-trigger" href="#modal_add"><i class="material-icons">add</i></a>
                    </div>
                </div>
            </div>  
          </div>
        </div>
        <div class="col s12 m6">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Contact Info</span>
              <p><strong>E-Mail: </strong> <?php echo ""; ?></p>
              <p><strong>Mobile: </strong> <?php echo ""; ?></p>
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
              <p><strong>State: </strong><?php echo ""; ?></p>
              <p><strong>District: </strong><?php echo ""; ?></p>
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
        <div id="modal_update" class="modal bottom-sheet">
          <div class="modal-content">
           <div class="row">
            <form class="col s12" action="bank_profile.php" method="POST">
              <div class="row">
                <div class="input-field col s6">
                  <i class="material-icons prefix">favorite</i>
                  <input id="icon_prefix" type="text" class="validate" name="blood_name">
                  <label for="icon_prefix">Blood Name</label>
                </div>
                <div class="input-field col s6">
                  <i class="material-icons prefix">heart</i>
                  <input id="icon_telephone" type="number" class="validate" name="unit">
                  <label for="icon_telephone">Unit</label>
                </div>
              </div>
              <button id="submit" class="btn waves-effect waves-light" type="submit" name="add_blood" style=" width: 100%;">Add Blood
              </button>
            </form>
          </div>
          </div>
          <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
          </div>
        </div>

<!--  Add Blood Model -->



          <div id="modal_add" class="modal bottom-sheet">
          <div class="modal-content">
           <div class="row">
            <form class="col s12" action="bank_profile.php" method="POST">
              <div class="row">
                <div class="input-field col s6">
                  <i class="material-icons prefix">favorite</i>
                  <input id="icon_prefix" type="text" class="validate" name="b_name" value="<?php echo $fname; ?>">
                  <label for="icon_prefix">Blood Name</label>
                </div>
                <div class="input-field col s6">
                  <i class="material-icons prefix">account_circle</i>
                  <input id="icon_telephone" type="text" class="validate" name="unit" value="<?php echo $lname; ?>">
                  <label for="icon_telephone">Last Name</label>
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
