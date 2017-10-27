@extends('Administrador.layouts.cabecera')
@section('content')
<div class="content-wrapper">
    <section class="content container-fluid">
      @include('flash::message')
      <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Agregar a la base de datos</h3>
              <div class="form-group">
                  <select class="form-control select2" style="width: 100%;" name="agregar" id="agregar">
                    <option value="">Seleccione para agregar</option>
                    <option value="1">Categorías</option>
                    <option value="2">Marcas</option>
                    <option value="3">Productos</option>
                  </select>
              </div>
            </div>
              {!! Form::open(['route'=>'admin.agregar_producto','method'=>'POST','enctype'=>'multipart/form-data']) !!}
                {{ csrf_field() }}
              <div class="box-body" id="info-agregar">
                <!-- -->
              </div>
            {!! Form::close() !!}
          </div>
        </div>
      <!-- Eliminar -->
      <div class="col-md-6">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Último Agregado</h3>
              <div class="form-group">
                <select class="form-control select2" style="width: 100%;" name="mostrar" id="mostrar">
                  <option value="">Seleccione para mostrar</option>
                  <option value="1">Categorías</option>
                  <option value="2">Marcas</option>
                  <option value="3">Productos</option>
                </select>
              </div>
            </div>
            <div class="box-body" id="info-ultimos">
              <!-- -->
            </div>
          </div>
      </div>
    </section>
</div>
<script>
  $('#agregar').on('change',function(e){
    console.log(e);
    var cat_id=e.target.value;
    if(cat_id==1)
    {
      $('#info-agregar').empty();
        $('#info-agregar')
        .append('<div class="form-group{{ $errors->has('categoria') ? ' has-error' : '' }}">')
        .append('<label>Categoría</label>')
        .append('<input type="hidden" class="form-control" name="id" value="'+1+'" >')
        .append('<input class="form-control" placeholder="Nombre Categoría" type="text" name="categoria" required>')
        .append('@if ($errors->has('categoria'))')
        .append('<span class="help-block">')
        .append('<strong>{{ $errors->first('categoria') }}</strong>')
        .append('</span>')
        .append('@endif')
        .append('</div>')
        .append('<div class="box-footer">')
        .append('<button type="submit" class="btn btn-primary aceptar">AGREGAR</button>')
        .append('</div>')
    }
    else
    {
      if(cat_id==2)
      {
        $('#info-agregar').empty();
          $('#info-agregar')
          .append('<div class="form-group{{ $errors->has('marca') ? ' has-error' : '' }}">')
          .append('<label>Marcas</label>')
          .append('<input type="hidden" class="form-control" name="id" value="'+2+'" >')
          .append('<input class="form-control" placeholder="Nombre Marca" type="text" name="marca" required>')
          .append('@if ($errors->has('marca'))')
          .append('<span class="help-block">')
          .append('<strong>{{ $errors->first('marca') }}</strong>')
          .append('</span>')
          .append('@endif')
          .append('</div>')
          .append('<div class="box-footer">')
          .append('<button type="submit" class="btn btn-primary aceptar">AGREGAR</button>')
          .append('</div>')
      }
      else
      {
        if(cat_id==3)
        {
          $('#info-agregar').empty();
            $('#info-agregar')
            .append('<div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">')
            .append('<label>Producto</label>')
            .append('<input type="hidden" class="form-control" name="id" value="'+3+'" >')
            .append('<input class="form-control" placeholder="Nombre del Producto" type="text" name="nombre" required>')
            .append('@if ($errors->has('nombre'))')
            .append('<span class="help-block">')
            .append('<strong>{{ $errors->first('nombre') }}</strong>')
            .append('</span>')
            .append('@endif')
            .append('</div>')
            .append('<div class="form-group{{ $errors->has('marca') ? ' has-error' : '' }}">')
            .append('<label>Marca</label>')
            .append('<div class="form-group"><select class="form-control select2" style="width: 100%;" name="marca" id="seleccionar">@foreach($marcas as $marca)<option value="{{ $marca->id }}">{{ $marca->nombre }}</option>@endforeach</select>@if ($errors->has('marca'))<span class="help-block"><strong>{{ $errors->first('marca') }}</strong></span>@endif</div>')
            .append('</div>')
            .append('<div class="form-group{{ $errors->has('categoria') ? ' has-error' : '' }}">')
            .append('<label>Categorias</label>')
            .append('<div class="form-group"><select class="form-control select2" style="width: 100%;" name="categorias" id="seleccionar">@foreach($categorias as $categoria)<option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>@endforeach</select>@if ($errors->has('categoria'))<span class="help-block"><strong>{{ $errors->first('categoria') }}</strong></span>@endif</div>')
            .append('</div>')
            .append('<div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">')
            .append('<label>Descripción</label>')
            .append('<input class="form-control" placeholder="Descripcion del producto" type="text" name="descripcion" required>')
            .append('@if ($errors->has('descripcion'))')
            .append('<span class="help-block">')
            .append('<strong>{{ $errors->first('descripcion') }}</strong>')
            .append('</span>')
            .append('@endif')
            .append('</div>')
            .append('<div class="form-group{{ $errors->has('precio') ? ' has-error' : '' }}">')
            .append('<label>Precio</label>')
            .append('<input class="form-control" min="1" placeholder="Ingrese precio por unidad" type="number" name="precio" required>')
            .append('@if ($errors->has('precio'))')
            .append('<span class="help-block">')
            .append('<strong>{{ $errors->first('precio') }}</strong>')
            .append('</span>')
            .append('@endif')
            .append('</div>')
            .append('<div class="form-group{{ $errors->has('imagen') ? ' has-error' : '' }}">')
            .append('<div class="form-group">')
            .append('{!! Form::label('AGREGAR NUEVO') !!}')
            .append('{!! Form::file('imagen', null) !!}')
            .append('</div>')
            .append('<p class="help-block">Seleccione imagen (Recomendado: 300x300 pixeles)</p>')
            .append('@if ($errors->has('imagen'))')
            .append('<span class="help-block">')
            .append('<strong>{{ $errors->first('imagen') }}</strong>')
            .append('</span>')
            .append('@endif')
            .append('</div>')
            .append('<div class="box-footer">')
            .append('<button type="submit" class="btn btn-primary aceptar">AGREGAR NUEVO</button>')
            .append('</div>')
        }
        else {
          $('#info-agregar').empty();
        }
      }
    }
  });
</script>
<script>
  $('#mostrar').on('change',function(e){
    console.log(e);
    var cat_id=e.target.value;
    if(cat_id==1)
    {
      $.get('/ultimos?cat_id='+cat_id, function(data){
        $('#info-ultimos').empty();
          $('#info-ultimos')
          .append('<div class="form-group">')
          .append('<label>Categoría</label>')
          .append('<input type="text" class="form-control" name="nombre" value="'+data.nombre+'" disabled>')
          .append('</div>')
          .append('<div class="form-group">')
          .append('<label>Fecha Creado</label>')
          .append('<input type="text" class="form-control" name="nombre" value="'+data.created_at+'" disabled>')
          .append('</div>')
      });
    }
    else
    {
      if(cat_id==2)
      {
        $.get('/ultimos?cat_id='+cat_id, function(data){
          $('#info-ultimos').empty();
            $('#info-ultimos')
            .append('<div class="form-group">')
            .append('<label>Marca</label>')
            .append('<input type="text" class="form-control" name="nombre" value="'+data.nombre+'" disabled>')
            .append('</div>')
            .append('<div class="form-group">')
            .append('<label>Fecha Creado</label>')
            .append('<input type="text" class="form-control" name="nombre" value="'+data.created_at+'" disabled>')
            .append('</div>')
        });
      }
      else
      {
        if(cat_id==3)
        {
          $.get('/ultimos?cat_id='+cat_id, function(data){
            $('#info-ultimos').empty();
              $('#info-ultimos')
              .append('<div class="form-group">')
              .append('<label>Producto</label>')
              .append('<input type="text" class="form-control" name="nombre" value="'+data.nombre+'" disabled>')
              .append('</div>')
              .append('<div class="form-group">')
              .append('<label>Marca</label>')
              .append('<input type="text" class="form-control" name="nombre" value="'+data.marca_nombre+'" disabled>')
              .append('</div>')
              .append('<div class="form-group">')
              .append('<label>Categoria</label>')
              .append('<input type="text" class="form-control" name="nombre" value="'+data.categorias_nombre+'" disabled>')
              .append('</div>')
              .append('<div class="form-group">')
              .append('<label>Descripcion</label>')
              .append('<input type="text" class="form-control" name="descripcion" value="'+data.descripcion+'" disabled>')
              .append('</div>')
              .append('<div class="form-group">')
              .append('<label>Precio</label>')
              .append('<input type="text" min=1 class="form-control" name="precio" value="'+data.precio+'" disabled>')
              .append('</div>')
              .append('<div class="form-group">')
              .append('<label>Fecha Creado</label>')
              .append('<input type="text" class="form-control" name="nombre" value="'+data.created_at+'" disabled>')
              .append('</div>')
              .append('<div class="form-group">')
              .append('<center>')
              .append('<label>Imagen</label>')
              .append('<img class="img-responsive"  style="width: 150px; height: 150px;" src="/images/productos/'+data.imagen+'" alt="">')
              .append('<br>')
              .append('</center>')
              .append('</div>')
          });
        }
        else
        {
          $('#info-ultimos').empty();
        }
      }
    }
  });
</script>
@endsection
