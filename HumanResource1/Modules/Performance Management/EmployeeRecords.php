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
                <li><a class="sidebar-link" href="../Applicant Management/ApplicantInformation.php">Applicant Information</a></li>
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
              <ul class="dropdown-menu" id="q3">
                <li><a class="sidebar-link" href="../New Hired On Board/QualifiedApplicants.php">Qualified Applicants</a></li>
                <li><a class="sidebar-link" href="../New Hired On Board/Applicant Management/EmployeeInformation.php">Employee Information</a></li>
                <li><a class="sidebar-link" href="../New Hired On Board/Applicant Management/RequestContract.php">Request Contract</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
            <a class="dropdown-toggle" data-bs-toggle="collapse" href="#q4"
                ><span class="icon-holder"
                  ><i class="bi bi-award"></i></span
                ><span class="title">Performance Management</span>
                <span class="arrow"><i class="ti-angle-right"></i></span
              ></a>
              <ul class="dropdown-menu collapsed show" id="q4">
                <li><a class="sidebar-link" href="EmployeeEvaluation.php">Employee Evaluation</a></li>
                <li><a class="sidebar-link actived" href="EmployeeRecords.php">Employee Records</a></li>
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
              <h4 class="c-grey-900 mT-10 mB-30 fw-bold">EMPLOYEE EVALUATION</h4>
              <div class="row">
                <div class="col-md-12">
                  <div class="bgc-white bd bdrs-3 p-20 mB-20">

                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

                    <!-- ADD BUTTON -->
                    <div class="mb-3 text-end">
                        <button type="submit" 
                                data-bs-toggle="modal" 
                                data-bs-target="#addEmployeeRecord" 
                                class="btn btn-primary">+ Add Employee<br> Records
                        </button>
                    </div>

                  <!-- ADD MODAL -->
                        <div class="modal fade" id="addEmployeeRecord" aria-labelledby="fillup" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                    <h4 class="modal-title fw-bold">ADD EMPLOYEE RECORDS</h4>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                <!-- Modal body -->
                                    <div class="modal-body">
                                    <form action="../../../Controller/EmployeeRecordsQuery.php" method="POST" enctype="multipart/form-data">

                                    <div class="mb-3 row">
                                          <label for="" class="col-md-5 fw-bold">Employee ID - Fullname</label>
                                          <div class="col-md-7">
                                            <select class="form-control selectpicker" name="employeeID" data-live-search="true" required>
                                              <option selected disabled value="" class="fw-bold">Employee ID - Fullname</option>
                                              <?php
                                                // Retrieve the list of selected applicants from interviewtbl based on the employeeID column
                                                $selectedApplicants = [];
                                                $interviewQuery = mysqli_query($conn, "SELECT employeeID FROM emprecords");
                                                while ($row = mysqli_fetch_array($interviewQuery)) {
                                                  $selectedApplicants[] = $row['employeeID'];
                                                }

                                                $query = mysqli_query($conn, "SELECT emp_firstname, emp_middlename, emp_lastname, employeeID, id FROM employeetbl");

                                                while ($row = mysqli_fetch_array($query)) {
                                                  $fullName = $row['employeeID'] . " - " . $row['emp_firstname'] . " " . $row['emp_middlename'] . " " . $row['emp_lastname'];
                                                  $value = $row['id'];

                                                  // Check if the applicant is already in interviewtbl based on the nameapp column
                                                  if (in_array($value, $selectedApplicants)) {
                                                    // If the applicant is already selected, skip this option
                                                    continue;
                                                  } else {
                                                    // If the applicant is not selected, allow selection
                                                    echo "<option value='$value'>$fullName</option>";
                                                  }
                                                }
                                              ?>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="" class="col-md-5 form-label fw-bold">Add Employee Record File</label>
                                            <div class="col-md-7">
                                              <input type="file"  class="form-control" name="emp_records" required="required" accept=".zip">
                                          </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="" class="col-md-5 form-label fw-bold">Input Remarks</label>
                                            <div class="col-md-7">
                                                <textarea class="form-control" 
                                                          name="emp_remarks"
                                                          rows="5"></textarea>
                                            </div>
                                        </div>

                                          <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                               
                                          </div>
                                  </div>
                            </div>
                        </div>
                      </div>
                  <!-- END OF ADD MODAL -->

                    <table
                      id="dataTable"
                      class="table table-striped table-bordered"
                      cellspacing="0"
                      width="100%">
                    
                      <thead>
                        <tr>
                            <th scope="col">Employee ID</th>
                            <th scope="col">Fullname</th>
                            <th scope="col">PositionTitle</th>
                            <th scope="col">Employee File</th>
                            <th scope="col">Remarks</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody id="myTable">
                    <?php
                      $sql = mysqli_query($conn, "SELECT emprecords.employeeID, 
                          emprecords.id,
                          emprecords.emp_records,
                          emprecords.emp_remarks,
                      
                          employeetbl.employeeID AS empID,
                          employeetbl.emp_positionTitle AS ps, 
                          employeetbl.emp_status AS stat, 
                          employeetbl.emp_firstname AS f1, 
                          employeetbl.emp_middlename AS f2, 
                          employeetbl.emp_lastname AS f3
                                              
                          FROM emprecords
                          LEFT JOIN employeetbl ON emprecords.employeeID = employeetbl.id");

                      $num_rows = mysqli_num_rows($sql);
                      if ($num_rows > 0) {
                          while ($eval = mysqli_fetch_array($sql)) {
                    ?>

                        <tr>
                            <td class="fw-bold"><?php echo $eval['empID'];?></td>
                            <td class="fw-bold"><?php echo $eval['f1'];?>
                                <?php echo $eval['f2'];?>
                                <?php echo $eval['f3'];?></td>
                            <td>
                                <button class="btn btn-dark btn-sm pe-none">
                                    <?php echo $eval['ps'];?>
                                </button>
                            </td>

                            <td class="fw-bold">
                                <?php $status = $eval['emp_records'];
                                  if ($status);{
                                      if($status == NULL)
                                      {
                                          echo '<button class="btn btn-secondary btn-sm pe-none">No File</button>';}
                                      else
                                      {
                                        echo '<a href="../../../public/uploads/employeeRecords/'.$eval['emp_records'].'"
                                        target="_blank"
                                        class="btn btn-primary btn-sm">View File</a>'; 
                                      }
                              } 
                              ?>
                            </td>

                            <td class="fw-bold">...</td>
                            <td>

                                <button type="button" 
                                        class="btn btn-info" 
                                        data-bs-toggle="modal" title="View" 
                                        data-bs-target="#view<?php echo $eval['id'] ?>"><i class="bi bi-eye-fill"></i>
                                </button>

                                <!-- VIEW MODAL -->
                                <div class="modal fade" id="view<?php echo $eval['id'] ?>" aria-labelledby="view" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title fw-bold">VIEW EMPLOYEE RECORDS</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                    <table class="table table-striped">
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">Employee ID</th>
                                                                <td><?php echo $eval['empID'] ?></td>
                                                            </tr>

                                                            <tr>
                                                                <th scope="row">Fullname</th>
                                                                <td><?php echo $eval['f1'] ?>
                                                                    <?php echo $eval['f2'] ?>
                                                                    <?php echo $eval['f3'] ?></td>
                                                            </tr>

                                                            <tr>
                                                                <th scope="row">Position Title</th>
                                                                <td><button class="btn btn-dark btn-sm pe-none ">
                                                                        <?php echo $eval['ps']?>
                                                                    </button>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <th scope="row">Status</th>
                                                                <td><button class="btn btn-primary btn-sm pe-none">
                                                                        <?php echo $eval['stat']?>
                                                                    </button>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <th scope="row">Employee Records File</th>
                                                                <td>
                                                                    <?php $status = $eval['emp_records'];
                                                                        if ($status);{
                                                                            if($status == NULL)
                                                                            {
                                                                                echo '<button class="btn btn-secondary btn-sm pe-none">No File</button>';}
                                                                            else
                                                                            {
                                                                              echo '<a href="../../../public/uploads/employeeRecords/'.$eval['emp_records'].'"
                                                                              target="_blank"
                                                                              class="btn btn-primary btn-sm">View File</a>'; 
                                                                            }  } 
                                                                    ?>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <th scope="row">Remarks</th>
                                                                <td><?php echo $eval['emp_remarks']?></td>
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

                                <!-- END OF VIEW MODAL -->

                                <button type="button" class="btn btn-warning" 
                                        data-bs-toggle="modal" 
                                        title="Edit" 
                                        data-bs-target="#edit<?php echo $eval['id'] ?>"><i class="bi bi-pencil-fill"></i>
                                </button>

                                <!-- UPDATE MODAL -->
                                <div class="modal fade" id="edit<?php echo $eval['id'] ?>" aria-labelledby="fillup" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title fw-bold">UPDATE EMPLOYEE RECORDS</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <form action="../../../Controller/EmployeeRecordsQuery.php" method="POST" enctype="multipart/form-data">

                                                    <input type="hidden" name="id" value="<?php echo $eval['id'] ?>">

                                                    <div class="mb-3 row">
                                                        <label for="" class="col-md-4 form-label fw-bold">Employee ID</label>
                                                        <div class="col-md-8">
                                                            <input class="form-control" type="text" readonly class="form-control-plaintext" value="<?php echo $eval['empID'];?>">
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <label for="" class="col-md-4 form-label fw-bold">Fullname</label>
                                                        <div class="col-md-8">
                                                            <input class="form-control" type="text" readonly class="form-control-plaintext" value="<?php echo $eval['f1'] ?>&nbsp;<?php echo $eval['f2'] ?>&nbsp;<?php echo $eval['f3'] ?> ">
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <div class="mb-3 row">
                                                        <label for="" class="col-md-4 form-label fw-bold">Position Title</label>
                                                        <div class="col-md-8">
                                                            <input class="form-control" type="text" readonly class="form-control-plaintext" value="<?php echo $eval['ps'];?>">
                                                        </div>
                                                    </div>

                                                    <div class="mb-3 row">
                                                        <label for="" class="col-md-4 form-label fw-bold">Employee Status</label>
                                                        <div class="col-md-8">
                                                            <input class="form-control" type="text" readonly class="form-control-plaintext" value="<?php echo $eval['stat'];?>">
                                                        </div>
                                                    </div>
                                                    <hr>

                                                    <div class=" row">
                                                        <label for="" class="col-md-5 form-label fw-bold">Current Employee Record File</label>
                                                        <div class="col-md-7">
                                                            <?php $status = $eval['emp_records'];
                                                              if ($status);{
                                                                  if($status == NULL)
                                                                  { echo '<button class="btn btn-secondary btn-sm pe-none">No File</button>'; }
                                                                  else {
                                                                    echo '<a href="../../../public/uploads/employeeRecords/'.$eval['emp_records'].'"
                                                                    target="_blank"
                                                                    class="btn btn-primary btn-sm">View File</a>'; 
                                                                  }  } 
                                                          ?>
                                                        </div>
                                                    </div>
                                                    <hr>

                                                    <div class="mb-3 row">
                                                        <label for="" class="col-md-5 form-label fw-bold">Update Employee Record File</label>
                                                        <div class="col-md-7">
                                                            <input type="file" name="emp_records" class="form-control" accept=".zip">

                                                            <input type="hidden" name="emp_records_old" value="<?php echo $eval['emp_records'];?>">
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="mb-3 row">
                                                        <label for="" class="col-md-5 form-label fw-bold">Input Remarks</label>
                                                        <div class="col-md-7">
                                                            <textarea class="form-control" name="emp_remarks" rows="5"><?php echo $eval['emp_remarks'];?> </textarea>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <!-- END OF UPDATE MODAL -->

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
  </body>
</html>
