# JSON

`JSON`, acrónimo de **JavaScript Object Notation**, es un formato de intercambio de datos ligero y legible por humanos que se utiliza para **transmitir datos entre un servidor y un cliente web**.

Es un formato de texto simple y está basado en una estructura de pares `clave` - `valor` que es fácil de entender y de escribir para humanos, y también fácil de parsear y generar por las máquinas.

## Características clave del formato JSON:

- **Sintaxis simple y legible**: Está compuesto por pares de `clave` - `valor` separados por dos puntos `:` y separados entre sí por comas `,`. Los pares `clave` - `valor` están encerrados entre llaves `{}` para representar objetos y entre corchetes `[]` para representar arrays.

Ejemplo de **objeto** `JSON`:

```json
{
  "nombre": "Ejemplo",
  "edad": 30,
  "ciudad": "EjemploCity"
}
```

Ejemplo de **array** `JSON`

```json
["manzana", "naranja", "plátano"]
```

---

- **Tipos de datos admitidos**: JSON admite diferentes tipos de datos, como cadenas de texto, números, booleanos, null, arrays y objetos anidados.

- **Independiente del lenguaje**: Aunque tiene "JavaScript" en su nombre, JSON es independiente del lenguaje y es compatible con la mayoría de los lenguajes de programación, no solo con JavaScript.

- **Utilizado en aplicaciones web**: Es comúnmente utilizado en aplicaciones web para el intercambio de datos entre el cliente y el servidor, ya que es un formato ligero y fácil de parsear.

---

## Uso común de JSON:

- **Comunicación entre cliente y servidor**: Se utiliza para transmitir datos entre una aplicación web y un servidor, ya sea para enviar datos desde el cliente al servidor o para recibir datos del servidor al cliente.

- **Almacenamiento de configuraciones y datos estructurados**: A menudo se utiliza para almacenar configuraciones, como datos de configuración de aplicaciones o para representar estructuras de datos complejas.

- **APIs y servicios web**: Muchas APIs y servicios web devuelven datos en formato JSON, lo que permite que otras aplicaciones consuman esos datos de manera sencilla.
