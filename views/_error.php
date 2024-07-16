
<?php
/** @var $exception \Exception */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
</head>
<body>
<h1>Error: <?php echo $exception->getCode() ?></h1>
<p><?php echo $exception->getMessage() ?></p>
<pre><?php echo nl2br($exception->getTraceAsString()) ?></pre>
</body>
</html>
