
    @foreach($members as $mem)
        <div>
            <img class="committe_img" src="{{asset('uploads/committee/'.$mem->image)}}" alt="">
            <p><span class="committe_name">{!! $mem->title !!}</span></p>
            <p><span class="committe_position">{!! $mem->position !!}</span></p>
        </div>
    @endforeach
