<?php

Class APImodel {
    public function getdatafromapi($coins_count){
        $Api = "https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest?convert=USD&limit=$coins_count";
        $apiKey = "6393f138-e6d4-4ad6-8e96-6b2274763938";

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