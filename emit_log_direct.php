<?php

    require_once __DIR__ . '/vendor/autoload.php';
    use PhpAmqpLib\Connection\AMQPStreamConnection;
    use PhpAmqpLib\Message\AMQPMessage;

    $connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
    $channel    = $connection->channel();
    $message    = explode(' ', $_POST['message']);
    $severity   = $_POST['severity'];

    $channel->exchange_declare('direct_logs', 'direct', false, false, false);

    $data = implode(' ', array_slice($message, 0));

    if (empty($data)) {
        $data = "Hello World!";
    }

    $msg = new AMQPMessage($data);

    $channel->basic_publish($msg, 'direct_logs', $severity);

    echo ' [x] Sent ', $severity, ':', $data, "\n";

    $channel->close();
    $connection->close();
?>
<br />
<a href="index.html">Back</a>