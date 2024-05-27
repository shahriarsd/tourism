
@extends('Admin.master')
@section('content')
<!DOCTYPE html>
<html lang="en">

<body>

<div class="container mt-0 mb-5">
    {{-- <a href="{{ route('hotel.create') }}" class="btn btn-primary">Create</a>
    <a href="{{ route('hotel.trash') }}" class="btn btn-warning">Trash</a> --}}
    <h2 class="text-center mb-4 mt-0">Inquiries List</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>SI</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Number</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>


                @foreach($inquiries as $key => $inquiry )
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $inquiry ->name }}</td>
                    <td>{{ $inquiry ->email }}</td>
                    <td>{{ $inquiry ->message }}</td>
                    <td>{{ $inquiry ->number }}</td>

                    <td>

                        {{-- <a href="{{ route('hotel.edit', $hotel->id) }}" class="btn btn-warning">
                            <span style="font-size: 0.7rem;"><i class="fas fa-edit"></i></span>

                        </a> --}}

                    </td>

                </tr>
                @endforeach
            </tbody>
    </table>




    </div>
</div>



</body>
</html>
@endsection
