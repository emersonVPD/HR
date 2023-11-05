<?php
  session_start();
  include "../../../connection.php";

  // Check if the 'username' session variable is set
  if (isset($_SESSION['username'])) {
      $username = $_SESSION['username'];

      // Check the user's positionTitle
      $query = "SELECT positionTitle FROM tntaccount WHERE username = '$username'";
      $result = mysqli_query($conn, $query);

      if ($result) {
          $user = mysqli_fetch_assoc($result);
          $positionTitle = $user['positionTitle'];

          // Only allow 'HR 3 Manager' and 'Super Admin' to continue
          if ($positionTitle !== 'HR 4 Manager' && $positionTitle !== 'Super Admin') {
              // Redirect to the login page or take appropriate action if the user's position is not allowed
              header("location: ../../../login.php");
              exit;
          }
      } else {
          // Handle the database query error if needed
      }
  } else {
      // Redirect to the login page or take appropriate action if the user is not logged in.
      header("location: ../../../login.php");
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
    <title>HR 4</title>

      <meta content="" name="description">
      <meta content="" name="keywords">

    <link rel="icon" href="../../assets/icons/skystreamlogo.png">

    <!-- USE FOR LIBARIES TO INCLUDE IN THIS PAGE 
    NOTE : DO NOT DELETE THIS -->
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
      <!-- #Left Sidebar ==================== -->
      <div class="sidebar">
        <div class="sidebar-inner">
          <!-- ### $Sidebar Header ### -->
          <div class="sidebar-logo">
            <div class="peers ai-c fxw-nw">
              <div class="peer peer-greed">
                <a class="sidebar-link td-n" href="../../index.php"
                  ><div class="peers ai-c fxw-nw">
                    <div class="peer">
                      <div class="logo">
                        <img src="../../assets/icons/skystreamlogo.png" class="mt-2" style="height: 50px; width: 80px;"/>
                      </div>
                    </div>
                    <div class="peer peer-greed">
                      <h5 class="lh-1 mB-0 logo-text ms-4">HUMAN RESOURCE 4</h5>
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
              <a class="sidebar-link" href="../../index.php"
                ><span class="icon-holder"
                  ><i class="c-blue-500 ti-home"></i> </span
                ><span class="title">Dashboard</span></a
              >
            </li>

            <li class="nav-item dropdown">
              <a class="dropdown-toggle" data-bs-toggle="collapse" href="#coreDropdown">
                <span class="icon-holder"><i class="bi bi-archive"></i></span>
                <span class="title">Core Human Capital</span>
                <span class="arrow"><i class="ti-angle-right"></i></span>
              </a>
              <ul class="dropdown-menu collapse show" id="coreDropdown">
                <li><a class="sidebar-link" href="JobVacancy.php">Job Vacancy</a></li>
                <li><a class="sidebar-link" href="ApplicantInformation.php">Applicant</a></li>
                <li><a class="sidebar-link actived" href="EmployeeInformation.php">Employee</a></li>
                <li><a class="sidebar-link" href="SetofSandQ.php">Set of S and Q</a></li>
                <li><a class="sidebar-link" href="EmployeeRequest.php">Requesting of Employee</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a class="dropdown-toggle" href="javascript:void(0);"
                ><span class="icon-holder"
                  > <i class="bi bi-cash-coin"></i></span
                ><span class="title">Payroll</span>
                <span class="arrow"><i class="ti-angle-right"></i></span
              ></a>
              <ul class="dropdown-menu">
                <li><a class="sidebar-link" href="../Payroll Management/TimeandAttendance.php">Time and Attendance</a></li>
                <li><a class="sidebar-link" href="../Payroll Management/create_payroll.php">Create Payroll</a></li>
                <li><a class="sidebar-link" href="../Payroll Management/RequestPayroll.php">Payroll Request</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a class="dropdown-toggle" href="javascript:void(0);"
                ><span class="icon-holder"
                  ><i class="bi bi-award"></i></span
                ><span class="title">Compensation Planning</span>
                <span class="arrow"><i class="ti-angle-right"></i></span
              ></a>
              <ul class="dropdown-menu">
                <li><a class="sidebar-link" href="../Compensation Planning Admin/Incentives.php">Incentives</a></li>
                <li><a class="sidebar-link" href="../Compensation Planning Admin/benefits.php">Benefits</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a class="dropdown-toggle" href="javascript:void(0);"
                ><span class="icon-holder"
                  ><i class="bi bi-graph-up-arrow"></i></span
                ><span class="title">HR Analytics</span>
                <span class="arrow"><i class="ti-angle-right"></i></span
              ></a>
              <ul class="dropdown-menu">
                <li><a class="sidebar-link" href="../HR Analytics/applicant.php">Applicant</a></li>
                <li><a class="sidebar-link" href="../HR Analytics/employee.php">Employee</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      <!-- #Main ============================ -->
      <div class="page-container">
          <?php 
              $sql = mysqli_query($conn, "SELECT * FROM tntaccount WHERE username = '" . $_SESSION['username'] . "'");
              $account = mysqli_num_rows($sql);
                  if($account > 0){
                      while ($account = mysqli_fetch_array($sql)) {
          ?>
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
              <li class="notifications dropdown"  style="margin-left: -50px;">
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
                    <a href="../../accountQuery/accountSettings.php" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"
                      ><i class="ti-settings mR-10"></i> <span>Setting</span></a
                    >
                  </li>
                  <li>
                    <a href="../../accountQuery/accountProfile.php" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"
                      ><i class="ti-user mR-10"></i> <span>Profile</span></a
                    >
                  </li>
                  <li role="separator" class="divider"></li>
                  <li>
                    <a href="../../accountQuery/logout.php" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"
                      ><i class="ti-power-off mR-10"></i> <span>Logout</span></a
                    >
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
        <?php } } ?>
        <!-- ### $App Screen Content ### -->
        <main class="main-content bgc-grey-100">
          <div id="mainContent">
            <div class="container-fluid">
              <h4 class="c-grey-900 mT-10 mB-30 fw-bold">EMPLOYEE INFORMATION</h4>
              <div class="row">
                <div class="col-md-12">
                  <div class="bgc-white bd bdrs-3 p-20 mB-20">

                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

                    <table
                      id="dataTable"
                      class="table table-striped table-bordered"
                      cellspacing="0"
                      width="100%"
                    >
                    <thead>
                         <tr>
                            <th scope="col">#</th>
                            <th scope="col">EmployeeID</th>
                            <th scope="col">Fullname</th>
                            <th scope="col">Job Title</th>
                            <th scope="col">Position</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                          </tr>
                    </thead>

                           <tbody id="myTable">
                            <?php

                            $sql = mysqli_query($conn, "SELECT * FROM employeetbl");
                            $employee = mysqli_num_rows($sql);
                                if($employee > 0){
                                    while ($employee = mysqli_fetch_array($sql)) {
                                        # code...
                            ?>

                            <tr>
                                <td><?php echo $employee['id'];?></td>

                                <td class="fw-bold"><?php echo $employee['employeeID'];?></td>

                                <td class="fw-bold"><?php echo $employee['emp_firstname'];?>
                                                    <?php echo $employee['emp_middlename'];?>
                                                    <?php echo $employee['emp_lastname'];?>
                                </td>

                                <td class="fw-bold"><button class="btn btn-dark btn-sm pe-none">
                                                    <?php echo $employee['emp_positionTitle'];?>
                                                    </button>
                                </td>

                                <td class="fw-bold"><?php echo $employee['emp_sub'];?></td>

                                <td class="fw-bold"><button class="btn btn-primary btn-sm pe-none">
                                                    <?php echo $employee['emp_status'];?>
                                                    </button>
                                </td>

                                <td>
                                        <button type="button" 
                                                class="btn btn-info" 
                                                data-bs-toggle="modal"
                                                title="View"
                                                data-bs-target="#view<?php echo $employee['id'] ?>"><i class="bi bi-eye-fill"></i>
                                        </button>

                          <!-- VIEW EMPLOYEE  DETAILS MODAL -->
                              <div class="modal fade" id="view<?php echo $employee['id'] ?>" aria-labelledby="view" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                          <h4 class="modal-title">EMPLOYEE INFORMATION</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                      <form method="POST">

                                          <table class="table table-striped">
                                            <tbody>
                                                <tr><th scope="row">Employee ID</th>
                                                  <td><?php echo $employee['employeeID'] ?></td></tr>

                                                  <tr><th scope="row">Employee Image</th>
                                                  <td><img src="../../../public/uploads/employeeimage/<?php echo $employee['emp_image'];?>" height="150px" width="150px"></td>
                                                  </tr>

                                                <tr><th scope="row">Fullname</th>
                                                  <td><?php echo $employee['emp_firstname'] ?>
                                                      <?php echo $employee['emp_middlename'] ?>
                                                      <?php echo $employee['emp_lastname'] ?></td></tr>

                                                <tr><th scope="row">Position Title</th>
                                                  <td><button class="btn btn-dark btn-sm"><?php echo $employee['emp_positionTitle'] ?></button></td></tr>

                                                <tr><th scope="row">Status</th>
                                                  <td><button class="btn btn-primary btn-sm"><?php echo $employee['emp_status'] ?></button></td></tr>

                                                <tr><th scope="row">Date Hired</th>
                                                  <td><?php $date = $employee['emp_dateHired'];
                                                          $date = strtotime ($date);
                                                          $date = date ('F j, Y', $date);
                                                          echo $date;?></td></tr>

                                                <tr><th scope="row">Department</th>
                                                  <td><?php echo $employee['emp_department'] ?></td></tr>

                                                <tr><th scope="row">Gender</th>
                                                  <td><?php echo $employee['emp_gender'] ?></td></tr>

                                                <tr><th scope="row">Address</th>
                                                  <td><?php echo $employee['emp_address'] ?></td></tr>

                                                <tr><th scope="row">Age</th>
                                                  <td><?php echo $employee['emp_age'] ?></td></tr>

                                                <tr><th scope="row">Birthdate</th>
                                                  <td><?php echo $employee['emp_birthdate'] ?></td></tr>

                                                <tr><th scope="row">Birthplace</th>
                                                  <td><?php echo $employee['emp_birthplace'] ?></td></tr>

                                                <tr><th scope="row">Contact No</th>
                                                  <td><?php echo $employee['emp_contactno'] ?></td></tr>

                                                <tr><th scope="row">Email</th>
                                                  <td><?php echo $employee['emp_email'] ?></td></tr>

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

                                 <button type="button" 
                                         class="btn btn-warning" 
                                         data-bs-toggle="modal"
                                         title="Edit"
                                         data-bs-target="#edit<?php echo $employee['id'] ?>"><i class="bi bi-pencil-fill"></i>
                                </button>

                                <!-- UPDATE EMPLOYEE DETAILS MODAL -->
                                <div class="modal fade" id="edit<?php echo $employee['id'] ?>" aria-labelledby="fillup" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">UPDATE EMPLOYEE INFORMATION</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <form action="../../../Controller/EmployeeInformationQuery.php" method="POST" enctype="multipart/form-data">
                                                    <input type="hidden" name="id" value="<?php echo $employee['id'] ?>">
                                                    <div class="mb-3 row">
                                                        <label class="col-md-3 form-label">Employee ID</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="employeeID" value="<?php echo $employee['employeeID']; ?>" placeholder="Employee ID" required="required">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-md-3 form-label">Employee Image</label>
                                                        <div class="col-md-9">
                                                            <img src="../../../public/uploads/employeeimage/<?php echo $employee['emp_image']; ?>" height="150px" width="150px">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-md-3 form-label">Update Employee Image</label>
                                                        <div class="col-md-9">
                                                            <input type="file" name="emp_image" class="form-control">
                                                            <input type="hidden" name="emp_image_old" value="<?php echo $employee['emp_image']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-md-3 form-label">Firstname</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="emp_firstname" value="<?php echo $employee['emp_firstname']; ?>" placeholder="Firstname" required="required">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-md-3 form-label">Middlename</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="emp_middlename" value="<?php echo $employee['emp_middlename']; ?>" placeholder="Middlename" required="required">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-md-3 form-label">Lastname</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class "form-control" name="emp_lastname" value="<?php echo $employee['emp_lastname']; ?>" placeholder="Lastname" required="required">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-md-3">Position Title</label>
                                                        <div class="col-md-9">
                                                            <select class="form-select" name="emp_positionTitle" aria-label="Position Title" required>
                                                                <option value="<?php echo $employee['emp_positionTitle'];?>"><?php echo $employee['emp_positionTitle'];?></option>
                                                                <option value="Customer Service Agent">Customer Service Agent</option>
                                                                <option value="Customer Service Manager">Customer Service Manager</option>
                                                                <option value="Tour Visa Processing Staff">Tour Visa Processing Staff</option>
                                                                <option value="Project Manager">Project Manager</option>
                                                                <option value="Sales and Marketing">Sales and Marketing</option>
                                                                <option value="Documentation Manager">Documentation Manager</option>
                                                                <option value="Documentation Officer">Documentation Officer</option>
                                                                <option value="General Manager">General Manager</option>
                                                                <option value="Reservation Officer">Reservation Officer</option>
                                                                <option value="Travel Consultant">Travel Consultant</option>
                                                                <option value="Administrative Staff">Administrative Staff</option>
                                                                <option value="Liaison Staff">Liaison Staff</option>
                                                                <option value="Sales Manager">Sales Manager</option>
                                                                <option value="Database Administrator">Database Administrator</option>
                                                                <option value="IT Technical Officer">IT Technical Officer</option>
                                                                <option value="IT Security Officer">IT Security Officer</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-md-3">Employee Status</label>
                                                        <div class="col-md-9">
                                                            <select class="form-select" name="emp_status" aria-label="Employee Status" required>
                                                                <option value="<?php echo $employee['emp_status'];?>"><?php echo $employee['emp_status'];?></option>
                                                                <option value="New Hired on Board">New Hired on Board</option>
                                                                <option value="Full Time Employee">Full Time Employee</option>
                                                                <option value="Part Time Employee">Part Time Employee</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-md-3 form-label">Date Hired</label>
                                                        <div class="col-md-9">
                                                            <input type="date" class="form-control" name="emp_dateHired" value="<?php echo $employee['emp_dateHired']; ?>" placeholder="Date Hired" required="required">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-md-3">Department</label>
                                                        <div class="col-md-9">
                                                            <select class="form-select" name="emp_department" aria-label="Department" required>
                                                                <option value="<?php echo $employee['emp_department'];?>"><?php echo $employee['emp_department'];?></option>
                                                                <option value="IT Department">IT Department</option>
                                                                <option value="Customer Service Department">Customer Service Department</option>
                                                                <option value="HR Department">HR Department</option>
                                                                <option value="Admin Department">Admin Department</option>
                                                                <option value="Finance Department">Finance Department</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-md-3 form-label">Gender</label>
                                                        <div class="col-md-9">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="emp_gender" value="Male" required="required" <?php if($employee["emp_gender"] == 'Male' ) { echo "checked"; }; ?>>
                                                                <label class="form-check-label" for="gender">Male</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="emp_gender" value="Female" required="required" <?php if($employee["emp_gender"] == 'Female' ) { echo "checked"; }; ?>>
                                                                <label class="form-check-label" for="gender">Female</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="emp_gender" value="Undecided" required="required" <?php if($employee["emp_gender"] == 'Undecided' ) { echo "checked"; }; ?>>
                                                                <label class="form-check-label" for="gender">Undecided</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-md-3">Complete Address</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="emp_address" value="<?php echo $employee['emp_address']; ?>" placeholder="Street / Brgy / City / State / Zip Code" required="required">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-md-3">Age</label>
                                                        <div class="col-md-9">
                                                            <input type="number" class="form-control" name="emp_age" value="<?php echo $employee['emp_age']; ?>" placeholder="Age" required="required">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-md-3">Birthdate</label>
                                                        <div class="col-md-9">
                                                            <input type="date" class="form-control" name="emp_birthdate" value="<?php echo $employee['emp_birthdate']; ?>" placeholder="Birthdate" required="required">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-md-3">Birthplace</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="emp_birthplace" value="<?php echo $employee['emp_birthplace']; ?>" placeholder="Birthplace" required="required">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-md-3">Contact No.</label>
                                                        <div class="col-md-9">
                                                            <input type="number" class="form-control" name="emp_contactno" value="<?php echo $employee['emp_contactno']; ?>" placeholder="Contact No." required="required">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-md-3">Email</label>
                                                        <div class="col-md-9">
                                                            <input type="email" class="form-control" name="emp_email" value="<?php echo $employee['emp_email']; ?>" placeholder="Email" required="required">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" name="update" class="btn btn-success">UPDATE</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END OF UPDATE EMPLOYEE DETAILS MODAL -->


                                          <!-- <button type="button" 
                                                  class="btn btn-danger" 
                                                  data-bs-toggle="modal"
                                                  title="Delete"
                                                  data-bs-target="#delete<?php echo $employee['id'] ?>"><i class="bi bi-trash"></i>
                                          </button> -->

                                <!-- DELETE EMPLOYEE DETAILS MODAL -->          
                                      <div class="modal fade" id="delete<?php echo $employee['id'] ?>" aria-labelledby="view" aria-hidden="true">
                                          <div class="modal-dialog modal-dialog-centered modal-lg">
                                              <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title">DELETE APPLICANTS INFORMATION</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>

                                            <div class="modal-body">
                                                <form action="../../../Controller/EmployeeInformationQuery.php" method="POST">
                                                    <p>Are You Sure You Want to Delete this Applicant?</p>
                                                    <input type="hidden" name="delete_id" value="<?php echo $employee['id']; ?>">
                                                    <input type="hidden" name="del_emp_img" value="<?php echo $employee['emp_image']; ?>">
                                                
                                                  <div class="modal-footer">
                                                      <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                                                  </form>
                                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                <!-- DELETE EMPLOYEE DETAILS MODAL -->  
                                
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
