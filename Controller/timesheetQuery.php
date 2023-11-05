<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- SWEET ALERT 2 JAVASCRIPT DIRECTORY -->
  <script src="../../../assets/js/sweetalert2.min.js"></script> 
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>
</html>

<?php	
	//UPDATE QUERY 
  include "../connection.php";


  if(isset($_POST['submit']))
  {
	// var_dump($_POST);

	$q1 = $_POST['username'];
	$q2 = $_POST['name'];
    $q3 = $_POST['employeeID'];
    $q4 = $_POST['timesheet_date'];
    $q5 = $_POST['date_submit'];
    $q6 = $_POST['shift'];
    $q7 = $_POST['first'];
    $q8 = $_POST['second'];
    $q9 = $_POST['third'];
    $q10 = $_POST['fourth'];
    $q11 = $_POST['fifth'];
    $q12 = $_POST['sixth'];
    $q13 = $_POST['seven'];
    $q14 = $_POST['eigth'];
    $q15 = $_POST['sp1'];
    $q16 = $_POST['sp2'];
    $q17 = $_POST['sp3'];

	  $sql = mysqli_query($conn,"INSERT INTO timesheet
	  (  username, 
         name, 
		 employeeID, 
		 timesheet_date, 
		 date_submit, 
		 shift,
		 first, 
		 second, 
		 third, 
		 fourth,
         fifth,
         sixth,
         seven,
         eigth,
         sp1,
         sp2,
         sp3) 
		
		VALUES ( '$q1','$q2','$q3',
				 '$q4', NOW(),'$q6',
				 '$q7','$q8','$q9',
				 '$q10','$q11','$q12',
                 '$q13','$q14','$q15',
                 '$q16','$q17' ) ");

	  
	  if($sql)
	  {
				  echo"
					  <script>
						  Swal.fire({
							  icon: 'success',
							  title: 'SUCCESS',
							  html:  `SUCCESSFULLY INSERT`,
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

			if (isset($_POST['edit_timesheet'])) 
			{
				$q4 = $_POST['timesheet_date'];
				$q6 = $_POST['shift'];
				$q7 = $_POST['first'];
				$q8 = $_POST['second'];
				$q9 = $_POST['third'];
				$q10 = $_POST['fourth'];
				$q11 = $_POST['fifth'];
				$q12 = $_POST['sixth'];
				$q13 = $_POST['seven'];
				$q14 = $_POST['eigth'];
				$q15 = $_POST['sp1'];
				$q16 = $_POST['sp2'];
				$q17 = $_POST['sp3'];

				$id = $_POST['id']; // Add the ID of the record to be updated

				$sql = mysqli_query($conn, "UPDATE timesheet SET
					timesheet_date = '$q4',
					shift = '$q6',
					first = '$q7',
					second = '$q8',
					third = '$q9',
					fourth = '$q10',
					fifth = '$q11',
					sixth = '$q12',
					seven = '$q13',
					eigth = '$q14',
					sp1 = '$q15',
					sp2 = '$q16',
					sp3 = '$q17'
					WHERE id = $id");

				if ($sql) {
					echo "
						<script>
							Swal.fire({
								icon: 'success',
								title: 'SUCCESS',
								html: 'SUCCESSFULLY UPDATED',
								focusConfirm: false,
								confirmButtonText: 'OKAY'
							}).then(function() {
								window.location = document.referrer;
							});
						</script>";
				} else {
					echo "
						<script>
							Swal.fire({
								icon: 'error',
								title: 'ERROR',
								html: 'FAILED TO UPDATE',
								focusConfirm: false,
								confirmButtonText: 'OKAY'
							}).then(function() {
								window.history.back();
							});
						</script>";
				}
			}


	if(isset($_POST['updateHR1']))
    {
    $id      = $_POST['id'];
	  $remarks = $_POST['remarks'];
	  $status  = $_POST['status'];

      $imageName = $_FILES["payroll_file"]["name"];
      $imageSize = $_FILES["payroll_file"]["size"];
      $tmpName = $_FILES["payroll_file"]["tmp_name"];

			$old_image = $_POST['payroll_file_old'];

			if ($imageName != '') { $imageName = $_FILES['payroll_file']['name']; }
			else { $imageName = $old_image; }

      // Image validation
      $validImageExtension = ['pdf','png','jpg','jpeg','docx'];
      $imageExtension = explode('.', $imageName);
      $imageExtension = strtolower(end($imageExtension));

      if (!in_array($imageExtension, $validImageExtension))
      {
				echo"
					<script>
					    Swal.fire({
					    icon: 'error',
					    title: 'ERROR',
					    html:  'PDF, PNG, JPG, JPEG AND DOCX FILE FORMAT ONLY ALLOWED',
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

        $query = "UPDATE reqpayroll SET
					remarks       = '$remarks', 
					status    	  = '$status',
					payroll_file  = '$newImageName'  

						   WHERE id = '$id' ";

        mysqli_query($conn, $query);
        move_uploaded_file($tmpName, '../public/uploads/reqPayroll/' . $newImageName);
			          echo"
			              <script>
			                  Swal.fire({
			                      icon: 'success',
			                      title: 'SUCCESS',
			                      html:  `SUCCESSFULLY DELIVERED PAYROLL COPY`,
			                focusConfirm: false,
			                confirmButtonText:`OKAY`
			              }).then(function() {
													window.location=document.referrer;
			                      })
			                  </script>";
      }
    }
?>