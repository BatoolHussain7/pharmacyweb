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
    <link rel="stylesheet" href="{{asset('css/showcompany.css') }}">
    <!-- <link rel="stylesheet" href="{{asset('css/friends.css') }}"> -->
    <!--Main tamplate css file  -->
    <!-- <link rel="stylesheet" href="{{asset('css/home.css') }}"> -->
    <!-- <link rel="stylesheet" href="{{asset('css/profile.css') }}"> -->
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


            <div class="part-one">
                <!--H1 Component-->
                <div class="container">
                    <div class="header-page">
                        <div class="title">here is all our Companies</div>
                    </div>
                    <div class="link">
                        <a href="HomeOfPharmacy" class="h"><i class="fa fa-home home" aria-hidden="true"></i>Home</a>
                        <i class="fas fa-angle-right change-background fa-2x"></i>
                        <a href="profilepharmacy"><i class="fa fa-users user" aria-hidden="true"></i>Companies</a>
                    </div>
                </div>

            </div>

            <div class="sort">
                <button>Sort by<i class="fa fa-caret-down"></i></button>
            </div>

            <div class="friend-page">

                <div class="box ">
                    <div class="contact">
                        <i class="fa-solid fa-phone"></i>
                        <i class="fa-regular fa-envelope"></i>
                    </div>

                    <div class="info">
                        <img src="image/pharmacist.jpg">
                        <div class="info2">
                            <h2>Ahmad Nasser</h2>
                            <div class="stars">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <div class="smile">
                        <i class="fa-regular fa-face-smile "></i> <span> Friend</span>
                    </div>

                    <div class="line ">
                        <i class="fa-solid fa-code-commit "></i> <span> 15 Projects</span>
                    </div>

                    <div class="key mb-15">
                        <i class="fa-regular fa-newspaper "></i> <span>25 Articles</span>
                    </div>

                    <div class="foot">
                        <span>Joined 02/10/2021</span>
                        <div class="buttom">
                            <a href="profilepharmacy" class="one">visit</a>
                        </div>
                    </div>
                </div>

                <div class="box ">
                    <div class="contact">
                        <i class="fa-solid fa-phone"></i>
                        <i class="fa-regular fa-envelope"></i>
                    </div>

                    <div class="info">
                        <img src="image/pharmacist.jpg">
                        <div class="info2">
                            <h2>Ahmad Nasser</h2>
                            <div class="stars">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <div class="smile">
                        <i class="fa-regular fa-face-smile "></i> <span> Friend</span>
                    </div>

                    <div class="line ">
                        <i class="fa-solid fa-code-commit "></i> <span> 15 Projects</span>
                    </div>

                    <div class="key mb-15">
                        <i class="fa-regular fa-newspaper "></i> <span>25 Articles</span>
                    </div>

                    <div class="foot">
                        <span>Joined 02/10/2021</span>
                        <div class="buttom">
                            <a href="profilepharmacy" class="one">visit</a>
                        </div>
                    </div>
                </div>

                <div class="box ">
                    <div class="contact">
                        <i class="fa-solid fa-phone"></i>
                        <i class="fa-regular fa-envelope"></i>
                    </div>

                    <div class="info">
                        <img src="image/pharmacist.jpg">
                        <div class="info2">
                            <h2>Ahmad Nasser</h2>
                            <div class="stars">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <div class="smile">
                        <i class="fa-regular fa-face-smile "></i> <span> Friend</span>
                    </div>

                    <div class="line ">
                        <i class="fa-solid fa-code-commit "></i> <span> 15 Projects</span>
                    </div>

                    <div class="key mb-15">
                        <i class="fa-regular fa-newspaper "></i> <span>25 Articles</span>
                    </div>

                    <div class="foot">
                        <span>Joined 02/10/2021</span>
                        <div class="buttom">
                            <a href="profilepharmacy" class="one">visit</a>
                        </div>
                    </div>
                </div>

                <div class="box ">
                    <div class="contact">
                        <i class="fa-solid fa-phone"></i>
                        <i class="fa-regular fa-envelope"></i>
                    </div>

                    <div class="info">
                        <img src="image/pharmacist.jpg">
                        <div class="info2">
                            <h2>Ahmad Nasser</h2>
                            <div class="stars">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <div class="smile">
                        <i class="fa-regular fa-face-smile "></i> <span> Friend</span>
                    </div>

                    <div class="line ">
                        <i class="fa-solid fa-code-commit "></i> <span> 15 Projects</span>
                    </div>

                    <div class="key mb-15">
                        <i class="fa-regular fa-newspaper "></i> <span>25 Articles</span>
                    </div>

                    <div class="foot">
                        <span>Joined 02/10/2021</span>
                        <div class="buttom">
                            <a href="profilepharmacy" class="one">visit</a>
                        </div>
                    </div>
                </div>

                <div class="box ">
                    <div class="contact">
                        <i class="fa-solid fa-phone"></i>
                        <i class="fa-regular fa-envelope"></i>
                    </div>

                    <div class="info">
                        <img src="image/pharmacist.jpg">
                        <div class="info2">
                            <h2>Ahmad Nasser</h2>
                            <div class="stars">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <div class="smile">
                        <i class="fa-regular fa-face-smile "></i> <span> Friend</span>
                    </div>

                    <div class="line ">
                        <i class="fa-solid fa-code-commit "></i> <span> 15 Projects</span>
                    </div>

                    <div class="key mb-15">
                        <i class="fa-regular fa-newspaper "></i> <span>25 Articles</span>
                    </div>
                    
                    <div class="foot">
                        <span>Joined 02/10/2021</span>
                        <div class="buttom">
                            <a href="profilepharmacy" class="one">visit</a>
                        </div>
                    </div>
                </div>
            </div>
</body>

</html>