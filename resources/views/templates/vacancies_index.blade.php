@extends('master')

@section('title', $page->translation->meta_title != '' ? $page->translation->meta_title : $page->translation->name .' | '. config('site.company_name'))
@section('meta_description', $page->translation->meta_description)

@section('content')

    @include('components.pageTitle')
    
    <div class="l-contain  o-block">
        @include('organisms.vacancyList')
    </div>

    {{--When components are set on this page they will be put here --}}
    @include('organisms.components')

    <div class="o-block">
        @include('organisms.calloutBar')
    </div>

@endsection