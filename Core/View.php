<?php

namespace App\Core;

class View {

  protected $data = [];
  public function __set($k, $v) {
    $this->data[$k] = $v;
  }
  public function __get($k) {
    return $this->data[$k];
  }
  public function render($template) {
    foreach ($this->data as $key => $value) {
      $$key = $value;
    }
    ob_start();
    include __DIR__ . '/../View/' . $template;
    $contents = ob_get_contents();
    ob_end_clean();
    return $contents;
  }

  public function display($template) {
    echo $this->render($template);
  }
}
