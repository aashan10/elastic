<?php

namespace Elastic;

use Elasticsearch\ClientBuilder;

class Client{
    protected static $instance = null;
    private $client;
    private $hosts = [];

    private function __construct(array $hosts)
    {
        $this->hosts =  $hosts;
        if(empty($this->hosts)){
            $this->hosts[] = 'localhost:9200';
        }
        $this->client = ClientBuilder::create()->setHosts($this->hosts)->build();
    }

    public static function getInstance($hosts = []){
        if(self::$instance == null){
            self::$instance = new Client($hosts);
        }
        return self::$instance;
    }

    public function create(){
        return $this->client;
    }
}