var table = null

$(function () {
      
  table = $("#she-table").DataTable({
    iDisplayLength: 6,
    bLengthChange: false,
    order: [[0, 'desc']],
  })
  
  setTimeout(function () {
    $("#success-alert").slideUp("slow");
  }, 2000)
  
})

function showModal(id) {
  $('#' + id).modal({
    backdrop: 'static',
    keyboard: false,
    show: true
  })
}

function closeModal(id) {
  $("#" + id).modal('hide')
  $('body').removeClass("modal-open")
  $('body').removeAttr('style')
  $(".modal-backdrop").remove()
}

function showHideAlert(id) {
  $("#" + id).fadeTo(2000, 500).slideUp(500, function(){
    $("#" + id).slideUp(500)
  })
}

function onConfirm() {
  showModal('confirmation-modal')
}