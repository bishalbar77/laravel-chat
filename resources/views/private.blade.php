@extends('layouts.app')

@section('content')
<div class="container">

    <private :user="{{ auth()->user() }}"></private>

</div>
@endsection
