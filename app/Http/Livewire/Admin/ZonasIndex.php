<?php

namespace App\Http\Livewire\Admin;

use App\Models\Zona;
use Livewire\Component;
use Livewire\WithPagination;

class ZonasIndex extends Component
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

        $zonas =  Zona::where('name', 'LIKE', $searchParams)
                    ->latest('id')
                    ->paginate($this->perPage);

        return view('livewire.admin.zonas-index', compact('zonas'));
    }

    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '20';
    }
}
