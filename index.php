<?php
  include './includes/Blogs.Class.php'
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/main.css">
    <title>Blog Page</title>
  </head>
  <body>
    <header>
      <h1>Blog Page</h1>
    </header>
    <?php
      $blogs = new Blogs( dirname( __FILE__ ).'/data/articles.json');
      $blogs->output();
    ?>
  </body>
</html>