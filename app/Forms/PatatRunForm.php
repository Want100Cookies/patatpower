<?php

namespace App\Forms;

use Carbon\Carbon;
use Kris\LaravelFormBuilder\Form;

class PatatRunForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('deadline', 'text', [
                'label' => 'Deadline (format: ' . Carbon::now()->format('Y-m-d H:i') . ')',
                'rules' => 'required|date_format:Y-m-d H:i',
                'template' => 'layouts.datetime-input'
            ])
            ->add('submit', 'submit', [
                'label' => 'Save',
            ]);
    }
}
