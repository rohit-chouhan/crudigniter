
Security added for all methods, in before its just accessing and performing CRUD technique without any key and authorization. But now we added authorization (`bearer token`) for CRUD. Its a optional feature. If you want to enable security it wil always need authorization else nothing. Follow the below introduction to use.

In `roor/.env` file we added two more varibale `SECURITY_CONFIG` and `TOKEN_KEY`.

# Variable

## SECURITY_CONFIG
Its contain true and false values, if you want to enable so use `1`, for nothing use `0`

### example
To enable authorization use `1`
```
SECURITY_CONFIG = 1
```

for normal use (without authorization), try `0`
```
SECURITY_CONFIG = 0
```

## TOKEN_KEY
There you have to give a token key for autorization if `SECURITY_CONFIG` is true, while requesting method `bearer token` will compare with `TOKEN_KEY`

### example

```
TOKEN_KEY = "ABC123"
```

# How it will work?
If `SECURITY_CONFIG = 1`, it will always take `bearer token` with reqeuste, `bearer token` will be your `TOKEN_KEY`

>example.com/users

>header("Authorization: bearer ABC123")

response
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

if you not pass `bearer` as autorization or wrong key, it will reponse
```json
{
  "status":false,
  "message":"Failed to auth, token is invalid"
}
```
<hr>

If `SECURITY_CONFIG = 0`, it will work normally.

>example.com/users

response
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
