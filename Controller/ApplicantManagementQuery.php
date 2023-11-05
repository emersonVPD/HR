<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="../libraries/queryAlert.js"></script> 
</head>
</html>

<?php 
 include '../connection.php';

 //APPLICANT SCHEDULE
 if(isset($_POST['submit2'])){
   		$q1		     = $_POST['nameapp'];
        $initial     = $_POST['app_initial'];
        $final       = $_POST['app_final'];
        $exam        = $_POST['app_exam'];
 
        $sql = mysqli_query($conn,"INSERT INTO applicantschedtbl
                (  nameapp, 
                  app_initial, 
                  app_final, 
                  app_exam ) 
                  
         VALUES ( '$q1',
         		  '$final',
                  '$initial',
                  '$exam' ) ");

        if($sql)
        {
          echo'<script type="text/javascript">success();</script>'; 
        } 
        else
        {
          echo'<script type="text/javascript">failed();</script>';  
        }
}

if(isset($_POST['update2']))
{
  $id      = $_POST['id'];
  $q1      = $_POST['nameapp'];
  $initial = $_POST['app_initial'];
  $final   = $_POST['app_final'];
  $exam    = $_POST['app_exam'];
  $remarks = $_POST['sched_remarks'];

  $sql = mysqli_query($conn, "UPDATE applicantschedtbl SET
  		  nameapp       = '$q1',
          app_initial   = '$initial',
          app_final     = '$final',
          app_exam      = '$exam',
          sched_remarks = '$remarks'

          WHERE id = '$id'");

        if($sql)
        {
          echo'<script type="text/javascript">successUpdate();</script>'; 
        }

        else
        {
          echo'<script type="text/javascript">failedUpdate();</script>';  
        }

}

    //DELET QUERY
    if(isset($_POST['delete2'])){
    
      $id = $_POST['delete_id'];

      $query = "DELETE FROM applicantschedtbl WHERE id = '$id'";
      $query_run = mysqli_query($conn,$query);

        if($query_run)
        {
          echo'<script type="text/javascript">successDelete();</script>'; 
        } 
        else
        {
          echo'<script type="text/javascript">failedDelete();</script>';  
        }
    }
     //END APPLICANT SCHEDULE


  //INITIAL INTERVIEW
  if(isset($_POST['submit3']))
  {
    $q1      = $_POST['applicantID'];
    $ifq1    = $_POST['iq1'];
    $ifq2    = $_POST['iq2'];
    $ifq3    = $_POST['iq3'];
    $ifq4    = $_POST['iq4'];
    $ifq5    = $_POST['iq5'];
    $ifq6    = $_POST['iq6'];
    $ifq7    = $_POST['iq7'];
    $ifq8    = $_POST['iq8'];
    $ifq9    = $_POST['iq9'];
    $ifq10   = $_POST['iq10'];
    $remarks = $_POST['initial_remarks'];

    $query = "INSERT INTO interviewtbl(
      applicantID,
      iq1, iq2, iq3, iq4, iq5,
      iq6, iq7, iq8, iq9, iq10,
      initial_remarks)

        VALUES (
        	'$q1',
            '$ifq1', '$ifq2', '$ifq3', '$ifq4', '$ifq5',
            '$ifq6', '$ifq7', '$ifq8', '$ifq9', '$ifq10',
            '$remarks')";

    $query_run = mysqli_query($conn,$query);

        if($query_run)
        {
          echo'<script type="text/javascript">success();</script>'; 
        } 
        else
        {
          echo'<script type="text/javascript">failed();</script>';  
        }
      }
    
    //UPDATE QUERY 
    if(isset($_POST['update3']))
    { 
      $id      = $_POST['id'];
      $q1      = $_POST['nameapp'];
      $ifq1    = $_POST['iq1'];
      $ifq2    = $_POST['iq2'];
      $ifq3    = $_POST['iq3'];
      $ifq4    = $_POST['iq4'];
      $ifq5    = $_POST['iq5'];
      $ifq6    = $_POST['iq6'];
      $ifq7    = $_POST['iq7'];
      $ifq8    = $_POST['iq8'];
      $ifq9    = $_POST['iq9'];
      $ifq10   = $_POST['iq10'];
      $remarks = $_POST['initial_remarks'];
 
        $query = "UPDATE interviewtbl SET
      nameapp = '$q1',
          iq1 = '$ifq1', 
          iq2 = '$ifq2',
          iq3 = '$ifq3',
          iq4 = '$ifq4',
          iq5 = '$ifq5',
          iq6 = '$ifq6',
          iq7 = '$ifq7',
          iq8 = '$ifq8',
          iq9 = '$ifq9',
          iq10            = '$ifq10',
          initial_remarks = '$remarks'

               WHERE id = '$id' ";

          $query_run = mysqli_query($conn,$query);

        if($query_run)
        {
          echo'<script type="text/javascript">successUpdate();</script>'; 
        }
        else
        {
          echo'<script type="text/javascript">failedUpdate();</script>';  
        }
    }

    //DELET QUERY
    if(isset($_POST['delete3'])){
    
      $id = $_POST['delete_id'];

      $query = "DELETE FROM interviewtbl WHERE id = '$id'";
      $query_run = mysqli_query($conn,$query);

        if($query_run)
        {
          echo'<script type="text/javascript">successDelete();</script>'; 
        } 
        else
        {
          echo'<script type="text/javascript">failedDelete();</script>';  
        }
    }
    //END INITIAL INTERVIEW

  //FINAL INTERVIEW
  if(isset($_POST['submit4']))
  {
    $q1      = $_POST['applicantID'];
    $ifq1    = $_POST['fq1'];
    $ifq2    = $_POST['fq2'];
    $ifq3    = $_POST['fq3'];
    $ifq4    = $_POST['fq4'];
    $ifq5    = $_POST['fq5'];
    $ifq6    = $_POST['fq6'];
    $ifq7    = $_POST['fq7'];
    $ifq8    = $_POST['fq8'];
    $ifq9    = $_POST['fq9'];
    $ifq10   = $_POST['fq10'];
    $remarks = $_POST['final_remarks'];

    $query = "INSERT INTO finalinterviewtbl
    ( applicantID,
      fq1,fq2,fq3,fq4,fq5,
      fq6,fq7,fq8,fq9,fq10,
      final_remarks )

    VALUES ( '$q1',
    		 '$ifq1', '$ifq2', '$ifq3', '$ifq4', '$ifq5',
             '$ifq6', '$ifq7', '$ifq8', '$ifq9', '$ifq10','$remarks')";

    $query_run = mysqli_query($conn,$query);

        if($query_run)
        {
          echo'<script type="text/javascript">success();</script>'; 
        } 
        else
        {
          echo'<script type="text/javascript">failed();</script>';  
        }
      }
    
    //UPDATE QUERY 
    if(isset($_POST['update4']))
    { 
      $id      = $_POST['id'];
      $q1      = $_POST['nameapp'];
      $ifq1    = $_POST['fq1'];
      $ifq2    = $_POST['fq2'];
      $ifq3    = $_POST['fq3'];
      $ifq4    = $_POST['fq4'];
      $ifq5    = $_POST['fq5'];
      $ifq6    = $_POST['fq6'];
      $ifq7    = $_POST['fq7'];
      $ifq8    = $_POST['fq8'];
      $ifq9    = $_POST['fq9'];
      $ifq10   = $_POST['fq10'];
      $remarks = $_POST['final_remarks'];
 
        $query = "UPDATE finalinterviewtbl SET
          nameapp		= '$q1',
          fq1           = '$ifq1',
          fq2           = '$ifq2',
          fq3           = '$ifq3',
          fq4           = '$ifq4',
          fq5           = '$ifq5',
          fq6           = '$ifq6',
          fq7           = '$ifq7',
          fq8           = '$ifq8',
          fq9           = '$ifq9',
          fq10          = '$ifq10',
          final_remarks = '$remarks'

               WHERE id = '$id' ";

          $query_run = mysqli_query($conn,$query);

        if($query_run)
        {
          echo'<script type="text/javascript">successUpdate();</script>'; 
        }
        else
        {
          echo'<script type="text/javascript">failedUpdate();</script>';  
        }
    }

    //DELET QUERY
    if(isset($_POST['delete4'])){
    
      $id = $_POST['delete_id'];

      $query = "DELETE FROM finalinterviewtbl WHERE id = '$id'";
      $query_run = mysqli_query($conn,$query);

        if($query_run)
        {
          echo'<script type="text/javascript">successDelete();</script>'; 
        } 
        else
        {
          echo'<script type="text/javascript">failedDelete();</script>';  
        }
    }
        //END FINAL INTERVIEW 

  //EXAM RESULT SCORE
  if(isset($_POST['submit5']))
  {
      var_dump($_POST);

      $q1      = $_POST['applicantID'];
      $score   = $_POST['res_score'];
      $remarks = $_POST['res_remarks'];

      $query = "INSERT INTO examresult 
            ( applicantID, 
              res_score, 
              res_remarks )

      VALUES ( '$q1',
              '$score',
              '$remarks' )";

      $query_run = mysqli_query($conn,$query);

          if($query_run)
          {
            echo'<script type="text/javascript">success();</script>'; 
          } 
          else
          {
            echo'<script type="text/javascript">failed();</script>';  
          }
    }

    if(isset($_POST['submitOverall'])){
       $q1 = $_POST['applicantID'];
       $q2 = $_POST['initial'];
       $q3 = $_POST['final'];
       $q4 = $_POST['exam'];
       $q5 = $_POST['overall'];

       $sql = mysqli_query($conn,"INSERT INTO applicantoverall
               (  applicantID,  initial, final, exam, overall ) 
                 
        VALUES ( '$q1','$q2','$q3','$q4','$q5' ) ");

       if($sql)
       {
         echo'<script type="text/javascript">success();</script>'; 
       } 
       else
       {
         echo'<script type="text/javascript">failed();</script>';  
       }
}
    
    //UPDATE QUERY 
    if(isset($_POST['update5']))
    { 
      $id      = $_POST['id'];
      $q1      = $_POST['nameapp'];
      $score   = $_POST['res_score'];
      $remarks = $_POST['res_remarks'];
 
        $query = "UPDATE examresult SET
          nameapp     = '$q1',
          res_score   = '$score',
          res_remarks = '$remarks'

               WHERE id = '$id' ";

          $query_run = mysqli_query($conn,$query);

        if($query_run)
        {
          echo'<script type="text/javascript">successUpdate();</script>'; 
        }

        else
        {
          echo'<script type="text/javascript">failedUpdate();</script>';  
        }
    }
  //END EXAM RESULT SCORE

    //DELET QUERY
    if(isset($_POST['delete5'])){
    
      $id = $_POST['delete_id'];

      $query = "DELETE FROM examresult WHERE id = '$id'";
      $query_run = mysqli_query($conn,$query);

        if($query_run)
        {
          echo'<script type="text/javascript">successDelete();</script>'; 
        } 
        else
        {
          echo'<script type="text/javascript">failedDelete();</script>';  
        }
    }
    //END INITIAL INTERVIEW


 ?>
 
