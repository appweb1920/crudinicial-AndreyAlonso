# crudinicial-AndreyAlonso

## Pasos para CRUD
0. Configurar archivo .env
    ```
    DB_CONNECTION=pgsql
    DB_HOST=127.0.0.1
    DB_PORT=5432
    DB_DATABASE=recycling_db
    DB_USERNAME=postgres
    DB_PASSWORD=
    ```
1. Crear controladores
    ```
    php artisan make:controller <nombre_controlador>
    ```
   Los controladores se encuentran en:<b><i> app/Http/Controllers</i></b>
   
2. Crear vistas
    ``` 
        mkdir resources/views/<nombreVista>
        touch resources/views/<nombreVista>/<nombreVista>.blade.php
    ```
3. Crear ruta

    En routes/web.php
    ```laravel
        Route::get('/ruta',<nombreControlador>@<metodoControlador>);
   ```
4. Crear Migraciones
   ```
        php artisan make:migration Create<NombreTabla> 
   
            Ejemplo: php artisan make:migration CreateCollector
   
        php artisan migrate
   ```
   Las migraciones se encuentran en: database/migrations/
5. Crear Modelos
    ```
        php artisan make:model <nombreModel>
   ```
6. Ejecutar programa
   ``` 
       php artisan serve
   ```