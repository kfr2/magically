<?php
/**
 * Author:   Kevin Richardson <kevin@magically.us>
 * Date:     6/19/11 11:43 AM
 *
 * TODO
 * ----
 * * incorporate cache-busting <?php print(APP_VERSION); ?> into static files that may be updated (CSS, JS, etc)
 */

/**
 * Variables to pass in:
 * ------------------------------------
 * $response->title:  title of the page.
 */

$description = "magically.us strives to fulfill all your Magic: the Gathering pricing needs in a beautiful, mobile-friendly format.";
$author = "Kevin Richardson (http://kevin.magically.us)"
?>
<!DOCTYPE html>
<?php
    // <!--[if IEMobile 7 ]>    <html class="no-js iem7" manifest="/default.appcache"> <![endif]-->
    // <!--[if (gt IEMobile 7)|!(IEMobile)]><!--> <html class="no-js" manifest="/default.appcache"> <!--<![endif]-->
?>
<html class="no-js">
<head>
  <meta charset="utf-8">

  <title>magically.us:: <?php print($this->title); ?></title>
  <meta name="description" content="<?php print($description); ?>">
  <meta name="author" content="<?php print($author); ?>">

  <!-- Mobile viewport optimization http://goo.gl/b9SaQ -->
  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Home screen icon  Mathias Bynens http://goo.gl/6nVq0 -->
  <!-- For iPhone 4 with high-resolution Retina display: -->
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/img/h/apple-touch-icon.png">
  <!-- For first-generation iPad: -->
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/img/m/apple-touch-icon.png">
  <!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
  <link rel="apple-touch-icon-precomposed" href="/img/l/apple-touch-icon-precomposed.png">
  <!-- For nokia devices: -->
  <link rel="shortcut icon" href="/img/l/apple-touch-icon.png">

  <!-- Mobile IE allows us to activate ClearType technology for smoothing fonts for easy reading -->
  <meta http-equiv="cleartype" content="on">

	<!-- more tags for your 'head' to consider https://gist.github.com/849231 -->

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="/css/style.css">

  <!-- jQuery ui stylesheet -->
  <link rel="stylesheet" href="/css/jquery-ui-1.8.13.custom.css">

  <!-- jQuery mobile stylesheet -->
  <link rel="stylesheet" href="/css/jquery.mobile-1.0b1.min.css">

  <!-- all JavaScript but modernizr are found in the footer -->
  <script src="/js/libs/modernizr-custom.js"></script>
</head>

<body>



