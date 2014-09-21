<?php

class page_utils {

  /*
    Get the path to go back to the home directory - "../../" or somesuch
  */
  public static function get_home_path($page_path) {
    $path = "";
    $part = strtok($page_path, "/");
    $part = strtok("/");// don't count the first section
    while ($part !== false) {
      if (strlen($part) > 0) {
        $path = $path . "../";
      }
      $part = strtok("/");
    }
    return $path;
  }

  public static function get_head($path_home) {
    $out = '<!DOCTYPE html>
<html>
  <head>';
    $out = $out . '
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width" />
    <meta name="viewport" content="height=device-height" />
    <link rel="stylesheet" href="'.$path_home.'stylesheet.css" type="text/css" />
    <link rel="shortcut icon" type="image/x-icon" href="'.$path_home.'favicon.ico">
    <script type="text/javascript" src="'.$path_home.'nav.js"></script>
    <script type="text/javascript" src="'.$path_home.'solution.js"></script>';
    $out = $out . '  </head>
    ';
    /* This came right after </head>, but I don't know if it's needed
    <body onload="setup( document.getElementsByClassName( 'menuItemOpen' ) );">
    */
    return $out;
  }

  public static function get_header($path_home) {
    $out = '
    <header id="header">
      <h1>Unix Tutorial</h1>
    </header>
    ';
    return $out;
  }

  public static function get_nav($path_home) {
    $out = '
    <nav id="mainnav">
        <ol class="menu">
            <li class="menuItem" onClick="itemClick( this, document.getElementsByClassName( '."'menuItemOpen'".' ) );">
                <span class="menuTitle">Basics</span>
                <ol class="subMenu">
                    <li class="subMenuItem"><a href="'.$path_home.'basics/howto">how&nbsp;to&nbsp;use&nbsp;this&nbsp;tutorial</a></li>
                    <li class="subMenuItem"><a href="'.$path_home.'basics/format">format&nbsp;of&nbsp;commands</a></li>
                    <li class="subMenuItem"><a href="'.$path_home.'basics/naming-conventions">naming&nbsp;conventions</a></li>
                    <li class="subMenuItem"><a href="'.$path_home.'basics/paths">paths</a></li>
                    <li class="subMenuItem"><a href="'.$path_home.'basics/help">getting&nbsp;help</a></li>
                </ol>
            </li>
            <li class="menuItem" onClick="itemClick( this, document.getElementsByClassName( '."'menuItemOpen'".' ) );">
                <span class="menuTitle">Users</span>
                <ol class="subMenu">
                    <li class="subMenuItem"><a href="'.$path_home.'users/your-account">your&nbsp;account</a></li>
                    <li class="subMenuItem"><a href="'.$path_home.'users/users">users</a></li>
                </ol>
            </li>
            <li class="menuItem" onClick="itemClick( this, document.getElementsByClassName( '."'menuItemOpen'".' ) );">
                <span class="menuTitle">Files & Directories</span>
                <ol class="subMenu">
                    <li class="subMenuItem"><a href="'.$path_home.'file-dir/navigation">navigation</a></li>
                    <li class="subMenuItem"><a href="'.$path_home.'file-dir/viewing">viewing&nbsp;files</a></li>
                    <li class="subMenuItem"><a href="'.$path_home.'file-dir/filemanip">manipulating&nbsp;files</a></li>
                    <li class="subMenuItem"><a href="'.$path_home.'file-dir/pico">pico</a></li>
                    <li class="subMenuItem"><a href="'.$path_home.'file-dir/dirmanip">manipulating&nbsp;directories</a></li>
                </ol>
            </li>
            <li class="menuItem" onClick="itemClick( this, document.getElementsByClassName( '."'menuItemOpen'".' ) );">
                <span class="menuTitle">Redirection</span>
                <ol class="subMenu">
                    <li class="subMenuItem"><a href="'.$path_home.'redirection/redirection-input">input</a></li>
                    <li class="subMenuItem"><a href="'.$path_home.'redirection/redirection-output">output</a></li>
                    <li class="subMenuItem"><a href="'.$path_home.'redirection/piping">piping</a></li>
                </ol>
            </li>
            <li class="menuItem" onClick="itemClick( this, document.getElementsByClassName( '."'menuItemOpen'".' ) );">
                <span class="menuTitle">Permissions</span>
                <ol class="subMenu">
                    <li class="subMenuItem"><a href="'.$path_home.'permissions/permissions">permissions</a></li>
                    <li class="subMenuItem"><a href="'.$path_home.'permissions/changing-permissions">changing&nbsp;permissions</a></li>
                </ol>
            </li>
        </ol>
    </nav>
    ';
    return $out;
  }

  public static function get_footer($path_home) {
    $out = '
    <footer id="footer">
      <div id="copyright">&#169; Kim Desorcie 2012</div>
      <div id="about"><a href="'.$path_home.'about">about this website</a></div>
      <div id="home"><a href="'.$path_home.'index.html">home</a></div>
    </footer>
  </html>';
    return $out;
  }

  public static function get_content($page_path) {
    $page_file = '';

    // remove file extension
    $pos = strpos($page_path, '.');
    if ($pos > 0) {
      $page_path = substr($page_path, 0, $pos);
    }

    $out = '
    <article class="article">';

    // choose content file
    if (strlen($page_path) <= 0) {
      $page_file = "home.html";
    }
    else {
      if (file_exists("pages/" . $page_path . ".html")) {
        $page_file = $page_path . ".html";
      }
      else {
        $page_file = "404.html";
      }
    }

    try {
      $out = $out . file_get_contents("pages/" . $page_file);
    } catch (Exception $e) {
      self::get_404();
    }

    $out = $out . '
    </article>
    ';
    return $out;
  }

  public static function get_404() {
    try {
      return file_get_contents("pages/404.html");
    } catch (Exception $e) {
      return '<h2>404 Page Not Found</h2>';
    }
  }
}

?>
