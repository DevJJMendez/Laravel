# Livewire

Laravel Livewire es una librería que permite construir interfaces de usuario interactivas y dinámicas en aplicaciones web Laravel utilizando PHP. Livewire combina el poder de PHP con JavaScript para manejar la interactividad del frontend, lo que significa que puedes construir interfaces de usuario sin escribir JavaScript directamente.

## Características principales de Laravel Livewire:

- Componentes basados en PHP: Livewire te permite construir componentes frontend utilizando código PHP en lugar de JavaScript. Esto facilita la creación de interfaces de usuario sin tener que escribir mucho código JavaScript manualmente.

- Interactividad en tiempo real: Permite la interacción en tiempo real entre el frontend y el backend. Las acciones del usuario en la interfaz pueden provocar eventos en el backend de manera similar a las aplicaciones SPA, pero sin tener que escribir tanto código JavaScript.

- Recarga parcial (AJAX-like): Livewire realiza recargas parciales de componentes individuales en lugar de recargar toda la página. Esto se logra utilizando solicitudes AJAX bajo el capó sin que el desarrollador tenga que escribir este código explícitamente.

- Integración con Blade: Se integra perfectamente con Blade, el motor de plantillas de Laravel. Los componentes Livewire se pueden incluir en las vistas Blade y trabajar en conjunto con ellas.

- Fácil de aprender: Livewire es relativamente fácil de aprender para los desarrolladores familiarizados con Laravel, ya que se basa en conceptos PHP y utiliza un enfoque similar a la construcción de componentes.

## Uso de Laravel Livewire:

Para comenzar a utilizar Livewire en tu proyecto Laravel:

- Instalacion:

```bash
composer require livewire/livewire
```

- Creacion de componentes: Crea componentes Livewire utilizando el comando artisan.

```bash
php artisan make:livewire NombreDelComponente
```

- Uso en las vistas: Utiliza los componentes Livewire en tus vistas Blade para interactuar con ellos Ejemplo de integración en una vista Blade:

```php
<livewire:nombre-del-componente />
```

Para hacer un correcto uso de livewire debemos agregar los estilos y los scripts de este mismo, por lo tanto, un buena solucion es crear un layout.

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @livewireStyles
</head>
<body>
    @yield('content')
    @livewireScripts
</body>
</html>
```

Uso en la vista `views/layouts/app.blade.php`:

```php
@extends('layouts.app')
@section('title','example')
@section('content')
    <h1>Livewire</h1>
@endsection
```

---

ejemplo:

- creamos un nuevo componente, en este caso sera un contador:

```bash
php artisan make:livewire counter
```

Esto creara dos directorios:

![](/med-ia/livewireView.png)

```php
<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <h1> {{ $count }}</h1>
    <button wire:click='increment'>Increment</button>
</div>
```

---

![](/med-ia/livewireLogic.png)

```php
namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public function render()
    {
        return view('livewire.counter');
    }
}
<?php
```

---

La sintaxis adecuada para agregar componentes livewire seria esta:

```php
// welcome.blade.php

@extends('layouts.app')
@section('title','example')
@section('content')
    <livewire:counter/>
@endsection
```

Entonces podremos realizar operaciones en las vistas sin necesidad de recargar la pagina ejemplo:

tenemos un boton en la vista que al pulsarlo aumentara en 1 en valor de la variable:

```php
<div>
    <h1> {{ $count }}</h1>
    <button wire:click='increment'>Increment</button>
</div>
```

En la logica tendremos la funcion que realiza dicha operacion:

```php
class Counter extends Component
{
    public $count = 0;
    public function increment()
    {
        $this->count++;
        ;
    }
    public function render()
    {
        return view('livewire.counter');
    }
}
```
