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


<?php //UPDATE QUERY 

 require "../connection.php";

	if(isset($_POST['updateApproved']))
    {
    		$id = $_POST['id'];

			$stat  = $_POST['lv_status'];
			$rem   = $_POST['remarks'];

        $query = "UPDATE reqleave SET
	        lv_status  = '$stat',
	        remarks = '$rem'

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

							//DELETE QUERY
		if(isset($_POST['delete']))
		{
			$id = $_POST['delete_id'];

			$query = "DELETE FROM reqleave WHERE id = '$id'";
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
		}				?>