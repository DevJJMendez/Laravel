# Middleware

Los middlewares en Laravel son filtros que se aplican a las solicitudes HTTP entrantes en una aplicación. Proporcionan una forma conveniente de filtrar y manipular las solicitudes antes de que lleguen a las rutas o controladores, y también permiten realizar acciones después de que se procesa la solicitud.

---

**Funciones de los middlewares en Laravel:**

- Filtrado de solicitudes: Los middlewares pueden inspeccionar y filtrar solicitudes entrantes antes de que alcancen las rutas. Esto permite realizar validaciones, autorizaciones, verificaciones de autenticación, entre otros.

- Modificación de solicitudes y respuestas: Los middlewares pueden modificar tanto las solicitudes entrantes como las respuestas salientes. Por ejemplo, pueden agregar encabezados HTTP, modificar parámetros de solicitud, o incluso abortar la solicitud si no cumple con ciertas condiciones.

- Procesamiento antes y después de las rutas: Los middlewares pueden realizar acciones antes y después de que una solicitud llegue a una ruta o un controlador. Esto es útil para realizar tareas como el registro de actividad, la manipulación de datos, la gestión de sesiones, etc.

---

**Implementacion de Middlewares en Laravel:**
Los middlewares en Laravel se pueden aplicar a rutas específicas o de forma global. Algunos middlewares predefinidos en Laravel incluyen la autenticación (_auth_), la verificación de CSRF (_csrf_), la protección de XSS (_protectXSS_), entre otros.

---

**Creacion de Middlewares Personalizados:**

```bash
php artisan make:middleware NombreDelMiddleware
```

Esto generará un nuevo middleware llamado **NombreDelMiddleware.php** en el directorio `app/Http/Middleware`. En este archivo, puedes definir la lógica que se ejecutará antes o después de las solicitudes.

---

**Asignacion de Middlewares:**

- A nivel global: Puedes asignar middlewares a nivel global en el archivo `App\Http\Kernel.php` en la propiedad **$middleware**, donde se aplicarán a todas las solicitudes entrantes.

- A nivel de ruta: Puedes asignar middlewares a rutas específicas en el archivo `routes/web.php` o `routes/api.php`, utilizando el método **middleware()**.

- A nivel de grupo de rutas: Puedes agrupar rutas y asignar middlewares a ese grupo particular usando **middleware()**.

---

**Estructura de una Middleware:**

La estructura de un middleware en Laravel sigue un patrón simple y consiste en una clase que implementa la interfaz _Middleware_ o _MiddlewareInterface_. Esta clase contiene un método principal llamado `handle()` que procesa la solicitud entrante y puede realizar acciones **antes** o **después** de que la solicitud llegue a su destino.

Ejemplo:

```php
<?php

namespace App\Http\Middleware;

use Closure;

class EjemploMiddleware
{
    /**
     * Maneja una solicitud entrante.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Acciones que se ejecutarán antes de que la solicitud alcance su destino

        $response = $next($request);

        // Acciones que se ejecutarán después de que la solicitud haya sido manejada por su destino

        return $response;
    }
}

```

El método `handle()` es el punto de entrada del middleware y recibe dos parámetros:

- **$request:** Objeto de solicitud que representa la solicitud HTTP entrante.

- **$next:** Representa el siguiente paso en la cadena de middlewares o la acción final que se ejecutará.

- Dentro de `handle()`, puedes realizar operaciones antes de que la solicitud llegue a su destino utilizando la lógica que desees. Luego, se llama a `$next($request)`, que pasa la solicitud al siguiente middleware en la cadena o al controlador/ruta final. Si es necesario, puedes realizar acciones después de que se maneje la solicitud y antes de devolver la respuesta.

---

**Registro de Middleware:**

Para registrar un middleware personalizado, debes agregarlo en el archivo `App\Http\Kernel.php` en la propiedad **$routeMiddleware** o **$middlewareGroups**, dependiendo de si deseas aplicarlo a rutas específicas o de manera global.

```php
protected $routeMiddleware = [
    // ...
    'miMiddleware' => \App\Http\Middleware\EjemploMiddleware::class,
];
```

Una vez registrado, puedes usar 'miMiddleware' como nombre del middleware al aplicarlo a rutas o grupos de rutas específicos.

---

En el archivo `app\Http\Kernel.php` de Laravel, hay tres propiedades que se utilizan para registrar y organizar los middlewares de la aplicación: **$middleware**, **$middlewareGroups** y **$routeMiddleware**.

- **$middleware**:
  - Descripcion: La propiedad _$middleware_ contiene middlewares globales que se ejecutan en cada solicitud HTTP de la aplicación.
  - Funcion: Estos middlewares se ejecutan en cada solicitud sin importar la ruta o grupo de rutas.

```php
protected $middleware = [
    // Middlewares globales que se ejecutan en cada solicitud HTTP
    \App\Http\Middleware\EncryptCookies::class,
    \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
    \Illuminate\Session\Middleware\StartSession::class,
    // ... otros middlewares globales
];
```

---

- **$middlewareGroups**:
  - Descripcion: La propiedad _$middlewareGroups_ organiza los middlewares en grupos predefinidos, como 'web' y 'api'.
  - Funcion: Estos middlewares se aplican a grupos específicos de rutas, lo que permite definir conjuntos comunes de middlewares para diferentes tipos de rutas (por ejemplo, rutas web o rutas de API).

```php
protected $middlewareGroups = [
    'web' => [
        // Middlewares asignados al grupo 'web' (por ejemplo, para rutas web)
        \App\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        // ... otros middlewares para el grupo 'web'
    ],

    'api' => [
        // Middlewares asignados al grupo 'api' (por ejemplo, para rutas API)
        'throttle:api',
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
        // ... otros middlewares para el grupo 'api'
    ],
];
```

---

- **$routeMiddleware**:
  Descripcion: La propiedad $routeMiddleware asigna middlewares a nombres específicos.
  Funcion: Se utilizan para asignar nombres legibles a los middlewares, permitiendo su uso al asignarlos a rutas o grupos de rutas específicos. Por ejemplo, 'auth' se utiliza para verificar la autenticación del usuario, y 'admin' puede ser utilizado para verificar si un usuario es un administrador.

```php
protected $routeMiddleware = [
    'auth' => \App\Http\Middleware\Authenticate::class,
    'admin' => \App\Http\Middleware\AdminMiddleware::class,
    // ... otros middlewares asignados a nombres específicos
];
```

---

#### Proteger ruta API

Ejemplo sencillo:

- Creamos el middleware:

```bash
php artisan make:middleware example
```

- Registramos el middleware:

```php
protected $routeMiddleware = [

        // Otros middlewares
        'example' => \App\Http\Middleware\Example::class,
    ];
```

- creamos un controlador para la ruta:

```bash
php artisan make:controller exampleController
```

<!-- controlador -->

- En api.php (rutas APIs):

```php
// ruta sin proteccion
Route::middleware('example')->get('/', [exampleController::class, 'index'])->name('index');
// ruta protegida
Route::get('/no-access', [exampleController::class, 'noAccess'])->name('no-access');
```

- En el controlador:

```php
class exampleController extends Controller
{
    public function index()
    {
        return response()->json('route without protection', 200);
    }
    public function noAccess()
    {
        return response()->json('route with protection', 200);
    }
}
```

- En el middleware

```php
class Example
{
    public function handle(Request $request, Closure $next)
    {
        // Protege la ruta
        return redirect()->route('no-access');

        // No protege la ruta
        return $next($request);
    }
}
```

---

#### Proteger grupos de rutas

Tambien podemos tener varios middlewares.

```php
Route::middleware(['example','admin','auth'])->group(function () {

    Route::middleware('example')->get('/', [exampleController::class, 'index']);
    Route::middleware('example')->get('/', [exampleController::class, 'index'])

    // si no queremos que esta ruta tenga un middleware en especifico
    Route::middleware('example')->get('/', [exampleController::class, 'index'])->withoutMiddleware('admin');


    // otras rutas
});
```

---

#### Middleware en el controlador en base a su constructor

- En api.php dejamos las rutas sin middleware:

```php
Route::get('/', [exampleController::class, 'index'])->name('index');
Route::get('/no-access', [exampleController::class, 'noAccess'])->name('no-access');
```

- En el controlador:

```php
class exampleController extends Controller
{
    public function __construct()
    {
        $this->middleware('example');
    }
    public function index()
    {
        return response()->json('route without protection', 200);
    }
    public function noAccess()
    {
        return response()->json('route with protection', 200);
    }
}
```
