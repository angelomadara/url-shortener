<?php

namespace App\Http\Controllers;

use App\Jobs\SaveUrl;
use App\Models\CollectedUrl;
use App\Services\CollectUrlService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GatheredUrlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, CollectUrlService $collectUrlService)
    {
        try {
            $data = $request->only(['url', 'email']);

            $isValid = Validator::make($data, [
                'url' => 'required|url:http,https',
                'email' => 'nullable|email'
            ]);

            if ($isValid->fails()) {
                return redirect('/')->withErrors($isValid)->withInput();
            }

            // $collectUrlService->store($data);
            SaveUrl::dispatch($data);
            return redirect('/')->with('success', 'The URL is sent to your email');
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CollectedUrl $collected_url)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CollectedUrl $collected_url)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CollectedUrl $collected_url)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CollectedUrl $collected_url)
    {
        //
    }
}
