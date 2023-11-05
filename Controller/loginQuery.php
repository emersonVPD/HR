<?php
    session_start();
    include "../connection.php";

    if(isset($_SESSION['attempt_again'])){
        $now = time();
        if($now >= $_SESSION['attempt_again']){
            unset($_SESSION['attempt']);
            unset($_SESSION['attempt_again']);
        }
    }
?>

    <!DOCTYPE html>
        <html>
            <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
            </head>
        </html>
    <?php

include "../connection.php";

if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $encrypted_password = md5($password);

    $check_exist = "SELECT * FROM essaccountstbl WHERE username = '$username'";
    $query_check = mysqli_query($conn, $check_exist);

    if(mysqli_num_rows($query_check) > 0)
    {
        
    if(!isset($_SESSION['attempt']))
    {  $_SESSION['attempt'] = 0; }
    if($_SESSION['attempt'] == 3) 
    { 

            echo"
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'ERROR',
                        html:  `LIMIT ATTEMPT REACH KINDLY <br> WAIT 60 SECONDS TO LOGIN AGAIN`,
                        focusConfirm: false,
                        confirmButtonText:`OKAY`
                    }).then(function() {
                        window.location=document.referrer;
                        })
                    </script>"; 

      $_SESSION['error'] = 'Login Attempt Limit Reach<br>Kindly Wait 60 Seconds'; 
    }

    else
    {
            $query = "SELECT * FROM essaccountstbl WHERE 
            username = '$username' AND 
            password = '$encrypted_password'";

            $query_run = mysqli_query($conn, $query);

        if(mysqli_num_rows($query_run) > 0)
        {
            $_SESSION['username']= $username;

            header('location:../HumanResource2/Ess_account/index.php');
            unset($_SESSION['attempt']);
        }

        else
        {
            // invalid
                 echo"
                    <script>
                        Swal.fire({
                          icon: 'error',
                          title: 'ERROR',
                          html:  'USERNAME and PASSWORD <br>NOT EQUAL',
                        focusConfirm: false,
                        confirmButtonText:`OKAY`
                            }).then(function() {
                                window.history.back();
                                    })
                    </script>";

                //this is where we put our 3 attempt limit
                $_SESSION['attempt'] += 1;
                //set the time to allow login if third attempt is reach
                if($_SESSION['attempt'] == 3)
                {
                    $_SESSION['attempt_again'] = time() + (1*60);
                    echo "<script>location.reload();</script>";
                }
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
                html:  'NO USERNAME FOUND',
                focusConfirm: false,
                confirmButtonText:`OKAY`
                    }).then(function() {
                        window.history.back();
                            })
            </script>";
                
        }
}
?>