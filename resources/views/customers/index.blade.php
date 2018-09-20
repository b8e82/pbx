@extends('layouts.main')

@section('menu')
    @include('layouts.menuCustomers')
    @include('layouts.menuSystem')
@endsection

@section('content')

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Clientes</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('customers.index') }}"> Back</a>
            </div>
        </div>
    </div>

 @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
 @endif

<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Nº Cliente</th>
                <th>NIF</th>
                <th>Morada</th>
                <th>Localidade</th>
                <th>Cód. Postal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                @can('view_customer', $customer) 
                    <tr>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->num_client }}</td>
                        <td>{{ $customer->nif }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>{{ $customer->local }}</td>
                        <td>{{ $customer->cod_postal }}</td>
                        <td>
                            <form action="{{ route('customers.destroy',$customer->id) }}" method="POST">
                                <!--a class="btn btn-default" href="{{ route('extensions.index',$customer->id) }}">Gerir</a-->
                                <a class="btn btn-default" href="{{ url("extensions/$customer->id") }}">Gerir</a>
                                <a class="btn btn-info" href="{{ route('customers.show',$customer->id) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('customers.edit',$customer->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endcan
            @endforeach
        </tbody>
    </table>
</div>

@endsection