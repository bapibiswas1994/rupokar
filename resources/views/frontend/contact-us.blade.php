@extends('layouts.frontend.layout')
@section('style')
    <!-- Write your custom css code here--> 
@endsection
@section('content')
    <div class="main">
        <!-- Write your code here-->

    <div class="contact">        
        <div class="wrapper">
            <div class="header">
              <h2>Contact us</h2>
              <h5>Do you have a question?<br> Send us a message and we will respond<br> as soon as possible.</h5>
            </div>
            <form>
              <h5>Name</h5>
              <input type="text" name="name">
              <h5>Email</h5>
              <input type="email" name="email">
              <h5>Subject</h5>
              <input type="text" name="sub">
              <h5>Message</h5>
              <textarea></textarea>
              <button>Send</button>
            </form>
        </div>
    </div>

    </div>
@endsection
@section('script')
    <!-- Write your custom js code here--> 
@endsection