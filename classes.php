<?php

abstract class Redirect {
  public $host = NULL;
  public function redirect($address) {
    $url = $host . '/' . $address;
    header('Location: ' . $url);
  }

  abstract public function parse($url)
}

class Github extends Redirect {
  public $host = 'https://github.com';

  public function parse($url) {
    list($user, $repo, $bug) = explode('/', $url, 3);
    $this->redirect($user . '/' . $repo . '/issues/' . $bug);
  }
}

class LaunchPad extends Redirect {
  public $host = 'https://github.com';

  public function parse($url) {
    list($user, $repo, $bug) = explode('/', $url, 3);
    $this->redirect($user . '/' . $repo . '/issues/' . $bug);
  }
}

class CodeReview extends Redirect {
  public $host = 'https://github.com';

  public function parse($url) {
    $this->redirect($url);
  }
}
