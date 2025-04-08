<?php $title = "Fancy Slideshow"; include('../common/header_start.php'); ?>
    <link rel="stylesheet" href="styles/slideshow2.css">
    <script src="scripts/slideshow2.js"></script>
<?php include('../common/header_end.php'); ?>
        <header>
            <h1>Slideshow</h1>
        </header>
        <figure id="slideshow" class="anim-odd">
            <img id="slide">
            <figcaption id="caption"></figcaption>
        </figure>
        <div id="thumbnails"></div>
<?php include('../common/footer.php'); ?>
