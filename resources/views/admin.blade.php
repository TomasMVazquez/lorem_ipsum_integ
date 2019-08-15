@extends('template')

@section('title',"Lorem ipsum | Admin View")

@section('mainContent')

{{-- {{Auth::User()}} --}}
{{-- Conetnedor del admin --}}
  <div class="adminConteiner" style="margin: 20px;display: flex;flex-direction: column;">
{{-- titulo --}}
    <h1 class="tit-productos">Administrador de Productos</h1>
{{-- boton agregar producto --}}
    <a class="btn btn-success"  href="/admin/add" role="button" style="align-self: flex-end; color: white;"> Add </a>

      @foreach ($categories as $category)
        <hr>
        {{-- titulo del acordeon uno por cada categoria --}}
        <div class="alert alert-secondary" role="alert">
          <h4 class="alert-heading">{{ $category->name }}</h4>
        </div>
        {{-- El detalle de la categoria van a ser las sub categorias --}}
        <div class="accordion" id="accordionSubcategory">
          <div class="card">
            @foreach ($subcategories as $subcategory)
              {{-- titulo del acordeon uno por cada categoria --}}
              @if ($subcategory->category_id == $category->id)
                <div class="card-header" id="{{ $subcategory->name }}">
                  <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{ str_replace(' ','',$subcategory->name) }}" aria-expanded="true" aria-controls="collapse{{ str_replace(' ','',$subcategory->name) }}">
                      {{ $subcategory->name }}
                    </button>
                  </h2>
                </div>
                {{-- detalle del acordeon de cada categoria --}}
                <div id="collapse{{ str_replace(' ','',$subcategory->name) }}" class="collapse " aria-labelledby="{{ str_replace(' ','',$subcategory->name) }}" data-parent="#accordionSubcategory">
                  <div class="card-body">
                    {{-- El detalle de la subcategoria van a ser las tablas de products --}}
                    <table class="table table-hover table-sm">
                      <thead>
                        <tr>
                          <th scope="col">Product</th>
                          <th scope="col">Biref</th>
                          <th scope="col">Rating</th>
                          <th scope="col"></th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($products as $product)
                          @if ($product->subcategory_id == $subcategory->id)
                            <tr>
                              <th scope="row">{{ $product->name }}</th>
                              <td>{{$product->brief}}</td>
                              <td style="text-align: center;">{{$product->rating}}</td>
                              <td><a href="{{ route('edit', $product->id) }}" class="btn btn-outline-info">Edit</a></td>
                              <td>
                                <form action="/admin/{{ $product->id }}" method="post" style="border: none; margin: 0px;">
                        					@csrf
                        					{{ method_field('delete') }}
                        					<button type="submit" class="btn btn-danger">Delete</button>
                        				</form>
                              </td>
                            </tr>
                          @endif
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              @endif
            @endforeach
          </div>
        </div>
      @endforeach
    </div>
@endsection
