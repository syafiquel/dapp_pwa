<x-guest-layout>
    <div class="container h-100">
        <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                
                <div class="h-100 card card-primary" style="margin-top:40%">
                    <div class="row h-50 justify-content-center align-items-center mt-1">
                        <img src="images/sdc.png" alt="logo" width="100" class="shadow-light rounded-circle">
                    </div>

                    <div class="card-body mt-2">
                        <div class="row h-50 justify-content-center align-items-center">
                            <w3m-core-button></w3m-core-button>
                            <w3m-modal></w3m-modal>
                        </div>
                    </div>
                </div>
                <div class="simple-footer">
                    Copyright &copy; SDC 2022
                </div>
            </div>
        </div>
    </div>
    </div>


    @push('page_script')
    <script type="text/javascript">
    var labelCheck = '';
    window.customElements.whenDefined('w3m-core-button').then(() => {
        var w3btn = document.querySelectorAll('w3m-core-button')[0];
        window.customElements.whenDefined('w3m-core-button').then(() => {
            var w3ConBtn = w3btn.shadowRoot.querySelector('w3m-connect-button');
            var label = w3ConBtn.getAttribute('label');
            labelCheck = label;
        });

    });
    setInterval(() => {
        var w3btn = document.querySelectorAll('w3m-core-button')[0];
        window.customElements.whenDefined('w3m-account-button').then(() => {
            var w3DisconBtn = w3btn.shadowRoot.querySelector('w3m-account-button');
            if (w3DisconBtn !== null) {
                var w3text = w3DisconBtn.shadowRoot.querySelector('w3m-text');
                var label = w3text.innerText;
                window.location.href = env('APP_URL') . '/home';
            }

        });
    }, 1000);
    </script>
    @endpush
</x-guest-layout>