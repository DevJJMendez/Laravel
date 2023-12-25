# Validacion de los datos que se recepcionan

Laravel ofrece un sólido conjunto de herramientas para validar y controlar los datos que se reciben en las solicitudes HTTP. Estos mecanismos permiten asegurar que los datos cumplen con ciertas reglas y criterios antes de ser procesados o almacenados en la aplicación.

---

## Validación Automática de Request:

Utiliza el método `validate()` en los controladores para validar automáticamente los datos de la solicitud.

Ejemplos de reglas de validacion:

- **required**: El campo debe estar presente en la solicitud y no puede ser nulo o vacío.

- **numeric**: El campo debe ser un valor numérico.

- **email**: El campo debe ser una dirección de correo electrónico válida.

- **string**: El campo debe ser una cadena de texto.

- **max:value**: El campo no puede exceder el valor máximo especificado.

- **min:value**: El campo debe ser igual o mayor al valor mínimo especificado.

- **unique:table**,**column**,**except**,**idColumn**: Verifica que el campo sea único en una tabla específica.

- **exists:table**,**column**: Verifica que el valor del campo exista en una tabla específica y columna.

- **alpha**: El campo debe contener solo letras.

- **alpha_num**: El campo debe contener solo letras y números.

Ejemplo:

```php
public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users|max:255',
        // Otras reglas de validación...
    ]);

    // Procesamiento con los datos validados...
}
```

Pero esta forma no es una buena practica ya que aumenta el numero de lineas del controlador y le añade una responsabilidad (ya no realiza una sola funcion), esto lo resolvemos creando Custom Request.

---

## Validacion Custom Requests (Solicitudes Personalizadas)

Son clases que extienden la clase **Illuminate\Foundation\Http\FormRequest**. Estas clases se utilizan para centralizar y encapsular la lógica de validación de datos de las solicitudes HTTP.

Al crear una Custom Request, puedes definir reglas de validación específicas para una solicitud particular. Esta solicitud encapsula la lógica de validación en una clase separada, lo que ayuda a mantener el controlador más limpio y centrado en la lógica de la aplicación.

Para crear una Custom Request, puedes utilizar el comando `artisan make:request`.

Reglas de convension de nombres:

- CamelCase
- Nombre de la clase primero seguido de la palabra Request

```bash
php artisan make:request StorePostRequest
```

Esto generará una nueva clase dentro del directorio **app/Http/Requests** con el nombre _StorePostRequest.php_. Dentro de esta clase, puedes definir las reglas de validación que deseas aplicar a los datos de la solicitud.

Ejemplo simple de una Custom Request:

```php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Se puede definir la autorización aquí si es necesario
    }

    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'body' => 'required',
            // Otras reglas de validación...
        ];
    }
}
```

Luego, en el controlador, se utiliza la Custom Request en lugar de la Request estandar:

```php
use App\Http\Requests\StorePostRequest;

public function store(StorePostRequest $request)
{
    // El código aquí se ejecutará solo si la validación en la Custom Request es exitosa
}
```

---

**`authorize()`**

La función authorize() determina si el usuario actual tiene permiso para realizar la acción asociada a la solicitud. Por defecto, esta función devuelve true, lo que significa que se autoriza la acción. Sin embargo, si necesitas aplicar lógica de autorización personalizada, puedes sobrescribir este método.

Al retornar true, estás indicando que el usuario tiene permiso para continuar con la solicitud. Si retorna false, Laravel automáticamente redirigirá a la página anterior con un mensaje de error de "Acceso no autorizado" o "Forbidden" (403) si se utiliza la autorización dentro de un middleware.

Ejemplo

Supongamos que quieres permitir que solo los administradores autenticados puedan crear nuevos usuarios en tu aplicación. Puedes utilizar la función **authorize()** para verificar si el usuario actual tiene el rol de administrador.

```php
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    public function authorize()
    {
        // Verifica si el usuario autenticado tiene el rol de administrador
        return auth()->user()->isAdmin();
    }
}
```

---

**`rules()`**
La función **rules()** define las reglas de validación que se aplicarán a los datos enviados con la solicitud. Aquí puedes especificar reglas como _required_, _max_, _min_, _email_, _unique_, entre otras, para validar los campos de entrada.

```php
public function rules()
{
    return [
        'name' => 'required|max:255',
        'email' => 'required|email|unique:users',
        // Otras reglas de validación...
    ];
}
```

---

Uso Práctico:

Al utilizar estas funciones en una Custom Request, puedes separar la lógica de validación y autorización de tus controladores, lo que hace que el código sea más limpio y fácil de mantener. Además, Laravel aprovecha automáticamente estas funciones para validar y autorizar las solicitudes, lo que simplifica el flujo de desarrollo y garantiza la seguridad y consistencia de la aplicación.
