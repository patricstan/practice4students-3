<div>
    <div class="max-w-screen-lg mx-auto mt-6 md:flex">
        <div class="relative p-2 md:w-1/3">
            <div class="md:fixed">
                <div class="md:block">
                    <img class="w-32 h-32 mx-auto rounded-full " alt="{{$student->user->name}}" src="{{$student->getFirstMediaUrl('student_picture') ? $student->getFirstMediaUrl('student_picture'): 'http://via.placeholder.com/640x360'}} " />
                    <div class="items-center justify-center mt-4 mb-12 text-center">
                        <h1 class="text-xl font-bold text-gray-800">
                            {{$student->user->name}}
                        </h1>

                    </div>
                </div>
                <div class="hidden mx-4 my-4 md:block">
                    <div class="flex my-5 text-lg text-gray-600 dark:text-gray-300">
                        <div class="flex mr-2 items-center">
                            <x-heroicon-s-academic-cap class="w-6 h-6 text-gray-500" />
                            <!-- <i class="fa-solid fa-graduation-cap" title="Specialization"></i> -->
                        </div>
                        {{$student->specialization}}
                    </div>
                    <div class="flex my-5 text-lg text-gray-600 dark:text-gray-300">
                        <div class="flex mr-2 items-center">
                            <x-heroicon-s-book-open class="w-6 h-6 text-gray-500" />
                            <!-- <i class="fa-solid fa-book" title="Last year grade"></i> -->
                        </div>
                        {{$student->last_year_grade}}
                    </div>
                    <div class="flex my-5 text-lg text-gray-600 dark:text-gray-300">
                        <div class="flex mr-2 items-center">
                            <x-heroicon-s-phone class="w-6 h-6 text-gray-500" />
                            <!-- <i class="fa-solid fa-phone" title="Phone number"></i> -->
                        </div>
                        {{$student->user->phone}}
                    </div>
                    <div class="flex my-5 text-lg text-gray-600 dark:text-gray-300">
                        <div class="flex mr-2 items-center">
                            <x-heroicon-s-mail class="w-6 h-6 text-gray-500" />
                            <!-- <i class="fa-solid fa-envelope" title="Email"></i> -->
                        </div>
                        {{$student->user->email}}
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full p-2 md:w-2/3">
            <x-resume.resume-collapsible title="About me">
                <p>
                    {{$student->about}}
                </p>
            </x-resume.resume-collapsible>

            <x-resume.resume-collapsible title="Experience">
                <ul>
                    @foreach ($student->experience as $exp)
                    <x-resume.resume-experience-item :position="$exp['position']" :company="$exp['company']" :start-date="$exp['start_date']" :end-date="$exp['end_date']" :description="$exp['description']" />
                    @endforeach
                </ul>
            </x-resume.resume-collapsible>

            <x-resume.resume-collapsible title="Projects">
                <ul>
                    @foreach ($student->projects as $proj)
                    <x-resume.resume-project-item :title="$proj['title']" :description="$proj['description']" :start-date="$exp['start_date']" :end-date="$exp['end_date']" />
                    @endforeach
                </ul>
            </x-resume.resume-collapsible>

            <x-resume.resume-collapsible title="Education">
                <ul>
                    @foreach ($student->education as $edu)
                    <x-resume.resume-education-item :institution="$edu['institution']" :specialization="$edu['specialization']" :start-date="$edu['start_year']" :end-date="$edu['graduation_year']" />
                    @endforeach
                </ul>
            </x-resume.resume-collapsible>

            <x-resume.resume-collapsible title="Hobbies">
                <ul>
                    @foreach ($student->hobbies as $hob)
                    <x-resume.resume-bubbles :item="$hob" />
                    @endforeach
                </ul>
            </x-resume.resume-collapsible>

            <x-resume.resume-collapsible title="Foreign Languages">
                <ul>
                    @foreach ($student->foreign_languages as $lang)
                    <x-resume.resume-bubbles :item="$lang" />
                    @endforeach
                </ul>
            </x-resume.resume-collapsible>

            <x-resume.resume-collapsible title="Skills">
                <ul>
                    @foreach ($student->skills as $skill)
                    <x-resume.resume-bubbles :item="$skill" />
                    @endforeach
                </ul>
            </x-resume.resume-collapsible>
        </div>
    </div>
</div>