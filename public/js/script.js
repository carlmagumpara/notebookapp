$(document).ready(function(){
    $('.note-item').click(function(){
        var id = $(this).attr('id')
        $('.note-body-'+id).slideToggle()
    });
    $('.notebook-form').submit(function(e){
      $('.help-block').remove()
      var form = $(this)
      var type = form.attr('form-type')
      var formData= form.serializeArray()
      var url = form.attr('action')
      var button = form.find($('[type=submit]'))
      form.find($('form-group')).removeClass('has-error')
      $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        beforeSend: function(){
          button.val('Loading...').attr('disabled')
        },
        success: function(data){
          form.find($('[type=text]')).val('')
          $('<div class="alert alert-success">'+data.success+'</div>').insertBefore(form)
          if (type === 'create') {
            button.val('Save').removeAttr('disabled')
          }
          else {
            button.val('Update').removeAttr('disabled')
          }
          setTimeout(function(){
            window.location = data.redirect
          },1000)
        },
        error: function(data){
          if (type === 'create') {
            button.val('Save').removeAttr('disabled')
          }
          else {
            button.val('Update').removeAttr('disabled')
          }
          var error = data.responseJSON
          $.each(error, function(k, v){
            var elem = form.find($('[name='+k+']'))
            $('<span class="help-block" has-error">'+v+'</span>').insertAfter(elem)
            elem.parent().addClass('has-error')
          })
        }
      })
      e.preventDefault()
    })
    $('.btn-delete').click(function(){
      var modal = $('#delete-modal')
      var action = $(this).attr('data-action')
      modal.modal('show')
      modal.find($('form')).attr('action', action)
    })
})