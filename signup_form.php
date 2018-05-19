	<?php
		include('dbcon.php');
		if (isset($_POST['submit'])){
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$middlename=$_POST['middlename'];
		$age=$_POST['age'];
		$gender=$_POST['gender'];
		$address=$_POST['address'];
		$email=$_POST['email'];
		$contact_no=$_POST['contact_no'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$dogname=$_POST['dogname'];
		$dogbreed=$_POST['dogbreed'];
		$dogage=$_POST['dogage'];
	}
	?>
<form method="post">	
	<div class="span5">
	<div class="form-horizontal">
		<div class="control-group">
			<label class="control-label" for="inputEmail">Name</label>
			<div class="controls">
			<input type="text" name="firstname" value="<?php if (isset($_POST['submit'])){echo $firstname;} ?>" placeholder="Firstname" required> 
			<input type="text" name="lastname"  value="<?php if (isset($_POST['submit'])){echo $lastname;} ?>" placeholder="Lastname" required> 
			<input type="text" name="middlename" value="<?php if (isset($_POST['submit'])){echo $middlename;} ?>" placeholder="Middlename" required> 
			</div>
		</div>
	
		<div class="control-group">
			<label class="control-label" for="inputPassword">Gender</label>
			<div class="controls">
			<select name="gender" required>
			<option><?php if (isset($_POST['submit'])){echo $gender;} ?></option>
			<option>MALE</option>
			<option>FEMALE</option>
			<option>Prefer not to say</option>
			</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Age</label>
			<div class="controls">
			<input name="age" class="span1" type="number"  value="<?php if (isset($_POST['submit'])){echo $age;} ?>" placeholder="Age" required>
			</div>
		</div>
	
		<div class="control-group">
			<label class="control-label" for="inputPassword">Username</label>
			<div class="controls">
			<input type="text" name="username" value="<?php if (isset($_POST['submit'])){echo $username;} ?>" placeholder="Username" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Password</label>
			<div class="controls">
			<input type="password" name="password" value="<?php if (isset($_POST['submit'])){echo $password;} ?>" placeholder="Password">
			</div>
		</div>

		<div class="control-group">
			<div class="controls">
			<button name="submit" type="submit" class="btn btn-info"><i class="icon-signin icon-large"></i>&nbsp;Sign Up</button>
			</div>
		</div>
    </div>
</div>
	
	
	<div class="span6">
	
	
	<div class="form-horizontal">
		<div class="control-group">
			<label class="control-label" for="inputPassword">Address</label>
			<div class="controls">
			<input type="text" name="address" value="<?php if (isset($_POST['submit'])){echo $address;} ?>" placeholder="Address" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Contact No</label>
			<div class="controls">
			<input type="text" name="contact_no" value="<?php if (isset($_POST['submit'])){echo $contact_no;} ?>"placeholder="Contact No" required>
			</div>
		</div>
		
			<div class="control-group">
			<label class="control-label" for="inputPassword">Email Address</label>
			<div class="controls">
			<input name="email" type="text" value="<?php if (isset($_POST['submit'])){echo $email;} ?>" placeholder="Email Address" required> 
			</div>
		</div>
			<div class="control-group">
			<label class="control-label" for="inputPassword">Dog Name</label>
			<div class="controls">
			<input name="dogname" type="text" value="<?php if (isset($_POST['submit'])){echo $dogname;} ?>" placeholder="Your Dog's Name" required> 
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="inputPassword">Dog Breed</label>
			<div class="controls">
			<select name="dogbreed" required>
			<option><?php if (isset($_POST['submit'])){echo $dogbreed;} ?></option>
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
			<input name="dogage" type="text" value="<?php if (isset($_POST['submit'])){echo $dogage;} ?>" placeholder="Your Dog's Age" required> 
			</div>
		</div>

			</div>
	<?php 

if(isset($_POST['submit']))
{
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$middlename=$_POST['middlename'];
	$age=$_POST['age'];
	$gender=$_POST['gender'];
	$address=$_POST['address'];
	$email=$_POST['email'];
	$contact_no=$_POST['contact_no'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$dogname=$_POST['dogname'];
	$dogbreed=$_POST['dogbreed'];
	$dogage=$_POST['dogage'];
	?>
}
else if(strcmp($_SESSION['code'], $_POST['code']) == 0 ){ ?>
<?php
	mysqli_query($db, "insert into members (firstname,lastname,age,gender,address,email,contact_no,username,password,dogname,dogbreed,dogage)
	values ('$firstname','$lastname','$age','$gender','$address','$email','$contact_no','$username','$password','$dogname','$dogbreed','$dogage')
	")or die(mysql_error());?>
<script type="text/javascript">
window.location='success.php';
</script>
<?php
}else{
echo "";
}
?>
    </div>
    </div>

		
		
	</div>
		
		</div>	

	
</form>