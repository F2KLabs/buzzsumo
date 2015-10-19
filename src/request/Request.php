<?php
/**
 * Created by PhpStorm.
 * User: Matthew
 * Date: 9/4/2015
 * Time: 10:44 AM
 */

namespace F2klabs\Buzzsumo\request;

use \GuzzleHttp\Client;

class Request {


    public $client;

    protected $digimindClientCode;
    protected $auth;

    public function __construct()
    {
        //Get the Buzzsumo API Key
        $this->buzzsumoApiKey = env("BUZZSUMO_API_KEY", config('buzzsumo.api_key'));

        //if API key is null, throw Buzzsumo No API KEY ErrorException

        //Guzzle Client
        $this->client = new Client([
                "base_uri"=> "http://api.buzzsumo.com/search",
                "auth" => $this->auth
            ]);
    }
}