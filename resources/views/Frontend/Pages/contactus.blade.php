@extends('Frontend.master')
@section('content')
<br> <br> <br> <br> <br> <br> <br>
    <div class="row contact-rooo no-margin">
        <div class="container">
            <div class="row">
                <div style="padding:20px" class="col-sm-7">

                    @if (session('success'))
                    <div class="alert alert-success">
                    {{session('success')}}
                    </div>
                    @endif
                    
                    <h2 >Contact Form</h2> <br>

                    <form action="{{route('contact.store')}}" method="POST">
                        @csrf

                    <div class="row cont-row">
                        <div  class="col-sm-3"><label>Enter Name </label><span>:</span></div>
                        <div class="col-sm-8"><input type="text" value="{{old('name')}}"  placeholder="Enter Name" name="name" class="form-control input-sm"  ></div>
                        @error('name')
                            <span class="text-warning">
                            {{$message}}
                            </span>
                        @enderror
                    </div>
                    <div  class="row cont-row">
                        <div  class="col-sm-3"><label>Email Address </label><span>:</span></div>
                        <div class="col-sm-8"><input type="text"value="{{old('email')}}"  name="email" placeholder="Enter Email Address" class="form-control input-sm"  ></div>

                        @error('email')
                        <span class="text-warning">
                        {{$message}}
                        </span>
                    @enderror

                    </div>
                    <div  class="row cont-row">
                        <div  class="col-sm-3"><label>Mobile Number</label><span>:</span></div>
                        <div class="col-sm-8"><input type="text" value="{{old('number')}}"  name="number" placeholder="Enter Mobile Number" class="form-control input-sm"  ></div>
                        @error('number')
                        <span class="text-warning">
                        {{$message}}
                        </span>
                    @enderror

                    </div>
                    <div  class="row cont-row">
                        <div  class="col-sm-3"><label>Enter Message</label><span>:</span></div>
                        <div class="col-sm-8">
                            <textarea rows="5" name="message" value="{{old('message')}}" placeholder="Enter Your Message" class="form-control input-sm"></textarea>
                        </div>
                        @error('message')
                        <span class="text-warning">
                        {{$message}}
                        </span>
                    @enderror
                    </div>
                    <div style="margin-top:10px;" class="row">
                        <div style="padding-top:10px;" class="col-sm-3"><label></label></div>
                        <div class="col-sm-8">
                            <button class="btn btn-success btn-sm" type="submit">Send Message</button>
                        </div>
                    </div>

                    {{-- <button class="btn btn-info" type="submit"> Send</button> --}}

                </form>
                </div>
                <div class="col-sm-5">

                    <div style="margin:50px" class="serv">

        <h2 style="margin-top:10px;">Address</h2>

                        Uttara <br>
                        S #10, R#13, H#15 <br>
                        Email: isifat@gmail.com<br>
                        Facebook: www.facebook.com<br>

                    </div>


                </div>

            </div>
        </div>

    </div>


@endsection