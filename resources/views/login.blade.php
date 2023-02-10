<div>
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
        @livewire('login')
    </x-guest-layout>
</div>