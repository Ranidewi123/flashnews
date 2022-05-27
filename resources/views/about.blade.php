@extends('layouts.app')

@section('menu-about')
    active
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">About Us</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="https://source.unsplash.com/random/400x400?woman" class="card-img-top rounded-circle" alt="...">
                            </div>
                            <div class="col-md-9">
                                <table class="table">
                                    <tr>
                                        <td>Name : </td>
                                        <td>Rani Dewi Aristhania</td>
                                    </tr>
                                    <tr>
                                        <td>Email : </td>
                                        <td>anggrekaristhania@gmail.com</td>
                                    </tr>
                                    <tr>
                                        <td>Phone : </td>
                                        <td>082245326737</td>
                                    </tr>
                                    <tr>
                                        <td>GitHub : </td>
                                        <td><a href="https://github.com/Ranidewi123" class="text-decoration-none">https://github.com/Ranidewi123</a></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
