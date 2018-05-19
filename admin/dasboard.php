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
							<div class="body_img">
								<img src="../img/top-dog-banner-1.jpg">
							</div>
						</div>

    </div>
    <div class="control-group">
				<div class="controls">
				<href="#sendmail" button name="submit" type="submit" class="btn btn-success"></i>&nbsp;Send Email</button>
	
			</div>



			<script type="text/javascript">
        $(document).ready( function() {
            $('.btn-success').click( function() {
                var id = $(this).attr("id");
                if(confirm("Automated email sent!")){
                    $.ajax({
                        type: "POST",
                        url: "send_email.php",
                        data: ({id: id}),
                        cache: false,
                        success: function(html){
                        $(".del"+id).fadeOut('slow'); 
                        } 
                    }); 
                }else{
                    return false;}
            });				
        });
    </script>
<?php include('footer.php') ?>