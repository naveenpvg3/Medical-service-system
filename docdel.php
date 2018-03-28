<?php
require_once('includes/config.php');
if(isset($_POST['submit'])){
	
		echo '<a href="adminop.php">
<img src="bak.jpg" alt="" width="42" height="40" border=""></a>';
	$stmt = $db->prepare('SELECT * FROM docmem ');
		$stmt->execute(array(''));
	
		echo "<table >";

// set table headers
echo "<br>";
echo "<tr><th><strong>Name</strong></th><th><strong>Email</strong></th><th><strong>Delete</strong></th></tr>";
	while ($row =  $stmt->fetch(PDO::FETCH_ASSOC))
{
// set up a row for each record
echo "<tr>";
echo "<td>" . $row['username'] . "</td>";
echo "<td>" . $row['email']. "</td>";
echo '<td><a href="delid.php?id=' . $row['id'] . '">Delete</a></td>';
//echo "<td><a href='delete.php?id=" .  . "'>Delete</a></td>";*/
echo "</tr>";
}

echo "</table>";


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
    margin: 150px 500px;
   
    cursor: pointer;
}

.button1:hover {
    background-color: lightblue;
    color: white;
}
tr:hover {background-color:lightblue;}
tr:nth-child(even) {background-color: #f2f2f2;}
table {
	
    border: 1px solid black;
    border-collapse: collapse;
	border-color:lightblue;
	 width: 100%;
	 text-align: center;
}
th, td {
	border: 1px solid black;
    border-collapse: collapse;
    padding: 15px;
}
</style></head>
<body>
<?php
if(isset($_GET['action']) && $_GET['action'] == 'joined'){
					echo "<h2 style='text-align:center' class='bg-success'>You have successfully deleted a Doctor from your organisation.</h2>";
				}
				?>
<form action="docdel.php" method="post">

 <input class="button1 button" type="submit" name='submit' id='submit' value="Show all doctors" />
 
 </form>
</body>
</html>