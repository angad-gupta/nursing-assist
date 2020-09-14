<?php
namespace App\Modules\Mockup\Repositories;

use App\Modules\Mockup\Entities\Mockup;

class MockupRepository implements MockupInterface
{

    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'ASC'], $status = [0, 1])
    {
        $result = Mockup::when(array_keys($filter, true), function ($query) use ($filter) {

              if (isset($filter['mockup_title'])) {
                $query->where('mockup_title', $filter['mockup_title']);
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
        return Mockup::find($id);
    }

    public function getList()
    {
        $team = Mockup::pluck('mockup_title', 'id');
        return $team;
    }

    public function save($data)
    {
        return Mockup::create($data);
    }

    public function update($id, $data)
    {
        $team = Mockup::find($id);
        return $team->update($data);
    }

    public function delete($id)
    {
        $team = Mockup::find($id);
        return $team->delete();
    }

    public function getQuestionByTitle($mockup_title, $limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'ASC'], $status = [0, 1])
    {

        $result = Mockup::when(array_keys($filter, true), function ($query) use ($filter) {

        })
            ->where('mockup_title', '=', $mockup_title)->inRandomOrder()->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));

        return $result;
    }

    public function checkCorrectAnswer($question_id, $answer)
    {
        return Mockup::where('id', '=', $question_id)->where('correct_option', 'like', $answer)->count();
    }

    public function getTotalQuestionsByTitle($mockup_title, $datetime)
    {
        $result = Mockup::where('mockup_title', '=', $mockup_title)
            ->where('created_at', '<=', $datetime)
            ->count();

        return $result;
    }

    public function getRandomQuestion($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'ASC'], $status = [0, 1])
    {

        $result = Mockup::when(array_keys($filter, true), function ($query) use ($filter) {

        })
            ->inRandomOrder()->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));

        return $result;
    }

    public function upload($file){
        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);

        $file->move(public_path() . Mockup::FILE_PATH, $fileName);

        return $fileName;
    }
}
