@extends('layouts.app')

@section('content')
    <div class="container" style='margin-top:100px; margin-bottom: 200px'>
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New chapter</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/chapter') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/admin/chapter', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('admin.chapter.form')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            $('.wysiwygeditor').froalaEditor({
                height: 400,
                placeholderText: '',
                toolbarButtons: ['bold', 'italic', 'underline', 'strikeThrough', 'fontSize', '|', 'color', 'emoticons', '|', 'paragraphFormat', 'align', 'formatOL', 'formatUL', 'quote',
                    '-', 'undo', 'redo', 'insertLink', 'insertImage', 'insertVideo', 'insertTable', 'clearFormatting', 'html'],
                imageUploadParam: 'file',
                imageUploadMethod: 'post',
                imageUploadURL: '/froala/upload_image',
                imageUploadParams: {        
                    _token: "{{ csrf_token() }}" // This passes the laravel token with the ajax request.
                  }
            })
        });
        
        
        //show header on scroll up
        var didScroll;
        var lastScrollTop = 0;
        var delta = 5;
        var navbarHeight = $('#main-menu').outerHeight();

        $(window).scroll(function (event) {
            didScroll = true;
        });

        setInterval(function () {
            if (didScroll) {
                hasScrolled();
                didScroll = false;
            }
        }, 250);

        function hasScrolled() {
            var st = $(this).scrollTop();

            // Make sure they scroll more than delta
            if (Math.abs(lastScrollTop - st) <= delta)
                return;

            // If they scrolled down and are past the navbar, add class .nav-up.
            // This is necessary so you never see what is "behind" the navbar.
            if (st > lastScrollTop && st > navbarHeight) {
                // Scroll Down
                $('#main-menu').removeClass('nav-down').addClass('nav-up');
            } else {
                // Scroll Up
                if (st + $(window).height() < $(document).height()) {
                    $('#main-menu').removeClass('nav-up').addClass('nav-down');
                }
            }

            lastScrollTop = st;
        }
    </script>

@endsection
