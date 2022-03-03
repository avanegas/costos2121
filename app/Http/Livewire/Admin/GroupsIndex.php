<?php

namespace App\Http\Livewire\Admin;

use App\Models\Group;
use Livewire\Component;
use Livewire\WithPagination;

class GroupsIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '20']
    ];

    public $search = '';
    public $perPage = '20';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $searchParams = '%' . $this->search . '%';

        $groups =  Group::where('name', 'LIKE', $searchParams)
                        ->paginate($this->perPage);

        return view('livewire.admin.groups-index', compact('groups'));
    }

    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '20';
    }
}
