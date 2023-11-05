<?php
    session_start();
    include "../../../connection.php";

    // Check if the 'username' session variable is set
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        // Now, $username contains the logged-in username.
    } else {
        // Redirect to the login page or take appropriate action if the user is not logged in.
        header("location: ../login.php");
        exit;
    }
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width,initial-scale=1,shrink-to-fit=no"
    />
    <title>ESS ACCOUNT</title>

      <meta content="" name="description">
      <meta content="" name="keywords">

    <link rel="icon" href="../../assets/icons/skystreamlogo.png">

    <?php
        include "../../../libraries/includes.php";
    ?>

    <link href="../../assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet"/>
    <link href="../../assets/css/icons.min.css" rel="stylesheet"/>
    <link href="../../assets/css/app.min.css" id="app-style" rel="stylesheet"/>
    <link href="../../css/style.css" rel="stylesheet"/>
    <script src="../../js/main.js" defer="defer" ></script>

  </head>
  <body class="app">
    <div>

        <?php 
            $sql = mysqli_query($conn, "SELECT * FROM essaccountstbl WHERE username = '" . $_SESSION['username'] . "'");
            $account = mysqli_num_rows($sql);
                if($account > 0){
                    while ($account = mysqli_fetch_array($sql)) {

                        # code...
        ?>
      <!-- #Left Sidebar ==================== -->
      <div class="sidebar">
        <div class="sidebar-inner">
          <!-- ### $Sidebar Header ### -->
          <div class="sidebar-logo">
            <div class="peers ai-c fxw-nw">
              <div class="peer peer-greed">
                <a class="sidebar-link td-n" href="../index.php"
                  ><div class="peers ai-c fxw-nw">
                    <div class="peer">
                      <div class="logo">
                        <img src="../../assets/icons/skystreamlogo.png" class="mt-2" style="height: 50px; width: 80px;"/>
                      </div>
                    </div>
                    <div class="peer peer-greed">
                      <h5 class="lh-1 mB-0 logo-text ms-4">MY ESS ACCOUNT</h5>
                    </div>
                  </div></a
                >
              </div>
              <div class="peer">
                <div class="mobile-toggle sidebar-toggle">
                  <a href="" class="td-n"
                    ><i class="ti-arrow-circle-left"></i
                  ></a>
                </div>
              </div>
            </div>
          </div>
          <!-- ### $Sidebar Menu ### -->
          <ul class="sidebar-menu scrollable pos-r">
            <li class="nav-item mT-30 actived">
              <a class="sidebar-link" href="../index.php"
                ><span class="icon-holder"
                  ><i class="c-blue-500 ti-home"></i> </span
                ><span class="title">Dashboard</span></a
              >
            </li>

            <li class="nav-item dropdown">
            <a class="dropdown-toggle" data-bs-toggle="collapse" href="#q1"
                ><span class="icon-holder"
                  ><i class="bi bi-clock-history"></i></span
                ><span class="title">Time and Attendance</span>
                <span class="arrow"><i class="ti-angle-right"></i></span
              ></a>
              <ul class="dropdown-menu" id="q1">
                <li><a class="sidebar-link" href="TimeAttendance.php">Time and Attendance</a></li>
                <li><a class="sidebar-link" href="Timesheet.php">Timesheet</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
            <a class="dropdown-toggle" data-bs-toggle="collapse" href="#q2"
                ><span class="icon-holder"
                  ><i class="bi bi-calendar-day"></i></span
                ><span class="title">Shift and Schedule</span>
                <span class="arrow"><i class="ti-angle-right"></i></span
              ></a>
              <ul class="dropdown-menu" id="q2">
                <li><a class="sidebar-link" href="ViewSandS.php">My Shift and Schedule</a></li>
                <li><a class="sidebar-link" href="ChangeSandS.php">Change Shift and Schedule</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
            <a class="dropdown-toggle" data-bs-toggle="collapse" href="#q3"
                ><span class="icon-holder"
                  > <i class="bi bi-arrow-counterclockwise"></i></span
                ><span class="title">Claims | Reimbursement</span>
                <span class="arrow"><i class="ti-angle-right"></i></span
              ></a>
              <ul class="dropdown-menu collapsed show" id="q3">
                <li><a class="sidebar-link" href="RequestClaims.php">Request Claims</a></li>
                <li><a class="sidebar-link actived" href="RequestReimbursement.php">Request Reimbursement</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
            <a class="dropdown-toggle" data-bs-toggle="collapse" href="#q4"
                ><span class="icon-holder"
                  > <i class="bi bi-box-arrow-left"></i></span
                ><span class="title">Request Leave</span>
                <span class="arrow"><i class="ti-angle-right"></i></span
              ></a>
              <ul class="dropdown-menu">
                <li><a class="sidebar-link" href="RequestLeave.php">Employee Leave</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
            <a class="dropdown-toggle" data-bs-toggle="collapse" href="#q5"
                ><span class="icon-holder"
                  ><i class="bi bi-cash-coin"></i></span
                ><span class="title">My Payroll</span>
                <span class="arrow"><i class="ti-angle-right"></i></span
              ></a>
              <ul class="dropdown-menu">
                <li><a class="sidebar-link" href="RequestPayroll.php">Request Payslip</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
            <a class="dropdown-toggle" data-bs-toggle="collapse" href="#q6"
                ><span class="icon-holder"
                  > <i class="bi bi-file-earmark-pdf-fill"></i></span
                ><span class="title">Request Documents</span>
                <span class="arrow"><i class="ti-angle-right"></i></span
              ></a>
              <ul class="dropdown-menu">
                <li><a class="sidebar-link" href="RequestDocument.php">Request Documents</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      <!-- #Main ============================ -->
      <div class="page-container">
        <!-- ### $Topbar ### -->
        <div class="header navbar">
          <div class="header-container">
            <ul class="nav-left">
              <li>
                <a
                  id="sidebar-toggle"
                  class="sidebar-toggle"
                  href="javascript:void(0);"
                  ><i class="ti-menu"></i
                ></a>
              </li>
              <li class="search-box">
                <a class="search-toggle no-pdd-right" href="javascript:void(0);"
                  ><i class="search-icon ti-search pdd-right-10"></i>
                  <i class="search-icon-close ti-close pdd-right-10"></i
                ></a>
              </li>
              <li class="search-input">
                <input
                  class="form-control"
                  type="text"
                  placeholder="Search..."
                />
              </li>
            </ul>
            <ul class="nav-right">
              <li class="notifications dropdown" style="margin-left: -50px;">
                <!-- <span class="counter bgc-red"></span> -->
                <a
                  href=""
                  class="dropdown-toggle no-after"
                  id="dropdownMenuButton1"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                  ><i class="ti-bell"></i
                ></a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li class="pX-20 pY-15 bdB">
                    <i class="ti-bell pR-10"></i>
                    <span class="fsz-sm fw-600 c-grey-900">Notifications</span>
                  </li>
                  <li>
                    <ul class="ovY-a pos-r scrollable lis-n p-0 m-0 fsz-sm">
                    </ul>
                  </li>
                  <li class="pX-20 pY-15 ta-c bdT">
                    <span
                      ><a href="#" class="c-grey-600 cH-blue fsz-sm td-n"
                        >View All Notifications
                        <i class="ti-angle-right fsz-xs mL-10"></i></a
                    ></span>
                  </li>
                </ul>
              </li>

              <li class="dropdown" style="margin-right: 50px;">
                <a
                  href=""
                  class="dropdown-toggle no-after peers fxw-nw ai-c lh-1"
                  data-bs-toggle="dropdown"
                  ><div class="peer mR-10">
                    <img
                      class="w-2r bdrs-50p"
                      src="https://randomuser.me/api/portraits/lego/4.jpg"
                      alt=""
                    />
                  </div>
                  <div class="peer">
                    <span class="fsz-sm c-grey-900"><?php echo "".$account['username']."";?></span>
                  </div></a
                >
                <ul class="dropdown-menu fsz-sm">
                  <li>
                    <a href="../ClientSide/accountSettings.php" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                        <i class="ti-settings mR-10"></i> <span>Setting</span>
                    </a>
                  </li>

                  <li>
                    <a href="../ClientSide/accountProfile.php" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                        <i class="ti-user mR-10"></i> <span>Profile</span>
                    </a>
                  </li>
                  <li role="separator" class="divider"></li>
                  <li>
                    <a href="../ClientSide/logout.php" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                        <i class="ti-power-off mR-10"></i> <span>Logout</span>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
        <!-- ### $App Screen Content ### -->
        <main class="main-content bgc-grey-100">
          <div id="mainContent">
            <div class="container-fluid">
              <h4 class="c-grey-900 mT-10 mB-30 fw-bold">REQUEST REIMBURSEMENT</h4>
                <div class="row gap-20">
                  <div class="col-md-12">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">

                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

                    <!-- ADD BUTTON -->
                    <div class="text-end mb-3">
                        <button type="submit" 
                                data-bs-toggle="modal" 
                                data-bs-target="#candr" 
                                class="btn btn-primary">
                            + Request Reimbursement
                        </button>
                    </div>

                    <!-- ADD MODAL -->
                    <div class="modal fade" id="candr" aria-labelledby="addSandQ" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title fw-bold">REQUEST REIMBURSEMENT</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form action="../ClientSide/EmployeeRequest/ClaimsReimbursementQuery.php" 
                                          method="POST"
                                          enctype="multipart/form-data">

                                        <input type="hidden" name="username" value="<?php echo $account['username'];?>">
                                        
                                        <div class="mb-4 row">
                                            <label for="" class="col-md-5 fw-bold">Proof to Reimburse</label>
                                            <div class="col-md-7">
                                                <input type="file"
                                                      class="form-control"
                                                      name="candr_file"
                                                      accept=".jpg, .jpeg, .png, .pdf, .docx, .doc"
                                                      required>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="" class="col-md-5 fw-bold">Types of Reimbursement</label>
                                            <div class="col-md-7">
                                            <input type="text" class="form-control" name="type" value="Reimbursement" readonly>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="" class="col-md-5 form-label fw-bold">Insert Details <br> - Describe The Item and Cost</label>
                                            <div class="col-md-7">
                                                <textarea class="form-control" 
                                                          name="note"
                                                          rows="5"></textarea>
                                            </div>
                                        </div> 

                                        <input type="hidden" name="status" value="Pending">
                                        <input type="hidden" name="emp" value="<?php echo $account['employeeID'];?>">
                                        <input type="hidden" name="name" value="<?php echo $account['ess_firstname'];?>&nbsp;<?php echo $account['ess_middlename'];?>&nbsp;<?php echo $account['ess_lastname'];?>">
                                        <input type="hidden" name="reqdate">

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" name="submit2" class="btn btn-primary">Submit</button>     
                                        </div>
                                        </form>
                                  
                                </div>
                            </div>
                        </div>
                    </div>

                        <table id="dataTable" class="table table-striped table-bordered"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th scope="col">Types of Reimbursement</th>
                                        <th scope="col">Proof to Reimburse</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    <?php
                                    $leave = mysqli_query($conn, "SELECT * FROM reqcandr WHERE type = 'Reimbursement' AND username = '" . $_SESSION['username'] . "'");
                                    $row = mysqli_num_rows($leave);
                                    if ($row > 0) {
                                        while ($row = mysqli_fetch_array($leave)) {
                                            ?>
                                            <tr>
                                                <td class="fw-bold" style="width: 20%"><?php echo $row['type']; ?></td>

                                                <td style="width: 20%">
                                                    <?php $status = $row['status'];
                                                    if ($status) {
                                                        if ($status == 'Pending') {
                                                            echo '<button class="btn btn-warning btn-sm fw-bold pe-none">Pending</button>';
                                                        } elseif ($status == 'Approved') {
                                                            echo '<button class="btn btn-success btn-sm pe-none">Approved</button>';
                                                        } elseif ($status == 'Not Approved') {
                                                            echo '<button class="btn btn-danger btn-sm pe-none">Not Approved</button>';
                                                        } elseif ($status == 'Claimed') {
                                                            echo '<button class="btn btn-primary btn-sm pe-none">Claimed</button>';
                                                        }
                                                    }
                                                    ?>
                                                </td>

                                                <td style="width: 20%">
                                                    <?php $status = $row['candr_file'];
                                                    if ($status) {
                                                        if ($status == NULL) {
                                                            echo '<button class="btn btn-secondary btn-sm pe-none">No File</button>';
                                                        } else {
                                                            echo '<a href="../../../public/uploads/proofReimbursement/' . $row['candr_file'] . '" target="_blank" class="btn btn-primary btn-sm">View File</a>';
                                                        }
                                                    }
                                                    ?>
                                                </td>

                                                <td style="width: 20%">
                                                    <button type="button" class="btn btn-info mb-1" 
                                                            data-bs-toggle="modal" title="View" 
                                                            data-bs-target="#view<?php echo $row['id'] ?>"><i class="bi bi-eye-fill"></i></button>

                                                    <!-- VIEW row  DETAILS MODAL -->
                                                    <div class="modal fade" id="view<?php echo $row['id'] ?>" aria-labelledby="view" aria-hidden="true">
                                                      <div class="modal-dialog modal-dialog-centered modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title fw-bold">VIEW REQUEST REIMBURSEMENT</h4>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>

                                                                <!-- Modal body -->
                                                                <div class="modal-body">
                                                                    <form method="POST">
                                                                        <table class="table table-striped">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th scope="row">Request ID</th>
                                                                                    <td><?php echo $row['id'] ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">Employee ID</th>
                                                                                    <td><?php echo $row['emp'] ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">Fullname</th>
                                                                                    <td class="fw-bold"><?php echo $row['name']; ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">Request Date</th>
                                                                                    <td>
                                                                                        <?php
                                                                                        $date = $row['reqdate'];
                                                                                        $date = strtotime($date);
                                                                                        $date = date('F j, Y', $date);
                                                                                        echo $date;
                                                                                        ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">Types of Reimbursement</th>
                                                                                    <td><?php echo $row['type']; ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">Proof to Reimburse</th>
                                                                                    <td>
                                                                                        <?php $status = $row['candr_file'];
                                                                                        if ($status) {
                                                                                            if ($status == NULL) {
                                                                                                echo '<button class="btn btn-secondary btn-sm pe-none">No File</button>';
                                                                                            } else {
                                                                                                echo '<a href="../../../public/uploads//proofReimbursement/' . $row['candr_file'] . '" target="_blank" class="btn btn-primary btn-sm">View File</a>';
                                                                                            }
                                                                                        }
                                                                                        ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">Status</th>
                                                                                    <td>
                                                                                        <?php $status = $row['status'];
                                                                                        if ($status) {
                                                                                            if ($status == 'Pending') {
                                                                                                echo '<button class="btn btn-warning btn-sm fw-bold pe-none">Pending</button>';
                                                                                            } elseif ($status == 'Approved') {
                                                                                                echo '<button class="btn btn-success btn-sm pe-none">Approved</button>';
                                                                                            } elseif ($status == 'Not Approved') {
                                                                                                echo '<button class="btn btn-danger btn-sm pe-none">Not Approved</button>';
                                                                                            } elseif ($status == 'Claimed') {
                                                                                                echo '<button class="btn btn-primary btn-sm pe-none">Claimed</button>';
                                                                                            }
                                                                                        }
                                                                                        ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">Details</th>
                                                                                    <td><?php echo $row['note'] ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">Remarks</th>
                                                                                    <td><?php echo $row['remarks'] ?></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </form>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- END OF VIEWING MODAL -->
                                                    
                                                    <button type="button" class="btn btn-warning mb-1" 
                                                            data-bs-toggle="modal" title="Edit" 
                                                            data-bs-target="#edit<?php echo $row['id'] ?>"><i class="bi bi-pencil-fill"></i></button>
                                                   
                                                    <!-- UPDATE row DETAILS MODAL -->
                                                    <div class="modal fade" id="edit<?php echo $row['id'] ?>" aria-labelledby="fillup" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title fw-bold">UPDATE REQUEST REIMBURSEMENT</h4>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <!-- Modal body -->
                                                                <div class="modal-body">
                                                                    <form action="../ClientSide/EmployeeRequest/ClaimsReimbursementQuery.php" method="POST" enctype="multipart/form-data">
                                                                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                                                        <div class="mb-3 row">
                                                                            <label for="" class="col-md-5 fw-bold">Types of Reimbursement</label>
                                                                            <div class="col-md-7">
                                                                                <select class="form-select" name="type" aria-label="Floating label select example" required>
                                                                                    <option value="<?php echo $row['type']; ?>">
                                                                                        <?php echo $row['type']; ?>
                                                                                    </option>
                                                                                    <option value="Reimbursement" class="fw-bold">Reimburse</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3 row">
                                                                            <label for="" class="col-md-5 form-label fw-bold">Insert Details</label>
                                                                            <div class="col-md-7">
                                                                                <textarea class="form-control" name="note" rows="5"><?php echo $row['note'] ?></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3 row">
                                                                            <label for="" class="col-md-5 form-label fw-bold">Proof to Reimburse</label>
                                                                            <div class="col-md-7">
                                                                                <?php $status = $row['candr_file'];
                                                                                if ($status) {
                                                                                    if ($status == NULL) {
                                                                                        echo '<button class="btn btn-secondary btn-sm pe-none">No File</button>';
                                                                                    } else {
                                                                                        echo '<a href="../../../public/uploads/proofReimbursement/' . $row['candr_file'] . '" target="_blank" class="btn btn-primary btn-sm">View File</a>';
                                                                                    }
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3 row">
                                                                            <label for="" class="col-md-5 form-label fw-bold">Update Proof to Reimburse</label>
                                                                            <div class="col-md-7">
                                                                                <input type="file" name="candr_file" class="form-control" accept=".pdf, .jpeg, .jpg, .png, .docx, .doc">
                                                                                <input type="hidden" name="candr_file_old" value="<?php echo $row['candr_file']; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <hr>
                                                                        <div class="mb-3 row">
                                                                            <label for="" class="col-md-5 form-label fw-bold">Request Date</label>
                                                                            <div class="col-md-7">
                                                                                <input class="form-control" type="text" readonly class="form-control-plaintext" value="<?php $date = $row['reqdate']; $date = strtotime($date); $date = date('F j, Y', $date); echo $date; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3 row">
                                                                            <label for="" class="col-md-5 form-label fw-bold">Status</label>
                                                                            <div class="col-md-7">
                                                                                <?php $status = $row['status'];
                                                                                if ($status) {
                                                                                    if ($status == 'Pending') {
                                                                                        echo '<button class="btn btn-warning btn-sm fw-bold pe-none">Pending</button>';
                                                                                    } elseif ($status == 'Approved') {
                                                                                        echo '<button class="btn btn-success btn-sm pe-none">Approved</button>';
                                                                                    } elseif ($status == 'Not Approved') {
                                                                                        echo '<button class="btn btn-danger btn-sm pe-none">Not Approved</button>';
                                                                                    } elseif ($status == 'Claimed') {
                                                                                        echo '<button class="btn btn-primary btn-sm pe-none">Claimed</button>';
                                                                                    }
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3 row">
                                                                            <label for="" class="col-md-5 form-label fw-bold">Remarks</label>
                                                                            <div class="col-md-7">
                                                                                <textarea readonly class="form-control" rows="5"><?php echo $row['remarks'] ?></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <hr>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                            <button type="submit" name="updateReq2" class="btn btn-success">UPDATE</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- END OF UPDATE row DETAILS MODAL -->
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
                <?php } } ?>

        </main>
        <!-- ### $App Screen Footer ### -->
        <footer class="bdT ta-c p-30 lh-0 fsz-sm c-grey-600">
          <span
            >Copyright ©
            <a href="#" target="_blank" title="Colorlib"
              >Skystream</a
            >. All rights reserved.</span
          >
        </footer>
      </div>
    </div>





  </body>
</html>
