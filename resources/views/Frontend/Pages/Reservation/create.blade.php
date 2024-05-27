@extends('Frontend.master')
@section('content')
<br> <br> <br> <br>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: #fff;
            border-radius: 15px 15px 0 0;
        }
        .form-control {
            border-radius: 10px;
        }
        button.btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 10px;
        }
        button.btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

<div class="container mt-5">
    <form action="{{ route('reservation.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center bg-info text-white">
                        <h4 class="mb-0 font-weight-bold">Reservation Form</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name" class="font-weight-bold">Name</label>
                            <input type="name" value="{{ old('name') }}" required name="name" class="form-control" id="name" placeholder="Enter your Name">
                        </div>
                        <div class="form-group">
                            <label for="email" class="font-weight-bold">Email</label>
                            <input type="email" value="{{ old('email') }}" required name="email" class="form-control" id="email" placeholder="Enter your email">
                        </div>
                        <div class="form-group">
                            <label for="contact" class="font-weight-bold">Contact Number</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-primary text-white">
                                        <i class="fas fa-phone"></i>
                                    </span>
                                </div>
                                <input type="tel" value="{{ old('number') }}" pattern="[0-9]{1,13}" name="number" required class="form-control" id="contact" placeholder="Enter your contact number">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address" class="font-weight-bold">Address</label>
                            <textarea class="form-control" required name="address" id="address" rows="1" placeholder="Enter your address">{{ old('address') }}</textarea>
                        </div>


                        <div class="form-group">
                            <label for="image" class="font-weight-bold">Image</label>
                            <input type="file" accept="image/*" name="image" class="form-control" id="image" placeholder="Upload your image">
                        </div>
                        <input type="hidden" name="price" value="{{ $singlepackageview->price }}">
                        <input type="hidden" name="id" value="{{ $singlepackageview->id }}">
                        <input type="hidden" name="destination" value="{{ $singlepackageview->destination }}">
                        <input type="hidden" name="pickupdate" value="{{ $singlepackageview->pickupdate }}">
                        <input type="hidden" name="startingpoint" value="{{ $singlepackageview->startingpoint }}">
                        <div class="form-group">
                            <label for="quantity" class="font-weight-bold">Adult (Age above 13 will count as adult and less than 7 years no need to payment extra money but they will share with parents transport and hotel room)</label>
                            <div class="input-group">
                                <input type="number" value="{{ old('quantity', 1) }}" required name="quantity" class="form-control border-0 bg-light" id="quantity" placeholder="Enter quantity" aria-describedby="quantity-addon" min="1">
                                <div class="input-group-append">
                                    <span class="input-group-text bg-primary text-white" id="quantity-addon">Person(s)</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="child" class="font-weight-bold">Kids (Age 7 to 13, 50% discount) </label>
                            <div class="input-group">
                                <input type="number" value="{{ old('child', 0) }}" required name="child" class="form-control border-0 bg-light" id="child" placeholder="Enter no of child" aria-describedby="child-addon" min="0">
                                <div class="input-group-append">
                                    <span class="input-group-text bg-primary text-white" id="child-addon">Person(s)</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="chooseroom" class="font-weight-bold">Choose Room</label>
                            <div class="input-group">
                                <select name="chooseroom" required class="custom-select form-control border-0 bg-light" id="roomNumber">
                                    <option selected disabled>Select Room...</option>
                                    <option>Single Bed Room for Single Person</option>
                                    <option>Couple Bed Room for Couple</option>
                                    <option>Double Bed Room for Share</option>
                                </select>
                            </div>
                            <span class="text-warning">
                                @error('chooseroom')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="amount" class="font-weight-bold">Total Amount</label>
                            <input type="text" readonly class="form-control" id="amount" name="amount">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Payment</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var basePrice = parseFloat('{{ $singlepackageview->price }}');

        function updateAmount() {
            var roomType = document.getElementById('roomNumber').value;
            var quantity = parseFloat(document.getElementById('quantity').value) || 0;
            var child = parseFloat(document.getElementById('child').value) || 0;

            var baseAmount = basePrice * quantity + basePrice * 0.5 * child;

            var additionalAmount = 0;
            if (roomType === "Single Bed Room for Single Person") {
                additionalAmount = 1000 * quantity;
            } else if (roomType === "Couple Bed Room for Couple") {
                additionalAmount = 750 * quantity;
            }

            var updatedAmount = baseAmount + additionalAmount;
            document.getElementById('amount').value = updatedAmount.toFixed(2);
        }

        document.getElementById('roomNumber').addEventListener('change', updateAmount);
        document.getElementById('quantity').addEventListener('input', updateAmount);
        document.getElementById('child').addEventListener('input', updateAmount);

        updateAmount();
    });
</script>

</body>
</html>
@endsection


