<div>
    <div class="container w-100">
        <div class="row justify-content-center headline-container" style="padding-top:20px">
        <div class="col-8 headline">
            <h1 class="hed text-white">SDC DAPP</h1>
        </div>
        </div>
        <div class="card-deck">
            @foreach($nft_assets as $nft_asset)
            <div class="card my-3">
                <img src="{{ $nft_asset->ipfs_url }}" class="card-img-top">
                    <div class="card-body d-flex flex-column">
                        <div class="flex-container" style="display: flex; flex-wrap: wrap;">
                            <div class="flex-column" style="flex: 1; display: flex; flex-direction: column; background-color: lightblue;">
                                <p style="flex: 1; margin: 20px; text-align: center;">{{ $nft_asset->name }}</p>
                            </div>
                        <div class="flex-column" style="flex: 1; display: flex; flex-direction: column; background-color: lightgreen;">
                            <p style="flex: 1; margin: 20px; text-align: center;">{{ floatval(weiToMatic($nft_asset->price)) }} MATIC</p>
                        </div>
                    </div>
                    <button x-data="{ price: {{ $nft_asset->price }}, tokenId: {{ $nft_asset->token_id }} }" x-init="" x-on:click="const web3 = new Web3(window.ethereum);
                        web3.eth.getAccounts()
                            .then((accounts) => {
                                web3.eth.sendTransaction({
                                    from: accounts[0],
                                    to: '0xB05522Cb53655bfC50826c5B79996023A68c39e8',
                                    value: price
                                    })
                                    .then(function(receipt) {
                                        const response = {
                                            receipt: receipt,
                                            address: accounts[0],
                                            price: price,
                                            tokenId: tokenId
                                        }
                                        window.livewire.emit('payment-transaction', response);
                                        console.log(response)
                                    })
                        })" class="btn btn-primary mt-3 text-dark" style="background-color:#ffc107" type="button">BUY</button>
                </div>
            </div>
            @endforeach	
        </div>
    </div>
</div>
