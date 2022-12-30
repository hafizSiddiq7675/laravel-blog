<!-- The Modal -->
<div class="modal" id="view-meta-modal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <span id="view-meta-section"></span>
      </div>
    </div>
  </div>



  <script>
    $(document).on('click', '.page-meta-view', function(){
        var id = $(this).data('id');

        var url = "{{ route('meta.show',':id') }}";
        url = url.replace(':id', id);

        var token = "{{ csrf_token() }}";

        $.ajax({
            type: 'GET',
                url: url,
                data: {'_token': token, '_method': 'GET'},
                success: function (response) {

                    $('#view-meta-section').html(response);
                    $('#view-meta-modal').modal('show');

                }
        });
    })
  </script>
