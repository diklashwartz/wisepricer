<?php

class Product{

	public $title;
	public $price;
	public $imageURL;
	public $description;

	public function __construct(){

	}

	public function setTitle($title){
		$this->title = $title;
	}

	public function setPrice($price){
		$this->price = $price;
	}

	public function setImageURL($imageURL){
		$this->imageURL = $imageURL;
	}

	public function setDescription($description){
		$this->description = $description;
	}

	public function getTitle(){
		return $this->title;
	}

	public function getPrice(){
		return $this->price;
	}

	public function getImageURL(){
		return $this->imageURL;
	}

	public function getDescription(){
		return $this->description;
	}
}