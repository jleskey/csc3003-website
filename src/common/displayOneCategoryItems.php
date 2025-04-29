<?php

include_once '../services/connectToDatabase.php';

$imageURLBase = 'assets/services';

if (!isset($_GET['category'])) {
    die('No category selected.');
}

$category = $_GET['category'];

// NOTE: The services should already be properly ordered.
$query = "SELECT * FROM Products WHERE category = ?";
$stmt = $db->prepare($query);
$stmt->bind_param('s', $category);

if (!$stmt->execute()) {
    die('Could not query database for services.');
}

$services = $stmt->get_result();

?>
        <div class="h-scroll">
            <table>
                <thead>
                    <tr>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
<?php

while ($row = $services->fetch_assoc()) {
    $name = isset($row['name'])
        ? htmlspecialchars($row['name'])
        : '(no name)';
    $description = isset($row['description'])
        ? htmlspecialchars($row['description'])
        : '';
    $imageURL = !empty($row['image_url'])
        ? htmlspecialchars("$imageURLBase/{$row['image_url']}")
        : NULL;
    $price = isset($row['price'])
        ? sprintf("$%0.2f", $row['price'])
        : NULL;
    $hourly = (($row['hourly'] ?? 0) == 1);

    $image = $imageURL
        ? "<img class=\"sm\" src=\"$imageURL\" alt=\"$name\" title=\"$name\">"
        : '';
    $printedPrice = $price . ($hourly ? '/hr.' : '');

?>
                    <tr>
                        <td><?php echo $image; ?></td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $description; ?></td>
                        <td><?php echo $printedPrice; ?></td>
                    </tr>
<?php

}

$stmt->close();
$db->close();

?>
                </tbody>
            </table>
        </div>
