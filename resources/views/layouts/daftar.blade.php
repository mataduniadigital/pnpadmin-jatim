@push('meta')
<!-- Meta Tag -->
@endpush 

@extends('app')
@section('content')
@include('layouts/nav-header')
<section class="section">
    <div class="container">
        <div class="columns">
            <div class="column is-6">
                <form action="{{action('FunctionController@actionPelamarDaftar')}}" method="POST">
                    {{csrf_field()}}
                    <div class="field">
                        <label class="label">NIK</label>
                        <div class="control">
                            <input class="input" type="text" placeholder="Nomor NIK" name="nik" value="{{Request::old('nik')}}" required>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Nama Lengkap</label>
                        <div class="control">
                            <input class="input" type="text" placeholder="nama lengkap" name="nama_lengkap" value="{{Request::old('nama_lengkap')}}" required>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Email</label>
                        <div class="control">
                            <input class="input" type="text" placeholder="email" name="email" value="{{Request::old('email')}}" required>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Password</label>
                        <div class="control">
                            <input class="input" type="password" placeholder="password" name="password" required>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Re-type Password</label>
                        <div class="control">
                            <input class="input" type="password" placeholder="re-type password" name="repassword" required>
                        </div>
                    </div>
                    <div class="field is-grouped">
                        <div class="control">
                            <button class="button is-link">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection 

@push('scripts')
<!-- Js -->
@endpush