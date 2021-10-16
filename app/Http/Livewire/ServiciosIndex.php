<?php

namespace App\Http\Livewire;

use App\Models\Group;
use App\Models\User;
use Livewire\WithPagination;
use Livewire\Component;

class ServiciosIndex extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = '10';
    public $groups;
    public $user_group = '';

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '10']
    ];

    public function mount()
    {
        $this->groups = Group::orderBy('name', 'asc')->get();
    }

    public function render()
    {
        $users = User::termino($this->search);
        /** ->groups($this->user_group);**/
        $users = $users->paginate($this->perPage);

        return view('livewire.servicios-index', compact('users'));

    }

    public function clear() {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '10';
    }
}
