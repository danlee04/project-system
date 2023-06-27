@extends('layouts.index')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="font-weight-bold">Add New Member</h5>
                @livewire('members')
        </div>  
    </div>
</div>
@endsection