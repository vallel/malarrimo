<div class="form-group">
    {{ Form::label($name, $label, ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-{{ isset($options['cols']) ? $options['cols'] : 10 }}">
        {{ $control }}
        @if ($error)
            <p class="text-danger">{{ $error }}</p>
        @endif
    </div>
</div>