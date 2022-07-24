1-run this command to build docker environment
docker-compose build
docker-compose up -d
2-make .env file from .env.exaple
3-run this command to migrate database
docker-compose exec php php /var/www/html/artisan migrate
4-run this command to add admin with email "admin@admin.com" and password "password"
docker-compose exec php php /var/www/html/artisan db:seed AdminSeeder 
5-vist the site http://localhost:8088/
