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
                <li><a class="sidebar-link actived" href="../Applicant Management/ApplicantInformation.php">Applicant Information</a></li>
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
                <li><a class="sidebar-link" href="QualifiedApplicants.php">Qualified Applicants</a></li>
                <li><a class="sidebar-link actived" href="EmployeeInformation.php">Employee Information</a></li>
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
                      width="100%">
                    
                      <thead>
                        <tr>
                          <th scope="col">EmployeeID</th>
                          <!-- <th scope="col">Image</th> -->
                          <th scope="col">Fullname</th>
                          <th scope="col">Position</th>
                          <th scope="col">Status</th>
                          <th scope="col">Email</th>
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
                              <td class="fw-bold"><?php echo $employee['emp_firstname'];?><?php echo $employee['emp_middlename'];?><?php echo $employee['emp_lastname'];?></td>
                              <td class="fw-bold">
                                <button class="btn btn-dark btn-sm pe-none">
                                  <?php echo $employee['emp_positionTitle'];?>
                                </button>
                              </td>
                              <td class="fw-bold"><button class="btn btn-primary btn-sm pe-none"><?php echo $employee['emp_status'];?></button></td>
                              <td class="fw-bold"><?php echo $employee['emp_email'];?></td>

                              <td>
                                <button type="button" 
                                        class="btn btn-info" 
                                        data-bs-toggle="modal"
                                        title="View"
                                        data-bs-target="#view<?php echo $employee['id'] ?>"><i class="bi bi-eye-fill"></i>
                                </button>

                                <!-- <button type="button" 
                                        class="btn btn-warning" 
                                        data-bs-toggle="modal" title="Edit" 
                                        data-bs-target="#edit<?php echo $employee['id'] ?>">
                                        <i class="bi bi-pencil-fill"></i>
                                </button> -->

                                <!-- <button type="button" 
                                        class="btn btn-danger" 
                                        data-bs-toggle="modal"
                                        title="Delete"
                                        data-bs-target="#delete<?php echo $employee['id'] ?>"><i class="bi bi-trash"></i>
                                </button> -->

                                <button type="button" class="btn btn-success" 
                                        data-bs-toggle="modal" title="Create Employee Account" 
                                        data-bs-target="#addaccount<?php echo $employee['id'] ?>">
                                        <i class="bi bi-person-badge"></i>
                                </button>


                                <div class="modal fade" id="view<?php echo $employee['id'] ?>" aria-labelledby="view" aria-hidden="true">
                                  <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h4 class="modal-title fw-bold">EMPLOYEE INFORMATION</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <!-- Modal body -->
                                      <div class="modal-body">
                                        <form method="POST">
                                          <table class="table table-striped">
                                            <tbody>
                                              <tr>
                                                <th scope="row">Employee ID</th>
                                                <td>
                                                  <?php echo $employee['employeeID'] ?>
                                                </td>
                                              </tr>
                                              <tr>
                                                <th scope="row">Employee Image</th>
                                                <td>
                                                  <img src="../../../public/uploads/employeeimage/<?php echo $employee['emp_image'];?>" height="150px" width="150px">
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <th scope="row">Fullname</th>
                                                  <td>
                                                    <?php echo $employee['emp_firstname'] ?>
                                                    <?php echo $employee['emp_middlename'] ?>
                                                    <?php echo $employee['emp_lastname'] ?>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <th scope="row">Position Title</th>
                                                  <td>
                                                    <button class="btn btn-dark btn-sm">
                                                      <?php echo $employee['emp_positionTitle'] ?>
                                                    </button>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <th scope="row">Status</th>
                                                  <td>
                                                    <button class="btn btn-primary btn-sm">
                                                      <?php echo $employee['emp_status'] ?>
                                                    </button>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <th scope="row">Date Hired</th>
                                                  <td>
                                                    <?php $date = $employee['emp_dateHired'];
                                                                                    $date = strtotime ($date);
                                                                                    $date = date ('F j, Y', $date);
                                                                                    echo $date;?>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <th scope="row">Department</th>
                                                  <td>
                                                    <?php echo $employee['emp_department'] ?>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <th scope="row">Gender</th>
                                                  <td>
                                                    <?php echo $employee['emp_gender'] ?>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <th scope="row">Address</th>
                                                  <td>
                                                    <?php echo $employee['emp_address'] ?>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <th scope="row">Age</th>
                                                  <td>
                                                    <?php echo $employee['emp_age'] ?>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <th scope="row">Birthdate</th>
                                                  <td>
                                                    <?php echo $employee['emp_birthdate'] ?>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <th scope="row">Birthplace</th>
                                                  <td>
                                                    <?php echo $employee['emp_birthplace'] ?>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <th scope="row">Contact No</th>
                                                  <td>
                                                    <?php echo $employee['emp_contactno'] ?>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <th scope="row">Email</th>
                                                  <td>
                                                    <?php echo $employee['emp_email'] ?>
                                                  </td>
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
                                  
                                <div class="modal fade" id="edit<?php echo $employee['id'] ?>" aria-labelledby="fillup" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
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
                                                        <label for="" class="col-md-4 form-label fw-bold">Employee ID</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="employeeID" minlength="7" maxlength="7" value="<?php echo $employee['employeeID']; ?>" placeholder="EmployeeID" required="required">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="Employee Image" class="col-md-4 form-label fw-bold">Employee Image</label>
                                                        <div class="col-md-8">
                                                            <img src="../../../public/uploads/employeeimage/<?php echo $employee['emp_image'];?>" height="150px" width="150px">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="Employee Image" class="col-md-4 form-label fw-bold">Update Employee Image</label>
                                                        <div class="col-md-8">
                                                            <input type="file" name="emp_image" class="form-control">
                                                            <input type="hidden" name="emp_image_old" value="<?php echo $employee['emp_image']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="Firstname" class="col-md-4 form-label fw-bold">Firstname</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="emp_firstname" value="<?php echo $employee['emp_firstname']; ?>" placeholder="Firstname" required="required">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="Middlename" class="col-md-4 form-label fw-bold">Middlename</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="emp_middlename" value="<?php echo $employee['emp_middlename']; ?>" placeholder="Middlename" required="required">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="Lastname" class="col-md-4 form-label fw-bold">Lastname</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="emp_lastname" value="<?php echo $employee['emp_lastname']; ?>" placeholder="Lastname" required="required">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="PositionTitle" class="col-md-4 fw-bold">Position Title</label>
                                                        <div class="col-md-8">
                                                            <select class="form-select" name="emp_positionTitle" aria-label="Floating label select example" required>
                                                                <option value=" <?php echo $employee['emp_positionTitle'];?>"><?php echo $employee['emp_positionTitle'];?>
                                                                </option>
                                                                <option value="Customer Service Agent">Customer Service Agent</option>
                                                                <option value="Customer Service Manager">Customer Service Manager</option>
                                                                <option value="Tour Visa Processing Staff">Tour Visa Processing Staff</option>
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
                                                        <label for="Employee Status" class="col-md-4 fw-bold">Employee Status</label>
                                                        <div class="col-md-8">
                                                            <select class="form-select" name="emp_status" aria-label="Floating label select example" required>
                                                                <option value="<?php echo $employee['emp_status'];?>"><?php echo $employee['emp_status'];?>
                                                                </option>
                                                                <option value="New Hired on Board">New Hired on Board</option>
                                                                <option value="Full Time Employee">Fulltime Employee</option>
                                                                <option value="Part Time Employee">Part-Time Employee</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="DateHired" class="col-md-4 form-label fw-bold">Date Hired</label>
                                                        <div class="col-md-8">
                                                            <input type="date" class="form-control" name="emp_dateHired" value=" <?php echo $employee['emp_dateHired']; ?>" placeholder="dateHired" required="required">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="Department" class="col-md-4 fw-bold">Department</label>
                                                        <div class="col-md-8">
                                                            <select class="form-select" name="emp_department" aria-label="Floating label select example" required>
                                                                <option value=" <?php echo $employee['emp_department'];?>"><?php echo $employee['emp_department'];?>
                                                                </option>
                                                                <option value="IT Department">IT Department</option>
                                                                <option value="Customer Service Department">Customer Service Department</option>
                                                                <option value="HR Department">HR Department</option>
                                                                <option value="Admin Department">Admin Department</option>
                                                                <option value="Finance Department">Finance Department</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="Gender" class="col-md-4 form-label fw-bold">Gender</label>
                                                        <div class="col-md-8">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="emp_gender" value="Male" required="required" <?php if($employee["emp_gender"] == 'Male' ) { echo"checked"; };?>>
                                                                <label class="form-check-label" for="gender">Male</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="emp_gender" value="Female" required="required" <?php if($employee["emp_gender"] == 'Female' ) { echo"checked"; };?>>
                                                                <label class="form-check-label" for="gender">Female</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="emp_gender" value="Undecided" required="required" <?php if($employee["emp_gender"] == 'Undecided' ) { echo"checked"; };?>>
                                                                <label class="form-check-label" for="gender">Undecided</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="Address" class="col-md-4 fw-bold">Complete Address</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="emp_address" value="<?php echo $employee['emp_address']; ?>" placeholder="Street / Brgy / City / State / Zip Code" required="required">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="Age" class="col-md-4 fw-bold">Age</label>
                                                        <div class="col-md-8">
                                                            <input type="number" class="form-control" name="emp_age" value="<?php echo $employee['emp_age']; ?>" placeholder="Age" required="required">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="Birthdate" class="col-md-4 fw-bold">Birthdate</label>
                                                        <div class="col-md-8">
                                                            <input type="date" class="form-control" name="emp_birthdate" value=" <?php echo $employee['emp_birthdate']; ?>" placeholder="Birthdate" required="required">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="Birthplace" class="col-md-4 fw-bold">Birthplace</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="emp_birthplace" value="<?php echo $employee['emp_birthplace']; ?>" placeholder="Birthplace" required="required">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="Contact No" class="col-md-4 fw-bold">Contact No.</label>
                                                        <div class="col-md-8">
                                                            <input type="number" class="form-control" name="emp_contactno" value="<?php echo $employee['emp_contactno']; ?>" placeholder="Contact No" required="required">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="Email" class="col-md-4 fw-bold">Email</label>
                                                        <div class="col-md-8">
                                                            <input type="email" class="form-control" name="emp_email" value=" <?php echo $employee['emp_email']; ?>" placeholder="Email" required="required">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" name="update" class="btn btn-success">Update</button>
                                                    </div>                                                    
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
             
                                <div class="modal fade" id="delete<?php echo $employee['id'] ?>" aria-labelledby="view" aria-hidden="true">
                                  <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title fw-bold">DELETE EMPLOYEE INFORMATION</h5>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">
                                              <form action="../../../Controller/EmployeeInformationQuery.php" method="POST">
                                                  <p class="text-center fw-bold">ARE YOU SURE YOU WANT TO DELETE THIS ?</p>
                                                  <hr>
                                                  <div class="mb-3 row">
                                                      <label for="" class="col-md-4 form-label fw-bold">Employee ID</label>
                                                      <div class="col-md-8">
                                                          <input class="form-control" type="text" readonly class="form-control-plaintext" 
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
                                                          <input class="form-control" type="text" readonly class="form-control-plaintext" 
                                                          value="<?php echo $employee['emp_firstname'];?>&nbsp;<?php echo $employee['emp_middlename'];?>&nbsp;<?php echo $employee['emp_lastname'];?>">
                                                      </div>
                                                  </div>
                                                  <div class="mb-3 row">
                                                      <label for="" class="col-md-4 form-label fw-bold">Position Title</label>
                                                      <div class="col-md-8">
                                                          <input class="form-control" type="text" readonly class="form-control-plaintext" 
                                                          value="<?php echo $employee['emp_positionTitle'];?>">
                                                      </div>
                                                  </div>
                                                  <input type="hidden" name="delete_id" value="<?php echo $employee['id']; ?>">
                                                  <input type="hidden" name="del_emp_img" value="<?php echo $employee['emp_image']; ?>">
                                                  <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                      <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                                                  </div>
                                              </form>
                                          </div>
                                      </div>
                                  </div>
                                </div>

                                <div class="modal fade" id="addaccount<?php echo $employee['id'] ?>" aria-labelledby="addaccount" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title fw-bold">ADD EMPLOYEE ACCOUNTS</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <form action="../../../Controller/essaccountsQuery.php" method="POST">

                                                   <div class="mb-3 row">
                                                        <label for="" class="col-md-4 form-label fw-bold">Employee ID</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="employeeID" value="<?php echo $employee['employeeID']; ?>" placeholder="EmployeeID" required="required" readonly>
                                                        </div>
                                                    </div>

                                                    <input type="hidden" name="daily_rate" value="<?php echo $employee['daily_rate']; ?>">
 
                                                    <div class="mb-3 row">
                                                        <label for="" class="col-md-4 form-label fw-bold">Username</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="username" minlength="8" maxlength="15" placeholder="Username" required="required">
                                                        </div>
                                                    </div>

                                                    <div class="mb-3 row">
                                                        <label for="4 Pin" class="col-md-4 form-label fw-bold">Password</label>
                                                        <div class="col-md-8">
                                                            <input type="password" name="password" class="password form-control" minlength="8" maxlength="15" placeholder="Password">
                                                            <i class="bi bi-eye-slash eye-icon id1" id="togglePassword"></i>
                                                        </div>
                                                    </div>

                                                    <hr>
                                                    <div class="mb-3 row">
                                                        <label for="" class="col-md-4 form-label fw-bold">Firstname</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" 
                                                                  name="ess_firstname" placeholder="Enter Firstname" 
                                                                  value="<?php echo $employee['emp_firstname'] ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="" class="col-md-4 form-label fw-bold">Middlename</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" 
                                                                  name="ess_middlename" 
                                                                  placeholder="Middlename" 
                                                                  value="<?php echo $employee['emp_middlename'] ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="" class="col-md-4 form-label fw-bold">Lastname</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" 
                                                                  name="ess_lastname" placeholder="Enter Lastname" 
                                                                  value="<?php echo $employee['emp_lastname'] ?>" 
                                                                  readonly>
                                                        </div>
                                                    </div>

                                                    <input type="hidden" value="1234" name="mpin">
                                                    <!-- <div class="mb-3 row">
                                                        <label for="" class="col-md-4 form-label fw-bold">4 Pin Security</label>
                                                        <div class="col-md-8">
                                                            <input type="password" 
                                                                  name="mpin" minlength="4" maxlength="4" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" 
                                                                  class="password form-control" placeholder="Enter 4 Pin" />
                                                                <i class="bi bi-eye-slash eye-icon id2" id="togglePassword"></i>
                                                        </div>
                                                    </div> -->
                                                    <style>
                                                      .id1 {
                                                          position: absolute;
                                                          margin: -28px 0 0 470px;
                                                      }

                                                      .id2 {
                                                          position: absolute;
                                                          margin: -28px 0 0 470px;
                                                      }
                                                    </style>

                                                    <script>
                                                       const forms = document.querySelector(".forms"),
                                                            pwShowHide = document.querySelectorAll(".eye-icon"),
                                                            links = document.querySelectorAll(".link");

                                                      pwShowHide.forEach(eyeIcon => {
                                                          eyeIcon.addEventListener("click", () => {
                                                              let pwFields = eyeIcon.parentElement.parentElement.querySelectorAll(".password");
                                                              
                                                              pwFields.forEach(password => {
                                                                  if(password.type === "password"){
                                                                      password.type = "text";
                                                                      eyeIcon.classList.replace("bi-eye-slash", "bi-eye");
                                                                      return;
                                                                  }
                                                                  password.type = "password";
                                                                  eyeIcon.classList.replace("bi-eye", "bi-eye-slash");
                                                              })
                                                              
                                                          })
                                                      })      

                                                      links.forEach(link => {
                                                          link.addEventListener("click", e => {
                                                            e.preventDefault(); //preventing form submit
                                                            forms.classList.toggle("show-signup");
                                                          })
                                                      })
                                                    </script>


                                                    <div class="mb-3 row">
                                                        <label for="" class="col-md-4 fw-bold">Job Title</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" 
                                                                      name="ess_positionTitle" placeholder="Job Title" 
                                                                      value="<?php echo $employee['emp_positionTitle'] ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="" class="col-md-4 form-label fw-bold">Contact No.</label>
                                                        <div class="col-md-8">
                                                            <input type="number" class="form-control" 
                                                                  name="ess_contactno" placeholder="Contact No." 
                                                                  value="<?php echo $employee['emp_contactno'] ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="" class="col-md-4 form-label fw-bold">Email</label>
                                                        <div class="col-md-8">
                                                            <input type="email" class="form-control" 
                                                                  name="ess_email" placeholder="Email" 
                                                                  value="<?php echo $employee['emp_email'] ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </form>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
