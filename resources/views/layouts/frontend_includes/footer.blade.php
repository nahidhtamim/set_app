<section class="contact-us" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 align-self-center">
          <div class="row">
            <div class="col-lg-12">
              <form id="contact" action="{{ route('send.email') }}" method="POST">
                @csrf
                <div class="row">
                  <div class="col-lg-12">
                    <h2>{{__('messages.touch')}}</h2>
                  </div>
                  <div class="col-lg-4">
                    <fieldset>
                      <input name="name" type="text" id="name" placeholder="{{__('messages.your_name')}}...*" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-4">
                    <fieldset>
                    <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="{{__('messages.your_email')}}..." required="">
                  </fieldset>
                  </div>
                  <div class="col-lg-4">
                    <fieldset>
                      <input name="subject" type="text" id="subject" placeholder="{{__('messages.subject')}}...*" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <textarea name="content" type="text" class="form-control" id="message" placeholder="{{__('messages.your_message')}}..." required=""></textarea>
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="button">SEND MESSAGE NOW</button>
                    </fieldset>
                  </div>
                </div>
              </form>
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
