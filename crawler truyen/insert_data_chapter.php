<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "datn"; // Update this to your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Read data from JSON file
$filename = 'chapter_data.json'; // JSON file with chapter data
$chapters_data = json_decode(file_get_contents($filename), true);

// Check if data exists in the JSON file
if ($chapters_data) {
    // Loop through each chapter and insert it into the database
    foreach ($chapters_data as $chapter) {
        // Escape special characters
        $id = (int)$conn->real_escape_string($chapter['id']);
        $slug = $conn->real_escape_string($chapter['slug']);
        $title = $conn->real_escape_string($chapter['title']);
        $content = $conn->real_escape_string($chapter['content']);
        $word_count = (int)$conn->real_escape_string($chapter['word_count']);
        $episode_id = (int)$conn->real_escape_string($chapter['episode_id']);
        $book_id = (int)$conn->real_escape_string($chapter['book_id']);
        $user_id = 1;
        $price = 0;
        $created_at = "NOW()"; // Use the current time for created_at
        $updated_at = "NOW()"; // Use the current time for updated_at
        $deleted_at = "NULL"; // Set deleted_at as NULL
        $order = 0;

        // Insert query
        $sql = "INSERT INTO chapters (id, slug, title, content, word_count, episode_id, book_id, user_id, price, created_at, updated_at, deleted_at, `order`)
                VALUES ($id, '$slug', '$title', '$content', $word_count, $episode_id, $book_id, $user_id, $price, '$created_at', '$updated_at', '$deleted_at', $order)";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully for chapter: $title\n";
        } else {
            echo "Error: " . $sql . "\n" . $conn->error;
        }
    }
} else {
    echo "No data found in JSON file.";
}

// Close the connection
$conn->close();