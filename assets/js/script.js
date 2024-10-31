(function ($) {
  $(function () {
    $('.sscw-countdown').each(function () {
      var $countdown = $(this);

      $countdown.countdown($countdown.data('date'), function(event) {
        $(this).html(event.strftime('<span class="sscw-time-box"><span class="sscw-time-content"><span class="sscw-time">%D</span> '+ sscw_params.text_days +'</span></span><span class="sscw-time-box"><span class="sscw-time-content"><span class="sscw-time">%H</span> '+ sscw_params.text_hours +'</span></span><span class="sscw-time-box"><span class="sscw-time-content"><span class="sscw-time">%M</span> '+ sscw_params.text_mins +'</span></span><span class="sscw-time-box"><span class="sscw-time-content"><span class="sscw-time">%S</span> '+ sscw_params.text_secs +'</span></span>'));
      });
    });
  });
})(jQuery);