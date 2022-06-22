@if(count($district)>0)
        @foreach($district as $item)
            <option value="{{$item->districtid}}">{{$item->name}}</option>
        @endforeach
@endif
