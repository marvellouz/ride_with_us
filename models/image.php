<?php
class Image extends Doctrine_Record {

  public function setTableDefinition() {
    $this->hasColumn('path', 'string', 255);
    $this->hasColumn('route_id', 'bigint', 4);
  }

  public function setUp() {
    $this->actAs('Timestampable');
    $this->hasOne('Route', array('local' => 'route_id', 'foreign' => 'id'));
  }

}
?>
