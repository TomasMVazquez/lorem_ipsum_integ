@extends('template')

{{-- Agregar el nombre del producto --}}
@section('title',"Lorem ipsum | Admin")

@section('mainContent')

  <div class="" style="display: flex; flex-direction: column;">
    <!-- TITULO DE LA PAG -->
    <div class="col-12 col-md-11 col-xl-10">
      <h1 class="titulo">Editar: </h1>
      <p>Edita el formulario para crear actualizar.</p>
      <h2>{{ $productToEdit->name }}</h2>
    </div>
    <!-- FIN TITULO DE LA PAG -->

    {{-- Comienzo del formulario --}}
    <div class="col-12"
    style="display: flex; flex-direction: row; justify-content: center;">
      <form class="col-10" method="POST" enctype="multipart/form-data" action="" style="padding: 10px;">
        @csrf
        {{ method_field('put') }}

        <div class="row">
          <label class="col-2 text-right">Categoria:</label>
          <div class="col-4">
						<select class="form-control" name="category">
							@foreach ($categories as $category)
                @if ($productToEdit->subcategory->category->id == $category->id)
                  <option value="{{ $category->id }}" selected> {{ $category->name }}</option>
                @else
                  <option value="{{ $category->id }}" selected> {{ $category->name }}</option>
                @endif
							@endforeach
						</select>
						@error ('category')
							<i style="color: red;"> {{ $errors->first('category') }}</i>
						@enderror
					</div>

          <label class="col-2 text-right">Subcategoria:</label>
          <div class="col-4">
						<select class="form-control" name="subcategory">
							@foreach ($subcategories as $subcategory)
                @if ($productToEdit->subcategory_id == $subcategory->id)
                  <option value="{{ $subcategory->id }}" selected> {{ $subcategory->name }}</option>
                @else
                  <option value="{{ $subcategory->id }}"> {{ $subcategory->name }}</option>
                @endif
							@endforeach
						</select>
						@error ('subcategory')
							<i style="color: red;"> {{ $errors->first('subcategory') }}</i>
						@enderror
					</div>

        </div>
        <br>
        <div class="row">
          @foreach ($images as $image)
            <div class="col-3">
              <img src="/storage{{ $image->route }}" alt="" style="width: 260px; height: 250px;">
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="poster">
                <label class="custom-file-label">Choose file...</label>
              </div>
              @error ('image')
                <i style="color: red;"> {{ $errors->first('poster') }}</i>
              @enderror
            </div>
          @endforeach
        </div>
        <br>
        <div class="row">
          <div class="col-6">
  					<div class="form-group">
  						<label>Nombre:</label>
              <textarea rows='2' name="name" class="form-control" value="">{{ old('name', $productToEdit->name) }}</textarea>
  						@error ('name')
  							<i style="color: red;"> {{ $errors->first('name') }}</i>
  						@enderror
  					</div>
  				</div>

          <div class="col-6">
            <div class="form-group">
              <label>Detalle:</label>
              <textarea rows='2' name="brief" class="form-control" value="">{{ old('brief', $productToEdit->brief) }}</textarea>
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
              <textarea rows='6' name="description" class="form-control" value="">{{ old('description', $productToEdit->description) }}</textarea>
              @error ('description')
                <i style="color: red;"> {{ $errors->first('description') }}</i>
              @enderror
            </div>
          </div>

          <div class="col-6">
            <div class="form-group">
              <label>Usos:</label>
              <textarea rows='6' name="uses" class="form-control" value="">{{ old('uses', $productToEdit->uses) }}</textarea>
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
              <textarea rows='2' name="benefits" class="form-control" value="">{{ old('benefits', $productToEdit->benefits) }}</textarea>
              @error ('benefits')
                <i style="color: red;"> {{ $errors->first('benefits') }}</i>
              @enderror
            </div>
          </div>

          <div class="col-6">
            <div class="form-group">
              <label>Rating:</label>
              <input type="text" name="rating" class="form-control" value="{{ old('rating', $productToEdit->rating) }}">
  						@error ('rating')
  							<i style="color: red;"> {{ $errors->first('rating') }}</i>
  						@enderror
          </div>
        </div>

      </form>
    </div>
    {{-- fin del formulario --}}
  </div>
@endsection
