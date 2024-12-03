# login-moderno
 
1. Cuando se hace un git clone asegurate de realizar un "composer install"
2. Luego ejecuta "cp .env.example .env" para copiar el .env y poder configurar la base de datos 
3. Luego genera  la clave de la aplicacion con "php artisan key:generate"
4. Por ultimo realiza el migrate de la base de datos "php artisan migrate"
5. luego de todo esto al ingresar a servidor http://127.0.0.1:8000 deberas dirigirte a la ruta http://127.0.0.1:8000/register para crear un primer usuario administrador.
opcional: en caso de redirigirte al la pagina /home simplemente debe redirigir por la ruta http://127.0.0.1:8000/dashboard. perdon, nuestro primer bug 🥹.