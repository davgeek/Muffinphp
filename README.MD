Muffin PHP
=========

Muffin PHP is a Micro Framework.

  - Minimal config
  - Small size
  - Easy to use

The purpose of this project is to help you with those small projects that do not ever write code, and to facilitate the use of connections to the database. 

This framework uses the MVC pattern to separate the logic of the view and data.

Feel free to modify the code to your liking. Share with the community and contribute to the project.

Version
----

0.1

Docs
----
On construction.


Installation
--------------

Download and copy the repository on your server, the domain should point to the public folder.

In /app/config/app.php
set the URL = 'yourdomain.com' and set the other stuff, if you did not use the db, sets false in DB = false.

#### Nginx Config
```
server {
        listen 80;
        root /usr/share/nginx/muffinphp/public;
        index index.php index.html index.htm;

        server_name domain.com;

        location / {
            rewrite ^/([^?]*)(?:\?(.*))? /index.php?url=$1&$2;
            rewrite ^/ /index.php;
        }
     
        location ~ \.php$ {
            try_files $uri =404;
            fastcgi_pass unix:/var/run/php5-fpm.sock;
            fastcgi_index index.php;
            include fastcgi_params;
        }
     
}
```

#### Apache config
```
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^(.*)$ index.php?url=$1 [QSA,L]
</IfModule>
```

License
----

MIT


**Free Software, Hell Yeah!**
