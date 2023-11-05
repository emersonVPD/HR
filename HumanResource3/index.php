<?php
  session_start();
  include "../connection.php";

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
          if ($positionTitle !== 'HR 3 Manager' && $positionTitle !== 'Super Admin') {
              // Redirect to the login page or take appropriate action if the user's position is not allowed
              header("location: ../login.php");
              exit;
          }
      } else {
          // Handle the database query error if needed
      }
  } else {
      // Redirect to the login page or take appropriate action if the user is not logged in.
      header("location:../login.php");
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
    <title>HR 3</title>

      <meta content="" name="description">
      <meta content="" name="keywords">

    <link rel="icon" href="assets/icons/skystreamlogo.png">

    <style>
        .card-border-success
        {
          border-left: 4px solid #28A745;
        }

        .card-border-primary
        {
          border-left: 4px solid #007BFF;
        }
        
        .card-border-warning
        {
          border-left: 4px solid #FFC107;
        }

        .card-border-success:hover
        {
          border-bottom: 4px solid #28A745;
        }

        .card-border-primary:hover
        {
          border-bottom: 4px solid #007BFF;
        }

        .card-border-warning:hover
        {
          border-bottom: 4px solid #FFC107;
        }
    </style>

    <?php
        include "../libraries/includes.php";
    ?>

    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet"/>
    <link href="assets/css/icons.min.css" rel="stylesheet"/>
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet"/>
    <link href="css/style.css" rel="stylesheet"/>
    <script src="js/main.js" defer="defer" ></script>

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
                <a class="sidebar-link td-n" href="index.php"
                  ><div class="peers ai-c fxw-nw">
                    <div class="peer">
                      <div class="logo">
                        <img src="assets/icons/skystreamlogo.png" class="mt-2" style="height: 50px; width: 80px;"/>
                      </div>
                    </div>
                    <div class="peer peer-greed">
                      <h5 class="lh-1 mB-0 logo-text ms-4">HUMAN RESOURCE 3</h5>
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
              <a class="sidebar-link" href="index.php"
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
              <ul class="dropdown-menu" id="q1">
                <li><a class="sidebar-link" href="Modules/Time and Attendance/TimeandAttendance.php">Time and Attendance</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
            <a class="dropdown-toggle" data-bs-toggle="collapse" href="#q2"
                ><span class="icon-holder"
                  ><i class="bi bi-calendar-day"></i></span
                ><span class="title">Shift and Schedule</span>
                <span class="arrow"><i class="ti-angle-right"></i></span
              ></a>
              <ul class="dropdown-menu" id="q2">
                <li><a class="sidebar-link" href="Modules/Shift and Schedule/ViewSandS.php">ViewSandS</a></li>
                <li><a class="sidebar-link" href="Modules/Shift and Schedule/RequestChange.php">RequestChange</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
            <a class="dropdown-toggle" data-bs-toggle="collapse" href="#q3"
                ><span class="icon-holder"
                  > <i class="bi bi-card-list"></i></span
                ><span class="title">TimeSheet Management</span>
                <span class="arrow"><i class="ti-angle-right"></i></span
              ></a>
              <ul class="dropdown-menu" id="q3">
                <li><a class="sidebar-link" href="Modules/Timesheet Management/timesheet.php">Employee Timesheet</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
            <a class="dropdown-toggle" data-bs-toggle="collapse" href="#q4"
                ><span class="icon-holder"
                  ><i class="bi bi-box-arrow-left"></i></span
                ><span class="title">Leave Management</span>
                <span class="arrow"><i class="ti-angle-right"></i></span
              ></a>
              <ul class="dropdown-menu" id="q4">
                <li><a class="sidebar-link" href="Modules/Leave Management/RequestLeave.php">Request Leaves</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a class="dropdown-toggle" href="javascript:void(0);"
                ><span class="icon-holder"
                  ><i class="bi bi-arrow-counterclockwise"></i></span
                ><span class="title">Claims / Reimbursement</span>
                <span class="arrow"><i class="ti-angle-right"></i></span
              ></a>
              <ul class="dropdown-menu">
                <li><a class="sidebar-link" href="Modules/Claims and Reimbursement/RequestClaims.php">Request Claims</a></li>
                <li><a class="sidebar-link" href="Modules/Claims and Reimbursement/RequestReimbursement.php">Request Reimbursement</a></li>
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
                    <a href="accountQuery/accountSettings.php" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"
                      ><i class="ti-settings mR-10"></i> <span>Setting</span></a
                    >
                  </li>
                  <li>
                    <a href="accountQuery/accountProfile.php" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"
                      ><i class="ti-user mR-10"></i> <span>Profile</span></a
                    >
                  </li>
                  <li role="separator" class="divider"></li>
                  <li>
                    <a href="accountQuery/logout.php" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"
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
            <div class="row gap-20 masonry pos-r">
              <div class="masonry-sizer col-md-6"></div>
              <div class="masonry-item w-100">
                <div class="row gap-20">
                  <div class="col-md-4">
                    <div class="card-border-success">
                      <div class="layers bd bgc-white p-20">
                        <div class="layer w-100 mB-10">
                          <h5 class="fw-bold">TOTAL EMPLOYEE LEAVE</h5>
                        </div>
                          <div class="layer w-100">
                            <div class="peers ai-sb fxw-nw">
                              <div class="peer peer-greed">
                                <?php 
                                  $query = "SELECT COUNT(*) AS count FROM reqleave";
                                  $query_result = mysqli_query($conn, $query);
                                  while($applicant = mysqli_fetch_assoc($query_result)){
                                    $output = $applicant['count'];
                                  }                       
                                ?>
                                <?php echo '<h4>' .$output. '</h4>';?>
                              </div>
                            </div>
                          </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="card-border-primary">
                      <div class="layers bd bgc-white p-20">
                        <div class="layer w-100 mB-10">
                          <h5 class="fw-bold">REQUEST CLAIMS</h5>
                        </div>
                        <div class="layer w-100">
                          <div class="peers ai-sb fxw-nw">
                            <div class="peer peer-greed">
                              <!-- COUNT TOTAL ROW NUMBERS OF EMPLOYEE FROM DATABASE-->
                                <?php 
                                  $query = "SELECT COUNT(*) AS count FROM reqcandr WHERE type != 'Reimbursement' AND status ='Pending'";
                                  $query_result = mysqli_query($conn, $query);
                                  while($employee = mysqli_fetch_assoc($query_result)){
                                    $output = $employee['count'];
                                  }                       
                                ?>
                                <?php echo '<h4>' .$output. '</h4>';?>
                              <!-- END OF COUNT TOTAL ROW NUMBERS OF EMPLOYEE FROM DATABASE-->  
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="card-border-warning">
                    <div class="layers bd bgc-white p-20">
                      <div class="layer w-100 mB-10">
                        <h5 class="fw-bold">REQUEST REIMBURSEMENT</h5>
                      </div>
                      <div class="layer w-100">
                        <div class="peers ai-sb fxw-nw">
                          <div class="peer peer-greed">
                          <?php 
                                $query = "SELECT COUNT(*) AS count FROM reqcandr WHERE type = 'Reimbursement' AND status ='Pending'";
                                $query_result = mysqli_query($conn, $query);
                                while($employee = mysqli_fetch_assoc($query_result)){
                                  $output = $employee['count'];
                                }                       
                              ?>
                              <?php echo '<h4>' .$output. '</h4>';?>
                          </div>

                          <!-- <div class="peer">
                            <span
                              class="d-ib lh-0 va-m fw-600 bdrs-10em pX-50 pY-40 bgc-purple-50 c-purple-500"
                              >~12%</span
                            >
                          </div> -->

                        </div>
                      </div>
                    </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row"></div>
              <div class="masonry-item col-md-6 mb-3">
                <div class="bd bgc-white">
                  <div class="layers">
                    <div class="layer w-100 pX-20 pT-20">
                      <h6 class="lh-1">Employee Newly Hired</h6>
                    </div>
                    <div class="layer w-100 p-20">
                      <div id="employee-hire-chart" height="220"></div>
                    </div>

                    <?php
                        include "../connection.php";

                        $result = $conn->query("SELECT DATE_FORMAT(emp_dateHired, '%M, %Y') AS month_year, COUNT(*) AS count FROM employeetbl GROUP BY month_year");

                        $data = array();
                        while ($row = $result->fetch_assoc()) {
                            $data[] = array("month_year" => $row["month_year"], "count" => $row["count"]);
                        }

                        $json_data = json_encode($data);
                    ?>
                    <script>
                        // Initialize the chart with the JSON data
                        var data = <?php echo $json_data; ?>;

                        var options = {
                          chart: {
                            height: 350,
                            type: 'bar',
                            toolbar: {
                              show: false
                            }
                          },
                          plotOptions: {
                            bar: {
                              horizontal: false,
                              barWidth: '55%', // Custom column width
                              endingShape: 'rounded', // Rounded bars
                              borderRadius: 10 // Border radius
                            }
                          },
                          series: [
                            {
                              name: 'New Hire On-Board',
                              data: data.map(function(item) {
                                return item.count;
                              })
                            }
                          ],
                          xaxis: {
                            categories: data.map(function(item) {
                              return item.month_year;
                            })
                          }
                        };

                        var chart = new ApexCharts(document.querySelector("#employee-hire-chart"), options);
                        chart.render();
                    </script>

                  </div>
                </div>
              </div>

              <div class="masonry-item col-md-6">
                <div class="bd bgc-white">
                  <div class="layers">
                    <div class="layer w-100 pX-20 pT-20">
                      <h6 class="lh-1">Applicants</h6>
                    </div>
                    <div class="layer w-100 p-20">
                      <div id="applicant-chart" height="220"></div>
                    </div>

                  <?php
                    include "../connection.php";

                    // Retrieve the applicant data for the graph
                    $result = $conn->query("SELECT DATE_FORMAT(app_applydate, '%M, %Y') AS month_year, COUNT(*) AS count FROM applicanttbl GROUP BY month_year");

                    // Format the data into an array
                    $data = array();
                    while ($row = $result->fetch_assoc()) {
                        $data[] = array("month_year" => $row["month_year"], "count" => $row["count"]);
                    }

                    // Convert the data to JSON format for use in the graph
                    $json_data = json_encode($data);
                  ?>

                  </div>
                </div>
              </div>

              </div>


              <div class="masonry-item col-md-12">
                <!-- #Sales Report ==================== -->
                <div class="bd bgc-white">
                  <div class="layers">
                    <div class="layer w-100 p-20">
                      <h6 class="lh-1">LEAVE REQUEST</h6>
                    </div>
                    <div class="layer w-100">
                      <div class="table-responsive p-20">
                      <table id="dataTable" class="table table-striped table-bordered"
                                cellspacing="0" width="100%">

                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Employee ID</th>
                                        <th scope="col">Types of Leave</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Date From</th>
                                        <th scope="col">Date To</th> 
                                        <th scope="col">Proof of Leave</th> 
                                        <th scope="col">Action</th>
                                      </tr>
                                </thead>
                    
                           <tbody id="myTable">
                            <?php

                            $leave = mysqli_query($conn, "SELECT * FROM reqleave ");
                            $row = mysqli_num_rows($leave);
                                if($row > 0){
                                    while ($row = mysqli_fetch_array($leave)) {
                                        # code...
                            ?>

                            <tr>
                                <td class="fw-bold"><?php echo $row['id'];?></td>
                                <td class="fw-bold"><?php echo $row['emp'];?></td>
                                <td class="fw-bold"><?php echo $row['lv_leave'];?></td>

                                <td>
                                  <?php $status = $row['lv_status'];
                                    if ($status);{
                                      if($status == 'Pending'){
                                        echo '<button class="btn btn-warning btn-sm fw-bold pe-none">Pending</button>';}
                                        elseif($status == 'Declined'){
                                          echo '<button class="btn btn-danger btn-sm pe-none">Declined</button>'; }
                                        elseif($status == 'Approved'){
                                              echo '<button class="btn btn-success btn-sm pe-none">Approved</button>';}
                                  } 
                                  ?>
                                </td>

                                <td class="fw-bold">
                                  <?php $date = $row['lv_datefrom'];
                                        $date = strtotime ($date);
                                        $date = date ('F j, Y', $date);
                                             echo $date;
                                  ?>
                                </td>

                                <td class="fw-bold">
                                  <?php $date = $row['lv_dateto'];
                                        $date = strtotime ($date);
                                        $date = date ('F j, Y', $date);
                                             echo $date;
                                  ?>
                                </td>
                              
                              	<td>
                                  <?php $status = $row['proof_file'];
                                    if ($status);{
                                      if($status == NULL){
                                        echo '<button class="btn btn-secondary btn-sm pe-none">No File</button>';}
                                      else{
                                        echo '<a href="../public/uploads/proofLeave/'.$row['proof_file'].'"
                                                        target="_blank"
                                                        class="btn btn-primary btn-sm">View File</a>'; 
                                            }
                                        } 
                                      ?>
								                </td>
                                <td>
                                        <button type="button" 
                                                class="btn btn-info" 
                                                data-bs-toggle="modal"
                                                title="View"
                                                data-bs-target="#view<?php echo $row['id'] ?>"><i class="bi bi-eye-fill"></i>
                                        </button>

                                        <!-- VIEW row  DETAILS MODAL -->
                                            <div class="modal fade" id="view<?php echo $row['id'] ?>" aria-labelledby="view" aria-hidden="true">
                                               <div class="modal-dialog modal-dialog-centered modal-lg">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title fw-bold">VIEW REQUEST LEAVE</h4>
                                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                  <!-- Modal body -->
                                                  <div class="modal-body">
                                                    <form method="POST">

                                                        <table class="table table-striped">
                                                          <tbody>
                                                              <tr><th scope="row">Request ID</th>
                                                                <td><?php echo $row['id'] ?></td></tr>

                                                              <tr><th scope="row">Employee ID</th>
                                                                <td><?php echo $row['emp'] ?></td></tr>

                                                                <tr><th scope="row">Fullname</th>
                                                                <td class="fw-bold"><?php echo $row['name'];?></td>
                                                                </tr>

                                                              <tr><th scope="row">Types of Leave</th>
                                                                <td><?php echo $row['lv_leave'];?></td></tr>

                                                              <tr><th scope="row">Date From</th>
                                                                <td>
                                                                      <?php $date = $row['lv_datefrom'];
                                                                            $date = strtotime ($date);
                                                                            $date = date ('F j, Y', $date);
                                                                                echo $date;
                                                                      ?>
                                                                </td></tr>

                                                              <tr><th scope="row">Date To</th>
                                                                <td>
                                                                      <?php $date = $row['lv_dateto'];
                                                                            $date = strtotime ($date);
                                                                            $date = date ('F j, Y', $date);
                                                                                echo $date;
                                                                      ?>
                                                                </td></tr>
                                                            
                                                              <tr><th scope="row">Proof of Leave</th>
                                                                <td>
                                                                      <?php $status = $row['proof_file'];
                                                                        if ($status);{
                                                                          if($status == NULL){
                                                                            echo '<button class="btn btn-secondary btn-sm pe-none">No File</button>';}
                                                                          else{
                                                                            echo '<a href="../public/uploads/proofLeave/'.$row['proof_file'].'"
                                                                                            target="_blank"
                                                                                            class="btn btn-primary btn-sm">View File</a>'; 
                                                                                }
                                                                            } 
                                                                          ?>
                                                                </td></tr>
                                                            
                                                              <tr><th scope="row">Status</th>
                                                                <td>
                                                                <?php $status = $row['lv_status'];
                                                                    if ($status);{
                                                                      if($status == 'Pending'){
                                                                        echo '<button class="btn btn-warning btn-sm fw-bold pe-none">Pending</button>';}
                                                                      elseif($status == 'Declined'){
                                                                        echo '<button class="btn btn-danger btn-sm pe-none">Declined</button>'; }
                                                                      elseif($status == 'Approved'){
                                                                            echo '<button class="btn btn-success btn-sm pe-none">Approved</button>';}
                                                                } 
                                                                ?> 
                                                              </td></tr>

                                                              <tr><th scope="row">Note</th>
                                                                <td><?php echo $row['lv_note'] ?></td></tr>

                                                              <tr><th scope="row">Remarks</th>
                                                                <td><?php echo $row['remarks'] ?></td></tr>

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


        <script>
          // Initialize the chart with the JSON data
          var data = <?php echo $json_data; ?>;

          var options = {
            chart: {
              height: 350,
              type: 'bar',
              toolbar: {
                show: false
              }
            },
            plotOptions: {
              bar: {
                horizontal: false,
                barWidth: '55%', // Custom column width
                endingShape: 'rounded', // Rounded bars
                borderRadius: 10 // Border radius
              }
            },
            series: [
              {
                name: 'Applicants',
                data: data.map(function(item) {
                  return item.count;
                })
              }
            ],
            xaxis: {
              categories: data.map(function(item) {
                return item.month_year;
              })
            }
          };

          var chart = new ApexCharts(document.querySelector("#applicant-chart"), options);
          chart.render();
        </script>


  </body>
</html>
