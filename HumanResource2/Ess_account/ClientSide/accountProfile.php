<?php
    session_start();
    include "../../../connection.php";

    // Check if the 'username' session variable is set
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        // Now, $username contains the logged-in username.
    } else {
        // Redirect to the login page or take appropriate action if the user is not logged in.
        header("location: ../login.php");
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
    <title>MY ACCOUNT</title>

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

        <?php 
            $sql = mysqli_query($conn, "SELECT * FROM essaccountstbl WHERE username = '" . $_SESSION['username'] . "'");
            $account = mysqli_num_rows($sql);
                if($account > 0){
                    while ($account = mysqli_fetch_array($sql)) {

                        # code...
        ?>
      <!-- #Left Sidebar ==================== -->
      <div class="sidebar">
        <div class="sidebar-inner">
          <!-- ### $Sidebar Header ### -->
          <div class="sidebar-logo">
            <div class="peers ai-c fxw-nw">
              <div class="peer peer-greed">
                <a class="sidebar-link td-n" href="../index.php"
                  ><div class="peers ai-c fxw-nw">
                    <div class="peer">
                      <div class="logo">
                        <img src="../../assets/icons/skystreamlogo.png" class="mt-2" style="height: 50px; width: 80px;"/>
                      </div>
                    </div>
                    <div class="peer peer-greed">
                      <h5 class="lh-1 mB-0 logo-text ms-4">MY ESS ACCOUNT</h5>
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
              <a class="sidebar-link" href="../index.php"
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
                <li><a class="sidebar-link" href="../Modules/TimeAttendance.php">Time and Attendance</a></li>
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
                <li><a class="sidebar-link" href="../Modules/ViewSandS.php">My Shift and Schedule</a></li>
                <li><a class="sidebar-link" href="../Modules/ChangeSandS.php">Change Shift and Schedule</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
            <a class="dropdown-toggle" data-bs-toggle="collapse" href="#q3"
                ><span class="icon-holder"
                  > <i class="bi bi-arrow-counterclockwise"></i></span
                ><span class="title">Claims | Reimbursement</span>
                <span class="arrow"><i class="ti-angle-right"></i></span
              ></a>
              <ul class="dropdown-menu" id="q3">
                <li><a class="sidebar-link" href="../Modules/RequestClaims.php">Request Claims</a></li>
                <li><a class="sidebar-link" href="../Modules/RequestReimbursement.php">Request Reimbursement</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
            <a class="dropdown-toggle" data-bs-toggle="collapse" href="#q4"
                ><span class="icon-holder"
                  > <i class="bi bi-box-arrow-left"></i></span
                ><span class="title">Request Leave</span>
                <span class="arrow"><i class="ti-angle-right"></i></span
              ></a>
              <ul class="dropdown-menu">
                <li><a class="sidebar-link" href="../Modules/Employee Self Service/RequestLeave.php">Employee Leave</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
            <a class="dropdown-toggle" data-bs-toggle="collapse" href="#q5"
                ><span class="icon-holder"
                  ><i class="bi bi-cash-coin"></i></span
                ><span class="title">My Payroll</span>
                <span class="arrow"><i class="ti-angle-right"></i></span
              ></a>
              <ul class="dropdown-menu">
                <li><a class="sidebar-link" href="../Modules/RequestPayroll.php">Request Payroll</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
            <a class="dropdown-toggle" data-bs-toggle="collapse" href="#q6"
                ><span class="icon-holder"
                  > <i class="bi bi-file-earmark-pdf-fill"></i></span
                ><span class="title">Request Documents</span>
                <span class="arrow"><i class="ti-angle-right"></i></span
              ></a>
              <ul class="dropdown-menu">
                <li><a class="sidebar-link" href="../Modules/RequestDocument.php">Request Documents</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      <!-- #Main ============================ -->
      <div class="page-container">
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
              <li class="notifications dropdown" style="margin-left: -50px;">
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
                    <a href="accountSettings.php" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                        <i class="ti-settings mR-10"></i> <span>Setting</span>
                    </a>
                  </li>

                  <li>
                    <a href="accountProfile.php" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                        <i class="ti-user mR-10"></i> <span>Profile</span>
                    </a>
                  </li>
                  <li role="separator" class="divider"></li>
                  <li>
                    <a href="logout.php" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                        <i class="ti-power-off mR-10"></i> <span>Logout</span>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
        <!-- ### $App Screen Content ### -->
        <main class="main-content bgc-grey-100">
          <div id="mainContent">
            <div class="row gap-20 masonry pos-r">
              <div class="masonry-sizer col-md-6"></div>
              <div class="masonry-item w-100">
                <div class="row gap-20">

                <div class="col-md-12">
                      <div class="bgc-white p-20">
                        <div class="layer w-100 mB-10"><h5 class="fw-bold">MY PROFILE</h5></div>
                        <hr>

                        <div class="mb-3 row">
                              <label for="" class="col-md-2 form-label fw-bold">Employee ID</label>
                          <div class="col-md-5">
                              <input class="form-control"
                                    type="text" 
                                    readonly class="form-control-plaintext" 
                                    value="<?php echo $account['employeeID']; ?>">
                          </div>
                        </div>    

                        <div class="mb-3 row">
                              <label for="" class="col-md-2 form-label fw-bold">Username</label>
                          <div class="col-md-5">
                              <input class="form-control"
                                      type="text" 
                                      readonly class="form-control-plaintext" 
                                      value="<?php echo $account['username']; ?>">
                          </div>
                        </div>

                        <div class="mb-3 row">
                                <label for="" class="col-md-2 form-label fw-bold">Fullname</label>
                            <div class="col-md-5">
                                <input class="form-control"
                                        type="text" 
                                        readonly class="form-control-plaintext" 
                                        value="<?php echo $account['ess_firstname'];?>&nbsp;<?php echo $account['ess_middlename'];?>&nbsp;<?php echo $account['ess_lastname']; ?>">
                            </div>
                        </div>

                        <div class="mb-3 row">
                                <label for="" class="col-md-2 form-label fw-bold">Password</label>
                            <div class="col-md-5">
                                <button class="btn btn-danger btn-sm pe-none">Encrypted</button>
                            </div>
                        </div>

                        <div class="mb-3 row">
                                <label for="" class="col-md-2 form-label fw-bold">Job Title</label>
                            <div class="col-md-5">
                                <input class="form-control"
                                        type="text" 
                                        readonly class="form-control-plaintext" 
                                        value="<?php echo $account['ess_positionTitle']; ?>">
                            </div>
                        </div>

                        <div class="mb-3 row">
                                <label for="" class="col-md-2 form-label fw-bold">Position Title</label>
                            <div class="col-md-5">
                                <input class="form-control"
                                        type="text" 
                                        readonly class="form-control-plaintext" 
                                        value="<?php echo $account['ess_subpositionTitle']; ?>">
                            </div>
                        </div>


                        <div class="mb-3 row">
                                <label for="" class="col-md-2 form-label fw-bold">Contact Number</label>
                            <div class="col-md-5">
                                <input class="form-control"
                                        type="text" 
                                        readonly class="form-control-plaintext" 
                                        value="<?php echo $account['ess_contactno']; ?>">
                            </div>
                        </div>

                        <div class="mb-3 row">
                                <label for="" class="col-md-2 form-label fw-bold">Email</label>
                            <div class="col-md-5">
                                <input class="form-control"
                                        type="text" 
                                        readonly class="form-control-plaintext" 
                                        value="<?php echo $account['ess_email']; ?>">
                            </div>
                        </div>
                      </div>
                </div>


  

            </div>
          </div>
                    <?php } } ?>

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
