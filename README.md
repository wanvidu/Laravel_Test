# PetDoc Server

## To run the project execute following commands.

```
composer i
```

```
php artisan migrate:fresh --seed
```

```
php artisan serve
```

---

### Wipe Database

```
php artisan db:wipe
```

### Clear Cache

```
php artisan cache:forget spatie.permission.cache
php artisan cache:clear
```
### Generate Controller
```
php artisan make:controller <Controller Name> --resource
```
### Generate API Controller
```
php artisan make:controller API/PhotoController --api
```
```
php artisan migrate:fresh --seed
``
### Generating Migrations
```
php artisan make:migration create_users_table --create=users --table=users
```
### Generate Seeders
```
php artisan make:seeder UserSeeder
```
### Generate Model
```
php artisan make:model Flight --migration
php artisan make:model Flight --factory
php artisan make:model Flight --seed
php artisan make:model Flight --controller
php artisan make:model Flight -mfsc
```
### Create Observers
```
php artisan make:observer UserObserver --model=User
```
### Generating Resources
```
php artisan make:resource User
php artisan make:resource User --collection
```
### Publish http error views
```
php artisan vendor:publish --tag=laravel-errors
```