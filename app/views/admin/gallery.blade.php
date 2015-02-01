@extends('admin/layout')

@section('appendHead')
    {{ HTML::style('css/datepicker.css') }}
    <!-- blueimp Gallery styles -->
    {{ HTML::style('css/blueimp-gallery.min.css') }}
    <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
    {{ HTML::style('css/jquery.fileupload.css') }}
    {{ HTML::style('css/jquery.fileupload-ui.css') }}
    <!-- CSS adjustments for browsers with JavaScript disabled -->
    <noscript>{{ HTML::style('css/jquery.fileupload-noscript.css') }}</noscript>
    <noscript>{{ HTML::style('css/jquery.fileupload-ui-noscript.css') }}</noscript>
@endsection

@section('content')

    <h1 class="page-header">Galería</h1>

    @if (Session::has('msg'))
        {{ Session::get('msg') }}
    @endif

    @if (isset($gallery))
    {{ Form::model($gallery, ['route' => ['updateGallery', $gallery->id], 'role' => 'form']) }}
    @else
    {{ Form::open(['route' => 'createGallery', 'role' => 'form']) }}
    @endif

        {{ Field::text('title', 'Título') }}

        {{ Field::text('date', 'Fecha', null, ['class' => 'datepicker']) }}

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Guardar{{ !isset($gallery) ? ' y agregar fotos' : ''; }}</button>
        </div>
    {{ Form::close() }}


    @if (isset($gallery))
        <!-- The file upload form used as target for the file upload widget -->
        <form id="fileupload" action="{{ route('uploadGallery', ['id' => $gallery->id]) }}" method="POST" enctype="multipart/form-data" data-pictures-url="{{ route('galleryPics', ['id' => $gallery->id]) }}">
            <!-- Redirect browsers with JavaScript disabled to the origin page -->
            <noscript><input type="hidden" name="redirect" value="{{ route('addGallery') }}"></noscript>
            <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
            <div class="row fileupload-buttonbar">
                <div class="col-lg-7">
                    <!-- The fileinput-button span is used to style the file input field as button -->
                    <span class="btn btn-success fileinput-button">
                        <i class="glyphicon glyphicon-plus"></i>
                        <span>Agregar fotos...</span>
                        <input type="file" name="files[]" multiple>
                    </span>
                    <button type="submit" class="btn btn-primary start">
                        <i class="glyphicon glyphicon-upload"></i>
                        <span>Subir</span>
                    </button>
                    <button type="reset" class="btn btn-warning cancel">
                        <i class="glyphicon glyphicon-ban-circle"></i>
                        <span>Cancelar</span>
                    </button>
                    <button type="button" class="btn btn-danger delete">
                        <i class="glyphicon glyphicon-trash"></i>
                        <span>Borrar</span>
                    </button>
                    <input type="checkbox" class="toggle">
                    <!-- The global file processing state -->
                    <span class="fileupload-process"></span>
                </div>
                <!-- The global progress state -->
                <div class="col-lg-5 fileupload-progress fade">
                    <!-- The global progress bar -->
                    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                    </div>
                    <!-- The extended global progress state -->
                    <div class="progress-extended">&nbsp;</div>
                </div>
            </div>
            <!-- The table listing the files available for upload/download -->
            <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
        </form>
    @endif

@endsection

@section('appendScripts')
    <!-- The template to display files available for upload -->
    <script id="template-upload" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
        <tr class="template-upload fade">
            <td>
                <span class="preview"></span>
            </td>
            <td>
                <p class="name">{%=file.name%}</p>
                <strong class="error text-danger"></strong>
            </td>
            <td>
                <p class="size">Processing...</p>
                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
            </td>
            <td>
                {% if (!i && !o.options.autoUpload) { %}
                    <button class="btn btn-primary start" disabled>
                        <i class="glyphicon glyphicon-upload"></i>
                        <span>Start</span>
                    </button>
                {% } %}
                {% if (!i) { %}
                    <button class="btn btn-warning cancel">
                        <i class="glyphicon glyphicon-ban-circle"></i>
                        <span>Cancel</span>
                    </button>
                {% } %}
            </td>
        </tr>
    {% } %}
    </script>
    <!-- The template to display files available for download -->
    <script id="template-download" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
        <tr class="template-download fade">
            <td>
                <span class="preview">
                    {% if (file.thumbnailUrl) { %}
                        <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                    {% } %}
                </span>
            </td>
            <td>
                <p class="name">
                    {% if (file.url) { %}
                        <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                    {% } else { %}
                        <span>{%=file.name%}</span>
                    {% } %}
                </p>
                {% if (file.error) { %}
                    <div><span class="label label-danger">Error</span> {%=file.error%}</div>
                {% } %}
            </td>
            <td>
                <span class="size">{%=o.formatFileSize(file.size)%}</span>
            </td>
            <td>
                {% if (file.deleteUrl) { %}
                    <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                        <i class="glyphicon glyphicon-trash"></i>
                        <span>Delete</span>
                    </button>
                    <input type="checkbox" name="delete" value="1" class="toggle">
                {% } else { %}
                    <button class="btn btn-warning cancel">
                        <i class="glyphicon glyphicon-ban-circle"></i>
                        <span>Cancel</span>
                    </button>
                {% } %}
            </td>
        </tr>
    {% } %}
    </script>

    {{ HTML::script('js/bootstrap-datepicker.js') }}

    <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
    {{ HTML::script('js/vendor/jquery.ui.widget.js') }}
    <!-- The Templates plugin is included to render the upload/download listings -->
    {{ HTML::script('js/tmpl.min.js') }}
    <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
    {{ HTML::script('js/load-image.all.min.js') }}
    <!-- The Canvas to Blob plugin is included for image resizing functionality -->
    {{ HTML::script('js/canvas-to-blob.min.js') }}
    <!-- blueimp Gallery script -->
    {{ HTML::script('js/jquery.blueimp-gallery.min.js') }}
    <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
    {{ HTML::script('js/jquery.iframe-transport.js') }}
    <!-- The basic File Upload plugin -->
    {{ HTML::script('js/jquery.fileupload.js') }}
    <!-- The File Upload processing plugin -->
    {{ HTML::script('js/jquery.fileupload-process.js') }}
    <!-- The File Upload image preview & resize plugin -->
    {{ HTML::script('js/jquery.fileupload-image.js') }}
    <!-- The File Upload validation plugin -->
    {{ HTML::script('js/jquery.fileupload-validate.js') }}
    <!-- The File Upload user interface plugin -->
    {{ HTML::script('js/jquery.fileupload-ui.js') }}
    <!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
    <!--[if (gte IE 8)&(lt IE 10)]>
    {{ HTML::script('js/cors/jquery.xdr-transport.js') }}
    <![endif]-->

    {{ HTML::script('js/admin.gallery.js') }}

@endsection