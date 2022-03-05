

                <div class="span6" id="content">
                     <div class="row-fluid">
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                            	<form action="controller.php" class="form-signin" method="changePass">
									<h3 class="form-signin-heading"><i class="icon-lock"></i> Password Update</h3>
									<label>Current Password</label>
									<input type="text" class="input-block-level" id="op" name="op" placeholder="Enter Current password" required>

									<label>New  Password</label>
									<input type="password" class="input-block-level" id="np" name="np" placeholder="New Password" required>

									<label>Confirm Password</label>
									<input type="password" class="input-block-level" id="cp" name="cp" placeholder="Re-type password" onFocusout='checkpass()' required>
									<button data-placement="right" title="Click Here to Sign In" name="login" class="btn btn-success" type="submit"><i class="icon-signin icon-large"></i> Sign in</button>
																
							</form>
							
                            </div>
                           
                        </div>
                    </div>
                </div>

                <script type="text/javascript">

                	const checkpass = () => {
                		const np = document.querySelector('#np')
                		const cp = document.querySelector('#cp')

                //		const check = (np !== cp) ? alert("Password mismatch") : true;

                		if (cp.value !== np.value) {
                			alert("Password mismatch");
                			cp.value= "";
                			np.value="";
                		}

                		//return check;
                	}
                </script>