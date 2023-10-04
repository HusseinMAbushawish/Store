@extends('dashborde.parent')

@section('css')
<link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.31/dist/sweetalert2.min.css
" rel="stylesheet">
@endsection

@section('big-title','Products')
@section('direction','Index')

@section('content')

<div class="card-body">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>Title</th>
                <th>Descriotion</th>
                <th>Prise</th>
                <th>Quantity</th>
                <th>Categorie Title </th>
                <th>Created_at_Date</th>
                <th>Created_at_Time</th>
                <th>Updated_at</th>
                <th>Action</th>


            </tr>
        </thead>
        <tbody>
            @foreach ($product as $products)


            <tr>
                <td>{{ $products->id }}</td>
                <td>{{ $products->title }}</td>
                <td>{{ $products->description }}</td>
                <td>
                    <span class="badge badge-primary">{{ $products->prise }} $</span>
                </td>
                <td> <span class="badge badge-info">{{ $products->quantity }} </span></td>
                <td>{{ $products->categorie->title }}</td>
                <td>{{ $products->created_at->format('Y-m-d') }}</td>
                <td>{{ $products->created_at->format('H-i A') }}</td>
                <td>{{ $products->updated_at->format('y-m-d / H-i A') }}</td>
                <td>
                    <div class="btn-group">
                        <a href="{{ route('products.edit',$products->id ) }}" type="button"
                            class="btn btn-info">Edit</a>
                        <button onclick="deleteProduct({{$products->id}},this)" class="btn btn-danger">Delete</button>
                    </div>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('js')

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.31/dist/sweetalert2.all.min.js"></script>

<script>
    function deleteProduct(id,referanse){
       
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
    
    
    if (result.isConfirmed) {
        url = "/products/" + id
        axios.delete(url)
        referanse.parentNode.parentNode.parentNode.remove()

          .then(function (response) {
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success')
            })

            .catch(function (error) {
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success')    
            });
        }
            })}

</script>
@endsection