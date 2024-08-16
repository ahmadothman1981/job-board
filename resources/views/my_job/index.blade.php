<x-layout>
<x-breadcrumbs :links="['My Jobs' => '#']" class="mb-4"/>
<div class="mb-8 text-right">
    <x-link-button href="{{route('my-jobs.create')}}" class="mr-4">Create New Job</x-link-button>
</div>

@forelse ($jobs as $job)
<x-job-card :job="$job">
    <div class="text-xs text-slate-500">
        @forelse ($job->jobapplications as $application)
        <div class="mb-4 flex items-center justify-between">
            <div>
            <div>{{$application->user->name}}</div>
            <div>Applied {{$application->created_at->diffForHumans()}}</div>
            <div>Download CV</div>
            </div>
            
            <div>${{number_format($application->expected_salary)}}</div>
        </div>
        
        @empty
        <div>No Application yet</div>
        @endforelse
        <div class="flex space-x-2">
            <x-link-button href="{{route('my-jobs.edit', $job)}}">Edit</x-link-button>
        </div>
    </div>
</x-job-card>
@empty
<div class="rounded-md border px-2 py-8 boarder-dashed border-slate-300">
        <div class="text-center text-sm font-medium text-slate-500">No Jobs Yet</div>
        <div class="text-center">
            Post Your First Job<a href="{{route('my-jobs.create')}}" class="text-indigo-500 hover:underline">Her!</a>
        </div>
       </div>

@endforelse
</x-layout>