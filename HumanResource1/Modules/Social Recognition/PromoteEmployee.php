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

          if ($positionTitle !== 'HR 1 Manager' && $positionTitle !== 'Super Admin') {
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
    <title>HR 1</title>

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
                      <h5 class="lh-1 mB-0 logo-text ms-4">HUMAN RESOURCE 1</h5>
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
            <a class="dropdown-toggle" data-bs-toggle="collapse" href="#recruitmentDropdown">
                <span class="icon-holder"
                  ><i class="bi bi-globe"></i></span
                ><span class="title">Recruitment</span>
                <span class="arrow"><i class="ti-angle-right"></i></span
              ></a>
              <ul class="dropdown-menu" id="recruitmentDropdown">
              <li><a class="sidebar-link" href="../../../JobPosting/" target="_blank">Job Posting Website</a></li>
              <li><a class="sidebar-link" href="../Recruitment/JobVacancy.php">Job Vacancy</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
            <a class="dropdown-toggle" data-bs-toggle="collapse" href="#q2">
                <span class="icon-holder"
                  ><i class="bi bi-archive"></i></span
                ><span class="title">Applicant Management</span>
                <span class="arrow"><i class="ti-angle-right"></i></span
              ></a>
              <ul class="dropdown-menu" id="q2">
                <li><a class="sidebar-link" href="../Applicant Management/ApplicantInformation.php">Applicant Information</a></li>
                <li><a class="sidebar-link" href="../Applicant Management/ApplicantSchedule.php">Applicant Schedule</a></li>
                <li><a class="sidebar-link" href="../Applicant Management/InitialInterview.php">Applicant Initial Interview</a></li>
                <li><a class="sidebar-link" href="../Applicant Management/FinalInterview.php">Applicant Final Interview</a></li>
                <li><a class="sidebar-link" href="../Applicant Management/RequestExam.php">Request Exam Module</a></li>
                <li><a class="sidebar-link" href="../Applicant Management/ApplicantExamResult.php">Applicant Exam Result</a></li>
                <li><a class="sidebar-link" href="../Applicant Management/ApplicantResult.php">Applicant Result</a></li>
                <li><a class="sidebar-link" href="../Applicant Management/RequestFacility.php">Request Facility</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
            <a class="dropdown-toggle" data-bs-toggle="collapse" href="#q3"
                ><span class="icon-holder"
                  > <i class="bi bi-cash-coin"></i></span
                ><span class="title">New Hired On Board</span>
                <span class="arrow"><i class="ti-angle-right"></i></span
              ></a>
              <ul class="dropdown-menu" id="q3">
                <li><a class="sidebar-link" href="../New Hired On Board/QualifiedApplicants.php">Qualified Applicants</a></li>
                <li><a class="sidebar-link" href="../New Hired On Board/Applicant Management/EmployeeInformation.php">Employee Information</a></li>
                <li><a class="sidebar-link" href="../New Hired On Board/Applicant Management/RequestContract.php">Request Contract</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
            <a class="dropdown-toggle" data-bs-toggle="collapse" href="#q4"
                ><span class="icon-holder"
                  ><i class="bi bi-award"></i></span
                ><span class="title">Performance Management</span>
                <span class="arrow"><i class="ti-angle-right"></i></span
              ></a>
              <ul class="dropdown-menu" id="q4">
                <li><a class="sidebar-link actived" href="../Performance Management/EmployeeEvaluation.php">Employee Evaluation</a></li>
                <li><a class="sidebar-link" href="../Performance Management/EmployeeRecords.php">Employee Records</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
            <a class="dropdown-toggle" data-bs-toggle="collapse" href="#q5"
                ><span class="icon-holder"
                  ><i class="bi bi-graph-up-arrow"></i></span
                ><span class="title">Social Recognition</span>
                <span class="arrow"><i class="ti-angle-right"></i></span
              ></a>
              <ul class="dropdown-menu collapsed show" id="q5">
                <li><a class="sidebar-link" href="Certificates.php">Certificates</a></li>
                <li><a class="sidebar-link" href="Incentives.php">Incentives</a></li>
                <li><a class="sidebar-link actived" href="PromoteEmployee.php">Promote Employee</a></li>
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

        <main class="main-content bgc-grey-100">
          <div id="mainContent">
            <div class="container-fluid">
              <h4 class="c-grey-900 mT-10 mB-30 fw-bold">EMPLOYEE PROMOTION</h4>
              <div class="row">
                <div class="col-md-12">
                  <div class="bgc-white bd bdrs-3 p-20 mB-20">

                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

                    <table
                      id="dataTable"
                      class="table table-striped table-bordered"
                      cellspacing="0"
                      width="100%">
                    
                      <thead>
                         <tr>
                            <th scope="col">EmployeeID</th>
                            <th scope="col">Fullname</th>
                            <th scope="col">Job Title</th>
                            <th scope="col">Position</th>
                            <th scope="col">Department</th>
                            <th scope="col">Action</th>
                          </tr>
                    </thead>

                           <tbody>
                              <?php

                              $sql = mysqli_query($conn, "SELECT * FROM employeetbl");
                              $employee = mysqli_num_rows($sql);
                                  if($employee > 0){
                                      while ($employee = mysqli_fetch_array($sql)) {
                                          # code...
                              ?>
                            <tr>

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
                                <td class="fw-bold"><?php echo $employee['emp_department'];?></td>

                                <td>
                                      <button type="button" 
                                              class="btn btn-info" 
                                              data-bs-toggle="modal"
                                              title="View"
                                              data-bs-target="#view<?php echo $employee['id'] ?>"><i class="bi bi-eye-fill"></i>
                                      </button>

                                  <!-- VIEW EMPLOYEE  DETAILS MODAL -->
                                      <div class="modal fade" id="view<?php echo $employee['id'] ?>" aria-labelledby="view" aria-hidden="true">
                                          <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                  <h4 class="modal-title fw-bold">VIEW EMPLOYEE INFORMATION</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                  </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
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
                                                          <td><button class="btn btn-dark btn-sm pe-none">
                                                            <?php echo $employee['emp_positionTitle'] ?>
                                                            </button>
                                                          </td></tr>

                                                        <tr><th scope="row">Sub Position Title</th>
                                                          <td>
                                                            <?php echo $employee['emp_sub'] ?>
                                                          </td></tr>

                                                        <tr><th scope="row">Status</th>
                                                          <td><button class="btn btn-primary btn-sm pe-none">
                                                            <?php echo $employee['emp_status'] ?>
                                                            </button>
                                                        </td></tr>

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
                                              <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h4 class="modal-title fw-bold">UPDATE PROMOTE / EMPLOYEE</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                      </div>
                                                              <!-- Modal body -->
                                                      <div class="modal-body">
                                                      <form action="../../../Controller/EmployeeInformationQuery.php"  method="POST">
                                                        <input type="hidden" name="id" value="<?php echo $employee['id'] ?>">

                                                        <div class="mb-3 row">
                                                            <label for="" class="col-md-4 form-label fw-bold">Employee ID</label>
                                                          <div class="col-md-8">
                                                            <input class="form-control"
                                                                  type="text" 
                                                                  readonly class="form-control-plaintext" 
                                                                  value="<?php echo $employee['employeeID'];?>">
                                                          </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <label for="" class="col-md-4 form-label fw-bold">Employee Image</label>
                                                            <div class="col-md-8">
                                                          <img src="../../../public/uploads/employeeimage/<?php echo $employee['emp_image'];?>" height="150px" width="150px">
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <label for="" class="col-md-4 form-label fw-bold">Fullname</label>
                                                          <div class="col-md-8">
                                                            <input class="form-control"
                                                                  type="text" 
                                                                  readonly class="form-control-plaintext" 
                                                                  value="<?php echo $employee['emp_firstname']; ?>&nbsp;<?php echo $employee['emp_middlename']; ?>&nbsp;<?php echo $employee['emp_lastname']; ?>">
                                                          </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                          <label for="" class="col-md-4 fw-bold">Employee Status</label>
                                                          <div class="col-md-8">
                                                            <input class="form-control"
                                                                  type="text" 
                                                                  readonly class="form-control-plaintext" 
                                                                  value="<?php echo $employee['emp_status'];?>">
                                                          </div>
                                                        </div>
                                                        <hr>

                                                        <div class="mb-3 row">
                                                            <label for="PositionTitle" class="col-md-4 fw-bold">Job Title</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control"
                                                                      type="text"
                                                                      readonly class="form-control-plaintext"
                                                                      value="<?php echo $employee['emp_positionTitle']; ?>">
                                                            </div>
                                                        </div>

                                                        <?php if ($employee['emp_positionTitle'] === "Customer Service Agent" || $employee['emp_positionTitle'] === "CustomerServiceAgent"): ?>
                                                          <div class="mb-3 row">
                                                              <label for="SubPosition" class="col-md-4 fw-bold">Sub-Position</label>
                                                              <div class="col-md-8">
                                                                  <select class="form-select" id="SubPosition" name="emp_sub" aria-label="Floating label select example" required>
                                                                      <option value="Customer Service Team Leader">Customer Service Team Leader</option>
                                                                      <option value="Customer Service Supervisor">Customer Service Supervisor</option>
                                                                      <option value="Customer Service Manager">Customer Service Manager</option>
                                                                  </select>
                                                              </div>
                                                          </div>
                                                          <?php endif; ?>

                                                          <?php if ($employee['emp_positionTitle'] === "Customer Service Manager" || $employee['emp_positionTitle'] === "CustomerServiceManager"): ?>
                                                          <div class="mb-3 row">
                                                              <label for="SubPosition" class="col-md-4 fw-bold">Sub-Position</label>
                                                              <div class="col-md-8">
                                                                  <select class="form-select" id="SubPosition" name="emp_sub" aria-label="Floating label select example" required>
                                                                  <option value="Customer Service Manager">Customer Service Manager</option>
                                                                  <option value="Customer Service Director">Customer Service Director</option>
                                                                  </select>
                                                              </div>
                                                          </div>
                                                          <?php endif; ?>

                                                          <?php if ($employee['emp_positionTitle'] === "Tour Visa Processing Staff" || $employee['emp_positionTitle'] === "TourVisaProcessingStaff"): ?>
                                                          <div class="mb-3 row">
                                                              <label for="SubPosition" class="col-md-4 fw-bold">Sub-Position</label>
                                                              <div class="col-md-8">
                                                                  <select class="form-select" id="SubPosition" name="emp_sub" aria-label="Floating label select example" required>
                                                                  <option value="TourVisa Processing Staff">TourVisa Processing Staff</option>
                                                                  <option value="Team Leader">Team Leader</option>
                                                                  <option value="Supervisor">Supervisor</option>
                                                                  </select>
                                                              </div>
                                                          </div>
                                                          <?php endif; ?>

                                                          <?php if ($employee['emp_positionTitle'] === "Sales and Marketing" || $employee['emp_positionTitle'] === "SalesandMarketing"): ?>
                                                          <div class="mb-3 row">
                                                              <label for="SubPosition" class="col-md-4 fw-bold">Sub-Position</label>
                                                              <div class="col-md-8">
                                                                  <select class="form-select" id="SubPosition" name="emp_sub" aria-label="Floating label select example" required>
                                                                  <option value="Sales and Marketing">Sales and Marketing</option>
                                                                  <option value="Sales and Marketing Manager">Sales and Marketing Manager</option>
                                                                  <option value="Sales and Marketing Director">Sales and Marketing Director</option>
                                                                  </select>
                                                              </div>
                                                          </div>
                                                          <?php endif; ?>

                                                          <?php if ($employee['emp_positionTitle'] === "General Manager" || $employee['emp_positionTitle'] === "GeneralManager"): ?>
                                                          <div class="mb-3 row">
                                                              <label for="SubPosition" class="col-md-4 fw-bold">Sub-Position</label>
                                                              <div class="col-md-8">
                                                                  <select class="form-select" id="SubPosition" name="emp_sub" aria-label="Floating label select example" required>
                                                                  <option value="General Manager">General Manager</option>
                                                                  <option value="Board of Director">Board of Director</option>
                                                                  </select>
                                                              </div>
                                                          </div>
                                                          <?php endif; ?>

                                                          <?php if ($employee['emp_positionTitle'] === "Travel Consultant" || $employee['emp_positionTitle'] === "TravelConsultant"): ?>
                                                          <div class="mb-3 row">
                                                              <label for="SubPosition" class="col-md-4 fw-bold">Sub-Position</label>
                                                              <div class="col-md-8">
                                                                  <select class="form-select" id="SubPosition" name="emp_sub" aria-label="Floating label select example" required>
                                                                  <option value="Travel Consultant">Travel Consultant</option>
                                                                  <option value="Travel Consultant Manager">Travel Consultant Manager</option>
                                                                  </select>
                                                              </div>
                                                          </div>
                                                          <?php endif; ?>

                                                          <?php if ($employee['emp_positionTitle'] === "Administrative Staff" || $employee['emp_positionTitle'] === "AdministrativeStaff"): ?>
                                                          <div class="mb-3 row">
                                                              <label for="SubPosition" class="col-md-4 fw-bold">Sub-Position</label>
                                                              <div class="col-md-8">
                                                                  <select class="form-select" id="SubPosition" name="emp_sub" aria-label="Floating label select example" required>
                                                                  <option value="Administrative Staff">Administrative Staff</option>
                                                                  <option value="Administrative Team Leader">Administrative Team Leader</option>
                                                                  <option value="Administrative Supervisor">Administrative Supervisor</option>
                                                                  <option value="Administrative Manager">Administrative Manager</option>
                                                                  </select>
                                                              </div>
                                                          </div>
                                                          <?php endif; ?>

                                                          <?php if ($employee['emp_positionTitle'] === "Database Administrator" || $employee['emp_positionTitle'] === "Database Administrator"): ?>
                                                          <div class="mb-3 row">
                                                              <label for="SubPosition" class="col-md-4 fw-bold">Sub-Position</label>
                                                              <div class="col-md-8">
                                                                  <select class="form-select" id="SubPosition" name="emp_sub" aria-label="Floating label select example" required>
                                                                  <option value="Database Administrator">Database Administrator</option>
                                                                  <option value="Database Supervisor">Database Supervisor</option>
                                                                  <option value="Database Manager">Database Manager</option>
                                                                  </select>
                                                              </div>
                                                          </div>
                                                          <?php endif; ?>

                                                          <?php if ($employee['emp_positionTitle'] === "IT Technical Officer" || $employee['emp_positionTitle'] === "ITTechnicalOfficer"): ?>
                                                          <div class="mb-3 row">
                                                              <label for="SubPosition" class="col-md-4 fw-bold">Sub-Position</label>
                                                              <div class="col-md-8">
                                                                  <select class="form-select" id="SubPosition" name="emp_sub" aria-label="Floating label select example" required>
                                                                  <option value="IT Technical Officer">IT Technical Officer</option>
                                                                  <option value="IT Technical Supervisor">IT Technical Supervisor</option>
                                                                  <option value="IT Technical Manager">IT Technical Manager</option>
                                                                  </select>
                                                              </div>
                                                          </div>
                                                          <?php endif; ?>

                                                          <?php if ($employee['emp_positionTitle'] === "IT Security Officer" || $employee['emp_positionTitle'] === "ITSecurityOfficer"): ?>
                                                          <div class="mb-3 row">
                                                              <label for="SubPosition" class="col-md-4 fw-bold">Sub-Position</label>
                                                              <div class="col-md-8">
                                                                  <select class="form-select" id="SubPosition" name="emp_sub" aria-label="Floating label select example" required>
                                                                  <option value="IT Security Officer">IT Security Officer</option>
                                                                  <option value="IT Security Supervisor">IT Security Supervisor</option>
                                                                  <option value="IT Security Manager">IT Security Manager</option>
                                                                  </select>
                                                              </div>
                                                          </div>
                                                          <?php endif; ?>


                                                        <div class="modal-footer">
                                                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                              <button type="submit" name="promote" class="btn btn-primary">Submit</button>
                                                        </div>
                                                      </form>   
                                                    </div>
                                                </div>
                                              </div>
                                            </div>
                                      <!-- END OF UPDATE EMPLOYEE DETAILS MODAL -->

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
