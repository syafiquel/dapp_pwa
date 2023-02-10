<x-guest-layout>
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
                        <p style="flex: 1; margin: 20px; text-align: center;">{{floatval(weiToMatic($nft_asset->price)) }} MATIC</p>
                    </div>
                </div>
				<button x-init="" x-on:click="const web3 = new Web3(window.ethereum);
                    const wei = web3.utils.toWei('10000');
                    web3.eth.getAccounts()
                        .then((accounts) => {
                            web3.eth.sendTransaction({
                                from: accounts[0],
                                to: '0x12D42F1B17aC0baC9811ACFA2B250a31a7b9aCc3',
                                value: wei
                                })
                                .then(function(receipt){
                                    console.log(receipt)
                                })
                    })" class="btn btn-primary mt-3 text-dark" style="background-color:#ffc107" type="button">BUY</button>
			</div>
		</div>
        @endforeach	
	</div>
</div>
</x-guest-layout>