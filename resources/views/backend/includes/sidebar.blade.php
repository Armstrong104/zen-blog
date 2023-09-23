<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="{{route('admin.dashboard')}}" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>ZenBlog</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{asset('/')}}backend-assets/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">Jhon Doe</h6>
                <span>Admin</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{route('admin.dashboard')}}" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Categories</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{route('admin.category.create')}}" class="dropdown-item">Add Catagory</a>
                    <a href="{{ route('admin.category.index') }}" class="dropdown-item">Manage Category</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Blogs</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('blogs.create') }}" class="dropdown-item">Add Blog</a>
                    <a href="{{ route('blogs.index') }}" class="dropdown-item">Manage Blog</a>
                </div>
            </div>
            <a href="widget.html" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Widgets</a>

        </div>
    </nav>
</div>
