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
	include "../../PHP/connection.php";

	//ADD QUERY
	if(isset($_POST['submit']))
	{	
		$q1 = $_POST['purpose'];
		$q2 = $_POST['title'];
		$q3 = $_POST['note'];
		$q4 = $_POST['status'];
		$q5 = $_POST['job_num'];
		$q6 = $_POST['req_date'];	

		$query = "INSERT INTO reqemployee
							( purpose,
								title,
								note,
								status,
								job_num, 
								req_date)

				VALUES ('$q1',
							  '$q2',
							  '$q3',
							  '$q4',
							  '$q5',
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

	//ADD QUERY
	if(isset($_POST['submitSubs']))
	{	
		$q1 = $_POST['purpose'];
		$q2 = $_POST['title'];
		$q3 = $_POST['subs'];
		$q4 = $_POST['note'];
		$q5 = $_POST['status'];
		$q6 = $_POST['req_date'];	

		$query = "INSERT INTO reqemployee
							( purpose,
								title,
								subs,
								note,
								status,
								req_date )

				VALUES ('$q1',
							  '$q2',
							  '$q3',
							  '$q4',
							  '$q5',
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
		if(isset($_POST['updateReq']))
		{	
			$id = $_POST['id'];
			$q1 = $_POST['purpose'];
			$q2 = $_POST['title'];
			$q3 = $_POST['req_date'];
			$q4 = $_POST['note'];
			$q5 = $_POST['job_num'];

				$query = "UPDATE reqemployee SET
					purpose  = '$q1',  
					title    = '$q2', 
					req_date = '$q3', 
					note     = '$q4',
					job_num  = '$q5'

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
		if(isset($_POST['updateSubs']))
		{	
			$id = $_POST['id'];

			$q1 = $_POST['purpose'];
			$q2 = $_POST['title'];
			$q3 = $_POST['subs'];
			$q4 = $_POST['req_date'];
			$q5 = $_POST['note'];

				$query = "UPDATE reqemployee SET
					purpose  = '$q1',  
					title    = '$q2', 
					subs 		 = '$q3',
					req_date = '$q4',
					note     = '$q5'

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
		if(isset($_POST['update']))
		{	
			$id = $_POST['id'];
			$q1 = $_POST['purpose'];
			$q2 = $_POST['title'];
			$q3 = $_POST['req_date'];
			$q4 = $_POST['status'];
			$q5 = $_POST['remarks'];
			$q6 = $_POST['note'];

				$query = "UPDATE reqemployee SET
					purpose  = '$q1',  
					title    = '$q2', 
					req_date = '$q3', 
					status   = '$q4',
					remarks  = '$q5',
					note     = '$q6'

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


		if(isset($_POST['updateSP']))
		{	
			$id = $_POST['id'];
			$q1 = $_POST['status'];
			$q2 = $_POST['remarks'];

				$query = "UPDATE reqemployee SET
					status  = '$q1',  
					remarks = '$q2' 

					WHERE id = '$id'";

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

			$query = "DELETE FROM reqemployee WHERE id = '$id'";
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