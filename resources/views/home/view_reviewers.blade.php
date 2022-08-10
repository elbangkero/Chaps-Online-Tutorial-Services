<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My PDF Viewer</title>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.943/pdf.min.js">
    </script>

    <link rel="stylesheet" href="{{asset('public/storage/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
            height: 85px;
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
    </style>
</head>

<body>
    <input type="text" name="" id="pdf_id" value="{{$id}}" style="display: none;">
    <div id="my_pdf_viewer">
        <div id="canvas_container">
            <a class="close-btn" href="{{route('reviewers')}}">&times;</a>
            <canvas id="pdf_renderer"></canvas>
        </div>
        <div id="navigation_controls">
            <button id="go_previous">Previous</button>
            <input id="current_page" value="1" type="number" />
            <button id="go_next">Next</button>
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