<?php
session_start();
error_reporting(0);
include('../includes/config.php');
$tid=$_SESSION['id'];
if($_SESSION['id']=='')
{
    echo "<script>window.location.href='index.php'</script>";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="SmartCrc">
	<link rel="icon" href="assets/img/favicon.png">

	<title>Smart Attendance | Dashboard</title>
	
    <link href="assets/css/modern.css" rel="stylesheet">
	<script src="assets/js/settings.js"></script>
	
</head>

<body>
	<div class="splash active">
		<div class="splash-icon"></div>
	</div>

	<div class="wrapper">
		<!-- SIDEBAR -->
		<?php include 'includes/sidebar.php';?>
		<div class="main">
			<?php include 'includes/navbar.php';?>
			<main class="content">
				<div class="container-fluid">

					<div class="header">
						<h1 class="header-title">
							Welcome back, <?php echo $user_name;?>!
						</h1>
						<p class="header-subtitle">Your Teacher Registeration ID is <?php echo $sidebar_lisno;?></p>
					</div>

					<div class="row">
						<div class="col-md-6 col-lg-3 col-xl">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col mt-0">
											<h5 class="card-title">Total Subjects</h5>
										</div>

										<div class="col-auto">
											<div class="avatar">
												<div class="avatar-title rounded-circle bg-primary-dark">
													<i class="align-middle" data-feather="activity"></i>
												</div>
											</div>
										</div>
									</div>
									<h1 class="display-5 mt-1 mb-3">
									    <?php
									        $sql="SELECT COUNT(*) AS c FROM teach_subj WHERE tid='$tid'";
									        $row=mysqli_fetch_assoc(mysqli_query($conn,$sql));
									        echo $row['c'];
									    ;?>
									    
									</h1>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-lg-3 col-xl">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col mt-0">
											<h5 class="card-title">Total Classes</h5>
										</div>

										<div class="col-auto">
											<div class="avatar">
												<div class="avatar-title rounded-circle bg-primary-dark">
													<i class="align-middle" data-feather="activity"></i>
												</div>
											</div>
										</div>
									</div>
									<h1 class="display-5 mt-1 mb-3">
									    <?php
									        $sql="SELECT COUNT(*) AS c FROM routine WHERE tid='$tid'";
									        $row=mysqli_fetch_assoc(mysqli_query($conn,$sql));
									        echo $row['c'];
									    ;?>
									</h1>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-lg-3 col-xl">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col mt-0">
											<h5 class="card-title">Total Classes today</h5>
										</div>

										<div class="col-auto">
											<div class="avatar">
												<div class="avatar-title rounded-circle bg-primary-dark">
													<i class="align-middle" data-feather="pie-chart"></i>
												</div>
											</div>
										</div>
									</div>
									<h1 class="display-5 mt-1 mb-3">
									    <?php
									        $day=date("N");
									        $sql="SELECT COUNT(*) AS c FROM routine WHERE day='$day' and tid='$tid'";
									        $row=mysqli_fetch_assoc(mysqli_query($conn,$sql));
									        echo $row['c'];
									    ;?>
									</h1>
									
								</div>
							</div>
						</div>
						<div class="col-md-6 col-lg-3 col-xl">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col mt-0">
											<h5 class="card-title">Classes Completed Today</h5>
										</div>

										<div class="col-auto">
											<div class="avatar">
												<div class="avatar-title rounded-circle bg-primary-dark">
													<i class="align-middle" data-feather="pie-chart"></i>
												</div>
											</div>
										</div>
									</div>
									<h1 class="display-5 mt-1 mb-3">
									    <?php
									        $sql="SELECT COUNT(*) AS c FROM teach_subj WHERE tid='$tid'";
									        $row=mysqli_fetch_assoc(mysqli_query($conn,$sql));
									        $row['c']=1;
									        echo $row['c'];
									    ;?>
									</h1>
								</div>
							</div>
						</div>
					</div>

				

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-body">
								    Batch Remander (15 Days)
								    <hr>
								    <div style="overflow-x:auto;">
									<table id="datatables-basic" class="table table-striped" style="width:100%">
										<thead>
											<tr>
											    <th>S. No</th>
												<th>Batch Name</th>
												<th>Batch Source</th>
												<th>Hatching Date</th>
												<th>Dispatch Date</th>
												<th>Variety (price/dfls)</th>
												<th>Sales Reports</th>
											</tr>
										</thead>
										<tbody>
										<?php include 'includes/config.php'; ?>
										<?php
                                            $user1 = $_SESSION['id'];
                                            $sql = "SELECT * FROM batches WHERE user_id='$user1' ORDER BY id DESC;";
                                            $result = mysqli_query($conn, $sql);
                                            $resultCheck = mysqli_num_rows($result);
                                            if ($resultCheck > 0)
                                            {
                                                $i=1;
                                                while ($row = mysqli_fetch_assoc($result))
                                                {
                                                    $bid=$row['id'];
                                                    $dd=date_create($row['dispatchdate']);
                                                    $cd=date_create(date("Y-m-d"));
                                                    $diff=date_diff($dd,$cd);
                                                    $d=$diff->format("%R%a");
                                                    if($d<15||$d>30)
                                                        continue;
                                                   
                                                    ?>
										
											<tr>
											    <td><?php echo $i;$i=$i+1;?></td>
												<td><?php echo $row['name']; ?></td>
												<td><?php echo $row['b_source']; ?></td>
												<td><?php echo $row['hatch_date']; ?></td>
												<td><?php echo $row['dispatchdate']; ?></td>
												<td><?php echo $row['variety'].'<br>(₹ '.$row['var_price'].')'; ?></td>
												
											
												<td>
												    <form method="post" action="report-batches">
												            <input type="hidden" name="bid" value="<?php echo $bid;?>">
												            <input type="hidden" name="bname" value="<?php echo $row['name'];?>">
												            <button type="submit" class="btn btn-primary" name="att_report" value="">Sales Report</button>
												    </form>
												</td>
												
											</tr>
											
										<?php
                                                }
                                            } 
                                        ?>
									
										</tbody>	
									</table>
									</div>
								</div>
							</div>
						</div>

					</div>

				</div>
			</main>
			<?php include 'includes/footer.php';?>
		</div>

	</div>

	<svg width="0" height="0" style="position:absolute">
		<defs>
			<symbol viewBox="0 0 512 512" id="ion-ios-pulse-strong">
				<path
					d="M448 273.001c-21.27 0-39.296 13.999-45.596 32.999h-38.857l-28.361-85.417a15.999 15.999 0 0 0-15.183-10.956c-.112 0-.224 0-.335.004a15.997 15.997 0 0 0-15.049 11.588l-44.484 155.262-52.353-314.108C206.535 54.893 200.333 48 192 48s-13.693 5.776-15.525 13.135L115.496 306H16v31.999h112c7.348 0 13.75-5.003 15.525-12.134l45.368-182.177 51.324 307.94c1.229 7.377 7.397 11.92 14.864 12.344.308.018.614.028.919.028 7.097 0 13.406-3.701 15.381-10.594l49.744-173.617 15.689 47.252A16.001 16.001 0 0 0 352 337.999h51.108C409.973 355.999 427.477 369 448 369c26.511 0 48-22.492 48-49 0-26.509-21.489-46.999-48-46.999z">
				</path>
			</symbol>
		</defs>
	</svg>
	<script src="assets/js/app.js"></script>
    <?php
    $year=date("Y");
    $i=1;
    $v1=array();
    $v2=array();
    $v3=array();
    $v4=array();
    $v5=array();
    $v6=array();
    while($i<=12)
    {
        if($i<=9)
            $m='0'.$i;
        else
            $m=$i;
        $date=$year.'-'.$m;
        if($i<9)
            $m1='0'.($i+1);
        else
            $m1=$i+1;
        $date1=$year.'-'.$m1;
        
        $sql="SELECT COUNT(id) AS c FROM invoices WHERE user_id='$uid' AND variety='BI-VOLTINE(D.H)' AND order_date>='$date' AND order_date<='$date1'";
        $row=mysqli_fetch_assoc(mysqli_query($conn,$sql));
        $v1[$i]=$row['c'];
        
        $sql="SELECT COUNT(id) AS c FROM invoices WHERE user_id='$uid' AND variety='C.B GOLD' AND order_date>='$date' AND order_date<='$date1'";
        $row=mysqli_fetch_assoc(mysqli_query($conn,$sql));
        $v2[$i]=$row['c'];
        
        $sql="SELECT COUNT(id) AS c FROM invoices WHERE user_id='$uid' AND variety='CSR 2 SEED P1' AND order_date>='$date' AND order_date<='$date1'";
        $row=mysqli_fetch_assoc(mysqli_query($conn,$sql));
        $v3[$i]=$row['c'];
        
        $sql="SELECT COUNT(id) AS c FROM invoices WHERE user_id='$uid' AND variety='FC1 X FC2 SEED' AND order_date>='$date' AND order_date<='$date1'";
        $row=mysqli_fetch_assoc(mysqli_query($conn,$sql));
        $v4[$i]=$row['c'];
        
        $sql="SELECT COUNT(id) AS c FROM invoices WHERE user_id='$uid' AND variety='PURE MYSORE P1' AND order_date>='$date' AND order_date<='$date1'";
        $row=mysqli_fetch_assoc(mysqli_query($conn,$sql));
        $v5[$i]=$row['c'];
        
        $sql="SELECT COUNT(id) AS c FROM invoices WHERE user_id='$uid' AND variety='PURE MYSORE P2' AND order_date>='$date' AND order_date<='$date1'";
        $row=mysqli_fetch_assoc(mysqli_query($conn,$sql));
        $v6[$i]=$row['c'];
        
        $i=$i+1;
    }
	echo '<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Line chart
			new Chart(document.getElementById("chartjs-dashboard-line"), {
				type: "line",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: 
					[   
					    {
							label: "BI-VOLTINE(D.H)",
							fill: false,
							backgroundColor: window.theme.primary,
							borderColor: window.theme.primary,
							borderWidth: 2,
							data: ['.$v1[1].','.$v1[2].','.$v1[3].','.$v1[4].','.$v1[5].','.$v1[6].','.$v1[7].','.$v1[8].','.$v1[9].','.$v1[10].','.$v1[11].','.$v1[12].']
						},
						{
							label: "C.B GOLD",
							fill: false,
							backgroundColor: "red",
							borderColor: "red",
							borderWidth: 2,
							data: ['.$v2[1].','.$v2[2].','.$v2[3].','.$v2[4].','.$v2[5].','.$v2[6].','.$v2[7].','.$v2[8].','.$v2[9].','.$v2[10].','.$v2[11].','.$v2[12].']
						},
						{
							label: "CSR 2 SEED P1",
							fill: false,
							backgroundColor: "purple",
							borderColor: "purple",
							borderWidth: 2,
							data: ['.$v3[1].','.$v3[2].','.$v3[3].','.$v3[4].','.$v3[5].','.$v3[6].','.$v3[7].','.$v3[8].','.$v3[9].','.$v3[10].','.$v3[11].','.$v3[12].']
						},
						{
							label: "FC1 X FC2 SEED",
							fill: false,
							backgroundColor: "green",
							borderColor: "green",
							borderWidth: 2,
							data: ['.$v4[1].','.$v4[2].','.$v4[3].','.$v4[4].','.$v4[5].','.$v4[6].','.$v4[7].','.$v4[8].','.$v4[9].','.$v4[10].','.$v4[11].','.$v4[12].']
						},
						{
							label: "PURE MYSORE P1",
							fill: false,
							backgroundColor: "yellow",
							borderColor: "yellow",
							borderWidth: 2,
							data: ['.$v5[1].','.$v5[2].','.$v5[3].','.$v5[4].','.$v5[5].','.$v5[6].','.$v5[7].','.$v5[8].','.$v5[9].','.$v5[10].','.$v5[11].','.$v5[12].']
						},
						{
							label: "PURE MYSORE P2",
							fill: false,
							backgroundColor: "black",
							borderColor: "black",
							borderWidth: 2,
							data: ['.$v6[1].','.$v6[2].','.$v6[3].','.$v6[4].','.$v6[5].','.$v6[6].','.$v6[7].','.$v6[8].','.$v6[9].','.$v6[10].','.$v6[11].','.$v6[12].']
						}
					]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: true
					},
					tooltips: {
						intersect: false
					},
					hover: {
						intersect: true
					},
					plugins: {
						filler: {
							propagate: false
						}
					},
					elements: {
						point: {
							radius: 0
						}
					},
					scales: {
						xAxes: [{
							reverse: true,
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}],
						yAxes: [{
							ticks: {
								stepSize: 5
							},
							display: true,
							gridLines: {
								color: "rgba(0,0,0,0)",
								fontColor: "#fff"
							}
						}]
					}
				}
			});
		});
	</script>';
	;?>
	
		<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Datatables basic
			$('#datatables-basic').DataTable();
			// Datatables with Buttons
			var datatablesButtons = $('#datatables-buttons').DataTable({
				lengthChange: !1,
				buttons: ["copy", "print"],
				responsive: true
			});
			datatablesButtons.buttons().container().appendTo("#datatables-buttons_wrapper .col-md-6:eq(0)")
		});
	</script>

</body>

</html>