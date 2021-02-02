@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">name</th>
                                <th scope="col">id</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                                    <tr>
                                        <th scope="row"></th>
                                        <td></td>
                                        <td></td>
                                        <td><a href=""><i class="fa fa-edit "></i></a></td>
                                    </tr>

                            </tbody>
                        </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
