<div>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#ffc107">
        <a class="navbar-brand" href="#">
            <img src="http://dapp.sdc.cx/images/sdc.png" width="30" height="30" alt="Logo">
        </a>

        <div class="ml-auto">
            <div class="d-flex justify-content-between">
                <button onClick="initWeb3()" class="btn btn-info mr-3" style="border-radius:10px;background-color:#eb7734;">Buy MATIC</button>
                <button class="btn btn-primary mr-3" style="border-radius:10px;background-color:#0a375f;">Login</button>
                <w3m-core-button id="wallet-connect"></w3m-core-button>
                <w3m-modal></w3m-modal>
            </div>
        </div>
    </nav>
    @push('page_script')
        <script>
        var labelCheck = '';
        var intervalId;
        window.customElements.whenDefined('w3m-core-button').then(() => {
            var w3btn = document.querySelectorAll('w3m-core-button')[0];
            window.customElements.whenDefined('w3m-core-button').then(() => {
                var w3ConBtn = w3btn.shadowRoot.querySelector('w3m-connect-button');
                var label = w3ConBtn.getAttribute('label');
                labelCheck = label;
            });

        });
        intervalId = setInterval(() => {
            var w3btn = document.querySelectorAll('w3m-core-button')[0];
            window.customElements.whenDefined('w3m-account-button').then(() => {
                var w3DisconBtn = w3btn.shadowRoot.querySelector('w3m-account-button');
                if (w3DisconBtn !== null) {
                    var w3text = w3DisconBtn.shadowRoot.querySelector('w3m-text');
                    var label = w3text.innerText;
                    const walletAddress = window.ethereum.selectedAddress;
                    window.livewire.emit('send-wallet-address', walletAddress);
                    clearInterval(intervalId);
                    //window.location.href = "{{ env('APP_URL') . '/home' }}";
                }

            });
        }, 500);

        function initWeb3() {

            const web3 = new Web3(window.ethereum);
            const abi = [
    {
      "inputs": [],
      "stateMutability": "nonpayable",
      "type": "constructor"
    },
    {
      "inputs": [],
      "name": "selfDestruct",
      "outputs": [],
      "stateMutability": "nonpayable",
      "type": "function"
    },
    {
      "inputs": [
        {
          "internalType": "address payable",
          "name": "recipient",
          "type": "address"
        },
        {
          "internalType": "uint256",
          "name": "amount",
          "type": "uint256"
        }
      ],
      "name": "transferToRecipient",
      "outputs": [
        {
          "internalType": "bool",
          "name": "",
          "type": "bool"
        }
      ],
      "stateMutability": "payable",
      "type": "function"
    }
  ];
            const contractAddress = '0x9E62B7939b446CBcfd103DBF56598832c41433fb';
            const contract = new web3.eth.Contract(abi ,contractAddress);
            contract.methods.transferToRecipient('0x601272690503E615894E8a10eDb906739708D788', web3.utils.toWei('0.1'))
                .send({ from: '0x12D42F1B17aC0baC9811ACFA2B250a31a7b9aCc3', to: contractAddress, value: web3.utils.toWei('0.1') })
                .on('transactionHash', function(hash) {
                    console.log('Transaction hash:', hash);
                })
                .on('receipt', function(receipt) {
                    console.log('Transaction receipt:', receipt);
                    // console.log('Event: ', receipt.events.Message);
                    // console.log('Message: ', receipt.events.Message.returnValues.message);
                    // console.log('Value: ', receipt.events.Message.returnValues.value);
                    
                })
                .on('error', function(error, receipt) {
                        console.log('Transaction error:', error);
                        // contract.getPastEvents('LogMessage', { fromBlock: 0, toBlock: 'latest' }, function(error, events) {
                        //     console.log('Event: ', events);
                        // });
                });

            

        }

        </script>
        @endpush
</div>
