<?php

namespace App\Http\Livewire;

use App\Models\Precio;
use Livewire\WithPagination;
use Livewire\Component;

class PreciosIndex extends Component
{
    use WithPagination;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '10']
        ];

    public $search = '';
    public $perPage = '10';

    public function render()
    {
        $searchParams = '%'.$this->search.'%';

        return view('livewire.precios-index', [
                    'precios' => Precio::where('name','LIKE', $searchParams)
                        ->orWhere('unidad','LIKE',$searchParams)
                        ->orWhere('detalle','LIKE',$searchParams)
                        ->with(['grupo_precio'])->latest()->paginate($this->perPage)            
        ]);
    }

    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '10';
    }    
}
