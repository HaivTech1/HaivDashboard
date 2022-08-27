<?php

namespace App\Http\Livewire\Components\Housing\Property;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Property;

class Index extends Component
{
    use WithPagination;

    public $selectedRows = [];
    public $selectPageRows = false;
    public $count = 5;
    public $search = '';
    public $gender = '';
    public $sortBy = 'asc';
    public $orderBy = 'title';

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function updatedSelectPageRows($value)
    {
        if ($value) {
            $this->selectedRows = $this->properties->pluck('uuid')->map(function ($id) {
                return (string) $id;
            });
        }
        else{
            $this->reset(['selectedRows', 'selectPageRows']);
        }
    }

    public function getPropertiesProperty()
    {
        return Property::search(trim($this->search))->loadLatest($this->count, $this->orderBy, $this->sortBy);
    }

    public function deleteAll()
    {
        Property::whereIn('uuid', $this->selectedRows)->delete();

        $this->dispatchBrowserEvent('alert', ['message' => 'All selected properties
            were deleted']);

        $this->reset(['selectedRows', 'selectPageRows']);
    }

    public function render()
    {
        return view('livewire.components.housing.property.index',[
            'properties' => $this->properties
        ]);
    }
}
