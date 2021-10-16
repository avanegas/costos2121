<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Livewire\WithPagination;
use Livewire\Component;

class ProjectsIndex extends Component
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
        $searchParams = '%' . $this->search . '%';        

        return view('livewire.projects-index', [
            'proyectos' => Project::where('name', 'LIKE', $searchParams)
                                ->orWhere('contratante', 'LIKE', $searchParams)
                                ->orWhere('ubicacion', 'LIKE', $searchParams)
                                ->orWhere('oferente', 'LIKE', $searchParams)
                                ->latest()->paginate($this->perPage)            
        ]);
    }

    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '10';
    }    
}
