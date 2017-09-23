$(document).ready(function(){
  $('.button-collapse').sideNav();
  $('.modal-trigger').leanModal();
});
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
