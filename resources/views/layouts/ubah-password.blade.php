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
                <form action="{{action('FunctionController@actionUbahPassword')}}" method="POST">
                    {{csrf_field()}}
                    <div class="field">
                        <label class="label">Password lama</label>
                        <div class="control">
                            <input class="input" type="password" placeholder="password" name="old_password">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Password</label>
                        <div class="control">
                            <input class="input" type="password" placeholder="password" name="new_password">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Re-type Password</label>
                        <div class="control">
                            <input class="input" type="password" placeholder="re-type password" name="new_repassword">
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