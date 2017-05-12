<?php
 
	$conn = mysql_connect("localhost","root","");
	$selectdb = mysql_select_db("phpdb",$conn);
 
$state_id = $_POST['state_id'];

$result_city = mysql_query("select * from cities where state_id = '$state_id'");




?>
<option value="" >Select a city:</option>
<?php while($row = mysql_fetch_array($result_city))
	{
		
	?>
	<option value = <?php echo $row['id']; ?>> <?php echo $row['name']; ?></option> 
	<?php } ?>
