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

	$text=$_POST['text'];
	echo $text;
	if($text=='')
		echo "<script>alert('Please fill the opinion form');</script>";
	$sql = "UPDATE doctor SET opinion='$text' , statuss='Done!!!!' WHERE  id='$id'";
	$db->exec($sql);
	if($text!='')
		echo "<script>alert('You have submitted your opinion');</script>";
}



// redirect back to the view page



}

else

// if id isn't set, or isn't valid, redirect back to view page

{



}
?>
<html>
<head></head>

<style>#container { text-align:center;margin:100px 25px}

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
    margin: 50px 550px;
   
    cursor: pointer;
}

.button1:hover {
    background-color: lightblue;
    color: white;
}
</style>

<html>

<body>
<form action="" method='post'>
<div id="container">
    <textarea rows="4" cols="50" name='text'></textarea>
</div>

 
<input class="button1 button" type="submit" name='fix' id='fix' value="Fix Opinion" />
</form>
</body>
</html>
