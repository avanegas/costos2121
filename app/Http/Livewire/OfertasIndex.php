<?php

namespace App\Http\Livewire;

use App\Models\Oferta;
use Livewire\WithPagination;
use Livewire\Component;

class OfertasIndex extends Component
{
    use WithPagination;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '9']
    ];

    public $search = '';
    public $perPage = '9';

    public function render()
    {
        $searchParams = '%' . $this->search . '%';

        return view('livewire.ofertas-index',[
            'ofertas' => Oferta::where('name', 'LIKE', $searchParams)
                            ->orWhere('unidad', 'LIKE', $searchParams)
                            ->orWhere('descripcion', 'LIKE', $searchParams)
                            ->latest()->paginate($this->perPage)               
        ]);
    }
    
    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '9';
    }
}
