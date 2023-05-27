@if(session('success'))
  <div class="alert alert-success ">
    <button type="button" class="close pull-right" data-dismiss="alert" aria-label="close">
      <span aria-hidden="true">&times;</span>
    </button>
    {!! session('success') !!}
  </div>
@endif

@if(session('error'))
  <div class="alert alert-danger ">
    <button type="button" class="close pull-right" data-dismiss="alert" aria-label="close">
      <span aria-hidden="true">&times;</span>
    </button>
    {!! session('error') !!}
  </div>
@endif

@if(session('info'))
  <div class="alert alert-info ">
    <button type="button" class="close pull-right" data-dismiss="alert" aria-label="close">
      <span aria-hidden="true">&times;</span>
    </button>
    {!! session('info') !!}
  </div>
@endif

@if(count($errors) > 0)
  <div class="alert alert-danger text-left">
    <button type="button" class="close pull-right" data-dismiss="alert" aria-label="close">
      <span aria-hidden="true">&times;</span>
    </button>
    <b>Warning !</b>
    <ul>
      @foreach ($errors->all() as $error)
      <li> {{ $error }} </li>
      @endforeach
    </ul>
  </div>
@endif
