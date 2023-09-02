<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy</title>
    <!--Framework-->
    <link rel="stylesheet" href="{{asset('css/frame.css') }}">
    <!--Main tamplate css file  -->
    <link rel="stylesheet" href="{{asset('css/profile.css') }}">
    <!--Render all elements normally-->
    <link rel="stylesheet" href="{{asset('css/all.min.css') }}">
    <!--Font awsome library-->
    <link rel="stylesheet" href="{{asset('css/normalize.css') }}">
    <!--Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@300;400;600;900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="page">
        <div class="sidebar ">
            <div class="logo">
                <img src="../image/logo.png" alt="">
                <h2 class="f-20 c-black">PharmacyBee</h2>

            </div>
            </a>
            <ul>

                <li>
                    <a href="/">
                        <i class="fa fa-home home"></i>
                        <span class="hidden">Home</span>
                    </a>
                </li>

                <li>
                    <a href="setting.html">
                        <i class="fa fa-cog"></i>
                        <span class="hidden">My product</span>
                    </a>
                </li>

                <li>
                    <a href="profile.html">
                        <i class="fa fa-user"></i>
                        <span class="hidden">favourite</span>
                    </a>
                </li>

                <li>
                    <a href="/showpharmacy">
                        <i class="fa fa-bar-chart fa-fw"></i>
                        <span class="hidden">Pharmacists</span>
                    </a>
                </li>
                
                <li>
                    <a href="cources.html">
                        <i class="fa fa-book"></i>
                        <span class="hidden">Logout</span>
                    </a>
                </li>
                <!--  <li>
                    <a href="friends.html" >
                        <i class="fa fa-users"></i>
                        <span class="hidden">Friends</span>
                    </a>
                </li>
                <li>
                    <a href="files.html" >
                        <i class="fa fa-file"></i>
                        <span class="hidden">Files</span>
                    </a>
                </li>
                <li>
                    <a href="plan.html">
                        <i class="fa fa-bar-chart fa-fw"></i>
                        <span class="hidden">Plan</span>
                    </a>
                </li> -->
            </ul>
        </div>
        <div class="content">
            <div class="header">
                <div class="search ">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    <input type="search" placeholder="search">
                </div>
                <div class="icons">
                    <span class="bell"> <i class="fa fa-bell"></i></span>
                    <span class="shopping"><i class="fa fa-shopping-cart"></i></span>
                    <img src="image/profile.jpg" alt="">
                </div>
            </div>
            <h2>My Profile</h2>
            <div class="profile-page">
                <div class="profile">

                    <div class="right-side">
                        <img src="image/landing.jpg" alt="">
                        <button class="change">change</button>
                    </div>

                    <div class="left-side">
                        <form action="">
                            <div class="form-content">
                                <div class="including">
                                    <label for='user'>Username</label>
                                    <input type="text" placeholder="" id='user'>
                                </div>
                                <div class="icon">
                                    <a href="#"> <i class="fa fa-pencil"></i></a>
                                </div>
                            </div>
                            <div class="form-content">
                                <div class="including">
                                    <label>Email address</label>

                                    <input type="text" placeholder="">
                                </div>
                                <div class="icon">
                                    <a href="#"> <i class="fa fa-pencil"></i></a>
                                </div>
                            </div>

                            <div class="form-content">

                                <div class="including">
                                    <label for="1">password</label>

                                    <input type="password" placeholder="">
                                </div>
                                <div class="icon">
                                    <a href="#"> <i class="fa fa-pencil"></i></a>
                                </div>
                            </div>
                            <div class="form-content">

                                <div class="including">
                                    <label for="1">password</label>

                                    <input type="password" placeholder="">
                                </div>
                                <div class="icon">
                                    <a href="#"> <i class="fa fa-pencil"></i></a>
                                </div>
                            </div>

                            <button class="submit">Save</button>
                        </form>
                    </div>

                </div>
                <div>,cdolllld</div>

            </div>
        </div>
    </div>
    </div>
</body>

</html>