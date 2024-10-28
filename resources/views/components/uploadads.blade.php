@props(['maxfiles','maxfilessize','filename','url','filetype'=>'images','buttontext'])
@php
if(!isset($buttontext)): $buttontext = ""; endif;
if(!isset($maxfiles)): $maxfiles = 10; endif;
if($filetype =="images"){
    $icon = "<i class='fa fa-camera-retro'></i>";
    $allowed = ".jpeg,.jpg,.png,.gif";
}elseif($filetype =="documents"){
    $icon = "<i class='fa fa-file'></i>";
    $allowed = ".doc,.docx,.xls,.xlsx,.ppt,.pptx,.pdf";
}elseif($filetype =="videos"){
    $icon = "<i class='fa fa-video'></i>";
    $allowed = ".avi,.mp4,.wmv,.mkv,.webm,.ogg,.3gp";
}elseif($filetype =="all"){
    $icon = "<i class='fa fa-file'></i>";
    $allowed = "*";
}else{
    $icon = "<i class='fa fa-camera-retro'></i>";
    $allowed = ".jpeg,.jpg,.png,.gif";
}
if(!isset($url) || empty($url)): $url = '/upload'; endif;
if(!isset($maxfilessize)): $maxfilessize = 12; endif;
if(!isset($filename) || empty($filename)): $filename = 'file'; endif;

@endphp
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/dropzone.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- Include Sortable.js via CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>

<style type="text/css">
.dz-preview{
    margin:0px !important;
    padding:0px !important;
}
.sortable-ghost {
    cursor: grabbing !important; /* Cursor while dragging */
}

.dropzone{
    padding:0px !important;
    min-height: 125px !important;
}
.dropzonecontainer {
    cursor: grab; /* Cursor when hover over the draggable item */
}
</style>

<form class="form" action="@php echo $url @endphp" method="POST"  enctype="multipart/form-data">
    <!--begin::Dropzone-->
    <div class="col-12 rtl dropzone dropzone-queue alert alert-primary" style="position: relative;max-height:120px" id="@php echo $filename; @endphp">
        <!--begin::Controls-->
        <a class="dropzone-select me-2" style="position: absolute; font-size:50px;transform: translate(-50%, -50%); top: 50%;  left: 50%;width:100%;cursor:pointer"><?php echo $icon.' '.$buttontext; ?></a>
        <!--end::Controls-->
        <!--begin::Items-->
        <div class="dropzone-items col-12">
            <div class="dropzone-item col-2" style="display:none">
                <!--begin::File-->
                <div class="dropzone-file" style="margin: 0px !important">
                    <div class="dropzone-filename" title="some_image_file_name.jpg">
                        <span data-dz-name>some_image_file_name.jpg</span>
                        <strong>(<span data-dz-size>0kb</span>)</strong>
                    </div>
                    <div class="dropzone-error" data-dz-errormessage></div>
                    <div class="dz-message" data-dz-message><span></span></div>
                </div>
                <!--end::File-->

                <!--begin::Progress-->
                <div class="dropzone-progress">
                    <div class="progress">
                        <div class="progress-bar bg-primary" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" data-dz-uploadprogress></div>
                    </div>
                </div>
                <!--end::Progress-->

                <!--begin::Toolbar-->
                <div class="dropzone-toolbar">
                    <span class="dropzone-delete" data-dz-remove><i class="bi bi-x fs-1"></i></span>
                </div>
                <!--end::Toolbar-->
            </div>
        </div>
        <!--end::Items-->
    </div>
    <!--end::Dropzone-->

    <!--begin::Hint-->
    <span class="form-text text-muted"></span>
    <!--end::Hint-->
</form>
<input type="hidden" name="<?php echo $filename; ?>" id="<?php echo $filename; ?>" class="picture <?php echo $filename; ?>">

@section('scripts')
@parent
<script type="text/javascript">

const id<?php echo $filename; ?> = "#<?php echo $filename; ?>";
const dropzone<?php echo $filename; ?> = document.querySelector(id<?php echo $filename; ?>);
var picturename = 0;
// set the preview element template
var previewNode = dropzone<?php echo $filename; ?>.querySelector(".dropzone-item");
previewNode.id<?php echo $filename; ?> = "";
var previewTemplate = previewNode.parentNode.innerHTML;
previewNode.parentNode.removeChild(previewNode);

var myDropzone<?php echo $filename; ?> = new Dropzone(id<?php echo $filename; ?>, { // Make the whole body a dropzone
    url: "<?php echo $url; ?>", // Set the url for your upload script location
    init: function() {
        this.on("thumbnail", function(file, dataUrl) {
            $('.dz-image').last().find('img').attr({width: '100%', height: '100%'});
        }),
        this.on("success", function(file) {
            $('.dz-image').css({"width":"100%", "height":"auto"});
        })
    },
    acceptedFiles: "<?php echo $allowed; ?>",
    paramName: "<?php echo $filename; ?>",
    uploadMultiple: true,
    dictDefaultMessage: "",
    parallelUploads: <?php echo $maxfiles; ?>,
    maxFiles: <?php echo $maxfiles; ?>,
    headers :{ 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
    maxFilesize: <?php echo $maxfilessize; ?>, // Max filesize in MB
    previewsContainer: id<?php echo $filename; ?> + " .dropzone-items", // Define the container to display the previews
    clickable: id<?php echo $filename; ?> + " .dropzone-select" // Define the element that should be used as click trigger to select files.
});

myDropzone<?php echo $filename; ?>.on("addedfile", function (file) {
    const dropzoneItems<?php echo $filename; ?> = dropzone<?php echo $filename; ?>.querySelectorAll('.dropzone-item');
    dropzoneItems<?php echo $filename; ?>.forEach(dropzoneItem<?php echo $filename; ?> => {
        dropzoneItem<?php echo $filename; ?>.style.display = '';
    });
});

myDropzone<?php echo $filename; ?>.on("successmultiple", function(files, response) {
    $('#<?php echo $filename; ?>').val(response);
    $('.<?php echo $filename; ?>').val(response);
    $('.avatar').attr('src', response);
});

myDropzone<?php echo $filename; ?>.on("totaluploadprogress", function (progress) {
    const progressBars<?php echo $filename; ?> = dropzone<?php echo $filename; ?>.querySelectorAll('.progress-bar');
    progressBars<?php echo $filename; ?>.forEach(progressBar<?php echo $filename; ?> => {
        progressBar<?php echo $filename; ?>.style.width = progress + "%";
    });
});

myDropzone<?php echo $filename; ?>.on("sending", function (file) {
    const progressBars<?php echo $filename; ?> = dropzone<?php echo $filename; ?>.querySelectorAll('.progress-bar');
    progressBars<?php echo $filename; ?>.forEach(progressBar<?php echo $filename; ?> => {
        progressBar<?php echo $filename; ?>.style.opacity = "1";
    });
    picturename++;
});

// Initialize Sortable.js after uploads are complete
myDropzone<?php echo $filename; ?>.on("complete", function () {
    const imageContainer = document.getElementById("imageContainer"); // Use the correct container ID

    if (typeof Sortable !== 'undefined') {
        new Sortable(imageContainer, {
            animation: 150, // Animation speed in ms
            ghostClass: 'sortable-ghost', // Class for the drop placeholder
            handle: '.dropzonecontainer', // Only allow sorting on the container
            draggable: '.dropzonecontainer', // Define which items inside the container can be sorted
        });
    }
});
</script>
@endsection
