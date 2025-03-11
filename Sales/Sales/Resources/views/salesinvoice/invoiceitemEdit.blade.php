{{Form::model($invoiceItem,array('route' => array('salesinvoice.item.update', $invoiceItem->id), 'method' => 'POST')) }}
    <div class="modal-body">
        <div class="text-end">
            @if (module_is_active('AIAssistant'))
                @include('aiassistant::ai.generate_ai_btn',['template_module' => 'salesinvoice item','module'=>'Sales'])
            @endif
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                {{ Form::label('item', __('Item'),['class'=>'form-label']) }}
                {{ Form::select('item', $items,null, array('class' => 'form-control items','required'=>'required')) }}
            </div>
            <div class="form-group col-md-6">
                {{ Form::label('quantity', __('Quantity'),['class'=>'form-label']) }}
                {{ Form::number('quantity',null, array('class' => 'form-control quantity','required'=>'required')) }}
            </div>
            <div class="form-group col-md-6">
                {{ Form::label('price', __('Price'),['class'=>'form-label']) }}
                {{ Form::number('price',null, array('class' => 'form-control price','required'=>'required','stage'=>'0.01')) }}
            </div>
            <div class="form-group col-md-6">
                {{ Form::label('discount', __('Discount'),['class'=>'form-label']) }}
                {{ Form::number('discount',null, array('class' => 'form-control discount')) }}
            </div>
            <div class="form-group col-md-12">
                {{ Form::label('tax', __('Tax'),['class'=>'form-label']) }}
                {{ Form::hidden('tax',null, array('class' => 'form-control taxId')) }}
                <div class="row">
                    <div class="col-md-12">
                        <div class="tax"></div>
                    </div>
                </div>
            </div>
            @stack('add_invoices_agent_filed_edit')
            <div class="form-group col-md-12">
                {{ Form::label('description', __('Description'),['class'=>'form-label']) }}
                {!! Form::textarea('description', null, ['class'=>'form-control','rows'=>'2']) !!}
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">{{ __('Close') }}</button>
        {{Form::submit(__('Update'),array('class'=>'btn btn-primary'))}}
    </div>
{{ Form::close() }}
<script>
    $('.items').val({{$invoiceItem->item}}).trigger("change")
</script>
