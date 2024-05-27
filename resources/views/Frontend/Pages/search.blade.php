
@extends('Frontend.master')

@section('content')
<br> <br> <br> <br>
<section class="top-packages container-fluid">
        <div class="container">
            <div class="session-title row text-center">
                <h2 class="mb-5">Top Packages</h2>
                @if (request()->has('search'))
                    <h3 class="font-weight-bold text-success mb-4 w-50 mx-auto">
                        Your Search Result: {{ request()->search }} matched with {{ $packages->count() }} Package(s)!
                    </h3>
                @endif
            </div>
            <div class="pack-row row justify-content-center">
                @if ($packages->count() > 0)
                    @foreach ($packages as $package)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="{{ asset($package->image) }}" class="card-img-top" alt="Package Image">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $package->startingpoint }} ⬌ {{ $package->destination }}</h5>
                                    <p class="card-text">
                                        <i class="far fa-calendar"></i> {{ date('d M, Y', strtotime($package->pickupdate)) }} at {{ date('h:i A', strtotime($package->pickupdate)) }} <br>
                                        <i class="far fa-clock"></i> {{ $package->duration }} <br>
                                        <b>{{ $package->price }} BDT</b>
                                    </p>
                                    <div class="text-center">
                                        <a href="{{ route('singlepackage.view', $package->id) }}" class="btn btn-outline-success">View The Package</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col">
                        <h2 class="font-weight-bold text-danger mb-6">No Packages found!!!</h2>
                    </div>
                @endif
            </div>
        </div>
    </section>

@endsection
