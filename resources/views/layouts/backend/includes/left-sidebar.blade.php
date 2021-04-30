<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User Profile-->
        @if(Auth::check())
            <div class="user-profile">
                <div class="user-pro-body">
                    <div><img src="{{ asset( auth()->user()->moreInfo->avatar ?? get_static_option('no_image') ) }}" alt="" class="img-circle"></div>
                    <div class="dropdown">
                        <a href="javascript:void(0)" class="dropdown-toggle u-dropdown link hide-menu"
                           data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ auth()->user()->name }}<span class="caret"></span></a>
                        <div class="dropdown-menu animated flipInY">
                            <!-- text-->
                            <a href="{{ route('backend.profile') }}" class="dropdown-item"><i class="ti-user"></i> My
                                Profile</a>
                            <!-- text-->
                            <div class="dropdown-divider"></div>
                            <!-- text-->
                            <a href="javascript:0" class="dropdown-item logout-btn"><i class="fas fa-power-off"></i>
                                Logout</a>
                            <!-- text-->
                        </div>
                    </div>
                </div>
            </div>
    @endif
    <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li>
                    <a class="waves-effect waves-dark" href="{{ route('superadmin.dashboard') }}">
                        <i class="far fa-circle text-success"></i><span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li><a href="javascript:void(0)" class="has-arrow"> <i class="far fa-circle text-success"></i>User</a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('superadmin.user.index') }}">User list </a></li>
                        <li><a href="{{ route('superadmin.user.create') }}">User create </a></li>
                    </ul>
                </li>
                <hr class="bg-white">
                <li>
                    <a class="waves-effect waves-dark" href="{{ route('superadmin.banner') }}">
                        <i class="far fa-circle text-success"></i><span class="hide-menu">Banner</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="{{ route('superadmin.about') }}">
                        <i class="far fa-circle text-success"></i><span class="hide-menu">About</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="{{ route('superadmin.subscriber.index') }}">
                        <i class="far fa-circle text-success"></i><span class="hide-menu">Subscriber</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="{{ route('superadmin.websiteMessage.index') }}">
                        <i class="far fa-circle text-success"></i><span class="hide-menu">Messages<span  class="badge badge-warning">{{ count_of_website_incomplete_messages() }}</span></span>
                    </a>
                </li>

                <li><a href="javascript:void(0)" class="has-arrow"> <i class="far fa-circle text-success"></i>Partner</a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('superadmin.partner.index') }}">Partner list </a></li>
                        <li><a href="{{ route('superadmin.partner.create') }}">Partner create </a></li>
                    </ul>
                </li>
                <li><a href="javascript:void(0)" class="has-arrow"> <i class="far fa-circle text-success"></i>Home content</a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('superadmin.homeContent.index') }}">List view</a></li>
                        <li><a href="{{ route('superadmin.homeContent.create') }}">Create new</a></li>
                        <li><a href="{{ route('superadmin.homeContentFaq.index') }}">Q/A list</a></li>
                        <li><a href="{{ route('superadmin.homeContentFaq.create') }}">Create Q/A</a></li>
                    </ul>
                </li>
                <li><a href="javascript:void(0)" class="has-arrow"> <i class="far fa-circle text-success"></i>Strength</a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('superadmin.strength') }}">Strength </a></li>
                        <li><a href="{{ route('superadmin.strength.index') }}">Strength list </a></li>
                        <li><a href="{{ route('superadmin.strength.create') }}">Strength create </a></li>
                    </ul>
                </li>
                <li><a href="javascript:void(0)" class="has-arrow"> <i class="far fa-circle text-success"></i>Service</a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('superadmin.service') }}">Service </a></li>
                        <li><a href="{{ route('superadmin.service.index') }}">Service list </a></li>
                        <li><a href="{{ route('superadmin.service.create') }}">Service create </a></li>
                    </ul>
                </li>
                <li><a href="javascript:void(0)" class="has-arrow"> <i class="far fa-circle text-success"></i>Call to action</a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('superadmin.callToAction.index') }}">Call to action list </a></li>
                        <li><a href="{{ route('superadmin.callToAction.create') }}">Call to action create </a></li>
                    </ul>
                </li>
                <li><a href="javascript:void(0)" class="has-arrow"> <i class="far fa-circle text-success"></i>Portfolio</a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('superadmin.portfolio') }}">Portfolio </a></li>
                        <li><a href="{{ route('superadmin.portfolio.index') }}">Portfolio list </a></li>
                        <li><a href="{{ route('superadmin.portfolio.create') }}">Portfolio create </a></li>
                        <li><a href="{{ route('superadmin.portfolioCategory.index') }}">Category list </a></li>
                        <li><a href="{{ route('superadmin.portfolioCategory.create') }}">Category create </a></li>
                    </ul>
                </li>
                <li><a href="javascript:void(0)" class="has-arrow"> <i class="far fa-circle text-success"></i>Team</a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('superadmin.team') }}">Team </a></li>
                        <li><a href="{{ route('superadmin.team.index') }}">Team list </a></li>
                        <li><a href="{{ route('superadmin.team.create') }}">Team create </a></li>
                    </ul>
                </li>
                <li><a href="javascript:void(0)" class="has-arrow"> <i class="far fa-circle text-success"></i>Price</a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('superadmin.price') }}">Price </a></li>
                        <li><a href="{{ route('superadmin.price.index') }}">Price list </a></li>
                        <li><a href="{{ route('superadmin.price.create') }}">Price create </a></li>
                    </ul>
                </li>
                <li><a href="javascript:void(0)" class="has-arrow"> <i class="far fa-circle text-success"></i>Faq</a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('superadmin.faq') }}">Faq </a></li>
                        <li><a href="{{ route('superadmin.faq.index') }}">Faq list </a></li>
                        <li><a href="{{ route('superadmin.faq.create') }}">Faq create </a></li>
                    </ul>
                </li>
                <li><a href="javascript:void(0)" class="has-arrow"> <i class="far fa-circle text-success"></i>Blog</a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('superadmin.blog.index') }}">Blog list </a></li>
                        <li><a href="{{ route('superadmin.blog.create') }}">Blog create </a></li>
                    </ul>
                </li>
                <li><a href="javascript:void(0)" class="has-arrow"> <i class="far fa-circle text-success"></i>Testimonial</a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('superadmin.testimonial.index') }}">Testimonial list </a></li>
                        <li><a href="{{ route('superadmin.testimonial.create') }}">Testimonial create </a></li>
                    </ul>
                </li>
                <li><a href="javascript:void(0)" class="has-arrow"> <i class="far fa-circle text-success"></i>Gallery</a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('superadmin.gallery.index') }}">Gallery list </a></li>
                        <li><a href="{{ route('superadmin.gallery.create') }}">Gallery create </a></li>
                    </ul>
                </li>

                <li><a href="javascript:void(0)" class="has-arrow"> <i class="far fa-circle text-success"></i>Custom page</a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('superadmin.customPage.index') }}">Custom page List </a></li>
                        <li><a href="{{ route('superadmin.customPage.create') }}">Custom page create </a></li>
                    </ul>
                </li>

                <li><a href="javascript:void(0)" class="has-arrow"> <i class="far fa-circle text-success"></i>Subscriber</a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('superadmin.subscriber.index') }}">Subscriber List </a></li>
                        <li><a href="{{ route('superadmin.subscriberEmail') }}">Mail to Subscriber </a></li>
                    </ul>
                </li>

                <hr class="bg-white">

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="far fa-circle text-danger"></i><span class="hide-menu">Setting</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('application.seoStaticOptionForm') }}">Seo </a></li>
                        <li><a href="{{ route('application.logoAndImageStaticOptionForm') }}">Logo and images </a></li>
                        <li><a href="{{ route('application.socialStaticOptionForm') }}">Social</a></li>
                        <li><a href="{{ route('application.appStaticForm') }}">App</a></li>
                        <li><a href="{{ route('application.companyDetailStaticOptionForm') }}">Company Details</a></li>
                        <li><a href="{{ route('application.customScriptStaticOptionForm') }}">Custom script</a></li>
                        <li><a href="{{ route('application.fbPageStaticOptionForm') }}">Facebook page</a></li>
                        <li><a href="{{ route('application.mapLinkStaticOptionForm') }}">Map link</a></li>
                        <li><a href="{{ route('application.footerCreditStaticOptionForm') }}">Footer Credit</a></li>
                    </ul>
                </li>
                <br>
                <br>
                <br>
                <br>
                <br>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
