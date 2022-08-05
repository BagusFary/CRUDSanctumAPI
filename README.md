
# CRUD Admin Panel with Sanctum API Laravel

Tugas Magang , Admin Panel REST API menggunakan token auth dengan Laravel Sanctum



## Screenshots

### Register 
![Register](https://github.com/BagusFary/CRUDSanctumAPI/blob/master/screenshots/Screenshot_1.jpg?raw=true)

### Login
![Login](https://github.com/BagusFary/CRUDSanctumAPI/blob/master/screenshots/Screenshot_2.jpg?raw=true)

### Dashboard
![Dashboard](https://github.com/BagusFary/CRUDSanctumAPI/blob/master/screenshots/Screenshot_3.jpg?raw=true)

### List Users
![List Users](https://github.com/BagusFary/CRUDSanctumAPI/blob/master/screenshots/Screenshot_4.jpg?raw=true)

### List Posts
![List Posts](https://github.com/BagusFary/CRUDSanctumAPI/blob/master/screenshots/Screenshot_5.jpg?raw=true)

## Sanctum API with Token Auth


### Set Headers : 
![Set Headers](https://github.com/BagusFary/CRUDSanctumAPI/blob/master/screenshots/Screenshot_6.jpg?raw=true)

### Register and get Token auth

```bash
  POST /api/register
```
![Register](https://github.com/BagusFary/CRUDSanctumAPI/blob/master/screenshots/Screenshot_7.jpg?raw=true)

### Set Auth Token
![Set Auth Token](https://github.com/BagusFary/CRUDSanctumAPI/blob/master/screenshots/Screenshot_8.jpg?raw=true)
 
### With Auth Token you can access all routes
```bash
# Public Routes
  POST /api/register
  POST /api/login
# Users 
  GET /api/users
  GET /api/users/{id}
  GET /api/users/search/{name}
# Posts
  GET /api/posts
  GET /api/posts/{id}
  GET /api/posts/search/{judul}

# Protected Routes
  POST /api/logout
# Users 
  POST /api/users
  PUT /api/users/{id}
  DELETE /api/users/{id}
# Posts
  POST /api/posts
  PUT /api/posts/{id}
  DELETE /api/posts/{id}
  
```

### Logout

```bash
  POST /api/logout
```
![Logout](https://github.com/BagusFary/CRUDSanctumAPI/blob/master/screenshots/Screenshot_10.jpg?raw=true)

### Login
```bash
  POST /api/login
```
![Login](https://github.com/BagusFary/CRUDSanctumAPI/blob/master/screenshots/Screenshot_9.jpg?raw=true)




