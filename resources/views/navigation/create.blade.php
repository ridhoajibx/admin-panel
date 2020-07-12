@extends('layouts.back')

@section('content')
    <div class="card">
        <div class="card-header">Create new Navigation</div>

        <div class="card-body">
            <form action=" {{ route('navigation.create') }} " method="post">
                @include('navigation.partials.form')
            </form>
        </div>
    </div>
@endsection