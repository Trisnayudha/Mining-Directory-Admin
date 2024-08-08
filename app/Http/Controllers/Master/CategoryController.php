<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = $this->categoryService->getAll();
        return view('backend.master-data.category.index', compact('categories'));
    }

    public function create()
    {
        return view('backend.master-data.category.create');
    }

    public function store(Request $request)
    {
        $result = $this->categoryService->store($request->all());

        if ($result['status']) {
            return redirect()->route('categories.index')->with('success', $result['message']);
        } else {
            return redirect()->back()->with('error', $result['message']);
        }
    }

    public function edit($id)
    {
        $category = $this->categoryService->find($id);
        return view('backend.master-data.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $result = $this->categoryService->update($request->all(), $id);

        if ($result['status']) {
            return redirect()->route('categories.index')->with('success', $result['message']);
        } else {
            return redirect()->back()->with('error', $result['message']);
        }
    }

    public function destroy($id)
    {
        $result = $this->categoryService->destroy($id);

        if ($result['status']) {
            return redirect()->route('categories.index')->with('success', $result['message']);
        } else {
            return redirect()->back()->with('error', $result['message']);
        }
    }
}
