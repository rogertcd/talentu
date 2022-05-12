# Leeme

Test para Talentu


# Contenido

- API para listar ofertas laborales asociadas a usuarios



## Despliegue en HEROKU
https://talentu-laravel-test.herokuapp.com/

## Requerimientos

- Apache >2
- PHP >7.4  
- Laravel 8
- MongoDB

## Instalaci&oacute;n
Instalar las depenencias

    composer install

## Ejecutar app
Levante el servidor con 

    php artisan serve

## Endpoints

- [ ] APIs

> /api/auth/login

> /api/ofertas/list

La primera es para autenticaci&oacute;n y obtenci&oacute;n de un token de seguridad

La segunda es para obtener el listado de ofertas con los usuarios asociados a cada una de ellas, para lo cual, es necesario enviar el token obtenido con el primer endpoint.

## Datos para pruebas

**email:** test@testing.com

**password:** password


## Tiempo de desarrollo

24 horas aproximadamente
