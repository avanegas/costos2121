<?php

namespace App\Http\Livewire;

use App\Models\Material;
use Livewire\WithPagination;
use Livewire\Component;

class MaterialsIndex extends Component
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

        return view('livewire.materials-index', [
            'materials' => Material::where('name','LIKE', $searchParams)
                                ->orWhere('unidad','LIKE',$searchParams)
                                ->with(['grupo_material'])->latest()->paginate($this->perPage)            
        ]);
    }

    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '10';
    }
}
