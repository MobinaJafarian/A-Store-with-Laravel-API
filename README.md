# A Store with Laravel  API
Store with Laravel API is an open source Store RESt API.
that includes list of the products, filtering, search for products brand or category, pagination and ...


## Table of Contents
* [General Info](#general-information)
* [Technologies Used](#technologies-used)
* [Features](#features)
* [Screenshots](#screenshots)
* [Setup](#setup)
* [API Endpoints](#api-endpoints)
* [Contact](#contact)
* [License](#license)



## General Information
Store with Laravel API is an open source Store RESt API
that includes list of the products, filtering, search for products brand or category and pagination ...
also includes comments for product, payment management, user profile and orders management.


## Technologies Used
- PHP   8.1
- Laravel   10.0
- Livewire  2.12
- l5-swagger    8.5
- log-viewer    10.0


## Features

- Admin panel
- Users can signup and login to their accounts.
- Filter most_sold_products, most_visited_products, cheapest_products, most_expensive_products.
- Search products By Category and By Brand.
- Payment management.
- Received_orders management.
- Manage Brand, Color and Property of products.
- Save products comment.
- User profile management.
- Users who have the role of `Super Admin` can access all Products as well as create a new product, edit and also delete what they've created.


## Screenshots
![store api admin panel screenshot](./public/images/admin/screenshots/Screenshot%20from%202023-05-08%2022-47-21.png)

![store api admin panel screenshot](./public/images/admin/screenshots/Screenshot%20from%202023-05-08%2022-47-54.png)

![store api  screenshot](./public/images/screenshots/Screenshot%20from%202023-05-08%2023-01-22.png)



## Setup

```
git clone https://github.com/MobinaJafarian/A-Store-with-Laravel-API.git 
composer install
cp .env.example .env
php artisan migrate
```
Then

```
php artisan serve
```
```
npm install
npm run dev
```
```
Connect to the API (using Postman) on port [127.0.0.1:8000]
```

## API Endpoints
| HTTP Verbs | Endpoints | Action |
| --- | --- | --- |
| GET |  /api/v1/home | home page |
| POST | /api/v1/register | To create a new user account |
| POST | /api/v1/profile | To display user orders  |
| POST | /api/v1/search_product | To search products |
| GET |  /api/v1/product_detail/{id} | To dispaly product detail |
| GET | /api/v1/most_sold_products | To filter most_sold_products |
| POST | /api/v1/payment | To display payment |
| POST | /api/v1/received_orders | To display received_orders |
| ... | ... |... |



## Contact
Created by [@MobinaJafarian](https://github.com/MobinaJafarian) - feel free to contact me!



## License
This project is available for use under the MIT License.