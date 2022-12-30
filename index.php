<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/stu_make.css">

</head>
<body>
<!-- -------------------------------------------- header start -------------------------------------------- -->

    <header class="p-3 text-bg-dark">
        <div class="container">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
              <img src="http://www.thaischool.in.th/_files_school/23100163/data/23100163_0_20210413-133844.png" alt="" width="100" height="80">
            </a>
    
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              <li><a href="#" class="nav-link px-2 text-white">Home</a></li>
              <li ><a href="#" class="nav-link px-2 text-white" onclick="show()">ข้อมูลการแข่งขัน</a>
                <div class="dropdown-hidden" id="dropdown">
                    <ul class="dropdown-menu dropdown-menu-dark d-grid gap-1 p-2 rounded-3 mx-0 border-0 shadow w-220px">
                        <li><a class="dropdown-item rounded-2" href="#">Action</a></li>
                        <li><a class="dropdown-item rounded-2" href="#">Another action</a></li>
                        <li><a class="dropdown-item rounded-2" href="#">Something else here</a></li>
                      </ul>
                  </div>
              </li>
              <li><a href="#" class="nav-link px-2 text-white">ผลการแข่งขัน</a></li>
              
              <!-- <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
              <li><a href="#" class="nav-link px-2 text-white">About</a></li> -->
            </ul>
    
            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
              <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">
            </form>
    
            <div class="text-end">
              <button type="button" class="btn btn-outline-light me-2 btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_login">
                Login</button>
              <button type="button" class="btn btn-warning">Sign-up</button>
            </div>
          </div>
        </div>
      </header>

<!-- -------------------------------------------- header end -------------------------------------------- -->


  <?php 
  include_once('modal/modal_login.php');
  ?>


    <script src="js/stu_make.js"></script>  
    <script src="js/bootstrap.min.js"></script>  
</body>
</html>