# Furaha School Management Backend

## About FSMS

Build on Laravel Framework
 - student admissions

## Installation

1) clone the repository `git clone https://github.com/OwenKelvin/Laravel-School-Management-System-Backend.git`
2) Open project directory and rename create file `.env` with the contents of the `.env.example`
3) Run `php artisan key:generate` to generate application keys
4) Create a database and update its details on the `.env` file
5) Run `php artisan migrate --seed`
5) Run `php artisan passport:install`

## API

 ### GET /students
 ```endpoint
  GET /students
 ```
 
 #### Parameters
| Parameter | Required  | 
|:---------:|:---------:|
| `id`      |  false    |

#### sample response
```html
// 20191212143709
// http://localhost:1234/api/students?id=46

{
  "id": 46,
  "first_name": "qwerty",
  "last_name": "qwerty",
  "middle_name": null,
  "other_names": null,
  "birth_cert_number": null,
  "date_of_birth": "2019-12-02",
  "email": null,
  "phone": null,
  "name_prefix_id": null,
  "gender_id": null,
  "religion_id": null,
  "student_id": "24",
  "gender": "M",
  "religion": "Christian"
}
```

