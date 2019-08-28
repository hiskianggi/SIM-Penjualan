	function angka(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if ((charCode < 48 || charCode > 57)&&charCode>32)
            return false;
        return true;
}
		function huruf(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if ((charCode < 65 || charCode > 90)&&(charCode < 97 || charCode > 122)&&charCode>32)
            return false;
        return true;
}
function cari_brg(){
                var id_barang = $("#id_barang").val();
                $.ajax({
                    url: 'http://localhost/simpenjualan/content/cari_brg.php',
                    data:"id_barang="+id_barang ,
                }).success(function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#nama_barang').val(obj.nama_barang);
                    $('#harga').val(obj.harga);
                });
            }
function cari_plg(){
                var id_pelanggan = $("#id_pelanggan").val();
                $.ajax({
                    url: 'http://localhost/simpenjualan/content/cari_plg.php',
                    data:"id_pelanggan="+id_pelanggan ,
                }).success(function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#nama_pelanggan').val(obj.nama);
                });
            }
function simpan_detail(){
    $.ajax({
        url: "crud/simpan_detail.php",
        type:"POST",
        data:{
            id_trans:$("#id_transaksi").val(),
            id_barang:$("#id_barang").val(),
            jumlah_beli:$("#jumlah_barang").val(),
            sub_total:$("#subtotal").val()
        },
        success:function(hasil){
            alert(hasil);
            buka_tab();
        }
      });
}
function hapus_detail(h){
    $.ajax({
        url: "crud/hapus_detail.php",
        type:"POST",
        data:{
            id_detail_trans:h
        },
        success:function(hasil){
            alert(hasil);
            buka_tab();
        }
      });
}
function jmlbrg(){
    harga_barang=document.getElementById('harga').value;
    jumlah_barang=document.getElementById('jumlah_barang').value;
    totalnya=harga_barang*jumlah_barang
    document.getElementById('subtotal').value=totalnya;
}
function plgnn(){
    plh=$("#plg_cb").val();
    if(plh=="Pelanggan"){
        $("#id_pelanggan").show();
        $("#nama_pelanggan").show();
        $("#id_plg").show();
        $("#nm_plg").show();
    }else{
        $("#id_pelanggan").hide();
        $("#nama_pelanggan").hide();
        $("#id_plg").hide();
        $("#nm_plg").hide();
        document.getElementById('diskon').value="";
    }
}
function buka_tab(){
    id33333=document.getElementById('id_transaksi').value;
    $("#dttrk").load("content/detail_transaksi.php?idt="+id33333);
}
function kembalian(){
    ttot3=$("#totalsub33").val();
    ddsk3=$("#diskon").val();
    hhsl3=ttot3-ddsk3;
    ddsk3=$("#bayarnya").val();
    kkem3=ddsk3-hhsl3;
    document.getElementById('kembalinya').value=kkem3;
}