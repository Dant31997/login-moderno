<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/03ca14290a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="http://localhost/LOGIN-MODERNO/resources/css/index.css">
    <title>Document</title>
</head> 

<body>
    <div class="formulario">
        <div class="container-logo">
            <div class="logo-principal">
                <img src="http://localhost/LOGIN-MODERNO/resources/img/pixelcut-export.png" />
            </div>
        </div>
        <form method="post" action="{{ route('login') }}">
            @csrf
            <div class="cotainer">
                <div class="congrup">
                    <input type="email" id="correo" class="form_input" placeholder=" " name="email">
                    <label for="correo" class="form_label"></i> Correo
                    </label>
                    <span class="form_line"></span>
                </div>
                <div class="congrup">
                    <input type="password" id="contra" class="form_input" placeholder=" " name="password">
                    <label for="contra" class="form_label">
                        <i class="fa-solid fa-lock" style="color: #e8def8;"></i> Contraseña
                    </label>
                    <i class="fa-solid fa-eye show-password" id="togglePassword"></i>
                    <span class="form_line"></span>
                </div>
                <input class="form_submit" type="submit" value="Iniciar Sesion">
                <div class="congrup">
                    <input class="recuperar-pass" type="submit" value="Recuperar Contraseña">
                </div>
            </div>
        </form>
    </div>
    <script src="http://localhost/LOGIN-MODERNO/resources/js/show.js"></script>
</body>

</html>

