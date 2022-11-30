@extends('layouts.backend')
@section('content')
    <x-layouts.backend.hero title="<i class='fas fa-users'></i> Users">
        <x-layouts.backend.breadcrumb title="Debtor" :url="route('home.index')"/>
        <x-layouts.backend.breadcrumb title="User" :is-active="true"/>
    </x-layouts.backend.hero>
@endsection
