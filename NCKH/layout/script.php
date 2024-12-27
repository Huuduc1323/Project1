</div>
</div>
</div>
</div>
</div>
</body>
<script src="assets/js/core/jquery.3.2.1.min.js"></script>
<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>
<script src="assets/js/plugin/chartist/chartist.min.js"></script>
<script src="assets/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js"></script>
<script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
<script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<script src="assets/js/plugin/jquery-mapael/jquery.mapael.min.js"></script>
<script src="assets/js/plugin/jquery-mapael/maps/world_countries.min.js"></script>
<script src="assets/js/plugin/chart-circle/circles.min.js"></script>
<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/js/ready.min.js"></script>
<script src="assets/js/demo.js"></script>
<script src="assets/js/main.js"></script>
<script src="PHPMailer/smtp.js"></script>
<script src="https://smtpjs.com/v3/smtp.js"></script>
<!-- <script src="ckeditor/ckeditor5_1/ckeditor5/ckeditor5.js"></script>
<script>
CKEDITOR.replace('content');
</script> -->
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#content' ))
        .catch( error => {
            console.error( error );
        });
</script>
<!-- <script>
    const {
        ClassicEditor,
        Essentials,
        Bold,
        Italic,
        Font,
        Paragraph
    } = CKEDITOR;
    const { FormatPainter } = CKEDITOR_PREMIUM_FEATURES;

    ClassicEditor
        .create( document.querySelector( '#editor' ), {
            licenseKey: '<YOUR_LICENSE_KEY>',
            plugins: [ Essentials, Bold, Italic, Font, Paragraph, FormatPainter ],
            toolbar: [
                'undo', 'redo', '|', 'bold', 'italic', '|',
                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|',
                'formatPainter'
            ]
        } )
        .then( /* ... */ )
        .catch( /* ... */ );
</script> -->


<script>
$('#list-teachers').DataTable();
$('#list-students').DataTable();
$('#list-projects').DataTable();
// Hàm khởi tạo đồng hồ
function startTime() {
    // Lấy Object ngày hiện tại
    var today = new Date();

    // Giờ, phút, giây hiện tại
    var d = today.getDate();
    var M = today.getMonth();
    var y = today.getFullYear();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();

    // Chuyển đổi sang dạng 01, 02, 03
    M = checkTime(M + 1);
    m = checkTime(m);
    s = checkTime(s);

    // Ghi ra trình duyệt
    document.getElementById('timer').innerHTML = "📆 DATE: " + d + "/" + M + "/" + y + "<br/>⏰ TIME: " + h + ":" + m +
        ":" +
        s;
    // Dùng hàm setTimeout để thiết lập gọi lại 0.5 giây / lần
    var t = setTimeout(function() {
        startTime();
    }, 500);
}

// Hàm này có tác dụng chuyển những số bé hơn 10 thành dạng 01, 02, 03, ...
function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}
</script>
<script>
if (typeof(Storage) !== "undefined") {
    // Store
    sessionStorage.setItem("day_now", "today");
    // Retrieve
    // document.getElementById("result").innerHTML = sessionStorage.getItem("lastname");
} else {
    document.getElementById("result").innerHTML = "Sorry, your browser does not support Web Storage...";
}
</script>

</html>