<?php
class User extends Doctrine_Record {

  public function setTableDefinition() {
    $this->hasColumn('username', 'string', 255, array('unique' => 'true'));
    $this->hasColumn('fname', 'string', 255);
    $this->hasColumn('lname', 'string', 255);
    $this->hasColumn('password', 'string', 255);
    $this->hasColumn('is_admin', 'boolean', array('default' => 'false'));
    $this->hasColumn('email', 'string', 255, array('unique' => 'true'));
  }

  public function setUp() {
    $this->actAs('Timestampable');
    $this->hasMutator('password', '_encrypt_password');
    $this->hasMany('RideEvent', array('local' => 'id', 'foreign' => 'owner', 'refClass' => 'RideEvent'));
    $this->hasMany('RideEvent', array('local' => 'id', 'foreign' => 'user_id', 'refClass' => 'UserHasRideEvent'));
  }

  protected function _encrypt_password($value) {
    $salt = '#*seCrEt!da6b&^*((}{SCad@-*%';
    $this->_set('password', md5($salt . $value));
  }
}
?>
