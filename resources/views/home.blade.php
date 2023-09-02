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
    <link rel="stylesheet" href="{{asset('css/home.css') }}">
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

    <div class="header">
        <div class="container ">
            <a href="#" class="logo">
                <div class="flex-center">
                    <img src="../image/logo.png" alt="">
                    <h2 class="f-20 c-black">PharmacyBee</h2>
                    <span class="bar"><i class="fa fa-bars"></i></span>

                </div>
            </a>

            <div class="nav">
                <ul>
                    <li><a href="#" class="active">Home</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#pharmacies">Pharmacies</a></li>
                    <li><a href="#artical">Artical</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#pricing">Pricing</a></li>
                    <li><a href="#Contact">Contact</a></li>
                </ul>
            </div>

            <div class="icon">
                <span> <i class="fas fa-search"></i></span>
                <span class="bell"> <i class="fa fa-bell"></i></span>
                <span class="shopping"><i class="fa fa-shopping-cart"></i></span>
                <span><img src="../image/profile.jpg" alt=""></span>
            </div>
        </div>
    </div>

    <div class="landing ">
        <div class="container">
            <div class="text">
                <div class="title">
                    ParmacyBee help you to find solution for your health
                </div>

                <div class="parag">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Debitis velit itaque doloremque totam eligendi eos inventore harum iusto molestiae
                    </p>
                </div>

                <div class="link">
                    <a href="login" class="one">get start <i class="fas fa-chevron-right"></i></a>
                    <a href="#" class="tow"><i class="fas fa-map-marker-alt"></i>Our Location </a>

                </div>
            </div>
            <!-- <div class="image">
                <img src="../image/landing.jpg" alt="">
            </div> -->
        </div>
    </div>

    <div class="session-one" id="services">
        <h2 class="component">Our Services</h2>
        <div class="container">
            <div class="box">
                <div class="icons">
                    <a href="#" class="icon">
                        <i class="fa fa-heartbeat" aria-hidden="true"></i>
                    </a>
                </div>
                <h4>Pharmacy Suppord</h4>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    similique nesciunt corporis ut, itaque asperiores at fuga porro fugit.
                </p>
            </div>

            <div class="box">
                <div class="icons">
                    <a href="#" class="icon">
                        <i class="fa fa-heartbeat" aria-hidden="true"></i>
                    </a>
                </div>
                <h4>Pharmacy Suppord</h4>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    similique nesciunt corporis ut, itaque asperiores at fuga porro fugit.
                </p>
            </div>

            <div class="box">
                <div class="icons">
                    <a href="#" class="icon">
                        <i class="fa fa-line-chart" aria-hidden="true"></i>
                    </a>
                </div>
                <h4>Pharmacy Suppord</h4>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    similique nesciunt corporis ut, itaque asperiores at fuga porro fugit.
                </p>
            </div>
        </div>
    </div>

    <div class="pharmacy-session" id="pharmacies">
        <div class="container">
            <h3 class="component">Our PharmacyBee</h3>
            <div class="prog">
                <p>Lectus pulvinar tincidunt accumsan ullamcorper dolor acsed facilisis molestie aliquam.</p>
                <a href="showpharmacy">View all <i class="fas fa-angle-right change-background fa-2x"></i></a>
            </div>

            <div class="content">
                <div class="box">
                    <img src="image/pharmacist.jpg" alt="">
                    <div class="text">
                        <h4>Yassin Al Hammoud</h4>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <a href="profilepharmacy">visit</a>
                    </div>
                </div>

                <div class="box">
                    <img src="image/pharmacist2.png" alt="">
                    <div class="text">
                        <h4>Yassin Al Hammoud</h4>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <a href="profilepharmacy">visit</a>
                    </div>
                </div>

                <div class="box">
                    <img src="image/pharmacist4.jpg" alt="">
                    <div class="text">
                        <h4>Yassin Al Hammoud</h4>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <a href="profilepharmacy">visit</a>
                    </div>
                </div>

                <div class="box">
                    <img src="image/pharmacist3.jpg" alt="">
                    <div class="text">
                        <h4>Yassin Al Hammoud</h4>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <a href="profilepharmacy">visit</a>
                    </div>
                </div>
                <!-- <span class="more" ><i class="fas fa-angle-right change-background fa-2x"></i></span> -->
            </div>
        </div>
    </div>

    <!-- Artical Session -->
    <h2 class="component" id="artical">Our artical</h2>

    <div class="artical">
        <div class="image">
            <img src="/image/covid.jpg" alt="">
        </div>

        <div class="paragraph">
            <h2>COVID-19</h2>
            <div class="content">
                <p class="first">
                    Eget lacinia libero, metus maecenas commodo vel auctor.
                    Augue enim libero in gravida.
                    Eget lacinia libero, metus maecenas commodo vel auctor.
                    Augue enim libero in gravida.
                    Diam quisque convallis quis tellus feugiat.
                </p>
                <br>
                <p class="second">Morbi scelerisque volutpat sed viverra nulla Interdum mia bibendum velit sapien scelerisque.
                    Dictum quam tincidunt nec feugiat augue vel tincidunt. Etiam pretium nec diam rhoncus.
                    gravida in turpis cursus. Nunc, sed fringilla tortor, iaculis eget eget felis dictum.
                </p>

            </div>
        </div>
        <div class="other">
            <div class="box">
                <img src="/image/cov.jpg" alt="">
                <h2>COVID-19 Vaccinations</h2>
                <a href="#" class="show-more-link" data-target="target-section-1">Show More</a>
            </div>

            <div class="box">
                <img src="/image/cov.jpg" alt="">
                <h2>COVID-19 Vaccinations</h2>
                <a href="#" class="show-more-link" data-target="target-section-1">Show More</a>
            </div>

            <div class="box">
                <img src="/image/cov.jpg" alt="">
                <h2>COVID-19 Vaccinations</h2>
                <a href="#" class="show-more-link" data-target="target-section-2">Show More</a>
            </div>

            <div class="box">
                <img src="/image/cov.jpg" alt="">
                <h2>COVID-19 Vaccinations</h2>
                <a href="#">Show Details</a>
            </div>
        </div>
    </div>

    <div id="target-section-1" class="target-section" style="display: none;">
        <div class="image">
            <img src="../image/profile.jpg" alt="" class="article-image">
        </div>
        <div class="paragraph">
            <h2>New Article 1</h2>
            <div class="content">
                <p class="first">
                    This is the new article's first paragraph for Box 1.
                </p>
                <br>
                <p class="second">This is the new article's second paragraph for Box 1.</p>
            </div>
        </div>
    </div>

    <div id="target-section-2" class="target-section" style="display: none;">
        <div class="image">
            <img src="../image/profile.jpg" alt="" class="article-image">
        </div>
        <div class="paragraph">
            <h2>New Article 2</h2>
            <div class="content">
                <p class="first">
                    This is the new article's first paragraph for Box 2.
                </p>
                <br>
                <p class="second">This is the new article's second paragraph for Box 2.</p>
            </div>
        </div>
    </div>

    <!-- About Session -->
    <div class="about">
        <h1 class="component" id="about">about Us</h1>
        <div class="container ">
            <div class="imag">
                <img src="image/about.jpg" alt="">
            </div>
            <div class="info">
                <p class="top">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis animi natus sequi
                    enim eveniet esse
                    minima fuga at quidem. Repudiandae nemo consequuntur sint atque sit sequi ad illum. Exercitationem,
                    quasi!</p>

                <p class="bottom ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto id eum
                    saepe aut qui facilis
                    repudiandae, quos odit cupiditate exercitationem pariatur a animi? Esse praesentium inventore nam,
                    aut voluptatem qui.</p>
            </div>
        </div>
    </div>

    <!-- Pricing card -->
    <h2 class="component" id="pricing">Our Pricing</h2>

    <div class="pricing">
          <div class="container">
          <div class="content">
                <div class="plan">
                    <div class="head">
                        <h3>Basic</h3>
                        <span>19</span>
                    </div>
                    <ul>
                        <li>Feature No 1</li>
                        <li>Feature No 2</li>
                        <li>Feature No 3</li>
                        <li>Feature No 4</li>
                    </ul>
                    <div class="foot">
                        <a href="#">By now</a>
                    </div>
                </div>
                <div class="plan">
                    <div class="head">
                        <h3>Basic</h3>
                        <span>19</span>
                    </div>
                    <ul>
                        <li>Feature No 1</li>
                        <li>Feature No 2</li>
                        <li>Feature No 3</li>
                        <li>Feature No 4</li>
                    </ul>
                    <div class="foot">
                        <a href="#">By now</a>
                    </div>
                </div>
            </div>
      
          </div>
    </div>

    <!-- Card Session -->
    <div class="card-session">
        <div class="container">
            <h2>medical advice</h2>
            <p>put your name to get advice for your health</p>
            <div class="form-content">
                <input type="text" id="username-input" placeholder="Username">
                <button class="submit" onclick="showPopup()">Submit</button>
            </div>
        </div>
    </div>

    <script>
        const messages = [
            "Hello {USERNAME}, you should drink enough water every day.",
            "Hey {USERNAME}, remember to stay hydrated by drinking sufficient water.",
            "Hi {USERNAME}, it's important to consume an adequate amount of water daily for your health."
        ];

        function showPopup() {
            const usernameInput = document.getElementById('username-input');
            const username = usernameInput.value;

            if (messages.length > 0) {
                const randomIndex = Math.floor(Math.random() * messages.length);
                const randomMessage = messages[randomIndex];
                alert(randomMessage.replace("{USERNAME}", username));
            } else {
                alert("No messages available.");
            }

            usernameInput.value = '';
        }
    </script>



    <!-- Footer Session -->
    <div class="footer">
        <h2>PharmacyBee</h2>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.
            vel libero nihil suscipit neque provident, incidunt, eos illo pariatur
        </p>
        <div class="last">
            © 2021 <span>PharmacyBee</span> All Right Reserved

        </div>
    </div>


    <!-- This Code Js For Artical Session-->
    <script>
        const showMoreLinks = document.querySelectorAll('.show-more-link');
        const targetSections = document.querySelectorAll('.target-section');

        showMoreLinks.forEach((link) => {
            link.addEventListener('click', (event) => {
                event.preventDefault();
                const target = link.getAttribute('data-target');
                const targetSection = document.getElementById(target);

                if (targetSection) {
                    const articleImage = document.querySelector('.article-image');
                    const firstParagraph = document.querySelector('.first');
                    const secondParagraph = document.querySelector('.second');

                    // Replace the image
                    articleImage.src = targetSection.querySelector('.article-image').src;

                    // Replace the paragraph content
                    firstParagraph.textContent = targetSection.querySelector('.first').textContent;
                    secondParagraph.textContent = targetSection.querySelector('.second').textContent;
                }
            });
        });
    </script>

</body>

</html>