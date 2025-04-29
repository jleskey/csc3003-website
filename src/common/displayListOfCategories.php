<?php

include_once "../services/connectToDatabase.php";

$categoryPage = "pages/category.php";

$query = "SELECT category, COUNT(*) as count FROM Products GROUP BY category";
$categories = mysqli_query($db, $query);

if (!$categories) {
    die('No categories found.');
}

?>
        <div class="h-scroll">
            <table>
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Number of Products</th>
                    </tr>
                </thead>
                <tbody>
<?php

while ($row = mysqli_fetch_array($categories, MYSQLI_ASSOC)) {
    $category = !empty($row['category'])
        ? htmlspecialchars($row['category'])
        : "(no name)";
    $count = $row['count'] ?? 0; // should always have a value, but...

    $href = "$categoryPage?category=$category";
    $anchor = "<a href=\"$href\">$category</a>";

?>
                    <tr>
                        <td><?php echo $anchor; ?></td>
                        <td><?php echo $count; ?></td>
                    </tr>
<?php

}

mysqli_close($db);

?>
                </tbody>
            </table>
        </div>
