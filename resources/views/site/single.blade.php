@extends('layouts.site')
@section('content')
    <!-- Category Content Start -->
    <section class="section category_content featured">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="single_post">
                        <h2 class="post_title"><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit. In, perspiciatis!</a></h2>
                        <a href="#"><img class="img-fluid" src="https://via.placeholder.com/510x350.png" alt=""></a>
                        <hr>

                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae magni natus soluta delectus sit nobis.</p>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloremque esse veritatis error dolor enim dolorem atque quae, fugit qui debitis, in architecto aperiam ipsa quaerat dolore praesentium voluptatum corrupti facilis tenetur ex voluptate, ratione nobis asperiores? Repellat nemo voluptatum animi velit hic cumque placeat totam, quo inventore eius, in temporibus.</p>
                        <br>
                        <p><a href="#">Link</a></p>

                        <div class="read_more_topic">
                            <div class="header">
                                <h3>Read More <span class="line"></span></h3>
                            </div>
                            <div class="body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="post_item">
                                            <a href="#"><img class="img-fluid" src="https://via.placeholder.com/510x350.png" alt=""></a>
                                            <h2><a href="#">Lorem ipsum dolor sit amet consectetur.</a></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                @include('site.partial.sidebar')
            </div>
        </div>
    </section>
@endsection