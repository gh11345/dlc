

## How to set up environment

1. Set up an EC2 instance / local environment (I'm using ubuntu in this case)
2. install git
3. clone project to your environment. 
4. import Sample.sql to database.
5. install npm 
6. use npm run dev to build the frontend part.


## Endpoints

The endpoints used in this project:

**Get category product list<br/>**

URL :http://34.212.176.88/api/category/getCategoryProducts<br/>
Method: GET<br/>
Sample Payload:<br/>

```json
[    
    {
        "id": 1,
        "name": "Computers",
        "children": [
            {
                "id": 4,
                "name": "Laptops",
                "children": [],
                "products": [
                    {
                        "id": 1,
                        "name": "Lenova Ryzen 9",
                        "price": "1000.00"
                    },
                    {
                        "id": 3,
                        "name": "Samsung i7",
                        "price": "1255.00"
                    },
                    {
                        "id": 4,
                        "name": "Lenova i7",
                        "price": "1200.00"
                    }
                ]
            }
        ],
        "products": [
            {
                "id": 1,
                "name": "Lenova Ryzen 9",
                "price": "1000.00"
            },
            {
                "id": 3,
                "name": "Samsung i7",
                "price": "1255.00"
            }
        ]
    }
]
```
**Get category list<br/>**

URL: http://34.212.176.88/api/category/getCategoryList?page=1&limit=2<br/>
Method: GET<br/>
Parameters: <br/>
   - page (default 1) <br/>
   - limit (default 10) <br/>
    
Sample Payload: 

```json
[
    {
        "id": 1,
        "name": "Computers",
        "parent_id": 0,
        "active": 1,
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 2,
        "name": "Cell Phones",
        "parent_id": 0,
        "active": 1,
        "created_at": null,
        "updated_at": null
    }
]
```
## Links

github: https://github.com/gh11345/dlc<br/>
demo: http://34.212.176.88/
