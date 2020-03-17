# Auth

## Installation
Загрузка данных
Импортировать базу данных из файла Auth/store (файл типа SQL)
Загрузить проект с git

## Settings

Настройка проекта на новом сервере
1.	Сохранить папку проекта на виртуальный сервер в папку htdocs(xampp  и похожих виртуальны серверов).
2.	В файле config, который лежит в корне проекта, оставить все как есть но раскомментировать и закомментировать строку 18, 19.

```php
15	//const CMS_BASE_URL = 'http://localhost/Auth/auth/';
16	//const CMS_FILE_URL = 'http://localhost/Auth/auth/files/';
```

3. Запустить проэкт прописав http://localhost/Auth/auth/  в адресной строке.
Либо
1.	Сохранить папку проекта на виртуальный сервер в папку htdocs(xampp  и похожих виртуальны серверов).
2. Оставить все как есть в файле config:

```php
18 const CMS_BASE_URL = 'http://www.auth.local/';
19 const CMS_FILE_URL = 'http://www.auth.local/files';
```

но прописать хосты в httpd-vhosts.conf
```C
 <VirtualHost *:80>
   ServerAdmin webmaster@laravel
   DocumentRoot "C:/xampp/htdocs/Auth/auth”   
   ServerName auth.local
   ServerAlias www.auth.local
 </VirtualHost>
```
И в hosts
```
127.0.0.1	auth.local
127.0.0.1	www.auth.local
```

## Start the project
www.auth.local 
