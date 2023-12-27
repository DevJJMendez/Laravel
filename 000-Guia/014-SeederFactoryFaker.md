# Seeder

Los Seeders en Laravel son clases específicas diseñadas para poblar tu base de datos con datos de prueba predeterminados. Sirven para insertar registros de forma automatizada en tus tablas de base de datos al ejecutarlos mediante el comando `db:seed` de Artisan.

Estos Seeders son útiles, por ejemplo, en entornos de desarrollo o pruebas, donde necesitas tener datos de muestra para probar funcionalidades, y también en el caso de configuración inicial de la aplicación, donde deseas tener datos iniciales.

Los Seeders se crean en el directorio `database/seeders` y pueden ser ejecutados por comandos de Artisan. Se utilizan en conjunto con el sistema de migraciones para proporcionar un flujo completo de manejo de la base de datos.

Comando para crear el **seeder**

```php
php artisan make:seeder ProductSeeder
```

---

Estructura de un seeder

```php
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Creamos una instancia del modelo
        Product::create([
            'name' => 'Smartphone',
            'short_description' => 'iphone 12 pro',
            'description' => 'the new smartphone of the apple brand',
            'price' => 1000,
        ]);
    }
}
```

Para poder usar nuestro **seeder** debemos especificar cual seeder se ejecutara, esto lo hacemos en el archivo `database\seeder\DatabaseSeeder.php`

```php
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Llamar a un seeder específico
        $this->call(ProductSeeder::class);

        // Llamar a múltiples seeders
        $this->call([
            ProductSeeder::class,
            UserSeeder::class,
            // Otros seeders que desees ejecutar
        ]);
    }
}
```

Luego ejecutamos el **seeder** con el comando

```bash
php artisan db:seed
```

Esto ejecutara TTODOS los **seeders**.

Si queremos ejecutar un seeder especifico utilizamos el comando:

```bash
php artisan db:seed --class=ProductSeeder
```

Si queremos reiniciar todas las migraciones y resembrar la base de datos con seeders, usamos el comando:

```bash
php artisan migrate:refresh --seed
```

---

# factory

Son clases utilizadas para generar datos de prueba de manera automatizada y aleatoria. Son muy útiles para crear registros ficticios o de prueba para poblar tus bases de datos durante el desarrollo o las pruebas unitarias

Las **Factory** trabajan en conjunto con los Seeders y pueden ser utilizadas para generar múltiples registros con datos ficticios para diferentes modelos de manera rápida y sencilla.

Creamos **factorys** usando el comando:

```bash
php artisan make:factory ProductFactory
```

Esto creara el archivo en el directorio `database\factories\ProductFactory.php`

Estructura de una factory pura:

```php
namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => Str::random(25),
            'short_description' => Str::random(50),
            'description' => Str::random(100),
            'price' => random_int(1, 120),
        ];
    }
}
```

Luego en nuestro **seeder** indicamos que los datos se generaran mediante un `factory`:

```php
class ProductSeeder extends Seeder
{
    public function run(): void
    {
       Product::factory()->count(1000)->create();
    }
}
```

Ejecutamos con el comando:

```bash
php artisan db:seed
```

---

**Para revertir los registros que se ingresaron a la base de datos, usamos**

```bash
php artisan migrate:rollback
```

luego

```bash
php artisan migrate
```

---

## Faker

son una biblioteca o conjunto de herramientas que permiten generar datos falsos o ficticios de manera realista y aleatoria. En el contexto de Laravel (y otros frameworks), Faker es una herramienta utilizada para crear datos ficticios y aleatorios que simulan información realista, como nombres, direcciones, direcciones de correo electrónico, números de teléfono, entre otros.

En Laravel, Faker se utiliza comúnmente en combinación con las Factory para generar datos de prueba. Esta herramienta permite llenar las tablas de la base de datos con información simulada y aleatoria para facilitar las pruebas y el desarrollo de aplicaciones.

Estructura de una `factory` con `faker`,

```php
class ProductFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'short_description' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'price' => fake()->numberBetween(1, 900),
        ];
    }
}
```

La estructura del seeder se mantiene igual.

Ejecutamos este factory con el comando:

```bash
php artisan db:seed
```

---

### Metodo utiles de clase `faker`

- Nombre y apellidos:

  - `firstName()` y `lastName()`: generan nombres y apellidos.
  - `name()`: Genera un nombre completo.

- Direcciones:

  - `address()`: Genera una dirección postal aleatoria.
  - `city()`,` state()`, `country()`: Generan nombres de ciudades, estados, países, respectivamente.

- Números:

  - `randomNumber()`: Genera un número aleatorio.
  - `numberBetween($min = 0, $max = 2147483647)`: Genera un número entre un rango especificado.

- Textos y Lorem Ipsum:

  - `text($maxNbChars = 200)`: Genera un texto aleatorio.
  - `sentence($nbWords = 6, $variableNbWords = true)`: Genera una oración aleatoria.
  - `paragraph($nbSentences = 3, $variableNbSentences = true)`: Genera un párrafo aleatorio.

- Fechas y tiempos:

  - `dateTime($max = 'now', $timezone = null)`: Genera una fecha y hora aleatoria.
  - `date($format = 'Y-m-d', $max = 'now')`: Genera una fecha aleatoria.
  - `time($format = 'H:i:s', $max = 'now')`: Genera una hora aleatoria.
