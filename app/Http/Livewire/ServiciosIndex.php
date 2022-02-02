<?php

namespace App\Http\Livewire;

use App\Models\Group;
use App\Models\User;
use Livewire\{Component, WithPagination};

class ServiciosIndex extends Component
{
    use WithPagination;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '20']
    ];

    public $search=' ';
    public $sort ='name';
    public $direction = 'desc';
    public $perPage = '20';
    public $groups;
    public $user_group = '';

    public function mount()
    {
        $this->groups = Group::orderBy('name', 'asc')->get();
    }

    public function render()
    {
        $users = User::termino($this->search);
        $users = $users->orderBy($this->sort, $this->direction)
                       ->paginate($this->perPage);

        return view('livewire.servicios-index', compact('users'));

    }

    public function order($sort)
    {
        if ($this->sort == $sort) {
            if($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }
 
    public function clear() {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '20';
    }
}
