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
				$user = $_POST['username'];
				$leave = $_POST['lv_leave'];
				$note = $_POST['lv_note'];
				$date1 = $_POST['lv_datefrom'];
				$date2 = $_POST['lv_dateto'];
				$status = $_POST['lv_status'];
				$employee = $_POST['emp'];
				$fullname = $_POST['name'];

						$query = "INSERT INTO reqleave

					 ( username,lv_leave,lv_note,lv_datefrom,
						 lv_dateto,lv_status,emp,name )

					 VALUES
					 ( '$user','$leave','$note','$date1',
							'$date2','$status','$employee','$fullname' )";


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

				$leave = $_POST['lv_leave'];
				$note  = $_POST['lv_note'];
				$date1 = $_POST['lv_datefrom'];
				$date2 = $_POST['lv_dateto'];

        $query = "UPDATE reqleave SET
	        lv_leave    = '$leave',
	        lv_note     = '$note',
	        lv_datefrom = '$date1',
	        lv_dateto   = '$date2'

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