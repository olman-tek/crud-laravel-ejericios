# Biblioteca: catálogo de libros
 
Aplicación CRUD en Laravel 13 con Blade, Eloquent y MySQL. Permite iniciar
sesión y registrar, consultar, editar y eliminar libros. Datos ficticios.
 
## Requisitos
- PHP 8.3 o superior con la extensión pdo_mysql
- Composer 2
- MySQL (por ejemplo, el de XAMPP) en ejecución
- Git
 
## Instalación y ejecución
1. Clonar y entrar a la carpeta de la app:
   git clone https://github.com/olman-tek/crud-laravel-ejercicios.git
   cd crud-laravel-ejercicios/biblioteca
2. Instalar dependencias: composer install
3. Copiar la configuración: copy .env.example .env
4. Generar la clave de la aplicación: php artisan key:generate
5. Configurar MySQL y ejecutar migraciones y seeders (secciones siguientes).
6. Iniciar el servidor: php artisan serve
7. Abrir http://127.0.0.1:8000/login
 
## Configuración de MySQL
Crear la base de datos:
   CREATE DATABASE biblioteca
   CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
Editar .env (en XAMPP, root sin contraseña):
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=biblioteca
   DB_USERNAME=root
   DB_PASSWORD=
 
## Migración y seeding
   php artisan migrate
   php artisan db:seed
 
## Credenciales
Usuario: admin
Contraseña: 12345678
 
## Qué hace cada pieza
- Migración: crea la tabla users (cuentas, con usuario único y contraseña
  con hash), la tabla libros (id, codigo único, titulo, autor,
  anio_publicacion, created_at, updated_at) y las tablas internas de Laravel.
- Factory (LibroFactory): genera libros ficticios con un código único
  (LIB-0000), un título, un autor y un año entre 1450 y el año actual.
- Seeder: DatabaseSeeder ejecuta UsuarioDemoSeeder, que crea o actualiza el
  usuario admin con la contraseña con hash, y LibroSeeder, que inserta diez
  libros con la factory solo si la tabla está vacía.
