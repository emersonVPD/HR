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
	if(isset($_POST['submit'])) {
		$title = $_POST['train_title'];
		$datecrtd = $_POST['train_datecrtd'];
	
		// Check if a file was uploaded
		if(isset($_FILES['train_files'])) {
			$originalFileName = $_FILES['train_files']['name'];
			$file_extension = strtolower(pathinfo($originalFileName, PATHINFO_EXTENSION));
	
			// Define allowed file extensions (in lowercase)
			$allowed_extensions = array('pdf');
	
			if(in_array($file_extension, $allowed_extensions)) {
				// Generate a unique filename using a timestamp
				$timestamp = date("YmdHis");
				$files = $timestamp . '.' . $file_extension;
	
				// Check if the file already exists
				if(!file_exists("../public/uploads/trainingmodules/" . $files)) {
					$query = "INSERT INTO trainingmodulestbl (train_title, train_datecrtd, train_files)
							  VALUES ('$title', '$datecrtd', '$files')";
					$query_run = mysqli_query($conn, $query);
	
					if($query_run) {
						// Move the uploaded file with the unique filename to the destination folder
						move_uploaded_file($_FILES["train_files"]["tmp_name"], "../public/uploads/trainingmodules/" . $files);
	
						echo "
							<script>
								Swal.fire({
									icon: 'success',
									title: 'SUCCESS',
									html: 'SUCCESSFULLY INSERTED TRAINING MODULES FILES',
									focusConfirm: false,
									confirmButtonText: 'OKAY'
								}).then(function() {
									window.location = document.referrer;
								});
							</script>";
					} else {
						echo "
							<script>
								Swal.fire({
									icon: 'error',
									title: 'ERROR',
									html: 'TRAINING MODULES NOT INSERTED',
									focusConfirm: false,
									confirmButtonText: 'OKAY'
								}).then(function() {
									window.history.back();
								});
							</script>";
					}
				} else {
					echo "
						<script>
							Swal.fire({
								icon: 'error',
								title: 'ERROR',
								html: 'FILE ALREADY EXISTS',
								focusConfirm: false,
								confirmButtonText: 'OKAY'
							}).then(function() {
								window.history.back();
							});
						</script>";
				}
			} else {
				echo "
					<script>
						Swal.fire({
							icon: 'error',
							title: 'ERROR',
							html: 'PDF FILES ONLY ALLOWED FORMAT',
							focusConfirm: false,
							confirmButtonText: 'OKAY'
						}).then(function() {
							window.history.back();
						});
					</script>";
			}
		} else {
			// Handle the case when no file is uploaded
			echo "
				<script>
					Swal.fire({
						icon: 'error',
						title: 'ERROR',
						html: 'No file uploaded',
						focusConfirm: false,
						confirmButtonText: 'OKAY'
					}).then(function() {
						window.history.back();
					});
				</script>";
		}
	}
	

		//UPDATE QUERY 
		if(isset($_POST['update']))
		{
			$id 	 	  = $_POST['id'];	
			$title 		= $_POST['train_title'];
			$datecrtd = $_POST['train_datecrtd'];

			$new_image = $_FILES['train_files']['name'];
			$old_image = $_POST['train_files_old'];

			if($new_image != '')
			{
				$update_filename = $_FILES['train_files']['name'];
			}
			else
			{
				$update_filename = $old_image;
			}

				$query = "UPDATE trainingmodulestbl SET
					train_title      = '$title',  
					train_datecrtd   = '$datecrtd', 
					train_files      = '$update_filename'  

						   WHERE id = '$id' ";

					$query_run = mysqli_query($conn,$query);

				if($query_run)
				{
					if($_FILES['train_files']['name'] !='')
					{
						move_uploaded_file($_FILES["train_files"]["tmp_name"],"../public/uploads/trainingmodules/".$_FILES["train_files"]["name"]);
						unlink("../public/uploads/trainingmodules/".$old_image);
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
		if(isset($_POST['delete'])){
		
			$id = $_POST['delete_id'];
			$train_files = $_POST['del_train_files'];

			$query = "DELETE FROM trainingmodulestbl WHERE id = '$id'";
			$query_run = mysqli_query($conn, $query);

			if($query_run){
				unlink("../public/uploads/trainingmodules/".$train_files);

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