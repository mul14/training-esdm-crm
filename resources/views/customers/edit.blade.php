@extends('layouts.master')

@section('content')
    <div class="container">
        <form action="/customers/{{ $customer->id }}" method="post">
            @csrf
            @method('put')

            <div class="form-group">
                Nama Customer
                <input type="text" name="name" class="form-control" value="{{ $customer->name }}">
            </div>

            <div class="row">

                <fieldset class="col-4">
                    <legend>Email</legend>
                    <div class="form-group">
                        Email #1
                        <input type="text" name="email[]" value="@if (isset($customer->emails[0])) {{ $customer->emails[0]->email }} @endif" class="form-control">
                    </div>
                    <div class="form-group">
                        Email #2
                        <input type="text" name="email[]" value="@if (isset($customer->emails[1])) {{ $customer->emails[1]->email }} @endif" class="form-control">
                    </div>
                    <div class="form-group">
                        Email #3
                        <input type="text" name="email[]" value="@if (isset($customer->emails[2])) {{ $customer->emails[2]->email }} @endif" class="form-control">
                    </div>
                </fieldset>

                <fieldset class="col-4">
                    <legend>Telepon</legend>
                    <div class="form-group">
                        Telepon #1
                        <input type="text" name="phone[]" value="@if (isset($customer->phones[0])) {{ $customer->phones[0]->number }} @endif" class="form-control">
                    </div>
                    <div class="form-group">
                        Telepon #2
                        <input type="text" name="phone[]" value="@if (isset($customer->phones[1])) {{ $customer->phones[1]->number }} @endif" class="form-control">
                    </div>
                    <div class="form-group">
                        Telepon #3
                        <input type="text" name="phone[]" value="@if (isset($customer->phones[2])) {{ $customer->phones[2]->number }} @endif" class="form-control">
                    </div>
                </fieldset>

                <fieldset class="col-4">
                    <legend>Perusahaan</legend>
                    <div class="form-group">
                        Perusahaan #1
                        <input type="text" name="company[]" value="@if (isset($customer->companies[0])) {{ $customer->companies[0]->company }} @endif" class="form-control">
                    </div>
                    <div class="form-group">
                        Perusahaan #2
                        <input type="text" name="company[]" value="@if (isset($customer->companies[1])) {{ $customer->companies[1]->company }} @endif" class="form-control">
                    </div>
                    <div class="form-group">
                        Perusahaan #3
                        <input type="text" name="company[]" value="@if (isset($customer->companies[2])) {{ $customer->companies[2]->company }} @endif" class="form-control">
                    </div>
                </fieldset>

            </div>

            <div class="form-group">
                <button class="btn btn-primary">Simpan</button>
            </div>

        </form>
    </div>
@endsection
