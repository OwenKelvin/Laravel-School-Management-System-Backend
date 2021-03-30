# Furaha School Management Backend

## About FSMS

Build on Laravel Framework
 - Student admissions
 - Procurements
 - E-learning
 - Library

## Installation

1) clone the repository `git clone https://github.com/OwenKelvin/Laravel-School-Management-System-Backend.git`
2) Open project directory and rename create file `.env` with the contents of the `.env.example`
3) Run `php artisan key:generate` to generate application keys
4) Create a database and update its details on the `.env` file
5) Run `php artisan migrate --seed`
5) Run `php artisan passport:install`

## API

### Check server is running
 ```endpoint
GET /
 ```
Determine if server is running by visiting this route. This will return status code `200 OK`

### Authentication
```endpoint
POST /api/oauth/token
```

#### Parameters
|     Parameter   |   Type  |  Required | 
|:--------------- |:-------:|:---------:|
| `grant_type`    | string  |  true     |
| `client_id`     | integer |  true     |
| `client_secret` | string  |  true     |
| `username`      | string  |  true     |
| `password`      | string  |  true     |
| `scope`         | string  |  true     |

<details>
  <summary>Sample request object</summary>

```json5
{
  "grant_type": "password",
  "client_id": "2",
  "client_secret": "duK0bplTPn2BeyrsjX1939Y9OPIjPytEFUUNwjqD",
  "username": "info@furahasolutions.tech",
  "password": "Password1",
  "scope": ""
}
```
</details>

#### Responses

1) **Status 200 OK**

<details>
  <summary>Sample response object</summary>

```json5
{
  "token_type": "Bearer",
  "expires_in": 31536000,
  "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIyIiwianRpIjoiMWE2NjZjMjkxNWQ4MzRmOTgyZjg1NWUwZTkyNjI4ZTk0ZTVkMzVmZjVjYmMyZGI1OWI5MGQ0ODZmM2ExMTU0ZjZjNjNmZWYyODRmNTlhYmIiLCJpYXQiOjE2MTcwMjY5NjMuNDI3ODk4LCJuYmYiOjE2MTcwMjY5NjMuNDI3OTA5LCJleHAiOjE2NDg1NjI5NjMuMzUwMDEzLCJzdWIiOiIxMSIsInNjb3BlcyI6W119.PPn4gB_8Zs3xmQavuORvLs8ehnw7RWILIQgzK2kopW0ZO-qKrWy6qM_Ar_I2ZvYEgHyIAqCq5RJ8TrWcr9LLP4SBsdwy38CgodjxeQJXgkBds_XrjagVR4AAoexmdoEU2ZtLAUBMM4rzJUCuusUF3sHR2MUm8fFTg01SdqOMWB1Ve8PbHP2gGuCYzHGNBDl2BB5vSt6NLgJF6A5G8iJiYbW9CL02Z1NyGjMqpI74rguU4L0i_tiUhZDlPW8jUU5SAEv3eeTBWoc7N2CdG_4cVjpbCqj4SmrwYTUmtgzxtBC6k2vA1jmWrmA0pLz6OVxzl8DYV80D9GlwORVCfgiiIeU5ASi57u9NVonH2irXKl01bhLJswy9IvzZLHqTpb-qrCTeVYa6EZK_coGZqDcjVubhHw7uHRQI8vATime5X4uz76sfMXaCwf7VksTsI6ywsQmDxjO90ipMAOqb9qruq-xlMUK6eWl8Cpn8Q_fn11NpVaCgw0fmxpFFgmJn68RDfNyauqN8xjRh02U2Cd6_mdun4XQySBIusKVNBsoUc5GucjpdfChRlBu9S06lNpRMihyuqJWtwEWAaG4hqnGwGg9vLL2113Bm0mwiQb00B4POqmoGIjG7X3l5XD6ArMPgQEPqL4TMV40vttOaH8VMKwjlTPmjtsB0xtel4iwK7bE",
  "refresh_token": "def502008412882ce07b090e9e29709cb682143e250c78044cb2d572a2f150b8c71ec3a9b33c8eef739bf3796a0526f347472ed15ac994228f223a31b458f60e6497de7beb12440c773a8413b797a3e6341a5a871f51f9724bd9e514893a69bac374d5c563d2bbf0540fdc17e11ce482f55d007c31b4892afd91228517e090bcb02f6e04db7016aec306b9b84016a9a21c409b9bb0c41fd5f344d20ee2519d5abf099d6061dbf7ce67b682f7a1e748a45c2d3758c35173bda88c0ea05a945f0ca2c1d7d5dc76cd89f2f442d3d0bce41bd2da7af231b0fb864ceeba9defe51dc02066a20468927742636ae4f5138e949034ffea2066b6a23553643d6ab93b721a075eddb36c3e891e635fe2698371622126374e985981db90add5070411bf1d5df9b504977f4447c7b9f09c3545b0d70512f048eeb12c1709da1e4bfc3a31e1840deb5c828984f9c8c8880d381ea69a54168c4dea520f5b1997f681f94f75871f4f56"
}
```
</details>

---

2)  **Status 400 Bad Request**

Error is thrown if user provides invalid credential

<details>
  <summary>Sample error message</summary>

```json5
{
  "error": "invalid_grant",
  "error_description": "The provided authorization grant (e.g., authorization code, resource owner credentials) or refresh token is invalid, expired, revoked, does not match the redirection URI used in the authorization request, or was issued to another client.",
  "hint": "",
  "message": "The provided authorization grant (e.g., authorization code, resource owner credentials) or refresh token is invalid, expired, revoked, does not match the redirection URI used in the authorization request, or was issued to another client."
}
```
</details>

3) **Status 401**

api requires a valid `client_id` and `client_secret`. If these values are invalid this error is thrown

<details>
  <summary>Client authentication fail</summary>

```json5
{
  "error": "invalid_client",
  "error_description": "Client authentication failed",
  "message": "Client authentication failed"
}
```
</details>

---

```endpoint
GET /api/users/auth
```

#### Responses
 1) Authenticated users will receive back user info details
<details>
  <summary>Sample user details response</summary>

```json5
{
  "id": 74,
  "first_name": "John",
  "last_name": "Doe",
  "middle_name": null,
  "verified_by_id": null,
  "creator_id": null,
  "verified_at": null,
  "birth_cert_number": null,
  "other_names": null,
  "date_of_birth": "1990-03-02",
  "email": "librarian1@gmail.com",
  "email_verified_at": null,
  "created_at": "2021-03-29T20:21:26.000000Z",
  "updated_at": "2021-03-29T20:25:51.000000Z",
  "name_prefix_id": null,
  "phone": "+254712345678",
  "gender_id": null,
  "religion_id": null,
  "permissions": ["edit library book tag", "add library book tag", "add library book", "edit library book", "view issued books", "issue library book", "mark library book returned", "access library admin", "add library user", "block library user", "unblock library user", "add library book author", "edit library book author", "add library book publisher", "edit library book publisher", "access library account", "access library", "view student class list", "access student list report", "access reports", "send message", "read student", "view student admissions", "read teacher", "read guardian", "make procurement request", "upload study materials", "create e-learning course"
  ],
  "roles": ["librarian"]
}
```
</details>

___

2) Unauthorised access will return `401 unauthorised` error

<details>
  <summary>Sample Error</summary>
  
```json5
{ "message":"Unauthenticated." }
```
</details>

___

### Students

```endpoint
  GET /students
 ```
 
 #### Parameters
| Parameter |   Type  |  Required | 
|:---------:|:-------:|:---------:|
| `id`      | integer |  false    |


<details>
  <summary>
    Sample response
  </summary>

```json5
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
</details>


### Academics

```endpoint
GET /api/e-learning/course-content/topics/:id/online-assessments
```
#### parameters

|     Parameter   |  Description |
|:--------------- |:------------|
| `:id`            | (*Required* , *Integer*, *URL param*) <br /> The topic id for the online assessment  

```endpoint
POST /api/e-learning/course-content/topics/:id/online-assessments
```
#### parameters

|     Parameter   |  Description |
|:--------------- |:------------|
| `:id`            | (*Required* , *Integer*, *URL param*) <br /> The topic id for the online assessment  
| `available_at`   | (*Required* , *Timestamp*) <br /> Time assessment can be accessed
| `closing_at`     | (*Required* , *Timestamp*) <br /> Time assessment will be closed
| `period`         | (*Required* , *String*, *URL param*) <br /> Time to take assessment once it starts 
| `name`           | (*Required* , *String*, *URL param*) <br /> Name of assessment 

<details>
  <summary>Sample request body</summary>

```json5
{
  "available_at": "2021-01-02T08:00",
  "closing_at": "2021-01-02T09:00",
  "period": "PT1H",
  "name": "LA Cat 1 2021 Term 1",
  "_method": "POST"
}
```
</details>

#### Responses
1) Status 201 OK
<details>
  <summary>Sample response</summary>

```json5
{
  "id": 1,
  "description": "Introduction",
  "e_learning_topic_id": null,
  "e_learning_course_id": 1,
  "topic_number_style_id": 1,
  "created_at": "2021-03-28T15:40:00.000000Z",
  "updated_at": "2021-03-28T15:40:00.000000Z",
  "topic_number_style_name": "Chapter",
  "expected_learning_outcomes": [
    {
      "id": 1,
      "description": "Define LA",
      "e_learning_topic_id": 1,
      "position": 0,
      "created_at": "2021-03-28T15:49:58.000000Z",
      "updated_at": "2021-03-28T15:49:58.000000Z"
    }
  ],
  "learning_content_materials": [],
  "online_assessments": [],
  "topic_number_style": {
    "id": 1,
    "name": "Chapter",
    "default": 1,
    "active": 1,
    "deleted_at": null
  },
  "learning_outcomes": [
    {
      "id": 1,
      "description": "Define LA",
      "e_learning_topic_id": 1,
      "position": 0,
      "created_at": "2021-03-28T15:49:58.000000Z",
      "updated_at": "2021-03-28T15:49:58.000000Z"
    }
  ],
  "e_learning_contents": []
}
```
</details>
