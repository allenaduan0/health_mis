<!DOCTYPE html>
<html lang="en">


<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="<?= BASE_URL ?>assets/img/logo.png">
	<title>Patient</title>

	<!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/bower_components/bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/bower_components/dataTables.bootstrap4.min.css"> 


    <!-- OUR CUSTOM CSS-->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">

	<!-- JS CDN  -->
    <script type="text/javascript" src="<?= BASE_URL ?>assets/bower_components/jquery3.min.js"></script>
    <script type="text/javascript" src="<?= BASE_URL ?>assets/bower_components/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?= BASE_URL ?>assets/bower_components/bootstrap4.min.js"></script>
    <script type="text/javascript" src="<?= BASE_URL ?>assets/bootstrap4/bootstrap4.min.js"></script>


</head>

<body>
	<div class="navbar-title"><a href="../dashboard.php">HEALTH CENTER MANAGEMENT SYSTEM</a></div>
	<div class="wrapper ">

		<?php
		    $page = 'patient';
		    // include 'bars/sidebar.php';
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

                                <?php if($_SESSION['user_type'] == "Admin" || $_SESSION['user_type'] == "Nurse" || $_SESSION['user_type'] == "Midwife"): ?>
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
					<h5 class="navbar-header-text">Patient List</h5>
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
				<div class="container-fluid-patient">
					<div class="d-flex justify-content-between mb-2">
						<a href="<?= BASE_URL ?>add_patient" class="btn btn-primary rounded-md px-3 py-2" title="Register patient">
							<i class="fa fa-plus"></i>
							<span>Register patient</span>
						</a>
					</div>
					<div class="shadow card">
						<div class="py-3 card-header">
							<p class="m-0 text-primary font-weight-normal">Patient List</p>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table id="dataTable" class="table table-bordered table-hover" style="width:100%">
									<thead>
										<tr>
											<th>Patient ID</th>
											<th>Name</th>
											<th>Age</th>
											<th>Contact</th>
											<th>Address</th>
											<th>Birthday</th>
											<th>Gender</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
                                        <?php foreach($patients AS $row): ?>
                                                <tr>
                                                    <td><?php 
                                                        if (($row['id']) <= 9) {
														    echo '202303000', $row['id'];
                                                        }elseif (($row['id']) <= 99) {
                                                            echo '20230300', $row['id'];
                                                        }elseif (($row['id']) <= 999) {
                                                            echo '2023030', $row['id'];
                                                        }else {
                                                            echo '202303', $row['id'];
                                                        }  ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['f_name'], ' ', $row['l_name'] ?>
                                                    </td>
                                                    <td><?php
                                                        $dateofbirth = $row['bday'];
                                                        $today = date("Y-m-d");
                                                        $diff = date_diff(date_create($dateofbirth), date_create($today));
                                                        echo $diff->format('%y');

                                                        $age = $diff->format('%y');
                                                        if ($age > 1) {
                                                            echo ' years old';
                                                        } else {
                                                            echo ' year old';
                                                        }  ?>
                                                    </td>
                                                    <td><?= $row['contact'] ?></td>
                                                    <td><?= $row['address'] ?></td>
                                                    <td><?= $row['bday'] ?></td>
                                                    <td><?= $row['gender'] ?></td>
                                                    <td>
                                                        <?php if (isset($_SESSION["loggedin"])) { ?>
                                                        <?php } ?>
                                                        <a 
                                                            type="button" 
                                                            class="btn text-light btn-sm update" 
                                                           
                                                            href="<?= BASE_URL ?>patient_info/<?= $row['id'] ?>" 
                                                          
                                                            title="View" 
                                                            style="background-color:#3895D3;"
                                                        >
                                                            <i class="fas fa-eye"></i>
                                                            <span class="mobile-icon-only">View</span>
                                                        </a>

                                                    </td>
                                                </tr>
                                        <?php endforeach; ?>
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php //  include '../includes/footer.php'; ?>
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
				searchPlaceholder: "Search patient"
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
</body>

</html>