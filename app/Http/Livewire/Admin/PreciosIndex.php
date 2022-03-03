<?php

namespace App\Http\Livewire\Admin;

use App\Models\Precio;
use Livewire\{Component, WithPagination};

class PreciosIndex extends Component
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

        $precios = Precio::where('name', 'LIKE', $searchParams)
                        ->orWhere('unidad', 'LIKE', $searchParams)
                        ->orWhere('detalle', 'LIKE', $searchParams)
                        ->paginate($this->perPage);

        return view('livewire.admin.precios-index', compact('precios'));
    }

    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '20';
    }
}
