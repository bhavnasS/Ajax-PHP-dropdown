<?php
 
	$conn = mysql_connect("localhost","root","");
	$selectdb = mysql_select_db("phpdb",$conn);
 
$country_id = $_POST['country_id'];

$result_state = mysql_query("select * from states where country_id = '$country_id'");

echo "select * from states where country_id = '$country_id'";


?>
<option value="" >Select a state:</option>
<?php while($row = mysql_fetch_array($result_state))
	{
		
	?>
	<option value = <?php echo $row['id']; ?>> <?php echo $row['name']; ?></option> 
	<?php } ?>
