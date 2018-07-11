<?php

namespace App\Forms;

use Illuminate\Validation\Rule;
use Kris\LaravelFormBuilder\Form;

class MenuItemForm extends Form
{
    public function buildForm()
    {
        $uniqueRule = Rule::unique('menu_items', 'name');

        if (!is_null($this->getData('id'))) {
            $uniqueRule = $uniqueRule->ignore($this->getData('id'));
        }

        $this
            ->add('name', 'text', [
                'label' => 'Name',
                'rules' => [
                    'required',
                    $uniqueRule
                ]
            ])
            ->add('price', 'text', [
                'label' => 'Price',
                'rules' => 'required|regex:/^\d*(\.\d{1,2})?$/'
            ])
            ->add('submit', 'submit', [
                'label' => 'Save',
            ]);
    }
}
