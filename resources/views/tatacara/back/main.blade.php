@extends('templates/admin')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">Tata Cara</h3>
                
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Launch demo modal
                </button>
  
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            ...
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
  
                <div class="table-responsive">
                    <table class="table text-nowrap" id="data-table">
                        <thead>
                            <tr>
                                <th class="border-top-0">No</th>
                                <th class="border-top-0">Nama</th>
                                <th class="border-top-0">Instansi</th>
                                <th class="border-top-0">Status</th>
                                <th class="border-top-0">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
    function insertData(){
        kode_buku = $("#kode_buku").val();
        judul_buku = $("#judul_buku").val();
        harga = $("#harga").val();
        stok = $("stok").val();
        
        if(kode_buku == ''){
            $("#peringatan").html("Kode buku harus diisi!");
        }else if(judul_buku == ''){
            $("#peringatan").html("Judul buku harus diisi!");
        }else if(harga == ''){
            $("#peringatan").html("Harga harus diisi!");
        }else if(stok == ''){
            $("#peringatan").html("Stok harus diisi!");
        }else{
            $.ajax({
                type: 'POST',
                data: 'kode_buku=' + kode_buku + '&judul_buku=' + judul_buku + '&harga=' + harga + '&stok=' + stok,
                
                dataType: 'json',
                success: function(data){
                    showData();
                    $("#exampleModal").modal("hide");
                    $("#kode_buku").val('');
                    $("#judul_buku").val('');
                    $("#harga").val('');
                    $("#stok").val('');
                }
            });
        }
    }
</script>
@endsection