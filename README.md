# Simple CRUD Application for Agile Manifesto
This Application creates a simple CRUD for Agile Manifesto (Values and Principles)

## Project Repository
[Agile_App](https://github.com/paciojoji/agile_app.git)

#### Developed using
| Front-End | Back-End | Database |
| ------ | ------ | ------ |
| `Vue.Js 3` | `CodeIgniter 3` | `MySQL` |

## Project Setup
#### Project Environment Setup References
| Environment | Links |
| ------ | ------ |
| Vue JS 3 | Click Here to download [Vue.Js](https://v3.vuejs.org/) | 
| CodeIgniter 3 | Click Here to download [CodeIgniter](https://codeigniter.com/download) |
| Xampp v3.2.2 | Click Here to download [Xampp](https://www.apachefriends.org/download.html) |
| SQLyog | Click Here to download [SQLyog](https://webyog.com/product/sqlyog/) |

#### Project Development Guide
| JS | See Guide [VueJS](https://vuejs.org/v2/guide/) |
| PHP | See Guide [CodeIgniter](https://codeigniter.com/userguide3/index.html) |
| HTML/ CSS | See Guide [Bootstrap](https://bootstrap-vue.org/docs) |
| Vue Test | See Guide [Vue-Test-Utils](https://vue-test-utils.vuejs.org/) |
| Configuration | See Guide [Vue-CLI](https://cli.vuejs.org/config/#global-cli-config) |

#### Clone to your Project Directory
Go to your `XAMPP/WAMP` htdocs directory and Clone Project Repository using the following command line:
```
git clone https://github.com/paciojoji/agile_app.git
```
>This will clone your Project Repository to your local directory

## Database Setup
#### Open MYSQL Development Tool
>Open [phpMyAdmin](http://localhost/phpmyadmin/) or any MySQL Development GUI tool
#### Create Database
>Create new `agile_db` database or run the following SQL query:
```
CREATE database agile_db.sql;
```
#### Import Database
>Once you create your database, import [agile_db.sql](https://github.com/paciojoji/agile_app/blob/main/backend/agile_db.sql).

## Frontend Setup
> navigate your [frontend](https://github.com/paciojoji/agile_app/tree/main/frontend) folder inside agile_app project folder, then run the following command using Node.js terminal:
#### Install npm
```
npm install
```

#### Compiles and hot-reloads for development
```
npm run serve
```
> Copy the running local/ network address displayed after the compilation to your browser
```
  App running at:
  - Local:   http://localhost:8080/
  - Network: http://192.168.1.5:8080/
```
#### Compiles and minifies for production
```
npm run build
```

## Application Test
> Using the same [frontend](https://github.com/paciojoji/agile_app/tree/main/frontend) folder location, run the following command using Node.js terminal to test the Application:
```
npm run test:unit
```
