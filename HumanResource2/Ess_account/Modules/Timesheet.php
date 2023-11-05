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

    <style>
        #collapsedContent {
            display: none;
        }
    </style>

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
              <ul class="dropdown-menu collapsed show" id="q1">
                <li><a class="sidebar-link" href="TimeAttendance.php">Time and Attendance</a></li>
                <li><a class="sidebar-link actived" href="Timesheet.php">Timesheet</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
            <a class="dropdown-toggle" data-bs-toggle="collapse" href="#q2"
                ><span class="icon-holder"
                  ><i class="bi bi-calendar-day"></i></span
                ><span class="title">Shift and Schedule</span>
                <span class="arrow"><i class="ti-angle-right"></i></span
              ></a>
              <ul class="dropdown-menu " id="q2">
                <li><a class="sidebar-link" href="../Modules/ViewSandS.php">My Shift and Schedule</a></li>
                <li><a class="sidebar-link" href="../Modules/ChangeSandS.php">Change Shift and Schedule</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
            <a class="dropdown-toggle" data-bs-toggle="collapse" href="#q3"
                ><span class="icon-holder"
                  > <i class="bi bi-arrow-counterclockwise"></i></span
                ><span class="title">Claims | Reimbursement</span>
                <span class="arrow"><i class="ti-angle-right"></i></span
              ></a>
              <ul class="dropdown-menu" id="q3">
                <li><a class="sidebar-link" href="../Modules/RequestClaims.php">Request Claims</a></li>
                <li><a class="sidebar-link" href="../Modules/RequestReimbursement.php">Request Reimbursement</a></li>
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
                <li><a class="sidebar-link" href="../Modules/RequestLeave.php">Employee Leave</a></li>
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
                <li><a class="sidebar-link" href="../Modules/RequestPayroll.php">Request Payslip</a></li>
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
                <li><a class="sidebar-link" href="../Modules/RequestDocument.php">Request Documents</a></li>
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
              <h4 class="c-grey-900 mT-10 mB-30 fw-bold">TIMESHEET</h4>
                <div class="row gap-20">
                  <div class="col-md-12">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">
                      

                    <div class="text-end mb-2">
                         <a href="#" 
                            data-bs-toggle="modal" 
                            data-bs-target="#createTimeSheet" 
                            class="btn btn-primary">+ Employee Timesheet
                        </a>
                    </div>

                    <!-- UPDATE row DETAILS MODAL -->
                    <div class="modal fade" id="createTimeSheet" aria-labelledby="fillup" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title fw-bold">MY TIMESHEET</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form action="../../../Controller/timesheetQuery.php" method="POST">

                                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">

                                        <input type="hidden" value="<?php echo "".$account['username']."";?>" name="username" class="form-control">

                                        <input type="hidden" 
                                                value="<?php echo "".$account['ess_lastname']."";?>,&nbsp;<?php echo "".$account['ess_firstname']."";?>&nbsp;<?php echo "".$account['ess_middlename']."";?>" 
                                                name="name" class="form-control">

                                        <input type="hidden" value="<?php echo "".$account['employeeID']."";?>" name="employeeID" class="form-control">

                                        <input type="hidden" name="date_submit">

                                        <div class="mb-3 row">
                                            <label for="" class="col-md-4 fw-bold">Date</label>
                                            <div class="col-md-8">
                                                <input class="form-control" type="date" name="timesheet_date">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="" class="col-md-4 fw-bold">Select Shift</label>
                                            <div class="col-md-8">
                                                <select class="form-select" name="shift" aria-label="Floating label select example" required id="shiftSelect">
                                                    <option selected disabled value="">Select Shift</option>
                                                    <option value="Morning Shift - 8:00 AM - 5:00 PM" class="fw-bold">Morning Shift - 8:00 AM - 5:00 PM</option>
                                                    <option value="Night Shift - 8:00 PM - 5:00 AM" class="fw-bold">Night Shift - 8:00 PM - 5:00 AM</option>
                                                    <option value="Special Shift 1 - 6:00 AM - 6:00 PM" class="fw-bold">Special Shift 1 - 6:00 AM - 6:00 PM</option>
                                                    <option value="Special Shift 2 - 6:00 PM - 6:00 AM" class="fw-bold">Special Shift 2 - 6:00 PM - 6:00 AM</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="" class="col-md-4 form-label fw-bold">8:00 - 9:00</label>
                                            <div class="col-md-8">
                                                <input class="form-control" type="text" name="first" placeholder="Enter Your Activity">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="" class="col-md-4 form-label fw-bold">9:00 - 10:00</label>
                                            <div class="col-md-8">
                                                <input class="form-control" type="text" name="second" placeholder="Enter Your Activity">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="" class="col-md-4 form-label fw-bold">10:00 - 11:00</label>
                                            <div class="col-md-8">
                                                <input class="form-control" type="text" name="third" placeholder="Enter Your Activity">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="" class="col-md-4 form-label fw-bold">11:00 - 12:00</label>
                                            <div class="col-md-8">
                                                <input class="form-control" type="text" name="fourth" placeholder="Enter Your Activity">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="" class="col-md-4 form-label fw-bold">BREAKTIME</label>
                                            <div class="col-md-8">
                                                <input class="form-control" type="hidden" name="breaktime">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="" class="col-md-4 form-label fw-bold">1:00 - 2:00</label>
                                            <div class="col-md-8">
                                                <input class="form-control" type="text" name="fifth" placeholder="Enter Your Activity">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="" class="col-md-4 form-label fw-bold">2:00 - 3:00</label>
                                            <div class="col-md-8">
                                                <input class="form-control" type="text" name="sixth" placeholder="Enter Your Activity">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="" class="col-md-4 form-label fw-bold">3:00 - 4:00</label>
                                            <div class="col-md-8">
                                                <input class="form-control" type="text" name="seven" placeholder="Enter Your Activity">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="" class="col-md-4 form-label fw-bold">4:00 - 5:00</label>
                                            <div class="col-md-8">
                                                <input class="form-control" type="text" name="eigth" placeholder="Enter Your Activity">
                                            </div>
                                        </div>

                                        <div id="collapsedContent">
                                            <hr>
                                            <div class="text-info fw-bold">FOR SPECIAL SHIFT ONLY</div>
                                            <hr>

                                            <div class="mb-3 row">
                                                <label for="" class="col-md-4 form-label fw-bold">6:00 - 7:00</label>
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" name="sp1" placeholder="Enter Your Activity">
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="" class="col-md-4 form-label fw-bold">7:00 - 8:00</label>
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" name="sp2" placeholder="Enter Your Activity">
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="" class="col-md-4 form-label fw-bold">5:00 - 6:00</label>
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" name="sp3" placeholder="Enter Your Activity">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END OF UPDATE row DETAILS MODAL -->

                    <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Employee ID</th>
                                <th>Employee Name</th>
                                <th>Date of Timesheet</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $sql = mysqli_query($conn, "SELECT * FROM timesheet WHERE username = '" . $_SESSION['username'] . "'");
                            $rows = mysqli_num_rows($sql);
                            if ($rows > 0) {
                                while ($rows = mysqli_fetch_array($sql)) {
                            ?>
                            <tr>
                                <td><?php echo $rows['id']; ?></td>
                                <td><?php echo $rows['employeeID']; ?></td>
                                <td><?php echo $rows['name']; ?></td>
                                <td><?php echo date('F j, Y', strtotime($rows['timesheet_date'])); ?></td>
                                <td>
                                    <button type="button" class="btn btn-info" 
                                            data-bs-toggle="modal" title="View" 
                                            data-bs-target="#view<?php echo $rows['id']; ?>"><i class="bi bi-eye-fill"></i>
                                    </button>

                                    <div class="modal fade" id="view<?php echo $rows['id']; ?>" aria-labelledby="fillup" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title fw-bold">MY TIMESHEET</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                        <div class="mb-3 row">
                                                            <label for="" class="col-md-4 fw-bold">Date</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control" type="date" value="<?php echo $rows['timesheet_date']; ?>" name="timesheet_date" disabled>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <label for="" class="col-md-4 fw-bold">Shift</label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" value="<?php echo $rows['shift']; ?>" disabled>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <label for="" class="col-md-4 form-label fw-bold">8:00 - 9:00</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control" type="text" value="<?php echo $rows['first']; ?>" name="first" disabled>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <label for="" class="col-md-4 form-label fw-bold">9:00 - 10:00</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control" type="text" value="<?php echo $rows['second']; ?>" name="second" disabled>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <label for="" class="col-md-4 form-label fw-bold">10:00 - 11:00</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control" type="text" name="third" value="<?php echo $rows['third']; ?>" disabled>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <label for="" class="col-md-4 form-label fw-bold">11:00 - 12:00</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control" type="text" name="fourth" value="<?php echo $rows['fourth']; ?>" disabled>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <label for="" class="col-md-4 form-label fw-bold">BREAKTIME</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control" type="hidden" name="breaktime">
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <label for="" class="col-md-4 form-label fw-bold">1:00 - 2:00</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control" type="text" value="<?php echo $rows['fifth']; ?>" name="fifth" disabled>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <label for="" class="col-md-4 form-label fw-bold">2:00 - 3:00</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control" type="text" value="<?php echo $rows['sixth']; ?>" name="sixth" disabled>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <label for="" class="col-md-4 form-label fw-bold">3:00 - 4:00</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control" type="text" value="<?php echo $rows['seven']; ?>" name="seven" disabled>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <label for="" class="col-md-4 form-label fw-bold">4:00 - 5:00</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control" type="text" name="eigth" value="<?php echo $rows['eigth']; ?>" disabled>
                                                            </div>
                                                        </div>

                                                        <hr>
                                                        <div class="text-info fw-bold">FOR SPECIAL SHIFT ONLY</div>
                                                        <hr>

                                                        <div class="mb-3 row">
                                                            <label for="" class="col-md-4 form-label fw-bold">6:00 - 7:00</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control" type="text" value="<?php echo $rows['sp1']; ?>" name="sp1" disabled>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <label for="" class="col-md-4 form-label fw-bold">7:00 - 8:00</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control" type="text" value="<?php echo $rows['sp2']; ?>" name="sp2" disabled>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <label class="col-md-4 form-label fw-bold">5:00 - 6:00</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control" type="text" name="sp3" value="<?php echo $rows['sp3']; ?>" disabled>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 

                                    <!-- <button type="button" class="btn btn-warning" 
                                            data-bs-toggle="modal" title="View" 
                                            data-bs-target="#edit<?php echo $rows['id']; ?>"><i class="bi bi-pencil-fill"></i>
                                    </button>

                                    <div class="modal fade" id="edit<?php echo $rows['id']; ?>" aria-labelledby="fillup" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title fw-bold">UPDATE TIMESHEET</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="../../../Controller/timesheetQuery.php" method="POST">
                                                        <div class="mb-3 row">
                                                            <label for="" class="col-md-4 fw-bold">Date</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control" type="date" value="<?php echo $rows['timesheet_date']; ?>" name="timesheet_date">
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <label for="" class="col-md-4 fw-bold">Select Shift</label>
                                                            <div class="col-md-8">
                                                                <select class="form-select" name="shift" aria-label="Floating label select example" required id="shiftSelect">
                                                                    <option value="<?php echo $rows['timesheet_date']; ?>"><?php echo $rows['timesheet_date']; ?></option>
                                                                    <option value="Morning Shift - 8:00 AM - 5:00 PM" class="fw-bold">Morning Shift - 8:00 AM - 5:00 PM</option>
                                                                    <option value="Night Shift - 8:00 PM - 5:00 AM" class="fw-bold">Night Shift - 8:00 PM - 5:00 AM</option>
                                                                    <option value="Special Shift 1 - 6:00 AM - 6:00 PM" class="fw-bold">Special Shift 1 - 6:00 AM - 6:00 PM</option>
                                                                    <option value="Special Shift 2 - 6:00 PM - 6:00 AM" class="fw-bold">Special Shift 2 - 6:00 PM - 6:00 AM</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <label for="" class="col-md-4 form-label fw-bold">8:00 - 9:00</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control" type="text" value="<?php echo $rows['first']; ?>" name="first" placeholder="Enter Your Activity">
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <label for="" class="col-md-4 form-label fw-bold">9:00 - 10:00</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control" type="text" value="<?php echo $rows['second']; ?>" name="second" placeholder="Enter Your Activity">
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <label for="" class="col-md-4 form-label fw-bold">10:00 - 11:00</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control" type="text" name="third" value="<?php echo $rows['third']; ?>" placeholder="Enter Your Activity">
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <label for="" class="col-md-4 form-label fw-bold">11:00 - 12:00</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control" type="text" name="fourth" value="<?php echo $rows['fourth']; ?>" placeholder="Enter Your Activity">
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <label for="" class="col-md-4 form-label fw-bold">BREAKTIME</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control" type="hidden" name="breaktime">
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <label for="" class="col-md-4 form-label fw-bold">1:00 - 2:00</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control" type="text" name="fifth" placeholder="Enter Your Activity">
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <label for="" class="col-md-4 form-label fw-bold">2:00 - 3:00</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control" type="text" name="sixth" placeholder="Enter Your Activity">
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <label for="" class="col-md-4 form-label fw-bold">3:00 - 4:00</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control" type="text" name="seven" placeholder="Enter Your Activity">
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <label for="" class="col-md-4 form-label fw-bold">4:00 - 5:00</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control" type="text" name="eigth" placeholder="Enter Your Activity">
                                                            </div>
                                                        </div>

                                                        <div id="collapsedContent">
                                                            <hr>
                                                            <div class="text-info fw-bold">FOR SPECIAL SHIFT ONLY</div>
                                                            <hr>

                                                            <div class="mb-3 row">
                                                                <label for="" class="col-md-4 form-label fw-bold">6:00 - 7:00</label>
                                                                <div class="col-md-8">
                                                                    <input class="form-control" type="text" name="sp1" placeholder="Enter Your Activity">
                                                                </div>
                                                            </div>

                                                            <div class="mb-3 row">
                                                                <label for="" class="col-md-4 form-label fw-bold">7:00 - 8:00</label>
                                                                <div class="col-md-8">
                                                                    <input class="form-control" type="text" name="sp2" placeholder="Enter Your Activity">
                                                                </div>
                                                            </div>

                                                            <div class="mb-3 row">
                                                                <label for="" class="col-md-4 form-label fw-bold">5:00 - 6:00</label>
                                                                <div class="col-md-8">
                                                                    <input class="form-control" type="text" name="sp3" placeholder="Enter Your Activity">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" name="submit" class="btn btn-success">UPDATE</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->


                                    <!-- <button type="button" class="btn btn-danger" 
                                            data-bs-toggle="modal" title="View" 
                                            data-bs-target="#delete<?php echo $rows['id']; ?>"><i class="bi bi-trash-fill"></i>
                                    </button> -->
                                </td>
                            </tr>
                            <?php } } ?>
                        </tbody>
                    </table>


                    </div>
                  </div>
                </div>
            </div>
          </div>

          <script>
            document.getElementById("shiftSelect").addEventListener("change", function() {
                var shiftSelect = document.getElementById("shiftSelect");
                var collapsedContent = document.getElementById("collapsedContent");

                if (shiftSelect.value === "Special Shift 1 - 6:00 AM - 6:00 PM" || shiftSelect.value === "Special Shift 2 - 6:00 PM - 6:00 AM") {
                    collapsedContent.style.display = "block";
                } else {
                    collapsedContent.style.display = "none";
                }
            });
        </script>
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
