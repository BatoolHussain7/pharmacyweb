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
    <link rel="stylesheet" href="{{asset('css/login.css') }}">
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
    <div class="login">
        <!-- <div class="dots dots-up"></div>
        <div class="dots dots-down"></div> -->
        <div class="content">
            <p class="title c-black">Login</p>
            <form action="">
                <div class="form-content">
                    <input type="email" placeholder="Email">
                    <i class="fas fa-user"></i>
                </div>
                <div class="form-content">
                    <input type="password" placeholder="Password">
                    <i class="fas fa-lock"></i>
                </div>
                <button class="submit">Login <i class="fas fa-chevron-right"></i></button>
                <div class="link">
                    <a href="choose_your_role">don't have account</a>
                    <a href="#">forget your password</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>