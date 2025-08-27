APP_NAME=UmaMusumeRacePlanner
APP_ENV=local
APP_KEY=
APP_DEBUG=false
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=uma_musume_planner
DB_USERNAME=root
DB_PASSWORD=

APP_VERSION=1.0.0

// webpack.mix.js
let mix = require('laravel-mix');
mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');