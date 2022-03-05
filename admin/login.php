  <body id="login">
    <div class="container">

      <form action="controller.php" class="form-signin" method="post">
        <h3 class="form-signin-heading"><i class="icon-lock"></i> Please Login</h3>
        <input type="text" class="input-block-level" id="usernmae" name="username" placeholder="Username" required>
        <input type="password" class="input-block-level" id="password" name="password" placeholder="Password" required>
        <button name="login" class="btn btn-info" type="submit"><i class="icon-signin icon-"></i> Sign in</button>
		
		      </form>
				

		


    </div> <!-- /container -->
<?php include('script.php'); ?>
  </body>
</html>