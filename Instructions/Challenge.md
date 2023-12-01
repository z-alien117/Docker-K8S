
### Reto Kubernetes: Despliegue y Acceso a APIs de Prueba

#### Tareas:

1. **Desplegar el Servidor HTTPBin**:
   - Crea un Deployment utilizando la imagen `kennethreitz/httpbin`.
   - Asegúrate de que el Deployment esté configurado con la etiqueta correcta.

2. **Exponer HTTPBin Internamente**:
   - Crea un servicio ClusterIP para que los componentes internos del clúster puedan acceder a `httpbin`.

3. **Exponer HTTPBin Externamente**:
   - Crea un servicio LoadBalancer para que puedas hacer llamadas a `httpbin` desde fuera del clúster.

4. **Usar Volumes PVC**:
   - Configura un volumen PVC para almacenar cualquier dato que `httpbin` pueda necesitar persistir.

5. **Configurar Secrets**:
   - Almacena y consume cualquier configuración secreta necesaria para `httpbin` utilizando el objeto Secret de Kubernetes.

6. **Implementar un ReplicaSet**:
   - Define un ReplicaSet para `httpbin` que mantenga un número deseado de réplicas.

7. **Crear un Namespace Específico**:
   - Despliega `httpbin` dentro de un namespace dedicado para este ejercicio.


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