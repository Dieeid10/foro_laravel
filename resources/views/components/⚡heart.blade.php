<?php

use Livewire\Component;
use Illuminate\Database\Eloquent\Model;

new class extends Component
{
    public Model $heartable;

    public function mount($heartable)
    {
        $this->heartable = $heartable;
    }

    public function toggle()
    {
        if ($this->heartable->isHearted()) {
            $this->heartable->unheart();
        } else {
            $this->heartable->heart();
        }
    }

};
?>

<div>
    <a wire:click="toggle" class="cursor-pointer">
        @if ($heartable->isHearted())
        <span class="text-red-600">&hearts;</span>
        @else
        <span class="text-gray-600">&hearts;</span>
        @endif
    </a>
</div>
