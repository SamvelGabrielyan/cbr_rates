<?php

namespace App\Console\Commands;

use App\Rate;
use DOMDocument;
use Illuminate\Console\Command;

class GetRates extends Command
{
    /**
     * Load from CRB rates, update in db.
     *
     * @var string
     */
    protected $signature = 'get-rates';

    protected $description = 'Get Rates';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {

        Rate::truncate();

        $xml = new DOMDocument();
//        $xmlx = new DOMDocument();
//        $url_rate = 'http://www.cbr.ru/scripts/XML_daily.asp?date_req=' . date('d.m.Y');
        $url = 'http://www.cbr.ru/scripts/XML_valFull.asp';



        if ($xml->load($url)) {
//            $xmlx->load($url_rate);
//            $roots = $xmlx->documentElement;
//            $itemss = $roots->getElementsByTagName('Valute');

            $root = $xml->documentElement;
            $items = $root->getElementsByTagName('Item');

            foreach ($items as $item) {
                $engish_name = $item->getElementsByTagName('EngName')->item(0)->nodeValue;
                $name = $item->getElementsByTagName('Name')->item(0)->nodeValue;
                $iso_char_code = $item->getElementsByTagName('ISO_Char_Code')->item(0)->nodeValue;
                $iso_num_code = $item->getElementsByTagName('ISO_Num_Code')->item(0)->nodeValue;

                $rate = new Rate();
                $rate->name = $name;
                $rate->english_name = $engish_name;
                $rate->alphabetic_code = $iso_char_code;
                $rate->digit_code = $iso_num_code;
                $rate->save();
            }
            return true;
        }

    }
}
