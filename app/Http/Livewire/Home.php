<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\NftAsset;
use App\Services\HttpClient;
use Illuminate\Support\Facades\Log;


class Home extends Component
{

    public $nft_assets;
    protected $http;

    protected $listeners = ['payment-transaction' => 'paymentHandle'];


    public function mount(HttpClient $http)
    {
        $this->http = $http;
        $this->nft_assets = NftAsset::where('wallet_user_id', 1)->with('collection')->get();
        $this->nft_assets->map(function( $nft_asset, $key ) {
            $ipfs = str_replace('ipfs://', 'https://ipfs.io/ipfs/', $nft_asset->ipfs_url);
            $res = $this->http->get($ipfs);
            $data = json_decode($res->getBody()->getContents());
            $image_url = str_replace('ipfs://', 'https://ipfs.io/ipfs/', $data->image);
            $nft_asset->ipfs_url = $image_url;
            return $nft_asset;
        });
    }

    public function paymentHandle($response)
    {
        $api_client = new HttpClient();
        $response['price'] = floatval(weiToMatic($response['price']));
        $contract_handler_server_url = 'http://172.30.71.240:3333/transfer/' . $response['address'] . '/' . $response['price'] . '/' . $response['tokenId'] . '/';
        $response = $api_client->get($contract_handler_server_url);

    }

    public function render()
    {
        return view('livewire.home');
    }
}
