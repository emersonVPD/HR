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
		$q1 = $_POST['type'];
		$q2 = $_POST['name'];
		$q3 = $_POST['note'];
		$q4 = $_POST['status'];
		$q5 = $_POST['req_date'];	

		$query = "INSERT INTO reqincentives
							( type,
								name,
								note,
								status,
								req_date )

				VALUES ('$q1',
							  '$q2',
							  '$q3',
							  '$q4',
							  NOW())";

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
					    html:  'REQUEST FAILED',
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
			$id = $_POST['id'];

			$q1 = $_POST['type'];
			$q2 = $_POST['name'];
			$q3 = $_POST['note'];
			$q4 = $_POST['req_date'];	

				$query = "UPDATE reqincentives SET
					type     = '$q1',  
					name     = '$q2', 
					note     = '$q3', 
					req_date = '$q4'

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

		//UPDATE QUERY 
		if(isset($_POST['update2']))
		{	
			$id = $_POST['id'];

			$q1 = $_POST['type'];
			$q2 = $_POST['name'];
			$q3 = $_POST['note'];
			$q4 = $_POST['status'];
			$q5 = $_POST['req_date'];	
			$q6 = $_POST['remarks'];	

				$query = "UPDATE reqincentives SET
					type     = '$q1',  
					name     = '$q2', 
					note     = '$q3', 
					status   = '$q4',
					req_date = '$q5',
					remarks  = '$q6'

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
		
		//UPDATE QUERY 
		if(isset($_POST['updateReq']))
		{	
			$id = $_POST['id'];
			$q1 = $_POST['status'];
			$q2 = $_POST['remarks'];

				$query = "UPDATE reqincentives SET
					status   = '$q1',
					remarks  = '$q2'

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
		if(isset($_POST['delete']))
		{
			$id = $_POST['delete_id'];

			$query = "DELETE FROM reqincentives WHERE id = '$id'";
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