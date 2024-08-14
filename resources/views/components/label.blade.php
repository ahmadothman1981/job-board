<label class="mb-2 block text-sm font-medium text-slate-900" for="{{$for}}">
    {{$slot}}@if($required)<span class="ml-1 text-red-500">*</span>@endif
</label>