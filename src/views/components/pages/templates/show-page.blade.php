@extends('layouts.app')
@section('content')
<div class="container">
<x-AdminLteUiComponents-page-header title="{{ $title }}" routeName="{{ $routeName }}" buttonName="Back" />
<x-AdminLteUiComponents-show-card header="{{ $cardHeader }}" resource="{{ $resource }}" :fields="$fields" :model="$model" />
</div>
@endsection