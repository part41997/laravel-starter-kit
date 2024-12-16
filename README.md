# Need to run below command to setup the project

##### Clone the project
```
git clone {project_url}
```

##### Install the composer dependencies
```
composer install
```

##### Create the .env file
```
cp .env.example .env
```

##### Generate the application key
```
php artisan key:generate
```

##### Run the migration
```
php artisan migrate
```

##### Run the seeder
```
php artisan db:seed
```

##### Install the npm dependencies
```
npm install
```

##### Compile the assets
```
npm run dev
```

##### Run the project
```
php artisan serve
```

Super Admin Credentials
```
email: admin@{project_name}.com
password: password
```

Now you can access the project at http://localhost:8000