<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Sunra\PhpSimple\HtmlDomParser;

class ScrapController extends Controller
{
    var $data = array();
    public function getData($cc){
        $patt = array();
        $patt[0]='/&#x/';
        $patt[1]='/;/';
        $patt[2]='/B/';
        $rep = array();
        $rep[0]='';
        $rep[1]='';
        $rep[2]='';
        foreach($cc as $val){
            $name = $val->find('td[class="left bold elp name cryptoName first js-currency-name"]',0)->text();
            $symbol = $val->find('td[class="left noWrap elp symb js-currency-symbol"]',0)->text();
            $price = str_replace(',','',$val->find('td[class="price js-currency-price"]',0)->text());
            $marcap = preg_replace($patt,$rep,$val->find('td[class="js-market-cap"]',0)->text());
            $vol24 = preg_replace($patt,$rep,$val->find('td[class="js-24h-volume"]',0)->text());
            $chg24h = $val->find('td[class="js-currency-change-24h"]',0)->text();
            $chg7d = $val->find('td[class="js-currency-change-7d"]',0)->text();
            $data2 =  [
                'symbol' => $symbol,
                'name' => $name,
                'price' => $price,
                'marcap' => $marcap,
                'vol24h' => $vol24,
                'chg24h' => $chg24h,
                'chg7d' => $chg7d,
                'date' => date("Y-m-d h:i:sa")
            ];
            $this->data[] = $data2;
        }
    }

    public function index(){
        $url = 'https://www.investing.com/crypto/';
        $client = new Client();

        $response = $client->request(
            'GET',
            $url
        );

        $response_ststus_code = $response->getStatusCode();
        $html = $response->getBody()->getContents();

        if($response_ststus_code == 200){
            $dom = HtmlDomParser::str_get_html($html);
            //dd($dom);

            //$i = 1;
            $btc = $dom->find('tr[i="1057391"]');
            $eth = $dom->find('tr[i="1061443"]');
            $xrp = $dom->find('tr[i="1057392"]');
            $usdt = $dom->find('tr[i="1061453"]');
            $bch = $dom->find('tr[i="1061410"]');
            $ltc = $dom->find('tr[i="1061445"]');
            $eos = $dom->find('tr[i="1061444"]');
            $bnb = $dom->find('tr[i="1061448"]');
            $bsv = $dom->find('tr[i="1099037"]');
            $xlm = $dom->find('tr[i="1061451"]');
            $this->getData($btc);
            $this->getData($eth);
            $this->getData($xrp);
            $this->getData($usdt);
            $this->getData($bch);
            $this->getData($ltc);
            $this->getData($eos);
            $this->getData($bnb);
            $this->getData($bsv);
            $this->getData($xlm);
            
            $datas = $this->data;
            //dd($datas);
            //dd(date("Y-m-d h:i:sa"));
            return view('scrap.index', compact('datas'));
        }else{
            echo '404 not found';
        }
    }

    
}
