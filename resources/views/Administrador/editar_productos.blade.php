@extends('Administrador.layouts.cabecera')
@section('content')
<div class="content-wrapper">
    <section class="content container-fluid">
      @include('flash::message')
      <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Actualizacion de Productos</h3>
              <div class="form-group">
                  <select class="form-control select2" style="width: 100%;" name="editar" id="editar">
                    <option value="">Seleccione el producto que desea cambiar</option>
                    @foreach($productos as $producto)
                    <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                    @endforeach
                  </select>
              </div>
            </div>
            <div class="box-body" id="info-ver_agregar">
            <!-- -->
          </div>
              {!! Form::open(['route'=>'admin.editar_producto','method'=>'POST','enctype'=>'multipart/form-data']) !!}
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
              <h3 class="box-title">Eliminar</h3>
              <div class="form-group">
                <select class="form-control select2" style="width: 100%;" name="eliminar" id="eliminar">
                  <option value="">Seleccione lo que quiere eliminar</option>
                  <option value="1">Categoría</option>
                  <option value="2">Marca</option>
                  <option value="3">Productos</option>
                </select>
              </div>
            </div>
              <div class="box-body" id="info-eliminar">
              <!-- -->
            </div>
              {!! Form::open(['route'=>'admin.eliminar_producto','method'=>'POST','enctype'=>'multipart/form-data']) !!}
                {{ csrf_field() }}
              <div class="box-body" id="info-post_eliminar">
                <!-- -->
              </div>
            {!! Form::close() !!}
          </div>
      </div>
    </section>
</div>
<!-- script editar -->
<script>
  $('#editar').on('change',function(e){
    console.log(e);
    var cat_id=e.target.value;
    $.get('/editar?cat_id='+cat_id, function(data){
      $('#info-agregar').empty();
      $.each(data,function(index, info){
        $('#info-agregar')
        .append('<div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">')
        .append('<label>Producto</label>')
        .append('<input type="hidden" class="form-control" name="id" value="'+info.id+'" >')
        .append('<input type="text" class="form-control" name="nombre" value="'+info.nombre+'" >')
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
        .append('<label>Categoria</label>')
        .append('<div class="form-group"><select class="form-control select2" style="width: 100%;" name="categorias" id="seleccionar">@foreach($categorias as $categoria)<option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>@endforeach</select>@if ($errors->has('categoria'))<span class="help-block"><strong>{{ $errors->first('categoria') }}</strong></span>@endif</div>')
        .append('</div>')
        .append('<div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">')
        .append('<label>Descripcion</label>')
        .append('<input type="text" class="form-control" name="descripcion" value="'+info.descripcion+'">')
        .append('@if ($errors->has('descripcion'))')
        .append('<span class="help-block">')
        .append('<strong>{{ $errors->first('descripcion') }}</strong>')
        .append('</span>')
        .append('@endif')
        .append('</div>')
        .append('<div class="form-group{{ $errors->has('precio') ? ' has-error' : '' }}">')
        .append('<label>Precio</label>')
        .append('<input type="number" min=1 class="form-control" name="precio" value="'+info.precio+'">')
        .append('@if ($errors->has('precio'))')
        .append('<span class="help-block">')
        .append('<strong>{{ $errors->first('precio') }}</strong>')
        .append('</span>')
        .append('@endif')
        .append('</div>')
        .append('<div class="form-group">')
        .append('<center>')
        .append('<label>Imagen</label>')
        .append('<img class="img-responsive"  style="width: 150px; height: 150px;" src="/images/productos/'+info.imagen+'" alt="">')
        .append('<br>')
        .append('{!! Form::label('AGREGAR NUEVO') !!}')
        .append('{!! Form::file('imagen', null) !!}')
        .append('<p class="help-block">Seleccione nueva imagen para este producto (Recomendado: 300x300 pixeles).</p>')
        .append('</center>')
        .append('</div>')
        .append('<div class="box-footer">')
        .append('<button type="submit" class="btn btn-primary actualizar">ACTUALIZAR PRODUCTO</button>')
        .append('</div>')
      });
    });
  });
</script>
<!-- script seleccionar a eliminar -->
<script>
  $('#eliminar').on('change',function(e){
    console.log(e);
    var cat=e.target.value;
    if(cat==1)
    {
      $('#info-eliminar').empty();
      $('#info-eliminar')
      .append('<div class="form-group"><select class="form-control select2" style="width: 100%;" name="info-a_eliminar" id="info-a_eliminar"><option value="">Seleccione el producto que desea cambiar</option>@foreach($categorias as $categoria)<option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>@endforeach</select></div>')
      $(document).on('change','#info-a_eliminar',function(e){
        console.log(e);
        var id=e.target.value;
        if(id!=null)
        {
          $.get('/eliminar_cat?id='+id, function(data){
            $('#info-post_eliminar').empty();
            $.each(data,function(index, info){
              $('#info-post_eliminar')
              .append('<div class="form-group">')
              .append('<label>Categorias</label>')
              .append('<input type="hidden" class="form-control" name="id" value="'+info.id+'" >')
              .append('<input type="hidden" class="form-control" name="eliminar" value="cat" >')
              .append('<input type="text" class="form-control" name="nombre" value="'+info.nombre+'" disabled>')
              .append('</div>')
              .append('<div class="box-footer">')
              .append('<button type="submit" class="btn btn-danger">ELIMINAR</button>')
              .append('</div>')
            });
          });
        }
        else {
          $('#info-post_eliminar').empty();
        }
        });
    }
    else
    {
      if(cat==2)
      {
        $('#info-eliminar').empty();
        $('#info-eliminar')
        .append('<div class="form-group"><select class="form-control select2" style="width: 100%;" name="info-a_eliminar" id="info-a_eliminar"><option value="">Seleccione el producto que desea cambiar</option>@foreach($marcas as $marca)<option value="{{ $marca->id }}">{{ $marca->nombre }}</option>@endforeach</select></div>')
        $(document).on('change','#info-a_eliminar',function(e){
          console.log(e);
          var id=e.target.value;
          if(id!=null)
          {
            $.get('/eliminar_mar?id='+id, function(data){
              $('#info-post_eliminar').empty();
              $.each(data,function(index, info){
                $('#info-post_eliminar')
                .append('<div class="form-group">')
                .append('<label>Marcas</label>')
                .append('<input type="hidden" class="form-control" name="id" value="'+info.id+'" >')
                .append('<input type="hidden" class="form-control" name="eliminar" value="mar" >')
                .append('<input type="text" class="form-control" name="nombre" value="'+info.nombre+'" disabled>')
                .append('</div>')
                .append('<div class="box-footer">')
                .append('<button type="submit" class="btn btn-danger">ELIMINAR</button>')
                .append('</div>')
              });
            });
          }
          else {
              $('#info-post_eliminar').empty();
          }
        });
      }
      else
      {
        if(cat==3)
        {
          $('#info-eliminar').empty();
          $('#info-eliminar')
          .append('<div class="form-group"><select class="form-control select2" style="width: 100%;" name="info-a_eliminar" id="info-a_eliminar"><option value="">Seleccione el producto que desea cambiar</option>@foreach($productos as $producto)<option value="{{ $producto->id }}">{{ $producto->nombre }}</option>@endforeach</select></div>')
          $(document).on('change','#info-a_eliminar',function(e){
            console.log(e);
            var id=e.target.value;
            if(id!=null)
            {
              $.get('/eliminar_prod?id='+id, function(data){
                $('#info-post_eliminar').empty();
                $.each(data,function(index, info){
                  $('#info-post_eliminar')
                  .append('<div class="form-group">')
                  .append('<label>Producto</label>')
                  .append('<input type="hidden" class="form-control" name="id" value="'+info.productos_id+'" >')
                  .append('<input type="hidden" class="form-control" name="eliminar" value="prod" >')
                  .append('<input type="text" class="form-control" name="nombre" value="'+info.producto_nombre+'" disabled>')
                  .append('</div>')
                  .append('<div class="form-group">')
                  .append('<label>Marca</label>')
                  .append('<div class="form-group"><select class="form-control select2" style="width: 100%;" name="seleccionar" id="seleccionar" disabled>@foreach($marcas as $marca)<option value="">'+info.marca_nombre+'</option>@endforeach</select></div>')
                  .append('</div>')
                  .append('<div class="form-group">')
                  .append('<label>Categoria</label>')
                  .append('<div class="form-group"><select class="form-control select2" style="width: 100%;" name="seleccionar" id="seleccionar" disabled>@foreach($categorias as $categoria)<option value="">'+info.categorias_nombre+'</option>@endforeach</select></div>')
                  .append('</div>')
                  .append('<div class="form-group">')
                  .append('<label>Descripcion</label>')
                  .append('<input type="text" class="form-control" name="descripcion" value="'+info.productos_descripcion+'" disabled>')
                  .append('</div>')
                  .append('<div class="form-group">')
                  .append('<label>Precio</label>')
                  .append('<input type="number" min=1 class="form-control" name="precio" value="'+info.productos_precio+'" disabled>')
                  .append('</div>')
                  .append('<div class="form-group">')
                  .append('<center>')
                  .append('<label>Imagen</label>')
                  .append('<img class="img-responsive"  style="width: 150px; height: 150px;" src="/images/productos/'+info.productos_imagen+'" alt="">')
                  .append('<br>')
                  .append('</center>')
                  .append('</div>')
                  .append('<div class="box-footer">')
                  .append('<button type="submit" class="btn btn-danger">ELIMINAR</button>')
                  .append('</div>')
                });
              });
            }
            else {
                $('#info-post_eliminar').empty();
            }
          });
        }
        else
        {
          $('#info-eliminar').empty();
        }
      }
    }
  });
</script>

@endsection
