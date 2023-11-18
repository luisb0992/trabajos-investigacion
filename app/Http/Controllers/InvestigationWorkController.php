<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInvestigationWorkRequest;
use App\Http\Services\InvestigationWork\Factory;
use App\Models\Area;
use App\Models\InvestigationWork;
use App\Models\Line;
use Illuminate\Http\RedirectResponse;
use Inertia\Response;

class InvestigationWorkController extends Controller
{
    public function __construct(
        private Area $area,
        private Line $line,
        private Factory $factory,
        private InvestigationWork $model,
    ) {
    }

    public function index(): Response
    {
        return inertia('InvestigationWorks/Index', [
            'items' => $this->model->getInvestigationWorks(),
        ]);
    }

    public function create(): Response
    {
        return inertia('InvestigationWorks/Create', [
            'lines' => $this->line->getActiveLines(),
            'areas' => $this->area->getActiveAreas(),
        ]);
    }

    public function store(CreateInvestigationWorkRequest $request): Response
    {
        $this->factory->save($request->validated());

        return inertia('InvestigationWorks/Create');
    }

    public function edit(InvestigationWork $work): Response
    {
        return inertia('InvestigationWorks/Edit', [
            'work' => $work->load('authors'),
            'lines' => $this->line->getActiveLines(),
            'areas' => $this->area->getActiveAreas(),
        ]);
    }

    public function destroy(InvestigationWork $work): RedirectResponse
    {
        $this->factory->destroy($work);
        $this->factory->deleteFile($work);

        return to_route('investigation-works.index');
    }
}
