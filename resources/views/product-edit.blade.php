@extends('template')

{{-- Agregar el nombre del producto --}}
@section('title',"Lorem ipsum | Admin")

@section('mainContent')

  <div class="editAdminMainConteiner">
    <!-- TITULO DE LA PAG -->
    <div class="col-12 col-md-11 col-xl-10">
      <h1 class="titulo">Editar: </h1>
      <p>Edita el formulario para crear actualizar.</p>
      <h2>{{ $productToEdit->name }}</h2>
    </div>
    <!-- FIN TITULO DE LA PAG -->

    {{-- Comienzo del formulario --}}
    <div class="col-12 editAdminConteiner">
      <form class="theEditForm col-12 col-md-10" method="POST" enctype="multipart/form-data" action="/admin/{{$productToEdit->id}}">
        @csrf
        {{ method_field('put') }}

        <div class="row">
          <label class="col-4 col-md-2 text-right mrgMob">Categoria:</label>
          <div class="col-8 col-md-4 mrgMob">
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

          <label class="col-4 col-md-2 text-right mrgMob">Subcategoria:</label>
          <div class="col-8 col-md-4 mrgMob">
						<select class="form-control" name="subcategory_id">
							@foreach ($subcategories as $subcategory)
                @if ($productToEdit->subcategory_id == $subcategory->id)
                  <option value="{{ $subcategory->id }}" selected> {{ $subcategory->name }}</option>
                @else
                  <option value="{{ $subcategory->id }}"> {{ $subcategory->name }}</option>
                @endif
							@endforeach
						</select>
						@error ('subcategory_id')
							<i style="color: red;"> {{ $errors->first('subcategory_id') }}</i>
						@enderror
					</div>

        </div>
        <br>
        <div class="row">
          @if (count($images)>0)
            @foreach ($images as $image)
              <div class="col-10 col-md-6 col-lg-3 imgFormGroup">
                <img class="imgMob" src="/storage/items/{{ $image->route }}" alt="">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="image">
                  <label class="custom-file-label">Choose file...</label>
                </div>
                @error ('image')
                  <i style="color: red;"> {{ $errors->first('image') }}</i>
                @enderror
              </div>
            @endforeach
          @else
            <div class="col-10 col-md-6 col-lg-3 imgFormGroup">
              <img class="imgMob" src="/imgs/logos/logo-loremipsum-black.png" alt="">
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="image">
                <label class="custom-file-label">Choose file...</label>
              </div>
              @error ('image')
                <i style="color: red;"> {{ $errors->first('image') }}</i>
              @enderror
            </div>
          @endif

        </div>
        <br>
        <div class="row">
          <div class="col-10 col-md-6">
  					<div class="form-group">
  						<label>Nombre:</label>
              <textarea rows='2' name="name" class="form-control" value="">{{ old('name', $productToEdit->name) }}</textarea>
  						@error ('name')
  							<i style="color: red;"> {{ $errors->first('name') }}</i>
  						@enderror
  					</div>
  				</div>

          <div class="col-10 col-md-6">
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
          <div class="col-10 col-md-6">
            <div class="form-group">
              <label>Descripcion:</label>
              <textarea rows='6' name="description" class="form-control" value="">{{ old('description', $productToEdit->description) }}</textarea>
              @error ('description')
                <i style="color: red;"> {{ $errors->first('description') }}</i>
              @enderror
            </div>
          </div>

          <div class="col-10 col-md-6">
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
          <div class="col-10 col-md-6">
            <div class="form-group">
              <label>Beneficios:</label>
              <textarea rows='3' name="benefits" class="form-control" value="">{{ old('benefits', $productToEdit->benefits) }}</textarea>
              @error ('benefits')
                <i style="color: red;"> {{ $errors->first('benefits') }}</i>
              @enderror
            </div>
          </div>

          <div class="col-10 col-md-6">
            <div class="form-group">
             <label for="presentationType">Presentaciones:</label>
             <select multiple name="presentation[]" class="form-control" id="presentationType">
               @foreach ($presentations as $presentation)
                 @foreach ($productToEdit->presentation as $productPresentation)
                   @if ($presentation->id == $productPresentation->id)
                     <option value="{{$presentation->id}}" selected>{{$presentation->type}}</option>
                     @break
                   @endif
                 @endforeach
                 <option value="{{$presentation->id}}">{{$presentation->type}}</option>
               @endforeach
             </select>
           </div>
           @error ('presentation')
             <i style="color: red;"> {{ $errors->first('presentation') }}</i>
           @enderror
          </div>
        </div>

        <div class="row">
          <div class="col-10 col-md-6">
            <div class="form-group">
              <label>Rating:</label>
              <input type="text" name="rating" class="form-control" value="{{ old('rating', $productToEdit->rating) }}">
  						@error ('rating')
  							<i style="color: red;"> {{ $errors->first('rating') }}</i>
  						@enderror
            </div>
          </div>

        </div>

        <div class="row">
          <div class="col-12 text-right">
            <button type="submit" class="col-12 col-md-3 btn btn-primary">
              EDITAR
            </button>
          </div>
        </div>
      </form>

    {{-- fin del formulario --}}
  </div>
@endsection
