<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    

    public function __construct()
    {
        
    }

    public function dashboard()
    {
        // $nft_assets = NftAsset::where('wallet_user_id', 1)->with('collection')->get();
        // $nft_assets->map(function( $nft_asset, $key ) {
        //     $ipfs = str_replace('ipfs://', 'https://ipfs.io/ipfs/', $nft_asset->ipfs_url);
        //     $res = $this->http->get($ipfs);
        //     $data = json_decode($res->getBody()->getContents());
        //     $image_url = str_replace('ipfs://', 'https://ipfs.io/ipfs/', $data->image);
        //     $nft_asset->ipfs_url = $image_url;
        //     return $nft_asset;
        // });
        return view('home');
    }
}
