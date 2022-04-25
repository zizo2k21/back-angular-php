<?php
require 'connection.php';

$articles = []; 

$query = "SELECT id, title, description , published FROM article"; 

if($result = mysqli_query($con,$query))
{
  $i = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $articles[$i]['id']    = $row['id'];
    $articles[$i]['title'] = $row['title'];
    $articles[$i]['description'] = $row['description'];
    $articles[$i]['published'] = $row['published'];

    $i++;
  }

  echo json_encode($articles);
}
else
{
  http_response_code(404);
}

?>