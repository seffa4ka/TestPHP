<?php

class First
  extends MainModel {

  public $id;
  public $title;
  public $text;
  public $date;

  protected static $table = 'first';
  protected static $class = 'First';

}
