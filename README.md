# laravel-portfolio-site
A portfolio template website app created in Laravel. 

## Purpose
My wife had been wanting my to make her a prayer request program and journal for a couple of years so I thought this would be a job for 
Laravel and would be a great project for me to show what I've learned. This is the alpha version and only the prayer request program. I will be refactoring and updating as time goes on. This is open
source and you may clone it and modify to your heart's content

## Technologies used

1. Laravel 5.8
2. JavaScript 
3. CSS SASS
4. Bootstrap
5. PHP 7+
6. MySql

## Requirements to Run

1. PHP 7+
2. Composer
3. node.js (npm) for installing dependies
4. git

## Instructions to install

1. Make sure PHP 7+ and Mysql is installed and running. I recommend Xampp for windows users.
2. Create an empty mysql database and note the name, username, and password.
3. Make sure git is installed. 
4. At a command prompt, type "git clone https://github.com/rcol4jc/laravel-portfolio-site.git". This will create a laravel-portfolio-site folder in your current directory.
5. Cd into that directory.
6. Run 'composer install'
7. Run 'npm install'
8. copy .env.exmple file to .env
9. Type 'php artisan key:generate'
10. Type 'php artisan storage:link' to add public storage access.
11. Edit the .env (not .env.example) and under the mysql settings, put in your database name, username, and password from step 2.
12. Type 'php artisan migrate' to set up the tables in the database.
13. Type 'php artisan db:seed' to seed the libraries, languages, frameworks, databases, and skills tables.
14. Type 'php artisan serve' to start the development server. Browse to http://localhost:8000/register to register as a user.
15. After registration, it will send you immediately to the profile setup page where you can put in all of your information as if you are trying to find a job. A photo is required.
16. You will be redirected to the home page with your information set.
17. (optional) You might want to edit the web.php under routes and disable the register link. There are notes in the web.php on how to do that.
18. I have used tiny_mce on the text areas on the project and profile page. You can go to the tiny_mce site to get your own custom script url Once you do that, you can put that in the head area of the public.blade.php in the layouts folder. 


## Demo live

My portfolio site is running on this application. Check it out at: 

http://www.rickcollins.info

Check it out
