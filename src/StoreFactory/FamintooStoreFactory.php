<?php


namespace Mike\StoreFactory;


use Mike\Interfaces\StoreAbstractFactory;
use Mike\Models\MenuItem;
use Mike\Models\Store;
use Symfony\Component\DomCrawler\Crawler;

class FamintooStoreFactory extends StoreAbstractFactory
{

    /**
     * @return Store[]
     */
    public function captureStores()
    {
        foreach($this->linkFactory->captureLinks() as $link){
            $request = $this->client->request("GET", $link);
            $store = $this->getDetails($request);
            $menu = $this->getMenuItens($request);

            $store->setMenu($menu);
            $this->stores[] = $store;

        }

        return $this->stores;
    }

    private function getDetails(Crawler $request){
        $name = trim($request->filter("h1")->text());
        $phone = $request->filter("span[itemprop='telephone']");
        $phone = ($phone->count() > 0) ?  $phone->first()->text() : $phone;
        $type = trim(explode(":",$request->filter("p[itemprop='servesCuisine']")->first()->text())[0]);
        $logo = "https://famintoo.com/".ltrim($request->filter(".wi-100.pa-10 .bo-le img")->first()->attr("src"), "./");

        return new Store($name, $logo, $phone, $type);
    }


    private function getMenuItens(Crawler $request){
        return $itens = $request->filter(".prod")->each(function (Crawler $item) {
            $description = $item->filter('.pdesc');
            if($description->count() == 0){
                $description = "";
            }else{
                $description = $item->filter('.pdesc')->text();
            }
            $menuItem = new MenuItem(
                $item->attr("prona"),
                $description,
                (float) str_replace(",", ".", $item->attr("propri")),
                $item->attr("protyna")
            );

            return $menuItem;
        });

    }


}