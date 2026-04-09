{{--
    Campaign Public View — renders the layout saved by the builder.
    Each block type is rendered with its stored data.
--}}

@extends('layouts.app')

@section('content')

@php
    $layout = is_array($campaign->layout) ? $campaign->layout : json_decode($campaign->layout, true);
    $layout = $layout ?? [];
@endphp

@foreach ($layout as $section)
    @include('partials.section', ['section' => $section])
@endforeach

@endsection
