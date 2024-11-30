<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/03ca14290a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
    <title>BancApp</title>
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
                    <input type="email" id="correo" class="form_input @error('email') is-invalid @enderror" placeholder=" " name="email">
                    <label for="correo" class="form_label">Correo</label>
                    <span class="form_line"></span>
                    @error('email')
                        <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                    @enderror
                </div>
                <div class="congrup">
                    <input type="password" id="contra" class="form_input @error('password') is-invalid @enderror" placeholder=" " name="password">
                    <label for="contra" class="form_label">
                        <i class="fa-solid fa-lock" style="color: #e8def8;"></i> Contraseña
                    </label>
                    <i class="fa-solid fa-eye show-password" id="togglePassword"></i>
                    <span class="form_line"></span>
                    @error('password') 
                        <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                    @enderror
                </div>
                <a href="/"><button class="bn632-hover bn20" type="submit">Iniciar Sesion</button></a>
            </div>
        </form>
    </div>
    <script src="http://localhost/LOGIN-MODERNO/resources/js/show.js"></script>
</body>

</html>
