<!--
    Student:        John Hallam, Kat Traviss,  Kyla Pineda
    Student Number: 040 590 979, 040 575 976,  041 041 039
    filename:       index.php
    Date Created:   March 22, 2024
    Description:    This is SearchBar, it handles the coding for the search bar
-->

<?php
require_once('database.php');
$db = db_connect();

$searchQuery = isset($_POST['q']) ? $_POST['q'] : null;

if ($searchQuery !== null) {
    $search = "%" . mysqli_real_escape_string($db, $searchQuery) . "%";
    // SQL query to search for keyword matches in blog content
    $sql = "SELECT b.blogID, b.BlogTitle, b.BlogContent, a.AuthorName, t.TagName 
            FROM blogs b
            LEFT JOIN tags t ON b.tagID = t.tagID
            LEFT JOIN authors a ON b.authorID = a.authorID
            WHERE b.BlogContent LIKE ?";
    // Prepare the SQL statement
    $stmt = $db->prepare($sql);
    // Bind the search parameter
    $stmt->bind_param("s", $search);
    // Execute the prepared statement
    $stmt->execute();
    // Bind the columns to the variables
    $stmt->bind_result($blogID, $blogTitle, $content, $authorName, $tagName);
    // Fetch and display the search results
    while ($stmt->fetch()) {
        // Wrap each result within an <a> tag linking to the blog page
        echo "<a href='BlogPage.php?blog_id=$blogID' class='blog_link'>";
        echo "<p> " . $blogTitle . "</p></a>";
        echo "<p>by " . $authorName . "</p>";
        echo "<p> " . substr($content, 0, 100) . "...</p>"; // Display only the first 100 characters
        echo "<p>#" . $tagName . "</p>";
        echo "<hr>"; // Add a line break after each blog post
    }
    // Close the statement after use
    $stmt->close();
} else {
    echo "No search criteria provided.";
}

// Close the database connection
mysqli_close($db);
?>
