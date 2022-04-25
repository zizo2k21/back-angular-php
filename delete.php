<?php

require 'connection.php';

// Extract, validate and sanitize the id.
$id = isset($_GET["id"]) ? (int)$_GET["id"] : null ;

if(!isset($id))
{
    return http_response_code(400);
}

// Delete.
$query = "DELETE FROM `article` WHERE `id` ='{$id}' LIMIT 1";

if(mysqli_query($con, $query))
{
  http_response_code(204);
}
else
{
  return http_response_code(422);
}
?>