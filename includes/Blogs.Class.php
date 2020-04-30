<?php
ini_set( 'display_errors', 1);
ini_set( 'display_startup_errors', 1);
error_reporting( E_ALL );
include_once dirname( __FILE__ ).'/Blog.Class.php';

class Blogs {

  private $allBlogs = array();

  function __construct ( $blogFilePath = '' )
  {
    if ( file_exists( $blogFilePath ) )
    {
      $jsonString = file_get_contents( $blogFilePath );
      $jsonObject = json_decode( $jsonString );
      if ( is_array( $jsonObject->articles ) )
      {
        $this->allBlogs = $jsonObject->articles;
      }
      else
      {
      echo '<p>Data unreadable</p>';
      }
    }
    else
    {
      echo '<p>File not found</p>';
    }
  }

  public function output ()
  {
    if ( is_array($this->allBlogs) && !empty($this->allBlogs) )
    {
      echo '<h2>Blog Posts</h2><ul>';
      foreach ( $this->allBlogs as $blog )
      {
        $newBlog  = new Blog( $blog->id, $blog->title, $blog->content );
        echo '<li>'.$newBlog->output( FALSE ).'</li>';
      }
      echo '</ul>';
    }
  }

}
  