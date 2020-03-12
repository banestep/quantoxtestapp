<?php

require __DIR__ . '/vendor/spatie/array-to-xml/src/ArrayToXml.php';
require __DIR__ . '/BasicRouter.php';
require __DIR__ . '/Students.php';
require __DIR__ . '/Student.php';
require __DIR__ . '/Board.php';
require __DIR__ . '/CSMBoard.php';
require __DIR__ . '/CSMBBoard.php';

/* config */
define('DBHOST', '');
define('DBNAME', '');
define('DBUSER', '');
define('DBPASS', '');
/* end of config */

$route = new BasicRouter;