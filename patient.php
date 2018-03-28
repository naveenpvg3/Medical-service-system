<?php
 require('includes/config.php');
 
if(isset($_POST['submit'])){
									echo '<a href="doclogin.php">
<img src="img.jpg" alt="" width="42" height="40" border=""></a><br><br>';
	$stmt = $db->prepare('SELECT * FROM doctor where disease="cardio"');
		$stmt->execute(array(''));
	
		echo "<table >";
//set table headers
echo "<br>";
echo "<tr><th><strong>Name</strong></th><th><strong>Disease</strong></th><th><strong>Description</strong></th><th><strong>Selection</strong></th>
<th><strong>Selection</strong></th><th><strong>Fix</strong></th><th><strong>Statuss</strong></th></tr>";
	while ($row =  $stmt->fetch(PDO::FETCH_ASSOC))
{
// set up a row for each record
echo "<tr>";
echo "<td>" . $row['patient'] . "</td>";
echo "<td>" . $row['disease']. "</td>";
echo "<td>" . $row['des']. "</td>";
echo "<td>" . $row['appoint']. "</td>";
echo '<td><a href="fix.php?id=' . $row['id'] . '">Fix</a></td>';
echo '<td><a href="opinion.php?id=' . $row['id'] . '">Opinion</a></td>';
echo "<td>".$row['statuss']."</td>";
echo "</tr>";
}

echo "</table>";

}
if(isset($_POST['submit1'])){
		echo '<a href="doclogin.php">
<img src="img.jpg" alt="" width="42" height="40" border=""></a><br><br>';
	$stmt = $db->prepare('SELECT * FROM doctor where disease="neuro"');
		$stmt->execute(array(''));
	
echo "<table >";
//set table headers
echo "<br>";
echo "<tr><th><strong>Name</strong></th><th><strong>Disease</strong></th><th><strong>Description</strong></th><th><strong>Selection</strong></th>
<th><strong>Selection</strong></th><th><strong>Fix</strong></th><th><strong>Statuss</strong></th></tr>";
while ($row =  $stmt->fetch(PDO::FETCH_ASSOC))
{
// set up a row for each record
echo "<tr>";
echo "<td>" . $row['patient'] . "</td>";
echo "<td>" . $row['disease']. "</td>";
echo "<td>" . $row['des']. "</td>";
echo "<td>" . $row['appoint']. "</td>";

echo '<td><a href="fix.php?id=' . $row['id']. '">Fix</a></td>';
echo '<td><a href="opinion.php?id=' . $row['id'] . '">Opinion</a></td>';
echo "<td>".$row['statuss']."</td>";
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
     margin: 50px 500px;
	cursor: pointer;
}

.button1:hover {
    background-color: lightblue;
    color: white;
}
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
<form action="patient.php" method="post">
 <input class="button1 button" type="submit" name='submit' id='submit' value="Cardiology-Patients " />
 <input class="button1 button" type="submit" name='submit1' id='submit' value="Neurology-Patients " />
 
 </form>
 </body>
 </html>
 