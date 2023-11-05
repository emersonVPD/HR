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
 include '../connection.php';

 if(isset($_POST['submit'])){
		    $q1				= $_POST['nameemp'];
   		  $sched_from     = $_POST['train_sched_from'];
        $sched_to       = $_POST['train_sched_to'];
        $remarks        = $_POST['train_sched_remarks'];
 
        $sql = mysqli_query($conn,"INSERT INTO trainingschedtbl(
           nameemp,
           train_sched_from,
           train_sched_to,
           train_sched_remarks) 
           
            VALUES 
             ('$q1',
              '$sched_from',
              '$sched_to',
              '$remarks')");

        if($sql)
        {
          echo"
              <script>
                  Swal.fire({
                      icon: 'success',
                      title: 'SUCCESS',
                      html:  `SUCCESSFULLY ADDING TRAINING SCHEDULE`,
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
              html:  'FAILED TO INSERT',
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
  $id         = $_POST['id'];
  $q1		  = $_POST['nameemp'];
  $sched_from = $_POST['train_sched_from'];
  $sched_to   = $_POST['train_sched_to'];
  $remarks    = $_POST['train_sched_remarks'];

  $sql = mysqli_query($conn, "UPDATE trainingschedtbl SET
 		      nameemp             = '$q1',
          train_sched_from    = '$sched_from',
          train_sched_to      = '$sched_to',
          train_sched_remarks = '$remarks'

          WHERE id = '$id'");

          if($sql){
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
                html:  'FAILED TO UPDATED',
                focusConfirm: false,
                confirmButtonText:`OKAY`
              }).then(function() {
                      window.history.back();
                })
            </script>";
            }

}

    //DELET QUERY
    if(isset($_POST['delete'])){
    
      $id = $_POST['delete_id'];

      $query = "DELETE FROM applicantschedtbl WHERE id = '$id'";
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

 
