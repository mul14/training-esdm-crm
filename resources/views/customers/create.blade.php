@extends('layouts.master')

@section('content')
    <div class="container">
        <form action="/customers" method="post">
            @csrf

            <div class="form-group">
                Nama Customer
                <input type="text" name="name" value="" class="form-control">
            </div>

            <div class="row">

                <fieldset class="col-4">
                    <legend>Email</legend>
                    <div class="form-group">
                        Email #1
                        <input type="text" name="email[]" value="" class="form-control">
                    </div>
                    <div class="form-group">
                        Email #2
                        <input type="text" name="email[]" value="" class="form-control">
                    </div>
                    <div class="form-group">
                        Email #3
                        <input type="text" name="email[]" value="" class="form-control">
                    </div>
                </fieldset>

                <fieldset class="col-4">
                    <legend>Telepon</legend>
                    <div class="form-group">
                        Telepon #1
                        <input type="text" name="phone[]" value="" class="form-control">
                    </div>
                    <div class="form-group">
                        Telepon #2
                        <input type="text" name="phone[]" value="" class="form-control">
                    </div>
                    <div class="form-group">
                        Telepon #3
                        <input type="text" name="phone[]" value="" class="form-control">
                    </div>
                </fieldset>

                <fieldset class="col-4">
                    <legend>Perusahaan</legend>
                    <div class="form-group">
                        Perusahaan #1
                        <input type="text" name="company[]" value="" class="form-control">
                    </div>
                    <div class="form-group">
                        Perusahaan #2
                        <input type="text" name="company[]" value="" class="form-control">
                    </div>
                    <div class="form-group">
                        Perusahaan #3
                        <input type="text" name="company[]" value="" class="form-control">
                    </div>
                </fieldset>

            </div>

            <div class="form-group">
                <button class="btn btn-primary">Simpan</button>
            </div>

        </form>
    </div>
@endsection
