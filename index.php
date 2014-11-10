<?php 

//Loading project dependcies:

//I Tried this library but could'nt find how to parse remote url (amazon.com, etc.) instead of local html file. 
//require_once('phpQuery/phpQuery.php');

//So found this one, a HTML DOM parser written in PHP5+ let you manipulate HTML in a very easy way!
//Referance: http://simplehtmldom.sourceforge.net/manual.htm
require_once('lib/simple_html_dom.php');

//Load the site factory
require_once('SiteFactory.php');


//This is the REST api  GET method that get keyword parameter
if(isset($_GET['keyword'])){
	$keyword = $_GET['keyword'];

	//I've created this site_id variable for future option to run this script on different site other then Amazon.
	$site_id = 1; 
	
	/*I've created a site factory, so in case we add another E-commerce site to search products, 
	* all we need to do is create new class for the E-commerce uniqe details like url and selectors. 
	*/
	$hash = array(
			1 => 'AmazonScan'
			//You can add another object here, with different key
			);

	$site_factory = new SiteFactory($hash);
	$site = $site_factory->makeSite($site_id);
	if(!$site->scan($keyword)) header("HTTP/1.0 404 Not Found");
	else $site->printResult();
}else{
	header("HTTP/1.0 404 Not Found");
}