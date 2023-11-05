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
	include "../../PHP/connection.php";

			if(isset($_POST['submit']))
			{
				$firstname   = $_POST['ess_firstname'];
				$middlename  = $_POST['ess_middlename'];
				$lastname    = $_POST['ess_lastname'];
				$username    = $_POST['username'];
				$mpin 	     = $_POST['mpin'];
				$password    = $_POST['password'];
				$position    = $_POST['ess_positionTitle'];
				//$sub    		 = $_POST['ess_subpositionTitle'];
				$contact     = $_POST['ess_contactno'];
				$email       = $_POST['ess_email'];

				if(preg_match("#.*^(?=.{8,15})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $password))
				{
					$encrypted_password = hash("md5", $password);
					$encrypted_mpin = hash("md5", $mpin);
					
					$query = "SELECT * FROM essaccountstbl WHERE username = '$username'";
					$query_run = mysqli_query($conn,$query);
					
					if(mysqli_num_rows($query_run) > 0)
					{
						//there is already a user with the same username
						echo"
							<script>
								Swal.fire({
								  icon: 'error',
								  title: 'ERROR',
								  html:  'USERNAME ALREADY EXISTS',
								focusConfirm: false,
								confirmButtonText:`OKAY`
									}).then(function() {
			              window.history.back();
								            })
							</script>";
					}

					else
					{
						$query= "INSERT INTO essaccountstbl(
									ess_firstname,
									ess_middlename,
									ess_lastname,
									username,
									mpin,
									password,
									ess_positionTitle,

									ess_contactno,
									ess_email)

							 VALUES(
									'$firstname',
									'$middlename',
									'$lastname',
									'$username',
									'$encrypted_mpin',
									'$encrypted_password',
									'$position',

									'$contact',
									'$email')";

						$query_run = mysqli_query($conn,$query);
						
						if($query_run)
						{
									echo"
									    <script>
									        Swal.fire({
									            icon: 'success',
									            title: 'SUCCESS',
									            html:  `SUCCESSFULLY CREATED ACCOUNT`,
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
								               	html:  `FAILED TO INSERT',
												   focusConfirm: false,
												   confirmButtonText:`OKAY`
												 }).then(function() {
			                    					window.history.back();
								            })
								        </script>";
						}
					}		
				}
				else
				{
									echo"
								        <script>
								            Swal.fire({
								                icon: 'error',
								                title: 'ERROR',
								               	html:  `PASSWORD MUST ATLEAST<br>
								               					MININUM OF 8 AND MAXIMUM OF 15 CHARACTERS<br>
								               					ATLEAST 1 NUMBER<br>
								               					ATLEAST 1 UPPERCASE LETTER<br>
								               					ATLEAST 1 LOWERCASE LETTER<br>
								               					ATLEAST 1 SYMBOL`,
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
				$id          = $_POST['id'];
				$firstname   = $_POST['ess_firstname'];
				$middlename  = $_POST['ess_middlename'];
				$lastname    = $_POST['ess_lastname'];
				$username    = $_POST['username'];
				$mpin 	     = $_POST['mpin'];
				$password    = $_POST['password'];
				$position    = $_POST['ess_positionTitle'];
				$sub    		 = $_POST['ess_subpositionTitle'];
				$contact     = $_POST['ess_contactno'];
				$email       = $_POST['ess_email'];

					$encrypted_password = hash("md5", $password);
					$encrypted_mpin = hash("md5", $mpin);
					
        $query = "UPDATE essaccountstbl SET

          ess_firstname        = '$firstname',  
          ess_middlename       = '$middlename', 
          ess_lastname         = '$lastname',
          username             = '$username',
          mpin                 = '$encrypted_password',
          password             = '$encrypted_mpin',
          ess_positionTitle    = '$position',
					ess_subpositionTitle = '$sub',
          ess_contactno        = '$contact',
          ess_email            = '$email'

               WHERE id = '$id' ";

						$query_run = mysqli_query($conn,$query);
						
						if($query_run)
						{
									echo"
									    <script>
									        Swal.fire({
									            icon: 'success',
									            title: 'SUCCESS',
									            html:  `SUCCESSFULLY CREATED ACCOUNT`,
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
								               	html:  `FAILED TO INSERT',
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

			$query = "DELETE FROM essaccountstbl WHERE id = '$id'";
			$query_run = mysqli_query($conn,$query);

			if($query_run){

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
					               	html:  `FAILED TO DELETE`,
									   focusConfirm: false,
									   confirmButtonText:`OKAY`
									 }).then(function() {
                    					window.history.back();
					            })
					        </script>";
			} 
		}
		
?>