<?php

namespace Mike\Interfaces;


use Goutte\Client;
use Mike\Models\Store;

abstract class LinkAbstractFactory
{
    protected $client;


    public function __construct($client = null)
    {
        if(empty($client)) {
            $client = new Client();
        }

        $this->client = $client;
    }

    abstract public function captureLinks();
}