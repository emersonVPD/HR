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
				$q2 = $_POST['type'];
				$q3 = $_POST['note'];
				$q4 = $_POST['status'];
				$q5 = $_POST['emp'];
				$q6 = $_POST['name'];
				$q7 = $_POST['reqdate'];

				$query = "INSERT INTO reqdocument

				   ( username, type, note,
					 status, emp, name,
					 reqdate )

				 VALUES
				   ( '$q1','$q2','$q3','$q4',
					 '$q5','$q6',NOW())";

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
				// $q1 = $_POST['type'];
				$q2 = $_POST['note'];;

       			 $query = "UPDATE reqdocument SET
		           note = '$q2'
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

		//UPDATE QUERY 
	if(isset($_POST['updateLOG2']))
    {
    		$id = $_POST['id'];
			$q1 = $_POST['status'];

        	$query = "UPDATE reqdocument SET
	        status = '$q1' WHERE id = '$id' ";

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
		               	html:  `FAILED TO REQUEST',
						   focusConfirm: false,
						   confirmButtonText:`OKAY`
						 }).then(function() {
        					window.history.back();
		            })
		        </script>";
			}
		}

	if(isset($_POST['updateHR1']))
    {

      $id      = $_POST['id'];
	  $remarks = $_POST['remarks'];
	  $status  = $_POST['status'];

      $imageName = $_FILES["docs_file"]["name"];
      $imageSize = $_FILES["docs_file"]["size"];
      $tmpName = $_FILES["docs_file"]["tmp_name"];

			$old_image = $_POST['docs_file_old'];

			if ($imageName != '') { $imageName = $_FILES['docs_file']['name']; }
			else { $imageName = $old_image; }

      // Image validation
      $validImageExtension = ['pdf'];
      $imageExtension = explode('.', $imageName);
      $imageExtension = strtolower(end($imageExtension));

      if (!in_array($imageExtension, $validImageExtension))
      {
				echo"
					<script>
					    Swal.fire({
					    icon: 'error',
					    title: 'ERROR',
					    html:  'PDF - FILE FORMAT ONLY ALLOWED',
							focusConfirm: false,
							confirmButtonText:`OKAY`
						}).then(function() {
			                window.history.back();
					    })
					</script>";	
      }

      elseif ($imageSize > 3145728){
				echo"
					<script>
					    Swal.fire({
					    icon: 'error',
					    title: 'ERROR',
					    html:  'FILES TOO LARGE',
							focusConfirm: false,
							confirmButtonText:`OKAY`
						}).then(function() {
			                window.history.back();
					    })
					</script>";	
      }

      else{
        $newImageName = $imageName; // Generate new image name;

        $query = "UPDATE reqdocument SET
					remarks    = '$remarks', 
					status     = '$status',
					docs_file  = '$newImageName'  

						   WHERE id = '$id' ";

        mysqli_query($conn, $query);
        move_uploaded_file($tmpName, 'reqDocument/' . $newImageName);
			          echo"
			              <script>
			                  Swal.fire({
			                      icon: 'success',
			                      title: 'SUCCESS',
			                      html:  `SUCCESSFULLY DELIVERED DOCUMENT COPY`,
			                focusConfirm: false,
			                confirmButtonText:`OKAY`
			              }).then(function() {
					window.location=document.referrer;
			                      })
			                  </script>";
      }
    }



?>