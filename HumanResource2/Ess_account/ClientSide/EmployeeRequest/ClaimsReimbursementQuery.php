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

				$query = "INSERT INTO reqcandr
					  ( username, type, note,
						status, emp, name, reqdate )

					 VALUES
					 ( '$q1','$q2','$q3',
					   '$q4','$q5','$q6',NOW())";

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

	//ADD QUERY
	if(isset($_POST['submit2']))
	{
      $q1 = $_POST['username'];
      $q2 = $_POST['type'];
      $q3 = $_POST['note'];
      $q4 = $_POST['status'];
      $q5 = $_POST['emp'];
      $q6 = $_POST['name'];
      $q7 = $_POST['reqdate'];

		$files 		       = $_FILES['candr_file']['name'];
		$allowed_extension = array('pdf','png','jpeg','jpg','PNG','JPEG','JPG','docx','doc');
		$filename          = $_FILES['candr_file']['name'];
		$file_extension    = pathinfo($filename, PATHINFO_EXTENSION);

			if(!in_array($file_extension,$allowed_extension))
			{

				echo"
					<script>
					    Swal.fire({
					    icon: 'error',
					    title: 'ERROR',
					    html:  'PNG, JPG, JPEG<br>PDF, DOCX - ONLY ALLOWED FORMAT',
							focusConfirm: false,
							confirmButtonText:`OKAY`
						}).then(function() {
                    		window.history.back();
					    })
					</script>";	
			}

				else
				{

				if(file_exists("../../../public/uploads/proofReimbursement/" . $_FILES['candr_file']['name']))
				{
					echo"
						<script>
						    Swal.fire({
						    icon: 'error',
						    title: 'ERROR',
						    html:  'FILES ALREADY EXISTS',
								focusConfirm: false,
								confirmButtonText:`OKAY`
							}).then(function() {
	                    		window.history.back();
						    })
						</script>";	
				}

		else
		{
		$query = "INSERT INTO reqcandr
					 ( username,
                       type,
                       note,
					   status,
                       emp,
                       name,
                       reqdate, 
					   candr_file )
					 VALUES
					 ( '$q1','$q2','$q3','$q4',
                       '$q5','$q6',NOW(),'$files')";

		$query_run = mysqli_query($conn,$query);

				if($query_run)
				{
					move_uploaded_file($_FILES["candr_file"]["tmp_name"],"../../../../public/uploads/proofReimbursement/".$_FILES["candr_file"]["name"]);

					echo"
					    <script>
					        Swal.fire({
					            icon: 'success',
					            title: 'SUCCESS',
					            html:  'SUCCESSFULLY REQUESTED',
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
					               	html:  `FAILED TO INSERT,
									   focusConfirm: false,
									   confirmButtonText:`OKAY`
									 }).then(function() {
                    					window.history.back();
					            })
					        </script>";
				}
			}
		}
	}	


		//UPDATE QUERY 
	if(isset($_POST['updateReq']))
    {
    		$id = $_POST['id'];

				$q1 = $_POST['type'];
				$q2  = $_POST['note'];

			    $query = "UPDATE reqcandr SET
			        type = '$q1',
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
	if(isset($_POST['updateReq2']))
    {
	    $id = $_POST['id'];
			$q1 = $_POST['type'];
			$q2 = $_POST['note'];

      $imageName = $_FILES["candr_file"]["name"];
      $imageSize = $_FILES["candr_file"]["size"];
      $tmpName = $_FILES["candr_file"]["tmp_name"];

			$old_image = $_POST['candr_file_old'];

			if ($imageName != '') { $imageName = $_FILES['candr_file']['name']; }
			else { $imageName = $old_image; }

      // Image validation
      $validImageExtension = ['pdf','jpeg','jpg','png','docx','doc'];
      $imageExtension = explode('.', $imageName);
      $imageExtension = strtolower(end($imageExtension));

      if (!in_array($imageExtension, $validImageExtension))
      {
				echo"
					<script>
					    Swal.fire({
					    icon: 'error',
					    title: 'ERROR',
					    html:  'PNG, JPG, JPEG<br>PDF, DOCX - ONLY ALLOWED FORMAT',
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

      else
      {
        $newImageName = $imageName; // Generate new image name;

        $query = "UPDATE reqcandr SET
					type        = '$q1', 
					note        = '$q2',
					candr_file  = '$newImageName'  

						   WHERE id = '$id' ";

        mysqli_query($conn, $query);
        move_uploaded_file($tmpName, '../../../public/uploads/proofReimbursement/' . $newImageName);
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
    }

		//UPDATE QUERY 
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

?>