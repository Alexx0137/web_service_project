# Proyecto de Servicios Web - Registro e Inicio de Sesión

## Descripción
Este proyecto implementa un servicio web en PHP para registrar usuarios y permitir el inicio de sesión, creando automáticamente la base de datos y la tabla de usuarios si no existen.

## Requisitos
- XAMPP o cualquier servidor local que soporte PHP y MySQL.
- Postman o herramienta similar para realizar pruebas de API.

## Instalación
1. Clona este repositorio o descarga los archivos.
2. Coloca la carpeta del proyecto en el directorio `htdocs` de XAMPP.
3. Asegúrate de que XAMPP esté ejecutándose y que el servicio MySQL esté activo.

## Estructura de la Base de Datos
La base de datos `test` y la tabla `users` se crean automáticamente al intentar registrar un nuevo usuario. No es necesario crear la base de datos ni la tabla manualmente.

## Endpoints
### 1. Registrar Usuario
- **Método:** `POST`
- **URL:** `http://localhost/web_service_project/api/register.php`
- **Body (JSON):**
    ```json
    {
      "name": "John",
      "last_name": "Doe",
      "user": "johndoe",
      "password": "password123"
    }
    ```

### 2. Iniciar Sesión
- **Método:** `POST`
- **URL:** `http://localhost/web_service_project/api/login.php`
- **Body (JSON):**
    ```json
    {
      "user": "johndoe",
      "password": "password123"
    }
    ```

## Respuestas
Las respuestas son devueltas en formato JSON, indicando el éxito o cualquier error que pueda ocurrir.

## Notas
Asegúrate de tener las extensiones necesarias de PHP habilitadas (como `mysqli`) para que el proyecto funcione correctamente.
