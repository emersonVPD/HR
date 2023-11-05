<?php

    session_start();
    include "../Query/connection.php";

        if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
            header("location: ../HRManagerLogin.php");
            exit;
    
 if(isset($_POST['updatePass']))
 {
    $currentPassword = $_POST['currentPassword']; 
    $password        = $_POST['password'];  
    $passwordConfirm = $_POST['passwordConfirm']; 

   $sql="SELECT password FROM essaccountstbl WHERE username = '$username'";

      $res = mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($res);

       if(password_verify($currentPassword,$row['password']))
       {
        if($password != $passwordConfirm)
        {
            $error[] = 'Passwords do not match.';
        }
          if(strlen($password)<5){ // min 
            $error[] = 'The password is 6 characters long.';
        }
        
         if(strlen($password)>20){ // Max 
            $error[] = 'Password: Max length 20 Characters Not allowed';
        }

   if(!isset($error))
   {
      $encrypted_password = hash("md5", $password);

      $result = mysqli_query($conn,"UPDATE essaccountstbl SET password = '$encrypted_password' WHERE username='$username'");
           if($result)
           {
               header("location:account.php?password_updated=1");
           }

           else 
           {
            $error[]='Something went wrong';

            }
         }
      }

        else 
        {
            $error[]='Current password does not match.'; 
        }   
    }

?>