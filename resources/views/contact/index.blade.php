@extends('layouts.layouts')
@section('content')
<section class="content">
    <div class="row">

        <div class="col-md-12">

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Contact Malumotlari</h3>
                </div>


                <form role="form" action="{{ route('contact.update',$contact->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Haqida</label>
                                    <textarea class="form-control" rows="3" placeholder="Enter ..." name="desc"
                                        value="">{{$contact->desc}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Tel :</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <input type="text" class="form-control"
                                            data-inputmask="&quot;mask&quot;: &quot;(99) 999-99-99&quot;" data-mask=""
                                            name="call" value="{{$contact->call}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="MC">MC</label>
                                    <input type="number" class="form-control" id="MC" placeholder="MC" name="mc"
                                        value="{{$contact->mc}}">
                                </div>

                                <div class="form-group">
                                    <label for="DOT">DOT</label>
                                    <input type="number" class="form-control" id="DOT" placeholder="DOT" name="dot"
                                        value="{{$contact->dot}}">
                                </div>

                                <div class="form-group">
                                    <label for="Location">Location</label>
                                    <input type="text" class="form-control" id="Location" placeholder="Location"
                                        name="location" value="{{$contact->location}}">
                                </div>
                                <div class="form-group">
                                    <label for="logo">Logo</label>
                                    <input type="file" id="logo" name="logo">
                                </div>

                                <div class="form-group">
                                    <label for="">Hozirgi Logo</label>
                                    <div class="box-body box-profile">
                                        <img class="img-responsive"
                                            src="{{asset($contact->logo)}}" alt="User profile picture" width="350px">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>FaceBook link</label>
                                    <input type="text" class="form-control" placeholder="Enter ..." name="facebook_link"
                                        value="{{$contact->facebook_link}}">
                                </div>
                                <div class="form-group">
                                    <label>Instagram link</label>
                                    <input type="text" class="form-control" placeholder="Enter ..."
                                        name="instagram_link" value="{{$contact->instagram_link}}">
                                </div>

                                <div class="form-group">
                                    <label>Telegram link</label>
                                    <input type="text" class="form-control" placeholder="Enter ..." name="telegram_link"
                                        value="{{$contact->telegram_link}}">
                                </div>

                                <div class="form-group">
                                    <label>Linkedin link</label>
                                    <input type="text" class="form-control" placeholder="Enter ..." name="linkedin_link"
                                        value="{{$contact->linkedin_link}}">
                                </div>
                                <div class="form-group">
                                    <label>Twitter link</label>
                                    <input type="text" class="form-control" placeholder="Enter ..." name="twitter_link"
                                        value="{{$contact->twitter_link}}">
                                </div>
                                <div class="form-group">
                                    <label>Youtube link</label>
                                    <input type="text" class="form-control" placeholder="Enter ..." name="youtube_link"
                                        value="{{$contact->youtube_link}}">
                                </div>

                                <div class="form-group">
                                    <label>Copyright Name</label>
                                    <input type="text" class="form-control" placeholder="Enter ..."
                                        name="copyright_name" value="{{$contact->copyright_name}}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

</section>
@endsection
