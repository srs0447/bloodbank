<?php include_once("connection.php"); 
$country = $_GET['country'];

?>

<?php if(!$country = ""): ?>

<?php 
    $sql  = "SELECT DISTINCT states FROM banks WHERE country=$country"; 
    $result = mysqli_query($conn, $sql);
?>
<select name="state" id="stateid" onchange="changeState()">
<?php while($row = mysqli_fetch_array($result)): ?>
<?php $state_name = $row['states']; ?>
<option value="<?php echo $state_name; ?>"><?php echo $state_name; ?></option>
<?php endwhile; ?>


</select>

<?php endif; ?>