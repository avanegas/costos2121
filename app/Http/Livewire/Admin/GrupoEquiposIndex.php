<?php

namespace App\Http\Livewire\Admin;

use App\Models\GrupoEquipo;
use Livewire\Component;
use Livewire\WithPagination;

class GrupoEquiposIndex extends Component
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

        $grupo_equipos =  GrupoEquipo::where('name', 'LIKE', $searchParams)
            ->orwhere('description', 'LIKE', $searchParams)
            ->latest('id')
            ->paginate($this->perPage);

        return view('livewire.admin.grupo-equipos-index', compact('grupo_equipos'));
    }

    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '20';
    }
}
