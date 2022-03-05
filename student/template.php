<!DOCTYPE html>
<html class="no-js">
    <head>
        <title>SIWES/I.T- Supervision Information Management System</title>
		<meta name="description" content="Learning Management System">
		<meta name="keywords" content="CHMSC LMS,CHMSCLMS,CHMSC,LMS,CHMSCLMS.COMXA">
		<meta name="author" content="JOHN KEVIN LORAYNA">
		<meta charset="UTF-8">
        <!-- Bootstrap -->
		<link href="../admin/images/favicon.ico" rel="icon" type="image">
        <link href="../admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="../admin/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="../admin/bootstrap/css/font-awesome.css" rel="stylesheet" media="screen">
        <link href="../admin/bootstrap/css/my_style.css" rel="stylesheet" media="screen">
        <link href="../admin/bootstrap/css/print.css" rel="stylesheet" media="print">
        <link href="../admin/vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
        <link href="../admin/assets/styles.css" rel="stylesheet" media="screen">
		<!-- calendar css -->
		<link href="../admin/vendors/fullcalendar/fullcalendar.css" rel="stylesheet" media="screen">
		<!-- index css -->
        <!-- <link href="../admin/bootstrap/css/index.css" rel="stylesheet" media="screen"> -->
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
		<script src="../admin/vendors/jquery-1.9.1.min.js"></script>
        <script src="../admin/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		<!-- data table -->
		<link href="../admin/assets/DT_bootstrap.css" rel="stylesheet" media="screen">
		<!-- notification  -->
		<link href="../admin/vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" media="screen">
		<!-- wysiwug  -->
		<link rel="stylesheet" type="text/css" href="../admin/vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css"></link>
		<link href="../admin/vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" media="screen">
		<script src="../admin/vendors/jGrowl/jquery.jgrowl.js"></script>
		
    </head>
    <?php include('../admin/dbcon.php'); ?>
    <?php include('../session.php'); ?>
    <body>
		<div class="navbar navbar-fixed-top navbar-inverse">
        <div class="navbar-inner">
            <div class="container-fluid">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
					<span class="icon-bar"></span><span class="icon-bar"></span>
                </a>
                <a class="brand" href="#">Welcome to: I.T / SIWES Supervision Maanagement Information System</a>
					<div class="nav-collapse collapse">
						<ul class="nav pull-right">
							<?php $query= mysqli_query($con,"select * from student where student_id = '$session_id'")or die(mysqli_error($con));
									$row = mysqli_fetch_array($query);
							?>
							<li class="dropdown">
								<a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user icon-large"></i><?php echo $row['firstname']." ".$row['lastname'];  ?> <i class="caret"></i></a>
									<ul class="dropdown-menu">
										<li><a tabindex="-1" href="index.php?q=changePassword"><i class="icon-circle"></i> Change Password</a></li>
										<li><a tabindex="-1" href="#myModal_student" data-toggle="modal"><i class="icon-picture"></i> Change Avatar</a></li>
										<li class="divider"></li>
										<li>
											<a tabindex="-1" href="logout.php"><i class="icon-signout"></i>&nbsp;Logout</a>
										</li>
									</ul>
							</li>
						</ul>
					</div>
            </div>
        </div>
</div>
<div id="myModal_student" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
		<h3 id="myModalLabel">Change Avatar</h3>
	</div>
		<div class="modal-body">
					<form method="post" action="controller.php" enctype="multipart/form-data">
							<center>	
								<div class="control-group">
								<div class="controls">
									<input name="image" class="input-file uniform_on" id="fileInput" type="file" required>
								</div>
								</div>
							</center>			
					
		</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Close</button>
		<button class="btn btn-info" name="change"><i class="icon-save icon-large"></i> Save</button>
	</div>
					</form>
</div>	
        <div class="container-fluid">
            <div class="row-fluid">
				<div class="span3" id="sidebar">
					<img id="avatar" class="img-polaroid" src="../admin/<?php echo $row['location']; ?>">
		<ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
			<li class="<?php echo !isset($_GET['q'])? 'active' :''?>"><a href="index.php"><i class="icon-chevron-right"></i><i class="icon-group"></i>&nbsp;My Dashboard</a></li>
			 <li class="<?php  if(isset($_GET['q'])) { if($_GET['q']=='Activity'){ echo 'active'; }else{ echo ''; }}  ?>"><a href="index.php?q=Activity"><i class="icon-chevron-right"></i><i class="icon-suitcase"></i>&nbsp;Upload Log/ Activities</a></li>
			<li class="<?php  if(isset($_GET['q'])) { if($_GET['q']=='Message'){ echo 'active'; }else{ echo ''; }}  ?>">
			<a href="index.php?q=Message"><i class="icon-chevron-right"></i><i class="icon-envelope-alt"></i>&nbsp;Message
				
					<span class="badge badge-important"></span>
			</a>
			</li>
			
		</ul>
					
</div>


                 <?php

       require_once $content;

        ?> 
                    </div>


                </div>
			
            </div>
		<center>
		<footer>
		
		<p>I.T / SIWES Supervison Management Information System-Copyright 2020</p>
			<!-- <p>Programmed by: John Kevin Lorayna BSIS 4-A</p> -->
		</footer>
</center>


        </div>
		        <script src="../admin/bootstrap/js/bootstrap.min.js"></script>
        <script src="../admin/vendors/easypiechart/jquery.easy-pie-chart.js"></script>
        <script src="../admin/assets/scripts.js"></script>
				<script>
				$(function() {
					// Easy pie charts
					$('.chart').easyPieChart({animate: 1000});
				});
				</script>
			<!-- data table -->
		<script src="../admin/vendors/datatables/js/jquery.dataTables.min.js"></script>
        <script src="../admin/assets/DT_bootstrap.js"></script>		
			<!-- jgrowl -->
		<script src="../admin/vendors/jGrowl/jquery.jgrowl.js"></script>   
				<script>
				$(function() {
					$('.tooltip').tooltip();	
					$('.tooltip-left').tooltip({ placement: 'left' });	
					$('.tooltip-right').tooltip({ placement: 'right' });	
					$('.tooltip-top').tooltip({ placement: 'top' });	
					$('.tooltip-bottom').tooltip({ placement: 'bottom' });
					$('.popover-left').popover({placement: 'left', trigger: 'hover'});
					$('.popover-right').popover({placement: 'right', trigger: 'hover'});
					$('.popover-top').popover({placement: 'top', trigger: 'hover'});
					$('.popover-bottom').popover({placement: 'bottom', trigger: 'hover'});
					$('.notification').click(function() {
						var $id = $(this).attr('id');
						switch($id) {
							case 'notification-sticky':
								$.jGrowl("Stick this!", { sticky: true });
							break;
							case 'notification-header':
								$.jGrowl("A message with a header", { header: 'Important' });
							break;
							default:
								$.jGrowl("Hello world!");
							break;
						}
					});
				});
				</script>
			<link href="../admin/vendors/datepicker.css" rel="stylesheet" media="screen">
			<link href="../admin/vendors/uniform.default.css" rel="stylesheet" media="screen">
			<link href="../admin/vendors/chosen.min.css" rel="stylesheet" media="screen">
		<!--  -->
		<script src="../admin/vendors/jquery.uniform.min.js"></script>
        <script src="../admin/vendors/chosen.jquery.min.js"></script>
        <script src="../admin/vendors/bootstrap-datepicker.js"></script>
		<!--  -->
			<script src="../admin/vendors/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
			<script src="../admin/vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js"></script>
			<script src="../admin/vendors/ckeditor/ckeditor.js"></script>
			<script src="../admin/vendors/ckeditor/adapters/jquery.js"></script>
			<script type="text/javascript" src="../admin/vendors/tinymce/js/tinymce/tinymce.min.js"></script>
        <script>
        $(function() {
            // Ckeditor standard
            $( 'textarea#ckeditor_standard' ).ckeditor({width:'98%', height: '150px', toolbar: [
				{ name: 'document', items: [ 'Source', '-', 'NewPage', 'Preview', '-', 'Templates' ] },	// Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
				[ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ],			// Defines toolbar group without name.
				{ name: 'basicstyles', items: [ 'Bold', 'Italic' ] }
			]});
            $( 'textarea#ckeditor_full' ).ckeditor({width:'98%', height: '150px'});
        });
        </script>
		<!-- <script type="text/javascript" src="../admin/assets/modernizr.custom.86080.js"></script> -->
		<script src="../admin/assets/jquery.hoverdir.js"></script>
		<link rel="stylesheet" type="text/css" href="../admin/assets//style.css" />
			<script type="text/javascript">
			$(function() {
				$('#da-thumbs > li').hoverdir();
			});
			</script>
			<script src="../admin/vendors/fullcalendar/fullcalendar.js"></script>
			<script src="../admin/vendors/fullcalendar/gcal.js"></script>
			<link href="../admin/vendors/datepicker.css" rel="stylesheet" media="screen">
			<script src="../admin/vendors/bootstrap-datepicker.js"></script>
						<script>
						$(function() {
							$(".datepicker").datepicker();
							$(".uniform_on").uniform();
							$(".chzn-select").chosen();
							$('#rootwizard .finish').click(function() {
								alert('Finished!, Starting over!');
								$('#rootwizard').find("a[href*='tab1']").trigger('click');
							});
						});
						</script>
    </body>
</html>