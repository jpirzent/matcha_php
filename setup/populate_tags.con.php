<?php
	include_once '../includes/dbh.inc.php';
try {
    $tagsFile = file('tags.txt');
    foreach($tagsFile as $tag) {
		$tag = trim($tag);
        $query = "INSERT INTO tags (tag_name) VALUES (?)";
        $stmt = $conn->prepare($query);
		$stmt->execute([$tag]);
}
echo "Tags added </br>";
} catch (PDOException $e) {
    die("tag table data load failure : ".$e->getMessage()."</br>");
}

?>