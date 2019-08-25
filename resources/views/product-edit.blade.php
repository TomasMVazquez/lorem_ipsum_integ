@extends('template')

{{-- Agregar el nombre del producto --}}
@section('title',"Lorem ipsum | Admin")

@section('mainContent')

  <div class="editAdminMainConteiner" style="display: flex; flex-direction: column;">
    <!-- TITULO DE LA PAG -->
    <div class="col-12 col-md-11 col-xl-10" style="align-self: center;">
      <h1 class="tit-productos">Editar: </h1>
      <p>Edita el formulario para crear actualizar.</p>
      <h2>{{ $productToEdit->name }}</h2>
    </div>
    <!-- FIN TITULO DE LA PAG -->

    {{-- Comienzo del formulario --}}
    <div class="col-12 editAdminConteiner">
      <form id="editForm" class="theEditForm col-12 col-md-10" method="POST" enctype="multipart/form-data" action="/admin/{{$productToEdit->id}}">
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
            <div class="invalid">
              <!-- Mensaje de error -->
            </div>
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
            <div class="invalid">
              <!-- Mensaje de error -->
            </div>
						@error ('subcategory_id')
							<i style="color: red;"> {{ $errors->first('subcategory_id') }}</i>
						@enderror
					</div>

        </div>
        <br>
        <div class="row">
          @if (count($images)>0)
            @foreach ($images as $image)
              <div class="" style="display:flex; flex-direction:row; justify-content:space-between;">
                <div class="col-10 col-md-6 col-lg-3 imgFormGroup">
                  <img id="{{$image->id}}" class="imgMob" src="/storage/items/{{ $image->route }}" alt="" style="">
                </div>
                <i id="trash" class="fas fa-trash-alt" style="font-size:2em; align-self:flex-end;"></i>
              </div>
            @endforeach
          @endif
        </div>

        <br>

        <div class="row" id="rowImg">
          <button type="button" id="btnImgAdd" style="background: none;border: none;padding:0;">
            <i class="fas fa-plus-circle" style="color: green;font-size:2em;"></i>
          </button>
          <div class="col-10 col-md-6 col-lg-3 imgFormGroup">
            <div class="custom-file" id="imgAdd">
              <input type="file" class="custom-file-input" name="image">
              <label class="custom-file-label">Elegir imagen...</label>
            </div>
            <div class="invalid">
              <!-- Mensaje de error -->
            </div>
            @error ('image')
              <i style="color: red;"> {{ $errors->first('image') }}</i>
            @enderror
          </div>
        </div>

        <br>

        <div class="row">
          <div class="col-10 col-md-6">
  					<div class="form-group">
  						<label>Nombre:</label>
              <textarea rows='2' name="name" class="form-control" value="">{{ old('name', $productToEdit->name) }}</textarea>
              <div class="invalid">
  							<!-- Mensaje de error -->
  						</div>
  						@error ('name')
  							<i style="color: red;"> {{ $errors->first('name') }}</i>
  						@enderror
  					</div>
  				</div>

          <div class="col-10 col-md-6">
            <div class="form-group">
              <label>Detalle:</label>
              <textarea rows='2' name="brief" class="form-control" value="">{{ old('brief', $productToEdit->brief) }}</textarea>
              <div class="invalid">
  							<!-- Mensaje de error -->
  						</div>
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
              <div class="invalid">
  							<!-- Mensaje de error -->
  						</div>
              @error ('description')
                <i style="color: red;"> {{ $errors->first('description') }}</i>
              @enderror
            </div>
          </div>

          <div class="col-10 col-md-6">
            <div class="form-group">
              <label>Usos:</label>
              <textarea rows='6' name="uses" class="form-control" value="">{{ old('uses', $productToEdit->uses) }}</textarea>
              <div class="invalid">
  							<!-- Mensaje de error -->
  						</div>
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
              <div class="invalid">
  							<!-- Mensaje de error -->
  						</div>
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
             <div class="invalid">
               <!-- Mensaje de error -->
             </div>
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
              <div class="invalid">
  							<!-- Mensaje de error -->
  						</div>
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
@section('scriptJS')
    <script src="/js/adminEdit.js"></script>
@endsection
