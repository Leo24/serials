<section class="feedback-form">
    <div class="container">
        <h2 class="col-sm-5 col-xs-12 center-block form-header">{{trans('main.site.contacts.form.form_title')}}</h2>
        <div class="side-text col-sm-4 col-xs-12">
            <div class="text-container col-sm-9">
                <p>
                    <span style="font-size: 16px;">{{trans('main.site.contacts.form.side_text.part_one')}}</span>
                    <span style="font-size: 12px;">{{trans('main.site.contacts.form.side_text.part_two')}}</span>
                </p>
            </div>
        </div>

        <div class="arrow col-sm-3">
            <div class="arrow-container col-sm-12">

                <div class="horizontal-line col-sm-2"></div>
                <div class="horizontal-line col-sm-2"></div>

                <div class="triangle-container col-sm-5">
                    <div class="one line"></div>
                    <div class="two line"></div>
                    <div class="three line"></div>
                    <div class="four line"></div>
                    <div class="five line"></div>
                </div>
            </div>
        </div>

        <div class="form col-sm-4">
            <form method="post" action="{{route('site.order')}}" id="contact-form">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="{{trans('main.site.contacts.form.name')}}" required pattern="[a-zA-Z\u0400-\u04ff]+.{3,}"   required title="{{trans('main.validation.name')}}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control phone_us" name="phone" value="{{ old('phone') }}"  placeholder="{{trans('main.site.contacts.form.phone')}}" required>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="{{trans('main.site.contacts.form.email')}}" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="form-control submit" value="{{trans('main.site.contacts.form.button_text')}}">{{trans('main.site.contacts.form.button_text')}}</button>
                </div>
            </form>
        </div>

    </div>


</section>