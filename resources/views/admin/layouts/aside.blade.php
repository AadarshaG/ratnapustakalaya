<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="{{asset('assets/backend/images/user.png')}}" width="25" height="25" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shree Ratna Pustakalaya</div>
                <div class="email">Shree Ratna Pustakalaya</div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                        <li role="separator" class="divider"></li>

                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <i class="fa fa-power-off"></i>logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li>
                    <a href="{{url('ratnapustakalaya/logos')}}">
                        <i class="material-icons">home</i>
                        <span>Logo</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('ratnapustakalaya/abouts')}}">
                        <i class="material-icons">home</i>
                        <span>About Us</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('ratnapustakalaya/sliders')}}">
                        <i class="material-icons">view_list</i>
                        <span>Sliders</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('ratnapustakalaya/featureds')}}">
                        <i class="material-icons">view_list</i>
                        <span>Featured Image</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('ratnapustakalaya/blogs')}}">
                        <i class="material-icons">view_list</i>
                        <span>Blogs</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('ratnapustakalaya/informations')}}">
                        <i class="material-icons">view_list</i>
                        <span>Information</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('ratnapustakalaya/books')}}">
                        <i class="material-icons">view_list</i>
                        <span>Highlighted Books</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('ratnapustakalaya/contacts')}}">
                        <i class="material-icons">view_list</i>
                        <span>Contact Info</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('ratnapustakalaya/socials')}}">
                        <i class="material-icons">view_list</i>
                        <span>Social Links</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('ratnapustakalaya/vlogs')}}">
                        <i class="material-icons">view_list</i>
                        <span>Vlogs</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('ratnapustakalaya/gallerys')}}">
                        <i class="material-icons">view_list</i>
                        <span>Gallery Images</span>
                    </a>
                </li>
                <li class="active">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">view_list</i>
                        <span>Payment Methods</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="active">
                            <a href="{{url('ratnapustakalaya/payments')}}">Via Bank</a>
                        </li>
                        <li class="active">
                            <a href="{{url('ratnapustakalaya/qrcodes')}}">QR Code</a>
                        </li>
                    </ul>
                </li>
                <li class="active">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">view_list</i>
                        <span>Committee Members</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="active">
                            <a href="{{url('ratnapustakalaya/categorys')}}">Member Category</a>
                        </li>
                        <li class="active">
                            <a href="{{url('ratnapustakalaya/committees')}}">Committee Members</a>
                        </li>
                    </ul>
                </li>
                <li class="active">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">view_list</i>
                        <span>Enquiry Data</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="active">
                            <a href="{{url('ratnapustakalaya/enquirys')}}">Enquiry Messages</a>
                        </li>
                        <li class="active">
                            <a href="{{url('ratnapustakalaya/members')}}">Membership Messages</a>
                        </li>

                    </ul>
                </li>
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; {{date('Y')}} <a href="javascript:void(0);">All Right Reserved. IT Arrow</a>.
            </div>
            <div class="version">
{{--                <b>Version: </b> 1.0.5--}}
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
        <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
            <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                <ul class="demo-choose-skin">
                    <li data-theme="red" class="active">
                        <div class="red"></div>
                        <span>Red</span>
                    </li>
                    <li data-theme="pink">
                        <div class="pink"></div>
                        <span>Pink</span>
                    </li>
                    <li data-theme="purple">
                        <div class="purple"></div>
                        <span>Purple</span>
                    </li>
                    <li data-theme="deep-purple">
                        <div class="deep-purple"></div>
                        <span>Deep Purple</span>
                    </li>
                    <li data-theme="indigo">
                        <div class="indigo"></div>
                        <span>Indigo</span>
                    </li>
                    <li data-theme="blue">
                        <div class="blue"></div>
                        <span>Blue</span>
                    </li>
                    <li data-theme="light-blue">
                        <div class="light-blue"></div>
                        <span>Light Blue</span>
                    </li>
                    <li data-theme="cyan">
                        <div class="cyan"></div>
                        <span>Cyan</span>
                    </li>
                    <li data-theme="teal">
                        <div class="teal"></div>
                        <span>Teal</span>
                    </li>
                    <li data-theme="green">
                        <div class="green"></div>
                        <span>Green</span>
                    </li>
                    <li data-theme="light-green">
                        <div class="light-green"></div>
                        <span>Light Green</span>
                    </li>
                    <li data-theme="lime">
                        <div class="lime"></div>
                        <span>Lime</span>
                    </li>
                    <li data-theme="yellow">
                        <div class="yellow"></div>
                        <span>Yellow</span>
                    </li>
                    <li data-theme="amber">
                        <div class="amber"></div>
                        <span>Amber</span>
                    </li>
                    <li data-theme="orange">
                        <div class="orange"></div>
                        <span>Orange</span>
                    </li>
                    <li data-theme="deep-orange">
                        <div class="deep-orange"></div>
                        <span>Deep Orange</span>
                    </li>
                    <li data-theme="brown">
                        <div class="brown"></div>
                        <span>Brown</span>
                    </li>
                    <li data-theme="grey">
                        <div class="grey"></div>
                        <span>Grey</span>
                    </li>
                    <li data-theme="blue-grey">
                        <div class="blue-grey"></div>
                        <span>Blue Grey</span>
                    </li>
                    <li data-theme="black">
                        <div class="black"></div>
                        <span>Black</span>
                    </li>
                </ul>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="settings">
                <div class="demo-settings">
                    <p>GENERAL SETTINGS</p>
                    <ul class="setting-list">
                        <li>
                            <span>Report Panel Usage</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                        <li>
                            <span>Email Redirect</span>
                            <div class="switch">
                                <label><input type="checkbox"><span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                    <p>SYSTEM SETTINGS</p>
                    <ul class="setting-list">
                        <li>
                            <span>Notifications</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                        <li>
                            <span>Auto Updates</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                    <p>ACCOUNT SETTINGS</p>
                    <ul class="setting-list">
                        <li>
                            <span>Offline</span>
                            <div class="switch">
                                <label><input type="checkbox"><span class="lever"></span></label>
                            </div>
                        </li>
                        <li>
                            <span>Location Permission</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </aside>
    <!-- #END# Right Sidebar -->
</section>
