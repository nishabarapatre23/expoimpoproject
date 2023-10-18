<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

    <title>Document</title>
</head>
<body>

        {{-- <a href="{{url('export')}}" class="btn btn-success mt-5">Export Data</a> --}}

        <!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
  </button> --}}

  <!-- Modal -->
  <div class="modal fade" id="edit_model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <form id="update-data-form" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="section">Section</label>
                  <input type="text" class="form-control" id="id" hidden>
                  <input type="text" class="form-control" id="section" >
                </div>
                <div class="form-group">
                    <label for="deficiency_title">Deficiency Title</label>
                    <input type="text" class="form-control" id="deficiency_title" aria-describedby="deficiency_title">
                  </div>
                  <div class="form-group">
                    <label for="deficiency_criteria">Deficiency Criteria</label>
                    <input type="text" class="form-control" id="deficiency_criteria" aria-describedby="deficiency_criteria">
                  </div>
                  <div class="form-group">
                    <label for="criteria_detail">Criteria Detail</label>
                    <input type="text" class="form-control" id="criteria_detail" aria-describedby="criteria_detail">
                  </div>
                  <div class="form-group">
                    <label for="note">Note</label>
                    <input type="text" class="form-control" id="note" aria-describedby="note">
                  </div>
                  <div class="form-group">
                    <label for="health_&_safety">Health & Safety</label>
                    <input type="text" class="form-control" id="health_and_safety" aria-describedby="health_&_safety">
                  </div>
                  <div class="form-group">
                    <label for="correction_time_frame">Correction Time frame</label>
                    <input type="text" class="form-control" id="correction_time_frame" aria-describedby="correction_time_frame">
                  </div>
              </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="update_btn">Update Data</button>
        </div>
      </div>
    </div>
  </div>

  <div class="message">

  </div>
    <table class="table table-striped">
        <thead>
          <tr>
            {{-- <th scope="col">No</th> --}}
            <th scope="col">Id</th>
            <th scope="col">Section</th>
            <th scope="col">Deficiency Title</th>
            <th scope="col">Deficiency Criteria</th>
            <th scope="col">Criteria Detail</th>
            <th scope="col">Note</th>
            <th scope="col">Health & Safety</th>
            <th scope="col">Correction  Time frame</th>
            <th scope="col">Actions</th>

          </tr>
        </thead>
        <tbody>
            {{-- @foreach ($data as $d)
            <tr>
                <td>{{$d->id}}</td>
                <td>{{$d->section}}</td>
                <td>{{$d->deficiency_title}}</td>
                <td>{{$d->deficiency_criteria}}</td>
                <td>{{$d->criteria_detail}}</td>
                <td>{{$d->note}}</td>
                <td>{{$d->health_and_safety}}</td>
                <td>{{$d->correction_time_frame}}</td>
            </tr>

                @endforeach --}}

                {{-- //Ajax method for table --}}
<script>

                $(document).ready(function () {

                  fetchData();

                  $(document).on("click", "#edit_btn", function(){
                     var edit_id = $(this).closest('tr').find('.edit_id').text();
                     $.ajax({
                      url : "{{ route('edit', ['id' => 'edit'])}}",
                      type: "POST",
                      data: {
                        'edit_id' : edit_id,
                '_token': '{!! csrf_token() !!}',
                      },
                      success: function(response){
                        //  console.log(responce);
                        $('#id').val(response.id);
                        $('#section').val(response.section);
                        $('#deficiency_title').val(response.deficiency_title);
                        $('#deficiency_criteria').val(response.deficiency_criteria);
                        $('#criteria_detail').val(response.criteria_detail);
                        $('#note').val(response.note);
                        $('#health_and_safety').val(response.health_and_safety);
                        $('#correction_time_frame').val(response.correction_time_frame);
                      },
                     });
                     $('#edit_model').modal('show');
                  })
                });
//update

        $('#update_btn').click(function (e) {
            e.preventDefault();

                var edit_id = $('#id').val();
                var section = $('#section').val();
                var deficiency_title = $('#deficiency_title').val();
                var deficiency_criteria = $('#deficiency_criteria').val();
                var criteria_detail = $('#criteria_detail').val();
                var note = $('#note').val();
                var health_and_safety = $('#health_and_safety').val();
                var correction_time_frame = $('#correction_time_frame').val();
                    // console.log(edit_id);

            $.ajax({
                type: 'POST',
                url: "{{ route('update') }}",
                data: {
                    'edit_id':edit_id,
                    'section':section,
                    'deficiency_title':deficiency_title,
                    'deficiency_criteria':deficiency_criteria,
                    'criteria_detail':criteria_detail,
                    'note':note,
                    'health_and_safety':health_and_safety,
                    'correction_time_frame':correction_time_frame,
                    '_token': '{!! csrf_token() !!}',
                },
                success: function (response) {
                    console.log(response);
                    $('#edit_model').modal('hide');
                    $('.message').append(
                        '<div class="alert alert-success alert-dismissible fade show" role="alert">' +
                            '' + response.message + ' ' +
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                                '<span aria-hidden="true">&times;</span>' +
                                '</button>' +
                                '</div>');
                            }
                        });
                        fetchData()
            });

   //delete

   $(document).on("click", "#delete_btn", function() {
                var delete_id = $(this).closest('tr').find('.edit_id').text();
                // console.log('Delete button clicked for ID:', delete_id);

                // Send AJAX request to delete the data
                $.ajax({
                    url: "{{ route('delete',['id'=>'delete']) }}", // Replace with your delete route
                    type: 'get',
                    data: {
                        'delete_id': delete_id,
'_token': '{!! csrf_token() !!}',
                    },
                    success: function(response) {
                        console.log(response);
                        alert('Data deleted successfully');
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        // Optionally, you can handle errors and display an error message
                        alert('An error occurred while deleting the data');
                    }
                });
            });


                function fetchData() {
                    $.ajax({
                        url: '{{ route('fetch') }}',
                        type: 'GET',
                        dataType: 'json',

                        success: function (data) {
                            console.log(data);
                            $('tbody').html('');

                            $.each(data, function (index, item) {
                                $('tbody').append('<tr>' +
                        // '<td>' + item. + '</td>' +
                        '<td class="edit_id">' + item.id + '</td>' +
                        '<td>' + item.section + '</td>' +
                        '<td>' + item.deficiency_title + '</td>' +
                        '<td>' + item.deficiency_criteria + '</td>' +
                        '<td>' + item.criteria_detail + '</td>' +
                        '<td>' + item.note + '</td>' +
                        '<td>' + item.health_and_safety + '</td>' +
                        '<td>' + item.correction_time_frame + '</td>' +

                        '<td>' +
                        '<a href="#" class="btn btn-warning" id="edit_btn">Edit</a>' +
                        '<a href="#" class="btn btn-danger" id="delete_btn">Delete</a>' +
                        '</td>' +

                        '</tr>');


                            });
                        },
                    });
                }
                </script>
            </tbody>
      </table>
</body>
</html>
