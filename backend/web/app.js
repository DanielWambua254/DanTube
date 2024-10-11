$(function () {
    'use strict';
    $('#videoFile').change(ev => {
      $(ev.target).closest('form').trigger('submit');
    })
  });
$(function () {
    'use strict';
    $('#thumbnail').change(ev => {
      $(ev.target).closest('form').trigger('submit');
    })
  });
$(function () {
    'use strict';
    $('#dp').change(ev => {
      $(ev.target).closest('form').trigger('submit');
    })
  });