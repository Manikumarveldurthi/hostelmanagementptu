<?php
if (!isset($_SESSION)) {
    session_start();
}

// Database connection
$conn = mysqli_connect("localhost", "root", "", "hostel_management_system", 3306);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

// Handle form submission for adding new post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);

    $stmt = $conn->prepare("INSERT INTO blog_posts (title, content, author) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $content, $author);

    if ($stmt->execute()) {
        
        $post = [
            'title' => $title,
            'content' => $content,
            'author' => $author,
            'created_at' => date('Y-m-d H:i:s')
        ];

        $msg = json_encode($post);

      
        $wsServer = 'ws://localhost:8080';

      
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $wsServer);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $msg);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_exec($ch);
        curl_close($ch);

        echo "New post created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}


$query = "SELECT * FROM blog_posts ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>
<body>
    <h1>Blog Posts</h1>
    <div id="posts">
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <div>
                <h2><?php echo htmlspecialchars($row['title']); ?></h2>
                <p>by <?php echo htmlspecialchars($row['author']); ?> on <?php echo $row['created_at']; ?></p>
                <p><?php echo nl2br(htmlspecialchars($row['content'])); ?></p>
            </div>
        <?php endwhile; ?>
    </div>

    <h1>Add New Post</h1>
    <form id="postForm" action="" method="post">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" required><br><br>
        <label for="content">Content:</label><br>
        <textarea id="content" name="content" rows="10" required></textarea><br><br>
        <label for="author">Author:</label><br>
        <input type="text" id="author" name="author" required><br><br>
        <input type="submit" value="Submit">
    </form>

    <script>
        const conn = new WebSocket('ws://localhost:8081');

        conn.onmessage = function(e) {
            const post = JSON.parse(e.data);
            const postDiv = document.createElement('div');
            postDiv.innerHTML = `<h2>${post.title}</h2><p>by ${post.author} on ${post.created_at}</p><p>${post.content}</p>`;
            document.getElementById('posts').prepend(postDiv);
        };

        document.getElementById('postForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const title = document.getElementById('title').value;
            const content = document.getElementById('content').value;
            const author = document.getElementById('author').value;

            const xhr = new XMLHttpRequest();
            xhr.open('POST', '', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    const post = { title, content, author, created_at: new Date().toISOString() };
                    conn.send(JSON.stringify(post));
                }
            };
            xhr.send(`title=${title}&content=${content}&author=${author}`);
        });
    </script>
</body>
</html>
