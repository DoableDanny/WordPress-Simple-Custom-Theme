<!DOCTYPE html>
<html>

<head>

  <?php 
    // Used by hooks/plugins for adding in scripts to head that they need to run. Also runs functions.php.
    wp_head(); 
  ?>

</head>

<body <?php 
// Allows wordpress to add its own classes to the body
body_class(); ?>>

  <!-- Bootstrap class -->
  <header class="sticky-top">
    <div class="container">
      <?php 
    // Add 'top-menu' to header. See functions.php.
    wp_nav_menu(
      array(
        'theme_location' => 'top-menu',
        'menu_class' => 'navigation'
      )
    ) ?>
    </div>

  </header>