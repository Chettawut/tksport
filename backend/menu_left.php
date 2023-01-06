<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo PATH; ?>" class="brand-link">
        <img src="<?php echo PATH; ?>/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8;background-color:white;">
        <span class="brand-text font-weight-light">Demo</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo PATH; ?>/AdminLTE-3.2.0/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $_SESSION['titlename'].' '.$_SESSION['firstname'].' '.$_SESSION['lastname']; ?></a>
            </div>
        </div>

        <nav class="mt-2" id="sidemenu">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?php echo PATH; ?>/person" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            ข้อมูลบุคคล (Person)
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo PATH; ?>/default/sport" class="nav-link">
                        <i class="nav-icon fa fa-running"></i>
                        <p>
                        Sport
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo PATH; ?>/default/time" class="nav-link">
                        <i class="nav-icon fa fa-clock"></i>
                        <p>
                        Sport Time
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo PATH; ?>/default/job" class="nav-link">
                        <i class="nav-icon fa fa-edit"></i>
                        <p>
                        Job
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo PATH; ?>/default/color" class="nav-link">
                        <i class="nav-icon fa fa-tasks"></i>
                        <p>
                        Color
                        </p>
                    </a>
                </li>
                


            </ul>
        </nav>


    </div>

</aside>