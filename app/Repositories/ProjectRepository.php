<?php

namespace App\Repositories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;

class ProjectRepository
{
    protected $model;

    public function __construct(Project $model)
    {
        $this->model = $model;
    }

    public function getAll(): Collection
    {
        return $this->model->all();
    }

    public function create(array $data): Project
    {
        return $this->model->create($data);
    }


    public function update(int $projectId, array $data): ?Project
    {
        $project = $this->getById($projectId);
        if ($project) {
            $project->update($data);
            return $project;
        }
        return null;
    }


    public function delete(int $projectId): bool
    {
        $project = $this->getById($projectId);
        if ($project) {
            return $project->delete();
        }
        return false;
    }

    public function getById(int $projectId): ?Project
    {
        return $this->model->find($projectId);
    }


}
