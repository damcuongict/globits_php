<?php

namespace App\Services;

use App\Models\Project;
use App\Repositories\ProjectRepository;

class ProjectService
{
    protected $projectRepository;

    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function getAllProjects()
    {
        return $this->projectRepository->getAll();
    }

    public function createProject(array $data)
    {

        return $this->projectRepository->create($data);
    }

    public function updateProject($projectId, array $data)
    {

        return $this->projectRepository->update($projectId, $data);
    }

    public function deleteProject($projectId)
    {

        return $this->projectRepository->delete($projectId);
    }

    public function getProjectById($projectId)
    {
        return $this->projectRepository->getById($projectId);
    }


}

