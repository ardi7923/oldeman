@extends('layouts.app')

@section('title_page')
	User Profile
@endsection

@section('content')

<x-card title="Profile">

   @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $message }}</strong>
        </div>
    @endif

    @if ($message = Session::get('errors'))
    	@foreach($message as $m)
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <ul>
            	<li> {{ $m }} </li>
            </ul>
        </div>
        @endforeach
    @endif

	<form action="{{ url('admin/user-profile/update-user') }}" method="post" accept-charset="utf-8">

		@csrf
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Nama </label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Username </label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="username" value="{{ Auth::user()->username }}" required>
			</div>
		</div>

		<div class="modal-footer">
			<button type="submit" class="btn btn-success"> <i class="fa fa-edit"> </i> Ubah </button>
		</div>
	</form>
</x-card>

<x-card title="Perbarui Password">
	@if ($message = Session::get('success_password'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $message }}</strong>
        </div>
    @endif

    @if ($message = Session::get('errors_password'))
    	
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            
            <ul>
            	@foreach($message as $m)
            	<li> {{ $m }} </li>
            	@endforeach
            </ul>
        </div>
        
    @endif

	<form action="{{ url('admin/user-profile/renew-password') }}" method="post" accept-charset="utf-8">
		@csrf
		
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Password </label>
			<div class="col-sm-10">
				<input type="password" class="form-control" name="password"  required>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Ulangi Password </label>
			<div class="col-sm-10">
				<input type="password" class="form-control" name="repeat_password"  required>
			</div>
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-danger">  Perbarui Password </button>
		</div>
	</form>
</x-card>
@endsection