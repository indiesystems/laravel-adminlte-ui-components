@extends('layouts.app')
@section('content')
<div class="container">
<x-AdminLteUiComponents-page-header title="{{ $title }}" routeName="{{ $routeName }}" buttonName="Back" />
<x-AdminLteUiComponentsView::session-alert />
<x-AdminLteUiComponents-edit :fields="$fields" resource="{{ $resource }}" :model="$model" />
</div>
@endsection