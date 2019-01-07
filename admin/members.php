<?php
		$pagetitle="Members Area";	
		include 'init.php';
		$do='';
		if(isset($_GET['do'])){
			$do=$_GET['do'];
		}else{
			$do="manage";
		};

		if($do=='manage'){
			$stmt=$con->prepare("SELECT UserID,avatar,Username,Email,FullName,Date FROM users ORDER BY UserID ASC");
			$stmt->execute();
			$rows=$stmt->fetchAll();
							?>
	   			<div class="members-table">
	   				<div class="h1"><p class="text-center">Manage Members</p></div>
	   				<div class="spinner-border" role="status">
					  <span class="sr-only">Loading...</span>
					</div>
				  <table class="table table-bordered">
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">#ID</th>
				      <th scope="col">Username</th>
				      <th scope="col">Email</th>
				      <th scope="col">Full Name</th>
				      <th scope="col">Registered Date</th>
				      <th scope="col">Control</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php
				  	foreach($rows as $row){
				   echo '<tr>';
				     echo '<th scope="row">'.$row['UserID'].'</th>';
				     echo '<td>'.$row['Username'].'</td>';
				     echo '<td>'.$row['Email'].'</td>';
				     echo '<td>'.$row['FullName'].'</td>';
				     echo '<td>'.$row['Date'].'</td>';
				    echo "<td>
										<a href='members.php?do=edit&userid=" . $row['UserID'] . "' class='btn btn-success'><i class='fa fa-edit'></i> Edit</a>
										<a href='members.php?do=Delete&userid=" . $row['UserID'] . "' class='btn btn-danger confirm'><i class='fa fa-close'></i> Delete </a>";
									echo "</td>";
								echo "</tr>";
				};
				?>
				  </tbody>
				</table>
				</div>
				<a href="members.php?do=add" class="btn btn-primary btn-manage">
					<i class="fa fa-plus"></i> New Member
				</a>
			</div>
			</div>
		<?php
		}elseif($do=='add'){
			echo "welcome to ".$do." page";

		}elseif($do=='insert'){
			echo "welcome to ".$do." page";

		}elseif($do=='edit'){
			$userid=isset($_GET['userid'])&&is_numeric($_GET['userid'])?intval ($_GET['userid']):0;

			//SELECT THE INFO FROM DB
			$stmt=$con->prepare("SELECT * FROM users WHERE UserID=? LIMIT 1");
			$stmt->execute(array($userid));
			$row=$stmt->fetch();
			$count=$stmt->rowCount();
			if($count > 0) {?>
			
			<form class="fo" action="members.php?do=update">
				  <div class="form-group">
				    <label for="exampleInputEmail1">User Name</label>
				    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo $row['Username'] ?>">
				    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Email address</label>
				    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo $row['Email'] ?>">
				    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Full Name</label>
				    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo $row['FullName'] ?>">
				    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Password</label>
				    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"
				    value="<?php echo $row['Password'] ?>">
				  </div>
				  <button type="submit" class="btn btn-primary">Submit</button>
			</form>
			<?php
				}else{
					echo "there is no such id";
				}
		
		}elseif($do=='update'){
			echo "welcome to ".$do." page";

		}elseif($do=='delete'){
			echo "welcome to ".$do." page";

		}else{

			 echo "there is no such page";
		}