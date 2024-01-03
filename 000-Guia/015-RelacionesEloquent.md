# Relaciones Eloquent

Eloquent proporciona una forma fácil y expresiva de trabajar con relaciones de bases de datos. Las relaciones entre modelos en Eloquent permiten definir cómo interactúan los distintos modelos entre sí.

---

## Relacion Uno a Uno - hasOne

La relación uno a uno en Laravel se define cuando un registro de un modelo está relacionado con exactamente un registro de otro modelo. Por ejemplo, un usuario tiene un telefono.

Entonces decimos que: **User** `hasOne` **Phone** y **Phone** `belongsTo` **User**.

---

Ejemplo:

**En los modelos**

```php
class User extends Model
{
    public function phone(): HasOne
    {
        // podemos especificar cual es la llave foranea y cual es la llave primaria
        return $this->hasOne(Phone::class, 'user_id', 'id');
    }
}
```

```php
class Phone extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function user(): BelongsTo
    {
        // podemos especificar cual es la llave foranea y cual es la llave primaria
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
```

---

**En las migraciones** las llaves primarias y las llaves foraneas deben ser **unsigned** y tener el mismo tipo de dato, por ejemplo:

```php
Schema::create('users', function (Blueprint $table) {
            $table->unsignedTinyInteger('id', true);
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

Schema::create('phones', function (Blueprint $table) {
            $table->unsignedSmallInteger('id', true);
            $table->char('prefix', 3);
            $table->char('phone_number', 10);

            // Llave foranea
            $table->unsignedTinyInteger('user_id');
            $table->timestamps();
        });
```

**En el controlador** podemos realizar la consulta que necesitemos

```php
class UserController extends Controller
{
    public function index()
    {
        // Obtiene todos los registros
        $users = User::with('phone')->get();
        return view('index', compact('users'));
    }
}
```

**En la vista**

```php
<body>
    @forelse ($users as $user)
    <ul class="list-group">
        <li class="list-group-item">
            Name: {{$user->name}}</li>
        <li class="list-group-item">
            number: {{$user->phone->phone_number}}</li>
        <li class="list-group-item">
            email: {{$user->email}}</li>
        <li class="list-group-item">
            prefix: {{$user->phone->prefix}}</li>
      </ul>
    <br>
    @empty
    <li class="list-group-item">No data found</li>
    @endforelse
```

---

## Metodos para obtener registros

Eloquent proporciona una variedad de métodos para recuperar datos de la base de datos de manera eficiente y con diversas opciones de filtrado, ordenamiento y manipulación de resultados.

- **get()**: Recupera todos los registros que coinciden con la consulta.

```php
$usuarios = Usuario::get();
```

- **first()**: Recupera el primer registro que coincide con la consulta.

```php
$primerUsuario = Usuario::where('activo', true)->first();
```

- **find()**: Recupera un registro por su ID.

```php
$usuario = Usuario::find(1);
```

- **findOrFail()**: Recupera un registro por su ID y lanza una excepción si no se encuentra.

```php
$usuario = Usuario::findOrFail(1);
```

- **where()**: Agrega una cláusula WHERE a la consulta para filtrar los resultados

```php
$usuarios = Usuario::where('tipo', 'administrador')->get();
```

- **orWhere()**: Agrega una cláusula OR WHERE a la consulta.

```php
$usuarios = Usuario::where('tipo', 'administrador')->orWhere('tipo', 'editor')->get();
```

- **orderBy()**: Ordena los resultados por una columna específica.

```php
$usuariosOrdenados = Usuario::orderBy('nombre', 'asc')->get();
```

- **count()**: Obtiene el número de resultados que coinciden con la consulta.

```php
$cantidadUsuarios = Usuario::where('activo', true)->count();
```

- **groupBy()**: Agrupa los resultados por una columna específica.

```php
$usuariosPorRol = Usuario::groupBy('rol_id')->get();
```

- **join()**: Realiza una unión SQL entre tablas.

```php
$usuariosConPerfiles = Usuario::join('perfiles', 'usuarios.id', '=', 'perfiles.usuario_id')->get();
```

---

## Renderizar los datos desde una API

**Resource**

```php
public function toArray($request)
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'number' => '(' . $this->phone->prefix . ')' . $this->phone->phone_number
        ];
    }

```

**En la API Route**

```php
// Obtiene un registro
Route::get('/user', function (Request $request) {
    return new UserResource(User::find(1));
});
```
