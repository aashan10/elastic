<?php

namespace Elastic\Core;

use Elasticsearch\Client as ElasticClient;
use Elasticsearch\ClientBuilder;
use Elastic\Core\Repositories\Index;

class Client{

    /**
     * ElasticSearch Client
     *
     * @var ElasticClient;
     */
    protected $elasticClient;

    protected $indices = [];
    protected $params = [];

    public function __construct($hosts = [])
    {
        $this->elasticClient = ClientBuilder::create()->setHosts($hosts)->build();
    }
    public function index(){
        return new Index($this->elasticClient);
    }
}