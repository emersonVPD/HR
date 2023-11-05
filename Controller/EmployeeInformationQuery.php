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
	if(isset($_POST['submit']))
	{	
		$q1            = $_POST['daily_rate'];
		$emp_id        = $_POST['employeeID'];
		$firstname     = $_POST['emp_firstname'];
		$middlename    = $_POST['emp_middlename'];
		$lastname      = $_POST['emp_lastname'];
		$positionTitle = $_POST['emp_positionTitle'];
		$status        = $_POST['emp_status'];
		$dateHired     = $_POST['emp_dateHired'];
		$department    = $_POST['emp_department'];
		$gender 	   = $_POST['emp_gender'];
		$address       = $_POST['emp_address'];
		$age           = $_POST['emp_age'];
		$birthdate     = $_POST['emp_birthdate'];
		$birthplace    = $_POST['emp_birthplace'];
		$contactno     = $_POST['emp_contactno'];	
		$email         = $_POST['emp_email'];	

		$image 		   = $_FILES['emp_image']['name'];

		$allowed_extension = array('png','jpeg','jpg');
		$filename = $_FILES['emp_image']['name'];
		$file_extension = pathinfo($filename, PATHINFO_EXTENSION); 

		if(!in_array($file_extension,$allowed_extension))
		{
			echo"
			    <script>
				    Swal.fire({
				    icon: 'error',
				    title: 'ERROR',
				    html:  'JPEG, JPG and PNG - IMAGE FORMAT ONLY ALLOWED',
				    focusConfirm: false,
				    confirmButtonText:`OKAY`
				     	}).then(function() {                
				            window.history.back();
				        })
			    </script>";
			}

			else
				{

			if(file_exists("../public/uploads/employeeimage/" . $_FILES['emp_image']['name']))
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
		$query = "INSERT INTO employeetbl(
			daily_rate,
			employeeID,
			emp_firstname,
			emp_middlename,
			emp_lastname,
			emp_positionTitle,
			emp_status,
			emp_dateHired,
			emp_department,
			emp_gender,
			emp_address,
			emp_age,
			emp_birthdate,
			emp_birthplace,
			emp_contactno,
			emp_email,
			emp_image)

				VALUES ('$q1',
						'$emp_id',
						'$firstname',
						'$middlename',
						'$lastname',
						'$positionTitle',
						'$status',
						'$dateHired',
						'$department',
						'$gender',
						'$address',
						'$age',
						'$birthdate',
						'$birthplace',
						'$contactno',
						'$email',
						'$image')";

		$query_run = mysqli_query($conn,$query);

				if($query_run)
				{
					move_uploaded_file($_FILES["emp_image"]["tmp_name"],"../public/uploads/employeeimage/".$_FILES["emp_image"]["name"]);

			          echo"
			              <script>
			                  Swal.fire({
			                      icon: 'success',
			                      title: 'SUCCESS',
			                      html:  `SUCCESSFULLY INSERTED EMPLOYEE INFORMATION`,
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
	}

		//UPDATE QUERY 
		if(isset($_POST['update']))
		{	
			$id 	 	   = $_POST['id'];
			$empID   	   = $_POST['employeeID'];
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

		//UPDATE QUERY 
		if(isset($_POST['promote']))
		{	
			$id = $_POST['id'];
			$q1 = $_POST['emp_sub'];

				$query = "UPDATE employeetbl SET
					emp_sub = '$q1' WHERE id = '$id' ";

					$query_run = mysqli_query($conn,$query);

				if($query_run)
				{
					 echo"
			              <script>
			                  Swal.fire({
			                      icon: 'success',
			                      title: 'SUCCESS',
			                      html:  `SUCCESSFULLY PROMOTED / UPDATED`,
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
			$emp_image = $_POST['del_emp_img'];

			$query = "DELETE FROM employeetbl WHERE id = '$id'";
			$query_run = mysqli_query($conn,$query);

			if($query_run)
			{
				unlink("../public/uploads/employeeimage/".$emp_image);
				
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