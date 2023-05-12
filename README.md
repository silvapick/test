# *Test Konecta - Fabian Silva*

## **Docker**
1 - Instalar docker


2 - Ingresar al directorio docker y ejecutar el compose:

```sh
cd docker/
```

```sh
docker-compose up --build
```

3 - Ejecutar migraciones y seeds

```sh
docker exec -it fsilva-test /bin/sh
composer dump-autoload
php artisan optimize
php artisan migrate:fresh --seed
```

### Datos conexión base de datos
```
SERVER HOST = localhost
PORT        = 3306
DATABASE    = konecta_cafe
USERNAME    = root
PASSWORD    = abc123
```

### Se ejecuta por el puerto 8088
```
http://localhost:8088
```
