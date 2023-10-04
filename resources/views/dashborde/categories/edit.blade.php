@extends('dashborde.parent')

@section('css')
    
@endsection
@section('nav')
    
@endsection

@section('big-title','Create')
@section('direction','Categories')

@section('content')
<form method="POST" action="{{ route('categories.update',$categorie->id) }}">
    @method('put')
    @csrf

 <div class="card-body"></div>
    @if ($errors->any())
    <div class="alert alert-danger" role="alert">
 <ul>
@foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach

 </ul>
      </div>
      @endif
    <div class="card-body">
      <div class="form-group">
        <label for="Title">Title</label>
        <input type="text" class="form-control"name="title" value="{{ $categorie->title }}" id="Title" value="{{ old('title') }}" placeholder="Enter Title Name">
      </div>
      <div class="custom-control custom-switch">
        <input type="checkbox" class="custom-control-input" @if ($categorie->is_active)
          @checked(true)
        @endif id="Activity">
        <label class="custom-control-label" name="activity" for="Activity">Activity</label>
      </div>
      <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
@endsection


@section('js')
    
@endsection