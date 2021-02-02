@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <h1 class="mb-2">Edit Page</h1>

                            <form class="text-center "  action="{{ route('update' , $itemID)}}"  method="POST">

                                {{csrf_field()}}

                                <input type="text" value="{{$item['title']}}" class="form-control mb-4" name="title">
                                <input type="text" value="{{$item['cost']}}" class="form-control mb-4" name="cost" placeholder="Password">

                                <button class="btn btn-info my-4 btn-block" name="update" type="submit" style="width:200px;">update</button>

                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
