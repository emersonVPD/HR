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
              <ul class="dropdown-menu collapsed show" id="q1">
                <li><a class="sidebar-link" href="JobVacancy.php">Job Vacancy</a></li>
                <li><a class="sidebar-link actived" href="SetofSandQ.php">Set of Skills and Qualifications</a></li>
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
              <ul class="dropdown-menu" id="q3">
                <li><a class="sidebar-link" href="../Training Management/TrainingSchedule.php">Training Schedule</a></li>
                <li><a class="sidebar-link" href="../Training Management/RequestTrainingFacility.php">Request Training Facility</a></li>
                <li><a class="sidebar-link" href="../Training Management/RequestTrainingModules.php">Request Training Modules</a></li>
                <li><a class="sidebar-link" href="../Training Management/TrainingResult.php">Training Result</a></li>
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
              <li><a class="sidebar-link" href="../Employee Self Service/ESSAccounts.php">ESS Accounts</a></li>
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
              <h4 class="c-grey-900 mT-10 mB-30 fw-bold">SET OF SKILLS AND QUALIFICATIONS</h4>
                <div class="row">
                    <div class="col-md-12">
                      <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

                      <!-- ADD SKILLS AND QUALIFICATIONS BUTTON -->
                      <div class="text-end mb-3">
                          <button type="submit" 
                                  data-bs-toggle="modal" 
                                  data-bs-target="#addSandQ" 
                                  class="btn btn-primary">+ Add S and Q
                          </button>
                      </div>

                          <!-- ADD SKILLS AND QUALIFICATIONS MODAL -->
                          <div class="modal fade" id="addSandQ" aria-labelledby="addSandQ" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                <div class="modal-header">
                                      <h4 class="modal-title fw-bold">ADD SKILLS AND QUALIFICATIONS FILES</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                  <!-- Modal body -->
                                      <div class="modal-body">
                                        <form action="../../../Controller/SetofSandQquery.php" method="POST" enctype="multipart/form-data">
                                            
                                          <input type="hidden"
                                                  name="comp_status"
                                                  value="Pending">

                                            <div class="mb-3 row">
                                            <label for="PositionTitle" class="col-md-4 fw-bold">Job Title</label>
                                            <div class="col-md-8">
                                                    <select class="form-select" 
                                                            id="Positiontitle" 
                                                            name="comp_name" 
                                                            aria-label="Floating label select example"
                                                            required>

                                                    <option selected disabled value="">Select Position Title</option>
                                                    <option value="Customer Service Agent">Customer Service Agent</option>
                                                    <option value="Customer Service Manager">Customer Service Manager</option>
                                                    <option value="TourVisa Processing Staff">Tour Visa Processing Staff</option>
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
                                                <label for="EmployeeID" class="col-md-4 form-label fw-bold">Date Created</label>
                                              <div class="col-md-8">
                                                <input type="date" 
                                                      class="form-control" 
                                                      name="comp_datecreated"
                                                      placeholder="Select Created Date"
                                                      required="required">
                                              </div>
                                            </div>

                                            <div class="mb-3 row">
                                                  <label for="SandQFiles" class="col-md-4 form-label fw-bold">Upload SandQ Files</label>
                                                <div class="col-md-8">
                                                  <input type="file" 
                                                      class="form-control" 
                                                      name="comp_sandq_files" 
                                                      placeholder="Employee Image"
                                                      required="required"
                                                      accept=".pdf">
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
                          <!-- END OF ADD SKILLS AND QUALIFICATIONS MODAL -->

                          <table id="dataTable" class="table table-striped table-bordered"
                                cellspacing="0" width="100%">

                                <thead>
                                  <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Job Title</th>
                                      <th scope="col">Date Created</th>
                                      <th scope="col">S and Q Files</th>
                                      <th scope="col">Status</th>
                                      <th scope="col">Remarks</th>
                                      <th scope="col">Action</th>
                                  </tr>
                              </thead>

                              <tbody id="myTable">
                                  <?php

                                      $sql = mysqli_query($conn, "SELECT * FROM competencytbl");
                                      $count = 1;
                                      $sandq = mysqli_num_rows($sql);
                                          if($sandq > 0){
                                              while ($sandq = mysqli_fetch_array($sql)) {
                                                  # code...
                                      ?>

                                  <tr>
                                      <td><?php echo $count;?></td>
                                      <td class="fw-bold"><?php echo $sandq['comp_name'];?></td>
                                      <td class="fw-bold"><?php $date = $sandq['comp_datecreated'];
                                                                    $date = strtotime ($date);
                                                                    $date = date ('M j, Y', $date);
                                                                    echo $date;?></td>
                                      <td>
                                          <a href="../../../public/uploads/sandqfiles/<?php echo $sandq['comp_sandq_files'];?>" target="_blank">
                                              <button class="btn btn-primary btn-sm">View File</button>
                                      </td>
                                      <td>
                                          <?php $status = $sandq['comp_status'];
                                                if ($status);{
                                                    if($status == 'Pending'){
                                                        echo '<button class="btn btn-warning btn-sm pe-none fw-bold">Pending</button>';}
                                                    elseif($status == 'Approved'){
                                                        echo '<button class="btn btn-success btn-sm pe-none">Approved</button>'; }
                                                    elseif($status == 'Revised'){
                                                        echo '<button class="btn btn-danger btn-sm pe-none">Revised</button>';}
                                                } ?>
                                      </td>
                                      <td class="fw-bold">...</td>

                                      <td>
                                          <button type="button" class="btn btn-info" 
                                                  data-bs-toggle="modal" title="View" 
                                                  data-bs-target="#view<?php echo $sandq['id'] ?>"><i class="bi bi-eye-fill"></i>
                                          </button>

                                          <!-- VIEW SKILLS AND QUALIFICATIONS DETAILS AND FILES MODAL -->
                                          <div class="modal fade" id="view<?php echo $sandq['id'] ?>" aria-labelledby="view" aria-hidden="true">
                                              <div class="modal-dialog modal-lg">
                                                  <div class="modal-content">
                                                      <div class="modal-header">
                                                          <h4 class="modal-title fw-bold">S and Q DETAILS and FILES</h4>
                                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                      </div>

                                                      <!-- Modal body -->
                                                      <div class="modal-body">
                                                              <table class="table table-striped">
                                                                <tbody>
                                                                      <tr>
                                                                          <th scope="row">Job Title</th>
                                                                          <td><?php echo $sandq['comp_name'] ?></td>
                                                                      </tr>

                                                                      <tr>
                                                                          <th scope="row">Date Created</th>
                                                                          <td><?php $date = $sandq['comp_datecreated'];
                                                                    $date = strtotime ($date);
                                                                    $date = date ('F j, Y', $date);
                                                                    echo $date;?>
                                                                          </td>
                                                                      </tr>

                                                                      <tr>
                                                                          <th scope="row">Skills and Qualifications Files</th>
                                                                          <td><a href="../../../public/uploads/sandqfiles/<?php echo $sandq['comp_sandq_files'];?>" target="_blank">
                                                                                  <button class="btn btn-primary btn-sm">View File</button></td>

                                                                      </tr>

                                                                      <tr>
                                                                          <th scope="row">Status</th>
                                                                          <td>
                                                                              <?php $status = $sandq['comp_status'];
                                                                                if ($status);{
                                                                                    if($status == 'Pending'){
                                                                                        echo '<button class="btn btn-warning btn-sm pe-none fw-bold">Pending</button>';}
                                                                                    elseif($status == 'Approved'){
                                                                                        echo '<button class="btn btn-success btn-sm pe-none">Approved</button>'; }
                                                                                    elseif($status == 'Revised'){
                                                                                        echo '<button class="btn btn-danger btn-sm pe-none">Revised</button>';}
                                                                              } ?>
                                                                          </td>
                                                                      </tr>
                                                                      <tr>
                                                                          <th scope="row">Remarks</th>
                                                                          <td><?php echo $sandq['comp_remarks'] ?></td>
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
                                          <!-- END OF VIEW SKILLS AND QUALIFICATIONS DETAILS AND FILES MODAL -->

                                        <button type="button" class="btn btn-warning" 
                                                data-bs-toggle="modal" title="Edit" 
                                                data-bs-target="#edit<?php echo $sandq['id'] ?>"><i class="bi bi-pencil-fill"></i>
                                        </button>

                                        <!-- UPDATE SKILLS AND QUALIFICATIONS DETAILS AND FILES MODAL -->
                                        <div class="modal fade" id="edit<?php echo $sandq['id'] ?>" aria-labelledby="fillup" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title fw-bold">UPDATE S and Q DETAILS and FILES</h4>
                                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <form action="../../../Controller/SetofSandQquery.php" method="POST" enctype="multipart/form-data">

                                                            <input type="hidden" name="id" value="<?php echo $sandq['id'] ?>">

                                                            <div class="mb-3 row">
                                                                <label for="" class="col-md-4 fw-bold">Job Title</label>
                                                                <div class="col-md-8">
                                                                    <select class="form-select" name="comp_name" aria-label="Floating label select example" required>

                                                                        <option value="<?php echo $sandq['comp_name'];?>"><?php echo $sandq['comp_name'];?></option>
                                                                        <option value="Customer Service Agent">Customer Service Agent</option>
                                                                        <option value="Customer Service Manager">Customer Service Manager</option>
                                                                        <option value="TourVisa Processing Staff">Tour Visa Processing Staff</option>
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
                                                                <label for="Date Created" class="col-md-4 form-label fw-bold">Date Created</label>
                                                                <div class="col-md-8">
                                                                    <input type="date" class="form-control" name="comp_datecreated" value="<?php echo $sandq['comp_datecreated'];?>" placeholder="Select Created Date" required="required">
                                                                </div>
                                                            </div>

                                                            <div class="mb-3 row">
                                                                <label for="" class="col-md-4 form-label fw-bold">Current File</label>
                                                                <div class="col-md-8">
                                                                    <a href="../../../public/uploads/sandqfiles/<?php echo $sandq['comp_sandq_files'];?>" target="_blank" class="btn btn-primary btn-sm">
                                                                        <?php echo $sandq['comp_sandq_files'];?></a>
                                                                </div>
                                                            </div>

                                                            <div class="mb-3 row">
                                                                <label for="" class="col-md-4 form-label fw-bold">Update S and Q Files</label>
                                                                <div class="col-md-8">
                                                                    <input type="file" name="comp_sandq_files" class="form-control">

                                                                    <input type="hidden" name="comp_sandq_files_old" value="<?php echo $sandq['comp_sandq_files']; ?>">
                                                                </div>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                <button type="submit" name="update" class="btn btn-success">Update</button>
                                                              </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END OF UPDATE SKILLS AND QUALIFICATIONS DETAILS AND FILES MODAL -->

                                        <button type="button" 
                                                class="btn btn-danger" 
                                                data-bs-toggle="modal" title="Delete" 
                                                data-bs-target="#delete<?php echo $sandq['id'] ?>"><i class="bi bi-trash"></i>
                                        </button>

                                        <!-- DELETE SKILLS AND QUALIFICATIONS DETAILS AND FILES MODAL -->
                                        <div class="modal fade" id="delete<?php echo $sandq['id'] ?>" aria-labelledby="view" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title fw-bold">DELETE S and Q DETAILS and FILES</h5>
                                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <form action="../../../Controller/SetofSandQquery.php" method="POST" enctype="multipart/form-data">
                                                            <p class="text-center fw-bold">ARE YOU SURE YOU WANT TO DELETE THIS ?</p>
                                                            <hr>

                                                            <div class="mb-3 row">
                                                                <label for="" class="col-md-4 form-label fw-bold">Job Title</label>
                                                                <div class="col-md-8">
                                                                    <input class="form-control" type="text" readonly class="form-control-plaintext" value="<?php echo $sandq['comp_name'];?>">
                                                                </div>
                                                            </div>

                                                            <div class="mb-3 row">
                                                                <label for="" class="col-md-4 form-label fw-bold">Skills and Qualifications File</label>
                                                                <div class="col-md-8">
                                                                    <a href="../../../public/uploads/sandqfiles/<?php echo $sandq['comp_sandq_files'];?>" target="_blank" class="btn btn-primary btn-sm">View File</a>
                                                                </div>
                                                            </div>

                                                            <div class="mb-3 row">
                                                                <label for="" class="col-md-4 form-label fw-bold">Date Created</label>
                                                                <div class="col-md-8">
                                                                    <input class="form-control" type="text" readonly class="form-control-plaintext" value="<?php $date = $sandq['comp_datecreated'];
                                                                                            $date = strtotime ($date);
                                                                                            $date = date ('F j, Y', $date);
                                                                                            echo $date;?>">
                                                                </div>
                                                            </div>

                                                            <input type="hidden" name="delete_id" value="<?php echo $sandq['id']; ?>">
                                                            <input type="hidden" name="del_comp_sandq_files" value="<?php echo $sandq['comp_sandq_files']; ?>">

                                                            <div class="modal-footer">
                                                                <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                                                        </form>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END OF DELETE SKILLS AND QUALIFICATIONS DETAILS AND FILES MODAL -->

                                      </td>
                                  </tr>
                                <?php $count = $count + 1; } } ?>
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
