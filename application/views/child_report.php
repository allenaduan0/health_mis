<!DOCTYPE html>
<html lang="en">


<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="<?= BASE_URL ?>assets/img/logo.png">
	<title>Child record</title>

	<!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/bower_components/bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/bower_components/dataTables.bootstrap4.min.css"> 

    <!-- OUR CUSTOM CSS-->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">

	<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script> -->

	<!-- JS CDN  -->
    <script type="text/javascript" src="<?= BASE_URL ?>assets/bower_components/jquery3.min.js"></script>
    <script type="text/javascript" src="<?= BASE_URL ?>assets/bower_components/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?= BASE_URL ?>assets/bower_components/bootstrap4.min.js"></script>
    <script type="text/javascript" src="<?= BASE_URL ?>assets/bootstrap4/bootstrap4.min.js"></script>

</head>

<body>
	<div class="navbar-title"><a href="<?= BASE_URL ?>">HEALTH CENTER MANAGEMENT SYSTEM</a></div>
	<div class="wrapper ">

		<?php
		$page = 'child-report';
		    //include 'bars/sidebar.php';
		?>
            <nav id="sidebar" class="printccs">
                <div class="adminsidebar">
                    <div class="p-0 container-fluid d-flex flex-column">
                        <a href="dashboard.php">
                            <div class="sidebar-header">
                                <img src="<?= BASE_URL ?>assets/img/logo.png" alt="logo-sidebar">
                            </div>
                        </a>
                        <div class="sidebar_nav" id="collapsibleNavbar">
                            <ul class="list-unstyled components">
                                <li class="<?php if ($page == 'dashboard') { echo 'active';} ?>">
                                    <a href="<?= BASE_URL ?>main_controller">
                                        Dashboard
                                    </a>
                                </li>

                                <?php if($_SESSION['user_type'] == "Admin"): ?>
                                <li class="<?php if ($page == 'patient') { echo 'active'; } ?>">
                                    <a href="<?= BASE_URL ?>patient">
                                        Patient
                                    </a>
                                </li>
                                <?php endif ?>


                                <?php if($_SESSION['user_type'] == "Admin"): ?>
                                <li class="<?php if ($page == 'nurse') { echo 'active'; } ?>">
                                    <a href="<?= BASE_URL ?>nurse">
                                        Nurse
                                    </a>
                                </li>
                                <?php endif ?>


                                <?php if($_SESSION['user_type'] == "Admin" || $_SESSION['user_type'] == "Nurse" || $_SESSION['user_type'] == "Midwife" || $_SESSION['user_type'] == "Health worker"): ?>
                                <li class="<?php if ($page == 'appointment') { echo 'active'; } ?>">
                                    <a href="<?= BASE_URL ?>appointment">
                                        Appointment
                                    </a>
                                </li>
                                <?php endif ?>


                                <?php if($_SESSION['user_type'] == "Admin"): ?>
                                <li class="<?php if ($page == 'queue') { echo 'active'; } ?>">
                                    <a href="<?= BASE_URL ?>queue_list">
                                        Patient Queue
                                    </a>
                                </li>
                                <?php endif ?>


                                <?php if($_SESSION['user_type'] == "Admin"): ?>
                                <li class="<?php if ($page == 'consult') { echo 'active'; } ?>">
                                    <a href="<?= BASE_URL ?>consultation">
                                        Consultation
                                    </a>
                                </li>
                                <?php endif ?>


                                <?php if($_SESSION['user_type'] == "Admin"): ?>
                                <li class="<?php if ($page == 'child-report') { echo 'active'; } ?>">
                                    <a href="<?= BASE_URL ?>child_report">
                                        Child Record
                                    </a>
                                </li>
                                <?php endif ?>


                                <?php if($_SESSION['user_type'] == "Admin"): ?>
                                <li class="<?php if ($page == 'medicine') { echo 'active'; } ?>">
                                    <a href="<?= BASE_URL ?>medicine">
                                        Medicine and supplements
                                    </a>
                                </li>
                                <?php endif ?>


                                <?php if($_SESSION['user_type'] == "Admin"): ?>
                                <li class="<?php if ($page == 'reports') { echo 'active'; } ?>">
                                    <a href="<?= BASE_URL ?>reports">
                                        Reports
                                    </a>
                                </li>
                                <?php endif ?>


                                <?php if($_SESSION['user_type'] == "Admin"): ?>
                                <li class="<?php if ($page == 'settings') { echo 'active'; } ?>">
                                    <a href="<?= BASE_URL ?>settings">
                                        Settings
                                    </a>
                                </li>
                                <?php endif ?>


                                <?php if($_SESSION['user_type'] == "Health worker"): ?>
                                <li class="<?php if ($page == 'activity') { echo 'active'; } ?>">
                                    <a href="<?= BASE_URL ?>worker_activity">
                                        Activity
                                    </a>
                                </li>
                                <?php endif ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
		<div class="d-flex flex-column" id="content-wrapper">

			<!--CONTENT-->
			<div class="content">

				<!--TOP NAVBAR/ HEADER-->
				<nav class="navbar navbar-expand-lg navbar-light bg-light top-header">
					<button type="button" id="sidebarCollapse" class="btn menu-btn">
						<i class="fa fa-align-justify"> </i>
					</button>
					<h5 class="navbar-header-text">Child Record</h5>
					<?php // include 'bars/top_navbar.php'; ?>
					<li class="ml-auto nav-item dropdown printccs">
                            <div class="nav-item dropdown ">
                                <a class="nav-link " data-toggle="dropdown" aria-expanded="false" href="#">
                                <b>ROLE:</b>
                                    <span class="mr-2 d-none d-lg-inline ">
                                        <?php 
                                           echo $_SESSION['user_type']
                                        ?>
                                    </span>
                                    <ion-icon name="caret-down-outline"></ion-icon>

                                </a>

                                <div class="shadow dropdown-menu dropdown-menu-right animated--grow-in">
                                    <form action="<?= BASE_URL ?>logout" method="POST">
                                        <button class="border-0 dropdown-item" name="logout" type="submit">
                                            <ion-icon name="log-out-outline"></ion-icon> Logout
                                        </button>
                                    </form>
                                </div>

                            </div>
                        </li>
				</nav>

				<!--MAIN CONTENT-->
				<div class="container-fluid-child pb-5">
					<div class='my-3'>
						<div class="d-flex justify-content-between mb-2">
						<a href="<?= BASE_URL ?>add_child" class="btn btn-primary rounded-md px-3 py-2" title="Add User">
							<i class="fa fa-plus"></i>
							<span>Add record</span>
						</a>
						</div>
					</div>
					<div class="shadow card">
						<div class="py-3 card-header">
							<p class="m-0 text-primary font-weight-normal">Child Record List</p>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table id="dataTable" class="table table-bordered table-hover" style="width:100%">
									<thead>
										<tr>
											<th>Record ID</th>
											<th>Child Name</th>
											<th>Gender</th>
											<th>Age</th>
											<th>Stage of life</th>
											<th>Contact</th>
											<th>Address</th>
											<th>Birth date</th>
											<th>Vaccine</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($child_data AS $fetch) : ?>
											<tr>
												<td><?php if (($fetch['id']) <= 9) {
														// echo 'PTNT-0', $fetch['id'];
														echo 'CHLD-000', $fetch['id'];
													} elseif (($fetch['id']) <= 99) {
														echo 'CHLD-00', $fetch['id'];
													} elseif (($fetch['id']) <= 999) {
														echo 'CHLD-0', $fetch['id'];
													} else {
														echo 'CHLD-', $fetch['id'];
													}  ?></td>
												<td><?= $fetch['child_fname'], ' ', $fetch['child_lname'] ?></td>
												<td><?= $fetch['gender'] ?></td>
												<td><?php
													$dateofbirth = $fetch['bday'];
													$today = date("Y-m-d");
													$diff = date_diff(date_create($dateofbirth), date_create($today));
													echo  $diff->format('%y');
													$age = $diff->format('%y');
													if ($age > 1) {
														echo ' years old';
													} else {
														echo ' year old';
													}  ?></td>
													<td>
													<?php
													$dateofbirth = $fetch['bday'];
													$today = date("Y-m-d");
													$diff = date_diff(date_create($dateofbirth), date_create($today));
													$age = $diff->format('%y');
													if ($age <= 1) {
														echo "Infant";
													} elseif ($age >= 2 && $age <= 3) {
														echo "Toddler";
													} elseif ($age >= 4 && $age <= 12) {
														echo "Child";
													} elseif ($age >= 13 && $age <= 19) {
														echo "Teenager";
													} elseif ($age >= 20 && $age <= 64) {
														echo "Adult";
													} else {
														echo "Senior";
													}  ?>
													</td>
												<td><?= $fetch['contact_no'] ?></td>
												<td><?= $fetch['citymunicipality_name'], ', ', $fetch['province_name'] ?></td>
												<td><?= date('F j, Y', strtotime($fetch['bday'])) ?></td>
												<td><?= $fetch['vaccination']; ?></td>
											</tr>

										<?php endforeach ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="d-flex justify-content-between py-4">
							<button id="print" class="btn btn-primary rounded-md px-3 py-2" onclick="printTable()">Print</button>
						</div>
				</div>
			</div>
			<?php // include '../includes/footer.php'; ?>
		</div>
	</div>

	<script>
		$('#dataTable').dataTable({
			// processing: true,
			// serverSide: true,
			// ajax: "pet_list.inc.php",
			lengthMenu: [10, 5, 10, 25, 50, 100],
			language: {
				search: "_INPUT_",
				searchPlaceholder: "Search child"
			},
			//Disable Action sorting (yung arrow up and down)
			columnDefs: [{
				'targets': [5], //ACTION BUTTON
				/* column index */
				'orderable': false,
				/* true or false */
			}],
			"order": [
				[0, "desc"]
			]
		});
	</script>
	<script>
		function printTable() {
			// Get the table element
			var table = document.querySelector("table");

			// Create a new window for the printout
			var win = window.open('', 'Print', 'height=600,width=800');

			// Write the table HTML to the new window
			win.document.write('<html><head><title>Child report - Print</title></head><body>');
			win.document.write('<style>');
			win.document.write('table {border-collapse: collapse;width: 100%;}');
			win.document.write('th, td {font-size: 12px;border: 1px solid #ddd;padding: 6px;text-align: left;}');
			win.document.write('th {background-color: #f2f2f2;}');
			win.document.write('tr:nth-child(even) {background-color: #f2f2f2;}');
			win.document.write('tr:hover {background-color: #ddd;}');
			win.document.write('h1 {text-align:center;font-size:24px;font-weight:bold;margin-bottom:16px;}');
			win.document.write('</style></head><body>');
			win.document.write('<h1>Child report</h1>');
			win.document.write(table.outerHTML);
			win.document.write('</body></html>');

			// Print the window
			win.print();

			// Close the window
			win.close();
		}
	</script>
</body>

</html>