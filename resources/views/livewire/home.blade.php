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
                    <button x-data="{ price: {{ $nft_asset->price }}, tokenId: {{ $nft_asset->token_id }} }" x-init="" x-on:click="                   
                        const web3 = new Web3(window.ethereum);
                        const balance = web3.eth.getBalance(window.ethereum.selectedAddress);
                        if(balance > price) {
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
                            const abi2 = [
                                {
                                'inputs': [],
                                'stateMutability': 'nonpayable',
                                'type': 'constructor'
                                },
                                {
                                'anonymous': false,
                                'inputs': [
                                    {
                                    'indexed': true,
                                    'internalType': 'address',
                                    'name': 'owner',
                                    'type': 'address'
                                    },
                                    {
                                    'indexed': true,
                                    'internalType': 'address',
                                    'name': 'approved',
                                    'type': 'address'
                                    },
                                    {
                                    'indexed': true,
                                    'internalType': 'uint256',
                                    'name': 'tokenId',
                                    'type': 'uint256'
                                    }
                                ],
                                'name': 'Approval',
                                'type': 'event'
                                },
                                {
                                'anonymous': false,
                                'inputs': [
                                    {
                                    'indexed': true,
                                    'internalType': 'address',
                                    'name': 'owner',
                                    'type': 'address'
                                    },
                                    {
                                    'indexed': true,
                                    'internalType': 'address',
                                    'name': 'operator',
                                    'type': 'address'
                                    },
                                    {
                                    'indexed': false,
                                    'internalType': 'bool',
                                    'name': 'approved',
                                    'type': 'bool'
                                    }
                                ],
                                'name': 'ApprovalForAll',
                                'type': 'event'
                                },
                                {
                                'anonymous': false,
                                'inputs': [
                                    {
                                    'indexed': true,
                                    'internalType': 'address',
                                    'name': 'previousOwner',
                                    'type': 'address'
                                    },
                                    {
                                    'indexed': true,
                                    'internalType': 'address',
                                    'name': 'newOwner',
                                    'type': 'address'
                                    }
                                ],
                                'name': 'OwnershipTransferred',
                                'type': 'event'
                                },
                                {
                                'anonymous': false,
                                'inputs': [
                                    {
                                    'indexed': false,
                                    'internalType': 'address',
                                    'name': 'owner',
                                    'type': 'address'
                                    },
                                    {
                                    'indexed': false,
                                    'internalType': 'uint256',
                                    'name': 'price',
                                    'type': 'uint256'
                                    },
                                    {
                                    'indexed': false,
                                    'internalType': 'uint256',
                                    'name': 'id',
                                    'type': 'uint256'
                                    },
                                    {
                                    'indexed': false,
                                    'internalType': 'string',
                                    'name': 'uri',
                                    'type': 'string'
                                    }
                                ],
                                'name': 'Purchase',
                                'type': 'event'
                                },
                                {
                                'anonymous': false,
                                'inputs': [
                                    {
                                    'indexed': true,
                                    'internalType': 'address',
                                    'name': 'from',
                                    'type': 'address'
                                    },
                                    {
                                    'indexed': true,
                                    'internalType': 'address',
                                    'name': 'to',
                                    'type': 'address'
                                    },
                                    {
                                    'indexed': true,
                                    'internalType': 'uint256',
                                    'name': 'tokenId',
                                    'type': 'uint256'
                                    }
                                ],
                                'name': 'Transfer',
                                'type': 'event'
                                },
                                {
                                'inputs': [],
                                'name': '_owner',
                                'outputs': [
                                    {
                                    'internalType': 'address payable',
                                    'name': '',
                                    'type': 'address'
                                    }
                                ],
                                'stateMutability': 'view',
                                'type': 'function'
                                },
                                {
                                'inputs': [
                                    {
                                    'internalType': 'address',
                                    'name': 'to',
                                    'type': 'address'
                                    },
                                    {
                                    'internalType': 'uint256',
                                    'name': 'tokenId',
                                    'type': 'uint256'
                                    }
                                ],
                                'name': 'approve',
                                'outputs': [],
                                'stateMutability': 'nonpayable',
                                'type': 'function'
                                },
                                {
                                'inputs': [
                                    {
                                    'internalType': 'address',
                                    'name': 'owner',
                                    'type': 'address'
                                    }
                                ],
                                'name': 'balanceOf',
                                'outputs': [
                                    {
                                    'internalType': 'uint256',
                                    'name': '',
                                    'type': 'uint256'
                                    }
                                ],
                                'stateMutability': 'view',
                                'type': 'function'
                                },
                                {
                                'inputs': [
                                    {
                                    'internalType': 'address',
                                    'name': '_receiver',
                                    'type': 'address'
                                    },
                                    {
                                    'internalType': 'uint256',
                                    'name': '_id',
                                    'type': 'uint256'
                                    }
                                ],
                                'name': 'buy',
                                'outputs': [],
                                'stateMutability': 'payable',
                                'type': 'function'
                                },
                                {
                                'inputs': [
                                    {
                                    'internalType': 'uint256',
                                    'name': 'tokenId',
                                    'type': 'uint256'
                                    }
                                ],
                                'name': 'getApproved',
                                'outputs': [
                                    {
                                    'internalType': 'address',
                                    'name': '',
                                    'type': 'address'
                                    }
                                ],
                                'stateMutability': 'view',
                                'type': 'function'
                                },
                                {
                                'inputs': [
                                    {
                                    'internalType': 'address',
                                    'name': 'owner',
                                    'type': 'address'
                                    },
                                    {
                                    'internalType': 'address',
                                    'name': 'operator',
                                    'type': 'address'
                                    }
                                ],
                                'name': 'isApprovedForAll',
                                'outputs': [
                                    {
                                    'internalType': 'bool',
                                    'name': '',
                                    'type': 'bool'
                                    }
                                ],
                                'stateMutability': 'view',
                                'type': 'function'
                                },
                                {
                                'inputs': [
                                    {
                                    'internalType': 'string',
                                    'name': '_tokenURI',
                                    'type': 'string'
                                    },
                                    {
                                    'internalType': 'uint256',
                                    'name': '_price',
                                    'type': 'uint256'
                                    }
                                ],
                                'name': 'mint',
                                'outputs': [
                                    {
                                    'internalType': 'bool',
                                    'name': '',
                                    'type': 'bool'
                                    }
                                ],
                                'stateMutability': 'nonpayable',
                                'type': 'function'
                                },
                                {
                                'inputs': [],
                                'name': 'name',
                                'outputs': [
                                    {
                                    'internalType': 'string',
                                    'name': '',
                                    'type': 'string'
                                    }
                                ],
                                'stateMutability': 'view',
                                'type': 'function'
                                },
                                {
                                'inputs': [],
                                'name': 'owner',
                                'outputs': [
                                    {
                                    'internalType': 'address',
                                    'name': '',
                                    'type': 'address'
                                    }
                                ],
                                'stateMutability': 'view',
                                'type': 'function'
                                },
                                {
                                'inputs': [
                                    {
                                    'internalType': 'uint256',
                                    'name': 'tokenId',
                                    'type': 'uint256'
                                    }
                                ],
                                'name': 'ownerOf',
                                'outputs': [
                                    {
                                    'internalType': 'address',
                                    'name': '',
                                    'type': 'address'
                                    }
                                ],
                                'stateMutability': 'view',
                                'type': 'function'
                                },
                                {
                                'inputs': [
                                    {
                                    'internalType': 'uint256',
                                    'name': '',
                                    'type': 'uint256'
                                    }
                                ],
                                'name': 'price',
                                'outputs': [
                                    {
                                    'internalType': 'uint256',
                                    'name': '',
                                    'type': 'uint256'
                                    }
                                ],
                                'stateMutability': 'view',
                                'type': 'function'
                                },
                                {
                                'inputs': [],
                                'name': 'renounceOwnership',
                                'outputs': [],
                                'stateMutability': 'nonpayable',
                                'type': 'function'
                                },
                                {
                                'inputs': [
                                    {
                                    'internalType': 'address',
                                    'name': 'from',
                                    'type': 'address'
                                    },
                                    {
                                    'internalType': 'address',
                                    'name': 'to',
                                    'type': 'address'
                                    },
                                    {
                                    'internalType': 'uint256',
                                    'name': 'tokenId',
                                    'type': 'uint256'
                                    }
                                ],
                                'name': 'safeTransferFrom',
                                'outputs': [],
                                'stateMutability': 'nonpayable',
                                'type': 'function'
                                },
                                {
                                'inputs': [
                                    {
                                    'internalType': 'address',
                                    'name': 'from',
                                    'type': 'address'
                                    },
                                    {
                                    'internalType': 'address',
                                    'name': 'to',
                                    'type': 'address'
                                    },
                                    {
                                    'internalType': 'uint256',
                                    'name': 'tokenId',
                                    'type': 'uint256'
                                    },
                                    {
                                    'internalType': 'bytes',
                                    'name': 'data',
                                    'type': 'bytes'
                                    }
                                ],
                                'name': 'safeTransferFrom',
                                'outputs': [],
                                'stateMutability': 'nonpayable',
                                'type': 'function'
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
                                    'internalType': 'address',
                                    'name': 'operator',
                                    'type': 'address'
                                    },
                                    {
                                    'internalType': 'bool',
                                    'name': 'approved',
                                    'type': 'bool'
                                    }
                                ],
                                'name': 'setApprovalForAll',
                                'outputs': [],
                                'stateMutability': 'nonpayable',
                                'type': 'function'
                                },
                                {
                                'inputs': [
                                    {
                                    'internalType': 'uint256',
                                    'name': '',
                                    'type': 'uint256'
                                    }
                                ],
                                'name': 'sold',
                                'outputs': [
                                    {
                                    'internalType': 'bool',
                                    'name': '',
                                    'type': 'bool'
                                    }
                                ],
                                'stateMutability': 'view',
                                'type': 'function'
                                },
                                {
                                'inputs': [
                                    {
                                    'internalType': 'bytes4',
                                    'name': 'interfaceId',
                                    'type': 'bytes4'
                                    }
                                ],
                                'name': 'supportsInterface',
                                'outputs': [
                                    {
                                    'internalType': 'bool',
                                    'name': '',
                                    'type': 'bool'
                                    }
                                ],
                                'stateMutability': 'view',
                                'type': 'function'
                                },
                                {
                                'inputs': [],
                                'name': 'symbol',
                                'outputs': [
                                    {
                                    'internalType': 'string',
                                    'name': '',
                                    'type': 'string'
                                    }
                                ],
                                'stateMutability': 'view',
                                'type': 'function'
                                },
                                {
                                'inputs': [
                                    {
                                    'internalType': 'uint256',
                                    'name': 'tokenId',
                                    'type': 'uint256'
                                    }
                                ],
                                'name': 'tokenURI',
                                'outputs': [
                                    {
                                    'internalType': 'string',
                                    'name': '',
                                    'type': 'string'
                                    }
                                ],
                                'stateMutability': 'view',
                                'type': 'function'
                                },
                                {
                                'inputs': [
                                    {
                                    'internalType': 'address',
                                    'name': 'from',
                                    'type': 'address'
                                    },
                                    {
                                    'internalType': 'address',
                                    'name': 'to',
                                    'type': 'address'
                                    },
                                    {
                                    'internalType': 'uint256',
                                    'name': 'tokenId',
                                    'type': 'uint256'
                                    }
                                ],
                                'name': 'transferFrom',
                                'outputs': [],
                                'stateMutability': 'nonpayable',
                                'type': 'function'
                                },
                                {
                                'inputs': [
                                    {
                                    'internalType': 'address',
                                    'name': 'newOwner',
                                    'type': 'address'
                                    }
                                ],
                                'name': 'transferOwnership',
                                'outputs': [],
                                'stateMutability': 'nonpayable',
                                'type': 'function'
                                }
                            ];
                            const contractAddress = '0x9E62B7939b446CBcfd103DBF56598832c41433fb';
                            const nftContractAddress = '0x4094553Ed1912AF6b18D088cd2d268Ac5c6d7eF7';
                            const contract = new web3.eth.Contract(abi ,contractAddress);
                            const nftContract = new web3.eth.Contract(abi2 ,nftContractAddress);
                            contract.methods.transferToRecipient('0xB05522Cb53655bfC50826c5B79996023A68c39e8', price)
                            .send({ from: window.ethereum.selectedAddress, to: contractAddress, value: price })
                            .on('transactionHash', function(hash) {
                                console.log('Transaction hash:', hash)
                            })
                            .on('receipt', function(receipt) {
                                console.log('Transaction receipt:', receipt)
                                
                                // console.log('Event: ', receipt.events.Message)
                                // console.log('Message: ', receipt.events.Message.returnValues.message)
                                // console.log('Value: ', receipt.events.Message.returnValues.value)

                                nftContract.methods.buy(window.ethereum.selectedAddress, tokenId)
                                .send({ from: window.ethereum.selectedAddress, to: nftContractAddress, value: price  })
                                .on('transactionHash', function(hash) {
                                    console.log('NFT Transaction hash:', hash)
                                })
                                .on('receipt', function(receipt) {

                                    const response = {
                                        receipt: receipt,
                                        address: window.ethereum.selectedAddress,
                                        price: price,
                                        tokenId: tokenId
                                    }

                                    window.livewire.emit('payment-transaction', response);

                                })
                                .on('error', function(error, receipt) {
                                    console.log('Transaction error:', error)
                                    
                                })


                                
                            })
                            .on('error', function(error, receipt) {
                                    console.log('Transaction error:', error)                                
                            })
                        }
                        else {
                            window.livewire.emit('open-confirm-modal')
                        }
                        " 
                        class="btn btn-primary mt-3 text-dark" style="background-color:#ffc107" type="button">BUY</button>
                </div>
            </div>
            @endforeach	
        </div>
    </div>
</div>
