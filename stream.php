<?php
namespace DropBox;

class Stream {

  private $wrapper;

  private $uri;

  public function stream_open($path, $mode, $options, &$opened_path) {
    $data = parse_url($path);
    $this->wrapper = $data['scheme'];
    $this->uri = $data['host'];
    return true;
  }
   //private function oo
}


function _debug($array, $die = true){
  echo "<pre>";
  print_r($array);
  echo "</pre>";
  if ($die) die;
}