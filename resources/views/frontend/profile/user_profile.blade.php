@extends('frontend.main_master')
@section('content')
@php
$user = DB::table('users')->where('id',Auth::user()->id)->first();
@endphp

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2"><br>
                <img class="card-img-top" style="border-radius: 50%" src="{{ (!empty($user->profile_photo_path))? url('upload/user_images/'.$user->profile_photo_path):url('upload/no_image.jpg') }}" height="100%" width="100%" >
                <br><br>
                <ul class="list-group list-group-flush">
                    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
                    <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Actualizar Perfil</a>
                    <a href="{{ route('change.password') }}" class="btn btn-primary btn-sm btn-block">Cambiar Contraseña</a>
                    <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Salir</a>

                </ul>

            </div> <!-- end col md 2 -->

            <div class="col-md-2">

            </div> <!-- end col md 2 -->

            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center"><span class="text-danger">Hola... </span><strong>{{ Auth::user()->name }}</strong>
                    Actualiza tu Perfil

                    </h3><br>
                    <div class="card-body">
                        <form method="post" action="{{ route('user.profile.store') }}" enctype="multipart/form-data" >
                            @csrf
                            <div class="form-group">
		                        <label class="info-title" for="exampleInputEmail1">Nombre<span> </span></label>
		                        <input type="text" name="name" class="form-control" value="{{ $user->name }}">
		                    </div>

                            <div class="form-group">
		                        <label class="info-title" for="exampleInputEmail1">Teléfono/Celular<span> </span></label>
		                        <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
		                    </div>

                            <div class="form-group">
		                        <label class="info-title" for="exampleInputEmail1">Email<span> </span></label>
		                        <input type="email" name="email" class="form-control" value="{{ $user->email }}">
		                    </div>

                            <div class="form-group">
		                        <label class="info-title" for="exampleInputEmail1">Imagen<span> </span></label>
		                        <input type="file" name="profile_photo_path" class="form-control">
		                    </div>

                            <div class="form-group">
		                        <button type="submit" class="btn btn-danger">Actualizar</button>
		                    </div>


                        </form>
                    </div>
                </div>
            </div> <!-- end col md 6 -->



        </div> <!-- end eow md 2 -->
    </div>
</div>

@endsection
