$(function () {
	var base_url = $(".base_url").data("baseurl");
	//MENU
	$(".tampilModalUbahMenu").on("click", function () {
		const id = $(this).data("id");

		$("#newMenuModalLabel").html("Edit Menu");
		$(".modal-footer button[type=submit]").html("Update");
		$(".modal-body form").attr("action", base_url + "menu/updatemenu/" + id);

		$.ajax({
			url: base_url + "menu/getupdatemenu",
			data: { id: id },
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#menu").val(data.menu);
			},
		});
	});

	$(".add-new-menu").on("click", function () {
		$("#newMenuModalLabel").html("Add New Menu");
		$(".modal-footer button[type=submit]").html("Add");
		$(".modal-body form").attr("action", base_url + "menu");

		$("#menu").val("");
	});

	//SUBMENU
	$(".tampilModalUbahSubMenu").on("click", function () {
		const id = $(this).data("id");

		$("#newSubMenuModalLabel").html("Edit Sub Menu");
		$(".modal-footer button[type=submit]").html("Update");
		$(".modal-body form").attr("action", base_url + "menu/updatesubmenu/" + id);

		$.ajax({
			url: base_url + "menu/getupdatesubmenu",
			data: { id: id },
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#title").val(data.title);
				$("#menu_id").val(data.menu_id);
				$("#url").val(data.url);
				$("#icon").val(data.icon);
				if (data.is_active == 1) $("#is_active").prop("checked", true);
				else $("#is_active").prop("checked", false);
			},
		});
	});

	$(".add-new-sub-menu").on("click", function () {
		$("#newSubMenuModalLabel").html("Add New Sub Menu");
		$(".modal-footer button[type=submit]").html("Add");
		$(".modal-body form").attr("action", base_url + "menu/submenu");

		$("#title").val("");
		$("#menu_id").val("");
		$("#url").val("");
		$("#icon").val("");
		$("#is_active").prop("checked", true);
	});

	$(".add-profile").click(function () {
		$("#newRoleModalLabel").html("Tambah Struktur");
		$(".modal-footer button[type=submit]").html("Add");
		$(".modal-body form").attr("action", base_url + "admin/isiprofil");
		$("#nama").val("");
		$("#nim").val("");
		$("#kelas").val("");
		$("#jbt option[value=1]").prop("selected", true);
	});

	$(".btn-edit-profile-structure").click(function () {
		const id = $(this).data("id");
		$("#newRoleModalLabel").html("Edit Struktur");
		$(".modal-footer button[type=submit]").html("Update");
		$(".modal-body form").attr(
			"action",
			base_url + "/admin/updateprofile/" + id
		);
		$.ajax({
			url: base_url + "/admin/getupdateprofile",
			data: { id: id },
			method: "post",
			dataType: "json",
			success: function (data) {
				// console.log(data);
				$("#nama").val(data.nama);
				$("#nim").val(data.nim);
				$("#kelas").val(data.kelas);
				$("#jbt option[value=" + data.idJabatan + "]").prop("selected", true);
			},
		});
	});

	//KELAS
	$(".addClassModal").on("click", function () {
		$("#newClassModalLabel").html("Tambah Kelas");
		$(".footer-kelas button[type=submit]").html("Add");
		$(".footer-kelas button[type=submit]").attr("name", "kelas-save");
		$("#kelas").val("");
	});

	$(".editClassModal").on("click", function () {
		const id = $(this).data("id");

		$("#newClassModalLabel").html("Edit Kelas");
		$(".footer-kelas button[type=submit]").html("Update");
		$(".footer-kelas button[type=submit]").attr("name", "kelas-edit");
		$("#id_kelas").val(id);

		$.ajax({
			url: base_url + "admin/getupdatekelas",
			data: { id: id },
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#kelas").val(data.kelas);
			},
		});
	});

	$(".btn-add-pengumuman").on("click", function () {
		$("#newPengumumanLabel").html("Tambah Pengumuman");
		$(".modal-footer button[type=submit]").html("Add");
		$("form").attr("action", base_url + "admin/isipengumuman");
		$(".caption-edit-pengumuman").addClass("d-none");

		$("#judul").val("");
		$("#is_active").prop("checked", true);
	});

	$(".btn-edit-pengumuman").on("click", function () {
		const id = $(this).data("id");
		$("#newPengumumanLabel").html("Edit Pengumuman");
		$(".modal-footer button[type=submit]").html("Update");
		$("form").attr("action", base_url + "admin/updatepengumuman/" + id);
		$(".caption-edit-pengumuman").removeClass("d-none");
		$.ajax({
			url: base_url + "admin/getupdatepengumuman",
			data: { id: id },
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#judul").val(data.judul);
				if (data.isActive == 1) $("#is_active").prop("checked", true);
				else $("#is_active").prop("checked", false);
			},
		});
	});
});
