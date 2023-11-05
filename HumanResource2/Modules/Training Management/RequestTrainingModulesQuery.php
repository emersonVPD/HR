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
	include "../../../connection.php";

	//ADD QUERY
	if(isset($_POST['submit']))
	{
		$title   = $_POST['req_module_title'];
		$purpose = $_POST['req_module_purpose'];
		$date    = $_POST['req_module_date'];


		$query = "INSERT INTO reqmodules
			( req_module_title,
				req_module_purpose,
				req_module_date )
    	VALUES ('$title',
    		      '$purpose',NOW())";

		$query_run = mysqli_query($conn,$query);

				if($query_run)
				{
					echo"
					    <script>
					        Swal.fire({
					            icon: 'success',
					            title: 'SUCCESS',
					            html:  `TRANSACTION SUCCESSFUL`,
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
		
	//ADD QUERY
	if(isset($_POST['submitddd']))
	{
		$title  = $_POST['req_module_title'];
		$status = $_POST['req_module_status'];
		$date   = $_POST['req_module_date'];

		$query = "INSERT INTO reqmodules(
			req_train_title, 
			req_train_status,
			req_train_date)

				VALUES ('$title',
								'$status',
								 NOW())";

		$query_run = mysqli_query($conn, $query);

				if($query_run)
				{
					echo"
					    <script>
					        Swal.fire({
					            icon: 'success',
					            title: 'SUCCESS',
					            html:  `SUCCESSFULLY REQUEST TRAINING MODULES`,
								focusConfirm: false,
								confirmButtonText:`OKAY`
							}).then(function() {
                    			window.location.href = 'RequestTrainingModules.php';
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
					               	html:  `FAILED TO INSERT,
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
	  $id      = $_POST['id'];
	  $status  = $_POST['req_module_status'];
	  $remarks = $_POST['req_module_remarks'];

      $imageName = $_FILES["req_module_file"]["name"];
      $imageSize = $_FILES["req_module_file"]["size"];
      $tmpName   = $_FILES["req_module_file"]["tmp_name"];

	    $old_image = $_POST['req_module_file_old'];

			if ($imageName != '') { $imageName = $_FILES['req_module_file']['name']; }
				else { $imageName = $old_image; }

      // Image validation
      $validImageExtension = ['pdf'];
      $imageExtension = explode('.', $imageName);
      $imageExtension = strtolower(end($imageExtension));

      if (!in_array($imageExtension, $validImageExtension))
      {
				echo"
					<script>
					    Swal.fire({
					    icon: 'error',
					    title: 'ERROR',
					    html:  'PDF FILE FORMAT ONLY ALLOWED',
							focusConfirm: false,
							confirmButtonText:`OKAY`
						}).then(function() {
			                window.history.back();
					    })
					</script>";	
      }

      elseif ($imageSize > 3145728){
				echo"
					<script>
					    Swal.fire({
					    icon: 'error',
					    title: 'ERROR',
					    html:  'FILES TOO LARGE',
							focusConfirm: false,
							confirmButtonText:`OKAY`
						}).then(function() {
			                window.history.back();
					    })
					</script>";	
      }

      else{
        $newImageName = $imageName; // Generate new image name;

        $query = "UPDATE reqmodules SET
					req_module_status  = '$status', 
					req_module_remarks = '$remarks',  
					req_module_file    = '$newImageName'  

						   WHERE id = '$id' ";

        mysqli_query($conn, $query);
        move_uploaded_file($tmpName, 'reqTrainingmodules/' . $newImageName);
			          echo"
			              <script>
			                  Swal.fire({
			                      icon: 'success',
			                      title: 'SUCCESS',
			                      html:  `SUCCESSFULLY REQUEST LEGAL DOCUMENTS`,
			                focusConfirm: false,
			                confirmButtonText:`OKAY`
			              }).then(function() {
			                window.location.href = 'RequestTrainingModules.php';
			                      })
			                  </script>";
      }
    }

		//UPDATE QUERY 
	if(isset($_POST['updateRequest']))
    {
	  $id      = $_POST['id'];
	  $title   = $_POST['req_module_title'];

				$query = "UPDATE reqmodules SET
					req_module_title  = '$title' WHERE id = '$id' ";

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
			$legal_file = $_POST['del_legal_file'];

			$query = "DELETE FROM legaldocumentstbl WHERE id = '$id'";
			$query_run = mysqli_query($conn, $query);

			if($query_run){
				unlink("legaldocufiles/".$legal_file);
				echo "<script>alert('DELETE SUCCESSFULLY')</script>";
			    echo "<script>document.location='Legaldocuments.php';</script>";

			}
			else{
				echo "<script>alert('DATA NOT DELETED')</script>";
				echo "<script>window.history.back();</script>";
			} 
		}
?>