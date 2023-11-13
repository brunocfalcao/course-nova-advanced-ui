<?php

namespace NovaAdvancedUI\Http\Controllers\Course;

use Brunocfalcao\Cerebrus\Cerebrus;
use Eduka\Cube\Models\Course;
use Eduka\Cube\Models\Video;
use Eduka\Nereus\NereusServiceProvider;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use NovaAdvancedUI\Http\Controllers\Controller;

class WatchVideoController extends Controller
{
    private Cerebrus $session;

    private Course $course;

    public function __construct(Cerebrus $session)
    {
        $this->session = $session;
        $this->course = $this->session->get(NereusServiceProvider::COURSE_SESSION_KEY);
    }

    public function watch(string $id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $video = Video::first(); // @todo test video

        abort_if(empty($video), 404, 'video not found');

        $course = $this->course;

        $course->load(['chapters' => function ($courseQuery) {
            $courseQuery->with(['videos' => function ($courseQuery) {
                $courseQuery->isVisible();
            }])->orderBy('index');
        }]);

        return view('course::course.watch')
               ->with([
                   'course' => $course,
                   'video' => $video,
                   'currentVideoId' => $id,
               ]);
    }
}
