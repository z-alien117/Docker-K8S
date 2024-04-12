### 1. Gestión de contenedores
- **Listar contenedores**: 
  ```bash
  docker ps            # Lista los contenedores en ejecución
  docker ps -a         # Lista todos los contenedores, incluyendo los detenidos
  ```
- **Ejecutar un contenedor**:
  ```bash
  docker run [OPTIONS] IMAGE [COMMAND] [ARG...]  # Ejecuta un nuevo contenedor
  ```
- **Detener un contenedor**:
  ```bash
  docker stop CONTAINER_ID       # Detiene un contenedor
  ```
- **Iniciar un contenedor detenido**:
  ```bash
  docker start CONTAINER_ID      # Inicia un contenedor detenido
  ```
- **Eliminar un contenedor**:
  ```bash
  docker rm CONTAINER_ID         # Elimina un contenedor detenido
  docker rm $(docker ps -a -q)   # Elimina todos los contenedores detenidos
  ```

### 2. Imágenes
- **Listar imágenes**:
  ```bash
  docker images                  # Lista las imágenes disponibles
  ```
- **Descargar una imagen**:
  ```bash
  docker pull IMAGE_NAME         # Descarga una imagen desde Docker Hub
  ```
- **Eliminar una imagen**:
  ```bash
  docker rmi IMAGE_ID            # Elimina una imagen local
  ```

### 3. Dockerfile y construcción de imágenes
- **Construir una imagen**:
  ```bash
  docker build -t TAG_NAME .     # Construye una imagen a partir de un Dockerfile en el directorio actual
  ```

### 4. Redes
- **Listar redes**:
  ```bash
  docker network ls              # Lista todas las redes de Docker
  ```
- **Crear una red**:
  ```bash
  docker network create NETWORK_NAME   # Crea una nueva red
  ```

### 5. Volumen y almacenamiento
- **Listar volúmenes**:
  ```bash
  docker volume ls               # Lista los volúmenes
  ```
- **Crear un volumen**:
  ```bash
  docker volume create VOLUME_NAME      # Crea un nuevo volumen
  ```

### 6. Docker Compose
- **Ejecutar servicios**:
  ```bash
  docker-compose up              # Inicia y ensambla todos los contenedores de un docker-compose.yml
  ```
- **Detener servicios**:
  ```bash
  docker-compose down            # Detiene y elimina todos los contenedores del docker-compose.yml
  ```

### 7. Misceláneos
- **Ver logs de un contenedor**:
  ```bash
  docker logs CONTAINER_ID       # Muestra los logs de un contenedor
  ```
- **Ejecutar comandos dentro de un contenedor**:
  ```bash
  docker exec -it CONTAINER_ID COMMAND   # Ejecuta un comando en un contenedor activo
  ```