# PHP-boilerplate2018

Boilerplate code for smaller PHP projects. 2018 version.

Page templates go in the `/pages` folder, include-files such as header, footer or reusable widgets go in the `/includes` folder, and functionality code goes in the `/code` folder. OOP classes go in the `/classes` folder. Classes are autoloaded.

## How To Use
Drop into the root of the project folder.

Adjustments needed in:
1. The `config.php` file in the `classes` folder - use your own database connection.
2. The `code/fncMain.php` file contains utility functions. You may want to adjust the `$page` switch statement inside the `setPageTitle($page)` function, in order to get meaningful page titles. It is also within this file that you can choose to set a different homepage, by changing the value of the `$frontpage` variable from the default `home.php`.
3. IF the project isn't in the root folder: Change the `index.php` file in both the root folder, and the `a-panel` folder - change `$uri[]` to the value corresponding to the part of the URL containing the page variable..

If SSL is enabled, and you wish to enable basic HTTP-to-HTTPS redirects, comment in these three lines in `index.php`:
```
if(!isset($_SERVER['HTTPS'])){
  header('Location: https://' . $_SERVER["SERVER_NAME"] . $_SERVER['REQUEST_URI']);
}
```
