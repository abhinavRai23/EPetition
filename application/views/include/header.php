<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Introducing Lollipop, a sweet new take on Android.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>E-Petition</title>

    <!-- Page styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.min.css">   
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css">
  </head>
  <body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">

      <div class="android-header mdl-layout__header mdl-layout__header--waterfall">
        <div class="mdl-layout__header-row">
          <a href="index" style="text-decoration:none;"><span class="android-title mdl-layout-title" style="color:green;font-size:40px;">
            E-Petition
          </span></a>
          <!-- Add spacer, to align navigation to the right in desktop -->
          <div class="android-header-spacer mdl-layout-spacer"></div>
          <!-- Navigation -->
          <div class="android-navigation-container">
            <nav class="android-navigation mdl-navigation">
              <a class="mdl-navigation__link mdl-typography--text-uppercase" href="<?php echo base_url('index.php/epetition/index'); ?>">Home</a>
              <a class="mdl-navigation__link mdl-typography--text-uppercase" href="<?php echo base_url('index.php/epetition/startPetition'); ?>">Start a Petition</a>
              <a class="mdl-navigation__link mdl-typography--text-uppercase" href="<?php echo base_url('index.php/epetition/choose_view'); ?>">View Petitions</a>
<?php 
  if(isset($_SESSION['username']))
    echo "<a class='mdl-navigation__link mdl-typography--text-uppercase' style='color:green;'' href=".base_url('index.php/epetition/logout').">".$_SESSION['username']." (LogOut)</a>";
  else echo "<a class='mdl-navigation__link mdl-typography--text-uppercase' href=".base_url('index.php/epetition/login')." style='color:green;'>Login</a>";
?>                

            </nav>
          </div>
          <a href="index" style="text-decoration:none;"><span class="android-mobile-title mdl-layout-title" style="color:green;font-size:32px;">
            E-Petition
          </span></a>
        </div>
      </div>


      <div class="android-drawer mdl-layout__drawer">
        <span class="mdl-layout-title" style="color:white;font-size:32px;background-color:#8BC34A;padding-top: 100px;text-align: right;padding-right: 15%;">
          E-Petition
        </span>
        <nav class="mdl-navigation">
          <a class="mdl-navigation__link mdl-typography--text-uppercase" href="<?php echo base_url('index.php/epetition/index'); ?>">Home</a>
          <a class="mdl-navigation__link mdl-typography--text-uppercase" href="<?php echo base_url('index.php/epetition/startPetition'); ?>">Start a Petition</a>
          <a class="mdl-navigation__link mdl-typography--text-uppercase" href="<?php echo base_url('index.php/epetition/choose_view'); ?>">View Petitions</a>
<?php 
  if(isset($_SESSION['username']))
    echo "<a class='mdl-navigation__link mdl-typography--text-uppercase' style='color:green;'' href=".base_url('index.php/epetition/logout').">".$_SESSION['username']." (LogOut)</a>";
  else echo "<a class='mdl-navigation__link mdl-typography--text-uppercase' href=".base_url('index.php/epetition/login')." style='color:green;'>Login</a>";
?>
        </nav>
      </div>
