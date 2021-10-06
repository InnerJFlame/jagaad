# Application

## Step 1. Build Docker

`cd application`
`docker-compose build --no-cache`
`docker-compose up -d --remove-orphans`

## Step 2. Run console command

`php bin/console application:weather:process`
