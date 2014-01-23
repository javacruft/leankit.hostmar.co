<?php

require_once('classes.php');

$protocols = array('lp' => new LaunchPad(), 'gh' => new Github(),
                   'cr' => new CodeReview());

function backflip($raw, $proto) {
  list($s, $d) = explode(':', $raw, 2);
  if(!array_key_exists($s, $proto)) {
    header('Not a protocol', true, 404);
    die();
  }

  $protocols[$s]->parse($d);
}

if(!isset($_GET['r'])) {
  die("<h1>Go away</h1><br><br>
       https://github.com/marcoceppi/leankit.hostmar.co");
}

backflip($_GET['r'], $protocols);
