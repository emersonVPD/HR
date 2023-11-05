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

    <!-- USE FOR LIBARIES TO INCLUDE IN THIS PAGE NOTE : DO NOT DELETE THIS -->
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
              <ul class="dropdown-menu collapse" id="coreDropdown">
                <li><a class="sidebar-link" href="../Core Human Capital Management/JobVacancy.php">Job Vacancy</a></li>
                <li><a class="sidebar-link" href="../Core Human Capital Management/ApplicantInformation.php">Applicant</a></li>
                <li><a class="sidebar-link" href="../Core Human Capital Management/EmployeeInformation.php">Employee</a></li>
                <li><a class="sidebar-link" href="../Core Human Capital Management/SetofSandQ.php">Set of S and Q</a></li>
                <li><a class="sidebar-link" href="../Core Human Capital Management/EmployeeRequest.php">Requesting of Employee</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a class="dropdown-toggle" data-bs-toggle="collapse" href="#payrollDropdown"><span class="icon-holder"> 
                <i class="bi bi-cash-coin"></i></span
                ><span class="title">Payroll</span>
                <span class="arrow"><i class="ti-angle-right"></i></span
              ></a>
              <ul class="dropdown-menu collapsed show" id="payrollDropdown">
                <li><a class="sidebar-link" href="TimeandAttendance.php">Time and Attendance</a></li>
                <li><a class="sidebar-link actived" href="create_payroll.php">Create Payroll</a></li>
                <li><a class="sidebar-link" href="RequestPayroll.php">Payroll Request</a></li>
                <!-- <li><a class="sidebar-link" href="payrollFiles.php">Payroll Files</a></li> -->
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
        <!-- ### $Topbar ### -->
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
              <h4 class="c-grey-900 mT-10 mB-30 fw-bold">CREATE PAYROLL</h4>
              <div class="row">
                <div class="col-md-12">
                  <div class="bgc-white bd bdrs-3 p-20 mB-20">

                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/inputmask@5.0.8/dist/jquery.inputmask.min.js"></script>

                    <div class="text-end mb-2">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#addPayrollModal" class="btn btn-primary">+ Create Payroll</a>
                    </div>

                    <table
                      id="dataTable"
                      class="table table-striped table-bordered"
                      cellspacing="0"
                      width="100%"
                    >
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Employee</th>
                          <th>Net Pay</th>
                          <th>Total Deductions</th>
                          <th>Daily Rate</th>
                          <th>Days of Work</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody>
                         <?php

                            $sql = mysqli_query($conn, "SELECT * FROM create_payroll");
                                $rows = mysqli_num_rows($sql);
                                if($rows > 0){
                                    while ($rows = mysqli_fetch_array($sql)) {
                            ?>


                        <tr>
                          <td><?php echo $rows['id'];?></td>
                          <td><?php echo $rows['employee_payroll'];?></td>
                          <td class="currentPH text-start"><?php echo $rows['net_pay'];?></td>
                          <td class="currentPH text-start"><?php echo $rows['total_deductions'];?></td>
                          <td class="currentPH text-start"><?php echo $rows['daily_rate'];?></td>
                          <td><?php echo $rows['days_of_work'];?></td>
                          <td>

                          <button type="button"
                                  class="btn btn-info mb-1"
                                  data-bs-toggle="modal"
                                  title="View"
                                  data-bs-target="#view<?php echo $rows['id'] ?>"><i class="bi bi-eye-fill"></i>
                          </button>

                          <a href="printpayroll.php?id=<?php echo $rows['id']; ?>"
                             class="btn btn-success mb-1"
                             title="View">&#128438;
                          </a>


                          <!-- VIEW row  DETAILS MODAL -->
                          <div class="modal fade" id="view<?php echo $rows['id'] ?>" aria-labelledby="view" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h4 class="modal-title">VIEW CREATE PAYROLL</h4>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>

                                      <!-- Modal body -->
                                      <div class="modal-body">
                                          <form method="POST">
                                              <table class="table table-striped">
                                                  <tbody>
                                                      <tr class="mb-5">
                                                          <th scope="row">Total Net Pay</th>
                                                          <td class="currentPH text-start"><?php echo $rows['net_pay'] ?></td>
                                                      </tr>
                                                      <td></td>
                                                      
                                                      <tr>
                                                          <th scope="row">Request ID</th>
                                                          <td><?php echo $rows['id'] ?></td>
                                                      </tr>
                                                      <tr>
                                                          <th scope="row">Employee Payroll</th>
                                                          <td><?php echo $rows['employee_payroll'] ?></td>
                                                      </tr>

                                                      <tr>
                                                          <th scope="row">Total Deductions</th>
                                                          <td class="currentPH text-start"><?php echo $rows['total_deductions']; ?></td>
                                                      </tr>
                            
                                                      <tr>
                                                          <th scope="row">Daily Rate</th>
                                                          <td class="currentPH text-start"><?php echo $rows['daily_rate']; ?></td>
                                                      </tr>

                                                      <tr>
                                                      <th scope="row">Days of Work</th>
                                                          <td class="currentPH text-start"><?php echo $rows['days_of_work']; ?></td>
                                                      </tr>
                                                      <tr>
                                                      <th scope="row">SSS</th>
                                                          <td class="currentPH text-start"><?php echo $rows['sss']; ?></td>
                                                      </tr>
                                                      <tr>
                                                      <th scope="row">PAG-IBIG</th>
                                                          <td class="currentPH text-start"><?php echo $rows['pag_ibig']; ?></td>
                                                      </tr>
                                                      <tr>
                                                      <th scope="row">PHILHEALTH</th>
                                                          <td class="currentPH text-start"><?php echo $rows['philhealth']; ?></td>
                                                      </tr>

                                                      <tr>
                                                      <th scope="row">Other Deductions</th>
                                                          <td class="currentPH text-start"><?php echo $rows['other_deductions']; ?></td>
                                                      </tr>

                                                      <tr>
                                                      <th scope="row">Deduction Description</th>
                                                          <td><?php echo $rows['deduction_description']; ?></td>
                                                      </tr>

                                                      <tr>
                                                      <th scope="row">Bonus</th>
                                                      <td class="currentPH text-start"><?php echo $rows['bonus']; ?></td>
                                                      </tr>

                                                      <tr>
                                                      <th scope="row">Bonus Description</th>
                                                          <td><?php echo $rows['bonus_description']; ?></td>
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

                          <!-- <button type="button" 
                                  class="btn btn-warning" 
                                  data-bs-toggle="modal"
                                  title="View"
                                  data-bs-target="#edit<?php echo $rows['id'] ?>"><i class="bi bi-pencil-fill"></i>
                          </button> -->

                          <div class="modal fade" id="edit<?php echo $rows['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="updatePayrollModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title fw-bold">UPDATE PAYROLL</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="updatePayrollProcess.php" method="POST">

                                            <input type="hidden" name="payroll_id" value="<?php echo $payroll_id; ?>">

                                          <div class="mb-3 row">
                                              <label for="netPay" class="col-md-2 fw-bold">NET PAY</label>
                                              <div class="col-md-4">
                                                  <input type="number" class="form-control text-start" name="netPay" id="netPayInput" value="<?php echo $rows['net_pay'] ?>">
                                              </div>
                                          </div>

                                          <!-- Rest of your input fields for daily rate, days of work, deductions, bonus, etc. -->

                                          <div class="mb-3 row">
                                              <label for="totalDeductions" class="col-md-2 fw-bold">TOTAL DEDUCTIONS</label>
                                              <div class="col-md-4">
                                                  <input type="number" class="form-control text-start" id="totalDeductionsInput" name="totalDeductions">
                                              </div>
                                          </div>


                                            <div class="mb-3 row">
                                                <label for="dailyRate" class="col-md-2 fw-bold">Daily Rate</label>
                                                <div class="col-md-10">
                                                    <input type="number" name="daily_rate" class="form-control" id="dailyRateInput" 
                                                           value="<?php echo $rows['daily_rate'] ?>" oninput="calculateNetPay();">
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="daysOfWork" class="col-md-2 fw-bold">Days of Work</label>
                                                <div class="col-md-10">
                                                    <input type="number" name="days_of_work" class="form-control" id="daysOfWorkInput" 
                                                           value="<?php echo $rows['days_of_work'] ?>" oninput="calculateNetPay();">
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="sssDeduction" class="col-md-2 fw-bold">SSS</label>
                                                <div class="col-md-10">
                                                    <input type="number" name="sss" class="form-control" id="sssDeductionInput" 
                                                           value="<?php echo $rows['sss'] ?>" oninput="calculateTotalDeductions();">
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="pagIbigDeduction" class="col-md-2 fw-bold">PAG-IBIG</label>
                                                <div class="col-md-10">
                                                    <input type="number" name="pag_ibig" class="form-control" id="pagIbigDeductionInput" 
                                                            value="<?php echo $rows['pag_ibig'] ?>" oninput="calculateTotalDeductions();">
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="philhealthDeduction" class="col-md-2 fw-bold">PHILHEALTH</label>
                                                <div class="col-md-10">
                                                    <input type="number" name="philhealth" class="form-control" id="philhealthDeductionInput" 
                                                            value="<?php echo $rows['philhealth'] ?>" oninput="calculateTotalDeductions();">
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="otherDeductions" class="col-md-2 fw-bold">OTHER DEDUCTIONS</label>
                                                <div class="col-md-10">
                                                    <input type="number" name="other_deductions" class="form-control" id="otherDeductionsInput" 
                                                           value="<?php echo $rows['other_deductions'] ?>" oninput="calculateTotalDeductions();">
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="deductionDescription" class="col-md-2 fw-bold">DESCRIPTION</label>
                                                <div class="col-md-10">
                                                    <textarea name="deduction_description" class="form-control" rows="8"><?php echo $rows['deduction_description'] ?></textarea>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="bonus" class="col-md-2 fw-bold">BONUS</label>
                                                <div class="col-md-10">
                                                    <input type="number" name="bonus" class="form-control" id="bonusInput" 
                                                            value="<?php echo $rows['bonus'] ?>" oninput="calculateNetPay();">
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="bonusDescription" class="col-md-2 fw-bold">BONUS DESCRIPTION</label>
                                                <div class="col-md-10">
                                                    <textarea name="bonus_description" class="form-control" rows="8"><?php echo $rows['employee_payroll'] ?></textarea>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" name="update_payroll" class="btn btn-primary">Update Payroll</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                          
                          <!-- <button type="button" 
                                  class="btn btn-danger" 
                                  data-toggle="modal"
                                  title="View"
                                  data-target="#delete<?php echo $rows['id'] ?>"><i class="bi bi-trash-fill"></i>
                          </button> -->

                          
                          </td>
                        </tr>
                        <?php  } } ?>
                      
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

    <style>
        .modal-xl-custom {
            max-width: 80%; /* Customize the width as needed */
        }
    </style>

    <script src="https://cdn.jsdelivr.net/jquery.validation/1.19.3/jquery.validate.min.js"></script>


        <div class="modal fade" id="addPayrollModal" tabindex="-1" role="dialog" aria-labelledby="addPayrollModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl-custom"  role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fw-bold">CREATE PAYROLL</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Add your form or content for creating payroll here -->
                        <!-- Example: -->
                        <form action="../../../Controller/RequestPayrollCopyQuery.php" id="myForm" method="POST">

                          <div class="row">
                            <div class="col-md-6">         
                              <div class="mb-3 row">
                                  <div class="mb-3 row">
                                      <label for="" class="col-md-4 fw-bold">TOTAL NET PAY</label>
                                      <div class="col-md-6">
                                          <input type="number" class="form-control currentPH text-start" name="net_pay" id="netPay" readonly>
                                      </div>
                                  </div>

                                  <div class="mb-3 row">
                                      <label for="" class="col-md-4 fw-bold">TOTAL DEDUCTIONS</label>
                                      <div class="col-md-6">
                                          <input type="number" class="form-control currentPH text-start" name="total_deductions" id="totalDeductions" readonly>
                                      </div>
                                  </div> 

                                  <div class="mb-3 row">
                                    <label for="" class="col-md-4 fw-bold">OVERTIME PAY</label>
                                    <div class="col-md-6">
                                        <input type="number" class="form-control currentPH text-start" name="overtime_pay" id="totalOvertimePay" readonly>
                                    </div>
                                </div>
                              </div>
                              <hr> 

                              <div class="row mb-3">
                                  <div class="col-md-6">
                                      <label for="" class="fw-bold mb-1">Date From</label>
                                      <input type="date" class="form-control" name="date_from" required>
                                  </div>
                                  <div class="col-md-6">
                                      <label for="" class="fw-bold mb-1">Date To</label>
                                      <input type="date" class="form-control" name="date_to" required>
                                  </div>
                              </div><hr>

                              <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                  const dateFromInput = document.querySelector('input[name="date_from"]');
                                  const dateToInput = document.querySelector('input[name="date_to"]');
                                  
                                  dateFromInput.addEventListener('input', function() {
                                    // Parse the selected date from the "date_from" input
                                    const selectedDateFrom = new Date(this.value);
                                    
                                    // Get the current date
                                    const currentDate = new Date();
                                    
                                    if (this.value === '') {
                                      // If "date_from" is empty, disable and clear "date_to"
                                      dateToInput.value = '';
                                      dateToInput.disabled = true;
                                    } else {
                                      // Enable "date_to" and set the minimum date to the selected "date_from"
                                      dateToInput.disabled = false;
                                      dateToInput.min = this.value;
                                      
                                      if (selectedDateFrom <= currentDate) {
                                        // If "date_from" is today or in the past, update "date_to" to the minimum allowed date
                                        dateToInput.value = this.value;
                                      }
                                    }
                                  });
                                });
                              </script>



                              <div class="mb-3 row">
                              <label for="" class="col-md-2 fw-bold">Username</label>
                              <div class="col-md-10">
                                <select class="form-select" name="employee_payroll" id="usernameSelect" aria-label="Floating label select example" required>
                                  <option selected disabled value="">Select Username</option>
                                  
                                  <?php
                                  $query = mysqli_query($conn, "SELECT username, ess_positionTitle, daily_rate, ess_firstname, ess_lastname, ess_middlename, employeeID FROM essaccountstbl");
                                  
                                  while ($row = mysqli_fetch_array($query)) 
                                  {
                                    echo "<option value='"  . $row['username'] 
                                                            . "' data-ess_positionTitle='" . $row['ess_positionTitle'] 
                                                            . "' data-daily_rate='" . $row['daily_rate'] 
                                                            . "' data-ess-firstname='" . $row['ess_firstname'] 
                                                            . "' data-ess-lastname='" . $row['ess_lastname'] 
                                                            . "' data-ess-middlename='" . $row['ess_middlename'] 
                                                            . "' data-employeeID='" . $row['employeeID'] . "'>" 
                                                            . $row['username'] . "</option>";
                                  }
                                  ?>
                                </select>
                              </div>
                            </div>

                            <div class="mb-3 row">
                              <label for="essNameInput" class="col-md-2 fw-bold">Fullname</label>
                              <div class="col-md-10">
                                  <div class="form-floating">
                                      <input class="form-control" type="text" readonly id="essNameInput" name="fullname">
                                      <label for="essNameInput">Fullname</label>
                                  </div>
                              </div>
                            </div>

                            <div class="mb-3 row">
                              <label class="col-md-2 fw-bold">Employee ID</label>
                              <div class="col-md-10">
                                  <div class="form-floating">
                                        <input class="form-control" type="text" readonly id="essEmployeeIDInput" name="employeeID">
                                      <label for="essNameInput">Employee ID</label>
                                  </div>
                              </div>
                          </div>

                          <div class="mb-3 row">
                            <label class="col-md-2 fw-bold">Job Title</label>
                            <div class="col-md-10">
                                <div class="form-floating">
                                <input class="form-control" type="text" readonly id="essJobInput" name="job_position">
                                    <label for="essNameInput">Job Title</label>
                                </div>
                            </div>
                          </div>

                          <div class="mb-3 row">
                            <label class="col-md-2 fw-bold">Daily Rate</label>
                            <div class="col-md-10">
                                <div class="form-floating">
                                <input type="number" name="daily_rate" class="form-control essDailyRateInput" id="dailyRate" readonly>
                                    <label for="essNameInput">Daily Rate</label>
                                </div>
                            </div>
                          </div>

                          <div class="mb-3 row">
                            <label class="col-md-2 fw-bold">Days of Work</label>
                            <div class="col-md-10">
                                <div class="form-group form-floating">
                                <input type="number" name="days_of_work" class="form-control" id="daysOfWork" min="0" required>
                                    <label for="essNameInput">Days of Work</label>
                                </div>
                            </div>
                          </div>
                          </div>

                          <div class="col-md-6">

                          <h5 class="fw-bold text-center h6">OVERTIME</h5>
                          <div class="mb-3 row">
                            <label class="col-md-2 fw-bold">Overtime Hours</label>
                            <div class="col-md-10">
                              <div class="form-floating">
                                <input type="number" name="overtime_hours" step="any" class="form-control" id="overtimeHours" oninput="calculateNetPay()">
                                <label for="overtimeHours">Overtime Hours</label>
                              </div>
                              <h6 class="text-danger">Make It Point Your Excess Minutes Ex: 1 Hour and 45mins - Input 1.45</h6>
                            </div>
                          </div>

                          <div class="mb-3 row">
                            <label class="col-md-2 fw-bold">Overtime Rate Per Hour</label>
                            <div class="col-md-10">
                              <div class="form-floating">
                                <input type="number" name="overtime_rate" class="form-control" id="overtimeRate" oninput="calculateNetPay()">
                                <label for="overtimeRate">Overtime Rate Per Hour</label>
                              </div>
                            </div>
                          </div>

                          <div class="h6 fw-bold text-center mb-3"> DEDUCTIONS</div>

                          <div class="mb-3 row">
                            <div class="col-md-6">
                                <div class="form-group form-floating">
                                <input type="number" name="sss" class="form-control" min="0" id="sssDeduction" placeholder="SSS" required>
                                    <label for="essNameInput">SSS</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group form-floating">
                                <input type="number" name="pag_ibig" class="form-control" min="0" id="pagIbigDeduction" placeholder="Pag-Ibig" required>
                                    <label for="essNameInput">Pag-ibig</label>
                                </div>
                            </div>
                          </div>

                          <div class="mb-3 row">
                            <div class="col-md-6">
                                <div class="form-group form-floating">
                                <input type="number" name="philhealth" class="form-control" min="0" id="philhealthDeduction" placeholder="Philhealth" required>
                                    <label for="essNameInput">Philhealth</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group form-floating">
                                <input type="number" name="other_deductions" class="form-control" min="0" id="otherDeductions" placeholder="Other Deductions" required>
                                    <label for="essNameInput">Other Deductions</label>
                                </div>
                            </div>
                          </div>

                          <div class="mb-3 row">
                              <label for="" class="col-md-2 fw-bold">Description</label>
                              <div class="col-md-10">
                              <textarea name="deduction_description" class="form-control" rows="8"></textarea>
                              </div>
                          </div>
            
                          <div class="h6 fw-bold text-center mb-3">BONUS</div>

                          <div class="mb-3 row">
                            <div class="col-md-12">
                                <div class="form-group form-floating">
                                <input type="number" name="bonus" class="form-control" id="bonus" placeholder="Bonus">
                                    <label for="essNameInput">BUNOS</label>
                                </div>
                            </div>
                          </div>

                          <div class="mb-3 row">
                                  <label for="" class="col-md-2 fw-bold">Description</label>
                              <div class="col-md-10">
                                  <textarea name="bonus_description" class="form-control" rows="8"></textarea>
                              </div>
                          </div>
                          </div>
                            </div>
                                <hr>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="create_payroll" class="btn btn-primary">Save Payroll</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
          var usernameSelect = document.getElementById("usernameSelect");
          var essNameInput = document.getElementById("essNameInput");
          var essEmployeeIDInput = document.getElementById("essEmployeeIDInput");
          var essDailyRateInput = document.querySelector(".essDailyRateInput"); 
          var essJobInput = document.getElementById("essJobInput");


          usernameSelect.addEventListener("change", function() {
            var selectedOption = usernameSelect.options[usernameSelect.selectedIndex];
            var essDailyRate = selectedOption.getAttribute("data-daily_rate");

            var essJobTitle = selectedOption.getAttribute("data-ess_positionTitle");

            var essFirstname = selectedOption.getAttribute("data-ess-firstname");
            var essLastname = selectedOption.getAttribute("data-ess-lastname");
            var essMiddlename = selectedOption.getAttribute("data-ess-middlename");
            var essEmployeeID = selectedOption.getAttribute("data-employeeID");
            var essName = essLastname + ', ' + essFirstname + ' ' + essMiddlename;

            essNameInput.value = essName;

            // Check if essDailyRateInput exists
            if (essDailyRateInput) {
              essDailyRateInput.value = essDailyRate;
            }
            essEmployeeIDInput.value = essEmployeeID;
            essJobInput.value = essJobTitle;
          });


            const dailyRateInput = document.getElementById('dailyRate');
            const daysOfWorkInput = document.getElementById('daysOfWork');
            const sssDeductionInput = document.getElementById('sssDeduction');
            const pagIbigDeductionInput = document.getElementById('pagIbigDeduction');
            const philhealthDeductionInput = document.getElementById('philhealthDeduction');
            const otherDeductionsInput = document.getElementById('otherDeductions');
            const bonusInput = document.getElementById('bonus'); // Added bonus input
            const totalDeductionsInput = document.getElementById('totalDeductions');
            const netPayInput = document.getElementById('netPay');

            // Add event listeners to calculate the total payroll and deductions when input changes
            dailyRateInput.addEventListener('input', calculateTotalPayrollAndDeductions);
            daysOfWorkInput.addEventListener('input', calculateTotalPayrollAndDeductions);
            sssDeductionInput.addEventListener('input', calculateTotalPayrollAndDeductions);
            pagIbigDeductionInput.addEventListener('input', calculateTotalPayrollAndDeductions);
            philhealthDeductionInput.addEventListener('input', calculateTotalPayrollAndDeductions);
            otherDeductionsInput.addEventListener('input', calculateTotalPayrollAndDeductions);
            bonusInput.addEventListener('input', calculateTotalPayrollAndDeductions); // Listen for bonus input changes

            function calculateTotalPayrollAndDeductions() {
                // Get the values from the input fields
                const dailyRate = parseFloat(dailyRateInput.value);
                const daysOfWork = parseInt(daysOfWorkInput.value);
                const sssDeduction = parseFloat(sssDeductionInput.value) || 0;
                const pagIbigDeduction = parseFloat(pagIbigDeductionInput.value) || 0;
                const philhealthDeduction = parseFloat(philhealthDeductionInput.value) || 0;
                const otherDeductions = parseFloat(otherDeductionsInput.value) || 0;
                const bonus = parseFloat(bonusInput.value) || 0; // Get the bonus value

                // Calculate the total payroll
                const totalPayroll = dailyRate * daysOfWork;

                // Calculate the total deductions
                const totalDeductions = sssDeduction + pagIbigDeduction + philhealthDeduction + otherDeductions;

                // Calculate the net pay (Total Payroll for Employee) including the bonus
                const netPay = totalPayroll - totalDeductions + bonus; // Add the bonus to the net pay

                // Display the results in the respective input fields
                totalDeductionsInput.value = totalDeductions;
                netPayInput.value = netPay;
            }

        </script>

        <script>
            function calculateNetPay() 
            {
                var dailyRateInput = parseFloat(document.getElementById('dailyRate').value);
                var daysOfWorkInput = parseFloat(document.getElementById('daysOfWork').value);
                var sssDeductionInput = parseFloat(document.getElementById('sssDeduction').value);
                var pagIbigDeductionInput = parseFloat(document.getElementById('pagIbigDeduction').value);
                var philhealthDeductionInput = parseFloat(document.getElementById('philhealthDeduction').value);
                var otherDeductionsInput = parseFloat(document.getElementById('otherDeductions').value);
                var bonusInput = parseFloat(document.getElementById('bonus').value);
                var overtimeHoursInput = parseFloat(document.getElementById('overtimeHours').value) || 0;
                var overtimeRateInput = parseFloat(document.getElementById('overtimeRate').value) || 0;
                var netPayInput = document.getElementById('netPay');
                var totalOvertimePayInput = document.getElementById('totalOvertimePay'); // Add this line

                // Calculate the total payroll including overtime
                var totalPayroll = (dailyRateInput * daysOfWorkInput) + (overtimeHoursInput * overtimeRateInput);

                // Calculate the total deductions
                var totalDeductions = sssDeductionInput + pagIbigDeductionInput + philhealthDeductionInput + otherDeductionsInput;

                // Calculate the overtime pay
                var totalOvertimePay = overtimeHoursInput * overtimeRateInput;

                // Calculate the net pay (Total Payroll for Employee) including the bonus and overtime pay
                var netPay = totalPayroll - totalDeductions + bonusInput + totalOvertimePay;

                // Display the results in the respective input fields
                document.getElementById('totalDeductions').value = totalDeductions;
                netPayInput.value = netPay;
                totalOvertimePayInput.value = totalOvertimePay; // Update the overtime pay input
            }


            // Function to calculate the total deductions based on SSS, Philhealth, Pag-IBIG, and other deductions
            function calculateTotalDeductions() 
            {
              var sssDeductionInput = parseFloat(document.getElementById('sssDeduction').value);
              var pagIbigDeductionInput = parseFloat(document.getElementById('pagIbigDeduction').value);
              var philhealthDeductionInput = parseFloat(document.getElementById('philhealthDeduction').value);
              var otherDeductionsInput = parseFloat(document.getElementById('otherDeductions').value);
              var totalDeductionsInput = document.getElementById('totalDeductions');
              var netPayInput = parseFloat(document.getElementById('netPay').value);

              var totalDeductions = sssDeductionInput + pagIbigDeductionInput + philhealthDeductionInput + otherDeductionsInput;
              totalDeductionsInput.value = totalDeductions;

              // Deduct total deductions from net pay
              netPayInput.value = netPayInput - totalDeductions;
            }
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#myForm').validate({
                    rules: {
                      days_of_work: {
                            required: true,
                        },
                        supplier_id: {
                            required: true,
                        },
                        unit_id: {
                            required: true,
                        },
                        category_id: {
                            required: true,
                        },
                    },
                    messages: {
                      days_of_work: {
                            required: 'Please Enter Days of Work',
                        },
                        supplier_id: {
                            required: 'Please select Supplier',
                        },
                        unit_id: {
                            required: 'Please select Unit',
                        },
                        category_id: {
                            required: 'Please select Category',
                        },
                    },
                    errorElement: 'span',
                    errorPlacement: function(error, element) {
                        error.addClass('invalid-feedback');
                        element.closest('.form-group').append(error);
                    },
                    highlight: function(element, errorClass, validClass) {
                        $(element).addClass('is-invalid');
                    },
                    unhighlight: function(element, errorClass, validClass) {
                        $(element).removeClass('is-invalid');
                    },
                });
            });
        </script>

      <script>
          $(document).ready(function() {
                  $('.currentPH').inputmask({
                      'alias': 'currency',
                      allowMinus: false,
                      'prefix': "₱ ",
                      max: 999999999999.99,
                  });
              });
      </script>

  </body>









</html>
