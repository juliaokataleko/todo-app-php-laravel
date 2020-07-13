<div>
    <button wire:click="increment" 
    type="button" class="mb-2 fa fa-plus"></button> {{ count($steps) }}

    @foreach($steps as $step) 
        <div class="input-group mb-3" >
            <input wire:key="{{ $loop->index }}" 
            placeholder="{{ 'Describe the step number '.($loop->index+1) }}" 
            type="text" value="{{ $step['name'] ?? '' }}"
            class="form-control" name="step[]" id="step">
            <input type="hidden" name="stepId[]" value="{{ $step['id'] ?? '' }}">
            <div class="input-group-append">
                <span wire:click="remove({{ $loop->index }})" 
                class="btn btn-outline-secondary" 
                > <i class="fa fa-times"></i> </span>
            </div>
        </div>
    @endforeach
</div>