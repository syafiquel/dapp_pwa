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
                        const abi = [
                            {
                                'inputs': [],
                                'stateMutability': 'nonpayable',
                                'type': 'constructor'
                            },
                            {
                                'inputs': [],
                                'name': 'selfDestruct',
                                'outputs': [],
                                'stateMutability': 'nonpayable',
                                'type': 'function'
                            },
                            {
                                'inputs': [
                                {
                                    'internalType': 'address payable',
                                    'name': 'recipient',
                                    'type': 'address'
                                },
                                {
                                    'internalType': 'uint256',
                                    'name': 'amount',
                                    'type': 'uint256'
                                }
                                ],
                                'name': 'transferToRecipient',
                                'outputs': [
                                {
                                    'internalType': 'bool',
                                    'name': '',
                                    'type': 'bool'
                                }
                                ],
                                'stateMutability': 'payable',
                                'type': 'function'
                            }
                        ];
                        const contractAddress = '0x9E62B7939b446CBcfd103DBF56598832c41433fb';
                        const contract = new web3.eth.Contract(abi ,contractAddress);
                        contract.methods.transferToRecipient('0x601272690503E615894E8a10eDb906739708D788', web3.utils.toWei('0.1'))
                        .send({ from: '0x12D42F1B17aC0baC9811ACFA2B250a31a7b9aCc3', to: contractAddress, value: web3.utils.toWei('0.1') })
                        .on('transactionHash', function(hash) {
                            console.log('Transaction hash:', hash)
                        })
                        .on('receipt', function(receipt) {
                            console.log('Transaction receipt:', receipt)
                            // console.log('Event: ', receipt.events.Message)
                            // console.log('Message: ', receipt.events.Message.returnValues.message)
                            // console.log('Value: ', receipt.events.Message.returnValues.value)
                            
                        })
                        .on('error', function(error, receipt) {
                                console.log('Transaction error:', error)
                                
                        })" class="btn btn-primary mt-3 text-dark" style="background-color:#ffc107" type="button">BUY</button>
                </div>
            </div>
            @endforeach	
        </div>
    </div>
</div>
