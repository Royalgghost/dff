<?php

$people = [
    "1" => "Alice",
    "2" => "Bob",
    "3" => "Charlie",
    "4" => "David",
    "5" => "Eva",
    "6" => "Frank",
    "7" => "Grace",
    "8" => "Hannah",
    "9" => "Ivy",
    "10" => "Jack"
];

$searchResults = [];

if (isset($_POST['search'])) {
    $searchQuery = strtolower(trim($_POST['search']));  
    
    foreach ($people as $id => $name) {
        if (strpos(strtolower($name), $searchQuery) !== false) {  
            $searchResults[] = $name; 
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search People</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        #search-form {
            margin-bottom: 20px;
        }
        input[type="text"] {
            padding: 8px;
            width: 200px;
        }
        button {
            padding: 8px;
            cursor: pointer;
        }
        ul {
            list-style-type: none;
            padding-left: 0;
        }
        li {
            padding: 5px;
            background-color: #f0f0f0;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>

    <h1>Search for a Person</h1>
    
    <form id="search-form" method="POST" action="EXERCICE2.php">
        <input type="text" name="search" placeholder="Enter name..." value="<?= isset($_POST['search']) ? htmlspecialchars($_POST['search']) : '' ?>" required>
        <button type="submit">Search</button>
    </form>

    <h2>Results:</h2>
    <ul>
        <?php
        
        if (!empty($searchResults)) {
            foreach ($searchResults as $result) {
                echo "<li>" . htmlspecialchars($result) . "</li>";
            }
        } else {
            
            echo "<li>No results found</li>";
        }
        ?>
    </ul>

</body>
</html>