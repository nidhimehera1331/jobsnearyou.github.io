<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Jobsnearyou</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a href="manageusers.php">
					<h3 class="mt-2"><span class="text-danger">JobsNear</span><span class="text-primary">You</span></h3>
				</a>
                
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                 <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Admin Panel
                            </li>
                             
							<li class="nav-item">
                                <a class="nav-link" href="manageusers.php" ><i class="fa fa-table "></i> Manage Users</a>    
                            </li>
							<li class="nav-item">
                                <a class="nav-link" href="managecategory.php" ><i class="fa fa-table"></i> Manage Category</a>    
                            </li>
							<li class="nav-item">
                                <a class="nav-link" href="managecompany.php" ><i class="fa fa-table"></i> Manage Companies  </a>    
                            </li>
							<li class="nav-item">
                                <a class="nav-link" href="managejobs.php" ><i class="fa fa-table"></i> Manage Jobs</a>    
                            </li>
							<li class="nav-item">
                                <a class="nav-link" href="managejobapply.php" ><i class="fa fa-table"></i> Manage Job Apply </a>    
                            </li>
                           <li class="nav-item">
                                <a class="nav-link" href="manageemployer.php" ><i class="fa fa-table"></i> Manage Employer</a>    
                            </li>
							
							<li class="nav-item">
                                <a class="nav-link" href="managecompreviews.php" ><i class="fa fa-table"></i> Manage Company Reviews </a>    
                            </li>
							
							
							<li class="nav-item">
                                <a class="nav-link" href="managetestimonials.php" ><i class="fa fa-table"></i> Manage Testimonials</a>    
                            </li>
							
							
							<li class="nav-item">
                                <a class="nav-link" href="changepassword.php" ><i class="fa fa-table "></i> Change Password </a>    
                            </li>
							<li class="nav-item">
                                <a class="nav-link" href="logout.php" ><i class="fa fa-table"></i>Logout </a>    
                            </li>
                        </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>


                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                            <img class="user-avatar rounded-circle" src="images/defadmin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="profile.php"><i class="fa fa-user"></i> My Profile</a>

                           
                            <a class="nav-link" href="changepass.php"><i class="fa fa-cog"></i> Settings</a>

                            <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>

                    <div class="language-select dropdown" id="language-select">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                            <i class="flag-icon flag-icon-in"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="language">
						 <div class="dropdown-item">
                                <span class="flag-icon flag-icon-in"></span>
                            </div>
                            <div class="dropdown-item">
                                <span class="flag-icon flag-icon-fr"></span>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-es"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-us"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-it"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </header><!-- /header -->
