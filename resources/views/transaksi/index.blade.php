@extends('templates/header')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Data Transaksi</h1>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Data Transaksi</h3>

      <div class="card-tools">
        <a href="{{route('transaksi.create')}}">
          <button class="btn btn-primary">Create</button>
        </a>
      </div>
    </div>
    <div class="card-body">
      @include('transaksi.partials.table_data')
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

</section>
<!-- /.content -->
@endsection