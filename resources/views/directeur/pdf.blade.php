@extends('layouts.dir')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <embed src="{{asset('/storage/cv/'.$cv)}}" width="800px" height="800px" />
        </div>
    </div>
</div>
@endsection
