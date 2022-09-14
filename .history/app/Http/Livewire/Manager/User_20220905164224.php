<?php

namespace App\Http\Livewire\Manager;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use App\Models\User as ClientUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class User extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $selectedRows = [];
    public $selectPageRows = false;
    public $per_page = 5;
    public $search = '';
    public $state = [];

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function updatedSelectPageRows($value)
    {
        if ($value) {
            $this->selectedRows = $this->users->pluck('id')->map(function ($id) {
                return (string) $id;
            });
        }
        else{
            $this->reset(['selectedRows', 'selectPageRows']);
        }
    }

    public function loadMore()
    {
        $this->count += 4;
    }

    public function resetSearch()
    {
        $this->search = '';
    }

    public function createUser()
    {
        $validated = Validator::make($this->state, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'type' => 'required',
        ])->validate();


        $user = new ClientUser();
        $user->password = Hash::make($validated['password']);
        $user->email = $validated['email'];
        $user->name = $validated['name'];
        $user->type = $validated['type'];
        $user->save();

        $this->reset();
        $this->dispatchBrowserEvent('success', ['message' => 'User created successfully!']);
    }

    public function getUsersProperty()
    {
        return ClientUser::search(trim($this->search))
        ->load($this->per_page);
    }

    public function deleteAll()
    {
        ClientUser::whereIn('id', $this->selectedRows)->delete();

        $this->dispatchBrowserEvent('success', ['message' => 'All selected users
            were deleted']);

        $this->reset(['selectedRows', 'selectPageRows']);
    }
    

    public function disableAll()
    {
        ClientUser::whereIn('id', $this->selectedRows)->update(['status' => false]);

        $this->dispatchBrowserEvent('success', ['message' => 'All selected users were marked as verified']);

        $this->reset(['selectedRows', 'selectPageRows']);
    }

    public function undisableAll()
    {
        ClientUser::whereIn('id', $this->selectedRows)->update(['status' => true]);
        
        $this->dispatchBrowserEvent('success', ['message' => 'All selected users
            were marked as unverified']);

        $this->reset(['selectedRows', 'selectPageRows']);
    }

    public function changeUser($user, $type)
    {
        Validator::make(['type' => $type], [
            'type'      => [
                'required', 
                Rule::in(ClientUser::ADMIN, ClientUser::AGENT, ClientUser::WRITER, ClientUser::DEFAULT),
            ],
        ]);
        $use = ClientUser::findOrFail($user['id']);
        $use->update(['type' => $type]);
        $this->dispatchBrowserEvent('success', ['message' => 'User type changed successfully!']);
        $this->reset();
    }
    
    public function render()
    {
        return view('livewire.manager.user', [
            'users' => $this->users,
        ]);
    }
}