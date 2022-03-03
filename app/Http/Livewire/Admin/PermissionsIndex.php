<?php

namespace App\Http\Livewire\Admin;

use Spatie\Permission\Models\Permission;
use Livewire\Component;
use Livewire\WithPagination;

class PermissionsIndex extends Component
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

        $permissions =  Permission::where('name', 'LIKE', $searchParams)
                                ->latest('id')
                                ->paginate($this->perPage);

        return view('livewire.admin.permissions-index', compact('permissions'));
    }

    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '20';
    }
}
