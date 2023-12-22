# Instalacion:

- **Composer:**

```bash
composer create-project laravel/laravel nombre_del_proyecto
```

Una vez que se haya completado la instalación, navega a la carpeta del proyecto
y ejecuta el servidor de desarrollo de Laravel con el siguiente comando:

```bash
php artisan serve
```

---

- **artisan:**

Instalacion global de Laravel

_este comando de utiliza una sola vez_

```bash
composer global require laravel/installer
```

Crear un Nuevo Proyecto Laravel:

```bash
laravel new nombre_del_proyecto
```

```bash
php artisan serve
```

# Directorio MVC en Laravel

- app -> Models

- resources -> views

- app -> Http -> Controllers

# Directorio general

- vite.config.js -> Desde la version de 10 de Laravel hace uso de Vite como empaquetador web

- _phpunit.xml_ -> configuraciones para testing

- _package.json_ -> gestiona las dependencias atraves de `Node`

- _composer.lock_ - _composer.json_ -> configuracion de los distintos paquetes requeridos en los entornos de desarrollo.

- _artisan_ -> gestor de comandos.

- _env_ -> archivo de configuración que almacena variables de entorno específicas de la aplicación.

---

- **vendor** -> almacena codigo de dependencias de nuestro proyecto.

- **tests** -> aca ubicamos nuestros test (unitarios, features)

- **storage** -> almacena ficheros (imagen de perfil, documentos etc)

- **routes** -> contiene 4 archivos:

  - _api.php_: ubicamos las rutas de nuestras APIs.

  - _channels.php_: emite eventos (transmite las acciones que realiza nuestro sistema: creacion de un post, creacion de un comentario, creacion de un factura,creacion de un usuario etc).

  - _console.php_: aca definimos los diferentes comandos que dispongamos en nuestro sistema.

  - _web.php_: aca definimos las rutas del navegador.

- **resources** -> aca ubicamos los recursos front-end que necesita nuestro proyecto.

- **public** -> es el punto de acceso a nuestro sistema.

- **lang** -> aca configuramos los idiomas

- **database** -> contiene 4 carpetas:

  - factories: para generar datos masivos (para testing).

  - migrations: define la representacion de datos en el sistema de persistencia.

  - seeders: inyecta informacion a la base de datos.

- **config** -> configuracion general del sistema.

- **bootstrap** -> es el encargado de levantar el servicio.

- **app** -> back-end de la aplicacion.
