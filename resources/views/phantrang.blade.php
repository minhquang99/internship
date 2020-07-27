@foreach($data as $value)
	{{$value->product_name}}<br>
@endforeach
{{!! $data->links() !!}}
                                 