<?php namespace App\Ebay;


use App\Ebay\Repositories\Product;
use App\Search\FactoryInterface;
use DTS\eBaySDK\Constants\GlobalIds;
use DTS\eBaySDK\Finding\Services\FindingService;
use DTS\eBaySDK\Finding\Types\FindItemsByKeywordsRequest;

class Factory implements FactoryInterface
{

    protected $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function search($query)
    {
        $service = new FindingService([
            'credentials' => $this->config->getCredentials(),
            'globalId'    => GlobalIds::US
        ]);


        $request = new FindItemsByKeywordsRequest();
        $request->keywords = $query;

        try{
        $response = $service->findItemsByKeywords($request);

        if (isset($response->errorMessage)) {
            foreach ($response->errorMessage->error as $error) {
                \Log::info('Error with Ebay\Factory->search() ' . $error);
            }
        }

        if ($response->ack !== 'Failure') {
            foreach ($response->searchResult->item as $item) {
                $productRepository = new Product();
                foreach($item->toArray() as $methodName => $value)
                {
                    try{
                    $productRepository = $productRepository->{'set'.ucwords($methodName).'Attribute'}($value);
                    }catch(\Exception $e)
                    {
                        \Log::info('Error in Ebay Factory Setting Attribute:');
                        \Log::info($e->getMessage());
                    }

                }


                $productRepository->save();
                \Log::info('Success with Ebay\Factory->search() resulting in new item:');
            }
        }
        }catch(\Exception $e)
        {
            \Log::info('Error in Ebay Factory');
            \Log::info($e->getMessage());

        }



        // TODO: Implement search() method.
    }
}