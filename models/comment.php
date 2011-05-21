<?php

class Comment extends Doctrine_Record {
  public function setTableDefinition()
  {
    $this->hasColumn('author', 'bigint', 4);
    $this->hasColumn('about', 'bigint', 4);
    $this->hasColumn('body', 'clob');
  }

  public function setUp () {
    $this->hasOne('User as Author', array('local' => 'author', 'foreign' => 'id'));
    $this->hasOne('RideEvent', array('local' => 'about', 'foreign' => 'id'));
  }
}

?>
