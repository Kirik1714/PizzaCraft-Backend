@extends('layouts.main')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Продукты</h1>
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
      <div class="col-12">
        <div class="card">
          <div class="card-header d-flex ">
            <div class="mr-4">
              <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">Редактировать</a>

            </div>
            <form action="{{route('product.destroy', $product->id)}}" method="post">
              @csrf
              @method('delete')
              <input type="submit" value="Удалить" class="btn btn-danger">
            </form>

          </div>

          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">

              <tbody>
                <tr>
                  <td>ID</td>
                  <td>{{$product->id}}</td>

                </tr>

                <tr>
                  <td>Название</td>
                  <td>{{$product->title}}</td>

                </tr>
                <tr>
                  <td>Описание</td>
                  <td>{{$product->description}}</td>

                </tr>
                <tr>
                  <td>Контент</td>
                  <td>{{$product->content}}</td>

                </tr>
                <tr>
                  <td>Цена</td>
                  <td>{{$product->price}}</td>

                </tr>
                <tr>
                  <td>Количество</td>
                  <td>{{$product->count}}</td>

                </tr>
                <tr>
                  <td>Изображение</td>
                  <td>
                    @if ($product->preview_image)
                    <img src="{{ Storage::url($product->preview_image) }}" class="w-25" alt="Preview Image">
                    @else
                    <p>No Preview Image Available</p>
                    @endif
                  </td>

                </tr>
                <tr>
                  <td>Категория</td>
                  <td>{{$product->category->title}}</td>

                </tr>

                <tr>
                  <td>Цвета</td>
                  <td>@foreach ($product->colors as $color)
                    <li>{{ $color->title }}</li>
                    @endforeach
                  </td>

                </tr>
                <tr>
                  <td>Теги</td>
                  <td>@foreach ($product->tags as $tag)
                    <li>{{ $tag->title }}</li>
                    @endforeach
                  </td>

                </tr>





              </tbody>
            </table>
          </div>

        </div>

      </div>
    </div>

  </div>


</section>
@endsection