<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class MenuItemForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text', [
                'label' => 'Menu item name',
                'rules' => 'required|unique:menu_items,name',
            ])
            ->add('price', 'text', [
                'label' => 'Menu item price',
                'rules' => 'required|regex:/^\d*(\.\d{1,2})?$/'
            ])
            ->add('submit', 'submit', [
                'label' => 'Save',
            ]);
    }
}
