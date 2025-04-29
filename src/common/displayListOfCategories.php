<?php

include_once "../services/connectToDatabase.php";

$query = "SELECT category, COUNT(*) as count FROM Products GROUP BY category";
$categories = mysqli_query($db, $query);
$numRecords = mysqli_num_rows($categories);

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

for ($i = 1; $i <= $numRecords; $i++) {
    $row = mysqli_fetch_array($categories, MYSQLI_ASSOC);
    $category = $row['category'] ?? "(no name)";
    $count = $row['count'] ?? 0; // should always have a value, but...

    $href = "category.php?category=$category";
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
