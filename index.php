<?php

require 'vendor/autoload.php';

use RDuuke\Form\Form;

$data = [
    'name' => 'juan duque', 
    'email' => 'juuanduuke@gmail.com',
    'role' => 2,
    'telephone' => 5555555,
    'genere' => 1,
    'biography' => 'es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las        industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó...', 
    'subscribe' => 0];

$roles = [1 => 'admin', 2 => 'user'];


//Form::setData($data);

Form::open('update.php', 'POST', ['class' => 'form-control', 'id' => 'form'], $data);
echo '<br>';
Form::input('name', ['class' => 'form-control', 'type' => 'text']);
echo '<br>';
Form::input('email', ['class' => 'form-control', 'type' => 'email']);
echo '<br>';
Form::select('role', $roles, ['class' => 'form-control']);
echo '<br>';
Form::input('telephone', ['class' => 'form-control', 'type' => 'number']);
echo '<br>';
Form::radio('genere', 1, 'Male', ['class' => 'form-control']);
echo '<br>';
Form::radio('genere', 2, 'Female', ['class' => 'form-control']);
echo '<br>';
Form::textarea('biography', ['class' => 'form-control', 'style' => 'width:800px;border:red solid 1px;height:200px;']);
echo '<br>';
Form::checkbox('subscribe', 1, 'Subscribe');
echo '<br>';
Form::submit('actualizar');
echo '<br>';
Form::close();