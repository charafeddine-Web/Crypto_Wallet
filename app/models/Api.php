<?php
class Api{
    public function getdatafromapi(){
        $Api = "https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest?convert=USD&limit=10";
        $apiKey = "e65adc19-fc11-4a54-873d-b16474dfaf11";

        //use token in header
        $options = [
            "http" => [
                "header" => [
                    "X-CMC_PRO_API_KEY: $apiKey",
                    "Accept: application/json",
                    "User-Agent: MyCryptoApp/1.0"
                ]
            ]
        ];

        $context = stream_context_create($options);
        $result = file_get_contents($Api, false, $context);

        if($result === FALSE){
            return json_encode(["error" => "Failed to fetch data from the API."]);
        }else{
            return json_decode($result, true);
        }
    }
}