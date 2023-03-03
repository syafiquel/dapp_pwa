<div wire:ignore class="modal fade" id="modal-confirm" tabindex="-1" role="dialog" aria-labelledby="confirmationModal" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">             
                <h5 class="modal-title" id="confirmationModal">MATIC Balance</h5>         
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">               
                    <span aria-hidden="true">×</span>             
                </button>           
            </div>
            <div class="modal-body">           
                <p>Insufficent MATIC balance. Please buy some MATIC.</p>
            </div>  
            <div class="modal-footer bg-whitesmoke">           
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
            </div>   
        </div>
    </div>
</div>
@push('page_script')
<script type="text/javascript" defer>
    window.livewire.on('open-confirm-modal', () => {     
        $('#modal-confirm').modal('show');     
    });
</script>
@endpush
