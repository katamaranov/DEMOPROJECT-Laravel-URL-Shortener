# DEMOPROJECT-Laravel-URL-Shortener
This project is a sandbox where I experiment with the features and possibilities of docker, laravel, php, etc.
___
1. git clone this project
2. go to copied directory and run ```sh docker compose up -d```
3. in your terminal run ```sh docker compose exec -it mainpagelaravel sh``` and go to /code directory
4. ```sh cp .env.example .env```
5. in .env file</br>
```DB_CONNECTION=mongodb```</br>
```DB_HOST=mongo```</br>
```DB_PORT=27017```</br>
```DB_DATABASE=lus```</br>
```DB_USERNAME=root```</br>
```DB_PASSWORD=example```</br>
6. ```sh composer install```
7. ```sh php artisan key:generate```
8. ```sh php artisan migrate:fresh --seed --seeder=UsersTableSeeder```
9. repeat steps 3-7 for container redirectpagelaravel
10. add to hosts file (Windows: C:\Windows\System32\drivers\etc\hosts; Linux: /etc/hosts) this line: ```127.0.0.1 lnk.shrt```

web interface for mongodb http://localhost:8080/adminer, authentication required (email: admin@a.com password: 12345678!)
