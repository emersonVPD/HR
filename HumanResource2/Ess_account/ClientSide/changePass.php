<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- SWEET ALERT 2 JAVASCRIPT DIRECTORY -->
  <script src="../../assets/js/sweetalert2.min.js"></script> 

</head>
</html>

<?php 
session_start();
    include "connection.php";

    if(isset($_POST['changePass']))

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$op = validate($_POST['op']);
	$np = validate($_POST['np']);
	$c_np = validate($_POST['c_np']);
    
    if($np !== $c_np){
                echo"
                    <script>
                        Swal.fire({
                        icon: 'error',
                        title: 'ERROR',
                        html:  'CONFIRMATION AND NEW PASSWORD DOES NOT MATCH',
                            focusConfirm: false,
                            confirmButtonText:`OKAY`
                        }).then(function() {
                            window.history.back();
                        })
                    </script>"; 
    }
    else 
    {
    	// hashing the password
    	$op = md5($op);
    	$np = md5($np);
        $id = $_SESSION['id'];

        $sql = "SELECT password
                FROM essaccountstbl WHERE 
                id = '$id' AND password = '$op'";

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) === 1){
        	
        	$sql_2 = "UPDATE essaccountstbl
        	          SET password = '$np'
        	          WHERE id = '$id'";
        	mysqli_query($conn, $sql_2);

                      echo"
                          <script>
                              Swal.fire({
                                  icon: 'success',
                                  title: 'SUCCESS',
                                  html:  `PASSWORD CHANGE SUCCESS`,
                            focusConfirm: false,
                            confirmButtonText:`OKAY`
                          }).then(function() {
                               window.location=document.referrer;
                                  })
                              </script>";

        }

        else 
        {
                echo"
                    <script>
                        Swal.fire({
                        icon: 'error',
                        title: 'ERROR',
                        html:  'INCORRECT PASSWORD',
                            focusConfirm: false,
                            confirmButtonText:`OKAY`
                        }).then(function() {
                            window.history.back();
                        })
                    </script>"; 
        }
    }  
