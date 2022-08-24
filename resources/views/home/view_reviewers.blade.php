<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />
    <title>My PDF Viewer</title>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.943/pdf.min.js">
    </script>

    <link rel="stylesheet" href="{{asset('public/storage/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="{{asset('public/storage/fontawesome/css/all.min.css')}}" rel="stylesheet">
    <style>
        #canvas_container {
            height: 100vh;
            width: 100vw;
            overflow: auto;
        }

        #canvas_container {
            background: #333;
            text-align: center;
            border: solid 1px;
        }

        #navigation_controls {
            height: 120px;
            position: fixed;
            bottom: 0%;
            width: 100%;
            background-color: hsla(0 0% 0% / 0);
            opacity: 1;
            text-align: center;
            padding: 5px;
        }

        .close-btn {
            font-size: 40px;
            font-weight: bold;
            color: black !important;
            position: fixed;
            margin: 25px;
            top: 0;
            right: 0;
            cursor: pointer;
            z-index: 50;
            text-decoration: none !important;
        }

        .header-control {
            background: #333;
            float: right;
            margin: 5px;

        }

        a {
            color: white !important;
        }

        body {
            background: #333;
        }

        button {
            background: rgba(0,0,0,0.5);
            -webkit-appearance: none; 
            /* Green */
            border: none;
            color: black;
            padding: 2px 15px;
            text-align: center;
            border-color:black;
            border-style:solid;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <input type="text" name="" id="pdf_id" value="{{$id}}" style="display: none;">

    <div class="header-control">
        <a href="{{asset($pdf_path)}}" class="fa fa-download" download></a>
        <a href="{{route('reviewers')}}" style="margin-left:10px"><span class="fa fa-times"></span></a>
    </div>
    <div id="my_pdf_viewer">

        <div id="canvas_container">
            <canvas id="pdf_renderer"></canvas><br>
        </div>
        <div id="navigation_controls">
            <button id="go_previous"> <span class="fa fa-arrow-left"></span></button>
            <input id="current_page" value="1" type="number" />
            <button id="go_next"> <span class="fa fa-arrow-right"></span></button>
            <div id="zoom_controls" style="margin-top: 5px;">
                <button id="zoom_in">+</button>
                <button id="zoom_out">-</button>
            </div>
        </div>

    </div>

    <script>
        document.addEventListener('keyup', (e) => {
            if (e.key == 'PrintScreen') {
                navigator.clipboard.writeText('');
                return false;
            }
        });

        document.addEventListener('keydown', (e) => {
            if (e.ctrlKey && e.key == 'p') {
                e.cancelBubble = true;
                e.preventDefault();
                e.stopImmediatePropagation();
                return false;
            }
        });
        document.addEventListener('contextmenu', event => event.preventDefault());
        var myState = {
            pdf: null,
            currentPage: 1,
            zoom: 1
        }
        $(document).ready(function() {

            var itemid = $('#pdf_id').val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('display_pdf') }}",
                method: "GET",
                dataType: 'JSON',
                data: {
                    query: itemid,
                },
                success: function(data) {
                    //console.log(data);
                    $.each(data.result, function(i, post) {
                        //console.log(post.path);
                        pdfjsLib.getDocument(`{{asset('${post.path}')}}`).then((pdf) => {

                            myState.pdf = pdf;
                            render();

                        });
                    });

                }
            });
        });


        function render() {
            myState.pdf.getPage(myState.currentPage).then((page) => {

                var canvas = document.getElementById("pdf_renderer");
                var ctx = canvas.getContext('2d');

                var viewport = page.getViewport(myState.zoom);

                canvas.width = viewport.width;
                canvas.height = viewport.height;

                page.render({
                    canvasContext: ctx,
                    viewport: viewport
                });
            });
        }

        document.getElementById('go_previous').addEventListener('click', (e) => {
            if (myState.pdf == null || myState.currentPage == 1)
                return;
            myState.currentPage -= 1;
            document.getElementById("current_page").value = myState.currentPage;
            render();
        });

        document.getElementById('go_next').addEventListener('click', (e) => {
            if (myState.pdf == null || myState.currentPage > myState.pdf._pdfInfo.numPages)
                return;
            myState.currentPage += 1;
            document.getElementById("current_page").value = myState.currentPage;
            render();
        });

        document.getElementById('current_page').addEventListener('keypress', (e) => {
            if (myState.pdf == null) return;

            // Get key code
            var code = (e.keyCode ? e.keyCode : e.which);

            // If key code matches that of the Enter key
            if (code == 13) {
                var desiredPage =
                    document.getElementById('current_page').valueAsNumber;

                if (desiredPage >= 1 && desiredPage <= myState.pdf._pdfInfo.numPages) {
                    myState.currentPage = desiredPage;
                    document.getElementById("current_page").value = desiredPage;
                    render();
                }
            }
        });
        document.getElementById('zoom_in').addEventListener('click', (e) => {
            if (myState.pdf == null) return;
            myState.zoom += 0.1;
            render();
        });

        document.getElementById('zoom_out').addEventListener('click', (e) => {
            if (myState.pdf == null) return;
            myState.zoom -= 0.1;
            render();
        });
    </script>
</body>

</html>