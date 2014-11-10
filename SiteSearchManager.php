<?php
/**
* Class SiteSearchManager
* Responisble for the search by the given keyword and current selectors . 
*
**/
class SiteSearchManager implements Scanner{

	public $DOMhtml;
	public $url;
	public $result;
	public $selectors;

	public function __construct(){		
		$this->DOMhtml = file_get_html($this->url);			
	}

	//This method scan the entire page DOMElement and find the keyword in one of the products DOMElements
	//The selectors can be different for each site who call this method, and still would be able to find products. 
	public function scan($keyword){	
		if($this->selectors){	
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