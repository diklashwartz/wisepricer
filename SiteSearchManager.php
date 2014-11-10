<?php

class SiteSearchManager implements Scanner{

	public $DOMhtml;
	public $url;
	public $result;
	public $selectors;

	public function __construct(){		
		$this->DOMhtml = file_get_html($this->url);			
	}

	public function scan($keyword){		
		foreach($this->DOMhtml->find($this->selectors['product_selector']) as $DOMproduct) {
		    $title = $DOMproduct->find($this->selectors['title_selector'], 0)->plaintext;			    	    
		    $description = $DOMproduct->find($this->selectors['description_selector'], 0)->plaintext;			    	    
		    $price = $DOMproduct->find($this->selectors['price_selector'], 0);
		    if(!is_object($price)) continue;
		    $price = $price->plaintext;

		    $image_url = $DOMproduct->find($this->selectors['img_url_selector'], 0)->src;
		    
		    if(strpos($title, $keyword) !== false)
		    {
		    	$product = new Product();
		    	$product->setTitle($title);
		    	$product->setDescription($description);
		    	$product->setPrice($price);
		    	$product->setImageURL($image_url);
				$this->result = $product;
				return true;    	
		    } 		    	
		    
		}
		return false;
		
	}

	public function printResult($json = true){
		if($json)
			echo json_encode($this->result);
		else
			print_r($result);
	}
}