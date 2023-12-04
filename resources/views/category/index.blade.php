@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-12 mb-4">
        <div class="hstack gap-3 justify-content-center">
            @foreach ($categories as $category)
            <div class="bg-light border my-4" style="border-radius: 20px; border: 2px solid #000000; padding: 3px;">
                <div class="card-product card" style="width: 12rem; border-radius:20px;">                   
                    <img src="/image/categories/{{ strtolower($category->name) }}.webp" class="card-img-top img-fluid" style="border-radius:20px 20px 0 0; object-fit: cover;" alt="...">
                    <div class="card-body">
                        <p class="card-text text-center" style="font-size: 15px">{{ $category->name }}</p>
                        <div class="d-flex justify-content-around">
                            <a href="{{route('category.show', $category->id)}}" class="btn btn-detail" style="background-color:#1f7fd8; color: #ffffff; border-radius:10px; font-size:13px; padding:10px;">
                            Lihat Detail
                        </a>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>
</div>


<script>

</script>
@endsection
