# serverful-webapp
A very simple demo app built as part of my talk on AWS. Powered by Symfony 4.
The app is a website for the talk and consists of a homepage and a comment page where users can leave comments.
The comments are saved on a mysql database.

## Requirements
This web application requires
- PHP >= 7.1.3
- MySQL >= 5.7

### Dev Dependencies
- Node.js

## Install
As usual, run `composer install` to install dependecies.

Update the [`/config/packages/database-config.php`](https://github.com/luistar/serverful-webapp/blob/a983510c1e3c66cc7e2af4173572bc33282809e0/config/packages/database-config.php#L3) 
accordingly to you database configuration.

Insert you Google Maps API Key in [`config/services.yaml`](https://github.com/luistar/serverful-webapp/blob/a983510c1e3c66cc7e2af4173572bc33282809e0/config/services.yaml#L5).
If you skip this passage the map in the homepage won't work properly.

For webserver configuration see [this page](https://symfony.com/doc/current/setup/web_server_configuration.html) from the 
Symfony docs. [The Symfony deployment guide](https://symfony.com/doc/current/deployment.html) also is very informative.

## Dev guide
I provided a few useful npm script:

- `serve`: run the development server
- `webpack-dev`: run Webpack Encore in dev mode
- `webpack-prod`: run Webpack Encore in production mode
- `drop-database`, `create-database`, `create-schema`: self-explanatory shorthands for doctrine commands
- `create-source-bundle`: creates a source bundle ready to be uploaded on Elastic Beanstalk
