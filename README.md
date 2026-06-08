# La Barca de la Fe ⛵

Sitio web oficial y panel de administración para **La Barca de la Fe**, un templo único con forma de carabela ubicado en la comunidad de San Andrés Buenavista, Tlaxco, Tlaxcala. Este proyecto combina un portal público de alta calidad visual con un sistema de gestión robusto para la administración del contenido.

---

## 🌟 Características

### Portal Público
* **Página de Inicio (Home):** Vista de bienvenida con diseño elegante, banner hero de impacto y resumen de secciones.
* **El Templo:** Sección dedicada a la historia del templo, la obra del Padre Arnulfo Mejía Rojas, la simbología prehispánica (Quetzalcóatl, Ometéotl) y detalles de la estructura náutica del templo. Diseñado como vista estática para garantizar máxima libertad de diseño y creatividad visual.
* **Galería:** Visualizador interactivo de imágenes del templo con soporte de ampliación (lightbox).
* **Blog:** Artículos y noticias sobre eventos, fe, historia y turismo local.
* **Cómo Llegar:** Información de rutas y recomendaciones prácticas para visitantes, renderizada desde una plantilla estática.
* **Contacto:** Formulario funcional para que los visitantes envíen mensajes directamente a los administradores del sitio.

### Panel de Administración (Dashboard)
Panel administrativo seguro (`/admin`) estilizado a medida sin dependencias externas complejas, que incluye:
* **Posts:** CRUD completo para crear, editar, publicar y eliminar entradas del blog (con carga de imágenes destacadas).
* **Categorías:** Gestión de clasificaciones para el blog.
* **Galería:** Carga y administración de imágenes para el visualizador del portal.
* **Mensajes:** Buzón de entrada de los mensajes enviados desde el formulario de contacto con estados de leído/no leído.
* **Configuración:** Administración de información del sitio web (nombre, descripción, correo de contacto, teléfono, enlaces a redes sociales, dirección y coordenadas GPS).

---

## 🛠️ Tecnologías Utilizadas

* **Framework Principal:** [Laravel 11.x](https://laravel.com/)
* **Autenticación:** Laravel Breeze (simplificado y adaptado al diseño del panel)
* **Base de Datos:** MySQL / MariaDB (soporta cualquier driver compatible con Laravel)
* **Frontend:** Laravel Blade, CSS nativo (Vanilla CSS) y Javascript moderno para micro-animaciones.
* **Empaquetador de Assets:** Vite

---

## 🚀 Requisitos de Instalación

Asegúrate de contar con los siguientes elementos instalados en tu entorno de desarrollo local:
* **PHP** >= 8.2
* **Composer**
* **Node.js** & **NPM**
* Servidor de base de datos (**MySQL / Laragon / XAMPP**)

---

## 📦 Configuración del Proyecto

Sigue estos pasos para levantar el proyecto localmente:

1. **Clonar el repositorio:**
   ```bash
   git clone https://github.com/ItsNery/barcadelafe.git
   cd barcadelafe
   ```

2. **Instalar dependencias de PHP:**
   ```bash
   composer install
   ```

3. **Instalar dependencias de Javascript:**
   ```bash
   npm install
   ```

4. **Configurar el archivo de entorno:**
   Copia el archivo de ejemplo `.env.example` y nómbralo `.env`:
   ```bash
   cp .env.example .env
   ```
   Abre el archivo `.env` recién creado y configura tus credenciales de base de datos:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=barca
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Generar la clave de la aplicación:**
   ```bash
   php artisan key:generate
   ```

6. **Crear el enlace simbólico para almacenamiento (Storage Link):**
   Esto es necesario para visualizar correctamente las imágenes subidas al blog y la galería:
   ```bash
   php artisan storage:link
   ```

7. **Ejecutar migraciones y sembrar base de datos (Seeders):**
   ```bash
   php artisan migrate:fresh --seed
   ```

8. **Compilar assets con Vite:**
   Para desarrollo local:
   ```bash
   npm run dev
   ```

9. **Iniciar el servidor local de Laravel:**
   ```bash
   php artisan serve
   ```
   El sitio estará disponible en [http://localhost:8000](http://localhost:8000).

---

## 🔐 Acceso al Panel de Administración

Para acceder al gestor de contenidos, ingresa a `http://localhost:8000/admin` e introduce las credenciales sembradas por defecto:

* **Usuario:** `admin@labarcadelafe.com`
* **Contraseña:** `admin123`

*(Se recomienda cambiar estas credenciales una vez ingreses por primera vez en Configuración/Mi Perfil).*

---

## 📝 Nota de Desarrollo: Libertad Creativa en Páginas Estáticas
Para mantener la libertad de diseño (integración de animaciones complejas, secciones personalizadas, SVG interactivos, etc.), las secciones **El Templo** y **Cómo Llegar** se manejan directamente como archivos de plantilla Blade estáticos ubicados en:
* [temple.blade.php](file:///c:/laragon/www/barca/resources/views/temple.blade.php)
* [como-llegar.blade.php](file:///c:/laragon/www/barca/resources/views/como-llegar.blade.php)

Cualquier cambio de diseño o contenido estructural en estas páginas puede realizarse editando directamente estos archivos, lo que evita las limitaciones de un editor enriquecido (WYSIWYG) en base de datos.
