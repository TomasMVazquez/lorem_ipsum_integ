@extends('template')

@section('title',"Lorem ipsum | Admin View")

@section('mainContent')

{{-- {{Auth::User()}} --}}
{{-- Conetnedor del admin --}}
  <div class="adminConteiner">
{{-- titulo --}}
    <h1 class="tit-productos">Administrador de Productos</h1>

    <div class="col-12 conteinerButtonsAdd">
      <!-- AGREGAR CATEGORIA  -->
      <div class="ButtonsAdd">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-cat-modal-sm" style="margin: 10px;">AGREGAR Categoria</button>
        @error ('nameCat')
          <i style="color: red;"> {{ $errors->first('nameCat') }}</i>
        @enderror
      </div>

      <div class="modal fade bd-cat-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm mobileAddPop">
          <div class="modal-content">
            <form class="" method="post"  enctype="multipart/form-data" action="/admin/addCat" style="padding: 10px; border:none;">
              @csrf

              <div class="form-group">
                <label>Nueva Categoría:</label>
                <input type="text" name="nameCat" class="form-control" value="{{ old('nameCat') }}">
              </div>

              <button type="submit" class="btn btn-primary">
                AGREGAR
              </button>
            </form>
          </div>
        </div>
      </div>
      {{-- Agregar subcategoria --}}
      <!-- AGREGAR CATEGORIA  -->
      <div class="ButtonsAdd">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-sub-modal-sm" style="margin: 10px;">AGREGAR Sub-Categoria</button>
        @error ('categorySub')
          <i style="color: red;"> {{ $errors->first('categorySub') }}</i>
        @enderror
        @error ('nameSub')
          <i style="color: red;"> {{ $errors->first('nameSub') }}</i>
        @enderror
      </div>

      <div class="modal fade bd-sub-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" mobileAddPop>
          <div class="modal-content">
            <form class="" method="post"  enctype="multipart/form-data" action="/admin/addSubCat" style="padding: 10px; border:none;">
              @csrf

  						<select class="form-control" name="categorySub">
                <option value="" selected>Seleccionar Categoria</option>
  							@foreach ($categories as $category)
                  <option value="{{ $category->id }}"> {{ $category->name }}</option>
  							@endforeach
  						</select>

              <div class="form-group">
                <label>Nueva Sub-Categoría:</label>
                <input type="text" name="nameSub" class="form-control" value="{{ old('name') }}">
              </div>

              <button type="submit" class="btn btn-primary">
                AGREGAR
              </button>
            </form>
          </div>
        </div>
      </div>
      <!-- AGREGAR Presentacion  -->
      <div class="ButtonsAdd">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-pre-modal-sm" style="margin: 10px;">AGREGAR Presentacion</button>
        @error ('typePres')
          <i style="color: red;"> {{ $errors->first('typePres') }}</i>
        @enderror
      </div>

      <div class="modal fade bd-pre-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm mobileAddPop">
          <div class="modal-content">
            <form class="" method="post"  enctype="multipart/form-data" action="/admin/addPres" style="padding: 10px; border:none;">
              @csrf

              <div class="form-group">
                <label>Nueva Presentacion:</label>
                <input type="text" name="typePres" class="form-control" value="{{ old('typePres') }}">
              </div>

              <button type="submit" class="btn btn-primary">
                AGREGAR
              </button>
            </form>
          </div>
        </div>
      </div>

      <div class="ButtonsAdd">
      {{-- boton agregar producto --}}
      <a class="btn btn-success btnAddProd"  href="/admin/add" role="button"> AGREGAR PRODUCTO </a>
      </div>
    </div>


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
                    <button class="btn btn-link btnSubCat" type="button" data-toggle="collapse" data-target="#collapse{{ str_replace(' ','',$subcategory->name) }}" aria-expanded="true" aria-controls="collapse{{ str_replace(' ','',$subcategory->name) }}">
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
                          <th scope="col">Producto</th>
                          <th class="adminBrief" scope="col">Detalle</th>
                          <th scope="col"></th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($products as $product)
                          @if ($product->subcategory_id == $subcategory->id)
                            <tr>
                              <th scope="row">{{ $product->name }}</th>
                              <td class="adminBrief">{{$product->brief}}</td>
                              <td><a href="{{ route('edit', $product->id) }}" class="btn btn-outline-info">Editar</a></td>
                              <td>
                                <form class="theDeleteBtn" action="/admin/{{ $product->id }}" method="post">
                        					@csrf
                        					{{ method_field('delete') }}
                        					<button type="submit" class="btn btn-danger">Borrar</button>
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
