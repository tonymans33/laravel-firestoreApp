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

                        <h1 class="mb-2">Insert Page</h1>

                        <form class="text-center "  action="{{ route('store')}}"  method="POST">

                            {{csrf_field()}}

                            <input type="text"  class="form-control mb-4" name="title" placeholder="title">
                            <input type="text" class="form-control mb-4" name="cost" placeholder="cost">

                            <button class="btn btn-info my-4 btn-block" name="update" type="submit" style="width:200px;">Insert</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
