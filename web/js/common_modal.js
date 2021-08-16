$(document).on("click", ".common_modal", function () {
  if (
    typeof $(this).attr("edit_id") != "undefined" &&
    $(this).attr("edit_id") !== null
  ) {
    $edit_id = $(this).attr("edit_id");
  } else {
    $edit_id = "new";
  }

  if (typeof $(this).attr("db") != "undefined" && $(this).attr("db") !== null) {
    $db = $(this).attr("db");
  } else {
    $db = "db";
  }
  $gourl = $(this).attr("gourl");
  $url = document.URL.split("/");
  $url = $url[0] + "//" + $url[2];
  $.ajax({
    type: "POST",
    url: $url + $gourl,
    data: { edit_id: $edit_id, db: $db },
    success: function (data) {
      document.getElementById("display_modal").innerHTML = data;
      allValidate();
    },
  });
});
$(document).on("change", "#full_control", function () {
  //"select all" change
  var status = this.checked; // "select all" checked status
  $(".permission").each(function () {
    //iterate all listed checkbox items
    this.checked = status; //change ".checkbox" checked status
  });
});

$(document).on("change", ".permission", function () {
  //".checkbox" change
  //uncheck "select all", if one of the listed checkbox item is unchecked
  if (this.checked == false) {
    //if this item is unchecked
    $("#full_control")[0].checked = false; //change "select all" checked status to false
  }

  //check "select all" if all checkbox items are checked
  if ($(".permission:checked").length == $(".permission").length) {
    $("#full_control")[0].checked = true; //change "select all" checked status to true
  }
});
$(document).on("click", ".common_modal_delete", function () {
  $delete_id = $(this).attr("delete_id");

  if (typeof $(this).attr("db") != "undefined" && $(this).attr("db") !== null) {
    $db = $(this).attr("db");
  } else {
    $db = "db";
  }

  $gourl = $(this).attr("gourl");
  $url = document.URL.split("/");
  $url = $url[0] + "//" + $url[2];
  $.ajax({
    type: "POST",
    url: $url + $gourl,
    data: { delete_id: $delete_id, db: $db },
    success: function (data) {
      // alert(1)
      document.getElementById("display_modal_delete").innerHTML = data;
    },
  });
});

$(document).on("click", ".common_dialog", function () {
  $gourl = $(this).attr("gourl");
  $url = document.URL.split("/");
  $url = $url[0] + "//" + $url[2];
  $.ajax({
    type: "POST",
    url: $url + $gourl,
    success: function (data) {
      document.getElementById("display_modal").innerHTML = data;
      allValidate();
    },
  });
});

$(document).on("click", "#web_config_btn", function () {
  $gourl = $(this).attr("gourl");
  $url = document.URL.split("/");
  $url = $url[0] + "//" + $url[2];
  // $formdata = new FormData($('#web_config_fm')[0]);
  $formdata = $("#webconfig").val();
  $.ajax({
    type: "POST",
    url: $url + $gourl,
    // data:  $formdata,
    // cache : false,
    // processData: false,
    data: { web_config: $formdata },
    success: function (data) {
      // alert(data);
      // console.log(data)
      $("#webconfig_").html(data);
    },
  });
});

$(document).on("click", "#php_ini_btn", function () {
  $gourl = $(this).attr("gourl");
  $url = document.URL.split("/");
  $url = $url[0] + "//" + $url[2];
  $url = $url + $gourl;
    console.log($url);
  // $formdata = new FormData($('#php_ini_fm')[0]);
  $formdata = $("#phpini").val();
  $.ajax({
    type: "POST",
    url: $url,
    data: { php_ini: $formdata },
    // cache : false,
    // processData: false,
    success: function (data) {
      // alert(data);
      // console.log(data)
      $("#phpini_").html(data);
    },
  });
});
