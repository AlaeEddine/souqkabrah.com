@extends('layouts.website')
@section('content')
    <x-chat.chatcomponent :users=$users :user_id=$user_id />
@endsection
