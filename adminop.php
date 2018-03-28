
<?php
echo '<a href="admin.php">
<img src="img.jpg" alt="" width="42" height="40" border=""></a>';
 if(isset($_POST['submit'])){
		 header('Location:docreg.php');		
	 exit;
 }
 if(isset($_POST['submit1'])){
	 	
	 header('Location:docdel.php');
	 exit;
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
     margin: 50px 500px;
	cursor: pointer;
}

.button1:hover {
    background-color: lightblue;
    color: white;
}

</style></head>
<body>

<form action="adminop.php" method="post">
<h2><strong style="margin:200px 430px";>Admin-You can add a doctor</strong></a></h2>

 <input class="button1 button" type="submit" name='submit' id='submit' value="Add a Doctor" />
 
<h2><strong style="margin:200px 430px";>Admin-You can delete a doctor</strong></h2>
 <input class="button1 button" type="submit" name='submit1' id='submit1' value="Delete a Doctor"/>
 </form>
</body>
</html>
