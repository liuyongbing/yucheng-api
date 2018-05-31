<?php
namespace App\Repositories;

use App\Constants\Dictionary;

class PositionRepository extends Repository
{
    /**
     * 列表
     *
     * @param array $params
     * @return array
     */
    public function list($conditions, $offset = 0, $limit = 10, $order = [])
    {
        $positions = Dictionary::$positions;
        
        $items = [];
        foreach ($positions as $key => $position)
        {
            $items[] = [
                'id' => $key,
                'position_name' => trans('positions.' . $position)
            ];
        }
        
        return [
            'total' => count($positions),
            'list' => $items
        ];
    }
}