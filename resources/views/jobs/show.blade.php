<x-layout>
   <x-breadcrumbs  class="mb-4"
   :links="['jobs'=> route('Jobs.index'), $job->title =>'#']"/>
    <x-job-card :$job/>
</x-layout>