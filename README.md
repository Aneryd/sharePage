ТЕСТОВОЕ ЗАДАНИЕ "Поделиться страницей"

.env файл - конфигурация БД
```sh
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=share_page
DB_USERNAME=root
DB_PASSWORD=password
```

После этого, нужно выполнить несколько команд, для создания docker контейнера:
```sh
docker-compose build
docker-compose up -d
```

Далее нужно, зайти в контейнер с fpm-php и выполнить миграцию и обновить файлы composer:
```sh
docker exec -it sharepage-fpm-1 bash
composer update
php artisan migrate:refresh
```
