<section class="contact-us" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 align-self-center">
                <div class="row">
                    <div class="col-lg-12">

                        @if (Session::has('message_sent'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('message_sent')}}
                            <a href="" class="close">&times;</a>
                        </div>
                        @endif

                        <script src="https://www.google.com/recaptcha/api.js" async defer></script>

                        <form class="contact-form row" method="post" action="{{route('contact.send')}}" role="form">
                            @csrf
                            <div class="col-lg-6 mb-4">
                                <div class="form-floating">
                                    <input type="text"
                                        class="form-control light-300 @error('name') is-invalid @enderror"
                                        id="floatingname" name="name" placeholder="Name" required="">
                                    <label for="floatingname light-300">Name <span class="text-danger">*</span></label>
                                    <span class="text-danger">
                                        @error('name')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <!-- End Input Name -->

                            <div class="col-lg-6 mb-4">
                                <div class="form-floating">
                                    <input type="email"
                                        class="form-control light-300 @error('email') is-invalid @enderror"
                                        id="floatingemail" name="email" placeholder="Email" required="">
                                    <label for="floatingemail light-300">Email <span
                                            class="text-danger">*</span></label>
                                    <span class="text-danger">
                                        @error('email')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <!-- End Input Email -->

                            <div class="col-lg-6 mb-4">
                                <div class="form-floating">
                                    <input type="text"
                                        class="form-control light-300 @error('phone') is-invalid @enderror"
                                        id="floatingphone" name="phone" placeholder="Phone">
                                    <label for="floatingphone light-300">Phone <span
                                            class="text-danger">*</span></label>
                                    <span class="text-danger">
                                        @error('phone')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <!-- End Input Phone -->

                            <div class="col-lg-6 mb-4">
                                <div class="form-floating">
                                    <input type="text"
                                        class="form-control light-300 @error('address') is-invalid @enderror"
                                        id="floatingcompany" name="address" placeholder="Address">
                                    <label for="floatingcompany light-300">Address <span
                                            class="text-danger">*</span></label>
                                </div>
                            </div>
                            <!-- End Input Company Name -->

                            <div class="col-12 mb-4">
                                <div class="form-floating">
                                    <textarea class="form-control light-300 @error('content') is-invalid @enderror"
                                        rows="8" placeholder="Message" id="floatingtextarea" name="content"></textarea>
                                    <label for="floatingtextarea light-300">Message <span
                                            class="text-danger">*</span></label>
                                    <span class="text-danger">
                                        @error('content')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <!-- End Textarea Message -->

                            <div class="col-md-8 col-12 mb-4">
                                <div class="form-floating" style="width: 100%">
                                    {!! NoCaptcha::renderJs() !!}

                                    {!! NoCaptcha::display() !!}
                                    <span class="text-danger">
                                        @error('g-recaptcha-response')
                                        <p class="alert alert-danger">{{$message}}</p>
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-4 col-12 m-auto text-end">
                                <button type="submit"
                                    class="btn btn-dark rounded-pill px-md-5 px-4 py-2 radius-0 text-light light-300">Send
                                    Message</button>
                            </div>

                        </form>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="right-info">
                    <ul>
                        <li>
                            <h6>{{__('messages.phone')}}</h6>
                            <span>010-020-0340</span>
                        </li>
                        <li>
                            <h6>{{__('messages.email')}}</h6>
                            <span><a href="mailto:info@de-set.com" style="text-decoration: none; color: white">
                                    info@de-set.com</a></span>
                        </li>
                        <li>
                            <h6>{{__('messages.address')}}</h6>
                            <span>Stuttgart, Germany</span>
                        </li>
                        <li>
                            <h6>{{__('messages.url')}}</h6>
                            <span>www.de-set.com</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <p class="text-light">Copyright © 2022 DE-SET.com. All Rights Reserved</p>
        <br>
        <ul>
            <li> <a href="">FAQ</a> </li>
            <li> <p>|</p> </li>
            <li> <a href="">Terms</a> </li>
        </ul>
    </div>
</section>

<script>
  var onloadCallback = function(){
      alert("grecaptcha is ready!");
  }
</script>
<style>
  #rc-anchor-normal {
      height: 74px;
      width: 100% !important;
  }
</style>