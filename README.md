
##Project Requirements

Create a simple subscription platform(only RESTful APIs with MySQL) in which users can subscribe to a website (there can be multiple websites in the system). Whenever a new post is published on a particular website, all it's subscribers shall receive an email with the post title and description in it. (no authentication of any kind is required)

MUST:-
- Use PHP 7.* or 8.* 
- Write migrations for the required tables.
- Endpoint to create a "post" for a "particular website".
- Endpoint to make a user subscribe to a "particular website" with all the tiny validations included in it.
- Use of command to send email to the subscribers (command must check all websites and send all new posts to subscribers which haven't been sent yet).
- Use of queues to schedule sending in background.
- No duplicate stories should get sent to subscribers.
- Deploy the code on a public github repository.

OPTIONAL:-
- Seeded data of the websites.
- Open API documentation (or) Postman collection demonstrating available APIs & their usage.
- Use of contracts & services.
- Use of caching wherever applicable.
- Use of events/listeners.

Note:- 
1. Please provide special instructions(if any) to make to code base run on our local/remote platform.
2. Only implement what is mentioned in brief, i.e. only the API, no front-end things etc. The codes will never be deployed, we just want to see your coding skills. 
3. There isn't a strict deadline. The faster the better, however code quality (and implementing it as mentioned in brief) is the most important. However, of course it shouldn't take more than a couple of hours. 
4. If anything isn't clear, just implement it according to your understanding. There won't be any further explanations, the task is clear. As long as what you do doesn't contradict the briefing, it's fine. 

## Installation

- You can remove the .example extension from the .env.example file
- You need to install MySQL locally.
- You need to create user and change the env file based on that
before running migrations you need to create a database subscription_platform

```
CREATE DATABASE subscription_platform;
```
You can run migrations with the command below:
```
php artisan migrate
```

You can seed the database with the command below:
```
php artisan db:seed
````
This will add some websites, posts, subscriptions

Finally you can run the project with the command below
```
php artisan serve --port=8000
```
Now your application is up and running at http://localhost:8000
```
php artisan queue:work --queue=emails
```
Use this command to send post emails
```
php artisan send-posts-to-emails
```

Here is the route json I used Thunder Client
[Collection Link](thunder-collection_subscription-platform.json)
