@extends('dashborde.parent')

@section('css')

@endsection

@section('big-title','Index')
@section('direction','Catogries')

@section('content')

<div class="card-body">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th style="width: 10px">#</th>
        <th>Title</th>
        <th>Activity</th>
        <th>Created_at_Date</th>
        <th>Created_at_Time</th>
        <th>Updated_at</th>
        <th>Action</th>


      </tr>
    </thead>
    <tbody>
      @foreach ($categorie as $categories)


      <tr>
        <td>{{ $categories->id }}</td>
        <td>{{ $categories->title }}</td>
        <td>
          @if ($categories->is_active == true)
          <span class="badge bg-success">True</span>

          @else
          <span class="badge bg-danger">False</span>

          @endif

        </td>
        <td>{{ $categories->created_at->format('Y-m-d') }}</td>
        <td>{{ $categories->created_at->format('H-i A') }}</td>
        <td>{{ $categories->updated_at->format('y-m-d / H-i A') }}</td>
        <td>
          <div class="btn-group">
            <a href="{{ route('categories.edit',$categories->id ) }}" type="button" class="btn btn-info">Edit</a>
            <a href="{{ route('categories.destroy',$categories->id) }}" class="btn btn-danger">Delete</a>
          </div>
        </td>

      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection

@section('js')

@endsection