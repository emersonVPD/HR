<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width,initial-scale=1,shrink-to-fit=no"
    />
    <title>HUMAN RESOURCE 1 LOGIN</title>

    <?php
        include "../libraries/includes.php";
    ?>

    <script defer="defer" src="../js/main.js"></script>
    <link href="css/style.css" rel="stylesheet" />
    
  </head>
  <body class="app">
    <div class="peers ai-s fxw-nw h-100vh">
      <div
        class="d-n@sm- peer peer-greed h-100 pos-r bgr-n bgpX-c bgpY-c bgsz-cv"
        style="background-image: url('images/bg.jpg')"
      >
        <div class="pos-a centerXY">
          <div
            class="bgc-white bdrs-50p pos-r"
            style="width: 120px; height: 120px"
          >
            <img
              class="pos-a centerXY"
              src="images/logo.svg"
              alt=""
            />
          </div>
        </div>
      </div>
      <div
        class="col-12 col-md-4 peer pX-40 pY-80 h-100 bgc-white scrollable pos-r"
        style="min-width: 320px">

        <?php
            if(isset($_SESSION['error'])){
                ?>
                <div class="alert alert-danger text-center" style="margin-top:20px;">
                    <?php echo $_SESSION['error']; ?>
                </div>
                <?php

                unset($_SESSION['error']);
            }
        ?>

        <h4 class="fw-bold text-uppercase mb-4">HUMAN RESOURCE 4</h4>
        <form action="../Controller/loginAdminQuery.php" method="POST">
                <div class="mb-3">
                    <label class="text-normal text-dark form-label">Username</label>
                    <input type="text" 
                            name="username"
                            placeholder="Username"
                            maxlength="20" 
                            class="form-control" 
                            required>
                </div>

                <div class="mb-3">
                    <label class="text-normal text-dark form-label">Password</label>
                    <div class="input-group">
                            <input type="password"
                                name="password"
                                id="passwordInput"
                                placeholder="Password"
                                minlength="8"
                                maxlength="15"
                                class="form-control password"
                                required>
                            <span class="input-group-text">
                                <i class="bi bi-eye-slash eye-icon" id="passwordToggle"></i>
                            </span>
                    </div>
                </div>
                    <div class="peers ai-c jc-sb fxw-nw">
                        <div class="peer">
                            <div class="checkbox checkbox-circle checkbox-info peers ai-c">
                            <input
                                type="checkbox"
                                id="inputCall1"
                                name="inputCheckboxesCall"
                                class="peer"
                            />
                            <label
                                for="inputCall1"
                                class="peers peer-greed js-sb ai-c form-label"
                                ><span class="peer peer-greed">Remember Me</span></label
                            >
                            </div>
                        </div>

                        <div class="peer">
                                <button type="submit" 
                                    name="login_admin" 
                                    class="btn btn-primary btn-color">Login</button>
                        </div>
                    </div>
                </form>
            </div>
            </div>
        </body>

    <script>
        const forms = document.querySelector(".forms"),
                pwShowHide = document.querySelectorAll(".eye-icon"),
                links = document.querySelectorAll(".link");

            pwShowHide.forEach(eyeIcon => {
                eyeIcon.addEventListener("click", () => {
                    let pwFields = eyeIcon.parentElement.parentElement.querySelectorAll(".password");
                    
                    pwFields.forEach(password => {
                        if(password.type === "password"){
                            password.type = "text";
                            eyeIcon.classList.replace("bi-eye-slash", "bi-eye");
                            return;
                        }
                        password.type = "password";
                        eyeIcon.classList.replace("bi-eye", "bi-eye-slash");
                    })
                    
                })
            })      

            links.forEach(link => {
                link.addEventListener("click", e => {
                e.preventDefault(); //preventing form submit
                forms.classList.toggle("show-signup");
                })
            })
    </script>
</html>
