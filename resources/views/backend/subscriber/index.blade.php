@extends('backend.master')



@section('content')

{{-- <div id="app">
    <example></example>
</div> --}}


    <h4 class="ui horizontal divider">
        الرسائل
    </h4>

    <table class="ui compact basic table">
        <thead class="full-width">
            <tr>
                <th>
                    #
                </th>
                <th>الإسم</th>
                <th>الإيميل</th>
                <th>منذ</th>
                <th>عمليات</th>
            </tr>
        </thead>

        <tbody>
            @foreach($subscribers as $value)
                <tr
                @if (!$value->read)
                    class="positive"
                @endif
                >
                  <td class="collapsing">
                      {{$value->id}}
                  </td>
                  <td><strong>{{$value->name}}</strong></td>
                  <td>{{$value->email}}</td>
                  <td>{{ \Date::parse($value->created_at)->diffForHumans() }}</td>
                  <td class="two wide">
                      <a href = '/dashboard/inbox/{{$value->id}}' class="ui left blue mini attached show_msg button icon"><i class="unhide icon"></i></a>
                      <a href = "{{$value->id}}"  class="ui right red mini attached delete_msg button icon"><i class="trash icon"></i></a>
                  </td>
                </tr>
            @endforeach
        </tbody>
    </table>


<select name="select1" id="select1">
    <option value="1">Fruit</option>
    <option value="2">Animal</option>
    <option value="3">Bird</option>
    <option value="4">Car</option>
</select>



<select name="select2" id="select2">
    <option ss="1">Banana</option>
    <option ss="1">Apple</option>
    <option ss="1">Orange</option>
    <option ss="2">Wolf</option>
    <option ss="2">Fox</option>
    <option ss="2">Bear</option>
    <option ss="3">Eagle</option>
    <option ss="3">Hawk</option>
    <option ss="4">BWM<option>
</select>





@push('scripts')
    <script type="text/javascript">

       $('.delete_msg').on('click', function(e) {
           e.preventDefault();
           var target = $(this).attr("href");
           var self = $(this)

           swal({
             title: 'هل أنت متأكد?',
             text: "لن تكون قادر على التراجع !",
             type: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'نعم, بقم بالحذف!',
             cancelButtonText: 'لا, قم بالإلغاء!',
             confirmButtonClass: 'ui blue button',
             cancelButtonClass: 'ui red button',
             buttonsStyling: false
           }).then(function () {
               $.ajax({
                 type: 'post',
                 url: 'inbox/delete',
                 data: {
//                   '_token': $("input[name='_token']").val(),
                   'id': self.attr("href")
                 },
                 success: function(data) {
                   $('.item' + '-' +  target).remove();
                 }
               });
             swal(
               'تم الحذف!',
               'لقد قمت بالحذف بنجاح.',
               'success'
             )
           }, function (dismiss) {
             if (dismiss === 'cancel') {
               swal(
                 'تم التراجع',
                 'السجل الذى كنت على وشك حذفه بأمان :)',
                 'error'
               )
             }
           })
       });

        $("#select1").change(function() {
            if ($(this).data('options') == undefined) {
                /*Taking an array of all options-2 and kind of embedding it on the select1*/
                $(this).data('options', $('#select2 option').clone());
            }
            var id = $(this).val();
            var options = $(this).data('options').filter('[ss=' + id + ']');
            $('#select2').html(options);
        });


    </script>
@endpush


@endsection
