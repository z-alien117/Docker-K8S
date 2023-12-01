### Reto Kubernetes

#### Escenario:
Una startup tecnológica está creciendo rápidamente y necesita desplegar su aplicación en un clúster de Kubernetes de forma escalable, segura y eficiente. La aplicación consta de una API REST, una base de datos y una interfaz de usuario web.

#### Tareas:

1. **Volumes PVC**: Crear un PVC para la base de datos para garantizar que los datos persistan incluso si el Pod falla.

2. **Secrets**: Almacenar las credenciales de la base de datos como un secreto y hacer que la API o el pod las consuma de forma segura.

3. **Services**:
   - Definir un servicio ClusterIP para la API REST interna.
   - Establecer un servicio LoadBalancer para la interfaz de usuario web que sea accesible fuera del cluster.

4. **ReplicaSet**: Asegurar que siempre haya un número específico de réplicas de la API REST ejecutándose para manejar la carga.

5. **Deployments**: Crear un Deployment para la API REST 

6. **Namespaces**: Utilizar namespaces para separar el entorno de producción del de desarrollo.


```yaml
apiVersion: apps/v1
kind: Deployment
metadata:
  name: httpbin
spec:
  replicas: 1
  selector:
    matchLabels:
      app: httpbin
  template:
    metadata:
      labels:
        app: httpbin
    spec:
      containers:
      - name: httpbin
        image: kennethreitz/httpbin
        ports:
        - containerPort: 80
```