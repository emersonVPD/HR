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
				$q1  = $_POST['username'];
				$q2  = $_POST['employeeID'];
				$q3  = $_POST['name'];
				$q4  = $_POST['shift'];
				$q5  = $_POST['note'];
				$q6  = $_POST['day1'];
				$q7  = $_POST['day2'];
				$q8  = $_POST['day3'];
				$q9  = $_POST['day4'];
				$q10 = $_POST['day5'];
				$q11 = $_POST['dayoff1'];
				$q12 = $_POST['dayoff2'];
				$q13 = $_POST['status'];
 				$q14 = $_POST['reqdate'];


				$query = "INSERT INTO reqsands

				   ( username, employeeID, name, shift,
				     note, day1, day2, day3, 
				   	 day4, day5, dayoff1,  dayoff2, status,
				   	 reqdate ) 

				 VALUES
				   ( '$q1','$q2','$q3','$q4',
					 '$q5','$q6','$q7','$q8',
					 '$q9','$q10','$q11',
					 '$q12','$q13',NOW())";

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
			if(isset($_POST['update']))
		    {
    			$id  = $_POST['id'];
				$q1  = $_POST['shift'];
				$q2  = $_POST['note'];
				$q3  = $_POST['day1'];
				$q4  = $_POST['day2'];
				$q5  = $_POST['day3'];
				$q6  = $_POST['day4'];
				$q7  = $_POST['day5'];
				$q8  = $_POST['dayoff1'];
				$q9  = $_POST['dayoff2'];
				$q10 = $_POST['status'];

       			 $query = "UPDATE reqsands SET
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


							//DELETE QUERY
		if(isset($_POST['delete']))
		{
			$id = $_POST['delete_id'];

			$query = "DELETE FROM shiftandschedule WHERE id = '$id'";
			$query_run = mysqli_query($conn,$query);

			if($query_run)
			{
		          echo"
		              <script>
		                  Swal.fire({
		                      icon: 'success',
		                      title: 'SUCCESS',
		                      html:  `DELETE SUCCESSFULLY`,
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
		                html:  'FAILED TO DELETE',
		                focusConfirm: false,
		                confirmButtonText:`OKAY`
		              }).then(function() {                
		                    window.history.back();
		                })
		            </script>";
			} 
		}				


				//UPDATE QUERY 
			if(isset($_POST['updateHR1']))
		    {
    			$id = $_POST['id'];
				$q1 = $_POST['status'];
				$q2 = $_POST['remarks'];;

       			 $query = "UPDATE reqsands SET
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



?>