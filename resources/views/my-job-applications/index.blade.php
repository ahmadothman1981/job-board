<x-layout>
    <x-breadcrumbs class="mb-4" :links="['My Job Applications'=>'#']"/>
    @forelse($applications as $application)
      <x-job-card :job="$application->job">
        <div class="flex items-center justify-between text-sm text-slate-500">
          <div>
            <div>
              Applied {{$application->created_at->diffForHumans()}}
            </div>
            <div>
              Other {{Str::plural('Application', $application->job->job_applications_count-1)}}
              {{$application->job->job_applications_count-1}}
            </div>
            <div>
             You Applied Expected Salary ${{number_format($application->expected_salary)}}
            </div>
            <div>
              Average Asking Salary {{number_format($application->job->job_applications_avg_expected_salary)}}
            </div>
          </div>
          <div>
            <form action="{{route('my-job-applications.destroy',$application)}}" method="post">
              @csrf
              @method('delete')
              <x-button type="submit" class="text-red-500">Delete</x-button>
            </form>
          </div>
        </div>
      </x-job-card>
    @empty
    <div class="rounded-md boarder  boarder-slate-300 bg-white p-4 shadow-sm">
      <div class="text-center font-medium">No Job Applications</div>
  </div>
  <div class="text-center font-medium">Go Find Jobs <a class="text-indigo-500 hover:underline" href="{{route('jobs.index')}}">Here</a></div>
    @endforelse
</x-layout>