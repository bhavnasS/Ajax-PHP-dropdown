<?php
 
$conn = mysql_connect("localhost","root","");
$select_conn = mysql_select_db("phpmysql",$conn);
 
$userid = $_POST['userid'];

$result_user = mysql_query("select * from student where ID = '$userid'");
$row_user = mysql_fetch_object($result_user);



?>

<table border="1">
<tr>
<th>ID</th>
<th>Name</th>
<th>Phone</th>
<th>City</th>
</tr>

<tr>
<td><?php echo $row_user->ID;?></td>
<td><?php echo $row_user->name;?></td>
<td><?php echo $row_user->phone;?></td>
<td><?php echo $row_user->city;?></td>
</tr>


</table>