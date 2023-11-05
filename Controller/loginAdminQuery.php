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

    if(isset($_POST['login_admin']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $encrypted_password = md5($password);

        $check_exist = "SELECT * FROM tntaccount WHERE username = '$username'";
        $query_check = mysqli_query($conn, $check_exist);

        if(mysqli_num_rows($query_check) > 0)
        {
            
        if(!isset($_SESSION['attempt']))
        {
            $_SESSION['attempt'] = 0;
        }

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
            $query = "SELECT * FROM tntaccount WHERE 
            username = '$username' AND 
            password = '$encrypted_password' AND (
                positionTitle = 'HR 1 Manager' OR
                positionTitle = 'HR 2 Manager' OR
                positionTitle = 'HR 3 Manager' OR
                positionTitle = 'HR 4 Manager' OR
                positionTitle = 'Financial' OR
                positionTitle = 'Admin' OR
                positionTitle = ' ' OR
                positionTitle = 'Core2' OR
                positionTitle = 'Logistic' OR
                positionTitle = 'Super Admin'
            )";
        
        $query_run = mysqli_query($conn, $query);
        
        if (mysqli_num_rows($query_run) > 0) {
            $_SESSION['username'] = $username;
            $user = mysqli_fetch_assoc($query_run);
        
            switch ($user['positionTitle']) {
                case 'HR 1 Manager':
                    header('location: ../HumanResource1/index.php');
                    break;
                case 'HR 2 Manager':
                    header('location: ../HumanResource2/index.php');
                    break;
                case 'HR 3 Manager':
                    header('location: ../HumanResource3/index.php');
                    break;
                case 'HR 4 Manager':
                    header('location: ../HumanResource4/index.php');
                    break;
                case 'Financial':
                    header('location: ../#/index.php');
                    break;

                case 'Admin':
                    header('location: ../#/index.php');
                    break;

                case 'Core1':
                    header('location: ../#/index.php');
                    break;

                case 'Core2':
                    header('location: ../#/index.php');
                    break;

                case 'Logistic':
                    header('location: ../#/index.php');
                    break;

                case 'Super Admin':
                    header('location: ../index.php');
                    break;
                default:
                    // Handle any other positionTitle if needed
                    break;
            }
        
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
                                window.location=document.referrer;
                                        })
                        </script>";

                    //this is where we put our 3 attempt limit
                    $_SESSION['attempt'] += 1;
                    //set the time to allow login if third attempt is reach
                    if($_SESSION['attempt'] == 3)
                    {
                        $_SESSION['attempt_again'] = time() + (1*60);
                        echo "<script>window.location=document.referrer;</script>";
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