<body id="login">
    <div class="container">
	<div class="row-fluid">
	<div class="span6">
		<div class="title_index">
				<div class="row-fluid">

						<div class="span12">
						
						</div>	
													
							</div>
							<div class="row-fluid">
						<div class="span12">
						
								<div class="title">
							
							<h3>
								<p>YabaTech</p>
							<p>School-LMS</p>
						
							</h3>		
						</div>
			
						</div>							
							</div>
				
				<div class="row-fluid">

						<div class="span12">
						<br>
								<div class="motto">
												<p>Saapade:</p>
												<p>Excellence, Competence and Educational</p>
												<p>Leadership in Science and Technology</p>
								</div>		
						</div>		
				</div>
		</div>
	</div>
	<div class="span6">
		<div class="pull-right">
							<form action="controller.php" class="form-signin" method="post">
			<h3 class="form-signin-heading"><i class="icon-lock"></i> Sign up as Student</h3>
			<input type="text" class="input-block-level" id="username" name="username" placeholder="Matric Number" required>
			<input type="text" class="input-block-level" id="firstname" name="firstname" placeholder="Firstname" required>
			<input type="text" class="input-block-level" id="lastname" name="lastname" placeholder="Lastname" required>
			<input type="text" class="input-block-level" id="phone" name="phone" placeholder="Phone Number" required>
			<input type="text" class="input-block-level" id="place" name="place" placeholder="I.T Placement" required>
			<label>Department</label>
			<select name="department_id" class="input-block-level">
				<option></option>
				<?php
				$query = mysqli_query($con,"select * from department order by department_name ")or die(mysqli_error($con));
				while($row = mysqli_fetch_array($query)){
				?>
				<option value="<?php  echo $row['department_id']; ?>"><?php echo $row['department_name']; ?></option>
				<?php
				}
				?>
			</select>
			<input type="password" class="input-block-level" id="password" name="password" placeholder="Password" required>
			<input type="password" class="input-block-level" id="cpassword" name="cpassword" placeholder="Re-type Password" required>
			<button name="signup" class="btn btn-info" type="submit"><i class="icon-check icon-large"></i> Sign in</button>
			</form>
			
		
			
			<script>
			jQuery(document).ready(function(){
			jQuery("#signin_student").submit(function(e){
					e.preventDefault();
						
						var password = jQuery('#password').val();
						var cpassword = jQuery('#cpassword').val();
					
					
					if (password == cpassword){
					var formData = jQuery(this).serialize();
					$.ajax({
						type: "POST",
						url: "student_signup.php",
						data: formData,
						success: function(html){
						if(html=='true')
						{
						$.jGrowl("Welcome to CHMSC Learning Management System", { header: 'Sign up Success' });
						var delay = 2000;
							setTimeout(function(){ window.location = 'dashboard_student.php'  }, delay);  
						}else if(html=='false'){
							$.jGrowl("student does not found in the database Please Sure to Check Your ID Number or Firstname, Lastname and the Section You Belong. ", { header: 'Sign Up Failed' });
						}
						}
						
						
					});
			
					}else
						{
						$.jGrowl("student does not found in the database", { header: 'Sign Up Failed' });
						}
				});
			});
			</script>

			
		
			<a onclick="window.location='index.php'" id="btn_login" name="login" class="btn" type="submit"><i class="icon-signin icon-large"></i> Click here to Login</a>
			
			
			
				
		
					
		</div>
	</div>
    </div>
	