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
          if ($positionTitle !== 'HR 2 Manager' && $positionTitle !== 'Super Admin') {
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
    <title>HR 2</title>

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
                      <h5 class="lh-1 mB-0 logo-text ms-4">HUMAN RESOURCE 2</h5>
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
            <li class="nav-item mT-30">
              <a class="sidebar-link" href="../../index.php"
                ><span class="icon-holder"
                  ><i class="c-blue-500 ti-home"></i> </span
                ><span class="title">Dashboard</span></a
              >
            </li>

            <li class="nav-item dropdown">
            <a class="dropdown-toggle" data-bs-toggle="collapse" href="#q1"
                ><span class="icon-holder"
                  ><i class="bi bi-person-lines-fill"></i></span
                ><span class="title">Competency Management</span>
                <span class="arrow"><i class="ti-angle-right"></i></span
              ></a>
              <ul class="dropdown-menu" id="q1">
                <li><a class="sidebar-link" href="../Competency Management/JobVacancy.php">Job Vacancy</a></li>
                <li><a class="sidebar-link" href="../Competency Management/SetofSandQ.php">Set of Skills and Qualifications</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
            <a class="dropdown-toggle" data-bs-toggle="collapse" href="#q2"
                ><span class="icon-holder"
                  ><i class="bi bi-book-half"></i></span
                ><span class="title">Learning Management</span>
                <span class="arrow"><i class="ti-angle-right"></i></span
              ></a>
              <ul class="dropdown-menu" id="q2">
                <li><a class="sidebar-link" href="../Learning Management/ExamModules.php">Exam Modules</a></li>
                <li><a class="sidebar-link" href="../Learning Management/TrainingModules.php">Training Modules</a></li>
                <li><a class="sidebar-link" href="../Learning Management/RequestTrainingModules.php">Request Training Modules</a></li>
                <li><a class="sidebar-link" href="../Learning Management/RequestExamModules.php">Request Exam Modules</a></li>

              </ul>
            </li>

            <li class="nav-item dropdown">
            <a class="dropdown-toggle" data-bs-toggle="collapse" href="#q3"
                ><span class="icon-holder"
                  > <i class="bi bi-person-square"></i></span
                ><span class="title">Training Management</span>
                <span class="arrow"><i class="ti-angle-right"></i></span
              ></a>
              <ul class="dropdown-menu collapsed show" id="q3">
                <li><a class="sidebar-link actived" href="TrainingSchedule.php">Training Schedule</a></li>
                <li><a class="sidebar-link" href="RequestTrainingFacility.php">Request Training Facility</a></li>
                <li><a class="sidebar-link" href="RequestTrainingModules.php">Request Training Modules</a></li>
                <li><a class="sidebar-link" href="TrainingResult.php">Training Result</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
            <a class="dropdown-toggle" data-bs-toggle="collapse" href="#q4"
                ><span class="icon-holder"
                  ><i class="bi bi-person-badge"></i></span
                ><span class="title">Emloyee Self Service</span>
                <span class="arrow"><i class="ti-angle-right"></i></span
              ></a>
              <ul class="dropdown-menu">
                <li><a class="sidebar-link" href="../Employee Self Service/EmployeeEvaluation.php">ESS Accounts</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a class="dropdown-toggle" href="javascript:void(0);"
                ><span class="icon-holder"
                  ><i class="bi bi-list-check"></i></span
                ><span class="title">Succession Planning</span>
                <span class="arrow"><i class="ti-angle-right"></i></span
              ></a>
              <ul class="dropdown-menu">
                <li><a class="sidebar-link" href="../Succession Planning/SuccessorLineUp.php">Successor Line Up</a></li>
                <li><a class="sidebar-link" href="../Succession Planning/RequestEmployee.php">Request New Employee</a></li>
                <li><a class="sidebar-link" href="../Succession Planning/SubstituteEmployee.php">Substitute From Current Employee</a></li>
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
              <h4 class="c-grey-900 mT-10 mB-30 fw-bold">TRAINING SCHEDULE</h4>
                <div class="row">
                    <div class="col-md-12">
                      <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

                      <!-- ADD EMPLOYEE TRAINING SCHEDULE BUTTON -->
                      <div class="mb-3 text-end">
                          <button type="submit" 
                                  data-bs-toggle="modal" 
                                  data-bs-target="#addTrainingschedule" 
                                  class="btn btn-primary">+ Add Schedule
                          </button>
                      </div>

                      <!-- ADD TRAINING SCHEDULE MODAL -->
                        <div class="modal fade" id="addTrainingschedule" aria-labelledby="addSandQ" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                    <h4 class="modal-title fw-bold">ADD EMPLOYEE TRAINING SCHEDULE</h4>
                                      <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                <!-- Modal body -->
                                    <div class="modal-body">
                                    <form action="../../../Controller/TrainingScheduleQuery.php" method="POST">
                                      
                                      <div class="mb-3 row">
                                        <label for="" class="col-md-5 fw-bold">Employee ID - Fullname</label>
                                        <div class="col-md-7">

                                          <select class="form-control selectpicker"  
                                                  name="nameemp" 
                                                  data-live-search="true"
                                                  required>

                                            <option selected disabled value="">Employee ID - Fullname</option>

                                            <?php
                                            $query = mysqli_query($conn, "SELECT emp_firstname,emp_middlename,emp_lastname, employeeID FROM employeetbl");
                                            $row = mysqli_num_rows($query);

                                            while ($row = mysqli_fetch_array($query))
                                            {
                                              echo "<option data-tokens=' "
                                                .$row['employeeID']."&nbsp;"."-"."&nbsp;"
                                                .$row['emp_firstname']."&nbsp;"
                                                .$row['emp_middlename']."&nbsp;"
                                                .$row['emp_lastname']. "'>

                                                ".$row['employeeID']."&nbsp;"."-"."&nbsp;"
                                                .$row['emp_firstname']."&nbsp;"
                                                .$row['emp_middlename']."&nbsp;"
                                                .$row['emp_lastname']."</option>" ;
                                            }
                                            ?>
                                          </select>
                                        </div>
                                      </div>

                                        <div class="mb-3 row">
                                            <label for="" class="col-md-5 form-label fw-bold">Training Date From</label>
                                          <div class="col-md-7">
                                            <input type="date" 
                                                  class="form-control" 
                                                  name="train_sched_from"
                                                  required="required">
                                          </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="" class="col-md-5 form-label fw-bold">Training Date To</label>
                                          <div class="col-md-7">
                                            <input type="date" 
                                                  class="form-control" 
                                                  name="train_sched_to"
                                                  required="required">
                                          </div>
                                        </div>

                                      <div class="mb-3 row">
                                        <label for="" class="col-md-5 form-label fw-bold">Input Remarks</label>
                                        <div class="col-md-7">
                                          <textarea class="form-control" 
                                                    name="train_sched_remarks"
                                                    rows="5"> 
                                          </textarea>
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
                     
                          <table id="dataTable" class="table table-striped table-bordered"
                                cellspacing="0" width="100%">

                                <thead>
                                  <tr>
                                      <th scope="col">Request ID</th>
                                      <th scope="col">Facility Type</th>
                                      <th scope="col">Date From</th>
                                      <th scope="col">Date To</th>
                                      <th scope="col">Status</th>
                                      <th scope="col">Alternative</th>
                                      <th scope="col">Action</th>
                                    </tr>
                              </thead>
                              <tbody id="myTable">
                                  <?php

                                  $sql1 = mysqli_query($conn, "SELECT * FROM facilitiestbl WHERE subSystem = 'Human Resource 2' AND facility_type = 'Training Facility'");
                                  $facility = mysqli_num_rows($sql1);
                                      if($facility > 0){
                                          while ($facility = mysqli_fetch_array($sql1)) {
                                              # code...
                                  ?>

                                  <tr>
                                      <td><?php echo $facility['id'];?></td>
                                      <td class="fw-bold"><?php echo $facility['facility_type'];?></td>
                                      <td class="fw-bold"><?php $date = $facility['req_dateFrom'];
                                                                $date = strtotime ($date);
                                                                $date = date ('F j, Y', $date);
                                                                echo $date;?> 
                                      </td>
                                      <td class="fw-bold"><?php $date = $facility['req_dateTo'];
                                                                $date = strtotime ($date);
                                                                $date = date ('F j, Y', $date);
                                                                echo $date;?>
                                      </td>
                                      <td>
                                        <?php $status = $facility['status'];
                                            if ($status);{
                                                if($status == 'Approved'){
                                                    echo '<button class="btn btn-success btn-sm pe-none">Approved</button>';}
                                                elseif($status == 'Declined'){
                                                    echo '<button class="btn btn-danger btn-sm pe-none">Declined</button>'; }
                                                elseif($status == 'Pending'){
                                                    echo '<button class="btn btn-warning btn-sm pe-none fw-bold">Pending</button>'; }
                                          } ?> 
                                      </td>
                                      <td class="fw-bold"><?php echo $facility['alternative'];?></td>
                                      <td>
                                        <button type="button" 
                                                class="btn btn-info" 
                                                data-bs-toggle="modal"
                                                title="View"
                                                data-bs-target="#view<?php echo $facility['id'] ?>"><i class="bi bi-eye-fill"></i>
                                        </button>

                                        <button type="button" 
                                                class="btn btn-warning" 
                                                data-bs-toggle="modal"
                                                title="Edit"
                                                data-bs-target="#edit<?php echo $facility['id'] ?>"><i class="bi bi-pencil-fill"></i>
                                        </button>

                                        <!-- VIEW REQUEST FACILITY DETAILS MODAL -->
                                        <div class="modal fade" id="view<?php echo $facility['id'] ?>" aria-labelledby="view" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title fw-bold">REQUEST FACILITY INFORMATION</h4>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>

                                              <!-- Modal body -->
                                              <div class="modal-body">
                                                <form method="POST">

                                                    <table class="table table-striped">
                                                      <tbody>
                                                          <tr><th scope="row">Request ID</th>
                                                            <td><?php echo $facility['id'] ?></td></tr>

                                                          <tr><th scope="row">Facility Type</th>
                                                            <td><?php echo $facility['facility_type'] ?></td></tr>

                                                          <tr><th scope="row">Date From</th>
                                                            <td><?php $date = $facility['req_dateFrom'];
                                                                    $date = strtotime ($date);
                                                                    $date = date ('F j, Y', $date);
                                                                    echo $date;?></td></tr>

                                                          <tr><th scope="row">Date To</th>
                                                            <td><?php $date = $facility['req_dateTo'];
                                                                    $date = strtotime ($date);
                                                                    $date = date ('F j, Y', $date);
                                                                    echo $date;?></td></tr>

                                                          <tr><th scope="row">Request By</th>
                                                            <td><?php echo $facility['requestBy'] ?></td></tr>

                                                          <tr><th scope="row">Sub System</th>
                                                            <td><button class="btn btn-primary btn-sm pe-none"> 
                                                                <?php echo $facility['subSystem'] ?> 
                                                                </button>
                                                            </td></tr>

                                                          <tr><th scope="row">Status</th>
                                                            <td>
                                                            <?php $status = $facility['status'];
                                                                if ($status);{
                                                                    if($status == 'Approved'){
                                                                        echo '<button class="btn btn-success btn-sm pe-none">Approved</button>';}
                                                                    elseif($status == 'Declined'){
                                                                        echo '<button class="btn btn-danger btn-sm pe-none">Declined</button>'; }
                                                                    elseif($status == 'Pending'){
                                                                        echo '<button class="btn btn-warning btn-sm pe-none fw-bold">Pending</button>'; }
                                                              } ?> 
                                                          </td></tr>

                                                          <tr><th scope="row">Alternative</th>
                                                            <td><?php echo $facility['alternative'] ?></td></tr>

                                                          <tr><th scope="row">Remarks</th>
                                                            <td><?php echo $facility['remarks'] ?></td></tr>
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
                                        <!-- END OF VIEW REQUEST FACILITY DETAILS MODAL -->

                                        <!-- UPDATE REQUEST FACILITY DETAILS MODAL -->
                                            <div class="modal fade" id="edit<?php echo $facility['id'] ?>" aria-labelledby="fillup" aria-hidden="true">
                                              <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h4 class="modal-title fw-bold">UPDATE REQUEST FACILITY</h4>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                                <!-- Modal body -->
                                                      <div class="modal-body">
                                                        <form action="../../../Controller/RequestFacilitiesQuery.php" method="POST">

                                                          <input type="hidden" name="id" value="<?php echo $facility['id'] ?>">

                                                          <div class="mb-3 row">
                                                              <label for="" class="col-md-4 form-label fw-bold">Request By</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control"
                                                                      type="text" 
                                                                      readonly class="form-control-plaintext" 
                                                                      value="<?php echo $facility['requestBy']; ?>">
                                                                  </div>
                                                          </div>

                                                          <div class="mb-3 row">
                                                              <label for="" class="col-md-4 form-label fw-bold">Sub System</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control"
                                                                      type="text" 
                                                                      readonly class="form-control-plaintext" 
                                                                      value="<?php echo $facility['subSystem']; ?>">
                                                                  </div>
                                                          </div>

                                                          <div class="mb-3 row">
                                                              <label for="" class="col-md-4 form-label fw-bold">Status</label>
                                                            <div class="col-md-8">
                                                                <?php $status = $facility['status'];
                                                                  if ($status);{
                                                                      if($status == 'Approved'){
                                                                          echo '<button class="btn btn-success btn-sm pe-none">Approved</button>';}
                                                                      elseif($status == 'Declined'){
                                                                          echo '<button class="btn btn-danger btn-sm pe-none">Declined</button>'; }
                                                                      elseif($status == 'Pending'){
                                                                          echo '<button class="btn btn-warning btn-sm pe-none fw-bold">Pending</button>'; }
                                                                } ?> 
                                                              </div>
                                                          </div>
                                                          <hr>

                                                          <div class="mb-3 row">
                                                                  <label for="Department" class="col-md-4 fw-bold">Facility Type</label>
                                                                <div class="col-md-8">
                                                                    <select class="form-select" 
                                                                            name="facility_type" 
                                                                            aria-label="Floating label select example"
                                                                            required>

                                                                      <option value="<?php echo $facility['facility_type'];?>"><?php echo $facility['facility_type'];?></option>                                                   
                                                                      <option value="Training Facility">Training Facility</option>

                                                                    </select>
                                                                </div>
                                                          </div>

                                                          <div class="mb-3 row">
                                                                    <label for="" class="col-md-4 form-label fw-bold">Date From</label>
                                                                  <div class="col-md-8">
                                                                    <input type="date" 
                                                                          class="form-control" 
                                                                          name="req_dateFrom"
                                                                          value="<?php echo $facility['req_dateFrom']; ?>"  
                                                                          placeholder="EmployeeID"
                                                                          required="required">
                                                                  </div>
                                                          </div>

                                                          <div class="mb-3 row">
                                                                    <label for="" class="col-md-4 form-label fw-bold">Date To</label>
                                                                  <div class="col-md-8">
                                                                    <input type="date" 
                                                                          class="form-control" 
                                                                          name="req_dateTo"
                                                                          value="<?php echo $facility['req_dateTo']; ?>"  
                                                                          placeholder="EmployeeID"
                                                                          required="required">
                                                                  </div>
                                                          </div>
                                                          
                                                              <div class="modal-footer">
                                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                  <button type="submit" name="updateReq" class="btn btn-primary">Update</button>
                                                              </div>
                                                        </form>   
                                                      </div>
                                                </div>
                                              </div>
                                            </div>
                                        <!-- END OF UPDATE REQUEST FACILITY DETAILS MODAL -->
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
