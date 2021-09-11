- [Create](#create)
- [Read](#read)
  * [Read Paramters and Usage](#read-paramters-and-usage)
  * [Read Parameter examples](#read-parameter-examples)
    + [Blank (All Records)](#blank)
    + [Column](#column)
    + [Only](#only)
    + [Not](#not)
    + [Query](#query)
    + [Single](#single)
    + [Columns](#columns)
- [Delete](#delete)
  * [Delete All Data](#delete-all-data)
  * [Delete specific data](#delete-specific-data)
- [Update](#update)
  * [Update all record](#update-all-record)
  * [Update Specific](#update-specific)
- [Columns]


Your API url always be `example.com/table`, as your requeste it automattlcy detect the requste is post, delete, put or read.
## Create
It will create new record on table.

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


