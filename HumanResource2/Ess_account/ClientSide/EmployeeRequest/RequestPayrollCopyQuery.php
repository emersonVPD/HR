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
    include "../../../../connection.php";

			if(isset($_POST['submit']))
			{
				$q1 = $_POST['username'];
				$q2 = $_POST['yrmonth'];
				$q3 = $_POST['quarter'];
				$q4 = $_POST['note'];
				$q5 = $_POST['status'];
				$q6 = $_POST['emp'];
				$q7 = $_POST['name'];
				$q8 = $_POST['datereq'];

						$query = "INSERT INTO reqpayroll

					 ( username,
					 	 yrmonth,
					 	 quarter,
					 	 note,
						 status,
						 emp,
						 name,
						 datereq )

					 VALUES
					 ( '$q1',
					 	 '$q2',
					 	 '$q3','$q4',
						 '$q5','$q6','$q7',NOW())";


						$query_run = mysqli_query($conn,$query);
						
						if($query_run)
						{
									echo"
									    <script>
									        Swal.fire({
									            icon: 'success',
									            title: 'SUCCESS',
									            html:  `SUCCESSFULLY REQUESTED`,
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
								               	html:  `REQUEST FAILED',
												   focusConfirm: false,
												   confirmButtonText:`OKAY`
												 }).then(function() {
			                    					window.history.back();
								            })
								        </script>";
						}
					}		


		//UPDATE QUERY 
	if(isset($_POST['updateReq']))
    {
    		$id = $_POST['id'];

				$q1 = $_POST['yrmonth'];
				$q2 = $_POST['quarter'];
				$q3 = $_POST['note'];;

        $query = "UPDATE reqpayroll SET
	        yrmonth = '$q1',
	        quarter = '$q2',
	        note    = '$q3'

						   WHERE id = '$id' ";

						$query_run = mysqli_query($conn,$query);
						
						if($query_run)
						{
									echo"
									    <script>
									        Swal.fire({
									            icon: 'success',
									            title: 'SUCCESS',
									            html:  `SUCCESSFULLY UPDATED`,
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
								               	html:  `FAILED TO UPDATE',
												   focusConfirm: false,
												   confirmButtonText:`OKAY`
												 }).then(function() {
			                    					window.history.back();
								            })
								        </script>";
						}
					}



?>