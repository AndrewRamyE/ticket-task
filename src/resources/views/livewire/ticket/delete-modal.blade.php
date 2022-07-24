<div x-data="{ open: @entangle('showDeleteModal') }" x-cloak>
    <div x-show='open' class="modal-backdrop w-100" style="background-color: rgba(73, 73, 73, 0.5)"   x-cloak>
        <div class="modal fade show d-block"
            style="margin: 0 auto" tabindex="-1"
            role="dialog"  aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" x-on:click.away="$wire.emit('closemodel')">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Modal</h5>
                        <button type="button" class="close" wire:click="CloseModal" >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="Delete">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                   <p>Are you sure you want to delete this item ?</p>
                                </div>
                            </div>
                            <div class="row">
                                <button type="submit" class="btn btn-danger col">
                                    <span class='fa fa-trash'> Delete</span>
                                </button>
                                <button wire:click="CloseModal"
                                type="button" class="btn btn-warning col">
                                    <span class='fa fa-remove'></span> Close
                                </button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
