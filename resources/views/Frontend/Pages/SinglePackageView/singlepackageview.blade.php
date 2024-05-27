@extends('Frontend.master')
@section('content')
<br> <br> <br> <br> <br> <br>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package View</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Roboto', sans-serif;
            height: 100vh;
            margin: 0;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            overflow: hidden;
            width: 800px;
            display: flex;
            flex-direction: row;
        }



        .left-content {
            flex: 1;
            padding: 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
        }

        .card-img-top {
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            width: 100%;
            max-height: 300px;
            object-fit: cover;
            margin-bottom: 15px;
        }

        .terms-and-conditions {
            text-align: center;
        }

        .right-content {
            flex: 1;
            padding: 30px;
        }

        .card-title {
            font-size: 2.5rem;
            color: #343a40;
            margin-bottom: 15px;
        }

        .card-text {
            color: #6c757d;
            margin-bottom: 15px;
            font-size: 1.2rem;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .icon-hover:hover {
            border-color: #3b71ca !important;
            background-color: white !important;
            color: #3b71ca !important;
        }

        .icon-hover:hover i {
            color: #3b71ca !important;
        }
    </style>
</head>

<body>
    <!-- 
    <div class="container">
        <div class="card mx-auto mb-5">

            <div class="left-content">

                <img src="{{ asset($singlepackageview->image) }}" class="card-img-top img-fluid" alt="">

                    <h2 class="card-title text-danger"> Conditions</h2>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">1. If you wish to cancel your booking after payment is made, you must do so at least 24 hours prior to the pickup date, and you will receive a refund of 80% of the total amount paid.</li>
                        <li class="list-group-item">2. Refunds will not be provided if cancellation is made less than 24 hours before the pickup date.</li>
                    </ul>

            </div>

            <div class="right-content mb-5 my-1">

                <p class="card-text"><strong>Pick Up: </strong>{{ date('j M, Y \a\t g:i A', strtotime($singlepackageview->pickupdate)) }} from  {{ $singlepackageview->startingpoint }}.</p>
                <p class="card-text"><strong>Destination:</strong> {{ $singlepackageview->destination }} </p>
                <p class="card-text"><strong>Duration:</strong> {{ $singlepackageview->duration }}</p>



                <p class="card-text"><strong> Amount:</strong> {{ $singlepackageview->price }} </p>
                <p class="card-text"><strong>Breakfast:</strong> {{ $singlepackageview->breakfast }}</p>
                <p class="card-text"><strong>Lunch:</strong> {{ $singlepackageview->lunch }}</p>
                <p class="card-text"><strong>Dinner:</strong> {{ $singlepackageview->dinner }}</p>
                <p class="card-text"><strong>Hotel Type:</strong> {{ $singlepackageview->hotels->type }} </p>
                <p class="card-text"><strong>Transport:</strong>{{ $singlepackageview->transports->type }}</p>
                <p class="card-text"><strong>Spot Names:</strong> {{ $singlepackageview->spot }}</p>



                <a href="{{ route("reservation.form", $singlepackageview->id) }}">
                    <button type="button" class="btn btn-outline-success btn-block">Booking the Package</button>
                </a>

            </div>


        </div>
    </div> -->

    <!-- content -->
    <section class="py-5">
        <div class="container">
            <div class="row gx-5">
                <aside class="col-lg-6">
                    <div class="border rounded-4 mb-3 d-flex justify-content-center">
                        <a data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image" href="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big.webp">
                            <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit" src="{{ asset($singlepackageview->image) }}" />
                        </a>
                    </div>

                    <!-- thumbs-wrap.// -->
                    <!-- gallery-wrap .end// -->
                </aside>
                <main class="col-lg-6">
                    <div class="ps-lg-3">
                   
                        <h4 class="title text-dark">
                            <!-- {{ date('j M, Y \a\t g:i A', strtotime($singlepackageview->pickupdate)) }} from {{ $singlepackageview->startingpoint }} -->
                            {{$singlepackageview->startingpoint}} ⬌ {{$singlepackageview->destination}}
                         </h4>
                         <span><i class="far fa-calendar"></i> {{ date('d M, Y', strtotime($singlepackageview->pickupdate)) }} at {{ date('h:i A', strtotime($singlepackageview->pickupdate)) }}</span>


                        <div class="mb-3" style="margin-top: 5px;">
                            <span class="h5"> {{ $singlepackageview->price }} </span>
                            <span class="text-muted">/BDT</span>
                        </div>

                        <p>
                        {{ $singlepackageview->description }}
                        </p>

                        <div class="row">
            
                            <dt class="col-3">Hotels Type</dt>
                            <dd class="col-9">{{ $singlepackageview->hotels->type }}</dd>
                            <dt class="col-3">Transport Type</dt>
                            <dd class="col-9">{{ $singlepackageview->transports->type }}</dd>
                            <dt class="col-3">Spot</dt>
                            <dd class="col-9">{{ $singlepackageview->spot }}</dd>


                            <!-- <dt class="col-3">Breakfast</dt>
                            <dd class="col-9">{{ $singlepackageview->breakfast }}</dd> -->

                            <dt class="col-3">Launch</dt>
                            <dd class="col-9">{{ $singlepackageview->lunch }}</dd>

                            <dt class="col-3">Dinner</dt>
                            <dd class="col-9">{{ $singlepackageview->dinner }}</dd>
                        </div>

                        <hr />

                        <a href="{{ route("reservation.form", $singlepackageview->id) }}">
                            <button type="button" class="btn btn-outline-success btn-block">Booking the Package</button>
                        </a>
                    </div>
                </main>
            </div>
        </div>
    </section>
    <!-- content -->

    <section class="bg-light border-top py-4">
        <div class="container">
            <div class="row gx-4">
                <div class="col-lg-8 mb-4">
                    <div class="border rounded-2 px-3 py-2 bg-white">
                        <!-- Pills navs -->
                        <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                            <li class="nav-item d-flex" role="presentation">
                                <a class="nav-link d-flex align-items-center justify-content-center w-100 active" id="ex1-tab-1" data-mdb-toggle="pill" href="#ex1-pills-1" role="tab" aria-controls="ex1-pills-1" aria-selected="true">Specification</a>
                            </li>
                        </ul>
                        <!-- Pills navs -->

                        <!-- Pills content -->
                        <!-- <h3><span style="color:#ff6600"><strong>Departure details:</strong></span></h3>
                        <p><span style="color:#333333">Every Wednesday &amp; Thursday</span></p>
                        <p>&nbsp;</p> -->

                        <!-- <h3><span style="color:#ff6600" class="mt-3"><strong>Package Plan:</strong></span></h3>
                        <p>&nbsp;</p>
                        <div class="table-responsive">
                        <div style="margin-bottom: 10px;">
                            <h4>Day 1</h4>
                            <p>Day One</p>
                        </div>
                        <div>
                            <h4>Day 2</h4>
                            <p>Day Two</p>
                        </div>
                        <div>
                            <h4>DayThree</h4>
                            <p>Day Three</p>
                        </div>
                            <p>&nbsp;</p>
                        </div> -->
                        <h3><span style="color:#ff6600"><strong>Package Price (Per Person):</strong></span></h3>
                        <p>&nbsp;</p>
                        <div class="table-responsive">
                            <table border="1" cellspacing="0" class="border-dark table table-bordered" style="background:#f2f2f2; border-collapse:collapse">
                             
                            <tbody>
                                    <tr>
                                        <td style="border-color:#dee2e6; border-style:solid; border-width:1px"><span style="color:#333333">Adult on Single Bed Room (Age greater than 13)</span></td>
                                        <td style="border-color:#dee2e6; border-style:solid; border-width:1px"><span style="color:#333333">TK. {{$singlepackageview->price +1000}} </span></td>
                                    </tr>
                                    <tr>
                                        <td style="border-color:#dee2e6; border-style:solid; border-width:1px"><span style="color:#333333"> Couple Room (Age greater than 18)</span></td>
                                        <td style="border-color:#dee2e6; border-style:solid; border-width:1px"><span style="color:#333333">TK.  {{  2 * $singlepackageview->price + 1500}}</span>
                                        (1500 Tk will be added because of Couple Bed Single Room)</td>
                                    </tr>
                                    <tr>
                                        <td style="border-color:#dee2e6; border-style:solid; border-width:1px"><span style="color:#333333">Adult for Share Room (Age greater than 13)</span></td>
                                        <td style="border-color:#dee2e6; border-style:solid; border-width:1px"><span style="color:#333333">TK.  {{$singlepackageview->price }}</span></td>
                                    </tr>
                                    <tr>
                                        <td style="border-color:#dee2e6; border-style:solid; border-width:1px"><span style="color:#333333">Child (Age between 7-13 years)</span></td>
                                        <td style="border-color:#dee2e6; border-style:solid; border-width:1px"><span style="color:#333333">TK.  {{$singlepackageview->price * 0.5}}</span></td>
                                    </tr>
                                    <tr>
                                        <td style="border-color:#dee2e6; border-style:solid; border-width:1px"><span style="color:#333333">Child (Less than 6 years)  </span></td>
                                        <td style="border-color:#dee2e6; border-style:solid; border-width:1px"><span style="color:#333333">TK. 00.00 (But share transport and hotel room with parents)</span></td>
                                    </tr>
                                    <p>Here the amount will be calculated based on the number of adults and children selected.</p>

                                </tbody>





                            </table>
                            <p>&nbsp;</p>
                        </div>
                        <div class="table-responsive">&nbsp;</div>
                        <h3><span style="color:#ff6600"><strong>Package Includes:</strong></span></h3>
                        <p>&nbsp;</p>
                        <ul style="list-style-type: disc;">
                            <li>1.Transport information: AC Bus/Non-AC Bus/avaiable in our services</li>
                            <li>2.Accommodation in a comfortable three-star,Four-star,Five-star Hotel services we are providing</li>
                            <li>3.Daily continental breakfast/lunch/Dinner.</li>
                            <li>4.You can chose the Bed single-bed/Double-Bed </li>
                            <li>5.Daily transportation on modern coaches.</li>
                            <li>6.Experienced and professional coach driver.</li>
                            <li>7.The services of an experienced tour manager.</li>
                            <li>8.When we are going any places most of the popular place visit</li>
                            <li>9.Primary Health services providing us</li>
                        </ul>

                        <p>&nbsp;</p>

                        <h3><span style="color:#ff6600"><strong>Package Excludes:</strong></span></h3>
                        <p>&nbsp;</p>
                        <ul>
                            <li><span style="color:#333333">1.Major-helth problem treathment cost we are not providing</span></li>
                            <li><span style="color:#333333">2.Expenses of a personal nature such as laundry, phone calls, internet usage, and gratuities are not included.</span></li>
                            <li><span style="color:#333333">3.we are not provide any international place</span></li>
                            <li><span style="color:#333333">4.Optional Activities: Any optional excursions, activities, or tours not mentioned in the itinerary are not included and may incur additional charges.</span></li>
                            <li><span style="color:#333333">5.Local Transportation: Transportation within the destination city for personal activities or excursions not included in the itinerary isn't part of the package.</span></li>
                            <li><span style="color:#333333">6.In the package we are not providing any Drinks</span></li>
                            <li><span style="color:#333333">7.In the package do not provide air-plane ticket</span></li>
                            <li><span style="color:#333333"> </span></li>
                            <li><span style="color:#333333"> </span></li>
                        </ul>
                        <!-- Pills content -->
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="px-0 border rounded-2 shadow-0">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title" style="font-size: 30px;">Contact Us</h5>
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-mobile"></i>
                                    <div class="info">
                                        <h6 class="nav-link mb-1">
                                            01774282672
                                        </h6>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-envelope"></i>
                                    <div class="info">
                                        <h6 class="nav-link mb-1">
                                            Sifat@gmail.com
                                        </h6>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <div class="info">
                                        <h6 class="nav-link mb-1">
                                            Uttara Sector-10 House # 12, <br>
                                            Road # 15, Uttara, Dhaka - 1213, Bangladesh
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3">
                            <div class="card-body">
                                <!-- <h5 class="card-title" style="font-size: 30px;">Terms and Conditions</h5> -->
                                <div class="d-flex align-items-center">
                                    <!-- <i class="fa-solid fa-mobile"></i> -->
                                    <div class="info">
                                    <h2 class="card-title text-danger"> Conditions</h2>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">1. If you wish to cancel your booking after payment <br> is made, you must do so at least 24 hours prior<br> to the pickup date, and you will receive a <br>refund of 80% of the total amount paid.</li>
                        <li class="list-group-item">2. Refunds will not be provided if cancellation is made<br> less than 24 hours before the pickup date.</li>
                    </ul>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <!-- <i class="fa-solid fa-envelope"></i> -->
                                    <div class="info">
                                        <h6 class="nav-link mb-1">
                                            
                                        </h6>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <!-- <i class="fa-solid fa-location-dot"></i> -->
                                    <div class="info">
                                        <!-- <h6 class="nav-link mb-1">
                                            Bashati Condominium (Floor 10/D), House # 15, <br>
                                            Road # 17, Banani, Dhaka - 1213, Bangladesh
                                        </h6> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>


@endsection