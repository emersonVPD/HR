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
                <li><a class="sidebar-link actived" href="InitialInterview.php">Applicant Initial Interview</a></li>
                <li><a class="sidebar-link" href="FinalInterview.php">Applicant Final Interview</a></li>
                <li><a class="sidebar-link" href="RequestExam.php">Request Exam Module</a></li>
                <li><a class="sidebar-link" href="ApplicantExamResult.php">Applicant Exam Result</a></li>
                <li><a class="sidebar-link" href="ApplicantResult.php">Applicant Result</a></li>
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
              <h4 class="c-grey-900 mT-10 mB-30 fw-bold">APPLICANT INITIAL INTERVIEW</h4>
              <div class="row">
                <div class="col-md-12">
                  <div class="bgc-white bd bdrs-3 p-20 mB-20">

                  <div class="btn-group d-flex mb-3 float-end">
                    <div class="ms-2">
                        <button type="submit" 
                                data-bs-toggle="modal" 
                                data-bs-target="#viewscore" 
                                class="btn btn-success">View Score <br>Criteria
                        </button>
                    </div>        

                    <div class="ms-2">
                        <button type="submit" 
                                data-bs-toggle="modal" 
                                data-bs-target="#viewQuestion" 
                                class="btn btn-secondary">View Questions
                        </button>
                    </div>

                    <div class="ms-2">
                        <button type="submit" 
                                data-bs-toggle="modal" 
                                data-bs-target="#addinitialinterviewscore" 
                                class="btn btn-primary">+ Add Initial <br>Interview Score
                        </button>
                    </div>
                  </div>

                        <!-- ADD MODAL BUTTON -->
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
                                          
                                        <div class="mb-3 row">
                                          <label for="" class="col-md-5 fw-bold">Applicant ID - Fullname</label>
                                          <div class="col-md-7">
                                            <select class="form-control selectpicker" name="applicantID" data-live-search="true" required>
                                              <option selected disabled value="" class="fw-bold">Applicant ID - Fullname</option>
                                              <?php
                                                // Retrieve the list of selected applicants from interviewtbl based on the applicantID column
                                                $selectedApplicants = [];
                                                $interviewQuery = mysqli_query($conn, "SELECT applicantID FROM interviewtbl");
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

                                          

                                            <div class="mb-3 row">
                                                <label for="" class="col-md-9 form-label"><p class="fw-bold">1. Tell me something about yourself. </p>A.  What do you know about this company / organization?</label>
                                              <div class="col-md-3">
                                                <input type="number" 
                                                      class="form-control"
                                                      minlength="2"
                                                      maxlength="3" 
                                                      name="iq1" 
                                                      required="required"
                                                      placeholder="Score">
                                              </div>
                                            </div><hr>

                                            <div class="mb-3 row">
                                                <label for="" class="col-md-9 form-label"><p class="fw-bold">2.  Why did you decide to apply for this position? </p> A.  Whats your management style?</label>
                                              <div class="col-md-3">
                                                <input type="number" 
                                                      class="form-control"
                                                      minlength="2"
                                                      maxlength="3" 
                                                      name="iq2" 
                                                      required="required"
                                                      placeholder="Score">
                                              </div>
                                            </div><hr>

                                            <div class="mb-3 row">
                                                <label for="" class="col-md-9 form-label"><p class="fw-bold">3.  Are you Qualified for the Skills and Qualifications based on the Job Posting Website ? </p>A. Do you have proof for your Qualifications? Give me some supporting documents <br> B.  What makes you unique? </label>
                                              <div class="col-md-3">
                                                <input type="number" 
                                                      class="form-control"
                                                      minlength="2"
                                                      maxlength="3" 
                                                      name="iq3" 
                                                      required="required"
                                                      placeholder="Score">
                                              </div>
                                            </div><hr>

                                            <div class="mb-3 row">
                                                <label for="" class="col-md-9 form-label"><p class="fw-bold">4.  What are your strengths How has this helped you to achieve success in your career? and what are your greatness weaknesses? </p> A.  Give me some of your weakness  and How do you handle your weakness, give me some scenario </label>
                                              <div class="col-md-3">
                                                <input type="number" 
                                                      class="form-control"
                                                      minlength="2"
                                                      maxlength="3" 
                                                      name="iq4" 
                                                      required="required"
                                                      placeholder="Score">
                                              </div>
                                            </div><hr>


                                            <div class="mb-3 row">
                                                <label for="" class="col-md-9 form-label"><p class="fw-bold">5.  Why should we hire you? </p>A.  Where do you see yourself in five years? <br> B.  What type of work environment do you most enjoy? In-person or remote?</label>
                                              <div class="col-md-3">
                                                <input type="number" 
                                                      class="form-control"
                                                      minlength="2"
                                                      maxlength="3" 
                                                      name="iq5" 
                                                      required="required"
                                                      placeholder="Score">
                                              </div>
                                            </div><hr>

                                            <div class="mb-3 row">
                                                <label for="" class="col-md-9 form-label"><p class="fw-bold">6.   What is the professional achievement you’re most proud of? A.  Do you consider yourself successful</p> A.  Do you consider yourself successful<br> B.  What motivates you?</label>
                                              <div class="col-md-3">
                                                <input type="number" 
                                                      class="form-control"
                                                      minlength="2"
                                                      maxlength="3" 
                                                      name="iq6" 
                                                      required="required"
                                                      placeholder="Score">
                                              </div>
                                            </div><hr>

                                            <div class="mb-3 row">
                                                <label for="" class="col-md-9 form-label"><p class="fw-bold">7.  Why did you quit your last job?</p></label>
                                              <div class="col-md-3">
                                                <input type="number" 
                                                      class="form-control"
                                                      minlength="2"
                                                      maxlength="3" 
                                                      name="iq7" 
                                                      required="required"
                                                      placeholder="Score">
                                              </div>
                                            </div><hr>

                                            <div class="mb-3 row">
                                                <label for="" class="col-md-9 form-label"><p class="fw-bold">8.  What are your salary requirements?</p></label>
                                              <div class="col-md-3">
                                                <input type="number" 
                                                      class="form-control"
                                                      minlength="2"
                                                      maxlength="3" 
                                                      name="iq8" 
                                                      required="required"
                                                      placeholder="Score">
                                              </div>
                                            </div><hr>

                                            <div class="mb-3 row">
                                                <label for="" class="col-md-9 form-label"><p class="fw-bold">9.   Do you have any serious medical conditions or any health background issue? Do you have </p> A. Did you have an illness last week, last month and recent years if you have can you elaborate what are these</label>
                                              <div class="col-md-3">
                                                <input type="number" 
                                                      class="form-control"
                                                      minlength="2"
                                                      maxlength="3" 
                                                      name="iq9" 
                                                      required="required"
                                                      placeholder="Score">
                                              </div>
                                            </div><hr>

                                            <div class="mb-3 row">
                                                <label for="" class="col-md-9 form-label"><p class="fw-bold">10.  Have You Ever Been Arrested or Convicted of a Crime or do you have criminal Record ?</p></label>
                                              <div class="col-md-3">
                                                <input type="number" 
                                                      class="form-control"
                                                      minlength="2"
                                                      maxlength="3" 
                                                      name="iq10" 
                                                      required="required"
                                                      placeholder="Score">
                                              </div>
                                            </div><hr>

                                            <div class="mb-3 row">
                                                <label for="" class="col-md-4 form-label fw-bold">Input Remarks</label>
                                              <div class="col-md-8">
                                                  <textarea class="form-control" name="initial_remarks" rows="5"></textarea>
                                              </div>
                                            </div>        
                                              <div class="modal-footer">
                                                    <button type="submit" name="submit3" class="btn btn-primary">Submit</button>
                                                </form>
                                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancel</button>

                                              </div>
                                              </div>
                            </div>
                          </div>
                        </div>

                         <!-- VIEW INTERVIEW QUESTIONS -->
                              <div class="modal fade" id="viewQuestion" aria-labelledby="view" aria-hidden="true">
                                  <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                          <h4 class="modal-title fw-bold">INITIAL INTERVIEW QUESTIONS</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form>
                                          <table class="table table-striped">
                                            <tbody>

                                           <tr class="mb-3 row">
                                            <th class="col-md-3">Question 1</th>
                                              <td class="col-md-9"><p class="fw-bold">
                                                Tell me something about yourself.</p> 
                                                A.  What do you know about this company / organization?</td>
                                            </tr>

                                           <tr class="mb-3 row">
                                            <th class="col-md-3">Question 2</th>
                                              <td class="col-md-9"><p class="fw-bold">
                                                Why did you decide to apply for this position?</p> 
                                                A.  What’s your management style?</td>
                                            </tr>

                                           <tr class="mb-3 row">
                                            <th class="col-md-3">Question 3</th>
                                              <td class="col-md-9"><p class="fw-bold">
                                                Are you Qualified for the Skills and Qualifications based on the Job Posting Website ? </p> 
                                                A.  Do you have proof for your Qualifications? Give me some supporting documents ?
                                                <br>B. What makes you unique? </td>
                                            </tr>

                                           <tr class="mb-3 row">
                                            <th class="col-md-3">Question 4</th>
                                              <td class="col-md-9"><p class="fw-bold">
                                                What are your strengths How has this helped you to achieve success in your career? and what are your greatness weaknesses?</p> 
                                                A.  Give me some of your weakness  and How do you handle your weakness, give me some scenario?</td>
                                            </tr>

                                           <tr class="mb-3 row">
                                            <th class="col-md-3">Question 5</th>
                                              <td class="col-md-9"><p class="fw-bold">
                                                Why should we hire you?</p> 
                                                A.  Where do you see yourself in five years?<br>
                                                B.  What type of work environment do you most enjoy? In-person or remote?</td>
                                            </tr>

                                           <tr class="mb-3 row">
                                            <th class="col-md-3">Question 6</th>
                                              <td class="col-md-9"><p class="fw-bold">
                                                What is the professional achievement you’re most proud of?</p> 
                                                A.  Do you consider yourself successful<br>
                                                B.  What motivates you?</td>
                                            </tr>

                                           <tr class="mb-3 row">
                                            <th class="col-md-3">Question 7</th>
                                              <td class="col-md-9"><p class="fw-bold">
                                                Why did you quit your last job?</p></td>
                                            </tr>

                                           <tr class="mb-3 row">
                                            <th class="col-md-3">Question 8</th>
                                              <td class="col-md-9"><p class="fw-bold">
                                                What are your salary requirements?</p></td>
                                            </tr>

                                           <tr class="mb-3 row">
                                            <th class="col-md-3">Question 9</th>
                                              <td class="col-md-9"><p class="fw-bold">
                                                Do you have any serious medical conditions or any health background issue? Do you have</p>A.  Did you have an illness last week, last month and recent years if you have can you elaborate what are these</td>
                                            </tr>

                                           <tr class="mb-3 row">
                                            <th class="col-md-3">Question 10</th>
                                              <td class="col-md-9"><p class="fw-bold">
                                                Have You Ever Been Arrested or Convicted of a Crime or do you have criminal Record ?</p></td>
                                            </tr>

                                            </tbody>
                                          </table>
                                        </form>
                                    </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                         <!-- END OF VIEW INTERVIEW QUESTIONS -->

                         <!-- VIEW SCORE MODAL -->
                              <div class="modal fade" id="viewscore" aria-labelledby="view" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                          <h4 class="modal-title">SCORE CRITERIA</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                      <form method="POST">

                                          <table class="table table-striped">
                                            <tbody>
                                                <tr><th scope="row">Category</th>
                                                  <td class="fw-bold">Score</td></tr>

                                                <tr><th scope="row">Poor</th>
                                                  <td>1  -  2</td></tr>

                                                <tr><th scope="row">Below Average</th>
                                                  <td>3  -  4</td></tr>

                                                <tr><th scope="row">Average</th>
                                                  <td>5  -  6</td></tr>

                                                <tr><th scope="row">Above Average</th>
                                                  <td>7  -  8</td></tr>

                                                <tr><th scope="row">Excellent</th>
                                                  <td>9  -  10</td></tr>

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

                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

                    <table
                      id="dataTable"
                      class="table table-striped table-bordered"
                      cellspacing="0"
                      width="100%"
                    >
                    <thead>
                         <tr>
                              <th scope="col">Applicant ID</th>
                              <th scope="col">Fullname</th>
                              <th scope="col">Status</th>
                              <th scope="col">Total Score</th>
                              <th scope="col">Remarks</th>
                              <th scope="col">Action</th>
                            </tr>
                      </thead>
                           <tbody id="myTable">
                           <?php
                    $sql = mysqli_query($conn, "SELECT interviewtbl.applicantID, 
                                              interviewtbl.id,
                                              interviewtbl.iq1,
                                              interviewtbl.iq2,
                                              interviewtbl.iq3,
                                              interviewtbl.iq4,
                                              interviewtbl.iq5,
                                              interviewtbl.iq6,
                                              interviewtbl.iq7,
                                              interviewtbl.iq8,
                                              interviewtbl.iq9,
                                              interviewtbl.iq10,
                                              interviewtbl.initial_remarks,
                                              applicanttbl.applicantID AS appID,
                                              applicanttbl.app_firstname AS f1, 
                                              applicanttbl.app_middlename AS f2, 
                                              applicanttbl.app_lastname AS f3
                                              
                                              FROM interviewtbl
                                            LEFT JOIN applicanttbl ON interviewtbl.applicantID = applicanttbl.id");

                    if ($sql) {
                        while ($interview = mysqli_fetch_array($sql)) {
                            ?>
                            <tr>
                                <td class="fw-bold">
                                    <?php echo $interview['appID'];?>
                                </td>
                                
                                <td class="fw-bold">
                                  <?php echo $interview['f3'];?>,&nbsp;<?php echo $interview['f1'];?>&nbsp;<?php echo $interview['f2'];?>
                                </td>
                                
                                <td>
                                    <?php
                                    $total = $interview['iq1'] + $interview['iq2'] + $interview['iq3'] + $interview['iq4'] + 
                                            $interview['iq5'] + $interview['iq6'] + $interview['iq7'] +   
                                            $interview['iq8'] + $interview['iq9'] + $interview['iq10'];

                                    if ($total == NULL) {
                                        echo '<button class="btn btn-warning btn-sm pe-none fw-bold">Pending</button>';
                                    } elseif ($total >= 75 && $total <= 100) {
                                        echo '<button class="btn btn-success btn-sm pe-none">Passed</button>';
                                    } elseif ($total <= 74) {
                                        echo '<button class="btn btn-danger btn-sm pe-none">Failed</button>';
                                    }
                                    ?>
                                </td>
                                <td class="fw-bold">
                                    <?php
                                    $total = $interview['iq1'] + $interview['iq2'] + $interview['iq3'] + $interview['iq4'] + 
                                            $interview['iq5'] + $interview['iq6'] + $interview['iq7'] +   
                                            $interview['iq8'] + $interview['iq9'] + $interview['iq10'];

                                    echo $total;
                                    ?>
                                </td>
                                <td class="fw-bold">...</td>
                                <td>

                                  <button type="button" 
                                          class="btn btn-info" 
                                          data-bs-toggle="modal"
                                          title="View"
                                          data-bs-target="#view<?php echo $interview['id'] ?>"><i class="bi bi-eye-fill"></i>
                                  </button>

                         <!-- VIEW APPLICANT SCHEDULE MODAL -->
                              <div class="modal fade" id="view<?php echo $interview['id'] ?>" aria-labelledby="view" aria-hidden="true">
                                  <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                          <h4 class="modal-title fw-bold">VIEW INITIAL INTERVIEW SCORE</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                      <form method="POST">

                                          <table class="table table-striped">
                                            <tbody>

                                                <tr><th scope="row">Applicant ID</th>
                                                  <td><?php echo $interview['appID'] ?></td></tr>

                                                  <tr>
                                                    <th scope="row">Fullname</th>
                                                    <td><?php echo $interview['f3'];?>,&nbsp;<?php echo $interview['f1'];?>&nbsp;<?php echo $interview['f2'];?></td>
                                                  </tr>

                                                <tr><th scope="row">Status</th>
                                                  <td>
                                                  <?php $total = $interview['iq1'] + 
                                                     $interview['iq2'] + $interview['iq3'] + $interview['iq4'] + 
                                                     $interview['iq5'] + $interview['iq6'] + $interview['iq7'] +   
                                                     $interview['iq8'] + $interview['iq9'] + $interview['iq10']; 

                                                     if($total == NULL){
                                                        echo '<button class="btn btn-warning btn-sm pe-none fw-bold">Pending</button>'; }
                                                     elseif($total >= 75 || $total >= 100){
                                                        echo '<button class="btn btn-success btn-sm pe-none">Passed</button>'; }
                                                     elseif($total <= 74){
                                                        echo '<button class="btn btn-danger btn-sm pe-none">Failed</button>'; }
                                                 ?>
                                               </td></tr>

                                                <tr><th><hr></th><td><hr></td></tr> 

                                                <tr><th scope="row fw-bold">Questions</th>
                                                  <td class="fw-bold">Score</td></tr>

                                                <tr><th scope="row">Question 1</th><td><?php echo $interview['iq1'];?></td></tr>  
                                                <tr><th scope="row">Question 2</th><td><?php echo $interview['iq2'] ?></td></tr> 
                                                <tr><th scope="row">Question 3</th><td><?php echo $interview['iq3'] ?></td></tr> 
                                                <tr><th scope="row">Question 4</th><td><?php echo $interview['iq4'] ?></td></tr> 
                                                <tr><th scope="row">Question 5</th><td><?php echo $interview['iq5'] ?></td></tr> 
                                                <tr><th scope="row">Question 6</th><td><?php echo $interview['iq6'] ?></td></tr> 
                                                <tr><th scope="row">Question 7</th><td><?php echo $interview['iq7'] ?></td></tr> 
                                                <tr><th scope="row">Question 8</th><td><?php echo $interview['iq8'] ?></td></tr> 
                                                <tr><th scope="row">Question 9</th><td><?php echo $interview['iq9'] ?></td></tr> 
                                                <tr><th scope="row">Question 10</th><td><?php echo $interview['iq10'] ?></td></tr>

                                                <tr><th scope="row">Total</th><td>
                                                  <?php $total = $interview['iq1'] + 
                                                                 $interview['iq2'] + 
                                                                 $interview['iq3'] + 
                                                                 $interview['iq4'] + 
                                                                 $interview['iq5'] + 
                                                                 $interview['iq6'] + 
                                                                 $interview['iq7'] +   
                                                                 $interview['iq8'] + 
                                                                 $interview['iq9'] + 
                                                                 $interview['iq10']; 
                                                  echo $total ?></td></tr>

                                                <tr><th scope="row">Remarks</th>
                                                  <td><?php echo $interview['initial_remarks'] ?></td></tr>

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

                                        <!-- <button type="button" 
                                                class="btn btn-warning" 
                                                data-bs-toggle="modal"
                                                title="Edit"
                                                data-bs-target="#edit<?php echo $interview['id'] ?>"><i class="bi bi-pencil-fill"></i>
                                        </button> -->

                        <!-- UPDATE APPLICANT SCHEDULE MODAL -->
                                      <div class="modal fade" id="edit<?php echo $interview['id'] ?>" aria-labelledby="fillup" aria-hidden="true">
                                          <div class="modal-dialog modal-lg">
                                           <div class="modal-content">
                                           <div class="modal-header">
                                           <h4 class="modal-title fw-bold">UPDATE INITIAL INTERVIEW</h4>
                                           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                  <!-- Modal body -->
                                           <div class="modal-body">
                                           <form action="../../../Controller/ApplicantManagementQuery.php" method="POST">

                                            <input type="hidden" name="id" value="<?php echo $interview['id'] ?>">
                                             
                                          <div class="mb-3 row">
                                          <label for="" class="col-md-5 fw-bold">Applicant ID - Fullname</label>
                                            <div class="col-md-7">

                                                    <select class="form-control selectpicker"  
                                                            name="nameapp" 
                                                            data-live-search="true"
                                                            required>

                                                    <option value="<?php echo $interview['nameapp'] ?>"><?php echo $interview['nameapp'] ?></option>

                                                      <?php
                                                        $query = mysqli_query($conn, "SELECT app_firstname,app_middlename,app_lastname, applicantID FROM applicanttbl");
                                                        $row = mysqli_num_rows($query);

                                                        while ($row = mysqli_fetch_array($query))
                                                        {
                                                          echo "<option data-tokens=' ".$row['applicantID']."&nbsp;"."-"."&nbsp;"
                                                                                       .$row['app_firstname']."&nbsp;"
                                                                                       .$row['app_middlename']."&nbsp;"
                                                                                       .$row['app_lastname']. "'>

                                                                                      ".$row['applicantID']."&nbsp;"."-"."&nbsp;"
                                                                                       .$row['app_firstname']."&nbsp;"
                                                                                       .$row['app_middlename']."&nbsp;"
                                                                                       .$row['app_lastname']."</option>" ;
                                                        }
                                                      ?>
                                                      </select>
                                             </div>
                                           </div> 

                                            <div class="mb-3 row">
                                              <label for="" class="col-md-5 fw-bold">Applicant Status</label>
                                              <div class="col-md-7">
                                                  <?php $total = $interview['iq1'] + 
                                                     $interview['iq2'] + $interview['iq3'] + $interview['iq4'] + 
                                                     $interview['iq5'] + $interview['iq6'] + $interview['iq7'] +   
                                                     $interview['iq8'] + $interview['iq9'] + $interview['iq10']; 

                                                     if($total == NULL){
                                                        echo '<button class="btn btn-warning btn-sm pe-none fw-bold">Pending</button>'; }
                                                     elseif($total >= 75 || $total >= 100){
                                                        echo '<button class="btn btn-success btn-sm pe-none">Passed</button>'; }
                                                     elseif($total <= 74){
                                                        echo '<button class="btn btn-danger btn-sm pe-none">Failed</button>'; }
                                                 ?>
                                               </div>
                                              </div><hr>

                                          <div class="mb-3 row">
                                              <label for="" class="col-md-9 form-label"><p class="fw-bold">1.  Tell me something about yourself.</p>A. What do you know about this company / organization?</label>
                                            <div class="col-md-3">
                                              <input type="number" 
                                                     class="form-control"
                                                     minlength="2"
                                                     maxlength="3" 
                                                     name="iq1"
                                                     value="<?php echo $interview['iq1'] ?>" 
                                                     required="required"
                                                     placeholder="Score">
                                            </div>
                                          </div><hr>

                                          <div class="mb-3 row">
                                              <label for="" class="col-md-9 form-label"><p class="fw-bold">2. Why did you decide to apply for this position?</p>A.  What’s your management style?</label>
                                            <div class="col-md-3">
                                              <input type="number" 
                                                     class="form-control"
                                                     minlength="2"
                                                     maxlength="3" 
                                                     name="iq2"
                                                     value="<?php echo $interview['iq2'] ?>" 
                                                     required="required"
                                                     placeholder="Score">
                                            </div>
                                          </div><hr>

                                          <div class="mb-3 row">
                                              <label for="" class="col-md-9 form-label"><p class="fw-bold">3. Are you Qualified for the Skills and Qualifications based on the Job Posting Website ? </p>A. Do you have proof for your Qualifications? Give me some supporting documents <br>B. What makes you unique?</label>
                                            <div class="col-md-3">
                                              <input type="number" 
                                                     class="form-control"
                                                     minlength="2"
                                                     maxlength="3" 
                                                     name="iq3"
                                                     value="<?php echo $interview['iq3'] ?>" 
                                                     required="required"
                                                     placeholder="Score">
                                            </div>
                                          </div><hr>

                                          <div class="mb-3 row">
                                              <label for="" class="col-md-9 form-label"><p class="fw-bold">4.  What are your strengths How has this helped you to achieve success in your career? and what are your greatness weaknesses? </p> A.  Give me some of your weakness  and How do you handle your weakness, give me some scenario </label>
                                            <div class="col-md-3">
                                              <input type="number" 
                                                     class="form-control"
                                                     minlength="2"
                                                     maxlength="3" 
                                                     name="iq4"
                                                     value="<?php echo $interview['iq4'] ?>" 
                                                     required="required"
                                                     placeholder="Score">
                                            </div>
                                          </div><hr>


                                          <div class="mb-3 row">
                                              <label for="" class="col-md-9 form-label"><p class="fw-bold">5.  Why should we hire you? </p>A.  Where do you see yourself in five years? <br> B.  What type of work environment do you most enjoy? In-person or remote?</label>
                                            <div class="col-md-3">
                                              <input type="number" 
                                                     class="form-control"
                                                     minlength="2"
                                                     maxlength="3" 
                                                     name="iq5"
                                                     value="<?php echo $interview['iq5'] ?>"
                                                     required="required"
                                                     placeholder="Score">
                                            </div>
                                          </div><hr>

                                          <div class="mb-3 row">
                                              <label for="" class="col-md-9 form-label"><p class="fw-bold">6.   What is the professional achievement you’re most proud of? A.  Do you consider yourself successful</p> A.  Do you consider yourself successful<br> B.  What motivates you?</label>
                                            <div class="col-md-3">
                                              <input type="number" 
                                                     class="form-control"
                                                     minlength="2"
                                                     maxlength="3" 
                                                     name="iq6" 
                                                     value="<?php echo $interview['iq6'] ?>"
                                                     required="required"
                                                     placeholder="Score">
                                            </div>
                                          </div><hr>

                                          <div class="mb-3 row">
                                              <label for="" class="col-md-9 form-label"><p class="fw-bold">7.  Why did you quit your last job?</p></label>
                                            <div class="col-md-3">
                                              <input type="number" 
                                                     class="form-control"
                                                     minlength="2"
                                                     maxlength="3" 
                                                     name="iq7" 
                                                     value="<?php echo $interview['iq7'] ?>"
                                                     required="required"
                                                     placeholder="Score">
                                            </div>
                                          </div><hr>

                                          <div class="mb-3 row">
                                              <label for="" class="col-md-9 form-label"><p class="fw-bold">8.  What are your salary requirements?</p></label>
                                            <div class="col-md-3">
                                              <input type="number" 
                                                     class="form-control"
                                                     minlength="2"
                                                     maxlength="3" 
                                                     name="iq8"
                                                     value="<?php echo $interview['iq8'] ?>"
                                                     required="required"
                                                     placeholder="Score">
                                            </div>
                                          </div><hr>

                                          <div class="mb-3 row">
                                              <label for="" class="col-md-9 form-label"><p class="fw-bold">9.   Do you have any serious medical conditions or any health background issue? Do you have </p> A. Did you have an illness last week, last month and recent years if you have can you elaborate what are these</label>
                                            <div class="col-md-3">
                                              <input type="number" 
                                                     class="form-control"
                                                     minlength="2"
                                                     maxlength="3" 
                                                     name="iq9"
                                                     value="<?php echo $interview['iq9'] ?>"
                                                     required="required"
                                                     placeholder="Score">
                                            </div>
                                          </div><hr>

                                          <div class="mb-3 row">
                                              <label for="" class="col-md-9 form-label"><p class="fw-bold">10.  Have You Ever Been Arrested or Convicted of a Crime or do you have criminal Record ?</p></label>
                                            <div class="col-md-3">
                                              <input type="number" 
                                                     class="form-control"
                                                     minlength="2"
                                                     maxlength="3" 
                                                     name="iq10"
                                                     value="<?php echo $interview['iq10'] ?>"
                                                     required="required"
                                                     placeholder="Score">
                                            </div>
                                          </div><hr>

                                          <div class="mb-3 row">
                                              <label for="" class="col-md-4 form-label fw-bold">Input Remarks</label>
                                            <div class="col-md-8">
                                                 <textarea class="form-control" 
                                                           name="initial_remarks"
                                                           value="<?php echo $interview['initial_remarks'] ?>"
                                                           rows="5"></textarea>
                                            </div>
                                          </div>        

                              <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button> 
                                    <button type="submit" name="update3" class="btn btn-success">Update</button>
                              </div>
                                </form>
                                    

                                        </div>
                                        </div>
                                        </div>
                                        </div>
                          <!-- END OF UPDATE APPLICANT SCHEDULE MODAL -->
                                  
                                          <!-- <button type="button" 
                                                  class="btn btn-danger" 
                                                  data-bs-toggle="modal"
                                                  title="Delete"
                                                  data-bs-target="#delete<?php echo $interview['id'] ?>"><i class="bi bi-trash"></i>
                                          </button> -->


                          <!-- DELETE APPLICANT SCHEDULE MODAL  -->
                                  <div class="modal fade" id="delete<?php echo $interview['id'] ?>" aria-labelledby="view" aria-hidden="true">
                                     <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title fw-bold">DELETE INITAL INTERVIEW</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                              </div>

                                      <div class="modal-body">
                                          <form action="../../../Controller/ApplicantManagementQuery.php" method="POST">

                                              <p class="text-center fw-bold">ARE YOU SURE YOU WANT TO DELETE THIS ?</p>
                                              <hr>

                                            <div class="mb-3 row">
                                                <label for="" class="col-md-4 form-label fw-bold">Applicant ID - Fullname</label>
                                              <div class="col-md-8">
                                                    <input class="form-control"
                                                           type="text" 
                                                           readonly class="form-control-plaintext" 
                                                           value="<?php echo $interview['nameapp'];?>">
                                              </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="" class="col-md-4 form-label fw-bold">Result Score</label>
                                              <div class="col-md-8">
                                                    <input class="form-control"
                                                           type="text" 
                                                           readonly class="form-control-plaintext" 
                                                           value="<?php $total = $interview['iq1'] + 
                                                                           $interview['iq2'] + 
                                                                           $interview['iq3'] + 
                                                                           $interview['iq4'] + 
                                                                           $interview['iq5'] + 
                                                                           $interview['iq6'] + 
                                                                           $interview['iq7'] +   
                                                                           $interview['iq8'] + 
                                                                           $interview['iq9'] + 
                                                                           $interview['iq10'];  echo $total ?>">
                                              </div>
                                            </div>

                                              <input type="hidden" name="delete_id" value="<?php echo $interview['id']; ?>">
                                          
                                            <div class="modal-footer">
                                                <button type="submit" name="delete3" class="btn btn-danger">Delete</button>
                                            </form>
                                                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancel</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                        <!-- DELETE APPLICANT SCHEDULE MODAL -->  
   
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
