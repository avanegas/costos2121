<?php

namespace App\Http\Livewire;

use App\Models\Equipo;
use Livewire\WithPagination;
use Livewire\Component;

class EquiposIndex extends Component
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
                
        return view('livewire.equipos-index', [
                    'equipos' => Equipo::where('name','LIKE', $searchParams)
                                    ->orWhere('marca','LIKE',$searchParams)
                                    ->with(['grupo_equipo'])->latest()->paginate($this->perPage)            
        ]);
    }
 
    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '10';
    }   
}
