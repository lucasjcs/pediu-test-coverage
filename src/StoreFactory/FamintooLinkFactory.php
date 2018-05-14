<?php

namespace Mike\StoreFactory;


use Mike\Interfaces\LinkAbstractFactory;

class FamintooLinkFactory extends LinkAbstractFactory
{
    private static $links = [];

    /**
     * @return string[]
     */
    public function captureLinks()
    {

        if(count(self::$links) == 0) {
            $i = 0;
            do {
                $crawler = $this->getRequestWithOffset($i++);
            } while ($this->getUrlsStoresForPages($crawler));

        }
        return self::$links;
    }


    private function getUrlsStoresForPages($page){
        return $page->filter("a.list-menu")->each(function ($node){
            $url = sprintf("https://famintoo.com/%s", ltrim($node->attr("href"), "./"));
            self::$links[] = $url;
            return $url;
        });
    }

    private function getRequestWithOffset($offset = 0){
        return $this->client->request(
            'POST',
            'https://famintoo.com/model/select/menus.php',
            ['city_id' => 3278, 'begin' => ($offset*20) + 1]
        );
    }

}