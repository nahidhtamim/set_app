<section class="contact-us" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 align-self-center">
          <div class="row">
            <div class="col-lg-12">
              
              {{-- <form id="contact" action="{{ route('send.email') }}" method="POST">
                @if (Session::has('message_sent'))
                    <div class="bg-green-100 text-center rounded-lg px-6 text-base text-green-700 py-2" role="alert">
                        {{Session::get('message_sent')}}
                        <a href="" class="alert-del">&times;</a>
                    </div>
                @endif

                @csrf
                <div class="row">
                  <div class="col-lg-12">
                    <h2>{{__('messages.touch')}}</h2>
                  </div>
                  <div class="col-lg-4">
                    <fieldset>
                      <input class="@error('name') is-invalid @enderror" name="name" type="text" id="name" placeholder="{{__('messages.your_name')}}...*" required="">
                      <span class="text-danger">
                        @error('name')
                            <p class="text-danger">{{$message}}</p> 
                        @enderror
                    </span>  
                    </fieldset>
                  </div>
                  <div class="col-lg-4">
                    <fieldset>
                    <input class="@error('email') is-invalid @enderror" name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="{{__('messages.your_email')}}..." required="">
                    <span class="text-danger">
                      @error('email')
                          <p class="text-danger">{{$message}}</p> 
                      @enderror
                  </span>  
                  </fieldset>
                  </div>
                  <div class="col-lg-4">
                    <fieldset>
                      <input class="@error('subject') is-invalid @enderror" name="subject" type="text" id="subject" placeholder="{{__('messages.subject')}}...*" required="">
                      <span class="text-danger">
                        @error('subject')
                            <p class="text-danger">{{$message}}</p> 
                        @enderror
                    </span>  
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <textarea name="content" type="text" class="form-control @error('content') is-invalid @enderror" id="message" placeholder="{{__('messages.your_message')}}..." required=""></textarea>
                      <span class="text-danger">
                        @error('content')
                            <p class="text-danger">{{$message}}</p> 
                        @enderror
                    </span> 
                    </fieldset>
                  </div>
                  <div class="col-lg-4">
                    <fieldset>
                      <input class="@error('captcha') is-invalid @enderror" id="captcha" type="text" placeholder="Type What You See" name="captcha"  required=""/>
                        @if ($errors->has('captcha'))
                        <span class="text-danger">
                            @error('message')
                                <p class="text-danger">{{$message}} {{$errors->first('captcha')}}</p> 
                            @enderror
                        </span> 
                        @endif
                    </fieldset>
                  </div>
                  <div class="col-lg-4">
                    <fieldset>
                      <div class="single-input-field{{$errors->has('captcha') ? 'has-error' : ''}}">
                        <div class="captcha">
                            <span>{!! captcha_img('flat') !!}</span>
                            <button type="button" class=" btn-refresh" style="border-radius: none !important;">
                                <i class="fa fa-refresh"></i>
                            </button>
                        </div>
                    </div>
                    </fieldset>
                  </div>
                  <div class="col-lg-4">
                    <fieldset>
                      <button type="submit" id="form-submit" class="button form-control">SEND</button>
                    </fieldset>
                  </div>
                </div>
              </form> --}}

              @if (Session::has('message_sent'))
              <div class="alert alert-success" role="alert">
                  {{Session::get('message_sent')}}
                  <a href="" class="close">&times;</a>
              </div> 
          @endif
        <form class="contact-form row" method="post" action="{{route('contact.send')}}" role="form">
          @csrf
            <div class="col-lg-6 mb-4">
                <div class="form-floating">
                    <input type="text" class="form-control light-300 @error('name') is-invalid @enderror" id="floatingname" name="name" placeholder="Name" required="">
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
                    <input type="email" class="form-control light-300 @error('email') is-invalid @enderror" id="floatingemail" name="email" placeholder="Email" required="">
                    <label for="floatingemail light-300">Email <span class="text-danger">*</span></label>
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
                    <input type="text" class="form-control light-300 @error('phone') is-invalid @enderror" id="floatingphone" name="phone" placeholder="Phone">
                    <label for="floatingphone light-300">Phone <span class="text-danger">*</span></label>
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
                    <input type="text" class="form-control light-300 @error('address') is-invalid @enderror" id="floatingcompany" name="address" placeholder="Address">
                    <label for="floatingcompany light-300">Address <span class="text-danger">*</span></label>
                </div>
            </div>
            <!-- End Input Company Name -->

            <div class="col-12 mb-4">
                <div class="form-floating">
                    <textarea class="form-control light-300 @error('content') is-invalid @enderror" rows="8" placeholder="Message" id="floatingtextarea" name="content"></textarea>
                    <label for="floatingtextarea light-300">Message <span class="text-danger">*</span></label>
                    <span class="text-danger">
                      @error('content')
                          <p class="text-danger">{{$message}}</p> 
                      @enderror
                  </span> 
                </div>
            </div>
            <!-- End Textarea Message -->

            <div class="col-md-6 col-sm-6 col-xs-12 mb-4">
              <div class="form-floating {{$errors->has('captcha') ? 'has-error' : ''}}">
                  <div class="captcha">
                      <span>{!! captcha_img('flat') !!}</span>
                      <button class="btn btn-light btn-sm btn-refresh" type="button"> <i class="fa fa-refresh"></i> </button>
                  </div>
              </div>
          </div>

          <div class="col-md-6 col-sm-6 col-xs-12 mb-4">
              <div class="form-floating">
                  <input type="text" class="form-control light-300 @error('captcha') is-invalid @enderror" id="captcha" name="captcha" placeholder="Type What You See" required="">
                  <label for="floatingcompany light-300">Type What You See <span class="text-danger">*</span></label>
                  @if ($errors->has('captcha'))
                  <span class="text-danger">
                      @error('message')
                          <p class="text-danger">{{$message}} {{$errors->first('captcha')}}</p> 
                      @enderror
                  </span> 
                  @endif
              </div>
              <br>
          </div>
          
            <div class="col-md-12 col-12 m-auto text-end">
                <button type="submit" class="btn btn-dark rounded-pill px-md-5 px-4 py-2 radius-0 text-light light-300">Send Message</button>
            </div>

        </form>
        <br>
        <br>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="right-info">
            <ul>
              <li>
                <h6>{{__('messages.phone')}}</h6>
                <span>010-020-0340</span>
              </li>
              <li>
                <h6>{{__('messages.email')}}</h6>
                <span><a href="mailto:info@de-set.com" style="text-decoration: none; color: white"> info@de-set.com</a></span> 
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
    </div>
  </section>
