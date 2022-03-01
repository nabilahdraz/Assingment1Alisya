<?php
return [
'settings' => [
'displayErrorDetails' => true, // set to false in production
'addContentLengthHeader' => false, // Allow the web server to send the
'upload_directory' => __DIR__ . '/../public/uploads', // upload directory
// Renderer settings
'renderer' => [
'template_path' => __DIR__ . '/../templates/',
],

// Database connection settings
"db" => [
"host" => "localhost",
"dbname" => "movies",
"user" => "root",
"pass" => "",
]
],
];