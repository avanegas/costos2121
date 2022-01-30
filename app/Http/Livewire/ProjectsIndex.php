<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Livewire\{Component, WithPagination};

class ProjectsIndex extends Component
{
    use WithPagination;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '20']
    ];

    public $search = '';
    public $sort ='name';
    public $direction = 'desc';
    public $perPage = '20';

    public function render()
    {
        $searchParams = '%' . $this->search . '%';        

        return view('livewire.projects-index', [
            'proyectos' => Project::where('name', 'LIKE', $searchParams)
                                ->orWhere('contratante', 'LIKE', $searchParams)
                                ->orWhere('ubicacion', 'LIKE', $searchParams)
                                ->orWhere('oferente', 'LIKE', $searchParams)
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
        $this->perPage = '20';
    }    
}
