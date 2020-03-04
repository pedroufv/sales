@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Create new item</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('customers.update', ['customer' => $customer]) }}" method="post" name="edit">
                        @method('patch')
                        @csrf
                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="published_at" class="control-label">@lang('customers.first_name')</label>
                            <input id="published_at"
                                   type="text"
                                   class="form-control"
                                   name="first_name"
                                   value="{{ $customer->first_name ?? old('first_name') ?? '' }}"
                                   autofocus>
                            @if ($errors->has('first_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label for="published_at" class="control-label">@lang('customers.last_name')</label>
                            <input id="published_at"
                                   type="text"
                                   class="form-control"
                                   name="last_name"
                                   value="{{ $customer->last_name ?? old('last_name') ?? '' }}"
                                   autofocus>
                            @if ($errors->has('last_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('last_name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('cpf') ? ' has-error' : '' }}">
                            <label for="published_at" class="control-label">@lang('customers.cpf')</label>
                            <input id="published_at"
                                   type="text"
                                   class="form-control"
                                   name="cpf"
                                   value="{{ $customer->cpf ?? old('cpf') ?? '' }}"
                                   autofocus>
                            @if ($errors->has('cpf'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('cpf') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="published_at" class="control-label">@lang('customers.email')</label>
                            <input id="published_at"
                                   type="text"
                                   class="form-control"
                                   name="email"
                                   value="{{ $customer->email ?? old('email') ?? '' }}"
                                   autofocus>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('birth_at') ? ' has-error' : '' }}">
                            <label for="published_at" class="control-label">@lang('customers.birth_at')</label>
                            <input id="published_at"
                                   type="text"
                                   class="form-control"
                                   name="birth_at"
                                   value="{{ $customer->birth_at ?? old('birth_at') ?? '' }}"
                                   autofocus>
                            @if ($errors->has('birth_at'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('birth_at') }}</strong>
                                </span>
                            @endif
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="button"
                                    class="btn btn-outline-dark"
                                    onclick="location.href='{{ route('customers.show', ['customer' => $customer]) }}'">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
