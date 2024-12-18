@extends('front.layouts.master')
@section('title','İletişim')


@section('content')
<header class="masthead" style="background-image: url('assets/img/contact-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1>İletişim Bilgilerim</h1>
                    <span class="subheading">Sorun mu Var? Cevaplayabilirim</span>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <p>Bana mı ulaşmaya çalışıyorsun? Aşağıdaki formu doldurarak bana mesaj gönderebilir ve en kısa sürede sana geri dönebilirim!</p>
            <div class="my-5">
                <!-- * * * * * * * * * * * * * * *-->
                <!-- * * SB Forms Contact Form * *-->
                <!-- * * * * * * * * * * * * * * *-->
                <!-- This form is pre-integrated with SB Forms.-->
                <!-- To make this form functional, sign up at-->
                <!-- https://startbootstrap.com/solution/contact-forms-->
                <!-- to get an API token!-->
                <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                    <div class="form-floating">
                        <input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                        <label for="name">Adın</label>
                        <div class="invalid-feedback" data-sb-feedback="name:required">Bir Ad Girmen Gerekli.</div>
                    </div>
                    <div class="form-floating">
                        <input class="form-control" id="email" type="email" placeholder="Enter your email..." data-sb-validations="required,email" />
                        <label for="email">E-mail Adresin</label>
                        <div class="invalid-feedback" data-sb-feedback="email:required">Bir E-mail Girmen Gerekli.</div>
                        <div class="invalid-feedback" data-sb-feedback="email:email">Geçersiz E-mail.</div>
                    </div>
                    <div class="form-floating">
                        <input class="form-control" id="phone" type="tel" placeholder="Enter your phone number..." data-sb-validations="required" />
                        <label for="phone">Telefon Numaran</label>
                        <div class="invalid-feedback" data-sb-feedback="phone:required">Bir Telefon Numarası Girmen Gerekli.</div>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" id="message" placeholder="Enter your message here..." style="height: 12rem" data-sb-validations="required"></textarea>
                        <label for="message">Mesajın</label>
                        <div class="invalid-feedback" data-sb-feedback="message:required">Bir Mesaj Girmen Gerekli.</div>
                    </div>
                    <br />
                    <!-- Submit success message-->
                    <!---->
                    <!-- This is what your users will see when the form-->
                    <!-- has successfully submitted-->
                    <div class="d-none" id="submitSuccessMessage">
                        <div class="text-center mb-3">
                            <div class="fw-bolder">Mesajın Başarıyla Gönderildi!</div>
                            To activate this form, sign up at
                            <br />
                            <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                        </div>
                    </div>
                    <!-- Submit error message-->
                    <!---->
                    <!-- This is what your users will see when there is-->
                    <!-- an error submitting the form-->
                    <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Mesajın Gönderilirken Bir Hata OLuştu!</div></div>
                    <!-- Submit Button-->
                    <button class="btn btn-primary text-uppercase disabled" id="submitButton" type="submit">Gönder</button>
                </form>
            </div>
        </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection