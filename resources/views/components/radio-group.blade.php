<div>
<label for="{{$name}}" class=" mb-1 flex items-center">
        <input type="radio" name="{{$name}}" value=""  @checked(!request($name))/>
        <span class="ml-2">All</span>
    </label>
@foreach($optionsWithKeys as $label => $option)
    <label for="{{$name}}" class=" mb-1 flex items-center">
        <input type="radio" name="{{$name}}" value="{{$option}}"  @checked(request($name) === $option)/>
        <span class="ml-2">{{$label}}</span>
    </label>
@endforeach
</div>