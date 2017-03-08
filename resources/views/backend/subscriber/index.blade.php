@extends('backend.master')



@section('content')

{{-- <div id="app">
    <example></example>
</div> --}}


    <h4 class="ui horizontal divider">
        الرسائل
    </h4>

    <div class="ui modal eshow">
      <div class="header">محتوى الرساله</div>
      <div class="content">
          <div class="ui header" id="subject"></div>
          <p id="name"></p>
          <p id="body"></p>
          <hr />
          <p id="phone"></p>
          <p id="email"></p>
      </div>
    </div>
    <div class="ui modal ereply">
      <div class="header">محتوى الرساله</div>
      <div class="content">
          <div class="ui header" id="subject"></div>
          <p id="name"></p>
          <p id="body"></p>
          <hr />
          <p id="phone"></p>
          <p id="email"></p>
      </div>
    </div>
    <table class="ui compact basic table">
        <thead class="full-width">
            <tr>
                <th>
                    #
                </th>
                <th>الإسم</th>
                <th>الإيميل</th>
                <th>منذ</th>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
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



{{Form::open(array('action' => 'SubscribersController@Submit','method' => 'post'))}}
    <p>Simple Newsletter Subscription</p>
    {{Form::text('name',null,array('placeholder'=>'Type your Name here'))}}
    {{Form::text('email',null,array('placeholder'=>'Type your E-mail address here'))}}
    {{Form::submit('Submit!')}}

{{Form::close()}}

<div class="content"></div>

@push('scripts')
    <script type="text/javascript">
        $(function(){
            $('div.content').hide();
            $('input[type="submit"]').click(function(e){
                e.preventDefault();
                $.post('/dashboard/subscribers/submit', {
                _token: $('input[name="_token"]').val(),
                    name: $('input[name="name"]').val(),
                    email: $('input[name="email"]').val()
                }, function($data){
                    if($data=='1') {
                        $('div.content').hide().removeClass('success error').addClass('success').html('You\'ve successfully subscribed to ournewsletter').fadeIn('fast');
                    } else {
                        $('div.content').hide().removeClass('success error').addClass('error').html('There has been an error occurred:<br /><br />'+$data).fadeIn('fast');
                    }
                });
            });
            $('form').submit(function(e){
                e.preventDefault();
                $('input[type="submit"]').click();
            });
        });

        $('.show_msg').on('click',function(e){
            e.preventDefault();
            var url = $(this).attr("href");
            $.get(url, function (data) {
                //success data
                console.log(data.id);
                $('.eshow.modal').modal({
                    onShow : function() {
                        $('#id').empty().append(data.id);
                        $('#subject').empty().append(data.subject);
                        $('#name').empty().append(data.name);
                        $('#phone').empty().append(data.phone);
                        $('#email').empty().append(data.email);
                        $('#body').empty().append(data.body);
                    }
                }).modal('show');
            });
        });


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
