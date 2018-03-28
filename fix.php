
<?php
 require('includes/config.php');
 if (isset($_GET['id']) && is_numeric($_GET['id']))
{
	
echo '<a href="patient.php">
<img src="bak.jpg" alt="" width="42" height="40" border=""></a>';

// get id value

$id = $_GET['id'];



// delete the entry
 

    // use exec() because no results are returned
	
if(isset($_POST['fix'])){

	$date=$_POST['text'];
	if($date==''){
		echo "<script>alert('please enter a valid date');</script>";
		
		
	}
	
	$sql = "UPDATE doctor SET status='$date' ,statuss='Done!!!' WHERE  id='$id'";
	$db->exec($sql);
	if($date!='')
	echo "<script>alert('You have fixed an appointment');</script>";
}



// redirect back to the view page



}

else

// if id isn't set, or isn't valid, redirect back to view page

{



}
?>

<html>
<head>
<style>
.button {
    background-color: #008CBA; 
    border: none;
    color: white;
	border-radius: 8px;
    padding: 16px 32px;
    text-align: right;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
     margin: 10px 45px;
	cursor: pointer;
}
.


.button1:hover {
    background-color: lightblue;
    color: white;
}

</style></head>
<body>
<form action="" method='post'>
<input  type="date"  name='text' max="2018-12-31" min="2018-04-01" style="margin:100px 425px" width="80%" height="80%" >
<input type='submit' class="button button1" name='fix' style="margin:10px 450px" value='submit' >
</form>
</body>
</html>
