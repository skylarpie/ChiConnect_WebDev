
<!--
    Student:        John Hallam, Kat Traviss,  Kyla Pineda
    Student Number: 040 590 979, 040 575 976,  041 041 039
    filename:       index.php
    Date Created:   March 22, 2024
    Description:    This is TagSearch, it handles the coding for the predetermined Tags
-->


<?php
require_once('database.php');
$db = db_connect();

$id = isset($_POST['tag']) ? $_POST['tag'] : null;
$searchQuery = isset($_POST['q']) ? $_POST['q'] : null;

if ($id !== null || $searchQuery !== null) {
    // Initialize the WHERE clause of the SQL query
    $whereClause = '';

    // Add conditions for tag filtering
    if ($id !== null) {
        // Sanitize input to prevent SQL injection 
        $id = mysqli_real_escape_string($db, $id);
        $whereClause = "WHERE tags.TagID = '$id'";
    }

    // SQL query to get blogs with the selected tag
    $sql = "SELECT DISTINCT Blogs.BlogID, Blogs.authorID, Blogs.BlogTitle, Blogs.BlogContent, tags.TagName, Authors.AuthorName
            FROM Blogs
            JOIN tags ON blogs.TagID = tags.TagID
            JOIN Authors ON Blogs.authorID = Authors.AuthorID
            $whereClause";

    // Execute the query
    $result = mysqli_query($db, $sql);

    if ($result) {
        // Check if there are any rows returned
        if (mysqli_num_rows($result) > 0) {
            // Fetch and store the BlogIDs of the filtered blogs
            $blogIDs = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $blogIDs[] = $row["BlogID"];
            }
            // Free the result set
            mysqli_free_result($result);

            // Construct SQL query to search for keyword within filtered blogs
            $whereClause = "WHERE Blogs.BlogID IN (" . implode(",", $blogIDs) . ")";
            if ($searchQuery !== null) {
                $searchQuery = mysqli_real_escape_string($db, $searchQuery);
                $whereClause .= " AND Blogs.BlogContent LIKE '%$searchQuery%'";
            }

            // SQL query
            $sql = "SELECT DISTINCT Blogs.BlogID, Blogs.authorID, Blogs.BlogTitle, Blogs.BlogContent, tags.TagName, Authors.AuthorName
                    FROM Blogs
                    JOIN tags ON Blogs.TagID = tags.TagID
                    JOIN Authors ON Blogs.authorID = Authors.AuthorID
                    $whereClause";

            // Execute the query
            $result = mysqli_query($db, $sql);

            if ($result) {
                // Check if there are any rows returned
                if (mysqli_num_rows($result) > 0) {
                    // Fetch and display the data
                    while ($row = mysqli_fetch_assoc($result)) {
                        // Inside the loop where you display search results
                        echo "<a href='BlogPage.php?blog_id=" . $row["BlogID"] . "' class='blog_link'>";
                        echo "<p>" . $row["BlogTitle"] . "</p></a>";
                        echo "<p>by " . $row["AuthorName"] . "</p>";
                        echo "<p>" . substr($row["BlogContent"], 0, 100) . "...</p>"; // Display only the first 100 characters
                        echo "<p>#" . $row["TagName"] . "</p>";
                        echo "<hr>"; // Add a line break after each blog post
                    }
                }
            
            } 
        } 
    } 
} 

// Close the database connection
mysqli_close($db);
?>
