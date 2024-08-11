<x-layout >
<x-breadcrumbs  class="mb-4"
:links="['Jobs'=> route('jobs.index')]"/>
<x-card class="mb-4 text-sm">
    <form action="{{route('jobs.index')}}" method="get">

    
    <div class="mb-4 grid grid-cols-2 gap-4">
        <div>
            <div class="mb-1 font-semibold">Search</div>
            <x-text-input type="text" placeholder="Search for a text" name="search" value="{{request('search')}}"/>
        </div>
        <div>
        <div class="mb-1 font-semibold">Salary</div>
        <div class="flex space-x-2">
        <x-text-input type="text" placeholder="From" name="min_salary" value="{{request('min_salary')}}"/>
        <x-text-input type="text" placeholder="To" name="max_salary" value="{{request('max_salary')}}"/>
        </div>
        </div>
    <div>
    <div class="mb-1 font-semibold">Experience</div>
    <label for="experience" class=" mb-1 flex items-center">
        <input type="radio" name="experience" value=""  @checked(!request('experience'))/>
        <span class="ml-2">All</span>
    </label>

    <label for="beginner" class=" mb-1 flex items-center">
        <input type="radio" name="experience" value="beginner"  @checked(request('experience') === 'beginner')/>
        <span class="ml-2">Beginner</span>
    </label>

    <label for="intermediate" class=" mb-1 flex items-center">
        <input type="radio" name="experience" value="intermediate" @checked(request('experience') === 'intermediate')/>
        <span class="ml-2">Intermediate</span>
    </label>

    <label for="expert" class=" mb-1 flex items-center">
        <input type="radio" name="experience" value="expert" @checked(request('experience') === 'expert') />
        <span class="ml-2">Expert</span>
    </label>
    </div>
    <div>4</div>
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