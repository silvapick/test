# *Test Konecta - Fabian Silva*

## **Ejecute los siguientes pasos**

1 - Instalar docker

2 - clonar el repositorio en un directorio local

```sh
git clone https://github.com/silvapick/test.git
```

3 - Ingresar al directorio docker del proyecto y ejecutar el compose:

```sh
cd docker/
```

```sh
docker-compose up --build
```

4 - Desde otra terminal ejecutar los siguientes comandos

```sh
docker exec -it fsilva-test /bin/sh
composer dump-autoload
php artisan optimize
php artisan migrate:fresh --seed
```

### Datos conexión base de datos
```
SERVER HOST = localhost
PORT        = 3906
DATABASE    = konecta_cafe
USERNAME    = root
PASSWORD    = abc123
```

### Se ejecuta por el puerto 8088
```
http://localhost:8088
```
