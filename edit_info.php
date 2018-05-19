<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('dbcon.php'); ?>
<?php include('navbar_dasboard.php'); ?>
    <div class="container">
		<div class="margin-top">
			<div class="row">
				
				<div class="span3">
						<p><strong>Today is:</strong></p>
				 <div class="alert alert-success">
                        <i class="icon-calendar icon-large"></i>
                        <?php
                        $Today = date('d:m:y');
                        $new = date('l, F d, Y', strtotime($Today));
                        echo $new;
                        ?>
                    </div>	
			<div class="alert alert-info">Time Guide for Each Number</div>
						<p>Number 1  - 9:30 - 11:00</p>
						<p>Number 2  - 11:30 - 1:00</p>
						<p>Number 3  - 1:30 - 3:00</p>
						<p>Number 4  - 3:30 - 5:00</p>

				
				<div class="alert alert-info"></div>
					
					
				<div class="alert alert-info"></div>		
				</div>
				<div class="span6">
				
					
				<div class="alert alert-info">Edit Personal Information</div>
	<?php 
	$member_query = mysqli_query($db,"select * from members where member_id='$session_id'")or die(mysql_error());
	$member_row= mysqli_fetch_array($member_query);
	?>
	 <form class="form-horizontal" method="POST">
		<div class="control-group">
			<label class="control-label" for="inputEmail">Firstname</label>
			<div class="controls">
			<input type="text" value="<?php echo $member_row['firstname']; ?>" name="firstname" id="inputEmail" placeholder="Firstname" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Lastname</label>
			<div class="controls">
			<input type="text" name="lastname" id="inputPassword" placeholder="Lastname" value="<?php echo $member_row['lastname']; ?>" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Middlename</label>
			<div class="controls">
			<input type="text" name="middlename" id="inputPassword" value="<?php echo $member_row['middlename']; ?>" placeholder="Middlename" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Address</label>
			<div class="controls">
			<input type="text" name="address" value="<?php echo $member_row['address']; ?>" id="inputPassword" placeholder="Address" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Email</label>
			<div class="controls">
			<input type="text" name="email" id="inputPassword" value="<?php echo $member_row['email']; ?>" placeholder="Email" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Age</label>
			<div class="controls">
			<input type="text" name="age" class="span1" value="<?php echo $member_row['age']; ?>" id="inputPassword" placeholder="Age" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Gender</label>
			<div class="controls">
			<select class="span2" name="gender" required>
			<option><?php echo $member_row['gender']; ?></option>
			<option>MALE</option>
			<option>FEMALE</option>
			</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputEmail">Dog name</label>
			<div class="controls">
			<input type="text" name="dogname" value="<?php echo $member_row['dogname']; ?>" id="inputEmail" placeholder="dog_name" required>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="inputPassword">Dog Breed</label>
			<div class="controls">
			<select name="dogbreed" required>
			<option><?php echo $member_row['dogbreed']; ?></option>
			<option>AIREDALE TERRIER</option>
			<option>AKITA</option>
			<option>ALASKAN MALAMUTE</option>
			<option>AUSTRALIAN SHEPHERD</option>
			<option>BASSET HOUND</option>
			<option>BERNESE MOUNTAIN DOG</option>
			</select>
		    </div>
		</div>

		<div class="control-group">
			<label class="control-label" for="inputPassword">Dog Age</label>
			<div class="controls">
			<input type="text" name="dogage" value="<?php echo $member_row['dogage']; ?>" id="inputPassword" placeholder="date_of_birth" required>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
			<button type="submit" name="update" class="btn btn-success"><i class="icon-pencil"></i>&nbsp;Update</button>
			</div>
		</div>
    </form>
	
	<?php
	if (isset($_POST['update'])){
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$middlename = $_POST['middlename'];
	$address = $_POST['address'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$dogname = $_POST['dogname'];
	$dogbreed = $_POST['dogbreed'];
	$dogage = $_POST['dogage'];
		
	mysqli_query($db,"update members set firstname='$firstname' , lastname='$lastname' , middlename='$middlename' , address='$address' ,
	age='$age' , gender='$gender' , email='$email' , dogname ='$dogname' , dogbreed ='$dogbreed', dogage = '$dogage'   where member_id='$session_id' ") or die(mysql_error());
	?>
	<script>
	window.location = 'edit_info.php'; 
	</script>
	<?php
	}	
	?>
	
				</div>
				<div class="span3">
				
				    <ul class="nav nav-list">
						
				
				</ul>
				<br>
			
				
				<div class="alert alert-info">List of Services</div>
						<table class="table  table-bordered">
                            
                                <thead>
                                    <tr>
                                        <th>Service Offer</th>
                                        <th>Price</th>                                 
                                     
                                    </tr>
                                </thead>
                                <tbody>
								 
                                  <?php $user_query=mysqli_query($db,"select * from service")or die(mysql_error());
									while($row=mysqli_fetch_array($user_query)){
									$id=$row['service_id']; ?>
									 <tr class="del<?php echo $id ?>">
                                    <td><?php echo $row['service_offer']; ?></td> 
                                    <td><?php echo $row['price']; ?></td>                         
									<?php } ?>
                           
                                </tbody>
                            </table>
				
			</div>
		</div>
    </div>
<?php include('footer.php') ?>