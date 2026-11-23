# Control de tareas
 
Aplicación CRUD en Laravel 13 con Blade, Eloquent y MySQL. Permite iniciar
sesión y registrar, consultar, editar y eliminar las tareas de un equipo. Todos los datos son ficticios.
 
## Requisitos
 
- PHP 8.3 o superior con la extensión pdo_mysql
- Composer 2
- MySQL (por ejemplo, el de XAMPP) en ejecución
- Git
 
## Instalación y ejecución
 
```bash
git clone https://github.com/olman-tek/crud-laravel-ejercicios.git
cd crud-laravel-ejercicios/tareas
composer install
copy .env.example .env
php artisan key:generate
```
 
Después configura MySQL y ejecuta las migraciones y los seeders (secciones
siguientes). Para iniciar el servidor:
 
```bash
php artisan serve
```
 
Abre http://127.0.0.1:8000/login
 
## Configuración de MySQL
 
Crear la base de datos:
 
```sql
CREATE DATABASE tareas CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```
 
Editar el archivo .env (en XAMPP, usuario root sin contraseña):
 
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tareas
DB_USERNAME=root
DB_PASSWORD=
SESSION_DRIVER=file
CACHE_STORE=file
QUEUE_CONNECTION=sync
```
 
## Migración y seeding
 
```bash
php artisan migrate
php artisan db:seed
```
 
## Credenciales
 
- Usuario: admin
- Contraseña: 12345678
 
## Qué hace cada pieza
 
- **Migración:** crea la tabla users (cuentas, con usuario único y contraseña con hash), la tabla tareas (id, titulo, descripcion, responsable, fecha_limite, estado, created_at, updated_at) y las tablas internas de Laravel.
- **Factory (TareaFactory):** genera tareas ficticias con un título, una descripción, un responsable, una fecha límite (pasada o futura) y un estado permitido (pendiente, en proceso o completada).
- **Seeder:** DatabaseSeeder ejecuta UsuarioDemoSeeder, que crea o actualiza el usuario admin con la contraseña con hash, y TareaSeeder, que inserta diez tareas con la factory solo si la tabla está vacía.
