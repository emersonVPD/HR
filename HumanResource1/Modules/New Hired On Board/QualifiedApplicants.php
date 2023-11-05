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
              <ul class="dropdown-menu collapsed show" id="q3">
                <li><a class="sidebar-link actived" href="QualifiedApplicants.php">Qualified Applicants</a></li>
                <li><a class="sidebar-link" href="EmployeeInformation.php">Employee Information</a></li>
                <li><a class="sidebar-link" href="RequestContract.php">Request Contract</a></li>
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
                <li><a class="sidebar-link" href="../Performance Management/EmployeeEvaluation.php">Employee Evaluation</a></li>
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
              <ul class="dropdown-menu" id="q5">
              <li><a class="sidebar-link" href="../Social Recognition/Certificates.php">Certificates</a></li>
                <li><a class="sidebar-link" href="../Social Recognition/Incentives.php">Incentives</a></li>
                <li><a class="sidebar-link" href="../Social Recognition/PromoteEmployee.php">Promote Employee</a></li>
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
              <h4 class="c-grey-900 mT-10 mB-30 fw-bold">QUALIFIED APPLICANTS</h4>
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
                            <th scope="col">ApplicantID</th>
                            <th scope="col">Fullname</th>
                            <th scope="col">PositionTitle</th>
                            <th scope="col">Status</th>
                            <th scope="col">Email</th>
                            <th scope="col">Curriculum Vitae</th>
                            <th scope="col">View</th>
                          </tr>
                      </thead>
                      <tbody>
                            <?php

                            $sql = mysqli_query($conn, "SELECT * FROM applicanttbl WHERE app_status = 'Qualified'");
                            $row = mysqli_num_rows($sql);
                                if($row > 0){
                                    while ($row = mysqli_fetch_array($sql)) {
                                        # code...
                            ?>

                            <tr>
                                <td class="fw-bold"><?php echo $row['applicantID'];?></td>
                                <td class="fw-bold"><?php echo $row['app_firstname'];?>
                                                    <?php echo $row['app_middlename'];?>
                                                    <?php echo $row['app_lastname'];?>
                                </td>

                                <td class="fw-bold">
                                  <button class="btn btn-dark btn-sm pe-none"><?php echo $row['app_positionTitle'];?></button>
                                </td>
                                <td><?php $status = $row['app_status'];
                                      if ($status);{
                                        if($status == 'Active'){
                                            echo '<button class="btn btn-primary btn-sm pe-none">Active</button>';}
                                        elseif($status == 'Unactive'){
                                            echo '<button class="btn btn-danger btn-sm pe-none">Unactive</button>'; }
                                        elseif($status == 'Failed'){
                                            echo '<button class="btn btn-danger btn-sm pe-none">Failed</button>';}
                                        elseif($status == 'Qualified'){
                                            echo '<button class="btn btn-success btn-sm pe-none">Qualified</button>';}
                                          } ?>
                                </td>

                                <td class="fw-bold"><?php echo $row['app_email'];?></td>
                                <td>
                                    <a href="../../../public/uploads/applicantfiles/<?php echo $row['app_files']; ?>"  
                                       target="_blank" class="btn btn-primary btn-sm">View File
                                    </a>
                                </td>

                                <td>
                                        <button type="button" 
                                                class="btn btn-info" 
                                                data-bs-toggle="modal" title="View"
                                                data-bs-target="#view<?php echo $row['id'] ?>"><i class="bi bi-eye-fill"></i>
                                        </button>

                                        <button type="button" 
                                                class="btn btn-success" 
                                                data-bs-toggle="modal"
                                                title="Update to Employee"
                                                data-bs-target="#create<?php echo $row['id'] ?>"><i class="bi bi-person-check-fill"></i>
                                        </button>

                                    <!-- VIEW APPLICANT DETAILS MODAL -->
                                    <div class="modal fade" id="view<?php echo $row['id'] ?>" aria-labelledby="view" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title fw-bold">VIEW QUALIFIED APPLICANTS</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <table class="table table-striped">
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">Applicant ID</th>
                                                                <td><?php echo $row['applicantID'] ?></td>
                                                            </tr>

                                                            <tr>
                                                                <th scope="row">Fullname</th>
                                                                <td><?php echo $row['app_firstname'] ?>
                                                                    <?php echo $row['app_middlename'] ?>
                                                                    <?php echo $row['app_lastname'] ?></td>
                                                            </tr>

                                                            <tr>
                                                                <th scope="row">Status</th>
                                                                <td><?php $status = $row['app_status'];
                                                                if ($status);{
                                                                  if($status == 'Active'){
                                                                      echo '<button class="btn btn-primary btn-sm">Active</button>';}
                                                                  elseif($status == 'Unactive'){
                                                                      echo '<button class="btn btn-danger btn-sm">Unactive</button>'; }
                                                                  elseif($status == 'Failed'){
                                                                      echo '<button class="btn btn-danger btn-sm">Failed</button>';}
                                                                  elseif($status == 'Qualified'){
                                                                      echo '<button class="btn btn-success btn-sm">Qualified</button>';}
                                                                    } ?>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <th scope="row">Age</th>
                                                                <td><?php echo $row['app_age'] ?></td>
                                                            </tr>

                                                            <tr>
                                                                <th scope="row">Gender</th>
                                                                <td><?php echo $row['app_gender'] ?></td>
                                                            </tr>

                                                            <tr>
                                                                <th scope="row">Address</th>
                                                                <td><?php echo $row['app_address'] ?></td>
                                                            </tr>

                                                            <tr>
                                                                <th scope="row">Birthdate</th>
                                                                <td><?php echo $row['app_birthdate'] ?></td>
                                                            </tr>

                                                            <tr>
                                                                <th scope="row">Birthplace</th>
                                                                <td><?php echo $row['app_birthplace'] ?></td>
                                                            </tr>

                                                            <tr>
                                                                <th scope="row">Position Title</th>
                                                                <td><button class="btn btn-dark btn-sm"><?php echo $row['app_positionTitle']?></button></td>
                                                            </tr>

                                                            <tr>
                                                                <th scope="row">Email</th>
                                                                <td><?php echo $row['app_email'] ?></td>
                                                            </tr>

                                                            <tr>
                                                                <th scope="row">Contact No.</th>
                                                                <td><?php echo $row['app_contactno'] ?></td>
                                                            </tr>

                                                            <tr>
                                                                <th scope="row">Curriculum Vitae File</th>
                                                                <td><a href="../../../public/uploads/applicantfiles/<?php echo $row['app_files']; ?>" target="_blank" class="btn btn-primary btn-sm">
                                                                        <?php echo $row['app_files'] ?></a></td>
                                                            </tr>

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

                                    <!-- UPDATE EMPLOYEE DETAILS MODAL -->
                                    <d iv class="modal fade" id="create<?php echo $row['id'] ?>" aria-labelledby="fillup" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title fw-bold">UPDATE TO EMPLOYEE INFORMATION</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <form action="../../../Controller/EmployeeInformationQuery.php" method="POST" enctype="multipart/form-data">

                                                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">

                                                        <script>
                                                          const employeeIDInput = document.getElementById("employeeIDs");
                                                          const generateButton = document.getElementById("generateEmployeeIDButton");

                                                          // Function to generate an employee ID
                                                          function generateEmployeeID() {
                                                            const randomNumber = Math.floor(10000 + Math.random() * 90000);
                                                            const employeeIDs = `E-${randomNumber.toString()}`;
                                                            employeeIDInput.value = employeeIDs;
                                                          }

                                                          // Add a click event listener to the button
                                                          generateButton.addEventListener("click", generateEmployeeID);
                                                        </script>

                                                        <div class="mb-3 row">
                                                          <label for="" class="col-md-4 form-label fw-bold">Employee ID</label>
                                                          <div class="col-md-8">
                                                            <div class="input-group">
                                                              <input type="text" class="form-control" name="employeeID"  placeholder="EmployeeID" 
                                                                     minlength="7" maxlength="7" required="required">
                                                            
                                                            </div>
                                                          </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <label for="EmployeeImage" class="col-md-4 form-label fw-bold">Daily Rate</label>
                                                            <div class="col-md-8">
                                                                <input type="number" class="form-control" 
                                                                       name="daily_rate" mix="1" max="100000" 
                                                                       value="<?php echo $row['daily_rate']; ?>"
                                                                       placeholder="Daily Rate" required="required">
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <label for="PositionTitle" class="col-md-4 fw-bold">Position Title</label>
                                                            <div class="col-md-8">
                                                                <input type="text" value="<?php echo $row['app_positionTitle'];?>" 
                                                                      name="emp_positionTitle" 
                                                                      class="form-control"
                                                                      readonly>

                                                            </div>
                                                          </div>

                                                        <input type="hidden" value="New Hired on Board" name="emp_status">

                                                        <div class="mb-3 row">
                                                            <label for="EmployeeImage" class="col-md-4 form-label fw-bold">Employee Image</label>
                                                            <div class="col-md-8">
                                                                <input type="file" class="form-control" name="emp_image" placeholder="Employee Image" required="required">
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <label for="DateHired" class="col-md-4 form-label fw-bold">Date Hired</label>
                                                            <div class="col-md-8">
                                                                <input type="date" class="form-control" name="emp_dateHired" placeholder="dateHired" required="required">
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <label for="PositionTitle" class="col-md-4 fw-bold">Department</label>
                                                            <div class="col-md-8">
                                                                <select class="form-select" name="emp_department" aria-label="Floating label select example" required>

                                                                    <option selected disabled value="">Select Department</option>
                                                                    <option value="IT Department">IT Department</option>
                                                                    <option value="Customer Service Department">Customer Service Department</option>
                                                                    <option value="HR Department">HR Department</option>
                                                                    <option value="Admin Department">Admin Department</option>
                                                                    <option value="Finance Department">Finance Department</option>
                                                                </select>
                                                            </div>
                                                        </div><hr>

                                                        <div class="mb-3 row">
                                                            <label for="Firstname" class="col-md-4 form-label fw-bold">Firstname</label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="emp_firstname" value="<?php echo $row['app_firstname']; ?>" placeholder="Firstname" required="required">
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <label for="Middlename" class="col-md-4 form-label fw-bold">Middlename</label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="emp_middlename" value="<?php echo $row['app_middlename']; ?>" placeholder="Middlename" required="required">
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <label for="Lastname" class="col-md-4 form-label fw-bold">Lastname</label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="emp_lastname" value="<?php echo $row['app_lastname']; ?>" placeholder="Lastname" required="required">
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <label for="Gender" class="col-md-4 form-label fw-bold">Gender</label>
                                                            <div class="col-md-8">

                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="emp_gender" value="Male" required="required" <?php if($row["app_gender"] == 'Male' ) { echo"checked"; };?>>

                                                                    <label class="form-check-label" for="gender">Male</label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="emp_gender" value="Female" required="required" <?php if($row["app_gender"] == 'Female' ) { echo"checked"; };?>>

                                                                    <label class="form-check-label" for="gender">Female</label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="emp_gender" value="Undecided" required="required" <?php if($row["app_gender"] == 'Undecided' ) { echo"checked"; };?>>

                                                                    <label class="form-check-label" for="gender">Undecided</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <label for="Address" class="col-md-4 fw-bold">Complete Address</label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="emp_address" value="<?php echo $row['app_address']; ?>" placeholder="Street / Brgy / City / State / Zip Code" required="required">
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <label for="Age" class="col-md-4 fw-bold">Age</label>
                                                            <div class="col-md-8">
                                                                <input type="number" class="form-control" name="emp_age" value="<?php echo $row['app_age']; ?>" placeholder="Age" required="required">
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <label for="Birthdate" class="col-md-4 fw-bold">Birthdate</label>
                                                            <div class="col-md-8">
                                                                <input type="date" class="form-control" name="emp_birthdate" value="<?php echo $row['app_birthdate']; ?>" placeholder="Birthdate" required="required">
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <label for="Birthplace" class="col-md-4 fw-bold">Birthplace</label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="emp_birthplace" value="<?php echo $row['app_birthplace']; ?>" placeholder="Birthplace" required="required">
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <label for="Contact No" class="col-md-4 fw-bold">Contact No.</label>
                                                            <div class="col-md-8">
                                                                <input type="number" class="form-control" name="emp_contactno" value="<?php echo $row['app_contactno']; ?>" placeholder="Contact No" required="required">
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <label for="Email" class="col-md-4 fw-bold">Email</label>
                                                            <div class="col-md-8">
                                                                <input type="email" class="form-control" name="emp_email" value="<?php echo $row['app_email']; ?>" placeholder="Email" required="required">
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit" name="submit" class="btn btn-primary">Create</button>
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
