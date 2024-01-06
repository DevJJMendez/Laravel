# Jetstream

Laravel Jetstream es un paquete de inicio (scaffolding) oficial de Laravel que proporciona una implementación rápida y flexible de características de usuario para aplicaciones web de Laravel. Jetstream ofrece una estructura robusta y modular para la autenticación de usuarios, incluyendo características como la autenticación de dos factores, gestión de sesiones, notificaciones por correo electrónico, integración de API y más.

## Características principales de Laravel Jetstream:

- Opciones de frontend: Jetstream ofrece opciones flexibles para el frontend con:

  - Livewire: Un framework de componentes de frontend basado en PHP.
  - Inertia.js: Una combinación entre Vue.js (o React) y Laravel que permite construir SPAs (Single Page Applications) sin tener que escribir una API.
  - API: Si prefieres construir tu frontend por separado, Jetstream te permite utilizar Laravel como una API para integrarla con tu frontend.

- Gestión de equipos: Jetstream proporciona características de gestión de equipos, lo que permite a los usuarios crear y gestionar equipos dentro de la aplicación.

- Autenticación de dos factores: Incluye la autenticación de dos factores para una mayor seguridad en las cuentas de usuario.

- Integración con Stripe: Ofrece integración con Stripe para facturación, incluyendo características como facturación por equipos, suscripciones y cancelaciones.

- Notificaciones por correo electrónico: Viene con notificaciones por correo electrónico integradas para eventos de autenticación y acciones del usuario.

## Uso de Laravel Jetstream:

Para comenzar a utilizar Jetstream en tu proyecto Laravel, sigue estos pasos:

- Instalacion:

```bash
composer require laravel/jetstream
```

---

- Selecciona el stack frontend:

```bash
# Inertia.js - vue.js
php artisan jetstream:install inertia

# Inertia.js - React
php artisan jetstream:install inertia --react
```

---

- Migracion a la base de datos:

```bash
php artisan migrate
```

---

- Instalacion de dependencias: si es necesario, instala las dependencias de Node.Js y compila los assets:

```bash
npm install
npm run dev
```
