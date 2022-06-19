
<nav class="navbar navbar-expand navbar-theme">
				<a class="sidebar-toggle d-flex me-2">
					<i class="hamburger align-self-center"></i>
				</a>

				

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav ms-auto">
						<li class="nav-item dropdown ms-lg-2">
							<a class="nav-link dropdown-toggle position-relative" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
								<i class="align-middle fas fa-bell"></i>
								<span class="indicator"></span>
							</a>
						    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
									Notifications
								</div>
								<div class="list-group">
								    
								    <?php
								    $i=0;
								    $c=0;
								    $id=$_SESSION['id'];
								    $sql_count= "SELECT * FROM subscriber WHERE user_id='$id' AND isseen=0";
								    $i=$i+ mysqli_num_rows(mysqli_query($conn,$sql_count));
							        if($i!=0)
							        {
							            $c=1;
								    ;?>
									<a href="subscribers.php" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="ms-1 text-danger fas fa-fw fa-bell"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">You have <?php echo $i;?> new Subscribers!</div>
												<div class="text-muted small mt-1">Click to check them!</div>
												<div class="text-muted small mt-1"><form method="post"><button name="mark_seen_subs" type="submit">Mark Seen</button></form></div>
											</div>
										</div>
									</a>
									<?php
							        }
									if(isset($_POST['mark_seen_subs']))
									{
									    $sql_up="UPDATE subscriber SET isseen=1 WHERE user_id='$id' AND isseen=0";
									    mysqli_query($conn,$sql_up);
									}
									
									?>
									
									<?php
								    $i=0;
								    $id=$_SESSION['id'];
								    $sql_count= "SELECT * FROM card_order WHERE user_id='$id' AND isseen=0";
								    $i=$i+ mysqli_num_rows(mysqli_query($conn,$sql_count));
							        if($i!=0)
							        {
							            $c=1;
								    ;?>
									<a href="smart-card-orders.php" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="ms-1 text-danger fas fa-fw fa-bell"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">You have <?php echo $i;?> new card orders!</div>
												<div class="text-muted small mt-1">Click to check them!</div>
												<div class="text-muted small mt-1"><form method="post"><button name="mark_seen_orders" type="submit">Mark Seen</button></form></div>
											</div>
										</div>
									</a>
									<?php
							        }
									if(isset($_POST['mark_seen_orders']))
									{
									    $sql_up="UPDATE card_order SET isseen=1 WHERE user_id='$id' AND isseen=0";
									    mysqli_query($conn,$sql_up);
									}
									
									if($c==0)
									{
									?>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											
											<div class="col-10">
												<div class="text-dark">You have no new notifications!</div>
											</div>
										</div>
									</a>
									<?php
									} ?>
									
									
									
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">All notifications</a>
								</div>
							</div> 
						</li>
						<li class="nav-item dropdown ms-lg-2">
							<a class="nav-link dropdown-toggle position-relative" href="#" id="userDropdown" data-bs-toggle="dropdown">
								<i class="align-middle fas fa-cog"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
								<a class="dropdown-item" href="profile.php"><i class="align-middle me-1 fas fa-fw fa-user"></i>Edit Profile</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="logout.php"><i class="align-middle me-1 fas fa-fw fa-arrow-alt-circle-right"></i> Sign out</a>
							</div>
						</li>
					</ul>
				</div>
				
			</nav>