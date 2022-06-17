@extends('layouts.frontend')
 @section('title')
 About | SET - A Premium Laundry Service
 @endsection
@section('contents')

@if (session('status'))
    <div class="alert alert-success" role="alert">
         {{ session('status') }}
         <a class="close">&times;</a>
    </div>
@elseif (session('warning'))
    <div class="alert alert-danger" role="alert">
         {{ session('warning') }}
         <a class="close">&times;</a>
    </div>    
@endif

<section class="our-facts">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2>Get To Know Us Better</h2>
          </div>
          <div class="col-lg-6 about-area">
            <div class="row">
              <div class="col-lg-12">
                <div class="about-area-content">
                  <div class="count">About</div>
                  <div class="count-title">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit tenetur tempora illo consequuntur aperiam esse impedit distinctio eius incidunt ratione unde alias, a vitae aspernatur? Exercitationem id beatae corrupti vel!
                    <br>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit tenetur tempora illo consequuntur 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> 
      <div class="col-lg-12 align-self-center">
        <div class="video text-center">
          <a href="https://www.youtube.com/watch?v=HndV87XpkWg" target="_blank"><img src="{{asset('frontend/assets/images/play-icon.png')}}" alt=""></a>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection