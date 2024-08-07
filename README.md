This is test application, to run it you should run the next commands:
 - git clone git@github.com:2tko/submission.git
 - cd submission
 - cp .env.example .env
 - composer install
 - ./vendor/bin/sail up -d

Now we have running application on docker. Next connect to DB: credential see on .env file
After connect to DB you should create `laravel` database next run command `./vendor/bin/sail php artisan migrate`

Run `./vendor/bin/sail php artisan queue:listen` for queue

Now you can send a request to our API
POST: `http://127.0.0.1/api/submit`
BODY: `{"name": "John Doe","email": "john.doe@example.com","message": "This is a test message."}`

Run for phpunit `./vendor/bin/sail php artisan test --env=testing`

