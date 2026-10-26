# Inventario de productos

Aplicación web sencilla para administrar un catálogo: permite crear, consultar, editar y eliminar productos, además de ver su precio y existencias.

## Requisitos

- PHP 8.2 o superior.
- Composer 2.
- MySQL o MariaDB.
- Extensiones PHP `intl`, `mbstring` y `mysqli` habilitadas.
- Conexión a Internet para cargar Bootstrap desde CDN.

Comprueba que PHP y Composer estén disponibles:

```powershell
php -v
composer --version
```

Para revisar las extensiones de PHP:

```powershell
php -m
```

## Instalación rápida (Windows / PowerShell)

Abre PowerShell en la carpeta del proyecto, donde está este `README.md`, y ejecuta:

```powershell
composer install
Copy-Item env .env
```

1. Crea una base de datos vacía en MySQL/MariaDB. Por ejemplo:

   ```sql
   CREATE DATABASE ci_products CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
   ```

2. Abre `.env` y configura el entorno y la conexión. Quita `#` de estas opciones y ajusta usuario y contraseña a tu instalación:

   ```ini
   CI_ENVIRONMENT = development
   app.baseURL = 'http://localhost:8080/'

   database.default.hostname = localhost
   database.default.database = ci_products
   database.default.username = root
   database.default.password = tu_contraseña
   database.default.DBDriver = MySQLi
   database.default.port = 3306
   ```

   Si tu usuario de MySQL no tiene contraseña, deja el valor vacío:
   `database.default.password =`.

3. Desde la carpeta del proyecto, crea las tablas ejecutando las migraciones:

   ```powershell
   php spark migrate
   ```

4. Inicia el servidor local:

   ```powershell
   php spark serve
   ```

5. Abre [http://localhost:8080](http://localhost:8080). La página principal redirige al inventario de productos.

## Comandos útiles

Ejecuta las pruebas automatizadas con:

```powershell
composer test
```

Las pruebas que usan SQLite necesitan también la extensión PHP `sqlite3`; no es necesaria para ejecutar la aplicación con MySQL.

Para detener el servidor local, presiona `Ctrl+C` en la terminal.

## Notas

- La tabla `products` se crea mediante las migraciones incluidas en `app/Database/Migrations`.
- No hay datos de ejemplo; agrega el primer producto desde **Agregar producto**.
- No subas el archivo `.env` ni guardes contraseñas reales en el repositorio.
- En un servidor de producción, configura el servidor web para que apunte a la carpeta `public` y no al directorio raíz del proyecto.
