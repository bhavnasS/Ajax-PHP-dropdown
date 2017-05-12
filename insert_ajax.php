<?php
 	error_reporting(0);
	$conn = mysql_connect("localhost","root","");
	$selectdb = mysql_select_db("phpdb",$conn);
 

$name = $_POST['name'];
$mail = $_POST['mail'];
$phone = $_POST['phone'];
$country_id = $_POST['country_id'];
$state_id = $_POST['state_id'];
$city_id = $_POST['city_id'];
$address = $_POST['address'];
$course = $_POST['course_array'];


 

$result_state = mysql_query("select * from states where id = '$state_id'");
$row_state = mysql_fetch_array($result_state);

$state = $row_state['name'];


$result_city = mysql_query("select * from cities where id = '$city_id'");
$row_city = mysql_fetch_array($result_city);
$city = $row_city['name'];



$result_country = mysql_query("select * from countries where id= '$country_id'");
$row_country = mysql_fetch_array($result_country);
$country = $row_country['name'];



$result_insert = mysql_query("insert into student(name,email,phone,address,state,country,city) values('$name','$mail','$phone','$address','$state','$country','$city')");
$last_id = mysql_insert_id();
 

$courseArray = explode(',', $course);
$count = count($courseArray);

for($i=0;$i<$count;$i++)
{
	$result_insert = mysql_query("insert into courses(student_id,course_name) values('$last_id','$courseArray[$i]')");		
}



?>
