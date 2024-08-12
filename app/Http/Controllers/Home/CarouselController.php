<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Services\CarouselService;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    protected $carouselService;

    public function __construct(CarouselService $carouselService)
    {
        $this->carouselService = $carouselService;
    }

    public function index()
    {
        $carousel = $this->carouselService->getAll();
        return view('backend.home-preference.carousel.index', compact('carousel'));
    }

    public function create()
    {
        return view('backend.home-preference.carousel.create');
    }

    public function store(Request $request)
    {
        $result = $this->carouselService->store($request->all());

        if ($result['status']) {
            return redirect()->route('carousels.index')->with('success', $result['message']);
        } else {
            return redirect()->back()->with('error', $result['message']);
        }
    }

    public function edit($id)
    {
        $carousel = $this->carouselService->find($id);
        return view('backend.home-preference.carousel.edit', compact('carousel'));
    }

    public function update(Request $request, $id)
    {
        $result = $this->carouselService->update($request->all(), $id);

        if ($result['status']) {
            return redirect()->route('carousels.index')->with('success', $result['message']);
        } else {
            return redirect()->back()->with('error', $result['message']);
        }
    }

    public function destroy($id)
    {
        $result = $this->carouselService->destroy($id);

        if ($result['status']) {
            return redirect()->route('carousels.index')->with('success', $result['message']);
        } else {
            return redirect()->back()->with('error', $result['message']);
        }
    }
}
