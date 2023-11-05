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
      	$q1 = $_POST['nameemp'];
		$e1 = $_POST['behavior'];
		$e2 = $_POST['tna'];
		$e3 = $_POST['quality'];
		$e4 = $_POST['responsibility'];
		$e5 = $_POST['dependability'];
		$r  = $_POST['remarks'];

		$query = "INSERT INTO evaluationemp
			( nameemp,
              behavior,
              tna,
              quality,
              responsibility,
              dependability,
              remarks )

    	VALUES ('$q1','$e1','$e2','$e3','$e4','$e5','$r')";

		$query_run = mysqli_query($conn,$query);

				if($query_run)
				{
					echo"
					    <script>
					        Swal.fire({
					            icon: 'success',
					            title: 'SUCCESS',
					            html:  `SUCCESSFULLY INSERTED`,
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
		

		//UPDATE QUERY 
	if(isset($_POST['update']))
    {
	  $id = $_POST['id'];
      	$q1 = $_POST['nameemp'];
		$e1 = $_POST['behavior'];
		$e2 = $_POST['tna'];
		$e3 = $_POST['quality'];
		$e4 = $_POST['responsibility'];
		$e5 = $_POST['dependability'];
		$r  = $_POST['remarks'];

        $query = "UPDATE evaluationemp SET
        			nameemp        = '$q1',
					behavior       = '$e1',
					tna            = '$e2',
					quality        = '$e3',
					responsibility = '$e4',
					dependability  = '$e5',
					remarks        = '$r'  

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

			$query = "DELETE FROM evaluationemp WHERE id = '$id'";
			$query_run = mysqli_query($conn, $query);

		$query_run = mysqli_query($conn,$query);

				if($query_run)
				{
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