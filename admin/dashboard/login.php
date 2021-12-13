</html>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <style>
        body {
            background-color: lavender;
        }

        .card {
            max-width: 330px;
            margin: 70px auto;
            border-radius: 0.36rem;
        }
    </style>
</head>

<body class="text-center">
    <div class="card shadow">
        <div class="card-body">
            <form>
                <img src="../img/logo.png" alt="" style="margin-bottom: 30px">
                <h1 class="h3 mb-3 font-weight-normal">Đăng Nhập</h1><br>
                <!-- <label for="inputEmail" class="sr-only">Tài Khoản/</label> -->
                <!-- <input type="text" class="auth-form__input" required placeholder="Số điện thoại" name="username" id="username" autofocus=""><br> -->
                <input type="text" id="username" name="username" class="form-control" placeholder="Số điện thoại" required autofocus=""><br>
                <!-- <label for="inputPassword" class="sr-only">Mật Khẩu</label> -->
                <input type="password" id="password" name="password" class="form-control" placeholder="Mật Khẩu" required><br>
                <div>
                    <p id="notificationLogin"></p>
                </div>
                <input class="btn btn-lg btn-primary btn-block" type="button" name="submit" onclick="Login()" value="Đăng Nhập">
                <p class="mt-5 mb-3 text-muted">© 2021-2022</p>
            </form>
        </div>
    </div>

    <!-- <div class="modal js-modal">
        <div class="modal__overlay"></div>
        <div class="modal__body js-modal__body--login">
            <div class="auth-form">
                <div class="auth-form__container">
                    <div class="auth-form__header">
                        <h3 class="auth-form__heading">Đăng nhập</h3>
                        <span class="auth-form__switch--btn js-register">Đăng ký</span>
                    </div>
                    <div class="auth-form__form">
                        <div class="auth-form__group">
                            <input type="text" class="auth-form__input" required placeholder="Số điện thoại" name="username" id="username">
                        </div>
                        <div class="auth-form__group">
                            <input type="password" class="auth-form__input" required placeholder="Mật khẩu" name="password" id="password">
                        </div>
                        <div>
                            <p id="notificationLogin"></p>
                        </div>
                    </div>
                    <div class="auth-form__controls">
                        <button class="btn btn--primary" onclick="Login()">ĐĂNG NHẬP</button>
                    </div>
                    <div class="auth-form__help">
                        <a href="#" class="auth-form__help-link auth-form__help-forgot">Quên mật khẩu?</a>
                    </div>
                </div>
            </div>
        </div>
        
    </div> -->
    <script>
           function Login() {
            console.log(username.value);
            var xmlHttp = new XMLHttpRequest();
            var obj = document.getElementById("notificationLogin");
            var url = "a.php";
            var param = "username=" + username.value + "&password=" + password.value;
            xmlHttp.open("POST", url, true);
            xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xmlHttp.send(param);
            xmlHttp.onreadystatechange = function() {
                if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                    if (xmlHttp.responseText == "ok") {
                        location.replace('./index.php');
                    } else {
                        obj.innerHTML = xmlHttp.responseText;
                        
                    }
                }
            }
        }
    </script>
</body>

</html>