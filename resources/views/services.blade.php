@extends('layout.app')

@section('content')
@include('layout.section.hero')
  @include('layout.section.services')

  <!-- services page body -->

  <!-- keep services page focused: remove landing showcase below -->
  @include('layout.section.work-philosophy-HSE')
@endsection

