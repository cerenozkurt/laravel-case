Postman Api Döküman :  https://documenter.getpostman.com/view/21172942/2sA3XV8zGw
Postman Collection : https://elements.getpostman.com/redirect?entityId=21172942-3b1819d5-312d-4d10-8dbe-d54948532288&entityType=collection


Kurulum Adımları;
composer update
php artisan migrate
php artisan passport:client --personal


Command Testleri;
php artisan integration:add hepsiburada username password
php artisan integration:update 1 trendyol username1 password1
php artisan integration:delete 1


Testler;
php artisan test --testsuite=Feature
php artisan test --testsuite=Unit




