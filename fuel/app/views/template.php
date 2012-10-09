<!doctype html>
<html lang="<?php echo $i18n; ?>">
  <head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <style type="text/css">
      body {
        margin:0;
        font:13px Verdana, sans-serif;
      }
      
      a {
        color:blue;
        text-decoration:none;
      }
      
      a:hover {
        text-decoration:underline;
      }
      
      header {
        padding:30px;
        background-color:#f2f2f2;
      }
      
      nav span {
        margin-right:8px;
      }
      
      p {
        margin-left:30px;
      }
    </style>
  </head>
  <body>
    
    <header>
      <nav><?php echo Lang::langbar(); ?></nav>
    </header>

    <?php echo $content; ?>
    
    <footer>
      --------------------------------------------------------------------
    </footer>
  
  </body>
</html>