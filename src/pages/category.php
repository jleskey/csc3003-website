<?php

$title = 'Service List';
$service = true;
include '../common/header.php';

$catalogPage = 'pages/catalog.php';

$category = !empty($_GET['category'])
    ? htmlspecialchars($_GET['category'])
    : 'Category';

$returnLink = "<a href=\"$catalogPage\">Our Service Catalog</a>";
$breadcrumbs = "$returnLink <span class=\"divider\">&gt;</span> $category";

?>
        <header>
            <h1><?php echo $breadcrumbs; ?></h1>
        </header>
<?php include '../common/displayOneCategoryItems.php'; ?>
<?php include '../common/footer.php'; ?>
