<?php namespace App\Ebay\Repositories;

use DTS\eBaySDK\Finding\Types\SearchItem;

class Product extends \App\Product
{

    public function save(array $options = [])
    {
        $this->attributes['source'] = 'ebay';
        return parent::save($options); // TODO: Change the autogenerated stub
    }

    public function setCharityIdAttribute($value = null)
    {
        return $this;

    }
    public function setItemIdAttribute($value = null)
    {
        $this->attributes['product_id'] = $value;
        return $this;
    }

    public function setAutoPayAttribute($value = null)
    {
        return $this;

    }

    public function setProductIdAttribute($value = null)
    {
        $this->attributes['product_id'] = $value['value'];
        return $this;
    }

    public function setDiscountPriceInfoAttribute($value = null)
    {
        $this->attributes['msrp'] = $value['originalRetailPrice']['value'];
        return $this;
    }

    public function setGalleryPlusPictureURLAttribute($value = null)
    {
        if(isset($value[0]))
        {
        $this->attributes['image_url'] = $value[0];
        }
        return $this;
    }

    public function setSubtitleAttribute($value = null)
    {
        $this->attributes['description'] = $value;
        return $this;
    }

    public function setPostalCodeAttribute($value = null)
    {
        $this->attributes['shipping_postal'] = $value;
        return $this;
    }

    public function setTopRatedListingAttribute($value = null)
    {
        return $this;
    }

    public function setIsMultiVariationListingAttribute($value = null)
    {
        return $this;
    }

    public function setConditionAttribute($value = null)
    {
        try{
        $this->attributes['condition'] = strtolower($value['conditionDisplayName']);
        }catch(\Exception $e)
        {

        }
        return $this;
    }

    public function setReturnsAcceptedAttribute($value = null)
    {
        $this->attributes['returns_accepted'] = $value;
        return $this;
    }

    public function setListingInfoAttribute($value = null)
    {
                try {
            $this->attributes['is_buy_it_now'] = $value['buyItNowAvailable'];
        } catch (\Exception $e) {
        }
        try {
            $this->attributes['is_allow_offers'] = $value['bestOfferEnabled'];
        } catch (\Exception $e) {
        }
        try {
            $parsed_date = date_parse($value['endTime']);
//        dd($parsed_date);
            $timezone = new \DateTimeZone($parsed_date['tz_abbr']);

            $expiration_date = new \DateTime($parsed_date['year'].'-'.$parsed_date['month'].'-'.$parsed_date['day'].' '.$parsed_date['hour'].':'.$parsed_date['minute'], $timezone);

            $this->attributes['expiration_date'] = $expiration_date;
        } catch (\Exception $e) {
        }

        return $this;
    }

    public function setLocationAttribute($value = null)
    {
        $this->attributes['shipping_location'] = $value;
        return $this;
    }

    public function setCountryAttribute($value = null)
    {
        $this->attributes['shipping_country'] = $value;
        return $this;
    }


    public function setShippingInfoAttribute($value = null)
    {
        //@todo if we wanted to calculate shipping, this is where we would do it.
        return $this;
    }

    public function setTitleAttribute($value = null)
    {
        $this->attributes['name'] = $value;
        return $this;
    }

    public function setGlobalIdAttribute($value = null)
    {
        $this->attributes['market_id'] = $value;
        return $this;

    }

    public function setSellingStatusAttribute($value = null)
    {
        try{
            $this->attributes['price'] = $value['currentPrice']['value'];
        }catch(\Exception $e)
        {

        }
        return $this;
    }
    public function setPrimaryCategoryAttribute($value = null)
    {
        return $this;
    }

    public function setSecondaryCategoryAttribute($value = null)
    {
        return $this;
    }

    public function setGalleryURLAttribute($value = null)
    {
        $this->attributes['image_url'] = $value;
        return $this;

    }

    public function setViewItemURLAttribute($value = null)
    {
        $this->attributes['public_url'] = $value;
        return $this;

    }

    public function setPaymentMethodAttribute($value = null)
    {
        //@todo if we wanted to add sorting by payment methods this is where we would do it
        return $this;
    }


}