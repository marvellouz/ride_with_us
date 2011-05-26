<?php
require_once("./helpers.php");

// key_words, takes only the key words that are entered, removing the nullable members of the $_POST array
function key_words($words)
{
	$key_wds=array_filter($words);
	array_pop($key_wds);
	
	return $key_wds;
}
//var_dump(key_words($_POST));

function search_string()
{
	
	global $webroot;
	//global $mysqli;
	//echo stripslashes($string);
	//echo $mysqli->real_escape_string($string);
	//echo sanitize_string($string);
	if(isset($_POST['search_submit']))
	{
		if(!$_POST['start'] && !$_POST['end'] && !$_POST['distance'] && !$_POST['displacement'] && !$_POST['additional_info'])
		{
			$ride = '';
			$_SESSION['flash'] = "Не сте въвели дума/и за търсене!";
			header("Location: {$webroot}/search");
		}
		
		
		$search_words=key_words($_POST);

		
		$select='';
		$where='';
		
		$first=true;
		//assigns the proper select columns and there matching values
		//stackoverflow rulezzzz
		foreach($search_words as $field => $value)
		{	
			if ($first) 
			{
				$first = false;
				if($field=='displacement' || $field=='distance')
				{
					$where.= "$field=$value ";
				}
				else
				{
				$where .="$field like '%$value%' ";
				// Do what you want to do before the first element
				}
			} 
			else 
			{
				// Do what you want to do at the end of every element
				// except the last, assuming the list has more than one element
				$select .=',';
				if($field=='displacement' || $field=='distance')
				{
					$where.= " and $field=$value ";
				}
				else
				$where .=" and $field like '%$value%' ";
			}
			// Do what you want to do for the current element
		$select .= $field;
		}
		
		//var_dump($select);
		//var_dump($where);
		$query_search="SELECT displacement, distance, start, end, additional_info FROM route WHERE $where";
		//$query_search="SELECT $select FROM route WHERE $where";
		//var_dump($query_search);
		$ride=table_content($query_search);
		//var_dump($ride);
		
		if($ride)
		{
			$cnt_rides=count($ride);
			return array(
			'assign' => array('ride' => $ride, 'cnt' => $cnt_rides),
			'display' => 'templates_c/search.tpl');
		//endif
		}
		else
		{
			$ride=NULL;
			$ride_error="Няма намерени резултати";
			return array(
			'assign' => array('ride_error' => $ride_error, 'ride' => $ride),
			'display' => 'templates_c/search.tpl');
		}

	//endif 
	}


	else 
	{
		return array(
		'assign' => array(''),
		'display' => 'templates_c/search.tpl');
	}
	

}


?>
