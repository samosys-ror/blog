@extends('layouts.app')
@section('content')
<style type="text/css">
    .invalid-message-phone
    {
        width: 100%;
        margin-top: 0.25rem;
        font-size: 80%;
        color: #e3342f;
    }
    .invalid-message-mobile
    {
        width: 100%;
        margin-top: 0.25rem;
        font-size: 80%;
        color: #e3342f;
    }
</style>
<div class="container" style="margin:0;margin-left: 10%;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h2> Steps to Register</h2>
                    <ul>
                        <li>
                            Please provide the information below and click submit.
                        </li>
                        <li>
                            You will then get the confirmation email. Please open the email and click to activate your user account.
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card">
                <div class="card-header">{{ __('Register New Portal User
                    ') }}
                </div>
                <div class="card-body"style="background-color: #eee;">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Username*') }}</label>
                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">
                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password*') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password*')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password*') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="card-header">{{ __('User Information
                            ') }}
                        </div>
                        <div class="form-group row"style="margin-top: 5%;">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name*') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row"style="margin-top: 5%;">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>
                            <div class="col-md-6">
                                <input id="llname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{old('lname')}}" required autocomplete="name" autofocus>
                                @error('lname')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail*') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"onkeyup="getuser()">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row"style="margin-top: 5%;">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Mobile*') }}</label>
                            <div class="col-md-6">
                                <input id="mobile" pattern="^((\+[0-9]{2}[0-9]{10}))$" type="text" class="form-control @error('name') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required   >
                                <span>(Format: +66XXXXXXXXX, +66-XXX-XXX-XXX, +66 XXX XXX XXX)</span>
                                <span class="invalid-message-mobile" role="alert"></span>
                                @error('mobile')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row"style="margin-top: 5%;">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Phone*') }}</label>
                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('name') is-invalid @enderror" name="phone" value="{{ old('phone') }}"  pattern="^((\+[0-9]{2}[0-9]{10}))$"  required>
                                (Format: +66XXXXXXXXX, +66-XXX-XXX-XXX, +66 XXX XXX XXX)
                                <span class="invalid-message-phone" role="alert"></span>
                                @error('phone')
                                <span class="invalid-feedback invalid-message-phone" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                            <label class="col-md-4 col-form-label text-md-right">Captcha*</label>
                            <div class="col-md-8">
                                {!! app('captcha')->display() !!}
                                @if ($errors->has('g-recaptcha-response'))
                                <span class="help-block">
                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row"style="margin-top: 5%;">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Terms & Conditions*') }}</label>
                            <div class="col-md-6">
                                <div id="terms_and_conditions" class="controls" style="overflow: scroll; height: 200px;width:450px; background-color: #ffffff; padding: 10px;">
                                    <p>Website Terms &amp; Conditions</p>
                                    <ol>
                                        <li>
                                            <strong>Introduction</strong><br>
                                            Signify Co., Ltd. (herein after referred as Signify) provide you its Services (herein after referred as “Website”) under the following conditions.     Please read the following terms carefully.      If you do not agree to the following Terms &amp; Conditions you may not enter or use this Website.      If you continue to browse and use this Website you are agreeing to comply with and be bound by the following terms and conditions.
                                        </li>
                                        <li>
                                            <strong>Information on the Website</strong><br>
                                            While Signify makes effort to update the information on this Website, neither Signify nor any third party content provider make any representations and/or warranties for accuracy and completeness of the content provided on the Website and shall not be bound in any case by any information provided on the Website.     And Signify reserves the right to change or discontinue without notice, any information and any feature of this Website.
                                        </li>
                                        <li>
                                            <strong>Trade Marks</strong><br>
                                            The trademarks, names, logos and service marks (collectively "trademarks") displayed on this Website are all registered and unregistered trademarks of Signify.     Nothing contained on this Website should be construed as granting any license or right to use any trademark without the prior written permission of Signify.
                                        </li>
                                        <li>
                                            <strong>External Links</strong><br>
                                            External links may be provided for your convenience, but they are beyond the control of Signify and no representation is made on their content.    Use of any external links and the content provided is at your own risk.     When visiting external links you must refer to the terms and conditions of that external Website.     No hypertext links shall be created from any Website controlled by you or otherwise to this Website without the express prior written permission of Signify.     Please contact us if you would like to link to this Website or would like to request a link to your Website.
                                        </li>
                                        <li>
                                            <strong>User Submissions</strong><br>
                                            Signify reserves the right to remove any material submitted or posted by you, without notice to you, if it becomes aware and determines, in its sole and absolute discretion that you are or there is the likelihood that you may, including but not limited to
                                            <ol>
                                                <li>defame, abuse, harass, threaten or otherwise violate the rights of Signify and any third parties</li>
                                                <li>publish, post, distribute or disseminate any defamatory, indecent or unlawful material or information</li>
                                                <li>post or upload files that contain viruses, corrupted files or any other similar software or programs that may damage the operation of Signify and/or a third party computer system and/or network</li>
                                                <li>violate any copyright, trademark, other applicable Thailand or international laws or intellectual property rights of Signify or any other third party</li>
                                                <li>submit content containing marketing or promotional material which is intended to solicit business</li>
                                            </ol>
                                        </li>
                                        <li>
                                            <strong>Membership</strong><br>
                                            Signify Website is not available to users under the age of 18 or to any members previously banned by Signify.   Users are allowed only one active account. Breeching these conditions could result in account termination.
                                            By using the Signify Website, you acknowledge that you are of legal age to form a binding contract and are not a person barred from receiving services under the laws of the Thailand or other applicable jurisdiction.    You agree to provide true and accurate information about yourself when requested by Signify Website.    If you provide any information that is untrue, inaccurate, or incomplete, Signify has the right to suspend or terminate your account and refuse future use of its services. You are responsible for maintaining the confidentiality of your account and password, and accept all responsible for activities that occur under your account.
                                        </li>
                                        <li>
                                            <strong>Cancellation Due To Errors</strong><br>
                                            Signify has the right to cancel an order at anytime due to typographical or unforeseen errors that results in the product(s) on the site being listed inaccurately (having the wrong price or descriptions etc.).      In the event a cancellation occurs and payment for the order has been received, Signify shall issue a full refund for the product in the amount in question.
                                        </li>
                                        <li>
                                            <strong>Specific Use</strong><br>
                                            You agree not to use the Website to send or post any message or material that is unlawful, harassing, defamatory, abusive, threatening, harmful, or violates any applicable law and you hereby indemnify Signify against any loss, liability, damage or expense that any third party may suffer which is caused by or attributable to, directly or indirectly, your use of the Website to send or post any such message or material.
                                        </li>
                                        <li>
                                            <strong>Warranties</strong><br>
                                            Signify makes no warranties, representations, statements or guarantees, directly or indirectly, regarding the Website, the information contained on the Website, you or your company's personal information or material and information transmitted over our system.
                                        </li>
                                        <li>
                                            <strong>Disclaimer of Liability</strong><br>
                                            Signify hall not be responsible for and disclaims all liability for any loss, liability, damage, personal injury or expense of any nature whatsoever which may be suffered by you or any third party (including your company).     Along with result of which may be attributable, directly or indirectly, to your access and use of the Website, any information contained on the Website, you or your company's personal information or material and information transmitted over our system.
                                        </li>
                                        <li>
                                            <strong>Indemnity</strong><br>
                                            User agrees to indemnify and not hold Signify (and its employees, directors, suppliers, subsidiaries) from any claim or demand. Including reasonable attorneys’ fees, from and against all losses, expenses, damages and costs resulting from any violation of these terms and conditions or any activity related to user’s membership account due negligent or wrongful conduct.
                                        </li>
                                        <li>
                                            <strong>Termination</strong><br>
                                            These terms and conditions are applicable to you upon your accessing the Signify Website and/or completing the registration. These terms and conditions, or any of them, may be modified or terminated by Signify without notice at any time for any reason. The provisions relating to Copyrights and Trademarks, Disclaimer, Claims, Limitation of Liability, Indemnification, Applicable Laws, Arbitration and General, shall survive any termination.
                                        </li>
                                        <li>
                                            <strong>Cancellations and Returns</strong><br>
                                            Orders can be cancelled if the products and services have not yet been delivered.     Once products and services are delivered to the users account, they are no longer permitted to cancel.    Any returns thereafter shall be handled on a case-by-case basis.     Within reason, we will do what we can to ensure customer satisfaction.    Unless there is something wrong with the purchase, we are generally unable to offer refunds.
                                        </li>
                                        <li>
                                            <strong>Privacy</strong><br>
                                            We are fully aware of our duty to keep all customers' information confidential.    In addition to our duty of confidentiality to customers, we shall at all times fully observe the Personal Data (Privacy) Ordinance ("the Ordinance") in collecting, maintaining and using the personal data of customers. In particular, we observe the following principles.
                                            <ol>
                                                <li style="list-style: ">Collection of personal data from customers shall be for purposes relating to the provision of logistics services or related services</li>
                                                <li>All practical steps will be taken to ensure that personal data are accurate and will not be kept longer than necessary or will be destroyed in accordance with our internal retention period</li>
                                                <li>Personal data will not be used for any purposes other than the data that were to be used at the time of collection or purposes directly related thereto</li>
                                                <li>Personal data will be protected against unauthorized or accidental access, processing or erasure</li>
                                                <li>Customers shall have the right for correction of their personal data held by us and that customers' request for access or correction will be dealt with in accordance with the Ordinance.</li>
                                            </ol>
                                        </li>
                                    </ol>
                                </div>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row"style="margin-top: 5%;">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('I hereby accept terms and conitions
                            ') }}</label>
                            <div class="col-md-4">
                                <input id="name" type="checkbox" class="form-control @error('name') is-invalid @enderror" name="terms"  required autocomplete="name" autofocus style="float:left;margin-left:-96px;">
                                @error('terms')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary"  >
                                {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header"style="font-size: 20px;background-color: #ffff;">
                    <center>
                    <strong><img src="image/Signify1.png"width="300"/></strong></ceneter>
                </div>
                <div class="card-body">
                    <h3><b clas="text-center"> Announcements:</b></h3>
                    <br>
                    <p style="text-align: justify;font-size: 14px">SignifyCRM Release 3.5 is now available for all customers.
                        SignifyPOS Release 2.9.3 is now available for all customers.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    function getuser()
    { 
        var email=$('#email').val();
        $.ajax({
            url:'{{ route("getUser")}}',
            method:'GET',
            data:{email:email},
            success:function(data)
            {
                if(data!="")
                {
                    var name=data.name.slice(3);
                    var lname=data.lname.slice(3);
                    var user=data.username.slice(3);
                    var mobile=String(data.mobile).slice(0,8);
                    var phone=String(data.phone).slice(0,8);
                    var newname=data.name.replace(name,'xxxxxxx');
                    var newlname=data.lname.replace(lname,'xxxxxxxx');
                    var username=data.username.replace(user,'xxxxxxxxxx');
                    var newmobile=String(data.mobile).replace(mobile,'xxxxxxxx');
                    var newphone=String(data.phone).replace(phone,'xxxxxxxxxx');
                    $('#name').val(newname);
                    $('#email').val(data.email);
                    $('#username').val(username);
                    $('#llname').val(newlname);
                    $('#mobile').val(newmobile);
                    $('#phone').val(newphone);
                } 
            }
        });   
    }
    /*$('form').submit(function () 
    {
        var phone = $("#phone").val();
        var mobile = $("#mobile").val();
        var formate1 = /^\+[0-9]{2}[0-9]{10}$/;
        var formate2 = /^\+[0-9]{2}-[0-9]{3}-[0-9]{3}-[0-9]{4}$/;
        var formate3 = /^\+[0-9]{2} [0-9]{3} [0-9]{3} [0-9]{4}$/;
        if((phone.match(formate1))||(phone.match(formate2))||(phone.match(formate3)))
        {
            $('.invalid-message-phone').empty();
            return true;
        }  
        else
        {  
            $('.invalid-message-phone').html('<strong>Phone Number formatted incorrectly</strong>');
            return false;
        }
        if((mobile.match(formate1))||(mobile.match(formate2))||(mobile.match(formate3)))
        {
            $('.invalid-message-mobile').empty();
            return true;
        }  
        else
        {  
            $('.invalid-message-mobile').html('<strong>Mobile Number formatted incorrectly</strong>');
            return false;
        }
    });*/ 
    function onlyNumberKey(evt)
    { 
    
        //var mobile=$('#mobile').val();    
        // Only ASCII charactar in that range allowed 
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode 
      
        if (ASCIICode > 31 && (ASCIICode <=42 || ASCIICode > 57) || ASCIICode==44 || ASCIICode==45 || ASCIICode==46 || ASCIICode==47)
        {
              return false; 
        }
        /*else if(isNaN(evt)
        {
            return false;
        } */
        else
        {
            return true; 
        }
    
    }  
    const inputField = document.getElementById('mobile');
    inputField.addEventListener('textInput', function(e) {    
        // Only ASCII charactar in that range allowed 
        const char = e.data; // In our example = "a"
        // If you want the keyCode..
              const keyCode = char.charCodeAt(0); // a = 97        
        // Stop processing if "a" is pressed
        if (keyCode==43 || (keyCode>=48 && keyCode<=57) )
        {                
            return true;
        }
        else
        {
            alert(keyCode);
            $("#mobile").val('');
            return false;
        }
    });
    
</script>

@endsection