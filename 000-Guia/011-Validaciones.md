# Validacion de los datos que se recepcionan

Laravel ofrece un sólido conjunto de herramientas para validar y controlar los datos que se reciben en las solicitudes HTTP. Estos mecanismos permiten asegurar que los datos cumplen con ciertas reglas y criterios antes de ser procesados o almacenados en la aplicación.

---

## Validación Automática de Request:

Utiliza el método `validate()` en los controladores para validar automáticamente los datos de la solicitud.

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

---

## Validacion CustomRequest
