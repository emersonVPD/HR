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


  if(isset($_POST['create_payroll']))
  {
	// var_dump($_POST);
	$qs = $_POST['date_from'];
	$qs2 = $_POST['date_to'];
	$q1 = $_POST['net_pay'];
    $q2 = $_POST['total_deductions'];
    $q2a = $_POST['overtime_pay'];
    $q3 = $_POST['employee_payroll'];
    $q3A = $_POST['fullname'];
	$q3B = $_POST['employeeID'];
	$q4C = $_POST['job_position'];
    $q4 = $_POST['daily_rate'];
    $q5 = $_POST['days_of_work'];
	$q5a = $_POST['overtime_hours'];
	$q5b = $_POST['overtime_rate'];
    $q6 = $_POST['sss'];
    $q7 = $_POST['pag_ibig'];
    $q8 = $_POST['philhealth'];
    $q9 = $_POST['other_deductions'];
    $q10 = $_POST['deduction_description'];
    $q11 = $_POST['bonus'];
    $q12 = $_POST['bonus_description'];

	  $sql = mysqli_query($conn,"INSERT INTO create_payroll
	  (  date_from,
	     date_to,  
		 net_pay, 
	     total_deductions, 
		 overtime_pay,
		 employee_payroll, 
		 fullname,
		 employeeID,
		 job_position,
		 daily_rate, 
		 days_of_work, 
		 overtime_hours,
		 overtime_rate,
		 sss, 
		 pag_ibig, 
		 philhealth,
		 other_deductions, 
		 deduction_description, 
		 bonus, 
		 bonus_description ) 
		
		VALUES ( '$qs','$qs2','$q1','$q2','$q2a','$q3','$q3A','$q3B',
				 '$q4C','$q4','$q5','$q5a','$q5b','$q6',
				 '$q7','$q8','$q9','$q10','$q11','$q12' ) ");

	  
	  if($sql)
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