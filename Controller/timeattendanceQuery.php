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

<?php
	include "../connection.php";

			if(isset($_POST['submit']))
			{
				$q1 = $_POST['username'];
				$q2 = $_POST['empid'];
				$q3 = $_POST['fullname'];
				$q4 = $_POST['shift'];
				$q5 = $_POST['date_attendance'];
				$q6 = $_POST['timein'];
				$q7 = $_POST['timeout'];
				$q8 = $_POST['ot_from'];
				$q9 = $_POST['ot_to'];
				$q10 = $_POST['description'];
				$q11 = date('Y-m-d H:i:s'); // Get the current date and time
				
				$query = "INSERT INTO timeattendance
				   (username, empid, fullname,
					shift, date_attendance, timein, 
					timeout, ot_from, ot_to, description, date_submit)
				 VALUES
				   ('$q1','$q2','$q3',
					'$q4','$q5','$q6',
					'$q7','$q8','$q9',
					'$q10','$q11')";				

				$query_run = mysqli_query($conn,$query);
				
				if($query_run)
				{
					echo"
					    <script>
					        Swal.fire({
					            icon: 'success',
					            title: 'SUCCESS',
					            html:  `SUCCESSFULLY INSERTED`,
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
           

      if(isset($_POST['updateHR2']))
		    {
    		    $id = $_POST['id'];
				$q3 = $_POST['shift'];
				$q4 = $_POST['date_attendance'];
				$q5 = $_POST['timein'];
				$q6 = $_POST['timeout'];
				$q7 = $_POST['ot_from'];
				$q8 = $_POST['ot_to'];
				$q9 = $_POST['description'];

 			 $query = "UPDATE timeattendance SET
 			 				shift    = '$q3',
 			 		date_attendance  = '$q4',
							timein   = '$q5',
							timeout  = '$q6',

							ot_from  = '$q7',
							ot_to  = '$q8',
							description  = '$q9'
                    
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

            if(isset($_POST['delete']))
            {
                $q1 = $_POST['delete_id'];
    
                $query = "DELETE FROM timeattendance WHERE id = '$q1'";
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
							
		



?>