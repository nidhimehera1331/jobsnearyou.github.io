<?php include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>JobEntry - Job Portal Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
            <a href="index.php" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
                <h1 class="m-0 text-primary">JobsNearYou</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="index.php" class="nav-item nav-link  text">Home</a>
										<div class="nav-item dropdown">
                        <a href="#" class="nav-item nav-link  dropdown-toggle" data-bs-toggle="dropdown">Job</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="applyjoball.php" class="dropdown-item">Apply For Job</a>
                            <a href="myjobs1.php" class="dropdown-item">My Jobs</a>
                       
                        </div>
                    </div>

                    
                    <a href="usermsg.php" class="nav-item nav-link ">View Messages</a>
                   
					<div class="nav-item dropdown">
                        <a href="#" class="nav-item nav-link  dropdown-toggle" data-bs-toggle="dropdown">Add Review</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="reviewform1.php" class="dropdown-item">Add Company Reviews</a>
                            <a href="testimonialall.php" class="dropdown-item">Add Testimonial</a>
                           
                       
                        </div>
                    </div>
                   <div class="nav-item dropdown">
                        <a href="#" class="nav-item nav-link  dropdown-toggle" data-bs-toggle="dropdown">Settings</a>
                        <div class="dropdown-menu rounded-0 m-0">
                           <a href="userprofile.php" class="dropdown-item">Profile Settings</a>
                              <a href="uchangepass.php" class="dropdown-item">Change Password</a>
                           
                       
                        </div>
                    </div>
                
                
                   
                    
                   
					
                       
                 
					<div class="nav-item ">
                        <a href="logout.php" class="nav-item nav-link  ">LogOut</a>
                        <div class="">
                            
                        </div>
                    </div>
                </div>
              <button
            </div>
        </nav>
        <!-- Navbar End -->