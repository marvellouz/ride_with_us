<?php
class Route extends Doctrine_Record {

  public function setTableDefinition() {
    $this->hasColumn('diaplacement', 'float');
    $this->hasColumn('distance', 'float');
    $this->hasColumn('start', 'string', 255);
    $this->hasColumn('end', 'string', 255);
    $this->hasColumn('additional_info', 'clob');
    $this->hasColumn('route_url', 'string', 255);
  }

  public function setUp() {
    $this->actAs('Timestampable');
    $this->hasMany('RideEvent', array('local' => 'id', 'foreign' => 'route', 'refClass' => 'RideEvent'));
  }

}
?>
