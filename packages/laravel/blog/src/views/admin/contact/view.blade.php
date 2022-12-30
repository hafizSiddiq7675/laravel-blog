<!-- The Modal -->
<div class="modal" id="contact-modal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <span id="contact-section"></span>
      </div>
    </div>
</div>


<script>
    $(document).on('click', '.contact-view', function(){
        var id = $(this).data('id');

        var url = "{{ route('contacts.show',':id') }}";
        url = url.replace(':id', id);

        var token = "{{ csrf_token() }}";

        $.ajax({
            type: 'GET',
                url: url,
                data: {'_token': token, '_method': 'GET'},
                success: function (response) {
                    
                    $('#contact-section').html(response);
                    $('#contact-modal').modal('show');

                }
        });
    })
</script>
