#!/usr/bin/env php
<?php

require_once('./websockets.php');

class echoServer extends WebSocketServer {

  function __construct($addr, $port, $bufferLength=2048) {
    parent::__construct($addr, $port, $bufferLength);
    $this->userClass = 'MyUser';
  }

  //protected $maxBufferSize = 1048576; //1MB... overkill for an echo server, but potentially plausible for other applications.
  
  protected function process ($user, $message) {
    $this->send($user,$message);
  }
  
  protected function connected ($user) {
    //do nothing
  }
  
  protected function closed ($user) {
    //do nothing
  }
}

$echo = new echoServer("0.0.0.0","9000");

try {
  $echo->run();
}
catch (Exception $e) {
  $echo->stdout($e->getMessage());
}
