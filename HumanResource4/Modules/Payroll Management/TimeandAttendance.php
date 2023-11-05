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
              <li><a class="sidebar-link actived" href="TimeandAttendance.php">Time and Attendance</a></li>
                <li><a class="sidebar-link" href="create_payroll.php">Create Payroll</a></li>
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
              <h4 class="c-grey-900 mT-10 mB-30 fw-bold">TIME AND ATTENDANCE</h4>

              <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <div class="row">
                  <div class="col-md-3">
                      <label for="fromDate" class="fw-bold h6">From Date:</label>
                      <input type="date" id="fromDate" class="form-control">
                  </div>
                  <div class="col-md-3">
                      <label for="toDate" class="fw-bold h6">To Date:</label>
                      <input type="date" id="toDate"  class="form-control">
                  </div>

                  <div class="col-md-4 mt-4">

                  <button id="filterButton" class="btn btn-primary">Filter</button>
                  <button id="resetButton" class="btn btn-secondary">Reset</button>
                  </div>
                </div>
              </div>

              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="bgc-white bd bdrs-3 p-20 mB-20">

                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/inputmask@5.0.8/dist/jquery.inputmask.min.js"></script>

                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            document.getElementById("filterButton").addEventListener("click", function() {
                                var fromDate = new Date(document.getElementById("fromDate").value);
                                var toDate = new Date(document.getElementById("toDate").value);

                                // Adjust the fromDate to include the start of the day (00:00:00)
                                fromDate.setHours(0, 0, 0, 0);

                                var tableRows = document.getElementById("myTable").getElementsByTagName("tr");

                                for (var i = 0; i < tableRows.length; i++) {
                                    var row = tableRows[i];
                                    var dateCell = row.cells[2]; // Assuming date is in the 3rd cell (index 2)

                                    if (dateCell) {
                                        var cellDate = new Date(dateCell.textContent);

                                        if (fromDate <= cellDate && cellDate <= toDate) {
                                            row.style.display = "";
                                        } else {
                                            row.style.display = "none";
                                        }
                                    }
                                }
                            });

                            document.getElementById("resetButton").addEventListener("click", function() {
                                // Clear the input fields
                                document.getElementById("fromDate").value = "";
                                document.getElementById("toDate").value = "";

                                var tableRows = document.getElementById("myTable").getElementsByTagName("tr");

                                for (var i = 0; i < tableRows.length; i++) {
                                    tableRows[i].style.display = "";
                                }
                            });
                        });
                    </script>

                    <table id="dataTable" class="table table-striped table-bordered"
                                cellspacing="0" width="100%">

                                <thead>
                                  <tr>
                                      <th scope="col">Employee ID - Fullname</th>
                                      <th scope="col">Shift</th> 
                                      <th scope="col">Date</th>
                                      <th scope="col">Time In</th>
                                      <th scope="col">Time Out</th>
                                      <th scope="col">Action</th>

                                  </tr>
                                </thead>

                    
                           <tbody id="myTable">
                             <?php

                            $timeattendance = mysqli_query($conn, "SELECT * FROM timeattendance");
                            $row = mysqli_num_rows($timeattendance);
                                if($row > 0){
                                    while ($row = mysqli_fetch_array($timeattendance)) {
                                        # code...
                            ?>

                            <tr>
                                <td class="fw-bold"><?php echo $row['empid'];?>&nbsp;<?php echo $row['fullname'];?></td>
                                <td class="fw-bold"><?php echo $row['shift'];?></td>
                                <td class="fw-bold"><?php $date = $row['date_attendance'];
                                                          $date = strtotime ($date);
                                                          $date = date ('F j, Y', $date);
                                                          echo $date;?>

                                </td>

                                <td class="fw-bold"><?php $date = $row['timein'];
                                                          $date = strtotime ($date);
                                                          $date = date ('h:i A', $date);
                                                          echo $date;?></td>

                                <td class="fw-bold"><?php $date = $row['timeout'];
                                                          $date = strtotime ($date);
                                                          $date = date ('h:i A', $date);
                                                          echo $date;?></td>
                                <td>

                                        <button type="button" 
                                                class="btn btn-info mt-1 mb-1" 
                                                data-bs-toggle="modal"
                                                title="View"
                                                data-bs-target="#view<?php echo $row['id'] ?>"><i class="bi bi-eye-fill"></i>
                                        </button>

                                        <div class="modal fade" id="view<?php echo $row['id'] ?>" aria-labelledby="view" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title fw-bold">VIEW TIME AND ATTENDANCE</h4>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>

                                              <!-- Modal body -->
                                              <div class="modal-body">
                                                <form method="POST">
                                                    <table class="table table-striped">
                                                      <tbody>
                                                          <tr><th scope="row">Username</th>
                                                            <td><?php echo $row['username'] ?></td></tr>

                                                          <tr><th scope="row">Employee ID - Fullname</th>
                                                          <td class="fw-bold"><?php echo $row['empid'];?>&nbsp;<?php echo $row['fullname'];?></td></tr>

                                                            <tr><th scope="row">Shift</th>
                                                            <td class="fw-bold"><?php echo $row['shift'];?></td>
                                                            </tr>

                                                            <tr><th scope="row">Date</th>
                                                            <td>
                                                                  <?php $date = $row['date_attendance'];
                                                                        $date = strtotime ($date);
                                                                        $date = date ('F j, Y', $date);
                                                                    echo $date;
                                                                  ?>
                                                              </td>
                                                            </tr>

                                                          <tr><th scope="row">Time In</th>
                                                            <td><?php $date = $row['timein'];
                                                                      $date = strtotime ($date);
                                                                      $date = date ('h:i A', $date);
                                                                echo $date;?></td></tr>

                                                          <tr><th scope="row">Time Out</th>
                                                            <td><?php $date = $row['timeout'];
                                                                      $date = strtotime ($date);
                                                                      $date = date ('h:i A', $date);
                                                                echo $date;?></td></tr>

                                                          <tr><th><h6 class="fw-bold text-center">OVERTIME</h6></th><td></td></tr>

                                                          <tr><th scope="row">Overtime From</th>
                                                            <td><?php $date = $row['ot_from'];
                                                                      $date = strtotime ($date);
                                                                      $date = date ('h:i A', $date);
                                                                echo $date;?></td></tr>

                                                          <tr><th scope="row">Overtime To</th>
                                                            <td><?php $date = $row['ot_to'];
                                                                      $date = strtotime ($date);
                                                                      $date = date ('h:i A', $date);
                                                                echo $date;?></td></tr>

                                                          <tr><th scope="row">Description</th>
                                                            <td class="fw-bold"><?php echo $row['description'];?></td>
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

    <style>
        .modal-xl-custom {
            max-width: 80%; /* Customize the width as needed */
        }
    </style>

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
                        <form action="../../../Controller/RequestPayrollCopyQuery.php" method="POST">

                          <div class="row">
                            <div class="col-md-6">         
                            <div class="mb-3 row">
                                <div class="mb-3 row">
                                    <label for="" class="col-md-4 fw-bold">NET PAY</label>
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
                            </div>
                            <hr> 

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
                            <label for="" class="col-md-2 fw-bold">Fullname</label>
                            <div class="col-md-10">
                              <input class="form-control" type="text" readonly id="essNameInput" name="fullname">
                            </div>
                          </div>

                          <div class="mb-3 row">
                            <label for="" class="col-md-2 fw-bold">Employee ID</label>
                            <div class="col-md-10">
                              <input class="form-control" type="text" readonly id="essEmployeeIDInput" name="employeeID">
                            </div>
                          </div>

                          <div class="mb-3 row">
                            <label for="" class="col-md-2 fw-bold">Job Title</label>
                            <div class="col-md-10">
                              <input class="form-control" type="text" readonly id="essJobInput" name="job_position">
                            </div>
                          </div>

                          <div class="mb-3 row">
                            <label for="" class="col-md-2 fw-bold">Daily Rate</label>
                            <div class="col-md-10">
                              <input type="number" name="daily_rate" class="form-control essDailyRateInput" id="dailyRate">
                            </div>
                          </div>

                                <div class="mb-3 row">
                                    <label for="" class="col-md-2 fw-bold">Days of Work</label>
                                    <div class="col-md-10">
                                        <input type="number" name="days_of_work" class="form-control" id="daysOfWork">
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-6">
                                <hr>
                                <span class="h6 fw-bold text-info"> DEDUCTIONS</span>
                                <hr>

                                <div class="mb-3 row">
                                    <label for="" class="col-md-2 fw-bold">SSS</label>
                                    <div class="col-md-10">
                                        <input type="number" name="sss" class="form-control" id="sssDeduction">
                                    </div>
                                </div>


                                <div class="mb-3 row">
                                    <label for="" class="col-md-2 fw-bold">PAG-IBIG</label>
                                    <div class="col-md-10">
                                        <input type="number" name="pag_ibig" class="form-control" id="pagIbigDeduction">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="" class="col-md-2 fw-bold">PHILHEALTH</label>
                                    <div class="col-md-10">
                                        <input type="number" name="philhealth" class="form-control" id="philhealthDeduction">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="" class="col-md-2 fw-bold">OTHER DEDUCTIONS</label>
                                    <div class="col-md-10">
                                        <input type="number" name="other_deductions" class="form-control" id="otherDeductions">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="" class="col-md-2 fw-bold">DESCRIPTION</label>
                                    <div class="col-md-10">
                                    <textarea name="deduction_description" class="form-control" rows="8"></textarea>
                                    </div>
                                </div>

                                <hr>
                                <span class="h6 fw-bold text-info">BONUS</span>
                                <hr>
                                    <div class="mb-3 row">
                                        <label for="" class="col-md-2 fw-bold">BUNOS</label>
                                        <div class="col-md-10">
                                            <input type="number" name="bonus" class="form-control" id="bonus">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="" class="col-md-2 fw-bold">BONUS DESCRIPTION</label>
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
