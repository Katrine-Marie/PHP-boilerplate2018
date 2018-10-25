# PHP-boilerplate2018

Boilerplate code for smaller PHP projects. 2018 version.

Page templates go in the `/pages` folder, include-files such as header, footer or reusable widgets go in the `/includes` folder, and functionality code goes in the `/code` folder. OOP classes go in the `/classes` folder. Autoloader enabled.

## How To Use
Drop into the root of the project folder.

Adjustments needed in:
1. The `index.php` file in both the root folder, and the `a-panel` folder - set `$uri[1]`.
2. The `config.php` file in the `classes` folder - use your own database connection.

If SSL is enabled, and you wish to enable basic HTTP-to-HTTPS redirects, comment in the three lines in `index.php`:
```
if(!isset($_SERVER['HTTPS'])){
  header('Location: https://' . $_SERVER["SERVER_NAME"] . $_SERVER['REQUEST_URI']);
}
```
