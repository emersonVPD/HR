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
      content="width=device-width,initial-scale=1,shrink-to-fit=no"/>

      <meta content="" name="description">
      <meta content="" name="keywords">

    <link rel="icon" href="../../assets/icons/skystreamlogo.png">

    <title>HR 4</title>

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

      <!-- #Main ============================ -->

        <!-- ### $Topbar ### -->
          <?php 
              $sql = mysqli_query($conn, "SELECT * FROM tntaccount WHERE username = '" . $_SESSION['username'] . "'");
              $account = mysqli_num_rows($sql);
                  if($account > 0){
                      while ($account = mysqli_fetch_array($sql)) {
          ?>

        <?php } } ?>
        <!-- ### $App Screen Content ### -->
        <main class="main-content bgc-grey-100" style="margin-top: -80px;">
          <div id="mainContent">
            <div class="container-fluid">
            <?php
            if (isset($_GET['id'])) {
                                $id = $_GET['id'];
                                $sql = "SELECT * FROM create_payroll WHERE id = $id"; 
                                $result = mysqli_query($conn, $sql);

                                if ($result && mysqli_num_rows($result) > 0) {
                                    $row = mysqli_fetch_assoc($result);
         ?>
              <h4 class="c-grey-900 mT-10 mB-30 fw-bold">PAYSLIP</h4>
              <div class="row">
                  <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/inputmask@5.0.8/dist/jquery.inputmask.min.js"></script>

                    <table
                        class="table"
                        cellspacing="0"
                        width="100%">
                        <thead>
                        </thead>
                        <tbody>
                            <?php
                                    $originalDateFrom = $row['date_from'];
                                    $formattedDateFrom = date("F j, Y", strtotime($originalDateFrom));
                                    
                                    $originalDateTo = $row['date_to'];
                                    $formattedDateTo = date("F j, Y", strtotime($originalDateTo));
                                    
                                    echo "<tr><td>$formattedDateFrom</td><td>$formattedDateTo</td></tr>";

                                    echo "<h4 class='fw-bold'>{$row['fullname']}</h4>";
                                    echo "<tr><th>EmployeeID</th><td>{$row['employeeID']}</td></tr>";
                                    echo "<tr><th>Job Postion</th><td>{$row['job_position']}</td></tr>";
                                    echo "<tr><th>Daily Rate</th><td class='currentPH text-start'>{$row['daily_rate']}</td></tr>";                                    
                                    echo "<tr><th>Days of Work</th><td>{$row['days_of_work']}</td></tr>";
                                    echo "<tr><th><hr></td></tr>";
                                    echo "<tr><th>Total Net Pay</th><td class='currentPH text-start'>{$row['net_pay']}</td></tr>";
                                    echo "<tr><th>Total Deductions</th><td class='currentPH text-start'>{$row['total_deductions']}</td></tr>";
                                    echo "<tr><th>Overtime Pay</th><td class='currentPH text-start'>{$row['overtime_pay']}</td></tr>";

                                    echo "<td class='text-center'><span class='h6'>OVERTIME<span></td>";
                                    echo "<tr><th>Overtime Hours</th><td class='text-start'>{$row['overtime_hours']} Hours</td></tr>";
                                    echo "<tr><th>Overtime Rate</th><td class='currentPH text-start'>{$row['overtime_rate']}</td></tr>";

                                    echo "<td class='text-center'><span class='h6'>DEDUCTIONS<span></td>";
                                    
                                    echo "<tr><th>SSS</th><td class='currentPH text-start'>{$row['overtime_hours']}</td></tr>";
                                    echo "<tr><th>Philhealth</th><td class='currentPH text-start'>{$row['overtime_rate']}</td></tr>";
                                    echo "<tr><th>Pag-Ibig</th><td class='currentPH text-start'>{$row['pag_ibig']}</td></tr>";
                                    echo "<tr><th>Other Deductions</th><td class='currentPH text-start'>{$row['other_deductions']}</td></tr>";
                                    echo "<td class='text-center'><span class='h6'>BONUSES<span></td>";

                                    echo "<tr><th>Bonus</th><td class='currentPH text-start'>{$row['bonus']}</td></tr>";

                                    // Close the database connection when done.
                                    mysqli_close($conn);
                                } else {
                                    echo "No records found for the provided ID.";
                                }
                            } else {
                                echo "ID not provided in the URL.";
                            }
                            ?>
                        </tbody>

                        <div class="print-button" id="printButton">
                            <div class="float-end">
                                <a href="javascript:window.print()" style="font-size: 20px">&#128438;</a>
                            </div>
                        </div> 

                    </table>

                    <script>
                        function hidePrintButton() {
                            document.getElementById('printButton').style.display = 'none';
                        }

                        function showPrintButton() {
                            document.getElementById('printButton').style.display = 'block';
                        }

                        if (window.matchMedia) {
                            window.onbeforeprint = hidePrintButton;
                            window.onafterprint = showPrintButton;
                        } else {
                            document.body.onbeforeprint = hidePrintButton;
                            document.body.onafterprint = showPrintButton;
                        }
                    </script>
                  </div>
              </div>
              <!-- <div class="text-end">
            <a href="create_payroll.php" class="btn btn-secondary ps-4 pe-4" id="printButton">Back</a>
            </div> -->
            </div>
          </div>
        </main>
        <!-- ### $App Screen Footer ### -->

      </div>
    </div>
                        <style>
                                    .print-button {
            margin-top: 20px;
        }

        .print-button .float-end a {
            background-color: #28a745;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
                        </style>
      <script>
          $(document).ready(function() {
                  $('.currentPH').inputmask({
                      'alias': 'currency',
                      allowMinus: false,
                      'prefix': "₱ ",
                      max: 999999999999.99,
                  });
              });
      </script>

  </body>









</html>
