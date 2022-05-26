Educación Continua UTS!

Sistema para el control de cursos de Educación Continua.

## Pre-requisitos

- Instalar [Docker.](https://www.docker.com/get-started)
- Instalar [Docker Compose.](https://docs.docker.com/compose/install/)
- Instalar [Composer.](https://getcomposer.org/doc/00-intro.md) Un administrador de dependencias para PHP


## Instalación

 - Clonar repositorio `https://github.com/JoseRazo/educon.git`
 - Abrir proyecto con terminal `~/Developer/laravel/educon (main)$`
 - Generar imagen docker y contenedores **`docker-compose up -d`**
 - Entrar al contenedor pagos_app **`docker exec -it educon_app /bin/sh`**
 - Ejecutar comando **`composer install`** ó **`composer install --ignore-platform-reqs`**
 - Crear archivo .env y editar conexion a base de datos y servidor de correo.
 - Ejecutar el comando  **`php artisan key:generate`**
 - Crear migraciones **`php artisan migrate`**
 - Crear usuarios con seeders **`php artisan db:seed`**

## Abrir proyecto
Abrir navegador y entrar a URL [127.0.0.1:8888](http://127.0.0.1:8888)