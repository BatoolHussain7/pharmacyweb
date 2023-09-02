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
    <link rel="stylesheet" href="{{asset('css/profilepharmacy.css') }}">
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

            <div class="body">
                <div class="first">
                    <div class="right-side">
                        <img src="image/pharmacist.jpg" alt="">
                    </div>

                    <div class="left-side">
                        <div class="description">
                            <div class="name-rate">
                                <h2>Yassin Jamal</h2>
                                <div class="stars">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>

                            <p>
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                Ipsam officia esse hic corporis dolorem voluptate, accusamus nihil fuga sit.
                                Aut consequuntur asperiores omnis placeat deserunt exercitationem qui error
                            </p>

                            <!-- <div class="button">
                                <button class="conact">conact with me</button>
                                <button class="fav">Add to favourite</button>

                            </div> -->
                            <div class="conact">
                                <div class="conact-part">
                                    <!-- <i class="fa fa-heart-o" aria-hidden="true"></i> -->
                                    <span>add to favourits</span>
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </div>
                                <div class="conact-part">
                                    <span>conact with me</span>
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="middel">
                    <h3>Product</h3>
                    <div class="sort">
                        <button>Sort by
                            <i class="fa fa-caret-down"></i>
                        </button>

                    </div>
                </div>
                <div class="second">
                    <div class="box ">
                        <!-- <div class="contact">
                            <i class="fa-solid fa-phone"></i>
                            <i class="fa-regular fa-envelope"></i>
                        </div> -->

                        <div class="info">
                            <img src="image/banadolavif.avif">
                            <div class="info2">
                                <h2>Banadol</h2>
                                <span>5$</span>
                            </div>
                        </div>
                        <div class="increment">
                            <span class="minus">-</span>
                            <span class="num">00</span>
                            <span class="plus">+</span>
                        </div>
                        <div class="foot">
                            <button class="reset">Reset</button>
                            <button>Add</button>
                        </div>
                    </div>
                    <div class="box ">
                        <!-- <div class="contact">
                            <i class="fa-solid fa-phone"></i>
                            <i class="fa-regular fa-envelope"></i>
                        </div> -->

                        <div class="info">
                            <img src="image/banadolavif.avif">
                            <div class="info2">
                                <h2>Banadol</h2>
                                <span>5$</span>
                            </div>
                        </div>
                        <div class="increment">
                            <span class="minus">-</span>
                            <span class="num">00</span>
                            <span class="plus">+</span>
                        </div>
                        <div class="foot">
                            <button class="reset">Reset</button>
                            <button>Add</button>
                        </div>
                    </div>
                    <div class="box ">
                        <!-- <div class="contact">
                            <i class="fa-solid fa-phone"></i>
                            <i class="fa-regular fa-envelope"></i>
                        </div> -->

                        <div class="info">
                            <img src="image/banadolavif.avif">
                            <div class="info2">
                                <h2>Banadol</h2>
                                <span>5$</span>
                            </div>
                        </div>
                        <div class="increment">
                            <span class="minus">-</span>
                            <span class="num">00</span>
                            <span class="plus">+</span>
                        </div>
                        <div class="foot">
                            <button class="reset">Reset</button>
                            <button>Add</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            const boxes = document.querySelectorAll('.box');

            boxes.forEach((box) => {
                const plus = box.querySelector('.plus');
                const minus = box.querySelector('.minus');
                const num = box.querySelector('.num');
                const reset = box.querySelector('.reset');

                let a = 0;

                plus.addEventListener('click', () => {
                    a++;
                    a = (a < 10) ? '0' + a : a;
                    num.innerText = a;
                    console.log(a);
                });

                minus.addEventListener('click', () => {
                    if (a > 0) {
                        a--;
                        a = (a < 10) ? '0' + a : a;
                        num.innerText = a;
                    }
                });

                reset.addEventListener('click', () => {
                    a = 1;
                    num.innerText = '00';
                });
            });
        </script>



</body>

</html>