<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Services\CompanyAddressService;
use Illuminate\Http\Request;

class CompanyAddressController extends Controller
{

    protected $companyAddressService;

    public function __construct(CompanyAddressService $companyAddressService)
    {
        $this->companyAddressService = $companyAddressService;
    }

    public function index($slug)
    {
        $data = $this->companyAddressService->getAll($slug);
        return view('backend.company.company-address.index', compact('data', 'slug'));
    }

    public function create($slug)
    {
        return view('backend.company.company-address.create', compact('slug'));
    }

    public function store(Request $request)
    {
        $result = $this->companyAddressService->store($request->all());

        if ($result['status']) {
            return redirect()->route('companies-address.index', $request->slug)->with('success', $result['message']);
        } else {
            return redirect()->back()->with('error', $result['message']);
        }
    }

    public function edit($id)
    {
        $data = $this->companyAddressService->find($id);
        return view('backend.company.company-address.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $result = $this->companyAddressService->update($request->all(), $id);

        if ($result['status']) {
            return redirect()->route('companies-address.index', $request->slug)->with('success', $result['message']);
        } else {
            return redirect()->back()->with('error', $result['message']);
        }
    }

    public function destroy($id)
    {
        $result = $this->companyAddressService->destroy($id);

        if ($result['status']) {
            return redirect()->back()->with('success', $result['message']);
        } else {
            return redirect()->back()->with('error', $result['message']);
        }
    }
}
