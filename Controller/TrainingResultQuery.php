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
		$g1 = $_POST['satisfaction'];
		$g2 = $_POST['application'];
		$g3 = $_POST['learning'];
		$g4 = $_POST['behavior'];
		$g5 = $_POST['accomplishment'];
		$r  = $_POST['remarks'];

		$query = "INSERT INTO trainingresult
			  ( nameemp,
                satisfaction,
				application,
				learning,
				behavior,
				accomplishment,
				remarks )

    	VALUES ('$q1',
        		'$g1',
    			'$g2',
    			'$g3',
    			'$g4',
    			'$g5',
    			'$r')";

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
		$g1 = $_POST['satisfaction'];
		$g2 = $_POST['application'];
		$g3 = $_POST['learning'];
		$g4 = $_POST['behavior'];
		$g5 = $_POST['accomplishment'];
		$r  = $_POST['remarks'];

        $query = "UPDATE trainingresult SET
        			nameemp        = '$q1',
					satisfaction   = '$g1',
					application    = '$g2',
					learning       = '$g3',
					behavior       = '$g4',
					accomplishment = '$g5',
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

			$query = "DELETE FROM trainingresult WHERE id = '$id'";
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