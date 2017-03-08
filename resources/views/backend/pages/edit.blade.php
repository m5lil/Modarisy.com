@extends('backend.master')

@section('content')

@if (!\Auth::user()->can('edit-page'))

{{ Html::ul($errors->all(),['class' => 'ui error message']) }}

        {{ Form::open(array('route' => ['pages.update',$page->id],'method' => 'PATCH', 'class' => 'ui form', 'id' => 'formpage')) }}
        <div class="ui top attached tabular menu">
            <?php  $count = 0; ?>
            @foreach(config('app.locals') as $local)
                <?php $count++; ?>
                <a class="<?php  if($count == 1){echo ' active';} ?> item" data-tab="{{$local}}">{{$local}}</a>
            @endforeach
        </div>
        <?php  $count2 = 0; ?>

        @foreach(config('app.locals') as $local)
            <?php $count2++; ?>

            <div class="ui bottom attached <?php  if($count2 == 1){echo ' active';} ?> tab segment" data-tab="{{$local}}">

                <div class="field">
                    <label>العنوان</label>
                    <input name="title[{{$local}}]" id="title" type="text" value="{{$page->translateOrNew($local)->title}}" placeholder="العنوان">
                </div>

                <div class="field">
                    <label>المحتوى</label>
                    <textarea name="body[{{$local}}]"  id="body">{{$page->translateOrNew($local)->body}}</textarea>
                </div>
                <div class="field">
                    <label>عنوان الـ SEO</label>
                    <input name="seo_title[{{$local}}]" value="{{$page->translateOrNew($local)->seo_title}}" id="seo_title" type="text" placeholder="العنوان فى محركات البحث">
                </div>
                <div class="field">
                    <label>كلمات مفتاحية للـ SEO</label>
                    <input name="seo_keywords[{{$local}}]" value="{{$page->translateOrNew($local)->seo_keywords}}" id="seo_keywords" type="text" placeholder="الكلمات المفتاحية">
                </div>
                <div class="field">
                    <label>وصف الـ SEO</label>
                    <input name="seo_description[{{$local}}]" value="{{$page->translateOrNew($local)->seo_description}}" id="seo_description" type="text" placeholder="الوصف فى محركات البحث">
                </div>
            </div>
        @endforeach

        <div class="field">
            <select name="statue" id="statue" class="ui dropdown">
                <option value="{{$page->statue}}">الحالة</option>
                <option value="1">منشورة</option>
                <option value="0">غير منشورة</option>
            </select>
        </div>


<div class="actions">
        <a onClick="window.history.back()" class="ui black deny button">
            إلغاء
        </a>
        <button type="submit" class="ui positive right labeled icon button">
            حفظ
            <i class="checkmark icon"></i>
        </button>
    </div>
{{ Form::close() }}


@else



    <div class="ui center aligned basic segment">
        <i class="circular massive lock icon"></i>
        <h4>لا تملك التصريح للدخول لهذه الصفحة</h4>
      <div class="ui horizontal divider">
          Access Denied
      </div>
        <p>سيتم تحويلك فى غضون ثوانى</p>
        @push('scripts')
            <script type="text/javascript">
                setTimeout("window.history.go(-1)",4000);
            </script>
        @endpush
    </div>


@endif
@endsection
