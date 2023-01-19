@extends('layouts.master')

@section('hero-section')
    @include('sections.hero')
@endsection

@section('content')
    @include('sections.about')
    @include('sections.fact')
    @include('sections.skill')
    @include('sections.resume')
    @include('sections.portopolio')
    @include('sections.service')
    @include('sections.testimony')
    @include('sections.contact')
    @include('sections.footer')
@endsection
