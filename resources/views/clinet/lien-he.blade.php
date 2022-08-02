@extends('layout.layout-client.layout-client')
@section('content-titel', 'Liên Hệ')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/contact_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/contact_responsive.css') }}">
    <div class="fs_menu_overlay"></div>
    <div class="container contact_container">
        <div class="row">
            <div class="col">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div id="google_map">
                    <div class="map_container">
                        <div id="map"><iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.8639810443337!2d105.74459841468247!3d21.03812778599331!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b991d80fd5%3A0x53cefc99d6b0bf6f!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e0!3m2!1svi!2s!4v1658500929801!5m2!1svi!2s"
                                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Us -->

        <div class="row">

            <div class="col-lg-6 contact_col">
                <div class="contact_contents">
                    <h1>Liên hệ trực tiếp</h1>
                    <p>Có nhiều cách để liên hệ với chúng tôi. Bạn có thể gửi cho chúng tôi một dòng, gọi cho chúng tôi hoặc
                        gửi email, chọn những gì phù hợp với bạn nhất.</p>
                    <div>
                        <p>(+84) 0383850402</p>
                        <p>ductvph14838@fpt.edu.vn</p>
                    </div>
                    <div>
                        <p>Mở cửa: 8.00-21.00 pm</p>
                        <p>Chủ nhật: Đóng cửa</p>
                    </div>
                </div>

                <!-- Follow Us -->

                <div class="follow_us_contents">
                    <h1>Kệnh liên hệ</h1>
                    <ul class="social d-flex flex-row">
                        <li><a href="#" style="background-color: #3a61c9"><i class="fa fa-facebook"
                                    aria-hidden="true"></i></a></li>
                        <li><a href="#" style="background-color: #41a1f6"><i class="fa fa-twitter"
                                    aria-hidden="true"></i></a></li>
                        <li><a href="#" style="background-color: #fb4343"><i class="fa fa-google-plus"
                                    aria-hidden="true"></i></a></li>
                        <li><a href="#" style="background-color: #8f6247"><i class="fa fa-instagram"
                                    aria-hidden="true"></i></a></li>
                    </ul>
                </div>

            </div>

            <div class="col-lg-6 get_in_touch_col">
                <div class="get_in_touch_contents">
                    <h1>Liên hệ với chúng tôi!</h1>
                    <p>Điền vào biểu mẫu dưới đây để nhận miễn phí và bảo mật.</p>
                    <form action="post">
                        <div>
                            <input id="input_name" class="form_input input_name input_ph" type="text" name="name"
                                placeholder="Name" required="required" data-error="Name is required.">
                            <input id="input_email" class="form_input input_email input_ph" type="email" name="email"
                                placeholder="Email" required="required" data-error="Valid email is required.">
                            <input id="input_website" class="form_input input_website input_ph" type="url"
                                name="name" placeholder="Website" required="required" data-error="Name is required.">
                            <textarea id="input_message" class="input_ph input_message" name="message" placeholder="Message" rows="3" required
                                data-error="Please, write us a message."></textarea>
                        </div>
                        <div>
                            <button id="review_submit" type="submit" class="red_button message_submit_btn trans_300"
                                value="Submit">Gửi thông báo</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <!-- Newsletter -->

    <div class="newsletter">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div
                        class="newsletter_text d-flex flex-column justify-content-center align-items-lg-start align-items-md-center text-center">
                        <h4>Newsletter</h4>
                        <p>Subscribe to our newsletter and get 20% off your first purchase</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <form action="post">
                        <div
                            class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
                            <input id="newsletter_email" type="email" placeholder="Your email" required="required"
                                data-error="Valid email is required.">
                            <button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300"
                                value="Submit">subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
