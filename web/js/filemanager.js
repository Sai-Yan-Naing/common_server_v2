$(document).on("click", ".delete_filedir", function () {
  $path = $(this).attr("path");
  $re_url = $(this).attr("re_url");
  $url = document.URL.split("/");
  $url = $url[0] + "//" + $url[2];

  $common_path = $("#common_path").attr("path");
  $action = $(this).attr("action");
  $.ajax({
    type: "POST",
    url: $url + "/share/servers/filemanager/confirm",
    data: { path: $path, common_path: $common_path, action: $action },
    success: function (data) {
      // alert(data)
      // alert(document.URL)
      document.getElementById("changebody").innerHTML = data;
      $(".download_file").each(function (i, obj) {
        $temp = $(this).attr("href");
        $(this).attr("href", $temp + "&common_path=" + $common_path);
      });
    },
  });
});

$(document).on("click", ".open_file", function () {
  $file_name = $(this).attr("file_name");
  var extension = $file_name.substr($file_name.lastIndexOf(".") + 1);
  var fileExtension = ["html", "css", "php", "js", "txt"];
  $re_url = $(this).attr("re_url");
  $url = document.URL.split("/");
  $url = $url[0] + "//" + $url[2];
  $common_path = $("#common_path").attr("path");
  if (fileExtension.indexOf(extension) > -1) {
    document.getElementById("file_open").innerHTML = $("#display_modal").html();
    $.ajax({
      type: "POST",
      url: $url + "/share/servers/filemanager/confirm",
      data: {
        file_name: $file_name,
        common_path: $common_path,
        action: "open_file",
      },
      success: function (data) {
        document.getElementById("file_open").innerHTML = data;
      },
    });
  } else {
    alert("This file is unsupported format.");
  }
});

$(document).on("click", "#save_file", function () {
  $text_editor_open = $("#text_editor_open").val();
  $openfile_name = $(this).attr("file_name");
  $re_url = $(this).attr("re_url");
  $url = document.URL.split("/");
  $url = $url[0] + "//" + $url[2];
  // alert($openfile_name)
  $common_path = $("#common_path").attr("path");

  $.ajax({
    type: "POST",
    url: $url + "/share/servers/filemanager/confirm",
    data: {
      text_editor_open: $text_editor_open,
      openfile_name: $openfile_name,
      common_path: $common_path,
      action: "save_file",
    },
    success: function (data) {
      alert(data);
      // document.getElementById("file_open").innerHTML = data;
    },
  });
});

$(document).on("click", ".fm_common_c", function () {
  $root_dir = $("#fm_common_path").next();
  $root_dir.attr("type", "hidden");
  $("#fm_common_path").css("display", "none");
  $action = $(this).attr("action");
  if ($action == "unzip") {
    $title = "Unzip File";
    $label = "File name";
    $root_dir.attr("type", "text");
    $("#fm_common_path").css("display", "block");
  } else if ($action == "zip") {
    $title = "Zip File";
    if ($(this).attr("file") == "dir") {
      $title = "Zip Directory";
    }

    $label = "File name";
  } else if ($action == "rename") {
    $title = "Rename File";
    if ($(this).attr("file") == "dir") {
      $title = "Rename Directory";
    }
    $label = "Name";
  } else if ($action == "newFile") {
    $title = "Create a new File";
    $label = "Name";
  } else if ($action == "newDir") {
    $title = "Create a new Directory";
    $label = "Name";
  }

  $("#fm_modal_title").html($title);
  $("#fm_form_label").html($label);
  $common_path = $("#common_path").attr("path");
  if ($common_path == "" || $common_path == null) {
    $common_path = "/";
  } else {
    $common_path = "/" + $common_path + "/";
  }
  $("#fm_common_modal_form").attr("action", $action);
  $("#fm_common_modal_form")
    .children()
    .children("input")
    .val($(this).attr("file_name"));
  $root_dir.val($common_path);
});

$(document).on("change", "#upload_", function () {
  var file = $("#upload_")[0].files[0].name;
  $(".ps_absolute").text(file);
});

$(function () {
  $("#upload_newfile,#fm_common_modal_form").on("submit", function (e) {
    if($("#upload_").val()=='' || $("#upload_").val()==null)
    {
      alert('Empty File cannot upload');
    return false;
    }
    if ($(this).attr("action") == "upload") {
      $size = $("#upload_")[0].files[0].size;
      if ($size > 2097152) {
        alert("File size is greater than 2MB");
        return false;
      }
    }
    $url = document.URL.split("/");
    $url = $url[0] + "//" + $url[2];
    $gourl = $(this).attr("gourl");
    $url = $url + $gourl;
    $action = $(this).attr("action");
    $common_path = $("#common_path").attr("path");
    $name = $(this).children().children("input").val();
    $modal = $(this).attr("modal");

    $this = $(this);
    $formdata = new FormData(this);
    $formdata.append("common_path", $common_path);
    $formdata.append("action", $action);
    //  event.preventDefault();
    $.ajax({
      type: "POST",
      url: $url,
      data: $formdata,
      contentType: false,
      cache: false,
      processData: false,
      beforeSend: function () {
        $("#" + $modal).modal("hide");
        // $("#err").fadeOut();
      },
      // data: {common_path:$common_path,name:$name, action:'upload'},
      success: function (data) {
        document.getElementById("changebody").innerHTML = data;
        $($this).trigger("reset");
        $(".download_file").each(function (i, obj) {
          $temp = $(this).attr("href");
          $(this).attr("href", $temp + "&common_path=" + $common_path);
        });
      },
    });
  });
});

$(document).on("click", ".folder_click", function () {
  // alert(1)
  $foldername = $(this).attr("foldername");

  $this = $(this);
  $filepath = $foldername.split("/");
  $_path = "";
  console.log($filepath);
  $url = document.URL.split("/");
  $url = $url[0] + "//" + $url[2];
  $gourl = $this.attr("gourl");
  $url = $url + $gourl;
  //   console.log($url);
  //   return;
  $webid = $this.attr("webid");
  $.ajax({
    type: "POST",
    url: $url,
    data: { foldername: $foldername },
    success: function (data) {
      // alert(data)
      document.getElementById("changebody").innerHTML = data;
      // alert($filepath)

      $path =
        '<li class="nav-item">' +
        '<a class="nav-link folder_click text-white" foldername="' +
        $_path +
        '"  style="padding: 5px 0; cursor:pointer;"  gourl="/admin/share/servers/filemanager/confirm?webid=' +
        $webid +
        '" webid="' +
        $webid +
        '">Home<i class="fa fa-home" aria-hidden="true" style="padding:0 5px"></i><i class="fa fa-angle-right" style="padding:0 5px"></i></a>' +
        "</li>";
      // alert($foldername)
      if ($foldername != "" && $foldername != null) {
        // alert(1)
        for (var i = 0; i <= $filepath.length - 1; i++) {
          // $_path+='/'+$filepath[i];
          if ($_path != "") {
            $_path += "/" + $filepath[i];
          } else {
            $_path += $filepath[i];
          }
          $path +=
            '<li class="nav-item">' +
            '<a class="nav-link folder_click text-white" foldername="' +
            $_path +
            '" style="padding: 5px 0; cursor:pointer;" gourl="/admin/share/servers/filemanager/confirm?webid=' +
            $webid +
            '" webid="' +
            $webid +
            '">' +
            $filepath[i] +
            '<i class="fa fa-angle-right" style="padding:0 5px"></i></a>' +
            "</li>";
        }
      }

      $("#dir_path").html($path);
      $("#common_path").attr("path", $_path);

      $(".download_file").each(function (i, obj) {
        $temp = $(this).attr("href");
        $(this).attr("href", $temp + "&common_path=" + $_path);
      });
    },
  });
});
