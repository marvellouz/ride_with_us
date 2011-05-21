<?php
class RideEvent extends Doctrine_Record {

  public function setTableDefinition() {
    $this->hasColumn('additional_info', 'string', 255);
    $this->hasColumn('owner', 'bigint', 4);
    $this->hasColumn('route', 'bigint', 4);
  }

  public function setUp() {
    $this->actAs('Timestampable');
    $this->hasOne('User', array('local' => 'owner', 'foreign' => 'id'));
    $this->hasOne('Route', array('local' => 'route', 'foreign' => 'id'));
    $this->hasMany('User', array('local' => 'id', 'foreign' => 'ride_event_id', 'refClass' => 'UserHasRideEvent'));
    $this->hasMany('Comment', array('local' => 'id', 'foreign' => 'about', 'refClass' => 'Comment'));
  }

}
?>
