<?php session_start(); ?>

<!DOCTYPE html>
<html>
  <head>
    <!-- Import Google Icon Font -->
    <!-- Import materialize.css -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"
    />

    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
      integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
      crossorigin="anonymous"
    />
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="/bloodbank/css/style.css" />
    <link rel="stylesheet" href="/bloodbank/css/animate.css" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <style>
       .carousel-item img {
        width: 100%;
        height: 90vh;
      }
      .navbarRs{
        width:100%;
        height:100vh;
      }
      @media screen and (max-width: 500px) {
          .navbarRs{
           width:100%;
           height:auto;
         }
         .carousel-item {
          width: 100%;
          height: auto;
          }
      }

    </style>
  </head>

  <body>
    <nav id="nav" style="z-index:10;">
      <div class="nav-wrapper">
        <a href="/bloodbank" class="brand-logo">Blood Bank</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"
          ><i class="material-icons">menu</i></a
        >
        <ul class="right hide-on-med-and-down">
          <li><a href="/bloodbank/include/profile.php">Donate</a></li>
          <li><a href="/bloodbank/include/findb.php">Find NearBy Bank</a></li>
          <li><a href="/bloodbank/include/profile.php">Request</a></li>

          <li><a href="/bloodbank/include/contact.php">Contact </a></li>
          <li><a href="/bloodbank/include/about.php">About</a></li>
          <?php if (!isset($_SESSION['email']) && !isset($_SESSION['username'])): ?>
          <li><a href="/bloodbank/include/login.php">Login</a></li>
          <li><a href="/bloodbank/include/register.php">Register</a></li>
          <li><a href="/bloodbank/include/register_bank.php">Register Bank</a></li>
          <?php else: ?>
          <li><a href="/bloodbank/include/logout.php">Logout</a></li>
          <?php if(isset($_SESSION['email'])): ?>
          <li><a href="#"><?php echo $_SESSION['email']; ?></a></li>
          <?php else: ?>
          <li><a href="#"><?php echo $_SESSION['username']; ?></a></li>
          <?php endif; ?>
          <?php endif; ?>
          <li><a href="/bloodbank/include/faq.php">FAQ</a></li>
        </ul>
      </div>
    </nav>
    <ul class="sidenav" id="mobile-demo">
      <li><a href="/bloodbank/include/profile.php">Donate</a></li>
      <li><a href="/bloodbank/include/findb.php">Find NearBy Bank</a></li>
      <li><a href="/bloodbank/include/login.php">Request</a></li>
      <li><a href="/bloodbank/include/contact.php">Contact </a></li>
      <li><a href="/bloodbank/include/about.php">About</a></li>
      <?php if (!isset($_SESSION['email']) && !isset($_SESSION['username'])): ?>
      <li><a href="/bloodbank/include/login.php">Login</a></li>
      <li><a href="/bloodbank/include/register.php">Register</a></li>
      <li><a href="/bloodbank/include/register_bank.php">Register Bank</a></li>
      <?php if(isset($_SESSION['email'])): ?>
      <li><a href="#"><?php echo $_SESSION['email']; ?></a></li>
      <?php else: ?>
      <li><a href="#"><?php echo $_SESSION['username']; ?></a></li>
      <?php endif; ?>
      <?php endif; ?>
      <li><a href="/bloodbank/include/faq.php">FAQ</a></li>
    </ul>

     