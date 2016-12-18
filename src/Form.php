<?php
namespace RDuuke\Form;


class Form
{

    public static function __callStatic($name, $argument)
    {
        $form_builder = \RDuuke\Form\Builder\FormBuilder::class;
        return call_user_func_array([$form_builder, $name], $argument);
    }

}