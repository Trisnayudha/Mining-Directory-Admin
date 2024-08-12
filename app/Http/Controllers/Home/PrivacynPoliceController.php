<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Services\PrivacyTermService;
use Illuminate\Http\Request;

class PrivacynPoliceController extends Controller
{
    protected $privacyTermService;

    public function __construct(PrivacyTermService $privacyTermService)
    {
        $this->privacyTermService = $privacyTermService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $privacy = $this->privacyTermService->findPrivacy();
        $term = $this->privacyTermService->findTerm();
        return view('backend.home-preference.privacy-term.index', compact('privacy', 'term'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        $result = $this->privacyTermService->update($request->all(), $id);

        if ($result['status']) {
            return redirect()->route('privacy-policies.index')->with('success', $result['message']);
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
        //
    }
}
