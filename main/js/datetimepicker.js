function activateDatepicker(){
  $(".form_datetime").datetimepicker({
    format: "yyyy.mm.dd hh:ii",
    autoclose: true,
    todayBtn: true,
    pickerPosition: "bottom-left"
  });
}

activateDatepicker();
