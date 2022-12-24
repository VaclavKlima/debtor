<div class="form-group">
    {!! Form::button($title ??( "<i class=\"fas fa-save\"></i> " . trans('global.save')), array_merge_recursive($attributes, ['class' => 'btn btn-success mt-3', 'type' => 'submit' ])) !!}
</div>

