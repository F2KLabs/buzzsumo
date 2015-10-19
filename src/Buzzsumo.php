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
        return new SumoReponse($this->_makeRequest('/search/shares.json', $options + ['article_id'=>$articleId]));
    }

    public function content($keyword, $options = [])
    {
        return new SumoReponse($this->_makeRequest('/search/articles.json', $options + ['q'=>$keyword]));
    }

    private function _makeRequest($uri, $options)
    {
        $options += ['api_key'=>config('buzzsumo.api_key')];

        return new SumoReponse($this->request->client->get($uri, ['query'=>$options]));
    }
}