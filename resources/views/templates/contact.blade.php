@extends('master', [ 'headerIsLight' => true ])

@section('title', $page->translation->meta_title != '' ? $page->translation->meta_title : $page->translation->name .' | '. config('site.company_name'))
@section('meta_description', $page->translation->meta_description)

@section('content')


        @component('organisms.intro')
            @slot('header')
                @include('components.pageTitle', ['isInsideIntro' => true])
            @endslot
            @include('organisms.contact')
        @endcomponent


    @include('organisms.components')

    <div class="o-block">
        @include('organisms.calloutBar')
    </div>

@endsection