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

	if (isset($_POST['submit'])) {

		$q1 = $_POST['applicantID'];
		$q2 = $_POST['app_status'];
		$q3 = $_POST['daily_rate'];
		$firstname = $_POST['app_firstname'];
		$middlename = $_POST['app_middlename'];
		$lastname = $_POST['app_lastname'];
		$age = $_POST['app_age'];
		$gender = $_POST['app_gender'];
		$address = $_POST['app_address'];
		$birthdate = $_POST['app_birthdate'];
		$birthplace = $_POST['app_birthplace'];
		$positionTitle = $_POST['app_positionTitle'];
		$email = $_POST['app_email'];
		$contactno = $_POST['app_contactno'];
	
		// Get the file extension
		$allowed_extension = array('docx', 'pdf');
		$filename = $_FILES['app_files']['name'];
		$file_extension = pathinfo($filename, PATHINFO_EXTENSION);
	
		if (!in_array($file_extension, $allowed_extension)) {
			echo "
				<script>
					Swal.fire({
						icon: 'error',
						title: 'ERROR',
						html: 'DOCX and PDF - FILE FORMAT ONLY ALLOWED',
						focusConfirm: false,
						confirmButtonText: `OKAY`
					}).then(function() {
						window.history.back();
					})
				</script>";
		} else {
			$target_directory = "../public/uploads/applicantfiles/"; // Specify your target directory
			$current_date = date('Y-m-d');
			$new_filename = $current_date . '_' . $filename;
	
			if (file_exists($target_directory . $new_filename)) {
				echo "
					<script>
						Swal.fire({
							icon: 'error',
							title: 'ERROR',
							html: 'FILE ALREADY EXISTS - TRY TO CHANGE NAME OF FILE',
							focusConfirm: false,
							confirmButtonText: `OKAY`
						}).then(function() {
							window.history.back();
						})
					</script>";
			} else {
				$query = "INSERT INTO applicanttbl (
					applicantID,
					app_status,
					daily_rate,
					app_firstname, 
					app_middlename,
					app_lastname,
					app_age,
					app_gender,
					app_address,
					app_birthdate,
					app_birthplace,
					app_positionTitle,
					app_email,
					app_contactno,
					app_files,
					app_applydate
				) VALUES (
					'$q1','$q2','$q3',
					'$firstname', '$middlename', '$lastname',
					'$age', '$gender', '$address',
					'$birthdate', '$birthplace', '$positionTitle',
					'$email', '$contactno', '$new_filename', NOW()
				)";
	
				$query_run = mysqli_query($conn, $query);
	
				if ($query_run) {
					move_uploaded_file($_FILES["app_files"]["tmp_name"], $target_directory . $new_filename);
	
					echo "
						<script>
							Swal.fire({
								icon: 'success',
								title: 'SUCCESS',
								html: `APPLICATION SUCCESSFULL KINDLY WAIT FOR TEXT MESSAGE OR EMAIL OF INTERVIEW AND EXAMINATION`,
								focusConfirm: false,
								confirmButtonText: `OKAY`
							}).then(function() {
								window.history.back();
							})
						</script>";
				} else {
					echo "
						<script>
							Swal.fire({
								icon: 'error',
								title: 'ERROR',
								html: 'INFORMATION NOT INSERTED',
								focusConfirm: false,
								confirmButtonText: `OKAY`
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
			$appID   	   = $_POST['applicantID'];
			$firstname     = $_POST['app_firstname'];
			$middlename    = $_POST['app_middlename'];
			$lastname      = $_POST['app_lastname'];
			$status        = $_POST['app_status'];
			$age           = $_POST['app_age'];
			$gender        = $_POST['app_gender'];
			$address       = $_POST['app_address'];
			$birthdate 	   = $_POST['app_birthdate'];
			$birthplace    = $_POST['app_birthplace'];
			$positionTitle = $_POST['app_positionTitle'];
			$email         = $_POST['app_email'];
			$contactno     = $_POST['app_contactno'];
			$applydate		 = $_POST['app_applydate'];

			$new_image = $_FILES['app_files']['name'];
			$old_image = $_POST['app_files_old'];

			if($new_image != '')
			{
				$update_filename = $_FILES['app_files']['name'];
			}
			else
			{
				$update_filename = $old_image;
			}

				$query = "UPDATE applicanttbl SET
					applicantID        = '$appID',  
					app_firstname      = '$firstname', 
					app_middlename     = '$middlename', 
					app_lastname       = '$lastname',
					app_status         = '$status',  
					app_age            = '$age', 
					app_gender         = '$gender', 
					app_address        = '$address', 
					app_birthdate      = '$birthdate', 
					app_birthplace     = '$birthplace', 
					app_positionTitle  = '$positionTitle', 
					app_email          = '$email',
					app_contactno      = '$contactno',
					app_applydate      = '$applydate',
					app_files          = '$update_filename'  

						   WHERE id = '$id' ";

					$query_run = mysqli_query($conn,$query);

				if($query_run)
				{
					if($_FILES['app_files']['name'] !='')
					{
						move_uploaded_file($_FILES["app_files"]["tmp_name"],"../public/uploads/applicantfiles/".$_FILES["app_files"]["name"]);
						unlink("applicantfiles/".$old_image);
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

		//DELET QUERY
		if(isset($_POST['delete'])){
		
			$id = $_POST['delete_id'];
			$app_files = $_POST['del_app_files'];

			$query = "DELETE FROM applicanttbl WHERE id = '$id'";
			$query_run = mysqli_query($conn,$query);

			if($query_run){
				unlink("../public/uploads/applicantfiles/".$app_files);

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

			else{
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
