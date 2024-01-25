@extends('layouts.main')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Добавить пиццу</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active">Главная</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <form action="{{route('pizza.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <input type="text" class="form-control" name="name" placeholder="Наименование">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="description" placeholder="Описание">
        </div>

        <div class="form-group">
          <input type="text" class="form-control" name="price" placeholder="Цена">
        </div>

        <div class="form-group">
          <div class="input-group">
            <div class="custom-file">
              <input name="image_url" type="file" class="custom-file-input" id="exampleInputFile">
              <label class="custom-file-label" for="exampleInputFile">Выбирете фото</label>
            </div>
            <div class="input-group-append">
              <span class="input-group-text">Загрузка</span>
            </div>
          </div>
        </div>

        <div class="form-group">
          <select name="categories[]" class="categories" multiple="multiple" data-placeholder="Выбирите категорию" style="width: 100%;">
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
          </select>
  </div>
          <div class="form-group">
            <select class="crustDiameters" name="crustDiameters[]" multiple="multiple" data-placeholder="Выбирите диаметр" style="width: 100%;">
              @foreach($crustDiameters as $diameter)
              <option value="{{$diameter->id}}">{{$diameter->diameter}}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <select name="crustTypes[]" class="crustTypes" multiple="multiple" data-placeholder="Выбирите тесто" style="width: 100%;">
              @foreach($crustTypes as $type)
              <option value="{{$type->id}}">{{$type->name}}</option>
              @endforeach
            </select>
          </div>
         

          <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Добавить">
          </div>

      </form>

    </div>

  </div><!-- /.container-fluid -->
</section>
@endsection