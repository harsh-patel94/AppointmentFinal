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
                                        <th>Number</th>
                                        <th>Member</th>
                                        <th>Date</th>                                 
                                        <th>Service</th>                                 
                                        <th>Price</th> 
                                        <th>Dog Breed </th>  
                                        <th>Dog Age </th>                                    
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                   
                                  <?php 
								    
									$new = date('d/m/Y');
							
						
									$user_query=mysqli_query($db, "select * from schedule where date  like  '%$new%' ")or die(mysql_error());
									while($row=mysqli_fetch_array($user_query)){
									$id=$row['id'];
									$member_id = $row['member_id'];
									$service_id = $row['service_id'];
									/* member query  */
									$member_query = mysqli_query($db, "select * from members where member_id = ' $member_id'")or die(mysql_error());
									$member_row = mysqli_fetch_array($member_query);
									/* service query  */
									$service_query = mysqli_query($db, "select * from service where service_id = '$service_id' ")or die(mysql_error());
									$service_row = mysqli_fetch_array($service_query);

									$breed_query = mysqli_query($db, "select * from members where member_id = '$member_id' ")or die(mysql_error());
									$breed_row = mysqli_fetch_array($breed_query);

									$dogage_query = mysqli_query($db, "select * from members where member_id = '$member_id' ")or die(mysql_error());
									$dogage_row = mysqli_fetch_array($dogage_query);
									?>
									
									 <tr class="del<?php echo $id ?>">
									 <td><?php  echo $row['Number'];  ?></td>
                                    <td><?php echo $member_row['firstname']." ".$member_row['lastname']; ?></td> 
                                    <td><?php  echo $row['date'];  ?></td> 
                                    <td><?php  echo $service_row['service_offer'];  ?></td> 
                                    <td><?php  echo $service_row['price'];  ?></td> 
                                    <td><?php  echo $breed_row['dogbreed'];  ?></td> 
                                    <td><?php  echo $dogage_row['dogage'];  ?></td> 
                                    <td><?php  echo $row['status'];  ?></td> 
                                    <td width="100">
                
									   									   <a  href="update1.php<?php echo '?id='.$id; ?>"  class="btn btn-info"><i class="icon-check icon-large"></i></a>
									</td>
									</tr>
									<?php } ?>
                           
                                </tbody>
                            </table>
							


						</div>
    </div>
<?php include('footer.php') ?>