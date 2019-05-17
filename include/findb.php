<?php include "header.php" ?> 
<?php include "connection.php" ?> 
<?php 


?>

<div class="container">


<form>
<h2> Find Near By bank page.........</h2>
<?php
$sql = "SELECT DISTINCT country FROM banks ORDER BY country ASC";
$result = mysqli_query($conn, $sql); 

?>

           <div class="input-field col s12">
              <select>
                <option value="" disabled selected>Country</option>
                <?php if(mysqli_num_rows($result) > 0): ?>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                  <?php $country = $row['country']; ?>
                    <option value="<?php echo $country; ?>" ><?php echo $country; ?></option>
                <?php endwhile; ?>
                <?php endif; ?>
              </select>
            </div>
            <div class="input-field col s12">
              <select>
                <option value="" disabled selected>State</option>
                <option value="1">Uttar Pradesh</option>
                <option value="2">Madhya Pradesh</option>
                <option value="3">Bihar</option>
              </select>
            </div>
            <div class="input-field col s12">
              <select>
                <option value="" disabled selected>District</option>
                <option value="1">Azamgarh</option>
                <option value="2">Agra</option>
                <option value="3">Allahabad</option>
              </select>
            </div>
             <div class="input-field col s12">
              <select>
                <option value="" disabled selected>Area / Locality</option>
                <option value="1">Tarawa</option>
                <option value="2">Option</option>
                <option value="3">Optiom</option>
              </select>
            </div>

</form>
</div>
<?php include "footer.php" ?> 