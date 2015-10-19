<?php
/**
 * Created by PhpStorm.
 * User: Matthew
 * Date: 10/16/2015
 * Time: 12:24 PM
 */

namespace F2klabs\Buzzsumo;

use F2klabs\Buzzsumo\request\Request;

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
        return $this->_makeRequest('/search/shares.json', $options + ['article_id'=>$articleId])->getBody();
    }

    public function content($keyword, $options = [])
    {
        return $this->_makeRequest('/search/articles.json', $options + ['q'=>$keyword])->getBody();
    }

    private function _makeRequest($uri, $options)
    {
        $options += ['api_key'=>config('buzzsumo.api_key')];

        return $this->request->client->get($uri, ['query'=>$options]);
    }
}