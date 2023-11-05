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

 require "../connection.php";
 
 if(isset($_POST['submit']))
	 {
	    $title      = $_POST['job_title'];
	    $available  = $_POST['job_available'];
	    $date   		= $_POST['job_date'];

		$query = "INSERT INTO jobvacancytbl( job_title,job_available,job_date )
	     													VALUES ('$title','$available',NOW())";


		$query_run = mysqli_query($conn,$query);

	        if($query)
	        {
			          echo"
			              <script>
			                  Swal.fire({
			                      icon: 'success',
			                      title: 'SUCCESS',
			                      html:  `TRANSACTION SUCCESSFULL`,
			                focusConfirm: false,
			                confirmButtonText:`OKAY`
			              }).then(function() {
								window.location=document.referrer;
			                      })
			                  </script>";
	        }

				else
				{
					 echo "<script>alert('TRANSACTION FAILED')</script>";
					 echo "<script>window.history.back();</script>";
				}
			}

  if(isset($_POST['update']))
	{
	  	$id         = $_POST['id'];
	    $title      = $_POST['job_title'];
	    $available  = $_POST['job_available'];
	    $date   		= $_POST['job_date'];

	  $query = mysqli_query($conn, "UPDATE jobvacancytbl SET 
	  		  job_title 		= '$title',
	  		  job_available = '$available',
	  		  job_date 			= '$date'

	          WHERE id = '$id'");

	         if($query)
	         {
			          echo"
			              <script>
			                  Swal.fire({
			                      icon: 'success',
			                      title: 'SUCCESS',
			                      html:  `UPDATED SUCCESSFULLY`,
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

			$query = "DELETE FROM jobvacancytbl WHERE id = '$id'";
			$query_run = mysqli_query($conn,$query);

			if($query_run)
			{
			          echo"
			              <script>
			                  Swal.fire({
			                      icon: 'success',
			                      title: 'SUCCESS',
			                      html:  `DELETED SUCCESSFULLY`,
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