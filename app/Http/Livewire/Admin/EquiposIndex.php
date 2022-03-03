<?php

namespace App\Http\Livewire\Admin;

use App\Models\Equipo;
use Livewire\Component;
use Livewire\WithPagination;

class EquiposIndex extends Component
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

        $equipos =  Equipo::where('name', 'LIKE', $searchParams)
                    ->orwhere('marca', 'LIKE', $searchParams)
                    ->latest('id')
                    ->paginate($this->perPage);

        return view('livewire.admin.equipos-index', compact('equipos'));
    }

    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '20';
    }
}
