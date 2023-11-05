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
		$q1		       = $_POST['comp_status'];
		$name 		   = $_POST['comp_name'];
		$datecreated   = $_POST['comp_datecreated'];
		$files 		   = $_FILES['comp_sandq_files']['name'];

		$allowed_extension = array('pdf');
		$filename = $_FILES['comp_sandq_files']['name'];
		$file_extension = pathinfo($filename, PATHINFO_EXTENSION);

			if(!in_array($file_extension,$allowed_extension))
			{

				echo"
					<script>
					    Swal.fire({
					    icon: 'error',
					    title: 'ERROR',
					    html:  'PDF FILES - ONLY ALLOWED FORMAT',
							focusConfirm: false,
							confirmButtonText:`OKAY`
						}).then(function() {
                    		window.history.back();
					    })
					</script>";	
			}

				else
				{

				if(file_exists("../public/uploads/sandqfiles/" . $_FILES['comp_sandq_files']['name']))
				{
					echo"
						<script>
						    Swal.fire({
						    icon: 'error',
						    title: 'ERROR',
						    html:  'FILES ALREADY EXISTS',
								focusConfirm: false,
								confirmButtonText:'OKAY'
							}).then(function() {
	                    		window.history.back();
						    })
						</script>";	
				}

		else
		{
		$query = "INSERT INTO competencytbl(
        	comp_status,
			comp_name,
			comp_datecreated,
			comp_sandq_files )
				VALUES ('$q1',
                		'$name',
						'$datecreated',
						'$files')";
	
		$query_run = mysqli_query($conn,$query);
			
         
        
				if($query_run)
				{
					move_uploaded_file($_FILES["comp_sandq_files"]["tmp_name"],"../public/uploads/sandqfiles/".$_FILES["comp_sandq_files"]["name"]);

					echo"
					    <script>
					        Swal.fire({
					            icon: 'success',
					            title: 'SUCCESS',
					            html:  `SUCCESSFULLY INSERTED COMPETENCY DETAILS / FILES`,
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
					               	html:  'FAILED TO INSERT',
									   focusConfirm: false,
									   confirmButtonText:'OKAY'
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
			$name 		   = $_POST['comp_name'];
			$datecreated   = $_POST['comp_datecreated'];

			$new_image = $_FILES['comp_sandq_files']['name'];
			$old_image = $_POST['comp_sandq_files_old'];

			if($new_image != '')
			{
				$update_filename = $_FILES['comp_sandq_files']['name'];
			}
			else
			{
				$update_filename = $old_image;
			}

				$query = "UPDATE competencytbl SET
					comp_name        = '$name',  
					comp_datecreated = '$datecreated', 
					comp_sandq_files = '$update_filename'  

						   WHERE id = '$id' ";

					$query_run = mysqli_query($conn,$query);

				if($query_run)
				{
					if($_FILES['comp_sandq_files']['name'] !='')
					{
						move_uploaded_file($_FILES["comp_sandq_files"]["tmp_name"],"../public/uploads/sandqfiles/".$_FILES["comp_sandq_files"]["name"]);
						unlink("../public/uploads/sandqfiles/".$old_image);
					}
						echo"
					        <script>
					            Swal.fire({
					                icon: 'success',
					                title: 'SUCCESS',
					               	html:  `SUCCESSFULLY UPDATED SKILLS AND QUALIFICATIONS DETAILS / FILE`,
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
					               	html:  `FAILED TO UPDATE SKILLS AND QUALIFICATIONS DETAILS / FILE`,
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
			$comp_sandq_files = $_POST['del_comp_sandq_files'];

			$query = "DELETE FROM competencytbl WHERE id = '$id'";
			$query_run = mysqli_query($conn,$query);

			if($query_run){
				unlink("../public/uploads/sandqfiles/".$comp_sandq_files);

						echo"
					        <script>
					            Swal.fire({
					                icon: 'success',
					                title: 'SUCCESS',
					               	html:  `SUCCESSFULLY DELETED`,
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
					               	html:  `FAILED TO DELETE`,
									   focusConfirm: false,
									   confirmButtonText:`OKAY`
									 }).then(function() {
                    					window.history.back();
					            })
					        </script>";
			} 
		}

		//UPDATE QUERY 
		if(isset($_POST['updateHR2']))
		{
			$id 	 	 = $_POST['id'];	
			$status  = $_POST['comp_status'];
			$remarks = $_POST['comp_remarks'];

				$query = "UPDATE competencytbl SET
					comp_status  = '$status',  
					comp_remarks = '$remarks'  

						   WHERE id = '$id' ";

					$query_run = mysqli_query($conn,$query);

				if($query_run)
				{
						echo"
					        <script>
					            Swal.fire({
					                icon: 'success',
					                title: 'SUCCESS',
					               	html:  `SUCCESSFULLY UPDATED SKILLS AND QUALIFICATIONS DETAILS / FILE`,
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
					               	html:  `FAILED TO UPDATE SKILLS AND QUALIFICATIONS DETAILS / FILE`,
									   focusConfirm: false,
									   confirmButtonText:`OKAY`
									 }).then(function() {
                    					window.history.back();
					            })
					        </script>";
				}		
		}

?>