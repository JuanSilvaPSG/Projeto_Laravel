@extends('property.master')
@section('content')

<div class="container my-4">

<h1>Formulário de Cadastro :: Imóveis</h1>

<form action="<?= url('/imoveis/store'); ?>" method="post">

    <?= csrf_field(); ?>
    <div class="form-group">
    <label for="title">Título do Imóvel</label>
    <input type="text" name="title" id="title">
    </div>

    <div class="form-group">
    <label for="description">Descrição</label>
    <textarea name="description" id="description" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
    <label for="rental_price">Valor de Locação</label>
    <input type="text" name="rental_price" id="rental_price">
    </div>

    <div class="form-group">
    <label for="sale_price">Valor de Compra</label>
    <input type="text" name="sale_price" id="sale_price">
    </div>

    <button type="submit">Cadastrar Imóvel</button>

</form></div>
@endsection
