@extends('layouts.main')

@section('menu')
    @include('layouts.menuCustomers')
    @include('layouts.menuSystem')
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Alterar dados Cliente</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('customers.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('customers.update',$customer->id) }}" method="POST">
        @csrf
        @method('PUT')

<div class="container">
  <form>
  <div class="row">
     <div class="form-group col-md-4">
      <label>Empresa</label>
      <input type="text" name="name" value="{{ $customer->name }}" class="form-control" placeholder="Name">
    </div>
    <div class="form-group col-md-4">
      <label>Nº Cliente</label>
      <input type="text" name="num_client" value="{{ $customer->num_client }}" class="form-control" placeholder="Nº Cliente">
    </div>
    <div class="form-group col-md-4">
      <label>NIF</label>
      <input type="text" name="nif" value="{{ $customer->nif }}" class="form-control" placeholder="NIF">
    </div>
    <div class="form-group col-md-6">
      <label>Morada</label>
      <input type="text" name="address" value="{{ $customer->morada }}" class="form-control" placeholder="Morada">
    </div>
    <div class="form-group col-md-4">
      <label>Localidade</label>
      <input type="text" name="local" value="{{ $customer->localidade }}" class="form-control" placeholder="Localidade">
    </div>
    <div class="form-group col-md-2">
      <label>Cód. Postal</label>
      <input type="text" name="cod_postal" value="{{ $customer->codpostal }}" class="form-control" placeholder="Cód. Postal">
    </div>
    <div class="form-group col-md-4">
      <label>Telefone</label>
      <input type="text" name="telef" value="{{ $customer->telef }}" class="form-control" placeholder="Telefone">
    </div>
    <div class="form-group col-md-4">
      <label>Telefone 2</label>
      <input type="text" name="telef2" value="{{ $customer->telef2 }}" class="form-control" placeholder="Telefone 2">
    </div>
    <div class="form-group col-md-4">
      <label>Fax</label>
      <input type="text" name="fax" value="{{ $customer->fax }}" class="form-control" placeholder="Fax">
    </div>
    <div class="col-md-12">
        <div class="form-group">
          <label>Responsável</label>
          <input type="text" name="responsavel" value="{{ $customer->responsavel }}" class="form-control" placeholder="Responsável">
        </div>
    </div>
    <div class="form-group col-md-6">
      <label>Email</label>
      <input type="text" name="email" value="{{ $customer->email }}" class="form-control" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label>Telefone</label>
      <input type="text" name="telef3" value="{{ $customer->telef3 }}" class="form-control" placeholder="Telefone">
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
</form>
</div>

    </form>


@endsection