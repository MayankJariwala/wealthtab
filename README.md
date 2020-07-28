### Pre-requisite
1. **DB Name** - wealthtab or (any of your choice)

## Starting App Instructions:
1. **composer install** - For downloading the required dependencies
2. **php artisan migrate** - For migrating the database tables
3. **php artisan db:seed** - For seeding the dummy data into the table
4. **php artisan serve** - For running application

## About Endpoints
- [GET] Fetch All Files based on access level => [http://localhost:8000/api/v1/files](http://localhost:8000/api/v1/files).
- [POST] Login => [http://localhost:8000/api/auth/login](http://localhost:8000/api/auth/login).
- [GET] Fetch File by id => [http://localhost:8000/api/v1/file/{fileId}](http://localhost:8000/api/v1/file/{fileId}).

NOTE: Generally .env file is not tracked because it contains the sensitive information.
