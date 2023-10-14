<div class="modal fade" id="dispmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 700px;">
        <div class="modal-content px-3">
            <div class="modal-header border-0">
                <h4 class="modal-title text-black font-weight-bold" id="dispModalTitle"></h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body text-justify">
                <div class="w-100">
                    <div class="container" id= "rincianSurat">
                        <table class="table text-black">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col">
                                        Nomor
                                    </th>
                                    <th scope="col">
                                        Nama Staff
                                    </th>
                                    <th scope="col">
                                        Pesan
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-black">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

<script>
    $('#dispmodal').on('shown.bs.modal',function() {
        let html=''
        let no=0
        const options = { year: 'numeric', month: 'long', day: 'numeric' };
            $('#dispModalTitle').text('Disposisi '+disp[0].no_surat) 
            disp.map(u=>{
                no++;
                html+="<tr><th scope='row'>"+no+"</th><td>"+u.nama+"</td><td>"+u.pesan+"</td></tr>";
            })
            $("#rincianSurat table tbody").html(html)
            // $('#asal').val(disp[0].asal);
            // $('#perihal').val(disp[0].perihal==null?'-':disp[0].perihal);
            // var tglTerima = new Date(disp[0].created_at);
            // var tglSurat = new Date(disp[0].tanggal);
            // $('#tglSurat').val(tglSurat.toLocaleDateString('id-ID',options));
            // $('#tglTerima').val(tglTerima.toLocaleDateString('id-ID',options));
        
    });
</script>