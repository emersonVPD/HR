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
		$title 		= $_POST['exam_title'];
		$links 		= $_POST['exam_links'];
		$datecrtd = $_POST['exam_datecrtd'];

		$query = "INSERT INTO exam_modulestbl(
			exam_title, exam_links, exam_datecrtd)
				
		VALUES ( '$title','$links',NOW())";

		$query_run = mysqli_query($conn,$query);

				if($query_run)
				{
		          echo"
		              <script>
		                  Swal.fire({
		                      icon: 'success',
		                      title: 'SUCCESS',
		                      html:  `SUCCESSFULLY INSERTED EXAM MODULES`,
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
						    html:  'FAILED TO INSERT EXAM MODULES',
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
			$id 	 	  = $_POST['id'];	
			$title 		= $_POST['exam_title'];
			$datecrtd = $_POST['exam_datecrtd'];
			$links	  = $_POST['exam_links'];


				$query = "UPDATE exam_modulestbl SET
					exam_title    = '$title',  
					exam_datecrtd = '$datecrtd', 
					exam_links    = '$links'  

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

			$query = "DELETE FROM exam_modulestbl WHERE id = '$id'";
			$query_run = mysqli_query($conn, $query);

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