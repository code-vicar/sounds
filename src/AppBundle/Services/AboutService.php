<?php

namespace AppBundle\Services;

class AboutService {

  public $message;

  function __construct($message) {
    $this->message = $message;
  }
}
