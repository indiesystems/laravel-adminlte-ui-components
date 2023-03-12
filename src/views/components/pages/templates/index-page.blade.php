@extends('layouts.app')
@section('content')
<div class="container">
<x-AdminLteUiComponents-page-header title="{{ $title }}" routeName="{{ $routeName }}" buttonName="Create" />
<x-AdminLteUiComponentsView::session-alert />
<x-AdminLteUiComponents-model-table resource="{{ $resource }}" :headers="$headers" :fields="$fields" :collection="$collection"/>
</div>
@endsection