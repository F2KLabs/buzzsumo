<?php
/**
 * Created by PhpStorm.
 * User: Matthew
 * Date: 10/19/2015
 * Time: 12:05 PM
 */

namespace F2klabs\Buzzsumo\response;

use GuzzleHttp\Psr7\Response as GuzzleResponse;

class Response
{

    protected $response;
    protected $contents;

    public function __construct(GuzzleResponse $response)
    {
        $this->response = $response;
        $this->contents = json_decode($this->response->getBody()->getContents());
    }

    public function getContents()
    {
        return $this->contents;
    }

}