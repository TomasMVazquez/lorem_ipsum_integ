@extends('template')

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
    </div>


    {{-- Comienzo del formulario --}}
    <div class="col-12"
    style="display: flex; flex-direction: row; justify-content: center; flex-wrap: wrap;">
      <form class="col-12 col-md-10" method="POST" enctype="multipart/form-data" action="/admin/add" style="padding: 10px;">
        @csrf

        <div class="row">
          <label class="col-4 col-md-2 text-right mrgMob">Categoria:</label>
          <div class="col-8 col-md-4 mrgMob">
						<select class="form-control" name="category">
              <option value="" selected>Seleccionar Categoria</option>
							@foreach ($categories as $category)
                @if (old('category') == $category->id)
                  <option selected value="{{ $category->id }}"> {{ $category->name }}</option>
                @else
                  <option value="{{ $category->id }}"> {{ $category->name }}</option>
                @endif
							@endforeach
						</select>
						@error ('category')
							<i style="color: red;"> {{ $errors->first('category') }}</i>
						@enderror
					</div>

          <label class="col-4 col-md-2 text-right mrgMob">Subcategoria:</label>
          <div class="col-8 col-md-4 mrgMob">
						<select class="form-control" name="subcategory">
              <option value="" selected>Seleccionar Sub-Categoria</option>
							@foreach ($subcategories as $subcategory)
                @if (old('subcategory') == $subcategory->id)
                  <option selected value="{{ $subcategory->id }}"> {{ $subcategory->name }}</option>
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
          @for ($i = 0; $i < 4; $i++)
            <div class="col-10 col-md-6 col-lg-3 imgFormGroup">
              <img class="imgMob" src="/imgs/logos/logo-loremipsum-black.png" alt="">
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="image">
                <label class="custom-file-label">Choose file...</label>
              </div>
            </div>
          @endfor
          @error ('image')
            <i style="color: red;"> {{ $errors->first('image') }}</i>
          @enderror
        </div>
        <br>
        <div class="row">
          <div class="col-10 col-md-6">
  					<div class="form-group">
  						<label>Nombre:</label>
              <textarea rows='2' name="name" class="form-control" value="">{{ old('name') }}</textarea>
  						@error ('name')
  							<i style="color: red;"> {{ $errors->first('name') }}</i>
  						@enderror
  					</div>
  				</div>

          <div class="col-10 col-md-6">
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
          <div class="col-10 col-md-6">
            <div class="form-group">
              <label>Descripcion:</label>
              <textarea rows='6' name="description" class="form-control" value="">{{ old('description') }}</textarea>
              @error ('description')
                <i style="color: red;"> {{ $errors->first('description') }}</i>
              @enderror
            </div>
          </div>

          <div class="col-10 col-md-6">
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
          <div class="col-10 col-md-6">
            <div class="form-group">
              <label>Beneficios:</label>
              <textarea rows='2' name="benefits" class="form-control" value="">{{ old('benefits') }}</textarea>
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
            AGREGAR PRODUCTO
          </button>
        </div>
      </div>
    </form>
    {{-- fin del formulario --}}
  </div>
@endsection