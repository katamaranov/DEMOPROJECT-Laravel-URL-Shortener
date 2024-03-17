# DEMOPROJECT-Laravel-URL-Shortener
![sample image](sample.png)
⚠️This is my project from college with pseudo-sharding. It's like a sandbox. A branch with real sharding in mongodb will be added soon⚠️
___
### The following instructions are for testing on your local computer
1. copy this project
2. go to copied directory and run ```docker compose up -d```
3. in your terminal run ```docker compose exec -it mainpagelaravel sh``` and go to /code directory
4. ```cp .env.example .env```
5. in .env file</br>
```DB_CONNECTION=mongodb```</br>
```DB_HOST=mongo```</br>
```DB_PORT=27017```</br>
```DB_DATABASE=lus```</br>
```DB_USERNAME=root```</br>
```DB_PASSWORD=example```</br>
6. ```composer install```
7. ```php artisan key:generate```
8. ```php artisan migrate:fresh --seed```
9. repeat steps 3-7 for container redirectpagelaravel
10. go to the fcc container, the /codeFCC directory, follow steps 4-7 and restart this container
11. for a pretty looking link, add this to hosts file (Windows: C:\Windows\System32\drivers\etc\hosts; Linux: /etc/hosts) this line: ```127.0.0.1 lnk.shrt``` (or use ```localhost:80``` instead)

web interface for mongodb http://localhost:8080/adminer, authentication required (http://localhost:8080/login, email: admin@a.com password: 12345678!)
