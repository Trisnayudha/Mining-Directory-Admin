<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Services\ProjectTypeService;
use Illuminate\Http\Request;

class ProjectTypeController extends Controller
{
    protected $projectTypeCategories;

    public function __construct(ProjectTypeService $projectTypeCategories)
    {
        $this->projectTypeCategories = $projectTypeCategories;
    }
    public function index()
    {
        $categories = $this->projectTypeCategories->getAll();
        return view('backend.master-data.project-type.index', compact('categories'));
    }

    public function create()
    {
        return view('backend.master-data.project-type.create');
    }

    public function store(Request $request)
    {
        $result = $this->projectTypeCategories->store($request->all());

        if ($result['status']) {
            return redirect()->route('project-types.index')->with('success', $result['message']);
        } else {
            return redirect()->back()->with('error', $result['message']);
        }
    }

    public function edit($id)
    {
        $category = $this->projectTypeCategories->find($id);
        return view('backend.master-data.project-type.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $result = $this->projectTypeCategories->update($request->all(), $id);

        if ($result['status']) {
            return redirect()->route('project-types.index')->with('success', $result['message']);
        } else {
            return redirect()->back()->with('error', $result['message']);
        }
    }

    public function destroy($id)
    {
        $result = $this->projectTypeCategories->destroy($id);

        if ($result['status']) {
            return redirect()->route('project-types.index')->with('success', $result['message']);
        } else {
            return redirect()->back()->with('error', $result['message']);
        }
    }
}
