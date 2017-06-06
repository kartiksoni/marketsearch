<?php namespace App\Amazon\Repositories;


class Product extends \App\Product
{
  
  public function save(array $options = []){
        $this->attributes['source'] = 'amazon';
        return parent::save($options); 
  }

    public function setASINAttribute($value = null){
          $this->attributes['product_id'] = $value;
          return $this;
    }

    public function setDetailPageURLAttribute($value = null){
         $this->attributes['public_url'] = $value;
         return $this;
    }

    public function setItemLinksAttribute($value = null){
        return $this;

    }

    public function setImageSetsAttribute($value = null){

        if(isset($this->attributes['image_url'])){
            $this->attributes['image_url'] = $value->ImageSet[0]->MediumImage->URL;
        }
        return $this;   
    }

    public function setItemAttributesAttribute($value = null){

        $this->attributes['name'] = $value->Title;

        if(isset($value->ListPrice)){

            $this->attributes['price'] = trim(str_replace(",","",str_replace("INR","",$value->ListPrice->FormattedPrice)));
        }

        return $this;
    }

    public function setOfferSummaryAttribute($value = null){
        return $this;
    }

    public function setCustomerReviewsAttribute($value = null){
        return $this;
    }

    public function setEditorialReviewsAttribute($value = null){
        return $this;
    }

    public function setBrowseNodesAttribute($value = null){
        return $this;
    }

    public function setSmallImageAttribute($value = null){
        return $this;
    }

    public function setMediumImageAttribute($value = null){

        if(!isset($this->attributes['image_url'])){
            $this->attributes['image_url'] = $value->MediumImage->URL;
        }

        return $this;
    }

    public function setLargeImageAttribute($value = null){
        return $this;
    }

    public function setParentASINAttribute($value = null){
        return $this;
    }
    


}