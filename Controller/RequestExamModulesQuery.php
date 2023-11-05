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
  if(isset($_POST['addRequest']))
  {
    $title    = $_POST['req_exam_title'];
    $purpose  = $_POST['req_exam_purpose'];
    $req_date = $_POST['req_exam_date'];

    $query = "INSERT INTO reqexammodulestbl(
      req_exam_title, 
      req_exam_purpose,
      req_exam_date )

        VALUES (
            '$title',
            '$purpose',NOW())";

    $query_run = mysqli_query($conn,$query);

        if($query_run)
        {
          echo"
              <script>
                  Swal.fire({
                      icon: 'success',
                      title: 'SUCCESS',
                      html:  `TRANSACTION SUCCESSFUL`,
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
                html:  'INFORMATION NOT INSERTED',
                focusConfirm: false,
                confirmButtonText:`OKAY`
              }).then(function() {                
                          window.history.back();
                })
            </script>";
        }
      }

    //UPDATE QUERY 
    if(isset($_POST['updates']))
    { 
      $id      = $_POST['id'];
      $title   = $_POST['req_exam_title'];

        $query = "UPDATE reqexammodulestbl SET
          req_exam_title   = '$title'
  
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
                      html:  'FAILED TO UPDATE',
                      focusConfirm: false,
                      confirmButtonText:`OKAY`
                    }).then(function() {                
                          window.history.back();
                      })
                  </script>";
        } 
    }


    //LEARNING MANAGEMENT SIDE

  //ADD QUERY
  if(isset($_POST['submit']))
  {
    $title    = $_POST['req_exam_title'];
    $purpose  = $_POST['req_exam_purpose'];
    $req_date = $_POST['req_exam_date'];
    $links    = $_POST['req_exam_links'];

    $query = "INSERT INTO reqexammodulestbl(
      req_exam_title, 
      req_exam_purpose,
      req_exam_date, 
      req_exam_links)

        VALUES (
            '$title',
            '$purpose',
            '$req_date',
            '$links')";

    $query_run = mysqli_query($conn,$query);

        if($query_run)
        {
          echo"
              <script>
                  Swal.fire({
                      icon: 'success',
                      title: 'SUCCESS',
                      html:  `INSERTED SUCCESSFUL`,
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
                html:  'FAILED TO INSERTED',
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
      $id      = $_POST['id'];
      $title   = $_POST['req_exam_title'];
      $date    = $_POST['req_exam_date'];
      $purpose = $_POST['req_exam_purpose'];
      $links   = $_POST['req_exam_links'];
      $remarks = $_POST['req_exam_remarks'];

        $query = "UPDATE reqexammodulestbl SET

          req_exam_title   = '$title',  
          req_exam_date    = '$date', 
          req_exam_purpose = '$purpose', 
          req_exam_links   = '$links',
          req_exam_remarks = '$remarks'  
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
                      html:  'FAILED TO UPDATE',
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

      $query = "DELETE FROM reqexammodulestbl WHERE id = '$id'";
      $query_run = mysqli_query($conn, $query);

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

  ?>