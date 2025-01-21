<p align="center">
<img src="/public/images/logo.png" alt="Logo" width="400">
</p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href=""><img src="https://poser.pugx.org/phpunit/phpunit/require/php" alt="PHP version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Sobre ChanGame

La aplicación web proporciona un espacio donde un usuario tiene la posibilidad de ofrecer un juego que ya no utiliza, de forma que le permita la posibilidad de obtener a cambio otro de igual o distinta naturaleza. Todo ello, mediante el establecimiento de una serie de premisas que se deben cumplir. 

se parte de idea de que un juego puede tener distintas vidas de uso, o más concretamente, con el principio de que distintas personas puedan utilizar de un mismo juego. Por este motivo, se ha desarrollado una aplicación que proporciona una plataforma donde se puede ofrecer un juego propio, con idea de localizar a alguien que pueda estar interesado en él, de forma que se pueda alcanzar un acuerdo de intercambio. Esta aplicación permite localizar juegos a través de distintos criterios de búsqueda. Uno de los elementos más relevante de la aplicación es la posibilidad de gestión de los productos propios, así como los juegos de aquellas personas potenciales con las que se puede llegar a un acuerdo.

A nivel técnico, se desarrolla una aplicación web híbrida progresiva (PWA) con diseño resposive, de forma que puede usarse a través de un dispositivo movil, mediante el uso de Laravel como framework de desarrollo con php, un sistema de gestión de bases de de datos como mysql, una biblioteca de diseño como Bootstrap, interfaces de aplicaciones API-REST con JSON y plugins específicos que servirán para la mejora la usabilidad web. 

## Instalación de la aplicación

1. Clona o descarga el repositorio y sitúalo en el servidor.
2. En el terminal ejecuta los siguientes comandos
   * `composer install ` 
   * `cp .env.example .env `
3. Crea una base de datos y modifica el archivo `.env` con la base de datos creada. Elige un usario y password para la base de datos creada. 

4. Además, si se quiere cambiar el idioma a español. Debes indicar el idioma en el archivo `.env`
     ```
     APP_LOCALE=es
     ```
5. Incluir los parámetros en el archivo `.env` para las siguientes APIs
   * MailChaimp para NewsLetter [info+](https://mailchimp.com/es/help/about-api-keys/)
        ```
        MAILCHIMP_KEY=
        MAILCHIMP_LIST_SUBSCRIBERS=
        ```
   * Pusher para Chat [info+](https://pusher.com/docs/channels/getting_started/javascript/?ref=nav)
        ```
        PUSHER_APP_ID=
        PUSHER_APP_KEY=
        PUSHER_APP_SECRET=
        PUSHER_APP_CLUSTER=
        ```
   * Google para Login [info+](https://developers.google.com/workspace/guides/create-credentials)
        ```
        GOOGLE_OAUTH_ID=
        GOOGLE_OAUTH_KEY=
        GOOGLE_OAUTH_REDIRECT=
        ```
6. Genera las tablas de las base de datos `php artisan migrate --seed`
7. Genear la clave del proyecto Laravel `php artisan key:generate`
8. Ejecutar `npm install && npm run dev` (modo de desarrollo)
9. Generar los enlaces para los archivos locales `php artisan storage:link`
10. Ejecutar `php artisan serve` 

**Observación:** Es recomendable disponer de un usuario de rol administrador. Por lo que se en la instalación se ha creado un usuario administrador base. 

```
// Crear un nuevo usuario con un rol administrador
$user = User::create([
    'name' => 'Administrator',
    'email' => 'admin@changame.com',
    'password' => bcrypt('password'),
    'role' => 'admin',
]);
```

### Datos de prueba

Para probar la aplicación con datos, se puede descargar los archivos de demo para comenzar. Un vez realizado los pasos de instalación se pueden utilizar los siguientes datos de [demo](demo.sql)

Esto se hace desde la base de datos se ejecuta la consulta o a través de la opción de import del archivo `.sql`

### Licencia

Changema está bajo licencia [MIT license](https://choosealicense.com/licenses/mit/)

### Autor

<img src="/public/images/logoJGM.png" alt="Logo" width="50">
