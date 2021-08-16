$(document).on("change", ".app", function () {
  $gourl = $(this).attr("gourl");
  $app = $(this).val();
  $url = document.URL.split("/");
  $url = $url[0] + "//" + $url[2];
  $.ajax({
    type: "POST",
    url: $url + "/" + $gourl,
    data: { app: $app },
    success: function (data) {
      $("#version").html(data);
    },
  });
});
$(document).on("keyup", "#domain_search", function () {
  $("#" + $(this).attr("id") + "_error").remove();
  $("#" + $(this).attr("id") + "_result").remove();
  $("#domain_checker_btn").attr("disabled", true);
});
$(document).on("focusout", "#domain_search", function () {
  $domain = $(this).val();
  $this = $(this);
  domainChecker($domain, $this);
});

function domainChecker($domain, $this) {
  if ($domain == null || $domain == "") {
    return;
  }
  $regex = /^([a-zA-Z0-9_.+-])+(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  $("#" + $this.attr("id") + "_error").remove();
  $("#" + $this.attr("id") + "_result").remove();
  if (!$regex.test($domain)) {
    $this.after(
      '<span class="error" id="' +
        $this.attr("id") +
        '_error">Invalid Domain Format</span>'
    );
    $("#domain_checker_btn").attr("disabled", true);
    return;
  }
  $gourl = "domainChecker";
  $url = document.URL.split("/");
  $url = $url[0] + "//" + $url[2];
  $.ajax({
    type: "POST",
    url: $url + "/" + $gourl,
    dataType: "JSON",
    data: { domain: $domain },
    beforeSend: function () {
      $this.after(
        '<span id="' +
          $this.attr("id") +
          '_result" class="text-primary">Loading......</span>'
      );
    },
    success: function (data) {
      $("#" + $this.attr("id") + "_result").remove();
      $result = $domain + " is avaliable";
      $class = "text-success";
      if (data.status) {
        $result = $domain + " is not avaliable";
        $class = "text-danger";
      }
      $this.after(
        '<span id="' +
          $this.attr("id") +
          '_result" class="' +
          $class +
          '">' +
          $result +
          "</span>"
      );
      $("#domain_checker_btn").attr("disabled", data.status);
    },
  });
}
