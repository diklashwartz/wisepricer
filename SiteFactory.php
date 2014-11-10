<?php
require_once('Scanner.php');
require_once('SiteSearchManager.php');
require_once('Product.php');
require_once('AmazonScan.php');

class SiteFactory{
	public $sites;

	public function __construct($hash){
		$this->setSites($hash);
	}

	public function makeSite($site_id){
		return new $this->sites[$site_id]();
	}

	public function setSites($hash){
		$this->sites = $hash;
	}
}