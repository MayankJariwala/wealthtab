### Problem Statement
- Create REST API with bearer authentication and 2 database collections
- Allow us to store 2 PDFs
- Encrypt them and provide user credentials for (2) users - 1 user should be able to access both of the PDFs and the other 1 should be able to access only one.
- Backend to be used: Laravel, mySQL or equivalent for DB
- Optional: create Javascript client (web app) to connect to the REST API, the client should allow 2 PDFs to be uploaded

### Prerequisite
1. Laravel Setup
2. MySQL Server
3. Composer Dependency manager

### Quick Step
- One can directly import the sql file into the MySQL Server located under **db/** with the database name **wealthtab**

## Starting App Instructions:
1. **composer install** - For downloading the required dependencies
2. **php artisan migrate && php artisan db:seed** - For create migrations and seeding the dummy data
3. **php artisan serve** - For running application

## About Endpoints 

**Except Login route, each route need to be invoked with Bearer Token received from server**

- [GET] Fetch All Files based on access level => [http://localhost:8000/api/v1/files](http://localhost:8000/api/v1/files).
- [POST] Login => [http://localhost:8000/api/auth/login](http://localhost:8000/api/auth/login).
- [GET] Fetch File by id => [http://localhost:8000/api/v1/file/{fileId}](http://localhost:8000/api/v1/file/{fileId}).
- [GET] Logout => [http://localhost:8000/api/v1/logout](http://localhost:8000/api/v1/logout).

NOTE: Generally .env file is not tracked because it contains the sensitive information.
