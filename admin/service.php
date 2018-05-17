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
                                    <strong><i class="icon-user icon-large"></i>&nbsp;Service Table</strong>
                            </div>
                            <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">
                            
                                <thead>
                                    <tr>
                                        <th>Service Offer</th>
                                        <th>Price</th>                               
                                    </tr>
                                </thead>
                                <tbody>
								 
                                  <?php $user_query=mysqli_query($db, "select * from service")or die(mysql_error());
									while($row=mysqli_fetch_array($user_query)){
									$id=$row['service_id']; ?>
									 <tr class="del<?php echo $id ?>">
                                    <td><?php echo $row['service_offer']; ?></td> 
                                    <td><?php echo $row['price']; ?></td> 
                                   
									</tr>
									<?php } ?>
                           
                                </tbody>
                            </table>
							


						</div>
    </div>
<?php include('footer.php') ?>