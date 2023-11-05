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
	if (isset($_POST['submit'])) {
		$q1 = $_POST['employeeID'];
		$remarks = $_POST['emp_remarks'];
		$files = $_FILES['emp_records']['name'];
	
		$allowed_extension = array('zip', 'ZIP');
		$filename = $_FILES['emp_records']['name'];
		$file_extension = pathinfo($filename, PATHINFO_EXTENSION);
	
		if (!in_array($file_extension, $allowed_extension)) {
			echo "
				<script>
					Swal.fire({
						icon: 'error',
						title: 'ERROR',
						html:  'ZIP ('COMPRESSED') - FILE FORMAT ONLY ALLOWED',
						focusConfirm: false,
						confirmButtonText: 'OKAY'
					}).then(function () {
						window.history.back();
					})
				</script>";
		} else {
			// Add the current date to the file name
			$date = date("Y-m-d_H-i-s");
			$new_filename = $date . "_" . $_FILES['emp_records']['name'];
	
			// Replace 'tableName' with the actual name of your table
			$query = "INSERT INTO emprecords (employeeID, emp_remarks, emp_records) VALUES ('$q1','$remarks', '$new_filename')";
	
			$query_run = mysqli_query($conn, $query);
	
			if ($query_run) {
				move_uploaded_file($_FILES["emp_records"]["tmp_name"], "../public/uploads/employeeRecords/" . $new_filename);
	
				echo "
					<script>
						Swal.fire({
							icon: 'success',
							title: 'SUCCESS',
							html:  'SUCCESSFULLY INSERTED',
							focusConfirm: false,
							confirmButtonText: 'OKAY'
						}).then(function () {
							window.location = document.referrer;
						})
					</script>";
			} else {
				echo "
					<script>
						Swal.fire({
							icon: 'error',
							title: 'ERROR',
							html:  'INFORMATION NOT INSERTED',
							focusConfirm: false,
							confirmButtonText: 'OKAY'
						}).then(function () {
							window.history.back();
						})
					</script>";
			}
		}
	}
	
		
		
		//UPDATE QUERY 
	if(isset($_POST['update']))
    {
      $id      = $_POST['id'];
	  $remarks = $_POST['emp_remarks'];

      $imageName = $_FILES["emp_records"]["name"];
      $imageSize = $_FILES["emp_records"]["size"];
      $tmpName = $_FILES["emp_records"]["tmp_name"];

			$old_image = $_POST['emp_records_old'];

			if ($imageName != '') { $imageName = $_FILES['emp_records']['name']; }
			else { $imageName = $old_image; }

      // Image validation
      $validImageExtension = ['zip','ZIP'];
      $imageExtension = explode('.', $imageName);
      $imageExtension = strtolower(end($imageExtension));

      if (!in_array($imageExtension, $validImageExtension))
      {
				echo"
					<script>
					    Swal.fire({
					    icon: 'error',
					    title: 'ERROR',
				    	html:  'ZIP ('COMPRESSED') - FILE FORMAT ONLY ALLOWED',
							focusConfirm: false,
							confirmButtonText:`OKAY`
						}).then(function() {
			                window.history.back();
					    })
					</script>";	
      }

      elseif ($imageSize > 10145728){
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

        $query = "UPDATE emprecords SET
					emp_remarks = '$remarks',  
					emp_records = '$newImageName'  

						   WHERE id = '$id' ";

        mysqli_query($conn, $query);
        move_uploaded_file($tmpName, '../public/uploads/employeeRecords/' . $newImageName);
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

		//DELETE QUERY
		if(isset($_POST['delete'])){
		
			$id = $_POST['delete_id'];
			$req_legal_file = $_POST['del_emp_records'];

			$query = "DELETE FROM emprecords WHERE id = '$id'";
			$query_run = mysqli_query($conn, $query);

			if($query_run){
				unlink("../public/uploads/employeeRecords/".$emp_records);
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
			else{
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