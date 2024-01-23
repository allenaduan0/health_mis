<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" href="<?= BASE_URL ?>assets/img/logo.png">
		<title>Medicine and supplements</title>

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

        <script> var base_url = '<?= BASE_URL ?>'; </script>
        <script type="text/javascript" src="<?= BASE_URL ?>assets/js/main.js"></script>

	</head>

	<body>
		<div class="navbar-title"><a href="<?= BASE_URL ?>">HEALTH CENTER MANAGEMENT SYSTEM</a></div>
		<div class="wrapper ">

			<?php
			$page = 'medicine';
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


                                <?php if($_SESSION['user_type'] == "Admin" || $_SESSION['user_type'] == "Nurse" || $_SESSION['user_type'] == "Midwife"): ?>
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
						<h5 class="navbar-header-text">Medicine and supplements</h5>
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
					<div class="container-fluid-medicine">
						<div class="shadow card">
							<div class="py-3 card-header">
								<div class="row">
									<div class="col-12">
										<p class="m-0 text-primary font-weight-normal">Medicine and supplements List</p>
									</div>

								</div>
							</div>
							<div class="card-body">
								<!-- ADMIN -->
								<?php // if (isset($_SESSION["loggedin"]) && ($_SESSION["utadmin"])) { ?>
									<div class='add_user-class'>
										<a href="<?= BASE_URL ?>add_product" class="btn btn-primary btn-sm" title="Add product">
											<i class="fa fa-plus"></i>
											<span>Add Product</span>
										</a>
									</div>
									<div class="row">
										<div class="mt-1 table-responsive">
											<table id="dataTable" class="table table-bordered table-hover" style="width:100%">
												<thead>

													<tr>
														<th class="align-middle">Product ID</th>
														<th class="align-middle">Name</th>
														<th class="align-middle">Stocks</th>
														<th class="align-middle">Description</th>
                                                        <th class="align-middle">Details</th>
                                                        <th class="align-middle">Exp Date</th>
														<th class="align-middle">Date</th>
                                                        
														<th class="align-middle">Action </th>
													</tr>
												</thead>
												<tbody>
													<?php foreach($medicine_list AS $fetch): ?>
														<tr>
															<td><?php if (($fetch['product_id']) <= 9) {
																	echo 'ITM-000', $fetch['product_id'];
																} elseif (($fetch['product_id']) <= 99) {
																	echo 'ITM-00', $fetch['product_id'];
																} elseif (($fetch['product_id']) <= 999) {
																	echo 'ITM-0', $fetch['product_id'];
																} else {
																	echo 'ITM-', $fetch['product_id'];
																}  ?></td>

															<td><?php echo $fetch['product_name'] ?></td>
															<td>
																<div class="<?php if ($fetch['quantity_on_hand']  <= '10') {
																				echo "text-danger";
																			} elseif ($fetch['quantity_on_hand'] <= '30') {
																				echo "text-warning";
																			} else {
																				echo "text-success";
																			} ?>">
																	<?php echo $fetch['quantity_on_hand']  ?> </div>
															</td>
															<td style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:1px;"><?= $fetch['description']; ?></td>
                                                            <td style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:1px;"><?= $fetch['details']; ?></td>
                                                            <td><?php
																$exp_date = $fetch['exp_date'];
																echo date("F d, Y", strtotime($exp_date)) ?></td>
															<td><?php
																$date_table = $fetch['date_added'];
																echo date("F d, Y", strtotime($date_table)) ?></td>
															<td>
                                                            
																<button 
                                                                    class="btn btn-orange text-light btn-sm action-btn" 
                                                                    data-toggle="modal" 
                                                                    data-target="#addstock<?= $fetch['product_id'] ?>" 
                                                                    data-toggle-title="tooltip" 
                                                                    data-placement="bottom" 
                                                                    title="Add Stock"
                                                                >
																	<i class="fa fa-pencil">Update</i>
																</button>
																<button 
                                                                    class="btn text-light btn-sm action-btn" 
                                                                    data-toggle="modal" 
                                                                    data-target="#view-info<?= $fetch['product_id']; ?>" 
                                                                    data-toggle-title="tooltip" 
                                                                    data-placement="bottom" 
                                                                    title="View Information" 
                                                                    style="background-color:#3895D3;"
                                                                >
																	<i class="fa fa-eye">View</i>
																</button>
																<button 
                                                                    class="btn text-light btn-sm action-btn" 
                                                                    data-toggle="modal" 
                                                                    data-target="#deletestock<?= $fetch['product_id'] ?>" 
                                                                    data-toggle-title="tooltip" 
                                                                    data-placement="bottom" 
                                                                    title="Delete Stock" 
                                                                    style="background-color:#eb2632;"
                                                                >
																	<i class="fa fa-trash">Delete</i>
																</button>
															</td>

														</tr>

                                                        <div class="modal fade" id="addstock<?= $fetch['product_id']; ?>" aria-hidden="true" tabindex="-1" aria-labelledby="addstock">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class=" modal-content bg-light">
                                                                    <form method="POST" onsubmit="event.preventDefault(); update_stocks(<?= $fetch['product_id'] ?>)">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Add <?php if (($fetch['product_id']) <= 9) {
                                                                                                            // echo 'PTNT-0', $fetch['id'];
                                                                                                            echo 'ITM-000', htmlspecialchars($fetch['product_id']);
                                                                                                        } elseif (($fetch['product_id']) <= 99) {
                                                                                                            echo 'ITM-00', htmlspecialchars($fetch['product_id']);
                                                                                                        } elseif (($fetch['product_id']) <= 999) {
                                                                                                            echo 'ITM-0', htmlspecialchars($fetch['product_id']);
                                                                                                        } else {
                                                                                                            echo 'ITM-', htmlspecialchars($fetch['product_id']);
                                                                                                        }  ?> Stock</h5>
                                                                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                                                        </div>
                                                                        <div class="ml-3 mr-3 modal-body ml-xl-5 mr-xl-5 mr-lg-5 ml-lg-5 mr-sm-3 ml-sm-3 ml-md-3 mr-md-3">
                                                                            <div class="form-group">
                                                                                <input type="hidden" id="stockid_<?= $fetch['product_id'] ?>" name="stockid" value="<?php echo htmlspecialchars($fetch['product_id']); ?>">
                                                                                <input type="hidden" id="prodname_<?= $fetch['product_id']; ?>" name="prodname" value="<?php echo $fetch['product_name']; ?>">
                                                                                <input type="hidden" id="prod_quantity_<?= $fetch['product_id']; ?>" name="prod_quantity" value="<?php echo $fetch['quantity_on_hand']; ?>">
                                                                            </div>
                                                                            <div class="mt-2 form-group">
                                                                                <label for="prod_quantity">Stock<span class="text-danger"> * </span> </label>
                                                                                <input class="form-control" type="number" min="0" placeholder="Enter Number of New Stock" id="add_stock_<?= $fetch['product_id']; ?>" name="add_stock" required="required">
                                                                            </div>
                                                                        </div>
                                                                        <div style="clear:both;"></div>
                                                                        <div class="modal-footer">
                                                                            <button class="btn btn-outline-secondary" type="button" data-dismiss="modal"> Close</button>
                                                                            <button name="add" class="btn btn-primary">Add Stock</button>
                                                                        </div>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>


                                                        <div class="modal fade" id="view-info<?= $fetch['product_id']; ?>" tabindex="-1" aria-labelledby="view-info" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"><?php if (($fetch['product_id']) <= 9) {
                                                                                                        echo 'ITM-000', htmlspecialchars($fetch['product_id']);
                                                                                                    } elseif (($fetch['product_id']) <= 99) {
                                                                                                        echo 'ITM-00', htmlspecialchars($fetch['product_id']);
                                                                                                    } elseif (($fetch['product_id']) <= 999) {
                                                                                                        echo 'ITM-0', htmlspecialchars($fetch['product_id']);
                                                                                                    } else {
                                                                                                        echo 'ITM-', htmlspecialchars($fetch['product_id']);
                                                                                                    }  ?> </h5>
                                                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                                                    </div>
                                                                    <div class="mt-3 mb-3 ml-5 mr-5 modal-body">
                                                                    <div class="mb-2 row ">
                                                                            <div class="col-5">
                                                                                <div class="mb-2 text-right text-secondary">Batch Date</div>
                                                                            </div>
                                                                            <div class="col-7">
                                                                            <?php
                                                                            $date_table = $fetch['date_added'];
                                                                                echo date("F d, Y", strtotime($date_table)) ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-2 row ">
                                                                            <div class="col-5">
                                                                                <div class="mb-2 text-right text-secondary">Product ID</div>
                                                                            </div>
                                                                            <div class="col-7">
                                                                                <?php if (($fetch['product_id']) <= 9) {
                                                                                        echo 'ITM-000', htmlspecialchars($fetch['product_id']);
                                                                                    } elseif (($fetch['product_id']) <= 99) {
                                                                                        echo 'ITM-00', htmlspecialchars($fetch['product_id']);
                                                                                    } elseif (($fetch['product_id']) <= 999) {
                                                                                        echo 'ITM-0', htmlspecialchars($fetch['product_id']);
                                                                                    } else {
                                                                                        echo 'ITM-', htmlspecialchars($fetch['product_id']);
                                                                                    }  ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-2 row ">
                                                                            <div class="col-5">
                                                                                <div class="mb-2 text-right text-secondary"> Product Category</div>
                                                                            </div>
                                                                            <div class="col-7">
                                                                                <?= htmlspecialchars($fetch['product_category']) ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-2 row ">
                                                                            <div class="col-5">
                                                                                <div class="mb-2 text-right text-secondary">Product Name</div>
                                                                            </div>
                                                                            <div class="col-7">
                                                                                <?= htmlspecialchars($fetch['product_name']) ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-2 row ">
                                                                            <div class="col-5">
                                                                                <div class="mb-2 text-right text-secondary">Stocks</div>
                                                                            </div>
                                                                            <div class="col-7">
                                                                                <div class="<?php if ($fetch['quantity_on_hand']  <= '10') {
                                                                                                    echo "text-danger";
                                                                                                } elseif ($fetch['quantity_on_hand'] <= '30') {
                                                                                                    echo "text-warning";
                                                                                                } else {
                                                                                                    echo "text-primary";
                                                                                                } ?>">
                                                                                    <?= htmlspecialchars($fetch['quantity_on_hand']) ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?php if (!empty($fetch['description'])) {
                                                                            ?>
                                                                            <div class="mb-2 row ">
                                                                                <div class="col-5">
                                                                                    <div class="mb-2 text-right text-secondary"> Product Description</div>
                                                                                </div>
                                                                                <div class="col-7">
                                                                                    <?= htmlspecialchars($fetch['description']) ?>
                                                                                </div>
                                                                            </div>
                                                                        <?php }
                                                                            ?>


                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="modal fade" id="deletestock<?= $fetch['product_id']; ?>" aria-hidden="true" tabindex="-1" aria-labelledby="addstock">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class=" modal-content bg-light">
                                                                    <form method="POST" onsubmit="event.preventDefault(); delete_stocks(<?= $fetch['product_id'] ?>)"">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Delete <?php if (($fetch['product_id']) <= 9) {
                                                                                                            // echo 'PTNT-0', $fetch['id'];
                                                                                                            echo 'ITM-000', htmlspecialchars($fetch['product_id']);
                                                                                                        } elseif (($fetch['product_id']) <= 99) {
                                                                                                            echo 'ITM-00', htmlspecialchars($fetch['product_id']);
                                                                                                        } elseif (($fetch['product_id']) <= 999) {
                                                                                                            echo 'ITM-0', htmlspecialchars($fetch['product_id']);
                                                                                                        } else {
                                                                                                            echo 'ITM-', htmlspecialchars($fetch['product_id']);
                                                                                                        }  ?> Stock</h5>
                                                                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                                                        </div>
                                                                        
                                                                        <input type="hidden" id="d_stockid_<?= $fetch['product_id'] ?>" name="stockid" value="<?= htmlspecialchars($fetch['product_id']); ?>">

                                                                        <div class="ml-3 mr-3 modal-body ml-xl-5 mr-xl-5 mr-lg-5 ml-lg-5 mr-sm-3 ml-sm-3 ml-md-3 mr-md-3">
                                                                            <p> Do you want to delete this item?</p>
                                                                            <button class="btn btn-outline-secondary col-md-4" type="button" data-dismiss="modal">No</button>
                                                                            <button name="delete" class="btn btn-danger col-md-4">Yes</button>
                                                                        </div>
                                                                        <div style="clear:both;"></div>
                                                                        <!-- <div class="modal-footer">
                                                                            <button class="btn btn-outline-secondary" type="button" data-dismiss="modal"> Close</button>
                                                                            <button name="add" class="btn btn-primary">Add Stock</button>
                                                                        </div> -->
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>



													<?php
														// include '../includes/modal/update_stock.php';
														// include '../includes/modal/add_stock.php';
														// include '../includes/modal/view_inventory_product.php';
														// include '../includes/modal/delete_stock.php';
													endforeach;
													?>
												</tbody>
												<tfoot>

												</tfoot>

											</table>
										</div>

									</div>
								<?php // } ?>
							</div>

						</div>
					</div>
				</div>

				<?php // include '../includes/footer.php'; ?>
			</div>
		</div>
		</div>

		<script>
			$('#dataTable').dataTable({
				lengthMenu: [10, 5, 10, 25, 50],
				language: {
					search: "_INPUT_",
					searchPlaceholder: "Search Product"
				},
				columnDefs: [{
					'targets': [4],
					'orderable': false,
				}],
				"order": [
					[1, "desc"]
				]
			});

			function delete_medicine() {
				$("#test_modal").modal("show")
			}
		</script>
	</body>

	</html>