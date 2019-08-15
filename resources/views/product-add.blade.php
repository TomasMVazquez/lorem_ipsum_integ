.@extends('template')

{{-- Agregar el nombre del producto --}}
@section('title',"Lorem ipsum | Admin")

@section('mainContent')

  <div class="">
    <!-- TITULO DE LA PAG -->
    <div class="col-12 col-md-11 col-xl-10">
      <h1 class="titulo">Agregar: </h1>
      <p>Completar el formulario para crear producto.</p>
    </div>
    <!-- FIN TITULO DE LA PAG -->

    <div class="col-12" style="display: flex; flex-direction: row; justify-content: end;">
      <!-- AGREGAR CATEGORIA  -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-cat-modal-sm" style="margin: 10px;">Add Categroy</button>

      <div class="modal fade bd-cat-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <form class="" method="post"  enctype="multipart/form-data" action="" style="padding: 10px; border:none;">
              @csrf

              <div class="form-group">
                <label>Nueva Categoría:</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                @error ('name')
                  <i style="color: red;"> {{ $errors->first('name') }}</i>
                @enderror
              </div>

              <button type="submit" class="btn btn-primary">
                ADD
              </button>
            </form>
          </div>
        </div>
      </div>
      {{-- Agregar subcategoria --}}
      <!-- AGREGAR CATEGORIA  -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-sub-modal-sm" style="margin: 10px;">Add Sub-Categroy</button>

      <div class="modal fade bd-sub-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <form class="" method="post"  enctype="multipart/form-data" action="" style="padding: 10px; border:none;">
              @csrf

              <div class="form-group">
                <label>Nueva Sub-Categoría:</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                @error ('name')
                  <i style="color: red;"> {{ $errors->first('name') }}</i>
                @enderror
              </div>

              <button type="submit" class="btn btn-primary">
                ADD
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>


    {{-- Comienzo del formulario --}}
    <div class="col-12"
    style="display: flex; flex-direction: row; justify-content: center; flex-wrap: wrap;">
      <form class="col-10" method="POST" enctype="multipart/form-data" action="" style="padding: 10px;">
        @csrf

        <div class="row">
          <label class="col-2 text-right">Categoria:</label>
          <div class="col-4">
						<select class="form-control" name="category">
              <option value="" selected>Seleccionar Categoria</option>
							@foreach ($categories as $category)
                <option value="{{ $category->id }}"> {{ $category->name }}</option>
							@endforeach
						</select>
						@error ('category')
							<i style="color: red;"> {{ $errors->first('category') }}</i>
						@enderror
					</div>

          <label class="col-2 text-right">Subcategoria:</label>
          <div class="col-4">
						<select class="form-control" name="subcategory">
              <option value="" selected>Seleccionar Sub-Categoria</option>
							@foreach ($subcategories as $subcategory)
                <option value="{{ $subcategory->id }}"> {{ $subcategory->name }}</option>
							@endforeach
						</select>
						@error ('subcategory')
							<i style="color: red;"> {{ $errors->first('subcategory') }}</i>
						@enderror
					</div>

        </div>
        <br>
        <div class="row">
          @for ($i = 1; $i < 5; $i++)
            <div class="col-3">
              <img src="" alt="" style="width: 260px; height: 250px;">
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="poster">
                <label class="custom-file-label">Choose file...</label>
              </div>
              @error ('image')
                <i style="color: red;"> {{ $errors->first('poster') }}</i>
              @enderror
            </div>
          @endfor
        </div>
        <br>
        <div class="row">
          <div class="col-6">
  					<div class="form-group">
  						<label>Nombre:</label>
              <textarea rows='2' name="name" class="form-control" value="">{{ old('name') }}</textarea>
  						@error ('name')
  							<i style="color: red;"> {{ $errors->first('name') }}</i>
  						@enderror
  					</div>
  				</div>

          <div class="col-6">
            <div class="form-group">
              <label>Detalle:</label>
              <textarea rows='2' name="brief" class="form-control" value="">{{ old('brief') }}</textarea>
              @error ('brief')
                <i style="color: red;"> {{ $errors->first('brief') }}</i>
              @enderror
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label>Descripcion:</label>
              <textarea rows='6' name="description" class="form-control" value="">{{ old('description') }}</textarea>
              @error ('description')
                <i style="color: red;"> {{ $errors->first('description') }}</i>
              @enderror
            </div>
          </div>

          <div class="col-6">
            <div class="form-group">
              <label>Usos:</label>
              <textarea rows='6' name="uses" class="form-control" value="">{{ old('uses') }}</textarea>
              @error ('uses')
                <i style="color: red;"> {{ $errors->first('uses') }}</i>
              @enderror
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label>Beneficios:</label>
              <textarea rows='2' name="benefits" class="form-control" value="">{{ old('benefits') }}</textarea>
              @error ('benefits')
                <i style="color: red;"> {{ $errors->first('benefits') }}</i>
              @enderror
            </div>
          </div>

          <div class="col-6">
            <div class="form-group">
              <label>Rating:</label>
              <input type="text" name="rating" class="form-control" value="{{ old('rating') }}">
  						@error ('rating')
  							<i style="color: red;"> {{ $errors->first('rating') }}</i>
  						@enderror
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <button type="submit" class="btn btn-primary">
            ADD PRODUCT
          </button>
        </div>
      </div>
    </form>
    {{-- fin del formulario --}}
  </div>
@endsection
