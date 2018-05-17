<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <div class="container">

	<div class="row">	
						<div class="span3">
						<?php include('sidebar.php'); ?>
						</div>
						<div class="span9">
							<!-- <img src="../img/dr.jpg" class="img-rounded"> -->
								<?php include('navbar_dasboard.php') ?>
						    <div class="alert alert-info">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong><i class="icon-user icon-large"></i>&nbsp;Users Table</strong>
                            </div>
							
                            <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">
                            
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Password</th>                                 
                                    </tr>
                                </thead>
                                <tbody>
								 
                                  <?php $user_query=mysqli_query($db, "select * from users")or die(mysql_error());
									while($row=mysqli_fetch_array($user_query)){
									$id=$row['user_id']; ?>
									 <tr class="del<?php echo $id ?>">
                                    <td><?php echo $row['username']; ?></td> 
                                    <td><?php echo $row['password']; ?></td> 
									</tr>
									<?php } ?>
                           
                                </tbody>
                            </table>

						</div>
    </div>
<?php include('footer.php') ?>