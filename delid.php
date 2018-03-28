
<?php

/*

DELETE.PHP

Deletes a specific entry from the 'players' table

*/



// connect to the database

require_once('includes/config.php');



// check if the 'id' variable is set in URL, and check that it is valid

if (isset($_GET['id']) && is_numeric($_GET['id']))

{

// get id value

$id = $_GET['id'];



// delete the entry
 $sql = "DELETE FROM docmem WHERE id=$id";

    // use exec() because no results are returned
    $db->exec($sql);





// redirect back to the view page
header("Location: docdel.php?action=joined");


}

else

// if id isn't set, or isn't valid, redirect back to view page

{

header("Location: docdel.php");

}



?>
