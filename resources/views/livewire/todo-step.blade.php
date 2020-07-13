<div>
    <button wire:click="increment" 
    type="button" class="mb-2 fa fa-plus"></button> {{ count($steps) }}

    @foreach($steps as $step) 
        <div class="input-group mb-3" >
            <input wire:key="{{ $loop->index }}" placeholder="{{ 'Describe the step number '.($step+1) }}" 
            type="text" 
            class="form-control" name="step[]" id="step">
            <div class="input-group-append">
                <span wire:click="remove({{ $step }})" 
                class="btn btn-outline-secondary" 
                > <i class="fa fa-times"></i> </span>
            </div>
        </div>
    @endforeach
</div>