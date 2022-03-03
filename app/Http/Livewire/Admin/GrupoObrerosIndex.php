<?php

namespace App\Http\Livewire\Admin;

use App\Models\GrupoObrero;
use Livewire\Component;
use Livewire\WithPagination;

class GrupoObrerosIndex extends Component
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

        $grupo_obreros =  GrupoObrero::where('name', 'LIKE', $searchParams)
            ->orwhere('description', 'LIKE', $searchParams)
            ->latest('id')
            ->paginate($this->perPage);

        return view('livewire.admin.grupo-obreros-index', compact('grupo_obreros'));
    }

    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '20';
    }
}
