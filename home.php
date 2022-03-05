<body id="login">
    <div class="container">
		<div class="row-fluid">
			<div class="span6"><div class="title_index">				
								<div class="row-fluid">

						<div class="span12">
						
						</div>	
													
							</div>
							<div class="row-fluid">
						<div class="span12">
						
								<div class="title">							
							<h3> 
								<p> <img src="admin/images/logo1.png" alt="yabaTech logo" style="width: 100px; height: 100px;"> SIWES </p>
							<h4>Students Industrial Work Experience Scheme</h4>
						
							</h3>		
						</div>
			
						</div>							
							</div>
				
				<div class="row-fluid">

						<div class="span12">
						<br>
								<div class="motto">
												<p>Excellence, Competence and Educational</p>
												<p>Leadership in Science and Technology</p>
								</div>		
						</div>		
				</div></div></div>
			<div class="span6"><div class="pull-right">			
				<form action="controller.php" class="form-signin" method="post">
						<h3 class="form-signin-heading"><i class="icon-lock"></i> Sign in</h3>
						<input type="text" class="input-block-level" id="username" name="username" placeholder="Username" required>
						<input type="password" class="input-block-level" id="password" name="password" placeholder="Password" required>
						<button data-placement="right" title="Click Here to Sign In" name="login" class="btn btn-success" type="submit"><i class="icon-signin icon-large"></i> Sign in</button>
																
			</form>
						
			<div id="button_form" class="form-signin" >
			New to Gate Way Siwes
			<hr>
				<h3 class="form-signin-heading"><i class="icon-edit"></i> Sign up</h3>
				<button data-placement="top" title="Sign In as Student" id="signin_student" onclick="window.location='index.php?q=Signup_Student'" id="btn_student" name="login" class="btn btn-success" type="submit">I`m a Student</button>
				<div class="pull-right">
					<button data-placement="top" title="Sign In as Teacher" id="signin_teacher" onclick="window.location='index.php?q=Signup_Supervisor'" name="login" class="btn btn-success" type="submit">I`m a Supervisor</button>
				</div>
			</div>
														<script type="text/javascript">
														$(document).ready(function(){
															$('#signin_student').tooltip('show'); $('#signin_student').tooltip('hide');
														});
														</script>	
														<script type="text/javascript">
														$(document).ready(function(){
															$('#signin_teacher').tooltip('show'); $('#signin_teacher').tooltip('hide');
														});
														</script>	</div></div>
		</div>
		<div class="row-fluid">
			<div class="span12"><div class="index-footer">

<div class="navbar">
           <div class="navbar-inner">
               <div class="container-fluid">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
             
							<div class="nav-collapse collapse">
							<ul class="nav" id="footer_nav">
	
	</ul>
							</div>
                   <!--/.nav-collapse -->
               </div>
           </div>
</div>

	</div></div>
		</div>