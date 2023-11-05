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
              <ul class="dropdown-menu collapsed show" id="q2">
                <li><a class="sidebar-link actived" href="ApplicantInformation.php">Applicant Information</a></li>
                <li><a class="sidebar-link" href="ApplicantSchedule.php">Applicant Schedule</a></li>
                <li><a class="sidebar-link" href="InitialInterview.php">Applicant Initial Interview</a></li>
                <li><a class="sidebar-link" href="FinalInterview.php">Applicant Final Interview</a></li>
                <li><a class="sidebar-link" href="RequestExam.php">Request Exam Module</a></li>
                <li><a class="sidebar-link" href="ApplicantExamResult.php">Applicant Exam Result</a></li>
                <li><a class="sidebar-link" href="ApplicantResult.php">Applicant Result</a></li>
                <li><a class="sidebar-link" href="RequestFacility.php">Request Facility</a></li>

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
                <li><a class="sidebar-link" href="../New Hired On Board/EmployeeInformation.php">Employee Information</a></li>
                <li><a class="sidebar-link" href="../New Hired On Board/RequestContract.php">Request Contract</a></li>
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

        <!-- ### $App Screen Content ### -->
        <main class="main-content bgc-grey-100">
          <div id="mainContent">
            <div class="container-fluid">
              <h4 class="c-grey-900 mT-10 mB-30 fw-bold">APPLICANT INFORMATION</h4>
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
                            <th scope="col">ApplicantID</th>
                            <th scope="col">Fullname</th>
                            <th scope="col">Status</th>
                            <th scope="col">PositionTitle</th>
                            <th scope="col">Curriculum Vitae</th>
                            <th scope="col">Action</th>
                          </tr>
                    </thead>
                           <tbody id="myTable">
                            <?php

                            $sql = mysqli_query($conn, "SELECT * FROM applicanttbl");
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

                                <td>
                                  <?php $status = $row['app_status'];
                                      if ($status);{
                                          if($status == 'Active'){
                                              echo '<button class="btn btn-primary btn-sm pe-none">Active</button>';}
                                          elseif($status == 'Unactive'){
                                              echo '<button class="btn btn-danger btn-sm pe-none">Unactive</button>'; }
                                          elseif($status == 'Approved'){
                                              echo '<button class="btn btn-success btn-sm pe-none">Approved</button>';}
                                          elseif($status == 'Failed'){
                                              echo '<button class="btn btn-danger btn-sm pe-none">Failed</button>';}
                                          elseif($status == 'Qualified'){
                                              echo '<button class="btn btn-success btn-sm pe-none">Qualified</button>';}
                                          elseif($status == 'Reserved'){
                                              echo '<button class="btn btn-info btn-sm pe-none fw-bold">Reserved</button>';}
                                      } 
                                  ?>
                                </td>

                                <td class="fw-bold"><button class="btn btn-dark btn-sm pe-none">
                                                    <?php echo $row['app_positionTitle'];?>
                                                    </button>
                                </td>

                                <td><a href="../../../public/uploads/applicantfiles/<?php echo $row['app_files'];?>" 
                                       target="_blank">
                                        <button class="btn btn-primary btn-sm">View File</button>
                                    </a>
                                </td>

                                <td>
                                        <button type="button" 
                                                class="btn btn-info" 
                                                data-bs-toggle="modal"
                                                title="View"
                                                data-bs-target="#view<?php echo $row['id'] ?>"><i class="bi bi-eye-fill"></i>
                                        </button>

                          <!-- VIEW APPLICANT DETAILS MODAL -->
                              <div class="modal fade" id="view<?php echo $row['id'] ?>" aria-labelledby="view" aria-hidden="true">
                                  <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                          <h4 class="modal-title fw-bold">VIEW APPLICANT INFORMATION</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                      <form method="POST">

                                          <table class="table table-striped">
                                            <tbody>
                                                <tr><th scope="row">Applicant ID</th>
                                                  <td><?php echo $row['applicantID'] ?></td></tr>

                                                <tr><th scope="row">Date Apply</th>
                                                  <td><?php $date = $row['app_applydate'];
                                                          $date = strtotime ($date);
                                                          $date = date ('F j, Y', $date);
                                                          echo $date;?></td></tr>

                                                <tr><th scope="row">Fullname</th>
                                                  <td><?php echo $row['app_firstname'] ?>
                                                      <?php echo $row['app_middlename'] ?>
                                                      <?php echo $row['app_lastname'] ?></td></tr>

                                                <tr><th scope="row">Status</th>
                                                  <td>
                                                    <?php $status = $row['app_status'];
                                                        if ($status);{
                                                            if($status == 'Active'){
                                                                echo '<button class="btn btn-primary btn-sm pe-none">Active</button>';}
                                                            elseif($status == 'Unactive'){
                                                                echo '<button class="btn btn-danger btn-sm pe-none">Unactive</button>'; }
                                                            elseif($status == 'Approved'){
                                                                echo '<button class="btn btn-success btn-sm pe-none">Approved</button>';}
                                                            elseif($status == 'Failed'){
                                                                echo '<button class="btn btn-danger btn-sm pe-none">Failed</button>';}
                                                            elseif($status == 'Qualified'){
                                                                echo '<button class="btn btn-success btn-sm pe-none">Qualified</button>';}
                                                            elseif($status == 'Reserved'){
                                                                echo '<button class="btn btn-info btn-sm pe-none fw-bold">Reserved</button>';}
                                                        } 
                                                    ?>
                                                </td></tr>

                                                <tr><th scope="row">Age</th>
                                                  <td><?php echo $row['app_age'] ?></td></tr>

                                               <tr><th scope="row">Gender</th>
                                                  <td><?php echo $row['app_gender'] ?></td></tr>

                                                <tr><th scope="row">Address</th>
                                                  <td><?php echo $row['app_address'] ?></td></tr>

                                                <tr><th scope="row">Birthdate</th>
                                                  <td><?php $date = $row['app_birthdate'];
                                                          $date = strtotime ($date);
                                                          $date = date ('F j, Y', $date);
                                                          echo $date;?></td></tr>

                                                <tr><th scope="row">Birthplace</th>
                                                  <td><?php echo $row['app_birthplace'] ?></td></tr>

                                                <tr><th scope="row">Position Title</th>
                                                  <td><button class="btn btn-dark btn-sm pe-none"><?php echo $row['app_positionTitle']?></button></td></tr>

                                                <tr><th scope="row">Email</th>
                                                  <td><?php echo $row['app_email'] ?></td></tr> 

                                                <tr><th scope="row">Contact No.</th>
                                                  <td><?php echo $row['app_contactno'] ?></td></tr>

                                                <tr><th scope="row">Curriculum Vitae File</th>
                                                  <td><a href="../../../public/uploads/applicantfiles/<?php echo $row['app_files']; ?>"  
                                                         target="_blank" 
                                                         class="btn btn-primary btn-sm">
                                                         <?php echo $row['app_files'] ?></a></td>
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

                                        <button type="button" 
                                                class="btn btn-warning" 
                                                data-bs-toggle="modal"
                                                title="Edit"
                                                data-bs-target="#edit<?php echo $row['id'] ?>"><i class="bi bi-pencil-fill"></i>
                                        </button>

                          <!-- UPDATE APPLICANT DETAILS MODAL -->
                                      <div class="modal fade" id="edit<?php echo $row['id'] ?>" aria-labelledby="fillup" aria-hidden="true">
                                          <div class="modal-dialog modal-lg">
                                           <div class="modal-content">
                                           <div class="modal-header">
                                           <h4 class="modal-title fw-bold">UPDATE APPLICANT INFORMATION</h4>
                                           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                  <!-- Modal body -->
                                           <div class="modal-body">
                                           <form action="../../../Controller/ApplicantInformationQuery.php" method="POST" enctype="multipart/form-data">

                                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">

                                            <div class="mb-3 row">
                                                <label for="" class="col-md-4 form-label fw-bold">ApplicantID</label>
                                              <div class="col-md-8">
                                                <input type="text" 
                                                       class="form-control" 
                                                       name="applicantID"
                                                       minlength="7"
                                                       maxlength="7"
                                                       value="<?php echo $row['applicantID']; ?>"  
                                                       placeholder="ApplicantID"
                                                       required="required">
                                              </div>
                                            </div>

                                        <div class="mb-3 row">
                                                <label for="" class="col-md-4 fw-bold">Date Apply</label>
                                                <div class="col-md-8">
                                            <input type="date" 
                                                   class="form-control" 
                                                   name="app_applydate"
                                                   value="<?php echo $row['app_applydate']; ?>"
                                                   required="required">
                                                    </div>
                                              </div>

                                            <div class="mb-3 row">
                                                <label for="Firstname" class="col-md-4 form-label fw-bold">Firstname</label>
                                              <div class="col-md-8">
                                                <input type="text" 
                                                       class="form-control" 
                                                       name="app_firstname" 
                                                       value="<?php echo $row['app_firstname']; ?>" 
                                                       placeholder="Firstname"
                                                       required="required">
                                              </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="Middlename" class="col-md-4 form-label fw-bold">Middlename</label>
                                              <div class="col-md-8">
                                                <input type="text" 
                                                       class="form-control" 
                                                       name="app_middlename"
                                                       value="<?php echo $row['app_middlename']; ?>"  
                                                       placeholder="Middlename"
                                                       required="required">
                                              </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="Lastname" class="col-md-4 form-label fw-bold">Lastname</label>
                                              <div class="col-md-8">
                                                <input type="text" 
                                                       class="form-control" 
                                                       name="app_lastname"
                                                       value="<?php echo $row['app_lastname']; ?>"  
                                                       placeholder="Lastname"
                                                       required="required">
                                              </div>
                                            </div>

                                            <div class="mb-3 row">
                                              <label for="Applicant Status" class="col-md-4 fw-bold">Applicant Status</label>
                                              <div class="col-md-8">
                                                    <select class="form-select" 
                                                            name="app_status" 
                                                            aria-label="Floating label select example"
                                                            required>

                                                      <option value="<?php echo $row['app_status'];?>">
                                                                     <?php echo $row['app_status'];?>
                                                      </option> 
                                                      <option value="Active">Active</option>
                                                      <option value="Unactive">Unactive</option>
                                                      <option value="Approved">Approved</option>
                                                      <option value="Failed">Failed</option>
                                                      <option value="Qualified">Qualified</option>
                                                      <option value="Reserved">Reserved</option>
                                                    </select>
                                               </div>
                                               </div>


                                            <div class="mb-3 row">
                                                <label for="Age" class="col-md-4 form-label fw-bold">Age</label>
                                              <div class="col-md-8">
                                                <input type="number" 
                                                       class="form-control"  
                                                       name="app_age"
                                                       value="<?php echo $row['app_age']; ?>"  
                                                       placeholder="Age"
                                                       required="required">
                                                  </div>
                                            </div>

                                      <div class="mb-3 row">
                                          <label for="Gender" class="col-md-4 form-label fw-bold">Gender</label>
                                      <div class="col-md-8">

                                                <div class="form-check form-check-inline">
                                              <input class="form-check-input" 
                                                     type="radio" 
                                                     name="app_gender" 
                                                     value="Male"
                                                     required="required"

                                              <?php if($row["app_gender"] == 'Male' ) { echo"checked"; };?>>

                                              <label class="form-check-label" for="gender">Male</label>
                                          </div>

                                          <div class="form-check form-check-inline">
                                              <input class="form-check-input" 
                                                     type="radio" 
                                                     name="app_gender" 
                                                     value="Female"
                                                     required="required"

                                              <?php if($row["app_gender"] == 'Female' ) { echo"checked"; };?>>

                                              <label class="form-check-label" for="gender">Female</label>
                                          </div>

                                          <div class="form-check form-check-inline">
                                              <input class="form-check-input" 
                                                     type="radio" 
                                                     name="app_gender" 
                                                     value="Undecided"
                                                     required="required"

                                              <?php if($row["app_gender"] == 'Undecided' ) { echo"checked"; };?>>

                                              <label class="form-check-label" for="gender">Undecided</label>
                                        </div>
                                        </div>
                                        </div>

                                      <div class="mb-3 row">
                                                <label for="Address" class="col-md-4 fw-bold">Complete Address</label>
                                                <div class="col-md-8">
                                            <input type="text" 
                                                   class="form-control" 
                                                   id="address" 
                                                   name="app_address"
                                                   value="<?php echo $row['app_address']; ?>"   
                                                   placeholder="Street / Brgy / City / State / Zip Code"
                                                   required="required">
                                              </div>
                                              </div>


                                        <div class="mb-3 row">
                                                <label for="Birthdate" class="col-md-4 fw-bold">Birthdate</label>
                                                <div class="col-md-8">
                                            <input type="date" 
                                                   class="form-control" 
                                                   name="app_birthdate"
                                                   value="<?php echo $row['app_birthdate']; ?>"   
                                                   placeholder="Birthdate"
                                                   required="required">
                                                    </div>
                                              </div>

                                              <div class="mb-3 row">
                                                <label for="Birthplace" class="col-md-4 fw-bold">Birthplace</label>
                                                <div class="col-md-8">
                                            <input type="text" 
                                                   class="form-control" 
                                                   name="app_birthplace"
                                                   value="<?php echo $row['app_birthplace']; ?>"    
                                                   placeholder="Birthplace City ( Ex : Davao City )"
                                                   required="required">
                                                    </div>
                                              </div>

                                            <div class="mb-3 row">
                                              <label for="PositionTitle" class="col-md-4 fw-bold">Position Title</label>
                                              <div class="col-md-8">
                                                    <select class="form-select" 
                                                          name="app_positionTitle" 
                                                          aria-label="Floating label select example"
                                                          required>

                                                      <option value="<?php echo $row['app_positionTitle'];?>"><?php echo $row['app_positionTitle'];?></option> 
                                                      <option value="Customer Service Agent">Customer Service Agent</option>
                                                      <option value="Customer Service Manager">Customer Service Manager</option>
                                                      <option value="Tour VisaProcessing Staff">Tour Visa Processing Staff</option>
                                                      <option value="Project Manager">Project Manager</option>
                                                      <option value="Sales and Marketing">Sale and Marketing</option>
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
                                                      <option value="IT Security Officer">ITSecurity Officer</option>
                                                    </select>
                                               </div>
                                               </div>


                                               <div class="mb-3 row">
                                                <label for="Email" class="col-md-4 form-label fw-bold">Email</label>
                                                <div class="col-md-8">
                                                  <input type="email" 
                                                       class="form-control" 
                                                       id="email" 
                                                       name="app_email"
                                                       value="<?php echo $row['app_email']; ?>"    
                                                       placeholder="Email"
                                                       required="required">
                                              </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="ContactNo" class="col-md-4 form-label fw-bold">Contact No.</label>
                                              <div class="col-md-8">
                                                  <input type="number" 
                                                       class="form-control" 
                                                       id="ContactNo" 
                                                       name="app_contactno"
                                                       value="<?php echo $row['app_contactno']; ?>"    
                                                       placeholder="Contact No."
                                                       required="required">
                                              </div>
                                            </div>

                                           <div class="mb-3 row">
                                                <label for="CV" class="col-md-4 form-label fw-bold">Current Curriculum Vitae</label>
                                                <div class="col-md-8">
                                                    <a href="../../../public/uploads/applicantfiles/<?php echo $row['app_files']; ?>"  
                                                         target="_blank" 
                                                         class="btn btn-primary btn-sm">
                                                         <?php echo $row['app_files'] ?></a>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="CV" class="col-md-4 form-label fw-bold">Update Curriculum Vitae</label>
                                                <div class="col-md-8">
                                                  <input type="file" 
                                                         name="app_files"
                                                         class="form-control">

                                                  <input type="hidden"
                                                         name="app_files_old" 
                                                         value="<?php echo $row['app_files']; ?>"> 
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                  <button type="submit" name="update" class="btn btn-success">Update</button>
                                              </form>
                                                  

                                            </div>
                                        </div>
                                        </div>
                                        </div>
                                        </div>

                          <!-- END OF UPDATE APPLICANT DETAILS MODAL -->

                                          <!-- <button type="button" 
                                                  class="btn btn-danger" 
                                                  data-bs-toggle="modal"
                                                  title="Delete"
                                                  data-bs-target="#delete<?php echo $row['id'] ?>"><i class="bi bi-trash"></i>
                                          </button>  -->

                          <!-- DELETE EMPLOYEE DETAILS MODAL -->          
                                  <div class="modal fade" id="delete<?php echo $row['id'] ?>" aria-labelledby="view" aria-hidden="true">
                                     <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title fw-bold">DELETE APPLICANTS INFORMATION</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                              </div>

                                      <div class="modal-body">
                                          <form action="../../../Controller/ApplicantInformationQuery.php" method="POST">
                                              <p class="text-center fw-bold">ARE YOU SURE YOU WANT TO DELETE THIS ?</p>
                                              <hr>

                                            <div class="mb-3 row">
                                                <label for="" class="col-md-4 form-label fw-bold">Applicant ID</label>
                                              <div class="col-md-8">
                                                    <input class="form-control"
                                                           type="text" 
                                                           readonly class="form-control-plaintext" 
                                                           value="<?php echo $row['applicantID'];?>">
                                              </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="" class="col-md-4 form-label fw-bold">Fullname</label>
                                              <div class="col-md-8">
                                                    <input class="form-control"
                                                           type="text" 
                                                           readonly class="form-control-plaintext" 
                                                           value="<?php echo $row['app_firstname'] ?>&nbsp;
                                                                  <?php echo $row['app_middlename'] ?>&nbsp;
                                                                  <?php echo $row['app_lastname'] ?> ">
                                              </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="" class="col-md-4 form-label fw-bold">PositionTitle</label>
                                              <div class="col-md-8">
                                                    <input class="form-control"
                                                           type="text" 
                                                           readonly class="form-control-plaintext" 
                                                           value="<?php echo $row['app_positionTitle'] ?>">
                                              </div>
                                            </div>  

                                              <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                              <input type="hidden" name="del_app_files" value="<?php echo $row['app_files']; ?>">
                                          
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                                            </form>
                                                
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
