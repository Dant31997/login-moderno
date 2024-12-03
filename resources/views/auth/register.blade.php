
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
        
        <form method="post" action="{{ route('register') }}">
            @csrf
            <div class="cotainer">
                <div class="congrup">
                    <input type="text" id="user" class="form_input" placeholder=" " name="name">
                    <label for="user" class="form_label"></i> Nombre
                    </label>
                    <span class="form_line"></span>
                </div>
                <div class="congrup">
                    <input type="email" id="correo" class="form_input" placeholder=" " name="email">
                    <label for="correo" class="form_label"></i> Correo
                    </label>
                    <span class="form_line"></span>
                </div>
                <div class="congrup">
                    <input type="password" id="contra" class="form_input" placeholder=" " name="password">
                    <label for="contra" class="form_label"></i> Contraseña
                    </label>
                    <i class="fa-solid fa-eye show-password" id="togglePassword"></i>
                    <span class="form_line"></span>
                </div>
                <div class="congrup">
                    <input type="password" id="contra_confirmation" class="form_input" placeholder=" " name="password_confirmation">
                    <label for="contra_confirmation" class="form_label"></i> Confirmar Contraseña
                    </label>
                    <span class="form_line"></span>
                </div>
                <div class="congrup">
                    <label for="role" class="form_label"></label>
                    <select name="role" id="role" class="form_input">
                        <option value="employee">Empleado</option>
                        <option value="admin">Admin</option>
                    </select>
                    <span class="form_line"></span>
                </div>
                <input class="form_submit" type="submit" value="Registrar">
            </div>

        </form>
    </div>
    <script src="http://localhost/LOGIN-MODERNO/resources/js/show.js"></script>
</body>

</html>
