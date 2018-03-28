<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php require('includes/config.php');

if(isset($_POST['submit'])){
	
    if (empty($_POST ['patient'])){
		$error="njl";
 echo "<script>alert('please enter the name');</script>";
}
    if (empty($_POST ['des'])){
		$error="njl";
 echo "<script>alert('please enter problem description');</script>";
}
   $username=$_SESSION['username'];
	
	$patient=$_POST['patient'];
	$disease=$_POST['disease'];
	$des=$_POST['des'];
	$appoint=$_POST['appoint'];
	

 if(!isset($error)){


try {

		$stmt = $db->prepare("SELECT * FROM doctor where username='$username'");
		$nRows = $db->query('select count(*) from doctor')->fetchColumn();
		
	
		$id=$nRows+1;
			//insert into database with a prepared statement
			$stmt = $db->prepare("INSERT INTO doctor (id,username,patient,disease,des,appoint,status,opinion,statuss) VALUES (:id,:username,:patient,:disease,:des,:appoint,:status,:opinion,:statuss)");
			$stmt->execute(array(
				':id'=>$id,
				':username' => $username,
				':patient'=>$patient,
				':disease'=>$disease,
				'des'=>$des,
				':appoint'=>$appoint,
				':status'=>'',
				':opinion'=>'',
				':statuss'=>''
));
			

			echo "<script>alert('You have successfully applied for an appointment with our doctors You can check it in MyBookings page');</script>";

			
		//else catch the exception and show the error.
		} catch(PDOException $e) {
		    $error[] = $e->getMessage();
		}

	}
}


?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Coming soon, Bootstrap, Bootstrap 3.0, Free Coming Soon, free coming soon, free template, coming soon template, Html template, html template, html5, Code lab, codelab, codelab coming soon template, bootstrap coming soon template">
    <title>Doctor</title>
   
    <link href='http://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet'
        type='text/css' />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300,800'
        rel='stylesheet' type='text/css' />
   
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
      <link href="css/style.css" rel="stylesheet" type="text/css" />    
   
    <link href="css/font-awesome.css" rel="stylesheet" type="text/css" />

</head>
<body style="background-color:#0073e6	"; >



    <div id="custom-bootstrap-menu" class="navbar navbar-default " role="navigation">
    <div class="container">
        <div class="navbar-header"><a class="navbar-brand" href="#">Medical Services</a>

        </div>
        <div class="collapse navbar-collapse navbar-menubuilder">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php">Logout</a>
                </li>
                
                <li><a href="about.html">About Us</a></li>
				<li><a href="mybookings.php">My Account</a></li>
               
            </ul>
        </div>
    </div>
</div>

        <div class="container">

           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-center">
<img src="2.jpg" alt="Avatar" style="width:105px;border-radius: 300%;"> 
           <div id="banner">

             <h1><strong>Talk to Dr.Arjun</strong> </h1>
		 
		<div>
		<iframe
    width="300"
    height="380"
    src="https://console.dialogflow.com/api-client/demo/embedded/3a901689-4b5c-4fcd-a141-fd0f4def7374">

	
		 
		</iframe>
		
		</div>

            <h5><strong></strong></h5>
           
           </div>
          
              
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="registrationform">
            <form class="form-horizontal" action="medical.php" method="post">
                <fieldset>
                    <legend>Doctor <i class="fa fa-pencil pull-right"></i></legend>
                    <div class="form-group">
                        <label for="name" class="col-lg-2 control-label">
                            Patient Name</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="patient" id="patient" placeholder="Name">
                        </div>
                    </div>
                   <div class="form-group">
                        <label class="col-lg-2 control-label">
                            Choose</label>
                        <div class="col-lg-10">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="disease" id="cardio" value="cardio" checked="">
                                    Cardiology
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="disease" id="neuro" value="neuro">
                                    Neurology
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="textArea" class="col-lg-2 control-label">
                            Problem Description</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="3" name='des' id="des" ></textarea>
                
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">
                            Choose</label>
                        <div class="col-lg-10">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="appoint" id="appoin" value="fix" checked="">
                                    Fix Appointment
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="appoint" id="opinion" value="opinion">
                                    Second opinion
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button type="reset" class="btn btn-warning">
                                Cancel</button>
                            <button type="submit" class="btn btn-primary" name="submit">Submit
                                </button>
                        </div>
                    </div>
                </fieldset>
            </form>
         </div>



         </div>
        </div>
        

</body>
</html>
