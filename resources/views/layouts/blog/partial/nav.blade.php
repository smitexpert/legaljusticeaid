
<div class="main-nav clearfix is-ts-sticky">
    <div class="container">
        <div class="row justify-content-between">
            <nav class="navbar navbar-expand-lg col-lg-8">
                <div class="site-nav-inner float-left">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
                    <span class="fa fa-bars"></span>
                </button>
                   <!-- End of Navbar toggler -->
                   <div id="navbarSupportedContent" class="collapse navbar-collapse navbar-responsive-collapse">
                        <ul class="nav navbar-nav">
                            <li class="active">
                                
                                <a href="{{ route('blog.index') }}">Home</a>
                            </li>
            
                            <li>
                                <a href="{{ route('blog.category') }}">Category</a>
                            </li>
            
                            <li>
                                <a href="{{ route('blog.single') }}">Single</a>
                            </li>
                        </ul><!--/ Nav ul end -->
                    </div><!--/ Collapse end -->
            
                </div><!-- Site Navbar inner end -->
            </nav><!--/ Navigation end -->
            <div class="col-lg-4 text-right nav-social-wrap">
                <div class="top-social">
                    <ul class="social list-unstyled">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
                

                <div class="nav-search">
                    <a href="#search-popup" class="xs-modal-popup">
                        <i class="icon icon-search1"></i>
                    </a>
                </div><!-- Search end -->
                    
                <div class="zoom-anim-dialog mfp-hide modal-searchPanel ts-search-form" id="search-popup">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="xs-search-panel">
                                <form class="ts-search-group">
                                    <div class="input-group">
                                        <input type="search" class="form-control" name="s" placeholder="Search" value="">
                                        <button class="input-group-btn search-button">
                                            <i class="icon icon-search1"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div><!-- End xs modal -->
            </div>
        </div><!--/ Row end -->
    </div><!--/ Container end -->
</div><!-- Menu wrapper end -->