<?php
//get parameter from environment, if defined, or fallback to defaults
$db_host = ((isset($_SERVER['RDS_HOST'])) ? ($_SERVER['RDS_HOST']) : ('localhost'));
$db_name = ((isset($_SERVER['RDS_NAME'])) ? ($_SERVER['RDS_NAME']) : ('serverful-webapp'));
$db_user = ((isset($_SERVER['RDS_USER'])) ? ($_SERVER['RDS_USER']) : ('serverful-webapp'));
$db_password = ((isset($_SERVER['RDS_PASSWORD'])) ? ($_SERVER['RDS_PASSWORD']) : ('serverful-webapp'));
$db_port = ((isset($_SERVER['RDS_PORT'])) ? ($_SERVER['RDS_PORT']) : ('3306'));

//set connection url parameter for doctrine.yaml
$container->setParameter('app.database_url', "mysql://$db_user:$db_password@$db_host:$db_port/$db_name");