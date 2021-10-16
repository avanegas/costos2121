<?php

namespace App\Http\Livewire;

use App\Models\Transporte;
use Livewire\WithPagination;
use Livewire\Component;

class TransportesIndex extends Component
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

        return view('livewire.transportes-index', [
            'transportes' => Transporte::where('name','LIKE', $searchParams)
                                ->orWhere('unidad','LIKE',$searchParams)
                                ->with(['zona'])->latest()->paginate($this->perPage)            
        ]);
    }

    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '10';
    }    
}
