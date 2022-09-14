# Symbiotic Framework project
Documentation: [SymbioticPHP](https://github.com/symbioticphp/full).
## Installation
1. Run the composer command in the root of the project:
```
composer create-project symbiotic/symbiotic
```
2. Copy the contents of the `./symbiotic` folder to the root of the project.


## Starting with (NGINX/Apache)
1. Define a webroot on the `./public` directory
2. Uncomment the user's demo in the config `./config/config.php` in the 'auth' section.
3. Request an authorization page `http://localhost/symbiotic/auth_login/login/`.
4. Log in (admin:1234), you will need to get to the application page `develop`.


## Launching via Worker (Workerman)
To work in RoadRunner mode, there is a basic application [symbiotic/workerman](https://github.com/symbioticphp/workerman)(уже в сборке)!

1. Uncomment the user's demo in the config `./config/config.php` in the 'auth' section.
2. Run the command:
```
 `php ./public/index.php workerman:worker start --host=localhost --port=80`.
```
3. Request an authorization page `http://localhost/symbiotic/auth_login/login/`.
4. Log in (admin:1234), you will need to get to the application page `develop`.
