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
				$q1 = $_POST['username'];
				$q2 = $_POST['employeeID'];
				$qq = $_POST['fullname'];
				$q3 = $_POST['day1'];
				$q4 = $_POST['day2'];
				$q5 = $_POST['day3'];
				$q6 = $_POST['day4'];
				$q7 = $_POST['day5'];
				$q8 = $_POST['dayoff1'];
				$q9 = $_POST['dayoff2'];
				$q10 = $_POST['shift'];

				$query = "INSERT INTO shiftandschedule

				   ( username,
				     employeeID, 
					 fullname, 
				   	 day1, 
				   	 day2,
				   	 day3, 
				   	 day4, 
				   	 day5, 
				   	 dayoff1, 
				   	 dayoff2, 
				   	 shift )

				 VALUES
				   ( '$q1',
				     '$q2',
				     '$qq',
				   	 '$q3',
				   	 '$q4',
					 '$q5',
					 '$q6',
					 '$q7',
					 '$q8',
					 '$q9',
					 '$q10')";

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
				               	html:  `REQUEST FAILED',
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

			$query = "DELETE FROM shiftandschedule WHERE id = '$id'";
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


				//UPDATE QUERY 
			if(isset($_POST['updateReq']))
		    {
    			$id = $_POST['id'];
				$q1 = $_POST['type'];
				$q2 = $_POST['note'];;

       			 $query = "UPDATE reqdocument SET
		           type = '$q1',
		           note = '$q2'
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

		//UPDATE QUERY 
	if(isset($_POST['updateLOG2']))
    {
    		$id = $_POST['id'];
			$q1 = $_POST['status'];

        	$query = "UPDATE reqdocument SET
	        status = '$q1' WHERE id = '$id' ";

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
		               	html:  `FAILED TO REQUEST',
						   focusConfirm: false,
						   confirmButtonText:`OKAY`
						 }).then(function() {
        					window.history.back();
		            })
		        </script>";
			}
	}

	if(isset($_POST['update']))
    {
    		$id = $_POST['id'];

			$q1 = $_POST['day1'];
			$q2 = $_POST['day2'];
			$q3 = $_POST['day3'];
			$q4 = $_POST['day4'];
			$q5 = $_POST['day5'];
			$q6 = $_POST['dayoff1'];
			$q7 = $_POST['dayoff2'];
			$q8 = $_POST['shift'];
			$q9 = $_POST['remarks'];
			
        	$query = "UPDATE shiftandschedule SET
	        		day1 = '$q1',
					day2 = '$q2',
					day3 = '$q3',
					day4 = '$q4',
					day5 = '$q5',
				 dayoff1 = '$q6',
				 dayoff2 = '$q7',
				   shift = '$q8',
				 remarks = '$q9'

			WHERE id = '$id' ";

			$query_run = mysqli_query($conn,$query);
			
			if($query_run)
			{
				echo"
				    <script>
				        Swal.fire({
				            icon: 'success',
				            title: 'SUCCESS',
				            html:  `SUCCESSFULLY UPDATE`,
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
		               	html:  `FAILED TO REQUEST',
						   focusConfirm: false,
						   confirmButtonText:`OKAY`
						 }).then(function() {
        					window.history.back();
		            })
		        </script>";
			}
	}

	if(isset($_POST['updateHR1']))
    {

      $id      = $_POST['id'];
	  $remarks = $_POST['remarks'];
	  $status  = $_POST['status'];

      $imageName = $_FILES["docs_file"]["name"];
      $imageSize = $_FILES["docs_file"]["size"];
      $tmpName = $_FILES["docs_file"]["tmp_name"];

			$old_image = $_POST['docs_file_old'];

			if ($imageName != '') { $imageName = $_FILES['docs_file']['name']; }
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
					    html:  'PDF - FILE FORMAT ONLY ALLOWED',
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

        $query = "UPDATE reqdocument SET
					remarks    = '$remarks', 
					status     = '$status',
					docs_file  = '$newImageName'  

						   WHERE id = '$id' ";

        mysqli_query($conn, $query);
        move_uploaded_file($tmpName, '../public/uploads/reqDocument/' . $newImageName);
			          echo"
			              <script>
			                  Swal.fire({
			                      icon: 'success',
			                      title: 'SUCCESS',
			                      html:  `SUCCESSFULLY DELIVERED DOCUMENT COPY`,
			                focusConfirm: false,
			                confirmButtonText:`OKAY`
			              }).then(function() {
					window.location=document.referrer;
			                      })
			                  </script>";
      }
    }



?>