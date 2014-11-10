<?php 
/**
* Class AmazonProduct
*
* Initialize Amazon uniqe url and selectors.
**/
class AmazonScan extends SiteSearchManager{	
	public function __construct(){		
		$this->setURL();
		$this->setSelectors();
		parent::__construct();
	}

	public function setURL(){
		$this->url = 'http://www.amazon.com/';
	}

	public function setSelectors(){
		$this->selectors = array(
				'product_selector' => 'div.fluid',
				'title_selector' => "span[class*='TitleText']",
				'description_selector' => "span[class*='TitleText']",
				'price_selector' => "span[class*='Price red ']",
				'img_url_selector' => ".imageContainer img"
				);
	}
}