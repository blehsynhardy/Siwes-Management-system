
               <div class="span6" id="content">
                     <div class="row-fluid">
					    <!-- breadcrumb -->	
					     <ul class="breadcrumb">
								<?php
								$school_year_query = mysqli_query($con,"select * from school_year order by school_year DESC")or die(mysqli_error($con));
								$school_year_query_row = mysqli_fetch_array($school_year_query);
								$school_year = $school_year_query_row['school_year'];
								?>
								<li><a href="#">Message</a><span class="divider">/</span></li>
								<li><a href="#"><b>Inbox</b></a><span class="divider">/</span></li>
								<li><a href="#">School Year: <?php echo $school_year_query_row['school_year']; ?></a></li>
						</ul>
						 <!-- end breadcrumb -->
					 
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left"></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form action="controller.php" method="post">
										<div class="pull-right">
											<button class="btn btn-info" name="read"><i class="icon-check"></i> Read</button>
													
							Check All <input type="checkbox"  name="selectAll" id="checkAll" />
								<script>
								$("#checkAll").click(function () {
									$('input:checkbox').not(this).prop('checked', this.checked);
								});
								</script>					
							
										</div>
										
										<ul class="nav nav-pills">
										<li class=""><a href="index.php?q=Message"><i class="icon-envelope-alt"></i>inbox</a></li>
										<li class="active"><a href="index.php?q=Sent_Messages"><i class="icon-envelope-alt"></i>Send messages</a></li>
										</ul>
									
									<?php
								 $query_announcement = mysqli_query($con,"select * from message
																	 order by date_sended DESC
																	")or die(mysqli_error($con));
								 $count_my_message = mysqli_num_rows($query_announcement);
								 if ($count_my_message != '0'){
								 while($row = mysqli_fetch_array($query_announcement)){
								 $id = $row['message_id'];
								 ?>
											<div class="post"  id="del<?php echo $id; ?>">
											<?php echo $row['content']; ?>
													<hr>
											Send to: <strong><?php echo $row['reciever_name']; ?></strong>
											<i class="icon-calendar"></i> <?php echo $row['date_sended']; ?>
													<div class="pull-right">
													<a class="btn btn-link"  href="#<?php echo $id; ?>" data-toggle="modal" ><i class="icon-remove"></i> Remove </a>
															<!-- Modal -->
<div id="<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
		<h3 id="myModalLabel">Remove Sent Message</h3>
	</div>
		<div class="modal-body">
		<div class="alert alert-danger">
			Are you sure you want to Remove this sent message?
		</div>
		</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Close</button>
		<button   id="<?php echo $id; ?>" class="btn btn-danger remove" data-dismiss="modal" aria-hidden="true"><i class="icon-check icon-large"></i> Yes</button>
	</div>
</div>
				
													</div>
											</div>
								<?php }}else{ ?>
								<div class="alert alert-info"><i class="icon-info-sign"></i> No Message in your Send Items</div>
								<?php } ?>	
								</form>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
					
<script type="text/javascript">
	$(document).ready( function() {
		$('.remove').click( function() {
		var id = $(this).attr("id");
			$.ajax({
			type: "POST",
			url: "remove_inbox_message.php",
			data: ({id: id}),
			cache: false,
			success: function(html){
			$("#del"+id).fadeOut('slow', function(){ $(this).remove();}); 
			$('#'+id).modal('hide');
			$.jGrowl("Your Sent message is Successfully Deleted", { header: 'Data Delete' });	
			}
			}); 		
			return false;
		});				
	});
</script>
			
	

                </div>
				<div class="span3" id="">
	<div class="row-fluid">

				      <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left"><h4><i class="icon-pencil"></i> Create Message</h4></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								
								    <ul class="nav nav-tabs">
										<li class="active">
											<a href="student_message.php">For Supervisor</a>
										</li>
									</ul>
								
								
	

								<form action="controller.php" method="post">
										<div class="control-group">
											<label>To:</label>
                                          <div class="controls">
                                            <select name="supervisor_id" class="chzn-select" required>
<?php $query = mysqli_query($con,"select * from supervisor_department_student LEFT JOIN supervisor ON supervisor.supervisor_id = supervisor_department_student.supervisor_id where student_id = '$session_id'");
											while($row = mysqli_fetch_array($query)){
											
											?>
											
											<option value="<?php echo $row['supervisor_id']; ?>"><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?> </option>
											
											<?php } ?>
                                            </select>
                                          </div>
                                        </div>
								
							
										<div class="control-group">
											<label>Content:</label>
                                          <div class="controls">
											<textarea name="my_message" class="my_message" required></textarea>
                                          </div>
                                        </div>
										<div class="control-group">
                                          <div class="controls">
												<button name="send_message"  class="btn btn-success"><i class="icon-envelope-alt"></i> Send </button>

                                          </div>
                                        </div>
                                </form>

					
								
								
							
								
								
										<script>
			jQuery(document).ready(function(){
			jQuery("#send_message").submit(function(e){
					e.preventDefault();
					var formData = jQuery(this).serialize();
					$.ajax({
						type: "POST",
						url: "send_message_student.php",
						data: formData,
						success: function(html){
						
						$.jGrowl("Message Successfully Sended", { header: 'Message Sent' });
						var delay = 2000;
							setTimeout(function(){ window.location = 'student_message.php'  }, delay);  
						
						
						}
						
					});
					return false;
				});
			});
			</script>
			
			
							
								
								</div>
                            </div>
                        </div>
                        <!-- /block -->
						

	</div>
</div>
            </div>
		