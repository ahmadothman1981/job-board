<x-layout >
<x-breadcrumbs  class="mb-4"
:links="['Jobs'=> route('jobs.index')]"/>
<x-card class="mb-4 text-sm">
    <form id="filtering-form" action="{{route('jobs.index')}}" method="get">

    
    <div class="mb-4 grid grid-cols-2 gap-4">
        <div>
            <div class="mb-1 font-semibold">Search</div>
            <x-text-input type="text" placeholder="Search for a text" name="search"
             value="{{request('search')}}"  form-id="filtering-form"/>
        </div>
        <div>
        <div class="mb-1 font-semibold">Salary</div>
        <div class="flex space-x-2">
        <x-text-input type="text" placeholder="From" name="min_salary" value="{{request('min_salary')}}" form-id="filtering-form"/>
        <x-text-input type="text" placeholder="To" name="max_salary" value="{{request('max_salary')}}" form-id="filtering-form"/>
        </div>
        </div>
    <div>
    <div class="mb-1 font-semibold">Experience</div>
    <x-radio-group name="experience"  :options="array_combine(array_map('ucfirst', \App\Models\Job::$experience),\App\Models\Job::$experience)"/>
   
    </div>
    <div>
    <div class="mb-1 font-semibold">Category</div>
    <x-radio-group name="category"  :options="\App\Models\Job::$categories"/>
    </div>
    </div>  
    <button class="w-full">Filter</button>
    </form>  
</x-card>
    @foreach($jobs as $job)
    <x-card class="mb-4">
  <x-job-card class="mb-4" :$job>
  <div>
    <x-link-button :href="route('jobs.show', $job->id)">View Job</x-link-button>
   </div>
  </x-job-card>
</x-card>
    @endforeach
</x-layout>