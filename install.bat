composer install
copy .env.example .env
php artisan key:generate
php artisan migrate
echo "Done!"