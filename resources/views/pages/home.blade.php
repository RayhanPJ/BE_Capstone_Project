@extends('template');

@section('pageTitle')
    Home
@endsection

@section('mainContent')
    <div class="col-lg mb-4">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Home /</span> Choose type</h4>
            <!-- Examples -->
            <div class="row mb-5">
                <div class="col-lg-6 mb-3">
                    <div class="card h-100">
                        <img class="card-img-top" src="{{ asset('/template/assets/img/elements/2.jpg') }}" alt="Card image cap" />
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">
                                Some quick example text to build on the card title and make up the bulk of the card's
                                content.
                            </p>
                            <a href="javascript:void(0)" class="btn btn-outline-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
                    <div class="card h-100">
                        <img class="card-img-top" src="{{ asset('/template/assets/img/elements/2.jpg') }}" alt="Card image cap" />
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">
                                Some quick example text to build on the card title and make up the bulk of the card's
                                content.
                            </p>
                            <a href="javascript:void(0)" class="btn btn-outline-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-lg-6 mb-3">
                    <div class="card h-100">
                        <img class="card-img-top" src="{{ asset('/template/assets/img/elements/2.jpg') }}" alt="Card image cap" />
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">
                                Some quick example text to build on the card title and make up the bulk of the card's
                                content.
                            </p>
                            <a href="javascript:void(0)" class="btn btn-outline-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
                    <div class="card h-100">
                        <img class="card-img-top" src="{{ asset('/template/assets/img/elements/2.jpg') }}" alt="Card image cap" />
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">
                                Some quick example text to build on the card title and make up the bulk of the card's
                                content.
                            </p>
                            <a href="javascript:void(0)" class="btn btn-outline-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Examples -->
        </div>
    </div>
@endsection
