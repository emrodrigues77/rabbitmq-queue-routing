# RabbitMQ Publish/Subscribe Queue

PHP simplest study on RabbitMQ routing queues, with a basic UI for emitting logs. 

## How to run

### Run RabbitMQ
docker run -it --rm --name rabbitmq -p 5672:5672 -p 15672:15672 rabbitmq:4.0-management

### To save only error and warning logs in a file
php receive_logs_direct.php warning error > logs_from_rabbit.log

### To show all logs on the screen
php receive_logs_direct.php info warning error

### To emit logs
Navigate to index.html and emit a log.
