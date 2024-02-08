## Lottery



## install

Run `./install.sh`

This bash file build docker, install packages, generate key and run migration and seeders

# Endpoints

There is a postman export for use endpoints on 

* login

```
Post api/login
{
"email" : "user@gmail.com",
"password" : "password"
}
```

* lottery
````
GET /api/lottery/{camapignId}

````
* campaigns crud

````
GET /api/camapaigns

GET /api/camapaigns/{id}

POST /api/camapaigns

PUT /api/camapaigns/{id}

DELETE /api/camapaigns/{id}

````

