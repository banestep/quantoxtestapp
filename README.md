# quantoxtestapp

In order to run this application you need to do (just) a little setup.

Set up a domain for the application so that you use something like:

`domain-of-your-app.test`

and not

`localhost/myapp`

This will depend on your server, for example on Apache you'll need to add a new virtual host.

You need to import the dbdump file located in "sql" folder and set up database parameters in index.php like:

`define('DBHOST', 'localhost');`\
`define('DBNAME', 'quantoxtestbranko');`\
`define('DBUSER', 'root');`\
`define('DBPASS', 'myrootpass');`

Also you need to redirect all requests to the `index.php`. 
Just like with virtual hosts this will depend on your server but you'll need something similar to this `.htaccess` file:

`RewriteEngine on`\
`RewriteCond %{REQUEST_FILENAME} !-f`\
`RewriteCond %{REQUEST_FILENAME} !-d`\
`RewriteRule ^(.*)$ /index.php?path=$1 [NC,L,QSA]`

After that, type this in your browser (note that the domain you set up might be different):

`domain-of-your-app.test/students/1`

In the database there are 5 students in total, first 3 belong to CSM board, and the other 2 belong to CSMB board.
Try each of them and see the results:

`domain-of-your-app.test/students/1`\
`domain-of-your-app.test/students/2`\
`domain-of-your-app.test/students/3`\
`domain-of-your-app.test/students/4`\
`domain-of-your-app.test/students/5`

That's all. Enjoy your day.
