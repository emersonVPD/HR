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
          if ($positionTitle !== 'HR 3 Manager' && $positionTitle !== 'Super Admin') {
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
    <title>HR 3</title>

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
              <a class="sidebar-link" href="../../index.php"
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
                <li><a class="sidebar-link" href="../Time and Attendance/TimeandAttendance.php">Time and Attendance</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
            <a class="dropdown-toggle" data-bs-toggle="collapse" href="#q2"
                ><span class="icon-holder"
                  ><i class="bi bi-calendar-day"></i></span
                ><span class="title">Shift and Schedule</span>
                <span class="arrow"><i class="ti-angle-right"></i></span
              ></a>
              <ul class="dropdown-menu collapsed show" id="q2">
                <li><a class="sidebar-link" href="ViewSandS.php">ViewSandS</a></li>
                <li><a class="sidebar-link actived" href="RequestChange.php">RequestChange</a></li>
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
                <li><a class="sidebar-link" href="../Timesheet Management/timesheet.php">Employee Timesheet</a></li>
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
                <li><a class="sidebar-link" href="../Leave Management/RequestLeave.php">Request Leaves</a></li>
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
                <li><a class="sidebar-link" href="../Claims and Reimbursement/RequestClaims.php">Request Claims</a></li>
                <li><a class="sidebar-link" href="../Claims and Reimbursement/RequestReimbursement.php">Request Reimbursement</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>

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
              <h4 class="c-grey-900 mT-10 mB-30 fw-bold">REQUEST CHANGE SHIFT AND SCHEDULE</h4>
                <div class="row">
                    <div class="col-md-12">
                      <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

                          <table id="dataTable" class="table table-striped table-bordered"
                                cellspacing="0" width="100%">

                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name ( Employee ID )</th>
                                        <th scope="col">Schedule</th>
                                        <th scope="col">Day off</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                      </tr>
                                </thead>
                    
                           <tbody id="myTable">
                            <?php

                            $leave = mysqli_query($conn, "SELECT * FROM reqsands");
                            $row = mysqli_num_rows($leave);
                                if($row > 0){
                                    while ($row = mysqli_fetch_array($leave)) {
                                        # code...
                            ?>

                            <tr>
                                <td class="fw-bold">
                                  <?php echo $row['id'];?>
                                </td>

                                <td class="fw-bold">
                                  <?php echo $row['name'];?> ( <?php echo $row['employeeID'];?> )
                                </td>

                                <td class="fw-bold">
                                <?php echo $row['day1'];?> / 
                                <?php echo $row['day2'];?> / 
                                <?php echo $row['day3'];?> / 
                                <?php echo $row['day4'];?> / 
                                <?php echo $row['day5'];?>
                                </td>

                                <td class="fw-bold">
                                <?php echo $row['dayoff1'];?> / <?php echo $row['dayoff2'];?>
                                </td>

                                <td>
                                  <?php $status = $row['status'];
                                    if ($status);{
                                      if($status == 'Pending'){
                                        echo '<button class="btn btn-warning btn-sm fw-bold pe-none">Pending</button>';}
                                        elseif($status == 'Approved'){
                                          echo '<button class="btn btn-success btn-sm pe-none">Approved</button>'; }
                                        elseif($status == 'Declined'){
                                              echo '<button class="btn btn-danger btn-sm pe-none">Declined</button>'; }
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
                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title fw-bold">VIEW SHIFT AND SCHEDULE</h4>
                                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                  <!-- Modal body -->
                                                  <div class="modal-body">
                                                    <form method="POST">

                                                        <table class="table table-striped">
                                                          <tbody>
                                                              <tr><th scope="row">ID</th>
                                                                <td><?php echo $row['id'] ?></td></tr>

                                                                <tr><th scope="row">Fullname</th>
                                                                <td>
                                                                      <?php echo $row['name'];?> 
                                                                </td>
                                                                </tr>

                                                                <tr><th scope="row">Employee ID</th>
                                                                <td>
                                                                    <?php echo $row['employeeID'];?> 
                                                                </td>
                                                                </tr>

                                                                <tr><th scope="row">Request Date</th>
                                                                <td>
                                                                  <?php $date = $row['reqdate'];
                                                                        $date = strtotime ($date);
                                                                        $date = date ('F j, Y', $date);
                                                                  echo $date;
                                                                  ?>
                                                                  </td>
                                                                </tr>

                                                                <tr><th scope="row">Status</th>
                                                                <td>
                                                                      <?php $status = $row['status'];
                                                                        if ($status);{
                                                                          if($status == 'Pending'){
                                                                            echo '<button class="btn btn-warning btn-sm fw-bold pe-none">Pending</button>';}
                                                                            elseif($status == 'Approved'){
                                                                              echo '<button class="btn btn-success btn-sm pe-none">Approved</button>'; }
                                                                            elseif($status == 'Declined'){
                                                                                  echo '<button class="btn btn-danger btn-sm pe-none">Declined</button>'; }
                                                                      } 
                                                                      ?>
                                                                  </td>
                                                                </tr>

                                                                <tr><th scope="row">Shift</th>
                                                                <td class="fw-bold"><?php echo $row['shift'];?></td>
                                                                </tr>

                                                                <tr><th scope="row">Day 1</th>
                                                                <td><?php echo $row['day1'];?></td>
                                                                </tr>

                                                                <tr><th scope="row">Day 2</th>
                                                                <td><?php echo $row['day2'];?></td>
                                                                </tr>

                                                                <tr><th scope="row">Day 3</th>
                                                                <td><?php echo $row['day3'];?></td>
                                                                </tr>

                                                                <tr><th scope="row">Day 4</th>
                                                                <td><?php echo $row['day4'];?></td>
                                                                </tr>

                                                                <tr><th scope="row">Day 5</th>
                                                                <td><?php echo $row['day5'];?></td>
                                                                </tr>

                                                                <tr><th scope="row">Day off 1 Schedule</th>
                                                                <td><?php echo $row['dayoff1'];?></td>
                                                                </tr>

                                                                <tr><th scope="row">Day off 2 Schedule</th>
                                                                <td><?php echo $row['dayoff2'];?></td>

                                                                <tr><th scope="row">Note</th>
                                                                <td><?php echo $row['note'];?></td>
                                                                </tr>

                                                                <tr><th scope="row">Remarks</th>
                                                                <td><?php echo $row['remarks'];?></td>
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

                                        <!-- UPDATE row DETAILS MODAL -->
                                        <div class="modal fade" id="edit<?php echo $row['id'] ?>" aria-labelledby="fillup" aria-hidden="true">
                                          <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title fw-bold">UPDATE REQUEST CHANGE SHIFT and SCHEDULE</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                            <!-- Modal body -->
                                                    <div class="modal-body">
                                                      <form action="../../../Controller/ChangeSandSQuery.php" method="POST">

                                                      <input type="hidden" name="id" value="<?php echo $row['id'] ?>">

                                                      <div class="mb-3 row">
                                                        <label for="" class="col-md-4 fw-bold">Status</label>
                                                          <div class="col-md-8">
                                                                  <select class="form-select" 
                                                                          name="status" 
                                                                          aria-label="Floating label select example"
                                                                          required>

                                                                  <option value="<?php echo $row['status'];?>">
                                                                                <?php echo $row['status'];?>
                                                                  </option>
                                                                  <option value="Pending" class="fw-bold">Pending</option>
                                                                  <option value="Approved" class="fw-bold">Approved</option>
                                                                  <option value="Declined" class="fw-bold">Declined</option>
                                                                </select>
                                                          </div>
                                                      </div>

                                                          <hr>

                                                          <div class="mb-3 row">
                                                              <label for="" class="col-md-4 form-label fw-bold">Input Remarks</label>
                                                            <div class="col-md-8">
                                                                <textarea class="form-control" 
                                                                          name="remarks" style="resize: none;"
                                                                          rows="5"><?php echo $row['remarks'];?></textarea>
                                                            </div>
                                                          </div>

                                                      <hr>
                                                          <div class="mb-3 row">
                                                            <label for="" class="col-md-4 form-label fw-bold">Fullname</label>
                                                          <div class="col-md-8">
                                                                <input class="form-control"
                                                                        type="text" 
                                                                        readonly class="form-control-plaintext" 
                                                                        value="<?php echo $row['name'];?>">
                                                          </div>
                                                        </div>

                                                          <div class="mb-3 row">
                                                            <label for="" class="col-md-4 form-label fw-bold">Employee ID</label>
                                                          <div class="col-md-8">
                                                                <input class="form-control"
                                                                        type="text" 
                                                                        readonly class="form-control-plaintext" 
                                                                        value="<?php echo $row['employeeID'];?>">
                                                          </div>
                                                        </div><hr>

                                                          <div class="mb-3 row">
                                                            <label for="" class="col-md-4 form-label fw-bold">Shift</label>
                                                          <div class="col-md-8">
                                                                <input class="form-control"
                                                                        type="text" 
                                                                        readonly class="form-control-plaintext" 
                                                                        value="<?php echo $row['shift'];?>">
                                                          </div>
                                                        </div>


                                                          <div class="mb-3 row">
                                                            <label for="" class="col-md-4 form-label fw-bold">Day 1</label>
                                                          <div class="col-md-8">
                                                                <input class="form-control"
                                                                        type="text" 
                                                                        readonly class="form-control-plaintext" 
                                                                        value="<?php echo $row['day1'];?>">
                                                          </div>
                                                        </div>

                                                          <div class="mb-3 row">
                                                            <label for="" class="col-md-4 form-label fw-bold">Day 2</label>
                                                          <div class="col-md-8">
                                                                <input class="form-control"
                                                                        type="text" 
                                                                        readonly class="form-control-plaintext" 
                                                                        value="<?php echo $row['day2'];?>">
                                                          </div>
                                                        </div>

                                                          <div class="mb-3 row">
                                                            <label for="" class="col-md-4 form-label fw-bold">Day 3</label>
                                                          <div class="col-md-8">
                                                                <input class="form-control"
                                                                        type="text" 
                                                                        readonly class="form-control-plaintext" 
                                                                        value="<?php echo $row['day3'];?>">
                                                          </div>
                                                        </div>

                                                          <div class="mb-3 row">
                                                            <label for="" class="col-md-4 form-label fw-bold">Day 4</label>
                                                          <div class="col-md-8">
                                                                <input class="form-control"
                                                                        type="text" 
                                                                        readonly class="form-control-plaintext" 
                                                                        value="<?php echo $row['day4'];?>">
                                                          </div>
                                                        </div>

                                                          <div class="mb-3 row">
                                                            <label for="" class="col-md-4 form-label fw-bold">Day 5</label>
                                                          <div class="col-md-8">
                                                                <input class="form-control"
                                                                        type="text" 
                                                                        readonly class="form-control-plaintext" 
                                                                        value="<?php echo $row['day5'];?>">
                                                          </div>
                                                        </div>


                                                      <hr><p class="text-center fw-bold"> DAY OFF</p><hr>

                                                          <div class="mb-3 row">
                                                            <label for="" class="col-md-4 form-label fw-bold">Day Off 1</label>
                                                          <div class="col-md-8">
                                                                <input class="form-control"
                                                                        type="text" 
                                                                        readonly class="form-control-plaintext" 
                                                                        value="<?php echo $row['dayoff1'];?>">
                                                          </div>
                                                        </div>

                                                          <div class="mb-3 row">
                                                            <label for="" class="col-md-4 form-label fw-bold">Day Off 2</label>
                                                          <div class="col-md-8">
                                                                <input class="form-control"
                                                                        type="text" 
                                                                        readonly class="form-control-plaintext" 
                                                                        value="<?php echo $row['dayoff2'];?>">
                                                          </div>
                                                        </div>

                                                      <hr>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" name="updateHR1" class="btn btn-success">UPDATE</button>
                                                        </div>

                                                  </form>
                                                  </div>            
                                            </div>
                                          </div>
                                        </div>
                                        <!-- END OF UPDATE row DETAILS MODAL -->

                                
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
  </body>
</html>
