<?php

class UserHasRideEvent extends Doctrine_Record {
  public function setTableDefinition()
  {
    $this->hasColumn('user_id', 'bigint', 4);
    $this->hasColumn('ride_event_id', 'bigint', 4);
  }
}

?>
