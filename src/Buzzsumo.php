<?php
/**
 * Created by PhpStorm.
 * User: Matthew
 * Date: 10/16/2015
 * Time: 12:24 PM
 */

namespace F2klabs\Buzzsumo;

use F2klabs\Buzzsumo\request\Request;
use F2klabs\Buzzsumo\response\Response as SumoReponse;
use League\Flysystem\Exception;

class Buzzsumo {

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param $articleId
     * @param array $options
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function articles($articleId, $options = [])
    {
        return new SumoReponse($this->_makeRequest('/shares.json', $options + ['article_id'=>$articleId]));
    }

    /**
     * @param $keyword
     * @param array $options
     * @return SumoReponse
     */
    public function content($keyword, $options = [])
    {
        return new SumoReponse($this->_makeRequest('articles.json', $options + ['q' => $keyword]));
    }

    /**
     * @param $uri
     * @param $options
     * @param string $method
     * @return mixed
     */
    private function _makeRequest($uri, $options, $method = 'GET')
    {
        return $this->request->client
            ->request($method, $uri, ['query'=>$options + ['api_key'=>config('buzzsumo.api_key'), 'num_days'=> '7']]);
    }
}