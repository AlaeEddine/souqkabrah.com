@extends('layouts.website')
@section('content')
<div class="container m-5">
    <h2 class="m-5 text-center">{{ e($Page->title) }}</h2>
    {!!  $Page->html !!}
</div>
@endsection
