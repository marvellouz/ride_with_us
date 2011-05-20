<?php

require_once('./doctrine1/lib/Doctrine.php');
spl_autoload_register(array('Doctrine','autoload'));
Doctrine_Manager::getInstance()->setAttribute('model_loading', 'conservative');
Doctrine::loadModels('models');
$conn = Doctrine_Manager::connection('mysql://root:@localhost/ride_with_us');

?>
