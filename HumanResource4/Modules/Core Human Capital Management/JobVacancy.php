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
              <ul class="dropdown-menu collapse show" id="coreDropdown">
                <li><a class="sidebar-link actived" href="JobVacancy.php">Job Vacancy</a></li>
                <li><a class="sidebar-link" href="ApplicantInformation.php">Applicant</a></li>
                <li><a class="sidebar-link" href="EmployeeInformation.php">Employee</a></li>
                <li><a class="sidebar-link" href="SetofSandQ.php">Set of S and Q</a></li>
                <li><a class="sidebar-link" href="EmployeeRequest.php">Requesting of Employee</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a class="dropdown-toggle" href="javascript:void(0);"
                ><span class="icon-holder"
                  > <i class="bi bi-cash-coin"></i></span
                ><span class="title">Payroll</span>
                <span class="arrow"><i class="ti-angle-right"></i></span
              ></a>
              <ul class="dropdown-menu">
                <li><a class="sidebar-link" href="../Payroll Management/TimeandAttendance.php">Time and Attendance</a></li>
                <li><a class="sidebar-link"class="sidebar-link" href="../Payroll Management/create_payroll.php">Create Payroll</a></li>
                <li><a class="sidebar-link" href="../Payroll Management/RequestPayroll.php">Payroll Request</a></li>
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
              <h4 class="c-grey-900 mT-10 mB-30 fw-bold">JOB VACANCY</h4>
              <div class="row">
                <div class="col-md-12">
                  <div class="bgc-white bd bdrs-3 p-20 mB-20">

                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

                          <!-- ADD BUTTON-->
                  <div class="text-end mb-3">
                      <button type="submit" 
                              data-bs-toggle="modal" 
                              data-bs-target="#addlegalpapers" 
                              class="btn btn-primary">+ Add Job Vacancy
                      </button>
                  </div>

                <!-- ADD MODAL -->
                      <div class="modal fade" id="addlegalpapers" aria-labelledby="addSandQ" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                                  <h4 class="modal-title">ADD JOB VACANCY</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                              <!-- Modal body -->
                                  <div class="modal-body">
                                  <form action="../../../Controller/JobVacancyQuery.php" method="POST">
                                      <div class="mb-3 row">
                                        <label for="" class="col-md-4">Job Title Vacancy</label>
                                        <div class="col-md-8">
                                              <select class="form-select" 
                                                        name="job_title" 
                                                        aria-label="Floating label select example"
                                                        required>

                                                <option selected disabled value="">Select Job Title Vacancy</option>
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
                                          <label for="" class="col-md-4 form-label">Number of Jobs Available</label>
                                        <div class="col-md-8">
                                          <input type="number" 
                                                class="form-control"
                                                name="job_available"
                                                placeholder="Number of Job Available"
                                                required="required">
                                        </div>
                                      </div>

                                      <input type="hidden" name="job_date">

                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                      </div>

                                </form>
                                  </div>


                        </div>
                      </div>
                    </div>
                <!-- END OF ADD MODAL -->

                    <table
                      id="dataTable"
                      class="table table-striped table-bordered"
                      cellspacing="0"
                      width="100%"
                    >
                    <thead>
                         <tr>
                            <th scope="col">#</th>
                            <th scope="col">Job Title</th>
                            <th scope="col">Job Available</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                          </tr>
                    </thead>

                           <tbody id="myTable">
                            <?php

                            $sql = mysqli_query($conn, "SELECT * FROM jobvacancytbl");
                            $count = 1;
                            $jobvacant = mysqli_num_rows($sql);
                                if($jobvacant > 0){
                                    while ($jobvacant = mysqli_fetch_array($sql)) {
                                        # code...
                            ?>

                            <tr>
                                <td><?php echo $jobvacant['id'];?></td>
                                <td class="fw-bold"><?php echo $jobvacant['job_title'];?></td>
                                <td class="fw-bold"><?php echo $jobvacant['job_available'];?></td>
                                <td class="fw-bold"><?php $date = $jobvacant ['job_date'];
                                                          $date = strtotime ($date);
                                                          $date = date ('M d, Y', $date);
                                                          echo $date;?></td>
                                <td>
                                    <?php $status = $jobvacant['job_available'];
                                      if ($status);{
                                        if($status == 0){
                                          echo '<button class="btn btn-primary btn-sm">Complete</button>';}
                                        else{
                                          echo '<button class="btn btn-danger btn-sm">Incomplete</button>'; }
                                                    }
                                    ?> 
                                  </td>
 
                                <td>
                                  <button type="button" 
                                          class="btn btn-info" 
                                          data-bs-toggle="modal"
                                          title="View"
                                          data-bs-target="#view<?php echo $jobvacant['id'] ?>">
                                          <i class="bi bi-eye-fill"></i>
                                  </button>

                          <!-- VIEW MODAL -->
                              <div class="modal fade" id="view<?php echo $jobvacant['id'] ?>" aria-labelledby="view" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                          <h4 class="modal-title">VIEW JOB VACANCY DETAILS</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                      <form method="POST">

                                          <table class="table table-striped">
                                            <tbody>
                                                <tr><th scope="row">Job Title Vacancy</th>
                                                  <td><?php echo $jobvacant['job_title'];?></td></tr>

                                                <tr><th scope="row">Job Available</th>
                                                  <td><?php echo $jobvacant['job_available'];?></a>
                                                </td></tr>

                                                 <tr><th scope="row">Date Created</th>
                                                  <td><?php $date = $jobvacant ['job_date'];
                                                            $date = strtotime ($date);
                                                            $date = date ('F d, Y', $date);
                                                            echo $date;?></td></tr>

                                                <tr><th scope="row">Status</th>
                                                    <td>
                                                    <?php $status = $jobvacant['job_available'];
                                                      if ($status);{
                                                        if($status == 0){
                                                          echo '<button class="btn btn-primary btn-sm pe-none">Complete</button>';}
                                                        else{
                                                          echo '<button class="btn btn-danger btn-sm pe-none">Incomplete</button>'; }
                                                                    }
                                                    ?>            
                                                </td></tr>

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
                          <!-- END OF VIEW LEGAL DOCUMENT FILE MODAL -->

                            <!-- EDIT BUTTON-->
                                  <button type="submit" 
                                          class="btn btn-warning" 
                                          data-bs-toggle="modal" 
                                          data-bs-target="#EditJobVacancy<?php echo $jobvacant['id'] ?>"> 
                                          <i class="bi bi-pencil-fill"></i>
                                  </button>

                  <!-- EDIT MODAL -->
                        <div class="modal fade" id="EditJobVacancy<?php echo $jobvacant['id'] ?>" aria-labelledby="addSandQ" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                    <h4 class="modal-title">EDIT JOB VACANCY</h4>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>

                                <!-- Modal body -->
                                     <div class="modal-body">
                                     <form action="../../../Controller/JobVacancyQuery.php" method="POST">

                                        <input type="hidden" name="id" value="<?php echo $jobvacant['id'] ?>">

                                        <div class="mb-3 row">
                                          <label for="" class="col-md-4">Job Title Vacancy</label>
                                          <div class="col-md-8">
                                                <select class="form-select" 
                                                          name="job_title" 
                                                          aria-label="Floating label select example"
                                                          required>

                                                  <option value="<?php echo $jobvacant['job_title'];?>">
                                                                 <?php echo $jobvacant['job_title'];?>
                                                  </option>
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
                                            <label for="" class="col-md-4 form-label">Number of Jobs Available</label>
                                          <div class="col-md-8">
                                            <input type="number" 
                                                   class="form-control"
                                                   name="job_available"
                                                   placeholder="Number of Job Available"
                                                   value="<?php echo $jobvacant['job_available'];?>" 
                                                   required="required">
                                          </div>
                                        </div>

                                         <div class="mb-3 row">
                                            <label for="" class="col-md-4 form-label">Date Created</label>
                                          <div class="col-md-8">
                                            <input type="date" 
                                                   class="form-control"
                                                   name="job_date"
                                                   placeholder="Number of Job Available"
                                                   value="<?php echo $jobvacant['job_date'];?>" 
                                                   required="required">
                                          </div>
                                        </div>

                                        <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                              <button type="submit" name="update" class="btn btn-success">Update</button>
                                        </div>

                                  </form>
                                    </div>


                          </div>
                         </div>
                      </div>
                  <!-- END OF EDIT MODAL -->

                          <!-- END OF UPDATE SKILLS AND QUALIFICATIONS DETAILS AND FILES MODAL -->

                                          <!-- <button type="button" 
                                                  class="btn btn-danger" 
                                                  data-bs-toggle="modal"
                                                  title="Delete"
                                                  data-bs-target="#delete<?php echo $jobvacant['id'] ?>"><i class="bi bi-trash"></i>
                                          </button> -->

                          <!-- DELETE SKILLS AND QUALIFICATIONS DETAILS AND FILES MODAL -->          
                                  <div class="modal fade" id="delete<?php echo $jobvacant['id'] ?>" aria-labelledby="view" aria-hidden="true">
                                     <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                          <h4 class="modal-title">DELETE JOB VACANCY</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                      <div class="modal-body">
                                           <form action="../../../Controller/JobVacancyQuery.php" method="POST">
                                              <h6 class="fw-bold">Are You Sure You Want to Delete this Job Vacancy</h6>
                                              <input type="hidden" name="delete_id" value="<?php echo $jobvacant['id']; ?>">
                                          
                                            <div class="modal-footer">
                                                <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                                            </form>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                          <!-- END OF DELETE SKILLS AND QUALIFICATIONS DETAILS AND FILES MODAL -->   
                               
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
