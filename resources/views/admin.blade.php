@extends('template')

@section('title',"Lorem ipsum | Admin View")

@section('mainContent')

{{-- {{Auth::User()}} --}}
{{-- Conetnedor del admin --}}
  <div class="adminConteiner" style="margin: 20px;display: flex;flex-direction: column;">
{{-- titulo --}}
    <h1 class="tit-productos">Administrador de Productos</h1>
{{-- boton agregar producto --}}
    <button type="button" class="btn btn-success" style="align-self: flex-end;"> Add </button>
    <br>
{{-- Primer Acordeon por cada categoria --}}
    <div class="accordion" id="accordionCategory">
      <div class="card">
        @foreach ($categories as $category)
          {{-- titulo del acordeon uno por cada categoria --}}
          <div class="card-header" id="{{ $category->name }}">
            <h2 class="mb-0">
              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{ $category->id }}" aria-expanded="true" aria-controls="collapse{{ $category->id }}">
                {{ $category->name }}
              </button>
            </h2>
          </div>
          {{-- detalle del acordeon de cada categoria --}}
          <div id="collapse{{ $category->id }}" class="collapse " aria-labelledby="{{ $category->name }}" data-parent="#accordionCategory">
            <div class="card-body">
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
                                <th scope="col">#</th>
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
                                    <th scope="row">{{ $product->id }}</th>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->brief}}</td>
                                    <td style="text-align: center;">{{$product->rating}}</td>
                                    <td><button type="button" class="btn btn-outline-info">Edit</button></td>
                                    <td><button type="button" class="btn btn-danger">Delete</button></td>
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
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection
