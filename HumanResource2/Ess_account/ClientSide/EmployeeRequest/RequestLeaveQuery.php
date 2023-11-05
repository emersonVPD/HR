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
    include "../../../../connection.php";

	//ADD QUERY
	if(isset($_POST['submit']))
	{
		$q1 = $_POST['username'];
		$q2 = $_POST['lv_leave'];
		$q3 = $_POST['lv_note'];
		$q4 = $_POST['lv_datefrom'];
		$q5 = $_POST['lv_dateto'];
		$q6 = $_POST['lv_status'];
		$q7 = $_POST['emp'];
		$q8 = $_POST['name'];

		$files 		       = $_FILES['proof_file']['name'];
		$allowed_extension = array('pdf','png','jpeg','jpg','docx','doc');
		$filename          = $_FILES['proof_file']['name'];
		$file_extension    = pathinfo($filename, PATHINFO_EXTENSION);

			if(!in_array($file_extension,$allowed_extension))
			{

				echo"
					<script>
					    Swal.fire({
					    icon: 'error',
					    title: 'ERROR',
					    html:  'PNG, JPG, JPEG<br>PDF, DOCX - ONLY ALLOWED FORMAT',
							focusConfirm: false,
							confirmButtonText:`OKAY`
						}).then(function() {
                    		window.history.back();
					    })
					</script>";	
			}

				else
				{

				if(file_exists("../../../../public/uploads/proofLeave/" . $_FILES['proof_file']['name']))
				{
					echo"
						<script>
						    Swal.fire({
						    icon: 'error',
						    title: 'ERROR',
						    html:  'FILES ALREADY EXISTS',
								focusConfirm: false,
								confirmButtonText:`OKAY`
							}).then(function() {
	                    		window.history.back();
						    })
						</script>";	
				}

		else
		{
		$query = "INSERT INTO reqleave
					 ( username,
					 	 lv_leave,
					 	 lv_note,
					 	 lv_datefrom,
						 lv_dateto,
						 lv_status,
						 emp,name, 
						 proof_file )
					 VALUES
					 ( '$q1',
					 	 '$q2',
					 	 '$q3',
					 	 '$q4',
						 '$q5',
						 '$q6',
						 '$q7',
						 '$q8',
						 '$files')";

		$query_run = mysqli_query($conn,$query);

				if($query_run)
				{
					move_uploaded_file($_FILES["proof_file"]["tmp_name"],"../../../../public/uploads/proofLeave/".$_FILES["proof_file"]["name"]);

					echo"
					    <script>
					        Swal.fire({
					            icon: 'success',
					            title: 'SUCCESS',
					            html:  'SUCCESSFULLY REQUESTED',
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
					               	html:  `FAILED TO INSERT,
									   focusConfirm: false,
									   confirmButtonText:`OKAY`
									 }).then(function() {
                    					window.history.back();
					            })
					        </script>";
				}
			}
		}
	}	


		//UPDATE QUERY 
	if(isset($_POST['updateReq']))
    {
    $id      = $_POST['id'];
				$q1 = $_POST['lv_leave'];
				$q2 = $_POST['lv_note'];
				$q3 = $_POST['lv_datefrom'];
				$q4 = $_POST['lv_dateto'];

      $imageName = $_FILES["proof_file"]["name"];
      $imageSize = $_FILES["proof_file"]["size"];
      $tmpName = $_FILES["proof_file"]["tmp_name"];

			$old_image = $_POST['proof_file_old'];

			if ($imageName != '') { $imageName = $_FILES['proof_file']['name']; }
			else { $imageName = $old_image; }

      // Image validation
      $validImageExtension = ['pdf','jpeg','jpg','png','docx','doc'];
      $imageExtension = explode('.', $imageName);
      $imageExtension = strtolower(end($imageExtension));

      if (!in_array($imageExtension, $validImageExtension))
      {
				echo"
					<script>
					    Swal.fire({
					    icon: 'error',
					    title: 'ERROR',
					    html:  'PNG, JPG, JPEG<br>PDF, DOCX - ONLY ALLOWED FORMAT',
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

      else
      {
        $newImageName = $imageName; // Generate new image name;

        $query = "UPDATE reqleave SET
					lv_leave    = '$q1', 
					lv_note     = '$q2',
					lv_datefrom = '$q3', 
					lv_dateto   = '$q4', 
					proof_file  = '$newImageName'  

						   WHERE id = '$id' ";

        mysqli_query($conn, $query);
        move_uploaded_file($tmpName, 'proofLeave/' . $newImageName);
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
    }

?>