<?php 

// we include Smarty
require_once 'libs/Smarty.class.php' ;
$smarty = new Smarty() ;

// We prepare our data 

	// This is the main part of our tutorial this time : The data we're going to send to the Select of x-editable
	
	// To obtain an optgroup
	$countries = array(
			array(
					'text' => 'Africa',
					'children' => array('Tunisia', 'Algeria')
					),
			array(
					'text' => 'Europe',
					'children' => array('France', 'Italia')
					),
			array(
					'text' => 'Asia',
					'children' => array('Japan', 'Korea')
					),
			array(
					'text' => 'America',
					'children' => array('USA', 'Mexico')
					)
			) ;
	
	// the data-source needs a string, formatted as indicated in the docs : http://vitalets.github.io/x-editable/docs.html#select
	// so, as a solution, we can turn this array into a json formatted string :)
	// I used the str_replace to replace the quotes by their symbols, so they'll appear as a quote in the html, since Smarty add slashes by default 
	// to protect the data
	
	$countries = str_replace('"', "&quot;", json_encode($countries)) ;
	
$data = array(
		'id' => 1,
		'user' => 'LaHcini',
		'country' => 'Tunisia',
		'countries' => $countries);

$smarty->assign(array(
		'data' => $data )
		) ;
$smarty->display('myview.html') ;
?>