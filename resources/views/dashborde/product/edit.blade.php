@extends('dashborde.parent')


@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endsection

@section('big-title','Product')
@section('direction','Edit')

@section('content')

<form onsubmit="event.preventDefault();editProduct()">
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" value="{{ $product->title }}" name="title" id="title"
                placeholder="Enter Title">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" rows="3" id="description" name="description"
                placeholder="Enter Description">{{ $product->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="prise">Prise</label>
            <input type="number" class="form-control" value="{{ $product->prise }}" name="prise" id="prise"
                placeholder="Enter Prise">
        </div>
        <div class="form-group">
            <label for="quantity">Qountity</label>
            <input type="number" class="form-control" value="{{ $product->quantity }}" name="quantity" id="quantity"
                placeholder="Enter Qountity">
        </div>
        <div class="form-group">
            <label>Categorie Name</label>
            <select class="form-control" id="categories_id">
                @foreach ($categories as $categorie)
                <option value="{{ $categorie->id }}" @selected($product->category_id == $categorie->id) >{{
                    $categorie->title }}</option>

                @endforeach
            </select>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </div>
</form>
@endsection


@section('js')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    function editProduct(){
        axios.put('/products/{{ $product->id }}', {
            title: document.getElementById('title').value,
            description: document.getElementById('description').value,
            prise: document.getElementById('prise').value,
            quantity: document.getElementById('quantity').value,
            categories_id : document.getElementById('categories_id').value,
        
    })
      .then(function (response) {
        console.log(response);
        toastr.success(response.data.message);
    })
        .catch(function (error) {
        console.log(error);
        toastr.error(error.response.data.message);

}   );
}
</script>
@endsection