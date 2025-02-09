
# DevOps Project: Engineer Registration Web Application

## **Introduction**

This project focuses on building a web application for engineers to register for IT engineering projects. The primary goal is to combine efficient software engineering practices with robust DevOps methodologies. The project emphasizes a DevOps lifecycle with a focus on Continuous Integration (CI), Continuous Delivery/Deployment (CD), Infrastructure as Code (IaC), container orchestration, and monitoring.

- **Backend**: PHP
- **Frontend**: HTML, CSS, jQuery, Axios
- **Database**: MySQL

### **DevOps Key Highlights**:
1. **CI/CD Pipelines** – Automate code testing, building, and deployment using GitLab CI/CD.
2. **IaC** – Provision environments with Vagrant and Ansible.
3. **Containerization** – Docker for portability.
4. **Container Orchestration** – Kubernetes for application management.
5. **Monitoring** – Prometheus and Grafana for observability.

## **Features and Technologies**

- **CI/CD Pipeline** with GitLab CI/CD
- **Docker** for containerization and orchestration using **Docker Compose**
- **Kubernetes** for managing containers and scaling
- **MySQL** with automated migrations and populated tables for testing
- **phpMyAdmin** for database management

---

## **Project Setup and Deployment**

### **1. Clone the Repository**

Clone the repository to your local machine:

```bash
git clone <repository_url>
cd <project_directory>
```

### **2. Requirements**

Ensure you have the following installed:
- **Docker**: for containerization and running the app locally.
- **Docker Compose**: to manage multi-container applications.
- **Kubernetes (Minikube)**: for local cluster management.
- **kubectl**: Kubernetes CLI.

### **3. Deploying Locally with Docker**

1. **Run Docker Compose**:

   In the project directory, run the following command to build and start the containers:

   ```bash
   docker-compose up --build
   ```

   This will:
   - Build the Docker images.
   - Start containers for the application and database.
   - Automatically run migrations and populate the database tables.

2. **Access the Application**:
   Open your browser and navigate to:

   ```
   http://localhost
   ```

   The application should be running locally.

### **4. Kubernetes Deployment**

1. **Create Kubernetes Resources**:

   - Apply deployment files for MySQL, PHP app, and phpMyAdmin:
   
     ```bash
     kubectl apply -f mysql-deployment.yaml
     kubectl apply -f php-app-deployment.yaml
     kubectl apply -f phpmyadmin-deployment.yaml
     ```

2. **Expose Services**:

   Kubernetes will expose your services on **NodePort**. You can check the IP and port using:

   ```bash
   kubectl get services
   ```

   Access the services in your browser at:

   - PHP App: `http://<KUBERNETES_NODE_IP>:<NodePort>`
   - phpMyAdmin: `http://<KUBERNETES_NODE_IP>:<NodePort>`

---

## **Configuration Files**

### **1. Docker and Docker Compose**

The `docker-compose.yml` file automates the creation of Docker containers for the web application and MySQL database. It also handles migration and table population automatically during startup.

### **2. Kubernetes YAML Files**

The Kubernetes configurations include:
- **mysql-deployment.yaml** – Defines the MySQL deployment with persistent storage.
- **php-app-deployment.yaml** – Defines the PHP application deployment.
- **phpmyadmin-deployment.yaml** – Deploys phpMyAdmin for managing MySQL.
- **mysql-pv.yaml** – Configures persistent volumes and claims for MySQL data storage.

### **3. Docker Hub Secret**

The `dockerhub-secret` is used for pulling private Docker images. Here's the configuration for the Kubernetes Secret:

```yaml
apiVersion: v1
kind: Secret
metadata:
  name: dockerhub-secret
  annotations:
    kubernetes.io/service-account.name: default
type: kubernetes.io/dockerconfigjson
data:
  .dockerconfigjson: <encoded_docker_config_json>
```

### **4. MySQL Persistent Volume Configuration**

Persistent storage is configured for MySQL using `mysql-pv.yaml`. The `PersistentVolume` (PV) and `PersistentVolumeClaim` (PVC) allow for storage persistence across pod restarts:

```yaml
apiVersion: v1
kind: PersistentVolume
metadata:
  name: mysql-pv
spec:
  capacity:
    storage: 2Gi
  accessModes:
    - ReadWriteOnce
  hostPath:
    path: "/mnt/data"

---
apiVersion: v1
kind: PersistentVolumeClaim
metadata:
  name: mysql-pvc
spec:
  accessModes:
    - ReadWriteOnce
  resources:
    requests:
      storage: 2Gi
```

---

## **Monitoring and Observability**

1. **Prometheus and Grafana**: Installed on Kubernetes to monitor the health and performance of the application.
2. **Alerting**: Configured to notify you of system issues or performance anomalies.

---

## **Author**

- **Pascal**
- **Abdoul**

---

## **Conclusion**

This project showcases a modern DevOps lifecycle applied to a web application. From code development and containerization to CI/CD pipelines, Kubernetes orchestration, and monitoring, the project covers essential DevOps practices ensuring scalability, observability, and automation.

---

### **Additional Notes**:

- **Database and Migrations**: Automatically handled via Docker Compose and Kubernetes during deployment.
- **Testing**: Automated testing with continuous integration ensures that the app remains functional through each change. 

