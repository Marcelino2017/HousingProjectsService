# HousingProjectsService
Powered by Marcelino


Esta API permite listar e ingresar proyectos de vivienda definiendo un número de pagos y también el registro de los respectivos pagos.

## Características

- Desarrollada con PHP 8.2 y Laravel 10


## Correr el proyecto localmente
1. Abre tu consola de preferencia en el directorio que quieras tener el proyecto, en este ejemplo será el directorio Downloads, procedemos a clonar el proyecto e ingresar en el directorio.

    ```sh
    cd Downloads
    git https://github.com/Marcelino2017/HousingProjectsService
    cd HousingProjectsService-api
    ```

2. Una vez estas dentro de la raíz del proyecto (HousingProjectsService) ejecuta una única vez el siguiente comando:

    ```php
    php artisan key:generate
    ```

3. Luego se debe ejecutar la el siguente comando para correr la migraciones y seeder

    ```php
    php artisan migrate --seed
    ```
    
4. Por ultimo corremos el comando siguiente comando para correr servicio 
    ```php
    php artisan serve
    ```
