<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/stu_make.css">
</head>
<body>
    
<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel">Login</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="login_result.php" method="post">
            <label for="username">
              <i class="fas fa-user "></i>
            </label>
            <input class="FillUser" type="text" name="username" placeholder="Username" id="username" required>
            <br>
            <label for="password">
              <i class="fas fa-lock"></i>
            </label>
            <input class="FillUser" type="password" name="password" placeholder="Password" id="password" required>
            <div class="modal-footer border-top-0">
          <button class="SignUp" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal"
            data-bs-dismiss="modal">Sign Up</button>
        </div>

      
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-warning" value="Login">
        </div>
        </form>

      </div>
    </div>
  </div>

    <!-- -------------------------------------------- modal1 end -------------------------------------------- -->

  <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel2">Sign Up</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="login_result.php" method="post">
            <label for="username">
              <i class="fas fa-user "></i>
            </label>
            <input class="FillUser" type="text" name="username" placeholder="Username" id="username" required>
            <br>
            <label for="password">
              <i class="fas fa-lock"></i>
            </label>
            <input class="FillUser" type="password" name="password" placeholder="Password" id="password" required><br>
            <input class="FillUser space" type="password" name="password" placeholder="Confirm-Password" id="password" required>
            
            
    
        <div class="modal-footer">
          <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"
            data-bs-dismiss="modal">Sign Up</button>
        </div>
      </div>
    </div>
  </div>
  <!-- -------------------------------------------- modal2 end -------------------------------------------- -->
</body>
</html>