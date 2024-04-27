<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Services\CompanyService;
use App\Services\PersonService;
use App\Services\ProjectService;

class ProjectController extends Controller
{
    protected $projectService;
    protected $companyService;
    protected $personService;

    public function __construct(
        ProjectService $projectService,
        CompanyService $companyService,
        PersonService $personService
    ) {
        $this->projectService = $projectService;
        $this->companyService = $companyService;
        $this->personService = $personService;
    }

    public function index()
    {
        $projects = $this->projectService->getAllProjects();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        $companies = $this->companyService->getAllCompanies();
        $persons = $this->personService->getAllPersons(); 
        return view('projects.create', compact('companies', 'persons'));
    
    }
    public function store(ProjectRequest $request)
    {
        $this->projectService->createProject($request->validated());
        return redirect()->route('projects.index');
    }

    public function show($id)
    {
        $project = $this->projectService->getProjectById($id);
        return view('projects.show', compact('project'));
    }

    public function edit($id)
    {
        $project = $this->projectService->getProjectById($id);
        $companies = $this->companyService->getAllCompanies();
        $persons = $this->personService->getAllPersons();
        return view('projects.edit', compact('project', 'companies', 'persons'));
    }

    public function update(ProjectRequest $request, $id)
    {
        $this->projectService->updateProject($id, $request->validated());
        return redirect()->route('projects.index');
    }

    public function destroy($id)
    {
        $this->projectService->deleteProject($id);
        return redirect()->route('projects.index');
    }
}
