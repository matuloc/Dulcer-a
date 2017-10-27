<div class="col-md-4">
  <div class="categories">
    <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
      <br>
    <h3 align="center">Categorias</h3>
    <br>
    </ol>
    <ul class="cate">
      @foreach($Categorias as $categoria)
      <li><a href="{{ route('categorias',['id'=>$categoria->id]) }}"><i class="fa fa-arrow-right" aria-hidden="true"></i>{{ $categoria->nombre }}</a></li>
      @endforeach
    </ul>

  </div>
</div>
