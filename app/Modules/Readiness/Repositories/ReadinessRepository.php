<?php
namespace App\Modules\Readiness\Repositories;

use App\Modules\Readiness\Entities\Readiness;

class ReadinessRepository implements ReadinessInterface
{

    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'ASC'], $status = [0, 1])
    {
        $result = Readiness::when(array_keys($filter, true), function ($query) use ($filter) {

              if (isset($filter['readiness_title'])) {
                $query->where('readiness_title', $filter['readiness_title']);
            }

              if (isset($filter['search_value']) && !empty($filter['search_value'])) {
                $query->where(function ($q) use ($filter) {
                    $q->where('question', 'like', '%' . $filter['search_value'] . '%');
                });

            }

        })->orderBy('id', $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));

        return $result;

    }

    public function find($id)
    {
        return Readiness::find($id);
    }

    public function getList()
    {
        $team = Readiness::pluck('readiness_title', 'id');
        return $team;
    }

    public function save($data)
    {
        return Readiness::create($data);
    }

    public function update($id, $data)
    {
        $team = Readiness::find($id);
        return $team->update($data);
    }

    public function delete($id)
    {
        $team = Readiness::find($id);
        return $team->delete();
    }

    public function getQuestionByTitle($readiness_title, $limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'ASC'], $status = [0, 1])
    {

        $result = Readiness::when(array_keys($filter, true), function ($query) use ($filter) {

        })
            ->where('readiness_title', '=', $readiness_title)->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));



        return $result;
    }

    public function checkCorrectAnswer($question_id, $answer)
    {
        return Readiness::where('id', '=', $question_id)->where('correct_option', 'like', $answer)->count();
    }

    public function getTotalQuestionsByTitle($readiness_title, $datetime)
    {
        $result = Readiness::where('readiness_title', '=', $readiness_title)
            ->where('created_at', '<=', $datetime)
            ->count();

        return $result;
    }

    public function getRandomQuestion($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'ASC'], $status = [0, 1])
    {

        $result = Readiness::when(array_keys($filter, true), function ($query) use ($filter) {

        })
            ->inRandomOrder()->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));

        return $result;
    }

    public function upload($file){
        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);

        $file->move(public_path() . Readiness::FILE_PATH, $fileName);

        return $fileName;
    }


}
