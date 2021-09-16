## Auto HTML Table
<details>
  <summary>Sample Code</summary>
  
Here the code you can generate html table with `GET`, its will show the all records automatically as your requirent. Here we are using `DataTables.net`.
Change `http://example.com/users` which your API. and also pass the columns name below of it.
 

```html
<!DOCTYPE html>
  <html>
  <head>
    <title>Table with Crudigniter</title>
    <link href="bootstrap.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
  </head>
  <body>
  <div class="p-5">
  <table id="mytable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
  </div>
  </body>
<script>
$(document).ready(function() {
    $.extend( true, $.fn.dataTable.defaults, {
        "ordering": false
    });
    $('#mytable').DataTable( {
        "ajax": {
            "url": "http://example.com/users",
            "dataSrc": ""
        },
        "columns": [
            { data: "id" },
            { data: "name" },
            { data: "email" },
            {
              "mData": "",
              "mRender": function (data, type, row) {
                  return "<a href='/edit=" + row.id + "'>EDIT</a>";
              }
            }
        ]
    } );
} );
</script>
<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap5.min.js"></script>
</html>
```
</details>

## CRUD with Python
<details>
  <summary>Post Data</summary>
  
For Json Body  
 
  
```python
import requests as api

api_url = 'http://example.com/users'
response = api.post(url=api_url, json={
    'name':'Tony Stark',
    'email':'tony@ironman.com'
})
  ```
  
  For Form 
  
  
```python
import requests as api

api_url = 'http://example.com/users?form=true'
response = api.post(url=api_url, data={
    'name':'Tony Stark',
    'email':'tony@ironman.com'
})
  ```
</details>

<details>
  <summary>Read Data</summary>
 
  
  Read all methods will apply on `params`
  
```python
import requests as api

#for all data
api_url = 'http://example.com/users'
response = api.get(url=api_url)

#for where name=rohit
api_url = 'http://example.com/users'
response = api.get(url=api_url, params={'name':'Rohit'})

print(response.json())
  ```
</details>

<details>
  <summary>Update Data</summary>

  
```python
import requests as api

api_url = 'http://example.com/users?name=Tony Stark'
response = api.put(url=api_url, json={
    'name':'Mr. Tony Stark'
})
  ```
</details>

<details>
  <summary>Delete Data</summary>
 
  
```python
import requests as api

api_url = 'http://example.com/users'
response = api.delete(url=api_url, json={
    'name':'Mr. Tony Stark'
})
  ```
</details>
