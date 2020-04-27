

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Elesos</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        <user-component  :user_data='@json($user_datas)'></user-component>

						<h1><center>{{$id}}:{{$title}}</center></h1>
						<br />

						{!! $content !!}


                        @include('layouts.footer', ['my_title' => 'aaaaaaaaaa'])

                        <tag-component :article_id={{$id}} :my_data='@json($tag_name_arr)'></tag-component>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


