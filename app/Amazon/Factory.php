<?php namespace App\Amazon;


use App\Search\FactoryInterface;
use Log;
use Config;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use App\Amazon\Repositories\Product;
use Aws\Credentials\CredentialProvider;
use Aws\S3\S3Client;

class Factory implements FactoryInterface
{

    public function search($query)
    {
            $this->response 		= null;
            $this->access_key 		= env('AMAZON_KEY');
            $this->secret_key 		= env('AMAZON_SECRET');
            $this->associate_tag	= env('AMAZON_ASSOCIATE_TAG');
            $this->locale			= env('locale');
            $this->endpoint         = "webservices.amazon.".$this->locale;
            $this->response_group	= str_replace(' ', '', env('AMAZON_RESPONSE_GROUP'));
            $this->client 			= new Client;
            $category = "All";

        $params = array(
            "Operation" => "ItemSearch",
            "SearchIndex" => rawurlencode($category),
            "Keywords" => rawurlencode($query),
            "ResponseGroup" => "BrowseNodes,EditorialReview,Images,ItemAttributes,OfferSummary,Reviews",
            "ItemPage" => 1,
        );

            if ("All" !== $category)
                $params["Sort"] = $sort;
        
            $url = $this->makeUrl($params);
            $this->response = $this->client->get($url)->getBody()->getContents();
            $response = json_decode(json_encode(simplexml_load_string($this->response)));

     
         foreach($response->Items->Item as $item)
            {
                    $productRepository = new Product();
                    foreach ($item as $key => $value) {

            		 try{

                            $productRepository = $productRepository->{'set'.ucwords($key).'Attribute'}($value);
                    }catch(\Exception $e)
                    {
                           \Log::info('Error in Amazon Factory Setting Attribute:');
                           \Log::info($e->getMessage());
                    }
                }
                  $productRepository->save();
                  \Log::info('Success with Amazon\Factory->search() resulting in new item:');
            }   
      

    }

    private function makeUrl($params) {
        
        $params["Service"] = "AWSECommerceService";
	    $params["AWSAccessKeyId"] = $this->access_key;
	    $params["AssociateTag"] = $this->associate_tag;
	    $params["Timestamp"] = gmdate('Y-m-d\TH:i:s\Z');

	    if (!$params["ResponseGroup"]) {
	        $params["ResponseGroup"] = $this->response_group;
	    }

        ksort($params);
        
        $pairs = array();

        foreach ($params as $key => $value) {
            array_push($pairs, rawurlencode($key)."=".rawurlencode($value));
        }

        $canonical_query_string = join("&", $pairs);
        
        $uri = "/onca/xml";

        $string_to_sign = "GET\n".$this->endpoint."\n".$uri."\n".$canonical_query_string;
        
        $signature = base64_encode(hash_hmac("sha256", $string_to_sign, $this->secret_key, true));
        
        $request_url = 'http://'.$this->endpoint.$uri.'?'.$canonical_query_string.'&Signature='.rawurlencode($signature);
        
        Log::info("Signed URL: \"".$request_url."\"");
        
        return $request_url;
        
	}
}