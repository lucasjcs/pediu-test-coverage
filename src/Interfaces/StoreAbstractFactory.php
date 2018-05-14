<?php

namespace Mike\Interfaces;


use Goutte\Client;
use Mike\Models\Store;

abstract class StoreAbstractFactory
{

    protected $stores = array();
    protected $client;
    protected $linkFactory;

    public function __construct(Client $client, LinkAbstractFactory $linkFactory)
    {
        $this->client = $client;
        $this->linkFactory = $linkFactory;
    }


    abstract public function captureStores();

}