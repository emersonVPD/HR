<?php
  include "../../PHP/connection.php";

    session_start();
      if (!isset($_SESSION['username']) || empty($_SESSION['username'])) 
      {
        header("location: ../PHP/HR2ManagerLogin.php");
        exit;
      } 
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>HUMAN RESOURCE 2</title>
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
      <a href="index.php" class="logo d-flex align-items-center">
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

            <?php 
                            $sql = mysqli_query($conn, "SELECT * FROM tntaccount WHERE username = '" . $_SESSION['username'] . "'");
                            $account = mysqli_num_rows($sql);
                                if($account > 0){
                                    while ($account = mysqli_fetch_array($sql)) {

                                        # code...
                ?>

        <li class="nav-item dropdown pe-5">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="../../assets/images/admin.png" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-3"><?php echo "".$account['username']."";?></span>
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
            <a class="nav-link collapsed" data-bs-target="#chcm" data-bs-toggle="collapse" href="#">
            <i class="bi bi-folder-symlink"></i><span>Core Human Capital Management</span><i class="bi bi-chevron-down ms-auto"></i></a>
        <ul id="chcm" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li><a href="../Core Human Capital Management/JobVacancy.php"><i class="bi bi-circle"></i><span>Job Vacancy</span></a></li>
            <li><a href="../Core Human Capital Management/SetofSandQ.php"><i class="bi bi-circle"></i><span>Set of S & Q</span></a></li>
            <li><a href="../Core Human Capital Management/ApplicantInformation.php"><i class="bi bi-circle"></i><span>Applicant Information</span></a></li>
            <li><a href="../Core Human Capital Management/EmployeeInformation.php"><i class="bi bi-circle"></i><span>Employee Information</span></a></li>
            <li><a href="../Core Human Capital Management/EmployeeRequest.php"><i class="bi bi-circle"></i><span>Employee Request</span></a></li>
        </ul>
      </li>

      <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#lm" data-bs-toggle="collapse" href="#">
            <i class="bi bi-box-arrow-left"></i><span>Leave Management</span><i class="bi bi-chevron-down ms-auto"></i></a>
        <ul id="lm" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li><a href="../Leave Management/RequestLeave.php"><i class="bi bi-circle"></i><span>Request Leave</span></a></li>
        </ul>
      </li>

      <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#pm" data-bs-toggle="collapse" href="#">
            <i class="bi bi-cash-coin"></i><span>Payroll Management</span><i class="bi bi-chevron-down ms-auto"></i></a>
        <ul id="pm" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li><a href="../Payroll Management/RequestPayroll.php"><i class="bi bi-circle"></i><span>Request Payroll Copy</span></a></li>
            <li><a href="../Payroll Management/PayrollFiles.php" ><i class="bi bi-circle"></i><span>Payroll Files</span></a>
            </li>

        </ul>
      </li>

      <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#car" data-bs-toggle="collapse" href="#">
            <i class="bi bi-arrow-counterclockwise"></i><span>Claims and Reimbursement</span><i class="bi bi-chevron-down ms-auto"></i></a>
        <ul id="car" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li><a href="../Claims and Reimbursement/RequestClaims.php"><i class="bi bi-circle"></i><span>Request Claims</span></a></li>
            <li><a href="../Claims and Reimbursement/RequestReimbursement.php"><i class="bi bi-circle"></i><span>Request Reimbursement</span></a></li>

        </ul>
      </li>

      <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#sas" data-bs-toggle="collapse" href="#">
            <i class="bi bi-calendar-day"></i><span>Shift and Schedule</span><i class="bi bi-chevron-down ms-auto"></i></a>
        <ul id="sas" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li><a href="../Shift and Schedule/ViewSandS.php"><i class="bi bi-circle"></i><span>View Shift and Schedule</span></a></li>
            <li><a href="../Shift and Schedule/RequestChange.php"><i class="bi bi-circle"></i><span>Request to Change</span></a></li>
        </ul>
      </li>

      <li class="nav-item">
            <a class="nav-link" data-bs-target="#taa" data-bs-toggle="collapse" href="#">
            <i class="bi bi-clock-history"></i><span>Time and Attendance</span><i class="bi bi-chevron-down ms-auto"></i></a>
        <ul id="taa" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
            <li><a href="TimeandAttendance.php"><i class="bi bi-circle"></i><span>Time and Attendance</span></a></li>

            <li><a href="TimeSheet.php" 
                   class="active">
                <i class="bi bi-circle"></i>
                <span>Timesheet</span></a>
           </li>
           
        </ul>
      </li>

     <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#cpa" data-bs-toggle="collapse" href="#">
            <i class="bi bi-award"></i><span>Compensation Planning and Administration</span><i class="bi bi-chevron-down ms-auto"></i></a>
        <ul id="cpa" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li><a href="../Compensation Planning Admin/Incentives.php"><i class="bi bi-circle"></i><span>Incentives</span></a></li>
            <li><a href="../Compensation Planning Admin/benefits.php"><i class="bi bi-circle"></i><span>Benefits</span></a></li>
        </ul>
      </li>

      <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#hra" data-bs-toggle="collapse" href="#">
            <i class="bi bi-graph-up-arrow"></i><span>HR Analytics</span><i class="bi bi-chevron-down ms-auto"></i></a>
        <ul id="hra" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li><a href="../HR Analytics/applicant.php"><i class="bi bi-circle"></i><span>Applicant Analytics</span></a></li>
            <li><a href="../HR Analytics/employee.php"><i class="bi bi-circle"></i><span>Employee Analytics</span></a></li>
        </ul>
      </li>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>TIMESHEET MANAGEMENT</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item active">Time and Attendance</li>
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

    <script src="../../assets/jquery/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/bootstrap/js/bootstrap.bundle.min.js"></script>

      <!-- Template Main JS File -->
    <script src="../../assets/js/main.js"></script>

  <!-- FOR SEARCH FILTER -->
    <script>
            $(document).ready(function(){
              $("#myInput").on("keyup",function(){
                var value =$(this).val().toLowerCase();
                $("#myTable tr").filter(function(){
                  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
              });
            });
    </script>
  <!-- SEARCH FILTER END -->
</body>
</html>