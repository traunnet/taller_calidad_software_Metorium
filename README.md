# taller_calidad_software_Metorium
# 🛒 Proyecto Motorium
<img width="1280" height="716" alt="Motórium" src="https://github.com/user-attachments/assets/e6b5d2f0-bd45-4743-9c56-05c06a020070" />

¡Bienvenido al repositorio del proyecto **Tienda**! Este proyecto implementa una aplicación de comercio electrónico básica utilizando el framework **Laravel** y una base de datos **MySQL**, con un enfoque en un diseño **rojo y negro** para el panel de administración (`dashboard`).

## 🛠️ Tecnologías Utilizadas

Este proyecto se basa en las siguientes tecnologías para el desarrollo de Backend y Frontend:

| Categoría | Tecnología | Descripción Breve |
| :--- | :--- | :--- |
| **Backend** | 🐘 **Laravel** (PHP) | Framework MVC para la lógica de la aplicación, rutas, controladores y ORM. |
| **Base de Datos** | 🗄️ **MySQL** | Sistema de gestión de bases de datos para persistencia de productos y categorías. |
| **Frontend** | 🖥️ **HTML5, CSS3, JavaScript** | Lenguajes base para la estructura, estilo e interactividad del lado del cliente. |
| **Estilos/Diseño** | 🎨 **Bootstrap 5** | Framework CSS para un diseño responsivo y componentes de interfaz. |
| **Animación** | ✨ **AOS** (Animate On Scroll) | Librería de JavaScript para efectos de animación al hacer *scroll*. |

---

## 🚀 Módulos y Funcionalidades Implementadas

El proyecto inicia con la **estructura base de Laravel** completa (configuración, `config`, `database`, `resources`, `routes`, etc.) y la implementación de la capa base de la aplicación.

### 🔑 Autenticación (Simulada)
* **Simulación de Login:** Rutas y lógica para el inicio de sesión y cierre de sesión de usuarios.
* **Middleware:** Rutas protegidas para el acceso exclusivo al Dashboard y las funciones de administración.

### 📦 Gestión Administrativa (Dashboard)
* **CRUD de Productos:** Funcionalidad completa para **Crear, Leer, Actualizar y Eliminar** productos.
* **CRUD de Categorías:** Funcionalidad para gestionar las categorías a las que pertenecen los productos.
* **Diseño:** El Dashboard presenta una interfaz de gestión con una **paleta de colores dominante roja y negra**.

### 🌐 Estructura de Vistas
El proyecto define las siguientes rutas principales:

| Vista | Ruta | Descripción |
| :--- | :--- | :--- |
| **Principal** | `/` | Página de inicio de la tienda, presentando productos. |
| **Login** | `/login` | Formulario para la autenticación de usuarios. |
| **Dashboard** | `/dashboard` | Panel de administración central (área restringida). |

---

## ⚙️ Estructura de Directorios Clave

Se han añadido y configurado los siguientes elementos en la estructura base de Laravel:

* **`app/Http/Controllers`**: Contiene los controladores (`ProductController`, `CategoryController`) y la lógica de autenticación.
* **`app/Models`**: Modelos Eloquent como `Product.php` y `Category.php` para interactuar con la DB.
* **`routes/web.php`**: Definición de todas las rutas de la aplicación.
* **`database/migrations`**: Archivos para la creación de las tablas `products` y `categories` en la DB.
* **`resources/views`**: Plantillas Blade, incluyendo *layouts* y las vistas específicas para el **index**, **login** y el **dashboard**.
* **`public/css` y `public/js`**: Archivos estáticos. Aquí se encuentra la integración de **Bootstrap** y **AOS**.

---

## 💻 Instalación y Configuración

Sigue estos pasos para poner en marcha el proyecto:

1.  **Clonar el Repositorio:**
    ```bash
    git clone [URL_DEL_REPOSITORIO] Tienda
    cd Tienda
    ```

2.  **Instalar Dependencias de PHP:**
    ```bash
    composer install
    ```

3.  **Configurar Variables de Entorno:**
    * Crea el archivo `.env` a partir del ejemplo:
        ```bash
        cp .env.example .env
        ```
    * Genera la clave de la aplicación:
        ```bash
        php artisan key:generate
        ```
    * Edita el archivo `.env` y configura los parámetros de tu base de datos **MySQL**:
        ```env
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=tienda_db # Cambia el nombre si es necesario
        DB_USERNAME=tu_usuario # Reemplaza con tu usuario
        DB_PASSWORD=tu_contraseña # Reemplaza con tu contraseña
        ```

4.  **Ejecutar Migraciones:**
    * Asegúrate de que tu servidor MySQL esté corriendo.
    * Crea la estructura de tablas:
        ```bash
        php artisan migrate
        ```

5.  **Iniciar el Servidor:**
    ```bash
    php artisan serve
    ```
    La aplicación estará accesible en `http://127.0.0.1:8000`.
