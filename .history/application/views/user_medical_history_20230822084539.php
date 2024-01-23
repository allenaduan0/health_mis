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
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/dashboard.css">

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

                                <li class="<?php if ($page == 'appointment') { echo 'active'; } ?>">
                                    <a href="<?= BASE_URL ?>create_appointment">
                                        Apply Appointment
                                    </a>
                                </li>

                                <li class="<?php if ($page == 'appointment_list') { echo 'active'; } ?>">
                                    <a href="<?= BASE_URL ?>user_appointment">
                                        My Appointments
                                    </a>
                                </li>

                                <li class="<?php if ($page == 'medical_records') { echo 'active'; } ?>">
                                    <a href="<?= BASE_URL ?>user_med_history">
                                        View Medical Records
                                    </a>
                                </li>
                            
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
					<h5 class="navbar-header-text">Medical History</h5>
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
					<?php // include 'bars/top_navbar.php'; ?>
				</nav>

				<!--MAIN CONTENT-->
				<div class="container-fluid-patient">
					<!-- <div class="d-flex justify-content-between mb-2">
						<a href="add_patient_for_user.php" class="btn btn-primary rounded-md px-3 py-2" title="Register patient">
							<i class="fa fa-plus"></i>
							<span>Register patient</span>
						</a>
					</div> -->
					<div class="shadow card">
						<div class="py-3 card-header">
							<p class="m-0 text-primary font-weight-normal">Medical History</p>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table id="dataTable" class="table table-bordered table-hover" style="width:100%">
									<thead>
										<tr>
											<th>Record ID</th>
											<th>Findings</th>
											<th>Prescription</th>
											<th>Description</th>
                                            <th>Date</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($med_record AS $fetch): ?>
											<tr>
												<td><?= $fetch['medical_records_id'] ?></td>
                                                <td><?= $fetch['findings'] ?></td>
                                                <td><?= $fetch['prescription'] ?></td>
                                                <td><?= $fetch['description'] ?></td>
                                                <td> <?php
                                                        $source =  $fetch['date_created'];
                                                        $date = new DateTime($source);
                                                        echo $date->format('F d\, Y');
                                                    ?>
                                                </td>
												
											</tr>

										<?php
										endforeach
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php include '../includes/footer.php'; ?>
		</div>
	</div>

	<!--Icon-->
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js "></script>
        <!-- DATA TABLE -->
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"> </script>
        <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"> </script>
        <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
        <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"> -->
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>

	<script>
		$('#dataTable').dataTable({
                processing: true,
                // serverSide: true,
                // ajax: "patient_list.inc.php",
                lengthMenu: [10, 5, 10, 25, 50, 100],
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search History"
                },
                columnDefs: [{
                    'targets': [4],
                    'orderable': false,
                }],
                "order": [
                    [0, "desc"]
                ],
                dom: 'Blfrtip',
                // dom: 'Bfrtip',
                buttons: [{
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4] //Your Column value those you want
                        },
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4] //Your Column value those you want
                        },
                    }, {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4] //Your Column value those you want
                        },
                        customize: function(win) {
                            $(win.document.body)
                                .css('font-size', '10pt')

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        },

                    },
                ]

            });
	</script>
</body>

</html>