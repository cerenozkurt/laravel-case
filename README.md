# Laravel


## API Documentation

- **Postman API Documentation**: [View Documentation](https://documenter.getpostman.com/view/21172942/2sA3XV8zGw)
- **Postman Collection**: [Download Collection](https://elements.getpostman.com/redirect?entityId=21172942-3b1819d5-312d-4d10-8dbe-d54948532288&entityType=collection)

## Setup Instructions

1. **Clone the Repository:**
   ```bash
   git clone "https://github.com/cerenozkurt/laravel-case.git"
   ```
2. **Install Dependencies:**
    ```bash
    composer update
   ```
3. **Run database Migrations:**
    ```bash
    php artisan migrate
   ```
4. **Create Personal Access Client:**
    ```bash
    php artisan passport:client --personal
   ```


## Command Tests
1. **Add Integration::**
   ```bash
    php artisan integration:add hepsiburada username password
   ```
2. **Update Integration::**
   ```bash
    php artisan integration:update 1 trendyol username1 password1
   ```
3. **Delete Integration::**
   ```bash
    php artisan integration:delete 1
   ```

## Running Tests
1. **Feature Tests:**
   ```bash
    php artisan test --testsuite=Feature
   ```
2. **Unit Tests:**
   ```bash
    php artisan test --testsuite=Unit
   ```



