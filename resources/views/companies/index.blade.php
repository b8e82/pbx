@extends('layouts.main')

@section('menu')
    @include('layouts.menuCustomers')
    @include('layouts.menuSystem')
@endsection

@section('content')
@can('administrator')
 @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
 @endif

<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Empresa</th>
                <th>Nº Cliente</th>
                <th>NIF</th>
                <th>Morada</th>
                <th>Localidade</th>
                <th>Cód. Postal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $company)
        <tr>
            <td>{{ $company->name }}</td>
            <td>{{ $company->num_client }}</td>
            <td>{{ $company->nif }}</td>
            <td>{{ $company->address }}</td>
            <td>{{ $company->local }}</td>
            <td>{{ $company->cod_postal }}</td>
            <td>
                <form action="{{ route('companies.destroy',$company->id) }}" method="POST">


                    <a class="btn btn-info" href="{{ route('companies.show',$company->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('companies.edit',$company->id) }}">Edit</a>


                    @csrf
                    @method('DELETE')

   
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection
@endcan