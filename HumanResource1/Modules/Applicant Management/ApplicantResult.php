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
              <ul class="dropdown-menu collapsed show" id="q2">
                <li><a class="sidebar-link" href="ApplicantInformation.php">Applicant Information</a></li>
                <li><a class="sidebar-link" href="ApplicantSchedule.php">Applicant Schedule</a></li>
                <li><a class="sidebar-link" href="InitialInterview.php">Applicant Initial Interview</a></li>
                <li><a class="sidebar-link" href="FinalInterview.php">Applicant Final Interview</a></li>
                <li><a class="sidebar-link" href="RequestExam.php">Request Exam Module</a></li>
                <li><a class="sidebar-link" href="ApplicantExamResult.php">Applicant Exam Result</a></li>
                <li><a class="sidebar-link actived" href="ApplicantResult.php">Applicant Result</a></li>
                <li><a class="sidebar-link" href="RequestFacility.php">Request Facility</a></li>

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
                <li><a class="sidebar-link" href="../New Hired On Board/EmployeeInformation.php">Employee Information</a></li>
                <li><a class="sidebar-link" href="../New Hired On Board/RequestContract.php">Request Contract</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
            <a class="dropdown-toggle" data-bs-toggle="collapse" href="#q4"
                ><span class="icon-holder"
                  ><i class="bi bi-award"></i></span
                ><span class="title">Performance Management</span>
                <span class="arrow"><i class="ti-angle-right"></i></span
              ></a>
              <ul class="dropdown-menu" id="q4">
                <li><a class="sidebar-link" href="../Performance Management/EmployeeEvaluation.php">Employee Evaluation</a></li>
                <li><a class="sidebar-link" href="../Performance Management/EmployeeRecords.php">Employee Records</a></li>
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
        <!-- ### $App Screen Content ### -->
        <main class="main-content bgc-grey-100">
          <div id="mainContent">
            <div class="container-fluid">
              <h4 class="c-grey-900 mT-10 mB-30 fw-bold">APPLICANT OVERALL RESULT</h4>
              <div class="row">
                <div class="col-md-12">
                  <div class="bgc-white bd bdrs-3 p-20 mB-20">

                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

                    <div class="btn-group d-flex mb-3 float-end">
                    <div class="ms-2">
                        <button type="submit" 
                                data-bs-toggle="modal" 
                                data-bs-target="#addinitialinterviewscore" 
                                class="btn btn-primary">Add Final Result
                        </button>
                    </div>        
                  </div>

                    <table
                      id="dataTable"
                      class="table table-striped table-bordered"
                      cellspacing="0"
                      width="100%"
                    >

                    <div class="modal fade" id="addinitialinterviewscore" aria-labelledby="fillup" aria-hidden="true">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                        <h4 class="modal-title fw-bold">ADD INITIAL INTERVIEW SCORE</h4>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                    <!-- Modal body -->
                                        <div class="modal-body">
                                        <form action="../../../Controller/ApplicantManagementQuery.php" method="POST">

                                        <div class="mb-2 row">
                                          <label for="" class="col-md-5 form-label"><p class="fw-bold">Overall Score</p></label>
                                          <div class="col-md-7">
                                              <input type="number"
                                                    class="form-control"
                                                    name="overall"
                                                    required="required"
                                                    placeholder="Score"
                                                    readonly
                                                    id="overall">
                                          </div>
                                      </div>
                                          
                                        <div class="mb-3 row">
                                          <label for="" class="col-md-5 fw-bold">Applicant ID - Fullname</label>
                                          <div class="col-md-7">
                                            <select class="form-control selectpicker" name="applicantID" data-live-search="true" required>
                                              <option selected disabled value="" class="fw-bold">Applicant ID - Fullname</option>
                                              <?php
                                                // Retrieve the list of selected applicants from interviewtbl based on the applicantID column
                                                $selectedApplicants = [];
                                                $interviewQuery = mysqli_query($conn, "SELECT applicantID FROM applicantoverall");
                                                while ($row = mysqli_fetch_array($interviewQuery)) {
                                                  $selectedApplicants[] = $row['applicantID'];
                                                }

                                                $query = mysqli_query($conn, "SELECT app_firstname, app_middlename, app_lastname, applicantID, id FROM applicanttbl");

                                                while ($row = mysqli_fetch_array($query)) {
                                                  $fullName = $row['applicantID'] . " - " . $row['app_firstname'] . " " . $row['app_middlename'] . " " . $row['app_lastname'];
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

                                        <div class="mb-2 row">
                                          <label for="" class="col-md-5 form-label"><p class="fw-bold">Initial Interview Score</p></label>
                                          <div class="col-md-7">
                                              <input type="number"
                                                    class="form-control"
                                                    name="initial"
                                                    required="required"
                                                    placeholder="Score"
                                                    id="initial" 
                                                    oninput="calculateOverallScore()">
                                              <span for="" class="text-danger"><small>Minimum of 50 Limit of 100</small></span>
                                          </div>
                                      </div>

                                      <div class="mb-1 row">
                                          <label for="" class="col-md-5 form-label"><p class="fw-bold">Final Interview Score</p></label>
                                          <div class="col-md-7">
                                              <input type="number"
                                                    class="form-control"
                                                    min="50"
                                                    max="100"
                                                    name="final"
                                                    required="required"
                                                    placeholder="Score"
                                                    id="final" 
                                                    oninput="calculateOverallScore()">
                                              <span for="" class="text-danger"><small>Minimum of 50 Limit of 100</small></span>
                                          </div>
                                      </div>

                                      <div class="mb-1 row">
                                          <label for="" class="col-md-5 form-label"><p class="fw-bold">Exam Result</p></label>
                                          <div class="col-md-7">
                                              <input type="number"
                                                    class="form-control"
                                                    min="50"
                                                    max="100"
                                                    name="exam"
                                                    required="required"
                                                    placeholder="Score"
                                                    id="exam" 
                                                    oninput="calculateOverallScore()">
                                              <span for="" class="text-danger"><small>Minimum of 50 Limit of 100</small></span>
                                          </div>
                                      </div>

                                      <script>
                                        function calculateOverallScore() 
                                        {
                                            const initial = parseInt(document.getElementById('initial').value) || 0;
                                            const final = parseInt(document.getElementById('final').value) || 0;
                                            const exam = parseInt(document.getElementById('exam').value) || 0;

                                            // Calculate the average score (divided by 3)
                                            const averageScore = (initial + final + exam) / 3;

                                            // Display the average score in the 'overall' input field
                                            document.getElementById('overall').value = averageScore.toFixed(2);

                                            // Display a badge based on the average score
                                            const badgeElement = document.getElementById('badge');

                                            if (averageScore >= 75 && averageScore <= 100) {
                                                badgeElement.textContent = 'Passed';
                                                badgeElement.classList.remove('btn-danger');
                                                badgeElement.classList.add('btn-success');
                                            } else if (averageScore <= 74 && averageScore >= 50) {
                                                badgeElement.textContent = 'Failed';
                                                badgeElement.classList.remove('btn-success');
                                                badgeElement.classList.add('btn-danger');
                                            } else {
                                                badgeElement.textContent = 'Input Issue';
                                                badgeElement.classList.remove('btn-success', 'btn-danger');
                                            }
                                        }
                                      </script>

                                              <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                  <button type="submit" name="submitOverall" class="btn btn-primary">Submit</button>
                                              </div>
                                                </form>
                                                    
                                              
                                              </div>
                            </div>
                          </div>
                        </div>
 
                     
              <thead>
                <tr>
                  <th scope="col">Applicant ID</th>
                  <th scope="col">Fullname</th>
                  <th scope="col">Overall Score</th>
                  <th scope="col">Overall Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>

              <tbody >
              <?php

                  $sql = mysqli_query($conn, "SELECT applicantoverall.applicantID, 
                  applicantoverall.id,
                  applicantoverall.initial,
                  applicantoverall.final,
                  applicantoverall.exam,
                  applicantoverall.overall,

                  applicanttbl.applicantID AS appID,

                  
                  applicanttbl.app_positionTitle AS ps, 
                  applicanttbl.app_firstname AS f1, 
                  applicanttbl.app_middlename AS f2, 
                  applicanttbl.app_lastname AS f3

                  FROM applicantoverall
                  LEFT JOIN applicanttbl ON applicantoverall.applicantID = applicanttbl.id");

                $row = mysqli_num_rows($sql);
                    if($row > 0){
                        while ($row = mysqli_fetch_array($sql)) {
                            # code...
                ?>
                <tr>
                  <td class="fw-bold"><?php echo $row['appID'] ?></td>
                  <td class="fw-bold"><?php echo $row['f3'];?>,&nbsp;<?php echo $row['f1'];?>&nbsp;<?php echo $row['f2'];?></td>
                  <td class="fw-bold"><?php echo $row['overall'] ?></td>
                  <td class="fw-bold">
                      <?php
                      $overall = $row['overall'];

                      if ($overall <= 74 && $overall >= 50) {
                          echo '<button class="btn btn-sm btn-danger">Failed</button>';
                      } elseif ($overall >= 75 && $overall <= 100) {
                          echo '<button class="btn btn-sm btn-success">Passed</button>';
                      }
                      ?>
                  </td>
                    <td>
                      <button type="button" 
                                                        class="btn btn-info" 
                                                        data-bs-toggle="modal"
                                                        title="View"
                                                        data-bs-target="#view<?php echo $row['id'] ?>">
                        <i class="bi bi-eye-fill"></i>
                      </button>
                      <!-- VIEW APPLICANT SCHEDULE MODAL -->
                      <div class="modal fade" id="view<?php echo $row['id'] ?>" aria-labelledby="view" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title fw-bold">VIEW APPLICANT OVERALL RESULT</h4>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                              <form method="POST">
                                <table class="table table-striped">
                                  <tbody>
                                    <tr><th scope="row">Applicant ID</th><td><?php echo $row['appID'] ?></td></tr>
                                    <tr><th scope="row">Fullname</th><td><?php echo $row['f3'];?>,&nbsp;<?php echo $row['f1'];?>&nbsp;<?php echo $row['f2'];?></td></tr>
                                    <tr><th scope="row">Position Title</th><td><?php echo $row['ps'] ?></td></tr>
                                    <tr><th scope="row">Initial Interview Score</th><td class="fw-bold"><?php echo $row['initial'] ?></td></tr>
                                    <tr><th scope="row">Final Interview Score</th><td class="fw-bold"><?php echo $row['final'] ?></td></tr>
                                    <tr><th scope="row">Exam Score</th><td class="fw-bold"><?php echo $row['exam'] ?></td></tr>
                                    <tr>
                                      <th scope="row">Status</th>
                                      <td>
                                      <?php
                                          $overall = $row['overall'];

                                          if ($overall <= 74 && $overall >= 50) {
                                              echo '<button class="btn btn-sm btn-danger">Failed</button>';
                                          } elseif ($overall >= 75 && $overall <= 100) {
                                              echo '<button class="btn btn-sm btn-success">Passed</button>';
                                          }
                                          ?>
                                      </td>
                                    </tr>
                                    <tr><th scope="row fw-bold">Overall Score</th><td><?php echo $row['overall'] ?></td></tr>

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
