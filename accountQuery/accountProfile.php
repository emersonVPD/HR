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
          if ($positionTitle !== 'Super Admin') {
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
    <title>SUPER ADMIN</title>

      <meta content="" name="description">
      <meta content="" name="keywords">

    <link rel="icon" href="../adminAssets/icons/skystreamlogo.png">

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

    <link href="../adminAssets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet"/>
    <link href="../adminAssets/css/icons.min.css" rel="stylesheet"/>
    <link href="../adminAssets/css/app.min.css" id="app-style" rel="stylesheet"/>
    <link href="../HumanResource4/css/style.css" rel="stylesheet"/>
    <script src="../adminAssets/js/main.js" defer="defer" ></script>

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
                <a class="sidebar-link td-n" href="../index.php"
                  ><div class="peers ai-c fxw-nw">
                    <div class="peer">
                      <div class="logo">
                        <img src="../adminAssets/icons/skystreamlogo.png" class="mt-2" style="height: 50px; width: 80px;"/>
                      </div>
                    </div>
                    <div class="peer peer-greed">
                      <h5 class="lh-1 mB-0 logo-text ms-4">SUPER ADMIN</h5>
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
            <a class="dropdown-toggle" href="../HumanResource1/index.php" target="_blank">
              <span class="icon-holder"><i class="bi bi-person-lines-fill"></i></span>
              <span class="title">Human Resource 1</span>
            </a>
            </li>

            <li class="nav-item dropdown">
            <a class="dropdown-toggle" href="../HumanResource2/index.php" target="_blank">
              <span class="icon-holder"><i class="bi bi-person-lines-fill"></i></span>
              <span class="title">Human Resource 2</span>
            </a>
            </li>

            <li class="nav-item dropdown">
            <a class="dropdown-toggle" href="../HumanResource3/index.php" target="_blank">
              <span class="icon-holder"><i class="bi bi-person-lines-fill"></i></span>
              <span class="title">Human Resource 3</span>
            </a>
            </li>

            <li class="nav-item dropdown">
            <a class="dropdown-toggle" href="../HumanResource3/index.php" target="_blank">
              <span class="icon-holder"><i class="bi bi-person-lines-fill"></i></span>
              <span class="title">Human Resource 4</span>
            </a>
            </li>

            <li class="nav-item dropdown">
            <a class="dropdown-toggle" href="#" target="_blank">
              <span class="icon-holder"><i class="bi bi-truck"></i></span>
              <span class="title">Logistic</span>
            </a>
            </li>

            <li class="nav-item dropdown">
            <a class="dropdown-toggle" href="#" target="_blank">
              <span class="icon-holder"><i class="bi bi-airplane-engines"></i></span>
              <span class="title">Core 1</span>
            </a>
            </li>

            <li class="nav-item dropdown">
            <a class="dropdown-toggle" href="#" target="_blank">
              <span class="icon-holder"><i class="bi bi-airplane-engines"></i></span>
              <span class="title">Core 2</span>
            </a>
            </li>

            <li class="nav-item dropdown">
            <a class="dropdown-toggle" href="#" target="_blank">
              <span class="icon-holder"><i class="bi bi-display"></i></span>
              <span class="title">Administrative</span>
            </a>
            </li>

            <li class="nav-item dropdown">
            <a class="dropdown-toggle" href="#" target="_blank">
              <span class="icon-holder"><i class="bi bi-cash-coin"></i></span>
              <span class="title">Financial</span>
            </a>
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
                    <a href="accountSettings.php" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"
                      ><i class="ti-settings mR-10"></i> <span>Setting</span></a
                    >
                  </li>
                  <li>
                    <a href="accountProfile.php" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"
                      ><i class="ti-user mR-10"></i> <span>Profile</span></a
                    >
                  </li>
                  <li role="separator" class="divider"></li>
                  <li>
                    <a href="logout.php" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"
                      ><i class="ti-power-off mR-10"></i> <span>Logout</span></a
                    >
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
                            value="<?php echo $account['firstname'];?>&nbsp;<?php echo $account['middlename'];?>&nbsp;<?php echo $account['lastname']; ?>">
                 </div>
            </div>

            <div class="mb-3 row">
                    <label for="" class="col-md-2 form-label fw-bold">Password</label>
                <div class="col-md-5">
                    <button class="btn btn-danger btn-sm pe-none">Encrypted</button>
                 </div>
            </div>

            <div class="mb-3 row">
                    <label for="" class="col-md-2 form-label fw-bold">PositionTitle</label>
                <div class="col-md-5">
                     <input class="form-control"
                            type="text" 
                            readonly class="form-control-plaintext" 
                            value="<?php echo $account['positionTitle']; ?>">
                 </div>
            </div>
            <!--
            <div class="mb-3 row">
                    <label for="" class="col-md-2 form-label fw-bold">Sub Position Title</label>
                <div class="col-md-5">
                     <input class="form-control"
                            type="text" 
                            readonly class="form-control-plaintext" 
                            value="<?php echo $account['subpositionTitle']; ?>">
                 </div>
            </div>
            -->

            <div class="mb-3 row">
                    <label for="" class="col-md-2 form-label fw-bold">Contact Number</label>
                <div class="col-md-5">
                     <input class="form-control"
                            type="text" 
                            readonly class="form-control-plaintext" 
                            value="<?php echo $account['contactno']; ?>">
                 </div>
            </div>

            <div class="mb-3 row">
                    <label for="" class="col-md-2 form-label fw-bold">Email</label>
                <div class="col-md-5">
                     <input class="form-control"
                            type="text" 
                            readonly class="form-control-plaintext" 
                            value="<?php echo $account['email']; ?>">
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
