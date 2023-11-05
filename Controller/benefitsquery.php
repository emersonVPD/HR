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
				$q1 = $_POST['type'];
				$q2 = $_POST['benefits'];
				$q3 = $_POST['details'];
				$q4 = $_POST['deduction'];

				$query = "INSERT INTO benefits

				   ( type,
				     benefits, 
				   	 details, 
				   	 deduction)

				 VALUES
				   ( '$q1',
				     '$q2',
				   	 '$q3',
				   	 '$q4')";

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
    			$q1 = $_POST['id'];
				$q1a = $_POST['type'];
				$q2 = $_POST['benefits'];
				$q3 = $_POST['details'];
				$q4 = $_POST['deduction'];

       			 $query = "UPDATE benefits SET
				   type = '$q1a',
				   benefits = '$q2',
                   details = '$q3',
                   deduction = '$q4'

			   WHERE id = '$q1' ";

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
    
                $query = "DELETE FROM benefits WHERE id = '$q1'";
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