
<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin_home') }}">Admin Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin_home') }}"></a>
        </div>

        <ul class="sidebar-menu">
            <li class="{{ Request::is('admin/home') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_home') }}"><i class="fas fa-hand-point-right"></i> <span>Dashboard</span></a></li>

            <li class="nav-item dropdown {{ Request::is('admin/home-page')||Request::is('admin/faq_page')|| Request::is('admin/term_page')||Request::is('admin/blog_page')||Request::is('admin/privacy_page')||Request::is('admin/job_category_page')||Request::is('admin/job_category_page') ? 'active' : '' }}">

                <a href="#" class="nav-link has-dropdown"><i class="fa fa-cog"></i><span>Page Settings</span></a>

                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin_home_page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_home_page') }}"><i class="fa fa-home"></i> Home</a></li>

                    <li class="{{ Request::is('admin/faq_page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_faq_page') }}"><i class="fa fa-home"></i> Faq</a></li>
                    <li class="{{ Request::is('admin/term_page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_term_page') }}"><i class="fa fa-home"></i> Terms Of Use</a></li>
                    <li class="{{ Request::is('admin/privacy_page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_privacy_page') }}"><i class="fa fa-home"></i> Privacy Policy</a></li>
                    <li class="{{ Request::is('admin/contact_page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_contact_page') }}"><i class="fa fa-home"></i> Contact Us</a></li>
                    <li class="{{ Request::is('admin/job_category_page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_job_category_page') }}"><i class="fa fa-home"></i> Job Category</a></li>
                    <li class="{{ Request::is('admin/blog_page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_blog_page') }}"><i class="fa fa-home"></i>Blog</a></li>
                </ul>
            </li>


            <li class="nav-item dropdown">
                <a href="{{ Request::is('admin/job_category/view') ? 'active' : '' }}" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Job Section</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/job_category/view') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_job_category_view') }}"><i class="fas fa-angle-right"></i> Job Category</a></li>
                    <li class=""><a class="nav-link" href=""><i class="fas fa-angle-right"></i> Job Location</a></li>
                </ul>
            </li>

            {{-- <li class="{{ Request::is('admin/settings') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_settings') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Settings"><i class="fas fa-hand-point-right"></i> <span>Settings</span></a></li> --}}

            <li class="{{ Request::is('admin/why-choose/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_why_choose_item') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Why Choose Items"><i class="fas fa-hand-point-right"></i> <span>Why Choose Items</span></a></li>

            <li class="{{ Request::is('admin/testimonial/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_testimonial') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Testimonials"><i class="fas fa-hand-point-right"></i> <span>Testimonials</span></a></li>

            <li class="{{ Request::is('admin/post/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_post') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Posts"><i class="fas fa-hand-point-right"></i> <span>Posts</span></a></li>

            <li class="{{ Request::is('admin/fqa/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_fqa') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Posts"><i class="fas fa-hand-point-right"></i> <span>FQA</span></a></li>

        </ul>
    </aside>
</div>
