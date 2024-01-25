@extends('layouts.main')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Редактировать продукт</h1>
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
      <form action="{{route('product.update', $product->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="form-group">
          <input type="text" class="form-control" value="{{$product->title}}" name="title" placeholder="Наименование">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" value="{{$product->description}}" name="description" placeholder="Описание">
        </div>
        <div class="form-group">
          <textarea name="content" cols="30" rows="10" class="form-control" placeholder="Контент">{{$product->content}}</textarea>

        </div>

        <div class="form-group">
          <input type="text" class="form-control" name="price" value="{{$product->price}}" placeholder="Цена">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="count" value="{{$product->count}}" placeholder="Количество ">
        </div>
        <div class="form-group">
          <div class="input-group">
            <div class="custom-file">
              <input name="preview_image" type="file" class="custom-file-input" id="exampleInputFile">
              <label class="custom-file-label" for="exampleInputFile"  >Выбирете фото</label>
            </div>
            <div class="input-group-append">
              <span class="input-group-text">Загрузка</span>
            </div>
          </div>
        </div>

        <div class="form-group">
          <select class="form-control select2" name="category_id" style="width: 100%;">
            <option selected="selected" disabled>Выбирете категорию</option>

            <option value="{{$product->category_id}}">{{$product->category->title}}</option>


          </select>
        </div>

        <div class="form-group">
          <select name="tags[]" class="tags" multiple="multiple" data-placeholder="Выбирите тег" style="width: 100%;">
            @foreach($tags as $tag)
            <option value="{{$tag->id}}" {{ $product->tags->contains($tag->id) ? 'selected' : '' }}>
              {{ $tag->title }}
            </option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
    <select class="colors" name="colors[]" multiple="multiple" data-placeholder="Выбирите цвет" style="width: 100%;">
        @foreach($colors as $color)
            <option value="{{$color->id}}" {{ $product->colors->contains($color->id) ? 'selected' : '' }}>
                {{ $color->title }}
            </option>
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