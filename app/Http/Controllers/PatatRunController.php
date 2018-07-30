<?php

namespace App\Http\Controllers;

use App\Forms\PatatRunForm;
use App\PatatRun;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilderTrait;
use Carbon\Carbon;
use Bouncer;

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
        Bouncer::can('create', PatatRun::class);

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
        Bouncer::can('create', PatatRun::class);

        $form = $this->form(PatatRunForm::class);
        $form->redirectIfNotValid();

        $deadline = Carbon::createFromFormat('Y-m-d H:i', $form->getFieldValues()['deadline']);
        $owner_id = $request->user()->id;


        $patatRun = PatatRun::create(compact('deadline', 'owner_id'));

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
        return view('patat-runs.show', compact('patatRun'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PatatRun  $patatRun
     * @return \Illuminate\Http\Response
     */
    public function edit(PatatRun $patatRun)
    {
        Bouncer::can('edit', $patatRun);

        $title = "Edit patat run";
        $form = $this->form(PatatRunForm::class, [
            'method' => 'PUT',
            'url' => route('patat-runs.update', $patatRun->id),
            'model' => $patatRun
        ]);

        return view('layouts.form', compact('title', 'form'));
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
        Bouncer::can('edit', $patatRun);

        $form = $this->form(PatatRunForm::class, [], [
            'id' => $patatRun->id
        ]);
        $form->redirectIfNotValid();

        $patatRun->update($form->getFieldValues());

        return redirect()->route('patat-runs.show', $patatRun->id);
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
