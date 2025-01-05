## Shopify App with Laravel

It is a simple Shopify App with Laravel. It is a simple app that can be used to authenticate with Shopify and get the products from the store. It uses the Shopify API to get the products from the store. It uses the Laravel Shopify package to authenticate with Shopify and get the products from the store.

### Requirements
- PHP >= 8.2
- Composer
- MySQL
- Shopify Store


## Installation Via Composer


### Step 1: Clone the repository
```bash
git clone https://github.com/kodkatibi/shopify-be.git
```
### Step 2: Install the dependencies
```bash
composer install
```
### Step 3: Create a new database
Create a new database and update the .env file with the database credentials.
```bash
DB_CONNECTION=mysql
DB_HOST=
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```
### Step 4: Run the migrations
```bash
php artisan migrate
```
### Step 5: Run the server
```bash
php artisan serve
```
### Step 6: Open the app in the browser
Open the app in the browser and you will see the home page with the login button. Click on the login button and you will be redirected to the Shopify login page. Login with your Shopify credentials and you will be redirected back to the app with the products from the store.

## Installation Via Docker
### Step 1: Clone the repository
```bash
git clone https://github.com/kodkatibi/shopify-be.git
```
### Step 2: Build the docker image
```bash
docker-compose build
```
### Step 3: Run the docker container
```bash
docker-compose up -d
```
### Step 4: Run the migrations
```bash
docker-compose exec app php artisan migrate
```
### Step 5: Open the app in the browser
Open the app in the browser and you will see the home page with the login button. Click on the login button and you will be redirected to the Shopify login page. Login with your Shopify credentials and you will be redirected back to the app with the products from the store.


## Usage
The app has the following routes:
#### {{Url}}/api/register - Register
#### {{Url}}/api/login - Login 
#### {{Url}}/api/orders/sync - Sync the products from the store
#### {{Url}}/api/orders - Get the products from the store
