# Tienda de Cartas Pokémon

Aplicación web para la gestión y venta de cartas y productos Pokémon (Cajas de cartas y accesorios). Permite registrar usuarios, administrar un catálogo de productos con imágenes, y llevar el control de clientes y pedidos. Cuenta con roles de usuario (administrador y usuario estándar).

Proyecto desarrollado para la materia **Frameworks y Arquitectura de Software** (Universidad Autónoma de Querétaro).

## Tecnologías utilizadas

- **Laravel 12** (framework principal)
- **PHP 8.2+**
- **Laravel Breeze** (autenticación)
- **Blade** (motor de plantillas)
- **Tailwind CSS** (estilos)
- **Vite** (compilación de assets)
- **MySQL** (base de datos, vía XAMPP)

## Requisitos previos

Antes de instalar, asegúrate de tener:

- PHP 8.2 o superior
- Composer
- Node.js y npm
- XAMPP (con Apache y MySQL activos)

## Instalación y configuración

1. Clonar el repositorio:

```
git clone https://github.com/wolfdev98/pokemon-tcg-store.git
cd pokemon-tcg-store
```

2. Instalar las dependencias de PHP:

```
composer install
```

3. Instalar las dependencias de JavaScript:

```
npm install
```

4. Crear el archivo de configuración `.env`:

```
copy .env.example .env
```

5. Generar la llave de la aplicación:

```
php artisan key:generate
```

6. Configurar la base de datos en el archivo `.env`:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pokemon_tcg
DB_USERNAME=root
DB_PASSWORD=
```

(En XAMPP, crea una base de datos con ese nombre desde phpMyAdmin.)

7. Ejecutar las migraciones (crea las tablas):

```
php artisan migrate
```

8. Crear el enlace de almacenamiento (para que se vean las imágenes):

```
php artisan storage:link
```

## Cómo ejecutar la aplicación

Necesitas dos terminales abiertas al mismo tiempo:

1. Levantar el servidor de Laravel:

```
php artisan serve
```

2. Compilar los estilos:

```
npm run dev
```

Luego abre el navegador en: `http://127.0.0.1:8000`

## Roles de usuario

La aplicación maneja dos roles:

- **Usuario estándar:** puede registrarse, iniciar sesión y ver el catálogo de productos.
- **Administrador:** además puede crear, editar y eliminar productos, y gestionar clientes y pedidos.

Todos los usuarios nuevos se registran como estándar. Para convertir un usuario en administrador, usa la consola interactiva:

```
php artisan tinker
```

Y dentro de ella:

```
$user = \App\Models\User::where('email', '[correo_del_usuario]')->first();
$user->role = 'admin';
$user->save();
```

## Funcionalidades principales

- Registro e inicio de sesión de usuarios
- Roles diferenciados (administrador / usuario)
- CRUD de Productos con carga de imágenes
- CRUD de Clientes
- CRUD de Pedidos
- Panel de inicio (dashboard) con totales y accesos rápidos
- Catálogo de productos en formato de cuadrícula

## Equipo

- Jorge Brayan Hernandez Simón
- Isaías Ezequiel Rivera López
- Fernando Daniel Mora Cerritos
