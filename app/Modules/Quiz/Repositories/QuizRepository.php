<?php

namespace App\Modules\Quiz\Repositories;

use App\Modules\Quiz\Entities\Quiz;
use App\Modules\Quiz\Entities\QuizOption;

class QuizRepository implements QuizInterface
{
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {

        $result = Quiz::when(array_keys($filter, true), function ($query) use ($filter) {


            if (isset($filter['course_content_id'])) {
                $query->where('course_content_id', $filter['course_content_id']);
            }

              if (isset($filter['search_value']) && !empty($filter['search_value'])) {
                $query->where(function ($q) use ($filter) {
                    $q->where('question', 'like', '%' . $filter['search_value'] . '%');
                });

            }

        })
            ->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));

        return $result;

    }

    public function find($id)
    {
        return Quiz::find($id);
    }

    public function getList()
    {
        $result = Quiz::pluck('question', 'id');
        return $result;
    }

    public function save($data)
    {
        return Quiz::create($data);
    }

    public function saveQuizOption($data)
    {

        return QuizOption::create($data);
    }

    public function update($id, $data)
    {
        $result = Quiz::find($id);
        return $result->update($data);
    }

    public function delete($id)
    {
        return Quiz::destroy($id);
    }

    public function deleteQuizOpton($id)
    {
        QuizOption::where('quiz_id', '=', $id)->delete($id);
    }

    public function countTotal()
    {
        return Quiz::count();
    }

    public function getDemoQuiz($limit, $filter = [], $sort = ['by' => 'id', 'sort' => 'ASC'], $status = [0, 1])
    {

        $result = Quiz::when(array_keys($filter, true), function ($query) use ($filter) {

        })
            ->where('category', '=', 'Demo')->orWhere('set_for_demo', '=', '1')->inRandomOrder()->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));

        return $result;
    }

    public function getGeneralById($courseContentId, $limit, $filter = [], $sort = ['by' => 'id', 'sort' => 'ASC'], $status = [0, 1])
    {

        $result = Quiz::when(array_keys($filter, true), function ($query) use ($filter) {

        })
            ->where('category', '=', 'General')->Where('course_content_id', '=', $courseContentId)->inRandomOrder()->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));

        return $result;

    }

    public function checkCorrectAnswer($quiz_id, $answer)
    {
        return Quiz::where('id', '=', $quiz_id)->where('correct_option', 'like', $answer)->count();
    }

    public static function totalBySectionContentId($course_content_id, $quiz_section = 'Practise')
    {
        return Quiz::where('course_content_id', $course_content_id)->where('quiz_section', $quiz_section)->count();
    }

    public function upload($file){
        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);

        $file->move(public_path() . Quiz::FILE_PATH, $fileName);

        return $fileName;
    }

}
