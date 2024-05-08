# Cluster Básico con 3 nodos

### Requisitos previos

1. **Tres máquinas Linux**: Una como el nodo maestro y dos como nodos de trabajo.
2. **Conectividad de red** entre todas las máquinas en el clúster.
3. **Usuario con privilegios de sudo** en cada máquina.
4. **Deshabilitar el intercambio de memoria (swap)** en cada máquina.

### Paso a paso para instalar Kubernetes

#### Paso 1: Preparar el entorno en cada nodo

1. **Actualizar el sistema**:
   ```bash
   sudo apt update && sudo apt upgrade -y
   ```

2. **Instalar Docker** como motor de contenedores:
   ```bash
   sudo apt install docker.io -y
   sudo systemctl enable docker
   sudo systemctl start docker
   ```

3. **Deshabilitar swap**:
   ```bash
   sudo swapoff -a
   # Para deshabilitar swap permanentemente, comente la línea de swap en el archivo /etc/fstab
   sudo sed -i '/ swap / s/^\(.*\)$/#\1/g' /etc/fstab
   ```

4. **Configurar parámetros del sistema**:
   ```bash
   cat <<EOF | sudo tee /etc/sysctl.d/k8s.conf
   net.bridge.bridge-nf-call-iptables = 1
   net.ipv4.ip_forward = 1
   net.bridge.bridge-nf-call-ip6tables = 1
   EOF
   sudo sysctl --system
   ```

#### Paso 2: Instalar kubeadm, kubelet y kubectl

1. **Añadir el repositorio de Kubernetes**:
   ```bash
   sudo apt install -y apt-transport-https curl
   curl -s https://packages.cloud.google.com/apt/doc/apt-key.gpg | sudo apt-key add -
   echo "deb https://apt.kubernetes.io/ kubernetes-xenial main" | sudo tee /etc/apt/sources.list.d/kubernetes.list
   ```

2. **Instalar kubeadm, kubelet, y kubectl**:
   ```bash
   sudo apt update
   sudo apt install -y kubelet kubeadm kubectl
   sudo apt-mark hold kubelet kubeadm kubectl
   ```

#### Paso 3: Inicializar el clúster en el nodo maestro

1. **Inicializar el clúster con kubeadm**:
   ```bash
   sudo kubeadm init --pod-network-cidr=10.244.0.0/16
   ```

2. **Configurar kubectl en el nodo maestro**:
   ```bash
   mkdir -p $HOME/.kube
   sudo cp -i /etc/kubernetes/admin.conf $HOME/.kube/config
   sudo chown $(id -u):$(id -g) $HOME/.kube/config
   ```

3. **Instalar un plugin de red** (Por ejemplo, Flannel):
   ```bash
   kubectl apply -f https://raw.githubusercontent.com/coreos/flannel/master/Documentation/kube-flannel.yml
   ```

#### Paso 4: Unir los nodos de trabajo al clúster

En cada nodo de trabajo, utiliza el comando que `kubeadm init` imprimió al final de su ejecución en el nodo maestro. Se verá algo así:
```bash
sudo kubeadm join [tu-API-server]:6443 --token [tu-token] --discovery-token-ca-cert-hash sha256:[tu-hash]
```

#### Paso 5: Verificar el estado del clúster

1. **Verificar nodos**:
   ```bash
   kubectl get nodes
   ```

2. **Verificar pods**:
   ```bash
   kubectl get pods --all-namespaces
   ```


## Referencias


- [Documentación oficial de Kubernetes - Instalación con kubeadm](https://kubernetes.io/docs/setup/production-environment/tools/kubeadm/install-kubeadm/)
- [Guía para crear un clúster con kubeadm](https://kubernetes.io/docs/setup/production-environment/tools/kubeadm/create-cluster-kubeadm/)
- [Configuración de la red en Kubernetes](https://kubernetes.io/docs/concepts/cluster-administration/networking/)