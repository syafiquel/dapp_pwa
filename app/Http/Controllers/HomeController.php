<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\HttpClient;
use App\Models\NftAsset;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{

    protected $http;

    public function __construct(HttpClient $http)
    {
        $this->http = $http;
    }

    public function dashboard()
    {
        $nft_assets = NftAsset::with('collection')->get();
        $nft_assets->map(function( $nft_asset, $key ) {
            $ipfs = str_replace('ipfs://', 'https://ipfs.io/ipfs/', $nft_asset->ipfs_url);
            $res = $this->http->get($ipfs);
            $data = json_decode($res->getBody()->getContents());
            $image_url = str_replace('ipfs://', 'https://ipfs.io/ipfs/', $data->image);
            $nft_asset->ipfs_url = $image_url;
            return $nft_asset;
        });
        return view('home', compact('nft_assets'));
    }
}
