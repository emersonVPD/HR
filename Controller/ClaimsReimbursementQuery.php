<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- SWEET ALERT 2 JAVASCRIPT DIRECTORY -->
  <script src="../../assets/js/sweetalert2.min.js"></script> 
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>
</html>


<?php //UPDATE QUERY 

 	require "../connection.php";

	if(isset($_POST['updateHR1']))
    {
    		$id = $_POST['id'];

				$q1 = $_POST['status'];
				$q2  = $_POST['remarks'];

			    $query = "UPDATE reqcandr SET
			        status  = '$q1',
			        remarks = '$q2'

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