@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('customers.create') }}" class="btn btn-sm btn-primary">New</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="categories-table">
                            <thead>
                                <tr>
                                    @foreach(Schema::getColumnListing('customers') as $column)
                                        <th>{{ $column }}</th>
                                    @endforeach
                                        <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($customers as $customer)

                                    <tr>

                                        @foreach(Schema::getColumnListing('customers') as $column)
                                            <td>{{ $customer->$column }}</td>
                                        @endforeach
                                            <td>
                                                <a class="btn btn-dark" href="{{ route('customers.show', ['customer' => $customer]) }}">
                                                    Show
                                                </a>
                                            </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
