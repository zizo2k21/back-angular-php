<?php
require 'connection.php';



// Get the posted data.
$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);

    // Validate.
    if(trim($request->title) === '')
    {
     return http_response_code(400);
  }

// Sanitize.
 $title = mysqli_real_escape_string($con, trim($request->title));  
 $description =mysqli_real_escape_string($con, trim($request->description));
 $published=mysqli_real_escape_string($con, trim($request->published));

  // Update.
  $query = "UPDATE article SET `title` = '{$title}', `description` = '{$description}', `published` = '{$published}' WHERE `id` = '{$id}'";
 
  if(mysqli_query($con,$query))
  {
    
    http_response_code(204);    
       
  }
  else
  {
    http_response_code(422);
  }
}