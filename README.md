## Instalation
    1.  Checkout branch
    2.  docker-compose up -d
    3.  On 127.0.0.0:9500 composer install

## Configuration
    create .env configuration file
    run php artisan migrate 

## entry points

#Login/register
    POST /api/register 
        -name
        -email
        -password
        -role 1- Writer 2-Reader 
        return: hash
    POST /api/login 
        -email
        -password
        return: hash

#Article

    GET|HEAD  api/articles
        return: list of articles

    GET|HEAD  api/articles/search
        - search_word
        return search articles by title and description

    GET|HEAD  api/articles/{article}
        return article by id

    POST      api/article 
        -title
        -description
        -body
        -comment status 

    PUT       api/articles/{article}
        edit article  by id

    DELETE    api/articles/{article}
        delete article by id

#Comment

    POST      api/comment/{article}
        -comment 

    DELETE    api/comment/{comment}
        delete by comment id
    PUT       api/comments/{comment}
        update by comment id

#Image

    POST      api/image/{article}
        -file (multypart form data)
    DELETE    api/images/{image}
        delete by id