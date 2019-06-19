@if(count($errors)>0)
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger float-center" style="max-width: 35rem; text-align:center; margin: auto; font-size:18px;" role="alert">
            {{$error}}
            </div>
        @endforeach
@endif

@if(session('error'))
    <div class="alert alert-danger float-center" style="max-width: 35rem; text-align:center; margin: auto; font-size:18px;" role="alert">
        {{session('error')}}
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success float-center" style="max-width: 35rem; text-align:center; margin: auto; font-size:18px;" role="alert">
        {{session('success')}}
    </div>
@endif