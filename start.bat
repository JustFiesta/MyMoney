%systemDrive%\xampp\mysql\bin\mysql -uroot -e "CREATE DATABASE IF NOT EXISTS mymoney;"

if %errorlevel% neq 0 msg %username% "Nie udalo sie utworzyc bazy danych." && exit /b %errorlevel%

php -r "copy('.env.example', '.env');"

call composer install

call php artisan migrate

call php artisan db:seed

call php artisan key:generate

call php artisan storage:link

npm install
if %errorlevel% neq 0 (
    msg %username% "Nie udalo sie zainstalowac zaleznosci npm"
    exit /b %errorlevel%
)

code .