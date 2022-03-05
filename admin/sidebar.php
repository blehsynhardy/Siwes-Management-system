     <div class="span3" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                        <li class="<?php  if(isset($_GET['q'])) { if($_GET['q']=='Dashboard'){ echo 'active'; }else{ echo ''; }}  ?>"> <a href="index.php?q=Dashboard"><i class="icon-chevron-right"></i><i class="icon-home"></i>&nbsp;Dashboard</a> </li>
						<li class="<?php  if(isset($_GET['q'])) { if($_GET['q']=='Department'){ echo 'active'; }else{ echo ''; }}  ?>">
                            <a href="index.php?q=Department"><i class="icon-chevron-right"></i><i class="icon-building"></i> Department</a>
                        </li>
						<li class="<?php  if(isset($_GET['q'])) { if($_GET['q']=='Admin'){ echo 'active'; }else{ echo ''; }}  ?>">
                            <a href="index.php?q=Admin"><i class="icon-chevron-right"></i><i class="icon-user"></i> Admin Users</a>
                        </li>
						<li class="<?php  if(isset($_GET['q'])) { if($_GET['q']=='Student'){ echo 'active'; }else{ echo ''; }}  ?>">
                            <a href="index.php?q=Student"><i class="icon-chevron-right"></i><i class="icon-group"></i> Students</a>
                        </li>
						<li class="<?php  if(isset($_GET['q'])) { if($_GET['q']=='Supervisor'){ echo 'active'; }else{ echo ''; }}  ?>">
                            <a href="index.php?q=Supervisor"><i class="icon-chevron-right"></i><i class="icon-group"></i> Supervisors</a>
                        </li>
						<li class="<?php  if(isset($_GET['q'])) { if($_GET['q']=='Assign'){ echo 'active'; }else{ echo ''; }}  ?>">
                            <a href="index.php?q=Assign"><i class="icon-chevron-right"></i><i class="icon-download"></i> Assign</a>
                        </li>
						<li class="<?php  if(isset($_GET['q'])) { if($_GET['q']=='School'){ echo 'active'; }else{ echo ''; }}  ?>">
                            <a href="index.php?q=School"><i class="icon-chevron-right"></i><i class="icon-calendar"></i> School Year</a>
                        </li>
                    </ul>
                </div>