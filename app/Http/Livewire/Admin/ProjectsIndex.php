<?php

namespace App\Http\Livewire\Admin;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class ProjectsIndex extends Component
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

        $projects = Project::where('name', 'LIKE', $searchParams)
            ->orWhere('contratante', 'LIKE', $searchParams)
            ->orWhere('ubicacion', 'LIKE', $searchParams)
            ->orWhere('oferente', 'LIKE', $searchParams)
            ->paginate($this->perPage);

        return view('livewire.admin.projects-index', compact('projects'));
    }

    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '20';
    }
}
