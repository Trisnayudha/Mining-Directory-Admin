<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use App\Services\SubCategoryService;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    protected $subCategoryService;
    protected $categoryService;

    public function __construct(SubCategoryService $subCategoryService, CategoryService $categoryService)
    {
        $this->subCategoryService = $subCategoryService;
        $this->categoryService = $categoryService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategories = $this->subCategoryService->getAll();
        return view('backend.master-data.sub-category.index', compact('subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryService->getAll();
        return view('backend.master-data.sub-category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $result = $this->subCategoryService->store($request->all());

        if ($result['status']) {
            return redirect()->route('sub-categories.index')->with('success', $result['message']);
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
        $subCategories = $this->subCategoryService->find($id);
        $categories = $this->categoryService->getAll();
        return view('backend.master-data.sub-category.edit', compact('categories', 'subCategories'));
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
        $result = $this->subCategoryService->update($request->all(), $id);

        if ($result['status']) {
            return redirect()->route('sub-categories.index')->with('success', $result['message']);
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
        $result = $this->subCategoryService->destroy($id);

        if ($result['status']) {
            return redirect()->route('sub-categories.index')->with('success', $result['message']);
        } else {
            return redirect()->back()->with('error', $result['message']);
        }
    }
}
