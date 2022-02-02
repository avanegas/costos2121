<?php

namespace App\Http\Livewire;

use App\Models\Oferta;
use Livewire\{Component, WithPagination};

class OfertasIndex extends Component
{
    use WithPagination;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '15']
    ];

    public $search = '';
    public $sort ='name';
    public $direction = 'asc';    
    public $perPage = '15';

    public function render()
    {
        $searchParams = '%' . $this->search . '%';

        return view('livewire.ofertas-index',[
            'ofertas' => Oferta::where('name', 'LIKE', $searchParams)
                            ->orWhere('unidad', 'LIKE', $searchParams)
                            ->orWhere('descripcion', 'LIKE', $searchParams)
                            ->orderBy($this->sort, $this->direction)
                            ->paginate($this->perPage)                
        ]);
    }

    public function order($sort)
    {
        if ($this->sort == $sort) {
            if($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }

    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '9';
    }
}
