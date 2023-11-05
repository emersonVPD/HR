<?php
    include "../../PHP/connection.php";

    session_start();
      if (!isset($_SESSION['username']) || empty($_SESSION['username'])) 
      {
        header("location: ../PHP/HRManagerLogin.php");
        exit;
      }   
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>HUMAN RESOURCE 1</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/bootstrap-icons/bootstrap-icons.css">

  <!-- Template Main CSS File -->
    <link rel="stylesheet" href="../../assets/css/style.css">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="../../index.php" class="logo d-flex align-items-center">
        <img src="../../assets/images/logo.png" alt="">
        <span class="d-none d-lg-block">EMBLITZ TNT</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <!-- SEARCH ENGINE BAR / FILTER SEARCH -->
    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" id="myInput" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div>
    <!-- END OF SEARCH ENGINE BAR / FILTER SEARCH -->  

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
          <i class="bi bi-search"></i>
          </a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
          <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">1</span>
          </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have new notification
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li><hr class="dropdown-divider"></li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>New Applicants</h4>
                <p>New Applicant Coming form Job Posting Website</p>
                <p>30 min. ago</p>
              </div>
            </li>
           
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>
          </ul>
        </li>

            <?php 
                            $sql = mysqli_query($conn, "SELECT * FROM hr1manager WHERE username = '" . $_SESSION['username'] . "'");
                            $account = mysqli_num_rows($sql);
                                if($account > 0){
                                    while ($account = mysqli_fetch_array($sql)) {

                                        # code...
                ?>

        <li class="nav-item dropdown pe-5">
          <a class="nav-link nav-profile d-flex align-items-center pe-0 ms-0" href="#" data-bs-toggle="dropdown">
            <img src="../../assets/images/admin.png" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2 me-2"><?php echo "".$account['username']."";?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo "".$account['username']."";?></h6><span><?php echo "".$account['positionTitle']."";?> </span></li>
            <li><hr class="dropdown-divider"></li>

            <li>
              <a class="dropdown-item d-flex align-items-center" onclick="location.href='../../PHP/QueryAccount/accountProfile.php'">
              <i class="bi bi-person"></i><span>My Profile</span></a>
            </li>
            <li><hr class="dropdown-divider"></li>

            <li>
              <a class="dropdown-item d-flex align-items-center" onclick="location.href='../../PHP/QueryAccount/accountSettings.php'">
              <i class="bi bi-gear"></i><span>Account Settings</span></a>
            </li>  
            <li><hr class="dropdown-divider"></li>

            <li>
              <a class="dropdown-item d-flex align-items-center" onclick="location.href='../../PHP/QueryAccount/logout.php'">
              <i class="bi bi-box-arrow-right"></i><span>Sign Out</span></a>
            </li>

          </ul>
        </li>
      </ul>
    </nav>
  </header><!-- End Header -->

            <?php 
              }    
              } 
            ?>

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link " href="../../index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#competency-management" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person-lines-fill"></i><span>Competency Management</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="competency-management" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li><a href="../Competency Management/JobVacancy.php"><i class="bi bi-circle"></i><span>Job Vacancy</span></a></li>
          <li><a href="../Competency Management/SetofSandQ.php"><i class="bi bi-circle"></i><span>Set Skills and Qualifications</span></a></li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#recruitment" data-bs-toggle="collapse" href="#">
          <i class="bi bi-globe"></i><span>Recruitment</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="recruitment" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li><a href="JBwithSandQ.php" ><i class="bi bi-circle"></i><span>Job Vacancy | S & Q</span></a></li>
          <li><a href="../../JobPosting/JobPosting.php" target="_blank"><i class="bi bi-circle" class="nav-link active"></i><span>Job Posting Website >></span></a></li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#applicant-management" data-bs-toggle="collapse" href="#">
          <i class="bi bi-people"></i></i><span>Applicant Management</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="applicant-management" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li><a href="../Applicant Management/ApplicantInformation.php"><i class="bi bi-circle"></i><span>Applicant Information</span></a></li>
          <li><a href="../Applicant Management/ApplicantSchedule.php"><i class="bi bi-circle"></i><span>Applicant Schedule</span></a></li>
          <li><a href="../Applicant Management/InitialInterview.php"><i class="bi bi-circle"></i><span>Applicant Initial Interview</span></a></li>
          <li><a href="../Applicant Management/FinalInterview.php"><i class="bi bi-circle"></i><span>Applicant Final Interview</span></a></li>
          <li><a href="../Applicant Management/RequestExam.php"><i class="bi bi-circle"></i><span>Request Exam Module</span></a></li> 
          <li><a href="../Applicant Management/ApplicantExamResult.php"><i class="bi bi-circle"></i><span>Applicant Exam Result</span></a></li>
          <li><a href="../Applicant Management/ApplicantResult.php"><i class="bi bi-circle"></i><span>Applicant Result</span></a></li>
          <li><a href="../Applicant Management/RequestFacility.php"><i class="bi bi-circle"></i><span>Request Facility</span></a></li>
          <li><a href="../Applicant Management/MessageTemplate.php"><i class="bi bi-circle"></i><span>Message Template</span></a></li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#learning-management" data-bs-toggle="collapse" href="#">
          <i class="bi bi-book-half"></i><span>Learning Management</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="learning-management" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li><a href="../Learning Management/ExamModules.php"><i class="bi bi-circle"></i><span>Exam Modules</span></a></li>
            <li><a href="../Learning Management/TrainingModules.php"><i class="bi bi-circle"></i><span>Training Modules</span></a></li>
            <li><a href="../Learning Management/RequestTrainingModules.php"><i class="bi bi-circle"></i><span>Request Training Modules</span></a></li>
            <li><a href="../Learning Management/RequestExamModules.php"><i class="bi bi-circle"></i><span>Request Exam Modules</span></a></li> 
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#training-management" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person-square"></i><span>Training Management</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="training-management" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li><a href="../Training Management/TrainingSchedule.php"><i class="bi bi-circle"></i><span>Training Schedule</span></a></li>
            <li><a href="../Training Management/RequestTrainingFacility.php"><i class="bi bi-circle"></i><span>Request Training Facility</span></a></li>
            <li><a href="../Training Management/RequestTrainingModules.php"><i class="bi bi-circle"></i><span>Request Training Modules</span></a></li>
            <li><a href="../Training Management/TrainingResult.php"><i class="bi bi-circle"></i><span>Training Result</span></a></li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#new-hired-on-board" data-bs-toggle="collapse" href="#">
          <i class="bi bi-card-list"></i><span>New Hired On Board</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="new-hired-on-board" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li><a href="../New Hired On Board/QualifiedApplicants.php"><i class="bi bi-circle"></i><span>Qualified Applicants</span></a></li>
            <li><a href="../New Hired On Board/EmployeeInformation.php"><i class="bi bi-circle"></i><span>Employee Information</span></a></li>
            <li><a href="../New Hired On Board/RequestContract.php"><i class="bi bi-circle"></i><span>Request Contract</span></a></li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#employee-self-service" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person-badge"></i></i><span>Employee Self Service</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="employee-self-service" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li><a href="../Employee Self Service/ESSAccounts.php"><i class="bi bi-circle"></i><span>ESS Accounts</span></a></li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#performance-management" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Performance Management</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="performance-management" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li><a href="../Performance Management/EmployeeEvaluation.php"><i class="bi bi-circle"></i><span>Employee Evaluation</span></a></li>
            <li><a href="../Performance Management/EmployeeRecords.php"><i class="bi bi-circle"></i><span>Employee Records</span></a></li>
            <li><a href="../Performance Management/EmployeeTask.php"><i class="bi bi-circle"></i><span>Employee Task</span></a></li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#social-recognition" data-bs-toggle="collapse" href="#">
         <i class="bi bi-star-fill"></i><span>Social Recognition</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="social-recognition" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li><a href="../Social Recognition/PromoteEmployee.php"><i class="bi bi-circle"></i><span>Promote Employee</span></a></li>
            <li><a href="../Social Recognition/Incentives.php"><i class="bi bi-circle"></i><span>Incentives</span></a></li>
            <li><a href="../Social Recognition/Certificates.php"><i class="bi bi-circle"></i><span>Certificates</span></a></li>         
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#succession-planning" data-bs-toggle="collapse" href="#">
         <i class="bi bi-list-check"></i><span>Sucession Planning</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="succession-planning" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li><a href="../Succession Planning/SuccessorLineUp.php"><i class="bi bi-circle"></i><span>Successor Line Up</span></a></li>
            <li><a href="../Succession Planning/RequestEmployee.php"><i class="bi bi-circle"></i><span>Request New Employee</span></a></li>
            <li><a href="../Succession Planning/SubstituteEmployee.php"><i class="bi bi-circle"></i><span>Substitute From Current Employee</span></a></li>
        </ul>
      </li>

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
        <i class="bi bi-people-fill">
        </i><span>Create HR Staff Account</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
        <i class="bi bi-person-plus-fill">
        </i><span>Create ESS Account</span></a>
      </li>

      <li class="nav-item">
            <a class="nav-link collapsed" href="../../JobPosting/JobPosting.php" target="_blank">
            <i class="bi bi-globe">
            </i><span>Job Posting Website</span></a>
      </li>

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>JOB VACANCY and SET OF SKILLS AND QUALIFICATIONS</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../../index.php"></a>Recruitment</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

   

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">ALL RIGHTS RESERVED 2022</div>
    <div class="credits">THIS IS ONLY FOR EDUCATIONAL PURPOSE</div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <!-- Vendor JS Files -->
    <script src="../../assets/jquery/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    
    <!-- Template Main JS File -->
    <script src="../../assets/js/main.js"></script>
</body>
</html>