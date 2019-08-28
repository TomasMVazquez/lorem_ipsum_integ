@extends('template')

{{-- Agregar el nombre del producto --}}
@section('title',"Lorem ipsum | Admin")

@section('mainContent')

  <div class="" style="display: flex; flex-direction: column;">
    <!-- TITULO DE LA PAG -->
    <div class="col-12 col-md-11 col-xl-10" style="align-self: center;">
      <h1 class="tit-productos">Agregar producto </h1>
      <p>Completar el formulario para crear producto.</p>
    </div>
    <!-- FIN TITULO DE LA PAG -->

    {{-- Comienzo del formulario --}}
    <div class="col-12"
    style="display: flex; flex-direction: row; justify-content: center; flex-wrap: wrap;">
      <form id="newAdd" class="col-12 col-md-10" method="POST" enctype="multipart/form-data" action="/admin/add" style="padding: 10px;">
        @csrf

        <div class="row">
          <label class="col-4 col-md-2 text-right mrgMob">Categoría:</label>
          <div class="col-8 col-md-4 mrgMob">
						<select class="form-control" name="category">
              <option value="" selected>Seleccionar Categoría</option>
							@foreach ($categories as $category)
                @if (old('category') == $category->id)
                  <option selected value="{{ $category->id }}"> {{ $category->name }}</option>
                @else
                  <option value="{{ $category->id }}"> {{ $category->name }}</option>
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

          <label class="col-4 col-md-2 text-right mrgMob">SubCategoría:</label>
          <div class="col-8 col-md-4 mrgMob">
						<select class="form-control" name="subcategory">
              <option value="" selected>Seleccionar Sub-Categoría</option>
							@foreach ($subcategories as $subcategory)
                @if (old('subcategory') == $subcategory->id)
                  <option selected value="{{ $subcategory->id }}"> {{ $subcategory->name }}</option>
                @else
                  <option value="{{ $subcategory->id }}"> {{ $subcategory->name }}</option>
                @endif
							@endforeach
						</select>
            <div class="invalid">
              <!-- Mensaje de error -->
            </div>
						@error ('subcategory')
							<i style="color: red;"> {{ $errors->first('subcategory') }}</i>
						@enderror
					</div>

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
              <textarea rows='2' name="name" class="form-control" value="">{{ old('name') }}</textarea>
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
              <textarea rows='2' name="brief" class="form-control" value="">{{ old('brief') }}</textarea>
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
              <textarea rows='6' name="description" class="form-control" value="">{{ old('description') }}</textarea>
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
              <textarea rows='6' name="uses" class="form-control" value="">{{ old('uses') }}</textarea>
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
              <textarea rows='2' name="benefits" class="form-control" value="">{{ old('benefits') }}</textarea>
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
                 <option value="{{ $presentation->id }}">{{$presentation->type}}</option>
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
        <div class="col-12">
          <button type="submit" class="btn btn-primary">
            AGREGAR PRODUCTO
          </button>
        </div>
      </div>
    </form>
    {{-- fin del formulario --}}
  </div>
@endsection
@section('scriptJS')
    <script src="/js/adminAdd.js"></script>
@endsection
