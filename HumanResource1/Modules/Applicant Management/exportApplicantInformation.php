<?php 
	include "../../PHP/connection.php";

	$filename = "Applicant Information-".date('Y-m-d').'.csv';

	$sql = "SELECT * FROM applicanttbl ORDER BY id ASC";
	$result = mysqli_query($conn, $sql);

	$array = array();

	$file = fopen($filename,'w');
	$array = array ("ID",
					"ApplicantID",
					"Firstname",
					"Middlename",
					"Lastname",
					"Status",
					"Age",
					"Gender",
					"Address",
					"Birthdate",
					"Birthplace",
					"PositionTitle",
					"Email",
					"ContactNo");
	fputcsv($file,$array);

	while($row = mysqli_fetch_array($result)){
		$id 		   	   = $row['id'];
		$applicantID   	   = $row['applicantID'];
		$app_firstname 	   = $row['app_firstname'];
		$app_middlename    = $row['app_middlename'];
		$app_lastname 	   = $row['app_lastname'];
		$app_status 	   = $row['app_status'];
		$app_age 		   = $row['app_age'];
		$app_gender 	   = $row['app_gender'];
		$app_address 	   = $row['app_address'];
		$app_birthdate     = $row['app_birthdate'];
		$app_birthplace    = $row['app_birthplace'];		
		$app_positionTitle = $row['app_positionTitle'];
		$app_email         = $row['app_email'];
		$app_contactno     = $row['app_contactno'];

		$array = array($id,
						$applicantID,   	
						$app_firstname,	   
						$app_middlename,  
						$app_lastname,   
						$app_status, 	 
						$app_age, 		 
						$app_gender, 	   
						$app_address, 	   
						$app_birthdate,     
						$app_birthplace,   	
						$app_positionTitle, 
						$app_email,         
						$app_contactno);    
		fputcsv($file,$array);
	}

	fclose($file);
	
	header("Content-Description: File Transfer");
	header("Content-Disposition: Attachment; filename=$filename");
	header("Content-Type: application/csv;");
	readfile($filename);
	unlink($filename);
	exit();
?>
