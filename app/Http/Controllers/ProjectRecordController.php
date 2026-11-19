<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRecordRequest;
use App\Models\ProjectRecord;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProjectRecordController extends Controller
{
    public function home(): View
    {
        return view('home', ['records' => ProjectRecord::orderBy('id')->get()]);
    }

    public function dashboard(): View
    {
        return view('dashboard', ['records' => ProjectRecord::orderBy('id')->get()]);
    }

    public function show(ProjectRecord $record): View
    {
        return view('records.show', compact('record'));
    }

    public function create(): View
    {
        return view('records.form', ['record' => new ProjectRecord]);
    }

    public function store(ProjectRecordRequest $request): RedirectResponse
    {
        ProjectRecord::create($request->validated());

        return to_route('dashboard')->with('status', 'Registro criado com sucesso.');
    }

    public function edit(ProjectRecord $record): View
    {
        return view('records.form', compact('record'));
    }

    public function update(ProjectRecordRequest $request, ProjectRecord $record): RedirectResponse
    {
        $record->update($request->validated());

        return to_route('dashboard')->with('status', 'Registro atualizado com sucesso.');
    }

    public function destroy(ProjectRecord $record): RedirectResponse
    {
        $record->delete();

        return to_route('dashboard')->with('status', 'Registro excluído com sucesso.');
    }
}
