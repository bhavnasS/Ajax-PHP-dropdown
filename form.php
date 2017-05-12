<?php
    error_reporting(0);
	$conn = mysql_connect("localhost","root","");
	$selectdb = mysql_select_db("phpdb",$conn);    
	?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>    
<script>
$(document).ready(function() {
	$("#country_id").change(function() {
		
		var id = $(this).val();
		var input_data="country_id="+id;   
		$("#state_id").find('option').remove();
            
               
			    jQuery.ajax({
                type: "POST",
                url:  "state_ajax.php",
                data: input_data,                 
                cache: false,
                success: function(data)
					{
						
					jQuery('#state_id').html(data);
					}
				});		
		});
		
	$("#state_id").change(function() {
		
		var id = $(this).val();
		var input_data = "state_id="+id;
		$("#city_id").find('option').remove(); 	 	
				jQuery.ajax({
                type: "POST",
                url:  "city_ajax.php",
                data: input_data,                 
                cache: false,
                success: function(data)
					{
						
					jQuery('#city_id').html(data);
					}
				});
		});
		
		$("#studentSubmit").click(function() {
		
		var name = $("#name").val();
		var mail = $("#mail").val();
		var phone = $("#phNumber").val();
		var country_id = $("#country_id").val();
		var state_id = $("#state_id").val();
		var city_id = $("#city_id").val();
		var address = $("#address").val(); 
		
		var myCheckboxes = new Array();
		$("input#courses").each(function() {
			if($(this).is(":checked"))
			{
   			myCheckboxes.push($(this).val());
			}
		});
		
		
		
		var input_data = 
		"name="+name+"&mail="+mail+"&phone="+phone+"&country_id="+country_id+"&state_id="+state_id+"&city_id="+city_id+"&address="+address+"&course_array="+myCheckboxes;
			 	
				jQuery.ajax({
                type: "POST",
                url:  "insert_ajax.php",
                data: input_data,                 
                cache: false,
                success: function(data)
					{	
					$('#registration').show();
					$('#registerform').hide();
					jQuery('#studentSubmit').html(data);
					}
				});
		});
		
    });
    
</script>    
<form   action="" method="post">
<div id ="registerform">
 <fieldset>
          <label for="name">Name:</label>
          <input type="text" id="name" name="name"/>
          
          <label for="mail">Email:</label>
          <input type="email" id="mail" name="email"/>
          
          <label for="phNumber">Phone Number:</label>
          <input type="number" id="phNumber" name="phNumber"/>
          
          <label for="address">Address:</label>
          <textarea id="address" value = ""></textarea>
          <label>Country:</label>
           
		  
     <select name="country" id="country_id" >
    <option value="" >Select a country:</option> 
    <?php
	$select_query= mysql_query("select * from countries");
	while($row = mysql_fetch_array($select_query))
	{
		
	?>
	<option value = <?php echo $row['id']; ?>> <?php echo $row['name']; ?></option> 
	<?php } ?>
    </select>
    
    
    
    <label >State:</label>
     <select name="state" id="state_id" >
    <option value="" >Select a state:</option>
    </select>
    
    
    <label>City:</label>
    <select name="city" id="city_id">
    <option value="" >Select a city:</option>
    </select> 
   
             
          
            <label for="courses"> Courses Interested:</label>
     <input type='checkbox' id="courses" name="courses[]" value="java"/><label class="light" for="java">JAVA</label>
        <br>
    <input type='checkbox' id="courses" name = "courses[]" value=".net"/><label class="light" for=".net">.NET</label>
    <br>
    <input type='checkbox' id="courses" name = "courses[]" value="html"/><label class="light" for="html">HTML</label>
    <br>
    <input type='checkbox' id="courses" name = "courses[]" value="PHP"/><label class="light" for="PHP">PHP</label>
    <br>
    <input type='checkbox' id="courses" name = "courses[]" value="android"/><label class="light" for="andriod">ANDROID</label>
    <br>
    <input type='checkbox' id="courses" name = "courses[]" value="javascript"/><label class="light" for="javascript">JAVASCRIPT</label>
    
    
    
        </fieldset>
        
        <button type="button" id="studentSubmit" value="Register">Register</button>
        </div>
        <div id="registration" hidden>
        <center><img src="tick.jpg" /></center>
        <H1> <center> Registration Successfully Completed.</center></H1>
        </div>
      </form>

  

