<?php
include "teams.php";
include "last.php";
include "fixtures.php";
include "includes/db.php";

 
?>
</main>
<?php include "includes/main.php"?>

<!-- Blog Posts Section -->
<section style="max-width:800px; margin:40px auto;">
<h2 style="text-align:center;">Latest Blog Posts</h2>
<?php
$sql = "SELECT * FROM posts ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($post = $result->fetch_assoc()) {
        echo "<div style='border:1px solid #ddd; padding:15px; margin-bottom:20px; border-radius:10px;'>";
        echo "<h3>" . htmlspecialchars($post['title']) . "</h3>";
        echo "<p>" . nl2br(substr($post['content'], 0, 250)) . "...</p>";
        echo "<small>By " . htmlspecialchars($post['author']) . " | " . $post['created_at'] . "</small><br>";
        echo "</div>";
    }
} else {
    echo "<p>No blog posts yet.</p>";
}

$conn->close();
?>
</section>

<?php include "includes/footer.php"?>

</body>
</html>
