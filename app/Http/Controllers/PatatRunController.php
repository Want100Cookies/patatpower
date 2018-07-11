<?php

namespace App\Http\Controllers;

use App\Forms\PatatRunForm;
use App\PatatRun;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilderTrait;

class PatatRunController extends Controller
{
    use FormBuilderTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activePatatRuns = PatatRun::active()->get();
        $pastPatatRuns = PatatRun::inActive()->get();

        return view('patat-runs.index', compact('activePatatRuns', 'pastPatatRuns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create new patat run';
        $form = $this->form(PatatRunForm::class, [
            'method' => 'POST',
            'url' => route('patat-runs.store')
        ]);

        return view('layouts.form', compact('title', 'form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = $this->form(PatatRunForm::class);
        $form->redirectIfNotValid();

        $patatRun = PatatRun::create(
            ['owner_id' => $request->user()->id] + $form->getFieldValues()
        );

        return redirect()->route('patat-runs.show', $patatRun->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PatatRun  $patatRun
     * @return \Illuminate\Http\Response
     */
    public function show(PatatRun $patatRun)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PatatRun  $patatRun
     * @return \Illuminate\Http\Response
     */
    public function edit(PatatRun $patatRun)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PatatRun  $patatRun
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PatatRun $patatRun)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PatatRun  $patatRun
     * @return \Illuminate\Http\Response
     */
    public function destroy(PatatRun $patatRun)
    {
        //
    }
}
