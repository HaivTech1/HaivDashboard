<?php

namespace App\Http\Livewire\Manager\Pioneer;

use App\Models\User;
use App\Models\Pioneer;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Validator;

class Index extends Component
{

    use WithPagination;

    public $selectedRows = [];
    public $selectPageRows = false;
    public $count = 5;
    public $search = '';
    public $pioneer = [];

    protected $queryString = [
        'search' => ['except' => ''],
    ];


    public function updatedSelectPageRows($value)
    {
        if ($value) {
            $this->selectedRows = $this->pioneers->pluck('id')->map(function ($id) {
                return (string) $id;
            });
        }
        else{
            $this->reset(['selectedRows', 'selectPageRows']);
        }
    }

    public function createPioneer()
    {
        $validated = Validator::make($this->pioneer, [
            'facebook' => 'required',
            'instagram' => 'required',
            'twitter' => 'required',
            'linkedin' => 'required',
            'designation' => 'required',
            'author_id' => 'required',
        ])->validate();

        // dd($validated);

        Pioneer::create($validated);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'Pioneer created successfully!'
        ]);
    }

    public function getPioneersProperty()
    {
        return Pioneer::search(trim($this->search))->loadLatest($this->count);
    }

    public function deleteAll()
    {
        Pioneer::whereIn('id', $this->selectedRows)->delete();

        $this->dispatchBrowserEvent('alert', ['message' => 'All selected pioneers
            were deleted']);

        $this->reset(['selectedRows', 'selectPageRows']);
    }

    public function render()
    {
        return view('livewire.manager.pioneer.index', [
            'pioneers' => $this->pioneers,
            'users' => User::whereNotIn('type', [5])->pluck('name', 'id')
        ]);
    }
}
