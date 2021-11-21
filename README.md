## About

Create a simple subscription platform(only RESTful APIs with MySQL) in which users can subscribe to a website (there can be multiple websites in the system). Whenever a new post is published on a particular website, all it's subscribers shall receive an email with the post title and description in it.

## How to run

- clone the repo
- Run `composer install`
- Copy .env.example & create .env & do necessary modification regarding database
- Run `php artisan serve`
- Run `php artisan queue:work` to make queue work
- Run `php artisan subscriber:send-email` to send email to the respective subscribers.

## REST endpoints
- Create website resources: `/api/websites`
  - Method: `POST`
  - Attributes: `domain(required), description`
- Create post resources: `/api/posts`
  - Method: `POST`
  - Attributes: `title(required), description(required), website_id(required)`
- Create subscriber resources: `/api/subscribers`
  - Method: `POST`
  - Attributes: `name(required), email(required), website_id(required)`
