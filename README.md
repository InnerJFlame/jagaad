# Application

## Step 1. Build Docker

`cd application`

`docker-compose build --no-cache`

`docker-compose up -d --remove-orphans`

## Step 2. Configure .env.local file

`Need to make .env.local based on .env. Don't forget to add the API key in API_WEATHER_KEY`

## Step 3. Run console command

`php bin/console application:weather:process`
