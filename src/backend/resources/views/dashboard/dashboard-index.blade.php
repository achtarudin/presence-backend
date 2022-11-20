@extends('layouts.app', ['titlePage' => 'Dashboard'])

@section('content')
    <div class="collection">
        @foreach ($employees as $employee)
            <a href="#!" class="collection-item"><span class="new badge">1</span>{{$employee->data()['name']}}</a>
        @endforeach

        <a href="#!" class="collection-item"><span class="new badge">4</span>Alan</a>
        <a href="#!" class="collection-item">Alan</a>
        <a href="#!" class="collection-item"><span class="badge">14</span>Alan</a>
    </div>
@endsection
