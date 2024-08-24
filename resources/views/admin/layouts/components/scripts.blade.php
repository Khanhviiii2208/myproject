<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
{{-- <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script> --}}
<script src="https://codescandy.com/geeks-bootstrap-5/assets/libs/@yaireo/tagify/dist/tagify.min.js"></script>

{{-- ckeeditor + ckfinder --}}
<script src="/admin_assets/plugins/ckeditor/ckeditor.js"></script>
<script src="/admin_assets/plugins/ckfinder_2/ckfinder.js"></script>
<script src="/admin_assets/library/finder.js"></script>

<script>
    const BASE_URL= "{{ env('BASE_URL') }}";
</script>

<script>
    new DataTable('#dataTable'); //?
</script>

<script>
    // The DOM element you wish to replace with Tagify

$(document).ready(function(){
    $('#dataTable').DataTable();  //??
});
// initialize Tagify on the above input node reference
var inputTag = document.querySelector('input[name=meta_keyword]'); //??
new Tagify(inputTag) //? 

//select 2

// $(".select_vd").select2({
//     maximumSelectionLength: 4
//   });

</script>

