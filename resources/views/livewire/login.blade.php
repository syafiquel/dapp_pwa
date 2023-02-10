<div>
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
                    const acc = window.ethereum.selectedAddress;
                    console.log(acc);
                    window.livewire.emit('alert', acc);
                    clearInterval(intervalId);
                    //window.location.href = "{{ env('APP_URL') . '/home' }}";
                }

            });
        }, 500);
        </script>
        @endpush
</div>
