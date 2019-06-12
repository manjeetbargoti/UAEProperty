<footer>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 pl-0 pr-0">
                <div class="mapbox">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14014.96949432748!2d77.3209737!3d28.5774979!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1559121890880!5m2!1sen!2sin"
                        width="600" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-md-6">
                <div class="footer_sec">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="footer_box">
                                <h6>Contact</h6>
                                <div class="contact_box">
                                    <p>3755 Commercial St SE Salem,
                                        Corner with Sunny Boulevard, 3755
                                        Commercial OR 97302
                                    </p>
                                </div>
                                <div class="contact_box">
                                    <p>Phone: (305) 555-4446</p>
                                    <p>Contact No: (305) 555-4446</p>
                                    <p>Email Id: info@rapiddeals.com</p>
                                    <p>Website: https://rapiddeals.com</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="footer_box">
                                <h6>Listings by category</h6>
                                <ul class="footer_menu">
                                    @foreach(\App\PropertyType::where('status', 1)->orderBy('name', 'asc')->get() as $pt)
                                    <li>
                                        <a href="{{ url('/category/'.$pt->url) }}">{{ $pt->name }} ({{ \App\Property::where('property_type', $pt->type_code)->count() }})</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="footer_box">
                                <h6>Follow Us</h6>
                                <div class="followus">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-google-plus-g"></i></a>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="copyright">
                        <div class="row">
                            <div class="col-md-6">
                                <p>Copyright &copy; 2019 | Rapid Deals. All Rights Reserved</p>
                            </div>
                            <div class="col-md-6">
                                <div class="privecy">
                                    <a href="#">Privacy Policy</a>
                                    <a href="#">Terms of Use</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>