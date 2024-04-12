### 1. Gestión de Clústeres
- **Obtener información del clúster**:
  ```bash
  kubectl cluster-info                  # Muestra información sobre el estado del clúster
  ```
- **Obtener versiones de Kubernetes**:
  ```bash
  kubectl version                       # Muestra la versión del cliente y del servidor de Kubernetes
  ```

### 2. Nodos
- **Listar nodos**:
  ```bash
  kubectl get nodes                     # Lista todos los nodos en el clúster
  ```
- **Detalles de un nodo**:
  ```bash
  kubectl describe node [node_name]     # Muestra información detallada sobre un nodo específico
  ```

### 3. Pods
- **Listar pods**:
  ```bash
  kubectl get pods                      # Lista todos los pods en el namespace actual
  kubectl get pods --all-namespaces     # Lista todos los pods en todos los namespaces
  ```
- **Crear un pod**:
  ```bash
  kubectl run [pod_name] --image=[image_name]  # Crea un nuevo pod con la imagen especificada
  ```
- **Eliminar un pod**:
  ```bash
  kubectl delete pod [pod_name]         # Elimina un pod específico
  ```

### 4. Despliegues
- **Crear un despliegue**:
  ```bash
  kubectl create deployment [name] --image=[image]  # Crea un nuevo despliegue con la imagen especificada
  ```
- **Listar despliegues**:
  ```bash
  kubectl get deployments               # Lista todos los despliegues
  ```
- **Actualizar un despliegue**:
  ```bash
  kubectl set image deployment/[deployment_name] [container_name]=[new_image]:[tag]  # Actualiza la imagen del despliegue
  ```

### 5. Servicios
- **Listar servicios**:
  ```bash
  kubectl get services                  # Lista todos los servicios
  ```
- **Crear un servicio**:
  ```bash
  kubectl expose deployment [deployment_name] --type=[type] --port=[port]  # Crea un servicio para exponer un despliegue
  ```

### 6. Configuración y Secretos
- **Crear un ConfigMap**:
  ```bash
  kubectl create configmap [name] --from-literal=[key]=[value]  # Crea un ConfigMap con valores específicos
  ```
- **Crear un secreto**:
  ```bash
  kubectl create secret generic [secret_name] --from-literal=[key]=[value]  # Crea un secreto con valores específicos
  ```

### 7. Manejo de Namespace
- **Listar namespaces**:
  ```bash
  kubectl get namespaces               # Lista todos los namespaces
  ```
- **Crear un namespace**:
  ```bash
  kubectl create namespace [name]      # Crea un nuevo namespace
  ```

### 8. Logs y Diagnósticos
- **Ver logs de un pod**:
  ```bash
  kubectl logs [pod_name]              # Muestra los logs de un pod específico
  ```
- **Ejecutar comandos en un pod**:
  ```bash
  kubectl exec -it [pod_name] -- [command]  # Ejecuta un comando en un contenedor dentro de un pod
  ```

### 9. Aplicar Configuraciones
- **Aplicar una configuración desde un archivo YAML**:
  ```bash
  kubectl apply -f [file.yaml]         # Aplica la configuración especificada en un archivo YAML
  ```