1. About MVC model: All the model which is the first "M" in MVC is the entity that convert the data from data base to a object. So we can query some information about one type of things. The model is in laravel's folder illinipost\app. The example I created is User.php. The second "V" represents view, which is the html file people will see on their browser. All the views are under illinipost\resources\views\ directory. The controller represnets by the "C", which are the functions will be called after the users send some requerst to the server. The server will read their request with some input and return the related view to the user. It will firstly go to illinipost\routes\web.php, and that web.php file will call different controller to handle it. 

****************************************************************************************
		Pass data from page to database example:

		1. Click "Make a post" button on navigation bar
		2. Check file in directory illinipost\resources\views\post\create_post_page.blae.php
		3. (Where the form will go to?) Check illinipost\routes\web.php:
			The "post" method combine with "create_post" action, so it will go to use
			the "PostController" in the directory illinipost\app\Http\Controllers\PostController.php
			There is a function called "create_post", which is also mentioned in the routes. 
		4. That function will then create the post data, which will be also stored in the database
			because we called Post::create function inside the function. 
		5. If your database set up correctly, you should be able to see that data is in your database.

		Pass data from database to page example:

		1. Go to directory illinipost\resources\views\post\post_page.blae.php
		2. Go to PostController which mentioned above. Check the function "check_post_page".
			The "$posts = Post::all()" will read through all the data from Post table, and stored as a variable.
			Then it will be passed to the page use the "compact" laravel build in method. 
		3. Then the page will create one row for each data using foreach structure. 

****************************************************************************************


2. Useful command for laravel(under directory illinipost):

To create a model with it's controller: php artisan make:model MODEL_NAME -c
example(create model without controler): php artisan make:model User
example: php artisan make:model User -c

To run the local server(default port is 8000): php artisan serve --port=PORTNUMBER
example(default port): php artisan serve
example: php artisan serve --port=8080

To run migration(which is the workflow for laravel to create table in database, I will mention it in the future): php artisan make:migration MIGRATION_NAME
example: php artisan make:migration create_User_table
example: php artisan make:migration add_column_user_name_to_User_table
example: php artisan make:migration delete_column_user_blahblahblah_to_User_table
(All the migrations are in the directory illinipost\database\migrations\ )


******Important*****
After all the migration part, you will need to run: php artisan migrate
to make all the migrations are actually effect your database. 

******How to set up database in laravel*****
Laravel has a file called .env which is the config file of laravel running locally on your computer. Normally it won't be pushed to Github so don't worry about change the data in that file. Make sure your Mysql server is running in your computer and the port number, database name is correct. The user name and passpword vary from different person. 

Example of setting up database(One portion of .env file, you can leave other part alone for now): 
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=DB
DB_USERNAME=root
DB_PASSWORD=root


****************** Helpful link *****************
Front end:
CSS: https://www.w3schools.com/css/
Bootstrap: http://getbootstrap.com/css/   https://www.w3schools.com/bootstrap/default.asp
Colors: https://www.w3schools.com/colors/colors_picker.asp
Javascript: https://www.w3schools.com/js/default.asp
Jquery: https://www.w3schools.com/jquery/default.asp
Html: https://www.w3schools.com/html/default.asp

Back end: 
php: https://www.w3schools.com/php/
sql: https://www.w3schools.com/sql/default.asp

Laravel(5.4): https://laracasts.com/series/laravel-from-scratch-2017



