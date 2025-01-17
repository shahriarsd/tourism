@extends('Frontend.master')
@section('content')
    <br> <br> <br>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


        <style>
            body {
                background-color: #f8f9fa;
                color: #495057;
            }

            .section-title {
                color: #007bff;
            }

            .about-img {
                border-radius: 15px;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            }

            .brand-feature {
                border: 1px solid #dee2e6;
                border-radius: 10px;
                padding: 20px;
                margin-bottom: 20px;
            }
        </style>
    </head>

    <body>

        <section class="py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <img class="img-fluid about-img" src="{{ asset('assests/aboutus.jpg') }}" alt="About Image">
                    </div>
                    <div class="col-md-6">
                        <div class="section-title mb-4">
                            <br><br>
                            <h2 class="h1">Who Are We?</h2>
                        </div>
                        <p class="lead fs-4 text-secondary mb-4">Our Travel Management System offers seamless and efficient travel solutions, catering to corporate and individual needs with personalized service and advanced technology. We prioritize convenience, cost-effectiveness, and exceptional customer experience in every journey.
</p>
                        <div class="brand-feature">
                            <div class="d-flex">
                                <div class="me-4 text-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                        fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="mb-3"> Versatile Brand</h4>
                                    <p class="text-secondary mb-0">Travel Management System streamlines travel planning with tailored solutions and cutting-edge technology to suit diverse traveler requirements.</p>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </section>
    @endsection
