<?php

namespace App\Http\Livewire\Admin;

use App\Models\Material;
use Livewire\Component;
use Livewire\WithPagination;

class MaterialsIndex extends Component
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

        $materials =  Material::where('name', 'LIKE', $searchParams)
            ->orwhere('unidad', 'LIKE', $searchParams)
            ->latest('id')
            ->paginate($this->perPage);
        return view('livewire.admin.materials-index', compact('materials'));
    }

    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '20';
    }
}
