//
var tabelsurat;
var fullData;
$(document).ready(function () {
  tabelsurat = $("#tabelsaya").DataTable({
    order:[[0,'desc']],
    columnDefs: [
      {
        targets: 0,
        render: function (data, type) {
          if (type === "display") {
            var date = new Date(data);
            var options = { year: "numeric", month: "short", day: "numeric" };
            return date.toLocaleDateString("id-ID", options);
          }
          return data;
        },
      },
      {
        targets: 3,
        render: function (data, type) {
          if (type === "display" && tipe === "masuk") {
            var date = new Date(data);
            var options = { year: "numeric", month: "short", day: "numeric" };
            return date.toLocaleDateString("id-ID", options);
          }
          return data;
        },
      },
    ],
    dom: '<"top"f>rt<"bottom"ip><"clear">',
    language: {
      filter: "Cari: _SEARCH_",
      info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ surat",
      zeroRecords: "Surat Belum Tersedia",
      paginate: {
        first: "Pertama",
        last: "Terakhir",
        next: "Selanjutnya",
        previous: "Sebelumnya",
      },
      search: "Cari:",
    },
  });

  fullData = tabelsurat.rows().data().toArray();
});

$(document).ready(function () {
  $("#tabeluser").DataTable({
    dom: '<"top"lf>rt<"bottom"ip><"clear">',
    language: {
      lengthMenu: "Tampilkan _MENU_ user",
      filter: "Cari: _SEARCH_",
      info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ user",
      zeroRecords: "User Tidak Ditemukan",
      paginate: {
        first: "Pertama",
        last: "Terakhir",
        next: "Selanjutnya",
        previous: "Sebelumnya",
      },
      search: "Cari:",
    },
  });
});

function filterBulan(tipe, bulan) {
  if(bulan===''){$('table tbody tr').show(); return}
  // var tr = tabelsurat.rows().nodes();
  // var filteredData = tabelsurat.rows().nodes().each(function(){
  //   const date = new Date($(this).children('td').eq(0).text());
    
    //   // }
    // });
    fullData.map(function(item,index){
      var date = new Date(item[0]);
      const formattedDate = `${date.getMonth()+1}/${date.getFullYear()}`
      if(formattedDate === bulan)
      $('table tbody tr').eq(index).show()
      else 
      $('table tbody tr').eq(index).hide()
  })
}

$(document).ready(function () {
  $("#tabelsaya_wrapper .top").addClass("form-inline mb-2");
  $("#tabelsaya_filter").addClass("ml-auto");
  $("#tabelsaya_filter input").addClass("form-control p-0 m-0");
  $("#tabelsaya_wrapper .top").prepend(
    `<div class="input-group">
    <label class="input-group-prepend">Bulan :</label>
    <div class="position-relative">
    <input class="form-control rounded" type="text" data-type="month" id="monthPicker">
    <div class="input-group-append position-absolute clear-filter d-none">
    <span class="input-group-text bg-transparent border-0 ">
    <i class="fas fa-times fa-sm"></i>
    </span>
    </div>
    </div>
</div>`
  );

  $("#monthPicker").change(function () {
    if ($(this).val() != "") $(".clear-filter").removeClass("d-none");
    else $(".clear-filter").addClass("d-none");
  });
  $(".clear-filter").click(function () {
    $("#monthPicker").val("");
    filterBulan(tipe, "");
    $("#monthPicker").trigger("change");
  });
  var months = [
    "Januari",
    "Februari",
    "Maret",
    "April",
    "Mei",
    "Juni",
    "Juli",
    "Agustus",
    "September",
    "Oktober",
    "November",
    "Desember",
  ];
  $("#monthPicker").monthpicker({
    target: "#monthPicker",
    dateFormat: "MM/yy", // Use four "m"s for full month name
    monthNames: months,
    changeYear: true,
    monthNamesShort: [
      "Jan",
      "Feb",
      "Mar",
      "Apr",
      "Mei",
      "Jun",
      "Jul",
      "Agt",
      "Sep",
      "Okt",
      "Nov",
      "Des",
    ],
    onSelect: function (month) {
      let temp = month.split("/");
      let bulan = String(months.indexOf(temp[0]) + 1 + "/" + temp[1]);
      $("#monthPicker").trigger("change");
      filterBulan(tipe, bulan);
    },
  });
});
