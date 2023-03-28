<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center"><img src="https://static.wikia.nocookie.net/logopedia/images/c/cc/Monster-hunter-world-logo.png/revision/latest?cb=20210925181115"></p>

<h1>Installation</h1>
<ul>
<li>Clone your project</li>
<li>Go to the folder application using cd command on your cmd or terminal</li>
<li>Run <code>composer install</code>on your cmd or terminal</li>
<li>Copy <b>.env.example</b> file to <b>.env</b> on the root folder. You can type <code>copy .env.example .env</code> if using command prompt Windows or <code>cp .env.example .env</code> if using terminal, Ubuntu</li>
<li>Open your <b>.env</b> file and change the database name (<b>DB_DATABASE</b>) to whatever you have, username (<b>DB_USERNAME</b>) and password (<b>DB_PASSWORD</b>) field correspond to your configuration.</li>
<li>Run <code>php artisan key:generate</code></li>
<li>Run <code>php artisan migrate</code></li>
<li>Run <code>php artisan serve</code></li>
<li>Open new cmd or terminal, under the project, run<code>npm install && npm run dev</code></li>
<li>Go to http://localhost:8000/</li>
</ul>
