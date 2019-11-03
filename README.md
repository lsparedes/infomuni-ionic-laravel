#Ionic Auth starter with Laravel Passport

## Configuración de Laravel 
Ejecuta los siguientes comandos

```
composer install
cp .env.example .env
php artisan key:generate
```

Configura tu base de datos en el archivo __.env__ 

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your-database-name
DB_USERNAME=homestead
DB_PASSWORD=secret
```

Ejecuta las migraciones

``` 
php artisan migrate
```

Instala passport
```
php artisan passport:install
```

## Configuración de Ionic

Instala los módulos de node 
```
npm install
```

### Configuraciones del cliente passport
Copia las credenciales de passport de la tabla oauth_clients, usualmente es el segundo registro

El Cliente id 2 lleva por nombre Password Grant Client

Ó tambien puedes crear un nuevo cliente para ionic guardando __Client ID__ y __Client Secret__ usando



```
php artisan passport:client --password
```

Entra al archivo src/settings/Laravel.ts y modifica el json config, reemplaza la url y la apiUrl con la url de tu proyecto y tus credenciales de cliente passport


```
// este ejemplo esta corriendo usando php artisan serve
export const Service: any = {

    url: 'http://127.0.0.1:800',
    apiUrl: 'http://127.0.0.1:800/api',

    passport: {
        'grant_type': 'password',
        'client_id': 'your-client-id',
        'client_secret': 'your-client-secret',
    }

};
```

### Para prevenir ingresos a páginas inautorizadas 

Importa AuthProvider a tu pagina

Ejemplo
```
import { AuthProvider } from '../../providers/auth/auth';
```

Y agrega esta función

```
async ionViewCanEnter () {
    let isAuthenticated = await this.authService.checkIsAuthenticated();
    return isAuthenticated;
}
```
