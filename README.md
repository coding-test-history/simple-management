
## Tech Stack

**Client:** Javascript, Sweetalert 2, Cookie Js, Bootstrap 5

**Server:** PHP 8, MySQL | PostgreSQL, PHP JWT, phpdotenv
## Features

 - Login, Logout
 - Customer Management (Get with paginate, Get Detail, Insert, Update, Delete, Search)
 - Order Management (Get with paginate, Get Detail, Insert, Update, Delete, Search)
## Installation
install composer
```bash
  composer install
```
db config on env    
```bash
  DB_HOST="" 
  DB_PORT= #3306 for mysql, 5432 for PostgreSQL
  DB_DATABASE=""
  DB_USERNAME=""
  DB_PASSWORD=""
  DB_CONNECTION= #input mysql for mysql and input pgsql for PostgreSQL
```
input your jwt secret key
```bash
  JWT_SECRET_KEY= 
```
## Demo

- Username : administrator
- Password : password

## API Reference

#### Login
```http
  POST /api/auth/login
```

#### Get customer list
```http
  GET /api/customer/data
```

#### Get customer detail
```http
  GET /api/customer/get/{id}
```

#### Update customer data
```http
  PUT /api/customer/update/{id}
```

#### Delete customer data
```http
  DELETE /api/customer/delete/{id}
```

#### Get order list
```http
  GET /api/order/data
```

#### Get detail order
```http
  GET /api/order/get/{id}
```

#### Update order data
```http
  PUT /api/order/update/{id}
```

#### Delete order data
```http
  DELETE /api/order/delete/{id}
```
## ERD 
#### ERD
![erd](database/erd.png)

#### DB Relation
![db relation](database/db-relation.png)

## Screenshot
#### login page
![login page](assets/images/ss/login.png)

#### login fail
![login fail](assets/images/ss/login%20fail.png)

#### login success
![login success](assets/images/ss/login%20success.png)

#### customer page
![customer page](assets/images/ss/customer.png)

#### Add New Customer
![Add New Customer](assets/images/ss/add%20customer.png)

#### Customer Delete Confirmation
![Customer Delete Confirmation](assets/images/ss/customer%20delete%20confirmation.png)

#### Customer Delete Success
![Customer Delete Success](assets/images/ss/customer%20delete%20success.png)

#### Customer Detail
![Customer Detail](assets/images/ss/customer%20detail.png)

#### Customer Update Success
![Customer Update Success](assets/images/ss/customer%20update%20success.png)

#### Order Page
![Order Page](assets/images/ss/order.png)

#### Add New Order
![Add New Order](assets/images/ss/add%20order.png)

#### Logout Confirmation
![Logout Confirmation](assets/images/ss/logout%20confirmation.png)

#### Logout Success
![Logout Success](assets/images/ss/logout%20success.png)