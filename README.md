# e快印

<http://eprint.eeyes.net/>

## 部署

* 要求`php >= 5.6.4`（更多要求参见[Laravel文档中的安装章节](https://laravel.com/docs/5.4/installation)）

1. 创建mysql用户和同名数据库并赋予所有权限

    ```mysql
    CREATE USER IF NOT EXISTS 'eprint'@'localhost' IDENTIFIED BY 'here_is_your_password';
    CREATE DATABASE IF NOT EXISTS `eprint`;
    GRANT ALL PRIVILEGES ON `eprint`.* TO 'eprint'@'localhost';
    ```

2. 将代码解压到服务器

3. 进入代码所在文件夹，执行`composer install`

4. 将`.env.example`复制一份到`.env`，并修改`.env`中的设置

    可以使用`php artisan key:generate`生成随机加密秘钥

5. 执行`php artisan migrate`迁移数据表

6. 执行以下命令优化框架

    ```bash
    php artisan config:cache
    php artisan route:cache
    php artisan optimize
    ```

7. 执行`chmod 777 -R storage/ public/uploads/`允许写入，必要时还需设置`SELinux`

8. 将服务器根目录设置到`public/`文件夹，必须使用单独域名（`http://ip:port/`也可以）

    Nginx服务器配置文件示例

    ```nginx
    server {
        listen       80;
        server_name  eprint.eeyes.net;
        root         /srv/www/eprint/public;
        index        index.php;
    
        location / {
            if (!-e $request_filename) {
                rewrite ^(.*)$ /index.php/$1 last;
            }
        }
    
        location ~ [^/]\.php(/|$) {
            try_files                $fastcgi_script_name =404;
            fastcgi_pass             127.0.0.1:9000;
            fastcgi_index            index.php;
            fastcgi_split_path_info  ^(.+\.php)(/.*)$;
            set $path_info           $fastcgi_path_info;
            fastcgi_param            PATH_INFO $path_info;
            include                  fastcgi.conf;
        }
    }
    ```

    使用Nginx服务器，在修改完之后需要执行`nginx -s reload`重新读取配置文件

## 说明

* 本项目使用`Laravel 5.4`作为开发框架
* 普通用户访问`http://eprint.eeyes.net/home/code`输入邀请码即可成为商家

## LICENSE

[Apache 2.0](http://www.apache.org/licenses/LICENSE-2.0)

    Copyright 2017 eeyes.net
    Licensed under the Apache License, Version 2.0 (the "License");
    you may not use this file except in compliance with the License.
    You may obtain a copy of the License at
    
        http://www.apache.org/licenses/LICENSE-2.0
    
    Unless required by applicable law or agreed to in writing, software
    distributed under the License is distributed on an "AS IS" BASIS,
    WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
    See the License for the specific language governing permissions and
    limitations under the License.
