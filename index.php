<?php

require __DIR__ . '/BasicRouter.php';
require __DIR__ . '/Students.php';
require __DIR__ . '/Student.php';

/* config */
define('DBHOST', '');
define('DBNAME', '');
define('DBUSER', '');
define('DBPASS', '');
/* end of config */

$route = new BasicRouter;