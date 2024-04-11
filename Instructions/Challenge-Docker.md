### Reto de Dockerización: Aplicación Laravel con Frontend Vite

**Objetivo:** Dockerizar una aplicación web completa que utiliza Laravel para el backend y Vite para la gestión de los assets del frontend. Este reto está diseñado para afianzar tus conocimientos en Docker, enfocándose en las prácticas de seguridad, optimización y automatización para el despliegue de aplicaciones web modernas.

#### Descripción:

Tu tarea es contenerizar una aplicación Laravel que ya está funcional y que utiliza Vite para el frontend. La aplicación debe ser completamente funcional dentro de los contenedores Docker, incluyendo la conexión a una base de datos MySQL.

#### Requisitos:

1. **Dockerfile:**
   - Crea un `Dockerfile` para la aplicación Laravel que incluya:
     - Instalación de dependencias de PHP y extensiones necesarias.
     - Instalación y configuración de Composer.
     - Construcción de assets del frontend con Vite.
     - Uso de un usuario no root para ejecutar la aplicación.

2. **Docker Compose:**
   - Elabora un archivo `docker-compose.yml` que defina los siguientes servicios:
     - **app:** Tu aplicación Laravel, construida a partir de tu `Dockerfile`.
     - **db:** Un servicio de base de datos MySQL.
    
   - Asegúrate de que la aplicación Laravel pueda comunicarse correctamente con los servicios de base de datos y correo electrónico.

3. **Configuración y Migraciones:**
   - Configura tu aplicación para utilizar las variables de entorno adecuadas para conectar con los servicios de Docker Compose.
   - Documenta cómo ejecutar migraciones de la base de datos como parte del proceso de despliegue.

4. **Seguridad y Mejores Prácticas:**
   - Implementa prácticas recomendadas de seguridad en Docker, incluyendo el uso de un usuario no root y la mínima exposición de puertos.

#### Entregables:

- Un `Dockerfile` para tu aplicación Laravel.
- Un archivo `docker-compose.yml` que define los servicios necesarios para tu aplicación.

#### Evaluación:

Tu proyecto será evaluado en base a los siguientes criterios:
- Cumplimiento de todos los requisitos enumerados.
- Funcionalidad completa de la aplicación dentro de los contenedores Docker.
- Adherencia a las mejores prácticas de seguridad y configuración en Docker.

¡Buena suerte!



### Guia

### Pasos Para Ejecutar la Aplicación en Entorno Local

#### 1. Instalar Dependencias de Composer

Antes de poder ejecutar la aplicación, necesitas instalar las dependencias de PHP gestionadas por Composer. Abre una terminal en el directorio raíz de tu proyecto y ejecuta:

```bash
composer install
```

Este comando descargará e instalará todas las dependencias PHP especificadas en tu `composer.json`.

#### 2. Configurar el Archivo de Entorno

Necesitarás crear un archivo `.env` para almacenar las configuraciones específicas de tu entorno, como las credenciales de la base de datos. Puedes copiar el archivo `.env.example` proporcionado en el proyecto como punto de partida:

```bash
cp .env.example .env
```

Después, asegúrate de editar el archivo `.env` con tu editor de texto preferido para ajustar cualquier configuración específica de tu entorno, como las credenciales de la base de datos.

#### 3. Generar la Clave de la Aplicación

Laravel requiere una clave de aplicación única para asegurar las sesiones y datos encriptados. Genera esta clave ejecutando:

```bash
php artisan key:generate
```

Este comando actualizará automáticamente tu archivo `.env` con una clave de aplicación generada aleatoriamente.

#### 4. Compilar los Assets con Vite

Para compilar los assets del frontend (JavaScript, CSS), necesitarás ejecutar Vite. Asegúrate de estar en el directorio raíz de tu proyecto y ejecuta:

```bash
npm install
npm run build
```

Esto compilará tus assets y los almacenará en el directorio `public/build`, listos para ser servidos por Laravel.

#### 5. Ejecutar Migraciones de Base de Datos

Para crear las tablas necesarias en tu base de datos, ejecuta las migraciones de Laravel con el siguiente comando:

```bash
php artisan migrate
```

Asegúrate de que tu archivo `.env` contenga la configuración correcta para la conexión a la base de datos antes de ejecutar este comando.

#### 6. Iniciar el Servidor de Desarrollo

Finalmente, puedes iniciar el servidor de desarrollo de Laravel para acceder a tu aplicación a través del navegador:

```bash
php artisan serve --host=localhost --port=8000
```

Este comando iniciará un servidor de desarrollo en `http://localhost:8000` (o en el puerto que especifiques).

puedes reemplazar localhost por 0.0.0.0

---
