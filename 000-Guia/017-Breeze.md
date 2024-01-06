Ubicaciones importantes:

- en el directorio `config\auth.php` y `config\session.php` en estos archivos podemos realizar configuraciones sobre el modelo de autenticacion. Lo ideal seria que no se modifiquen los archivos si no las variables de entorno.

# Breeze

Laravel Breeze es un paquete de inicio (scaffolding) diseñado para proporcionar una configuración inicial rápida y simple para la autenticación de usuarios en aplicaciones web de Laravel. Este paquete ofrece un flujo de trabajo preconfigurado para la autenticación basada en _Blade_ y _Tailwind CSS_.

## Caracteristicas principales de Laravel Breeze:

- Autenticación simple: Ofrece un sistema de autenticación completo con vistas _Blade_ predefinidas para registro, inicio de sesión, restablecimiento de contraseña y verificación de correo electrónico.

- Implementación con _Tailwind CSS_: Utiliza _Tailwind CSS_ para los estilos y componentes prediseñados, lo que facilita la personalización y el diseño visual de la aplicación.

- Implementación de autenticación de API: Incluye rutas y controladores para autenticación de API usando tokens de API.

- Diseño liviano y minimalista: Proporciona un inicio rápido con un diseño simple y minimalista, lo que facilita la personalización y la integración con otras herramientas y librerías.

---

## Uso de Laravel Breeze:

- Instalacion:

```bash
composer require laravel/breeze --dev

# --dev se utiliza para especificar que solo se instalara en el entorno de desarrollo
```

- Configuracion:

```bash
php artisan breeze:install
# Trabajara con las Blade Templates

php artisan breeze:install react
# Trabajara con React

php artisan breeze:install vue
# Trabajara con vue
```

- Instalacion de dependencias: si es necesario, instala las dependencias de Node.Js y compila los assets:

```bash
npm install && npm run dev
```
