@extends('layouts.app')
@section('content')
    <div class="w-100 h-100 d-flex flex-column justify-content-center align-items-center">
        <h1 class="display-4">Vue Js Todo APP</h1>
{{--        <crud-component></crud-component>--}}
        <app-component></app-component>

{{--        <div id="app">--}}
{{--            <Crud></Crud>--}}
{{--        </div>--}}
    </div>
@endsection
