<?php
include '../includes/config.php';
$tid=$_SESSION['id'];
$sidebar_sql="SELECT * FROM students WHERE id=$tid";
$sidebar_row=mysqli_fetch_assoc(mysqli_query($conn,$sidebar_sql));
$user_name=$sidebar_row['name'];
$sidebar_pp=$sidebar_row['dp'];
$sidebar_lisno=$tid;
$sem=$sidebar_row['sem'];
$branch=$sidebar_row['branch'];
;?>
<nav id="sidebar" class="sidebar">
			<a class="sidebar-brand" href="dashboard.php">
				     <span style="font-size: 1.5rem;font-family: cursive;">Smart</span> <span style="font-size: 2.25rem;font-family: cursive;"><b>Attendance</b></span>
			</a>
			<div class="sidebar-content">
				<div class="sidebar-user">
					<div class="fw-bold"><?php echo $user_name;?></div>
					<small>BRANCH : <?php echo $branch;?></small><br>
					<small>SEMESTER : <?php echo $sem;?></small>
				</div>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Main Menu
					</li>
					
					<li class="sidebar-item">
						<a data-bs-target="#charts" class="sidebar-link collapsed" href="dashboard.php">
							<i class="align-middle me-2 fas fa-fw fa-home"></i> <span class="align-middle">Dashboard</span>
							
						</a>
						
					</li>
					
					
					
					
					
					<li class="sidebar-item">
						<a data-bs-target="#ui" class="sidebar-link collapsed" href="all-routine.php">
							<i class="align-middle me-2 fas fa-fw fa-angle-double-right"></i> <span class="align-middle">Check Routines</span>
						</a>

					</li>
					
					
					<li class="sidebar-item">
						<a data-bs-target="#ui" class="sidebar-link collapsed" href="subject-attendance.php">
							<i class="align-middle me-2 fas fa-fw fa-h-square"></i> <span class="align-middle">Subject Wise Attendance</span>
						</a>

					</li>
				
					
					
				</ul>
				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Account Settings
					</li>
					
					
				
					
					
					
					<li class="sidebar-item">
						<a data-bs-target="#nav_account" data-bs-toggle="collapse" class="sidebar-link collapsed" aria-expanded="false">
						    <i class="align-middle fas fa-cog"></i> <span class="align-middle">Account Settings</span>
						</a>
						<ul id="nav_account" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar" style="">
							<li class="sidebar-item"><a class="sidebar-link" href="profile.php">Profile Settings</a></li>
						</ul>
					</li>
					
				
					<li class="sidebar-item">
						<a data-bs-target="#forms"  class="sidebar-link collapsed" href="logout.php">
							<i class="align-middle me-2 fas fa-fw fa-power-off"></i> <span class="align-middle">LogOut </span>
						</a>

					</li>
				</ul>
			</div>
		</nav>