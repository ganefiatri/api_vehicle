## About Apps

Api Service Kendaraan
- Stock Kendaraan
- Penjualan Kendaraan
- Laporan penjualan Per kendaraan

## Environment
- Laravel 8
- Mongodb 4.4
- Php 8

## Installation

- Clone Project
- Run Npm Install
- Set Up Env
- Config database
    * 'default' => env('DB_CONNECTION', 'mongodb'),
    * 'mongodb' => [ 'driver' => 'mongodb', 'host' => env('DB_HOST', '127.0.0.1'), 'port' => env('DB_PORT', 27017), 'database' => env('DB_DATABASE'), 'username' => env('DB_USERNAME'), 'password' => env('DB_PASSWORD'), 'options' => [], ],
- run composer require jenssegers/mongodb
- install breeze
- npm install && npm run dev
- php artisan migrate
- php artisan serve


## Login First
- To get token we have to login first
- Registration
    * http://localhost:8000/api/register
- Login
    * http://localhost:8000/api/login
    * <img width="1414" alt="Screenshot 2023-06-07 at 23 11 09" src="https://github.com/ganefiatri/api_vehicle/assets/29312607/c8ebef84-c029-47de-b8b6-25842181b14b">
- Get token and paste here
    * in Headers write Authorization and value Bearer (Here paste your token)
    * <img width="1414" alt="Screenshot 2023-06-07 at 23 14 05" src="https://github.com/ganefiatri/api_vehicle/assets/29312607/064ee056-f34f-4b76-83b5-15130643b61b">
    

## Input Data

- How to test?
    * using Postman app third party to test API 
    * Choose Method POST

- Input Vehicle
    * http://localhost:8000/api/vehicle/
    * - MotorBike
    * <img width="1414" alt="Screenshot 2023-06-07 at 22 47 53" src="https://github.com/ganefiatri/api_vehicle/assets/29312607/b950121c-8354-4e8f-ade5-93534442541b">
    * - Car
    * <img width="1414" alt="Screenshot 2023-06-07 at 23 02 41" src="https://github.com/ganefiatri/api_vehicle/assets/29312607/b5e17062-6fce-46ce-9d6c-e956e4321dba">


- Input Sale
    * http://localhost:8000/api/sale
    * - MotorBike
    * <img width="1414" alt="Screenshot 2023-06-07 at 22 54 31" src="https://github.com/ganefiatri/api_vehicle/assets/29312607/d3a22310-ef29-44ca-91a4-11fefbe1486e">
    * - Car
    * <img width="1414" alt="Screenshot 2023-06-07 at 23 04 16" src="https://github.com/ganefiatri/api_vehicle/assets/29312607/b2ff7c7c-5570-4869-8531-538ad41909fe">



## Get Api

- Get Stock
    * http://localhost:8000/api/stock
    * <img width="1414" alt="Screenshot 2023-06-07 at 23 14 05" src="https://github.com/ganefiatri/api_vehicle/assets/29312607/9b956fc7-499d-4b5b-a330-75a53f98f499">

- Get Sale
    * http://localhost:8000/api/report
    * <img width="1414" alt="Screenshot 2023-06-07 at 23 21 55" src="https://github.com/ganefiatri/api_vehicle/assets/29312607/3736f041-caa7-4864-a0ba-6bdcdfa61b11">

- Get Report Sale Per Item
    * http://localhost:8000/api/report/(id)
    * <img width="1414" alt="Screenshot 2023-06-07 at 23 24 24" src="https://github.com/ganefiatri/api_vehicle/assets/29312607/cea6c945-9371-4c89-8f88-ea3ebb9ecc53">


