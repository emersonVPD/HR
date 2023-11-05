<?php 
	include "../../PHP/connection.php";

	$filename = "Employee Information-".date('Y-m-d').'.csv';

	$sql = "SELECT * FROM employeetbl ORDER BY id ASC";
	$result = mysqli_query($conn, $sql);

	$array = array();

	$file = fopen($filename,'w');
	$array = array ("ID",
					"employeeID",
					"Firstname",
					"Middlename",
					"Lastname",
					"PositionTitle",
					"Status",
					"DateHired",
					"Department",
					"Gender",
					"Address",
					"Age",
					"Birthdate",
					"Birthplace",
					"ContactNo",
					"Email");
	fputcsv($file,$array);

	while($employee = mysqli_fetch_array($result))
	{
		$id 		   	   = $employee['id'];
		$employeeID   	   = $employee['employeeID'];
		$emp_firstname 	   = $employee['emp_firstname'];
		$emp_middlename    = $employee['emp_middlename'];
		$emp_lastname 	   = $employee['emp_lastname'];
		$emp_positionTitle = $employee['emp_positionTitle'];
		$emp_status 	   = $employee['emp_status'];
		$emp_dateHired     = $employee['emp_dateHired'];
		$emp_department    = $employee['emp_department'];
		$emp_gender 	   = $employee['emp_gender'];
		$emp_address 	   = $employee['emp_address'];
		$emp_age 		   = $employee['emp_age'];
		$emp_birthdate     = $employee['emp_birthdate'];
		$emp_birthplace    = $employee['emp_birthplace'];		
		$emp_contactno     = $employee['emp_contactno'];
		$emp_email         = $employee['emp_email'];

		 $array = array($id,
		 				$employeeID,
						$emp_firstname,
						$emp_middlename,
						$emp_lastname,
						$emp_positionTitle,
						$emp_status,
						$emp_dateHired,
						$emp_department,
						$emp_gender,
						$emp_address,
						$emp_age,
						$emp_birthdate,
						$emp_birthplace,
						$emp_contactno,
						$emp_email);   

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
