@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>item details</h2>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <button type="button" class="btn btn-outline-primary"
                                onclick="location.href='{{ route('customers.edit', ['customer' => $customer]) }}'"
                                title="Edit">
                            Edit
                        </button>
                        <form action="{{ route('customers.destroy', ['customer' => $customer]) }}" method="post" name="delete">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">Destroy</button>
                        </form>
                    </div>
                    <div class="well">
                        <dl>
                            @foreach($customer->toArray() as $key => $value)
                                <dt>{{ $key }}</dt>
                                <dd>{{ $value }}</dd>
                            @endforeach
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
