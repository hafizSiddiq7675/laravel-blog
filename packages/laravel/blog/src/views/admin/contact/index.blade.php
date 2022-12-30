@extends('blog::admin.dashboard.app')
@section('content')

<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">@if(isset($page_metas['0']->page->name)) {{ $page_metas['0']->page->name }} @else Page @endif</h4>
            <p class="card-description">
                @if(isset($page_metas['0']->page->name)) {{ $page_metas['0']->page->name }} @endif Page Meta
            </p>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>NO. </th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>

                    @foreach ($contacts as $contact)
                    <tr>
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ substr($contact->message, 0, 80) }}</td>

                        <td width="20%">
                            <a href="javascript:0" class="btn btn-primary btn-sm contact-view" data-id={{ $contact->id }} >View</a>
                            <a href="javascript:0" class="btn btn-danger btn-sm contact-delete" data-id={{ $contact->id }}>Delete</button>
                        </td>
                    </tr>
                    @endforeach



                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
</div>



@include('blog::admin.contact.view')

<script>
        $(document).on('click', '.contact-delete', function(){
            var id = $(this).data('id');


            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover message!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {

                var url = "{{ route('contacts.destroy',':id') }}";
                url = url.replace(':id', id);

                var token = "{{ csrf_token() }}";

                $.ajax({
                    type: 'Delete',
                        url: url,
                        data: {'_token': token, '_method': 'DELETE'},
                        success: function (response) {

                            if(response == true)
                            {

                                swal("Poof! message has been deleted!", {
                                    icon: "success",
                                    timer: 1000,
                                });
                                location.reload();
                            }

                        }
                });




                } else {
                    swal("Your message is safe!");
                }
            });

        });
</script>
@endsection
