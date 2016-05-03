<?php

namespace Project4\Libraries;

use Illuminate\Http\Request;
use App\Http\Requests;
use GuzzleHttp\Client;
use Guzzle\Http\Message\Response;

class MarvelAPIHelper
{

    public function __construct()
    {
        $this->$client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://gateway.marvel.com/',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
    }

    public function getComicsFromAPI(Request $request)
    {
        $ts = time();
        $res = $this->$client->request('GET', '/v1/public/comics',
            ['query' => ['apikey' => \Config::get('marvel_api_public_key'),
                        'ts' => $ts,
                        // hash = md5 hashed timestamp, private key, public key
                        'hash' => md5($ts . \Config::get('marvel_api_private_key') . \Config::get('marvel_api_public_key')),
                        // All other query parameters go here. More to be added as design is finalized.
                        'titleStartsWith' => $request['titleStartsWith'],
                        'limit' => 100 ],
            'verify' => false]);

        // the body of the response contains all the things we care about
        $body = $res->getBody();
        //$data = $res->json();
        $obj = json_decode($body, true);
        $data = $obj['data'];
        // $results will be a list of at most 100 comics that fit the search criteria
        $results = $obj['results'];

        return $results;
    }

}
