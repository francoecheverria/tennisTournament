# Torneo de Tenis - Simulación con Habilidades y Suertes

Este repositorio contiene una aplicación para simular un torneo de tenis entre jugadores masculinos y femeninos, utilizando habilidades y suertes para determinar el resultado de cada partido.

## Instalación

Para utilizar este proyecto, sigue los siguientes pasos:

1. **Clonar el Repositorio:**
   ```bash
       git clone https://github.com/tu-usuario/tu-repositorio.git
       cd tu-repositorio
    ```
    Instalar Dependencias:

    ```bash

        composer install
    ```

2. **Configuración del Entorno:**

    Copia el archivo .env.example y renómbralo a .env.
    Configura la conexión a la base de datos y otras variables de entorno según sea necesario en el archivo .env.

3. **Generar la Clave de la Aplicación:**

    ```bash

    php artisan key:generate

    ```

4. **Migraciones y Seeders:**

    Ejecuta las migraciones para crear las tablas en la base de datos:

    ```bash

    php artisan migrate

    ```
    ```
    php artisan db:seed
    ```

6. **Iniciar el Servidor de Desarrollo:** 

    ```bash

    php artisan serve
    ```

El servidor se ejecutará por defecto en http://localhost:8000.
