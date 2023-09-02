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
    <link rel="stylesheet" href="{{asset('css/register.css') }}">
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
    <div class="dots dots-up"></div>
    <div class="register">
        <div class="content">
            <p class="title c-black">Register</p>
            <form action="">
                <div class="form-content">
                    <input type="text" placeholder="Username">
                    <i class="fas fa-user"></i>
                </div>
                <div class="form-content">
                    <input type="email" placeholder="Email">
                    <i class="fas fa-user"></i>
                </div>
                <div class="form-content">
                    <input type="password" placeholder=" Password">
                    <i class="fas fa-unlock"></i>
                </div>
                <div class="form-content">
                    <input type="password" placeholder="conferm password">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="form-content">
                    <input type="phone" placeholder="phone">
                    <i class="fas fa-unlock"></i>
                </div>
                <button class="submit">redister <i class="fas fa-chevron-right"></i></button>
            </form>
        </div>
    </div>
</body>

</html>