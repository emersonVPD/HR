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

	//ADD QUERY
	if(isset($_POST['addRequest']))
	{
		$title    = $_POST['req_module_title'];
		$req_date = $_POST['req_module_date'];
		$purpose  = $_POST['req_module_purpose'];
		$remarks  = $_POST['req_module_remarks'];
		$files 		= $_FILES['req_module_file']['name'];

		$allowed_extension = array('pdf');
		$filename = $_FILES['req_module_file']['name'];
		$file_extension = pathinfo($filename, PATHINFO_EXTENSION);

			if(!in_array($file_extension,$allowed_extension))
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

		else
			{
		$query = "INSERT INTO reqmodules(
			req_module_title, 
			req_module_date,
			req_module_purpose,
			req_module_remarks,
			req_module_file)

				VALUES (
						'$title',
						'$req_date',
						'$purpose',
						'$remarks',
						'$files')";

		$query_run = mysqli_query($conn,$query);

				if($query_run)
				{
					move_uploaded_file($_FILES["req_module_file"]["tmp_name"],"../public/uploads/requestModules/".$_FILES["req_module_file"]["name"]);

					echo"
					    <script>
					        Swal.fire({
					            icon: 'success',
					            title: 'SUCCESS',
					            html:  `TRANSACTION SUCCESSFUL`,
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
						    html:  'INFORMATION NOT INSERTED',
								focusConfirm: false,
								confirmButtonText:`OKAY`
							}).then(function() {								
	                    		window.history.back();
						    })
						</script>";
				}
			}
		}

		//UPDATE QUERY 
	if(isset($_POST['updateRequest']))
    {
	  $id       = $_POST['id'];
		$title    = $_POST['req_module_title'];
		$req_date = $_POST['req_module_date'];
		$purpose  = $_POST['req_module_purpose'];
		$remarks  = $_POST['req_module_remarks'];
		$new_image = $_FILES['req_module_file']['name'];
		$old_image = $_POST['req_module_file_old'];

			if($new_image != '')
			{
				$update_filename = $_FILES['req_module_file']['name'];
			}
			else
			{
				$update_filename = $old_image;
			}
				$query = "UPDATE reqmodules SET
					req_module_title	 = '$title',
					req_module_date		 = '$req_date',
					req_module_purpose = '$purpose',
					req_module_remarks = '$remarks', 
					req_module_file    = '$update_filename'  

						   WHERE id = '$id' ";

					$query_run = mysqli_query($conn,$query);

				if($query_run)
				{
					if($_FILES['req_module_file']['name'] !='')
					{
						move_uploaded_file($_FILES["req_module_file"]["tmp_name"],"../public/uploads/requestModules/".$_FILES["req_module_file"]["name"]);
						unlink("../public/uploads/requestModules/".$old_image);
					}
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
			                html:  'FAILED TO UPDATE',
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
			$id 	 	       = $_POST['id'];
			$firstname     = $_POST['emp_firstname'];
			$middlename    = $_POST['emp_middlename'];
			$lastname      = $_POST['emp_lastname'];
			$positionTitle = $_POST['emp_positionTitle'];
			$status        = $_POST['emp_status'];
			$dateHired     = $_POST['emp_dateHired'];
			$department    = $_POST['emp_department'];
			$gender        = $_POST['emp_gender'];
			$address       = $_POST['emp_address'];
			$age           = $_POST['emp_age'];
			$birthdate 	   = $_POST['emp_birthdate'];
			$birthplace    = $_POST['emp_birthplace'];
			$contactno     = $_POST['emp_contactno'];
			$email         = $_POST['emp_email'];

			$new_image = $_FILES['emp_image']['name'];
			$old_image = $_POST['emp_image_old'];

			if($new_image != '')
			{
				$update_filename = $_FILES['emp_image']['name'];
			}
			else
			{
				$update_filename = $old_image;
			}
				$query = "UPDATE employeetbl SET
					employeeID         = '$empID',  
					emp_firstname      = '$firstname', 
					emp_middlename     = '$middlename', 
					emp_lastname       = '$lastname',
					emp_positionTitle  = '$positionTitle', 
					emp_status         = '$status',  
					emp_dateHired      = '$dateHired',
					emp_department     = '$department', 
					emp_gender         = '$gender', 
					emp_address        = '$address', 
					emp_age            = '$age', 
					emp_birthdate      = '$birthdate', 
					emp_birthplace     = '$birthplace', 
					emp_contactno      = '$contactno', 
					emp_email          = '$email',
					emp_image          = '$update_filename'  

						   WHERE id = '$id' ";

					$query_run = mysqli_query($conn,$query);

				if($query_run)
				{
					if($_FILES['emp_image']['name'] !='')
					{
						move_uploaded_file($_FILES["emp_image"]["tmp_name"],"../public/uploads/employeeimage/".$_FILES["emp_image"]["name"]);
						unlink("../public/uploads/employeeimage/".$old_image);
					}
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
			                html:  'FAILED TO UPDATE',
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
			$emp_image = $_POST['del_req_module_file'];

			$query = "DELETE FROM reqmodules WHERE id = '$id'";
			$query_run = mysqli_query($conn, $query);

			if($query_run)
			{
				unlink("requestModules/".$emp_image);
				
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