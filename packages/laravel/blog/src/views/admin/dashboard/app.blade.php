@include('blog::admin.dashboard.body.head')
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('blog::admin.dashboard.body.topnav')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->


      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      @include('blog::admin.dashboard.body.sidebar')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
            @yield('content')


        </div>



        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
@include('blog::admin.dashboard.body.footer')

