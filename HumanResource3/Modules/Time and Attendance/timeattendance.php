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
 require "../../PHP/connection.php";

			if(isset($_POST['submit']))
			{
				$q1 = $_POST['username'];
				$q2 = $_POST['nameemp'];
        $q3 = $_POST['shift'];
        $q4 = $_POST['dateta'];
				$q5 = $_POST['timein'];
				$q6 = $_POST['timeout'];

				$query = "INSERT INTO timeattendance

				   ( username,
				     nameemp,
             shift,
             dateta, 
				   	 timein, 
				   	 timeout)

				 VALUES
				   ( '$q1',
				   	 '$q2',
				   	 '$q3',
				   	 '$q4',
             '$q5',
             '$q6')";

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
				$q1 = $_POST['username'];
				$q2 = $_POST['nameemp'];
        $q3 = $_POST['shift'];
        $q4 = $_POST['dateta'];
				$q5 = $_POST['timein'];
				$q6 = $_POST['timeout'];

 			 $query = "UPDATE timeattendance SET
 			 				username = '$q1',
 			 				nameemp  = '$q2',
 			 				shift    = '$q3',
 			 				dateta   = '$q4',
              timein   = '$q5',
              timeout  = '$q6'
                    
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