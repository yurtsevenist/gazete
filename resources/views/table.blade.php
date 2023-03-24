  <!-- DataTables  & Plugins -->
  <script src="{{asset('back')}}/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="{{asset('back')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="{{asset('back')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="{{asset('back')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="{{asset('back')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="{{asset('back')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="{{asset('back')}}/plugins/jszip/jszip.min.js"></script>
  <script src="{{asset('back')}}/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="{{asset('back')}}/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="{{asset('back')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="{{asset('back')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="{{asset('back')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "buttons": ["copy", "excel", "pdf", "print"],
            "lengthMenu": [ [25, 50,100, -1], [25, 50,100, "All"] ],
            language: {
            info: "_TOTAL_ kayıttan _START_ ile _END_ arasındaki kayıtlar gösteriliyor.",
            infoEmpty: "Gösterilecek hiç kayıt yok.",
            loadingRecords: "Kayıtlar yükleniyor.",
            zeroRecords: "Tablo boş",
            lengthMenu: "Her sayfada _MENU_ kayıt göster",
            search: "Arama:",
            infoFiltered: "(toplam _MAX_ kayıttan filtrelenenler)",
            buttons: {
                copyTitle: "Panoya kopyalandı.",
                copySuccess: "Panoya %d satır kopyalandı",
                copy: "Kopyala",
                print: "Yazdır",
            },

            paginate: {
                first: "İlk",
                previous: "Önceki",
                next: "Sonraki",
                last: "Son"
            },
        }
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        

    });
</script>