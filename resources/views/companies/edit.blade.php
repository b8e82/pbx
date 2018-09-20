@extends('layouts.main')

@section('menu')
    @include('layouts.menuCustomers')
    @include('layouts.menuSystem')
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Alterar Empresa</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('companies.index') }}"> Back</a>
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


    <form action="{{ route('companies.update',$company->id) }}" method="POST">
        @csrf
        @method('PUT')

<div class="container">
  <form>
  <div class="row">
     <div class="form-group col-md-4">
      <label for="inputCity">Empresa</label>
      <input type="text" name="name" value="{{ $company->name }}" class="form-control" placeholder="Name">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Nº Cliente</label>
      <input type="text" name="num_client" value="{{ $company->nclient }}" class="form-control" placeholder="Nº Cliente">
    </div>
    <div class="form-group col-md-4">
      <label for="inputZip">NIF</label>
      <input type="text" name="nif" value="{{ $company->nif }}" class="form-control" placeholder="NIF">
    </div>
    <div class="form-group col-md-6">
      <label for="inputCity">Morada</label>
      <input type="text" name="address" value="{{ $company->morada }}" class="form-control" placeholder="Morada">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Localidade</label>
      <input type="text" name="local" value="{{ $company->localidade }}" class="form-control" placeholder="Localidade">
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Cód. Postal</label>
      <input type="text" name="cod_postal" value="{{ $company->codpostal }}" class="form-control" placeholder="Cód. Postal">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Telefone</label>
      <input type="text" name="telef" value="{{ $company->telef }}" class="form-control" placeholder="Telefone">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Telefone 2</label>
      <input type="text" name="telef2" value="{{ $company->telef2 }}" class="form-control" placeholder="Telefone 2">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Fax</label>
      <input type="text" name="fax" value="{{ $company->fax }}" class="form-control" placeholder="Fax">
    </div>
    <div class="col-md-12">
        <div class="form-group">
          <label>Responsável</label>
          <input type="text" name="responsavel" value="{{ $company->responsavel }}" class="form-control" placeholder="Responsável">
        </div>
    </div>
    <div class="form-group col-md-6">
      <label for="inputCity">Email</label>
      <input type="text" name="email" value="{{ $company->email }}" class="form-control" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputCity">Telefone</label>
      <input type="text" name="telef3" value="{{ $company->telef3 }}" class="form-control" placeholder="Telefone">
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
</form>
</div>

    </form>


@endsection