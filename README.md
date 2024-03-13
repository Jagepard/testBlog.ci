# testBlog_ci

```
git clone git@github.com:Jagepard/testBlog.ci.git
```
```
cd testBlog.ci
```
```
composer install
```
Create a database, for example: ```testBlog_ci```
Specify connection parameters in the configuration file: ```app/Config/Database.php```
```php
    /**
     * The default database connection.
     */
    public array $default = [
        'DSN'          => '',
        'hostname'     => 'localhost',
        'username'     => 'jagepard',
        'password'     => 'password',
        'database'     => 'testBlog_ci',
        'DBDriver'     => 'MySQLi',
        'DBPrefix'     => '',
        'pConnect'     => false,
        'DBDebug'      => true,
        'charset'      => 'utf8',
        'DBCollat'     => 'utf8_general_ci',
        'swapPre'      => '',
        'encrypt'      => false,
        'compress'     => false,
        'strictOn'     => false,
        'failover'     => [],
        'port'         => 3306,
        'numberNative' => false,
    ];
```

Run migrations:
```
php spark migrate --all
```
Seeding user data:
```
php spark db:seed Material
```
Create User
```
php spark shield:user create
```
```
Username : admin
Email : admin@admin.com
Password : password
Password confirmation : password
```
Launch the built-in server:
```
php spark serve
```

Admin panel:
```
http://localhost:8080/admin
```
User identity:
```
Login: admin@admin.com
Password: password
```