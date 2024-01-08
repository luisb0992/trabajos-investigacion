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

    public function returnIndex(): Response
    {
        return inertia('InvestigationWorks/Index', [
            'items' => $this->model->getInvestigationWorks(),
        ]);
    }

    public function index(): Response
    {
        return $this->returnIndex();
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
        $this->factory->save($request);

        return inertia('InvestigationWorks/Create');
    }

    public function edit(InvestigationWork $work): Response
    {
        return inertia('InvestigationWorks/Edit', [
            'item' => $work->withAllRelations(),
            'lines' => $this->line->getActiveLines(),
            'areas' => $this->area->getActiveAreas(),
        ]);
    }

    public function update(CreateInvestigationWorkRequest $request, InvestigationWork $work): Response
    {
        $this->factory->update($request->validated(), $work);

        return $this->returnIndex();
    }

    public function destroy(InvestigationWork $work): RedirectResponse
    {
        $this->factory->destroy($work);
        $this->factory->deleteFile($work);

        return to_route('investigation-works.index');
    }

    public function downloadFile(InvestigationWork $work): Response
    {
        return inertia('InvestigationWorks/DownloadFile', [
            'work' => $work->withAllRelations(),
        ]);
    }
}
