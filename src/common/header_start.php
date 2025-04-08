<?php

$base = str_replace('/var/www/html', '', realpath(__DIR__ . '/..')) . '/';
$prefix = $title ? "$title &bullet; " : "";
$htmlClassList = $htmlClass ? " class=\"$htmlClass\"" : "";

?>
<!DOCTYPE html>
<html lang="en"<?php echo $htmlClassList; ?>>

<head>
    <title><?php echo $prefix; ?>Authorial Amenities</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="<?php echo $base; ?>">
    <link rel="stylesheet" href="styles/main.css">
