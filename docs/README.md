
<p align="center">Crudigniter is fast and easy API Database integrator  for Codeigniter 4, its can easy to perform CRUD technique for CI Application. You don't have to create diffrent method for CRUD techniue. everything is possible here in a single API.</p>

# Why Crudigniter 🔥
There is single API for everything to perform CRUD, use can easily create record on database with POST, to read with GET, to delete for DELETE and for update PUT. You do this from multiple platform and application because we know this is power of API.

# Security <img width="40" src="https://upload.wikimedia.org/wikipedia/commons/e/eb/Blinking_warning.gif"/>
Security added for all methods, in before its just accessing and performing CRUD technique without any key and authorization. But now we added authorization (bearer token) for CRUD. Its a optional feature. If you want to enable security it wil always need authorization else nothing. Follow the below introduction to use.

<img width="20" src="https://upload.wikimedia.org/wikipedia/commons/9/92/Orange_animated_right_arrow.gif"/>[Here the Security Documentation](https://rohit-chouhan.github.io/crudigniter/#/security/)

# Some Best Usage with Crudigniter
<img width="20" src="https://upload.wikimedia.org/wikipedia/commons/9/92/Orange_animated_right_arrow.gif"/>[Here the Tricks Documentation](https://rohit-chouhan.github.io/crudigniter/#/tricks/)

# Installation and Use 🔥
Just copy the whole program its CI4, and add create database and implication from `App/Config/Database.php` or `root/.env`. There are some classes in Controller don't delete it. Just create new class which you want and enjoy coding.

in `db_table`, you can give your database's table name where you want to perform CRUD.

|API|Method| Usage|
|-|-|-|
|example.com/db_table| POST | create new records|
|example.com/db_table| GET | read records|
|example.com/db_table| PUT, PATCH | update new record|
|example.com/db_table| DELETE | delete record|

# Example Scene
<p align="left"><img width="450" src="https://github.com/rohit-chouhan/crudigniter/blob/main/crud-working.png?raw=true"/></p>

# Table of content
  * [Create](#create)
    + [Json body](#json-body)
    + [Form data](#form-data)
      - [Data Only](#data-only)
      - [Data and Images](#data-and-images)
  * [Read](#read)
    + [Read Paramters and Usage](#read-paramters-and-usage)
    + [Read Parameter examples](#read-parameter-examples)
      - [Blank](#blank)
      - [Column](#column)
      - [Only](#only)
      - [Not](#not)
      - [query](#query)
      - [Single](#single)
      - [Columns](#columns)
  * [Delete](#delete)
    + [Delete All Data](#delete-all-data)
    + [Delete specific data](#delete-specific-data)
  * [Update](#update)
    + [Update all record](#update-all-record)
    + [Update Specific](#update-specific)
- [Change Logs](#change-logs)

# Methods
Your API url always be `example.com/table`, as your requeste it automattlcy detect the requste is post, delete, put or read.

## Create
It will create new record on table.

### Json body
>example.com/table

Record will be pass as json body with  `POST` method
```json
{
    "name":"Rohit"
}
```
it will create new records in `users` table with name(column) Rohit(value).

return when success
```json
{
    "status":true,
    "message":"Records added successfully"
}
```

### Form data
If you want to send data from `form` & want to upload files, you have to use form requeste. Image upload will only work in form data. Here you have to use parameter `form=true`, and for image `image=file_field_name`.

#### Data Only
>example.com/table?form=true

it will create new records in `users` table with all field which is recived from source.

return when success
```json
{
    "status":true,
    "message":"Records added successfully"
}
```

#### Data and Images
>example.com/table?form=true&image=profile_pic

Make sure you are using `Accept-Encoding` header, when uploads file.

Note: profile_pic is name of field and database column also. it will received image from profile_pic(input form) and will store name of file to profile_pic(table's column). you can upload multiple image by passing by comma like this `image=profile_pic,cover,mycard`

File will be uploaded at `root/uploads` folder with random name.

return when success
```json
{
    "status":true,
    "message":"Records added successfully"
}
```

## Read
It will return all records in json format and fast. method will use `GET`.
### Read Paramters and Usage
|parameter|description|example|
|-|-|-|
| blank | if you not passing any parameter it will retrive all data from table| --- |
|column | It will work like where clause, it will retrive all data where column = value, its can take multiple value also.| `name=Rohit` or `name=Rohit&city=Ajmer`|
|only| If you want to retrive data for perticular column so here user can use `only` parameter and can give column by comma, so it will return only perticular column records| only=name,city|
|not| If you want to ignore some columns from record so user can pass column in not parameter | not=phone_number,password|
|query| Sometime maybe you will expect own records, so this is special parameter here you can direcly give SQL Query | query=select * from users |
|single| If you want to get only one single data so you can use single parameter| `single=true` or `id=1&single=true` |
|columns| If you want know column name, datatype of table | columns=true |

Here the parameter for joins [NEW]

|parameter|description|example|
|-|-|-|
|leftjoin| to apply left joins | leftjoin=foreign_table|
|rightjoin| to apply right joins | rightjoin=foreign_table|
|innerjoin| to apply inner joins | innerjoin=foreign_table|
|leftouterjoin| to apply left outer joins | leftouterjoin=foreign_table|
|rightouterjoin| to apply right outer joins | rightouterjoin=foreign_table|
|fullouterjoin| to apply full outer joins | fullouterjoin=foreign_table|
|on| `on` is must with joins parameter, its use connect columns for both table |on=self_column,foreign_column|

Join Example:
>example.com/users?innerjoin=address&on=id,user_id
<p align="left"><img width="750" src="https://github.com/rohit-chouhan/crudigniter/blob/main/joins-working.jpg?raw=true"/></p>

### Read Parameter examples

Example Table and Records, table name is `users`

|id|name|email|password|
|-|-|-|-|
|1|Rohit|rohit@gmail.com|Rohit321|
|2|Rahul|rahul@gmail.com|123Rahul|
|3|Komal|komal@gmail.com|Xyz123|
|4|Neha|komal@gmail.com|iloveyou|
|5|Pooja|pooja@gmail.com|iampooja|

#### Blank
>example.com/users

```json
[
  {
    "id": "1",
    "name": "Rohit",
    "email": "rohit@gmail.com",
    "password": "Rohit321"
  },
  {
    "id": "2",
    "name": "Rahul",
    "email": "rahul@gmail.com",
    "password": "123Rahul"
  },
  {
    "id": "3",
    "name": "Komal",
    "email": "komal@gmail.com",
    "password": "Xyz123"
  },
  {
    "id": "4",
    "name": "Neha",
    "email": "neha@gmail.com",
    "password": "iloveyou"
  },
  {
    "id": "5",
    "name": "Pooja",
    "email": "pooja@gmail.com",
    "password": "iampooja"
  }
]
```
#### Column
>example.com/users?name=Rohit

or

>example.com/users?name=Rohit&id=1

```json
[
  {
    "id": "1",
    "name": "Rohit",
    "email": "rohit@gmail.com",
    "password": "Rohit321"
  }
]
```

#### Only
>example.com/users?only=id,name

```json
[
  {
    "id": "1",
    "name": "Rohit"
  },
  {
    "id": "2",
    "name": "Rahul"
  },
  {
    "id": "3",
    "name": "Komal"
  },
  {
    "id": "4",
    "name": "Neha"
  },
  {
    "id": "5",
    "name": "Pooja"
  }
]
```

#### Not
>example.com/users?not=email,password

```json
[
  {
    "id": "1",
    "name": "Rohit"
  },
  {
    "id": "2",
    "name": "Rahul"
  },
  {
    "id": "3",
    "name": "Komal"
  },
  {
    "id": "4",
    "name": "Neha"
  },
  {
    "id": "5",
    "name": "Pooja"
  }
]
```

#### query
>example.com/users?query=select * from users where id!=1

```json
[
  {
    "id": "2",
    "name": "Rahul",
    "email": "rahul@gmail.com",
    "password": "123Rahul"
  },
  {
    "id": "3",
    "name": "Komal",
    "email": "komal@gmail.com",
    "password": "Xyz123"
  },
  {
    "id": "4",
    "name": "Neha",
    "email": "neha@gmail.com",
    "password": "iloveyou"
  },
  {
    "id": "5",
    "name": "Pooja",
    "email": "pooja@gmail.com",
    "password": "iampooja"
  }
]
```

#### Single
>example.com/users?name=Rohit&single=true

```json
{
  "id": "1",
  "name": "Rohit",
  "email": "rohit@gmail.com",
  "password": "Rohit321"
}
```
#### Columns
If you want to know what columns are in table and what data type here we use `columns` parameter.

>example.com/users?columns=true

Response
```json
[
  {
    "name": "id",
    "datatype": "int",
    "columntype": "int(11)",
    "length": null
  },
  {
    "name": "name",
    "datatype": "varchar",
    "columntype": "varchar(15)",
    "length": "15"
  },
  {
    "name": "email",
    "datatype": "varchar",
    "columntype": "varchar(35)",
    "length": "35"
  },
  {
    "name": "password",
    "datatype": "varchar",
    "columntype": "varchar(35)",
    "length": "35"
  }
]
```

## Delete 
If you want to delete any records or all records so we use `DELETE` method.
### Delete All Data
If you want remove all data (truncate table) so here we pass table with all=true parameter, which is confirm that user is really want to delete data.
>example.com/users?all=true

```json
{
  "status":true,
  "message":"All data has been deleted"
}
```
It can delete the complete records from table.
### Delete specific data
If you want to delete perticular data from `users` table, like you want to delete data for user who have id=1. so we just normaly pass data with Json body.
>example.com/users

body
```json
{
  "id":1
}
```

return
```json
{
  "status":true,
  "message":"Data has been deleted"
}
```

It will delete the record who have id=1.

## Update
if you want to update, so here you have to use `PUT` method.
For updating data you have to pass updating data with Json in Body. and where caluse will be pass as String query.

### Update all record
>example.com/users?all=true

### Update Specific
For updating specific record there where clause will pas as string query. like you want to update name of user who have id=1.

>example.com/users?id=1

Body
```json
{
  "name":"Rohit Chouhan"
}
```

Response
```json
{
  "status":true,
  "message":"Update successfully"
}
```

It will update new name where id=1, which is passed on url. you can pass multiple string query also.

#### Change Logs
```
09/09/21
- Routes fixed [FIXED]
- API Calling path removed, and easy path added! [UPDATED]

10/09/21
- get columns name, datatype etc for read [ADDED]
- custom parameter modified to query [UPDATED]

11/09/21
- file requeste (file upload) via POST [ADDED]

12/09/21
- bug fixed in reading query [FIXED]
- table not found [FIXED]
- file upload path changed [UPDATED]
- all joins feature for READ [ADDED]

14/09/21
- autorization security [ADDED]
```

developed by <a href="https://linkedin.com/in/itsrohitchouhan">Rohit Chouhan ❤️</a>
