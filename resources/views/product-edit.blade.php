@extends('template')

{{-- Agregar el nombre del producto --}}
@section('title',"Lorem ipsum | Admin")

@section('mainContent')

  <div class="editAdminMainConteiner">
    <!-- TITULO DE LA PAG -->
    <div class="col-12 col-md-11 col-xl-10 align-self-center" >
      <h1 class="tit-productos">Editar producto </h1>
      <p class="tit-productos">Edita el formulario para crear actualizar.</p>
      <h2 class="tit-productos">{{ $productToEdit->name }}</h2>
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
							<i class="text-danger"> {{ $errors->first('category') }}</i>
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
							<i class="text-danger"> {{ $errors->first('subcategory_id') }}</i>
						@enderror
					</div>

        </div>
        <br>
        <div class="row rowImg">
          @if (count($images)>0)
            @foreach ($images as $image)
              <div class="imgToDelete">
                <div class="imgFormGroup">
                  <img id="{{$image->id}}" class="imgMob" src="/storage/items/{{ $image->route }}" alt="">
                </div>
                <i id="trash" class="fas fa-trash-alt"></i>
              </div>
            @endforeach
          @endif
        </div>

        <br>

        <div class="row" id="rowImg">
          <button type="button" id="btnImgAdd">
            <i class="fas fa-plus-circle text-success"></i>
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
              <i class="text-danger"> {{ $errors->first('image') }}</i>
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
  							<i class="text-danger"> {{ $errors->first('name') }}</i>
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
                <i class="text-danger"> {{ $errors->first('brief') }}</i>
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
                <i class="text-danger"> {{ $errors->first('description') }}</i>
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
                <i class="text-danger"> {{ $errors->first('uses') }}</i>
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
                <i class="text-danger"> {{ $errors->first('benefits') }}</i>
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
             <i class="text-danger"> {{ $errors->first('presentation') }}</i>
           @enderror
          </div>
        </div>



        <div class="row">
          <div class="col-12 btnDiv">
            <button type="submit" class="btn btn-primary">
              GUARDAR CAMBIOS
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
