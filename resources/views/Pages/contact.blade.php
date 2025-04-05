@extends('layouts.app')

@section('content')
<section class="py-5 mb-5">
    <div class="container">
        <h1 class="display-4 text-center" style="color: #3A5A78;">Contact Us</h1>
        <p class="lead text-center" style="color: #A3BFD9;">We'd love to hear from you! Please fill out the form below.</p>

            <div class="mb-3">
                <label for="name" class="form-label" style="color: #3A5A78;">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label" style="color: #3A5A78;">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label" style="color: #3A5A78;">Message</label>
                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg">Send Message</button>
            </div>
        
    </div>
</section>
@endsection
