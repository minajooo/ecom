	<?php 
	session_start();
	if(isset($_SESSION['username'])){
		header('location:dashboard.php');
	}
	$pagetitle="good start";
	$nonavbar='';
	include_once "init.php";
	if($_SERVER['REQUEST_METHOD']=='POST'){

					$user	=	$_POST['user'];
					$pass	=	$_POST['pass'];
					$hash	=	sha1($pass);

	

	//check if the user is exists in the db 

	$stmt = $con->prepare("SELECT 
									UserID, Username, Password 
								FROM 
									users 
								WHERE 
									Username = ? 
								AND 
									Password = ? 
								AND 
									GroupID = 1
								LIMIT 1");

	$stmt->execute(array($user,$hash));

	$row=$stmt->fetch();

	$count=$stmt->rowCount();

	if($count > 0){

				$_SESSION['username'] 	= $_POST['user'];
				$_SESSION['id'] 		= $row['UserID'];
				header('location:dashboard.php');
				exit();

			}else{

				echo "you have no authrity to enter here";
			}
};
	 ?>	
	
<form class="fo" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">User name</label>
    <input type="text" name="user" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="pass">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
	<?php include_once "includes/templates/footer.php"; ?>