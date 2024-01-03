# Middleware

Los middlewares en Laravel son filtros que se aplican a las solicitudes HTTP entrantes en una aplicación. Proporcionan una forma conveniente de filtrar y manipular las solicitudes antes de que lleguen a las rutas o controladores, y también permiten realizar acciones después de que se procesa la solicitud.

Funciones de los middlewares en Laravel:

- Filtrado de solicitudes: Los middlewares pueden inspeccionar y filtrar solicitudes entrantes antes de que alcancen las rutas. Esto permite realizar validaciones, autorizaciones, verificaciones de autenticación, entre otros.

- Modificación de solicitudes y respuestas: Los middlewares pueden modificar tanto las solicitudes entrantes como las respuestas salientes. Por ejemplo, pueden agregar encabezados HTTP, modificar parámetros de solicitud, o incluso abortar la solicitud si no cumple con ciertas condiciones.

- Procesamiento antes y después de las rutas: Los middlewares pueden realizar acciones antes y después de que una solicitud llegue a una ruta o un controlador. Esto es útil para realizar tareas como el registro de actividad, la manipulación de datos, la gestión de sesiones, etc.
