**Aplicación Node.js**: Debes crear una aplicación CRUD en Node.js que se conecte a una base de datos MongoDB. Puedes utilizar el framework Express.js para facilitar el desarrollo de la aplicación.

> **Nota** el código lo encontrarás [aqui](../Challenge/)

**Despliegue en Kubernetes**: Debes desplegar tu aplicación en un clúster de Kubernetes. Cada componente (la aplicación Node.js y la base de datos MongoDB) debe estar en su propio pod.

**Base de datos MongoDB**: Debes desplegar MongoDB en tu clúster de Kubernetes en un pod separado. Tu aplicación Node.js debe conectarse a esta base de datos.

**Persistencia de datos con PVC**: Debes configurar un Persistent Volume Claim (PVC) para tu base de datos MongoDB para asegurar la persistencia de datos. Esto significa que los datos de tu base de datos deben persistir incluso si el pod de MongoDB se elimina o se reinicia.

**Acceso a través de un dominio**: Debes configurar un Ingress para que tu aplicación sea accesible a través del dominio challenge.example.com.

