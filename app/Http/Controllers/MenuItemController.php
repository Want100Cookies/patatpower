<?php

namespace App\Http\Controllers;

use App\Forms\MenuItemForm;
use App\MenuItem;
use Bouncer;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilderTrait;

class MenuItemController extends Controller
{
    use FormBuilderTrait;

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('trashed')) {
            $menu = MenuItem::onlyTrashed()->get();
        } else {
            $menu = MenuItem::all();
        }

        return view('menu.index', compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Bouncer::can('edit', MenuItem::class);

        $title = 'Create menu item';
        $form = $this->form(MenuItemForm::class, [
            'method' => 'POST',
            'url' => route('menu-items.store')
        ]);

        return view('menu.form', compact('title', 'form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        Bouncer::can('edit', MenuItem::class);

        $form = $this->form(MenuItemForm::class);
        $form->redirectIfNotValid();

        $menuItem = MenuItem::create($form->getFieldValues());

        return redirect()->route('menu-items.show', $menuItem->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MenuItem  $menuItem
     * @return \Illuminate\Http\Response
     */
    public function show(MenuItem $menuItem)
    {
        return view('menu.show', compact('menuItem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MenuItem  $menuItem
     * @return \Illuminate\Http\Response
     */
    public function edit(MenuItem $menuItem)
    {
        Bouncer::can('edit', MenuItem::class);

        $title = "Edit $menuItem->name";
        $form = $this->form(MenuItemForm::class, [
            'method' => 'PUT',
            'url' => route('menu-items.update', $menuItem->id),
            'model' => $menuItem
        ]);

        return view('menu.form', compact('title', 'form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\MenuItem $menuItem
     *
     * @return \Illuminate\Http\Response
     */
    public function update(MenuItem $menuItem)
    {
        Bouncer::can('edit', MenuItem::class);

        $form = $this->form(MenuItemForm::class, [], [
            'id' => $menuItem->id
        ]);
        $form->redirectIfNotValid();

        $menuItem->update($form->getFieldValues());

        return redirect()->route('menu-items.show', $menuItem->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MenuItem $menuItem
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        Bouncer::can('edit', MenuItem::class);

        $menuItem = MenuItem::withTrashed()
            ->findOrFail($id);

        if ($menuItem->trashed()) {
            $menuItem->restore();
        } else {
            $menuItem->delete();
        }

        $menuItem->save();

        return redirect()->route('menu-items.index');
    }
}
