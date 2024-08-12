<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use App\Services\PopularCategoryService;
use Illuminate\Http\Request;

class PopularCategoryController extends Controller
{
    protected $popularCategoryService;
    protected $categoryService;

    public function __construct(PopularCategoryService $popularCategoryService, CategoryService $categoryService)
    {
        $this->popularCategoryService = $popularCategoryService;
        $this->categoryService = $categoryService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $popularCategories = $this->popularCategoryService->getAll();

        return view('backend.master-data.popular-category.index', compact('popularCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryService->getAll();
        return view('backend.master-data.popular-category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = $this->popularCategoryService->store($request->all());

        if ($result['status']) {
            return redirect()->route('popular-categories.index')->with('success', $result['message']);
        } else {
            return redirect()->back()->with('error', $result['message']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $popularCategories = $this->popularCategoryService->find($id);
        $categories = $this->categoryService->getAll();
        return view('backend.master-data.popular-category.edit', compact('popularCategories', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $result = $this->popularCategoryService->update($request->all(), $id);

        if ($result['status']) {
            return redirect()->route('popular-categories.index')->with('success', $result['message']);
        } else {
            return redirect()->back()->with('error', $result['message']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->popularCategoryService->destroy($id);

        if ($result['status']) {
            return redirect()->route('popular-categories.index')->with('success', $result['message']);
        } else {
            return redirect()->back()->with('error', $result['message']);
        }
    }
}
