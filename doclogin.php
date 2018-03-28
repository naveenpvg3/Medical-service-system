<?php
//include config
require_once('includes/config.php');

//check if already logged in move to home page


//process login form if submitted
if(isset($_POST['submit'])){

	if (!isset($_POST['username'])) $error[] = "Please fill out all fields";
	if (!isset($_POST['password'])) $error[] = "Please fill out all fields";

	$username = $_POST['username'];

if ( isValidUsername($username) )
{
		if (!isset($_POST['password'])){
			$error[] = 'A password must be entered';
		}

		$password = $_POST['password'];
$stmt = $db->prepare('SELECT username,password FROM docmem WHERE username = :username');
		$stmt->execute(array(':username' => $username));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$row['password'];
		if($row['password']==$password){
			$_SESSION['username'] = $username;
			header('Location: patient.php');
		}
		/*if($user->login($username,$password)){
			$_SESSION['username'] = $username;
			header('Location: medical.php');
			exit;

		} */else {
			$error[] = 'Wrong username or password or your account has not been activated.';
		}
	}else{
		$error[] = 'Usernames are required to be Alphanumeric, and between 3-16 characters long';
	}



}//end if submit

//define page title
$title = 'Doctor-Login';

//include header template
require('layout/header.php'); 


function get_user_hash($username){

		try {
			$stmt = $this->_db->prepare('SELECT password, username FROM docmem WHERE username = :username ');
			$stmt->execute(array('username' => $username));

			return $stmt->fetch();

		} catch(PDOException $e) {
		    echo $e->getMessage();
		}
	}
function isValidUsername($username){
		if (strlen($username) < 3) return false;
		if (strlen($username) > 17) return false;
		if (!ctype_alnum($username)) return false;
		return true;
	}
function login($username,$password){
		if (!$this->isValidUsername($username)) return false;
		if (strlen($password) < 3) return false;

		$row = $this->get_user_hash($username);

		if($this->password_verify($password,$row['password']) == 1){

		    $_SESSION['loggedin'] = true;
		    $_SESSION['username'] = $row['username'];
		   
		    return true;
		}
	}

?>

	
<div class="container">

	<div class="row">

	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			<form role="form" method="post" action="" autocomplete="off">
				<h2>Please Login								<a href="index.html">
<img src="image.png" alt="" width="42" height="40" border=""></a></h2>

				<hr>

				<?php
				//check for any errors
				if(isset($error)){
					foreach($error as $error){
						echo '<p class="bg-danger">'.$error.'</p>';
					}
				}

				if(isset($_GET['action'])){

					//check the action
					switch ($_GET['action']) {
						case 'active':
							echo "<h2 class='bg-success'>Your account is now active you may now log in.</h2>";
							break;
						case 'reset':
							echo "<h2 class='bg-success'>Please check your inbox for a reset link.</h2>";
							break;
						case 'resetAccount':
							echo "<h2 class='bg-success'>Password changed, you may now login.</h2>";
							break;
					}

				}

				
				?>

				<div class="form-group">
					<input type="text" name="username" id="username" class="form-control input-lg" placeholder="User Name" value="<?php if(isset($error)){ echo htmlspecialchars($_POST['username'], ENT_QUOTES); } ?>" tabindex="1">
				</div>

				<div class="form-group">
					<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="3">
				</div>
				
			
				
				<hr>
				<div class="row">
					<div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Login" class="btn btn-primary btn-block btn-lg" tabindex="5"></div>
				</div>
			</form>
		</div>
	</div>



</div>


<?php 
//include header template
require('layout/footer.php'); 
?>
