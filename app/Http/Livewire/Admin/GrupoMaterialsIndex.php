<?php

namespace App\Http\Livewire\Admin;

use App\Models\GrupoMaterial;
use Livewire\Component;
use Livewire\WithPagination;

class GrupoMaterialsIndex extends Component
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

        $grupo_materials =  GrupoMaterial::where('name', 'LIKE', $searchParams)
            ->orwhere('description', 'LIKE', $searchParams)
            ->latest('id')
            ->paginate($this->perPage);

        return view('livewire.admin.grupo-materials-index', compact('grupo_materials'));
    }

    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '20';
    }
}
