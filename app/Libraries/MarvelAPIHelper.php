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
        $this->client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://gateway.marvel.com/',
            // You can set any number of default request options.
            'timeout'  => 30.0,
        ]);
    }

    public function getComicsFromAPI(Request $request)
    {
        // set up the query for the request
        $ts = time();
        $query = ['apikey' => \Config::get('apis.marvel_api_public_key'),
                    'ts' => $ts,
                    // hash = md5 hashed timestamp, private key, public key
                    'hash' => md5($ts . \Config::get('apis.marvel_api_private_key') . \Config::get('apis.marvel_api_public_key')),
                    'limit' => $request['limit'],
                    'offset' => $request['offset'] ];
        if(isset($request['titleStartsWith'])) {
            $query['titleStartsWith'] = $request['titleStartsWith'];
        }

        // create and sent the request
        $res = $this->client->request('GET', '/v1/public/comics',
            ['query' => $query,
            'verify' => false]);

        // the body of the response contains all the things we care about
        $body = $res->getBody();
        $obj = json_decode($body, true);
        $data = $obj['data'];
        // $results will be a list of at most 100 comics that fit the search criteria
        $results = $data['results'];

        return $results;
    }

}
